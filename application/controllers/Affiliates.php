<?php
defined('BASEPATH') or die('Direct access not allowed');


/* ===== Documentation ===== 
Name: Home
Role: Controller
Description: Controls access to affiliates pages and functions in admin panel
Models: Affiliates_model
Author: Sylvester Esso Nmakwe
Date Created: 10th January, 2023
*/



class Affiliates extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_restricted(); //allow only logged in users to access this class
        $this->load->model('affiliates_model');
        $this->admin_details = $this->common_model->get_admin_details($this->session->email);
    }



    /* ========== All affiliates ========== */
    public function index() {
        $inner_page_title = 'Affiliates Program (' . count($this->affiliates_model->get_affiliates()) . ')';
        $this->admin_header('Admin', $inner_page_title);
        $this->load->view('admin/affiliates/all_affiliates');
        $this->admin_footer();
    }

	
	public function view_affiliate($id) {
		//check staff exists
		$this->check_data_exists($id, 'id', 'affiliates', 'affiliates/view_affiliate');
		$affiliate = $this->affiliates_model->get_affiliates_details($id);
		$page_title = 'Affiliate Program: '  . $affiliate->name;
		$this->admin_header($page_title, $page_title);
		$affiliate = $this->affiliates_model->get_affiliates_details($id);
		$data['y'] = $affiliate;
		$this->load->view('admin/affiliates/view_affiliate', $data);
        $this->admin_footer();
	}

	
	public function affiliates_ajax() {
		$this->load->model('admin/affiliates/affiliates_model_ajax', 'current_model');
		$list = $this->current_model->get_records();
		$data = array();
		foreach ($list as $y) {
            
			$row = array();	
			$row[] = checkbox_bulk_action($y->id);
			$row[] = $this->current_model->options($y->id) . $this->current_model->modals($y->id);
			$row[] = $y->name; 
			$row[] = $y->email; 
			$row[] = $y->phone; 
			$row[] = $y->address; 
			$row[] = x_date($y->date_added); 
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->current_model->count_all_records(),
			"recordsFiltered" => $this->current_model->count_filtered_records(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

    /* ========== Add affiliates ========== */
    public function add_affiliates() {

        $data = array(); 
        $errorUploadType = $statusMsg = '';

        // If files are selected to upload 
        if(!empty($_FILES['featured_image']['name']) && count(array_filter($_FILES['featured_image']['name'])) > 0){ 

            $error_list = '';
            $filesCount = count($_FILES['featured_image']['name']); 
            for($i = 0; $i < $filesCount; $i++){ 
                $_FILES['file']['name']     = $_FILES['featured_image']['name'][$i]; 
                $_FILES['file']['type']     = $_FILES['featured_image']['type'][$i]; 
                $_FILES['file']['tmp_name'] = $_FILES['featured_image']['tmp_name'][$i]; 
                $_FILES['file']['error']     = $_FILES['featured_image']['error'][$i]; 
                $_FILES['file']['size']     = $_FILES['featured_image']['size'][$i]; 
                 
                // File upload configuration 
                $uploadPath = 'assets/uploads/properties'; 
                $config['upload_path'] = $uploadPath; 
                $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                $config['max_size'] = 1024;
                $current_file = 'file #'.$i.'('.$_FILES['file']['name'].') - '; 
                 
                ($config['max_size'] < ($_FILES['file']['size'] * 0.0009765625)) ? $error_list.=$current_file.'File exceeding maximum file size(4MB)<br>' : '';
            } 

            if ($error_list != '') {
                //upload does not happen when file is selected
				$this->session->set_flashdata('status_msg_error', $error_list);
				redirect(site_url('properties/new_affiliates'));
            }else {

                    $this->form_validation->set_rules('title', 'Title', 'trim');
                    $this->form_validation->set_rules('description', 'Description', 'trim|min_length[2]|max_length[800]');
                    $this->form_validation->set_rules('price', 'Price', 'required');
                    $this->form_validation->set_rules('state', 'State');
                    $this->form_validation->set_rules('lga', 'LGA', 'required');
                    $this->form_validation->set_rules('address', 'Address', 'required');
                    $this->form_validation->set_rules('amenities[]', 'Amenties');
                    $this->form_validation->set_rules('video', 'Video');

                    $featured_images = array();
                    $featured_images_thumbnail = array();
                    


                    if ($this->form_validation->run()) {

                        // If files are selected to upload 
                        if(!empty($_FILES['featured_image']['name']) && count(array_filter($_FILES['featured_image']['name'])) > 0){ 
                            $filesCount = count($_FILES['featured_image']['name']); 
                            for($i = 0; $i < $filesCount; $i++){ 
                                $_FILES['file']['name']     = $_FILES['featured_image']['name'][$i]; 
                                $_FILES['file']['type']     = $_FILES['featured_image']['type'][$i]; 
                                $_FILES['file']['tmp_name'] = $_FILES['featured_image']['tmp_name'][$i]; 
                                $_FILES['file']['error']     = $_FILES['featured_image']['error'][$i]; 
                                $_FILES['file']['size']     = $_FILES['featured_image']['size'][$i]; 
                                
                                // File upload configuration 
                                $config['upload_path']          = 'assets/uploads/properties'; //path to save the files
                                $config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';  //extensions which are allowed
                                $config['max_size']             = 1024 * 5; //filesize cannot exceed 4MB
                                $config['file_ext_tolower']     = TRUE; //force file extension to lower case
                                $config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
                                $config['detect_mime']          = TRUE; //detect type of file to avoid code injection
                                
                                $this->load->library('upload', $config);
                                if ((!$this->upload->do_upload('file')) && ($_FILES['file']['name'] != "")) {
                                    //upload does not happen when file is selected
                                    $error = array('error' => $this->upload->display_errors());
                                    $this->new_affiliates($error); //reload page with upload errors

                                } else { //file is selected, upload happens, everyone is happy
                                    $featured_image = $this->upload->data('file_name');
                                    //generate thumbnail of the image with dimension 500x500
                                    $thumbnail = generate_image_thumb($featured_image, '500', '500');
                                    array_push($featured_images, $featured_image);
                                    array_push($featured_images_thumbnail, $thumbnail);
                                    
                                }
                                
                            }
                            $this->affiliates_model->add_new_affiliates(implode(',', $featured_images), implode(',', $featured_images_thumbnail));
                            $this->session->set_flashdata('status_msg', 'affiliates added and published successfully.');
                            redirect(site_url('properties'));
                        }

                    }else {
                        $this->new_affiliates(); //validation fails, reload page with validation errors
                    }
            }
        }
		
	}


    public function delete_affiliates($id) {
        //check admin exists
        $this->check_data_exists($id, 'id', 'affiliates', 'admin');
        $this->affiliates_model->delete_affiliates($id);
        $this->session->set_flashdata('status_msg', 'affiliates deleted successfully.');
        redirect($this->agent->referrer());
    }


    public function bulk_actions_affiliates(){
        $this->form_validation->set_rules('check_bulk_action', 'Bulk Select', 'trim');
        $selected_rows = count($this->input->post('check_bulk_action', TRUE));
        if ($this->form_validation->run()) {
            if ($selected_rows > 0) {
                $this->affiliates_model->bulk_actions_affiliates();
            } else {
                $this->session->set_flashdata('status_msg_error', 'No item selected.');
            }
        } else {
            $this->session->set_flashdata('status_msg_error', 'Bulk action failed!');
        }
        redirect($this->agent->referrer());
    }
}
