<?php
defined('BASEPATH') or die('Direct access not allowed');


/* ===== Documentation ===== 
Name: Home
Role: Controller
Description: Controls access to Properties pages and functions in admin panel
Models: Properties_model
Author: Sylvester Esso Nmakwe
Date Created: 10th January, 2023
*/



class Properties extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_restricted(); //allow only logged in users to access this class
        $this->load->model('property_model');
        $this->admin_details = $this->common_model->get_admin_details($this->session->email);
    }



    /* ========== All Properties ========== */
    public function index() {
        $inner_page_title = 'Propertiess (' . count($this->property_model->get_property()) . ')';
        $this->admin_header('Admin', $inner_page_title);
        $this->load->view('admin/property/all_properties');
        $this->admin_footer();
    }


    public function property_ajax() {
        $this->load->model('admin/property/property_model_ajax', 'current_model');
        $list = $this->current_model->get_records();
        $data = array();
        foreach ($list as $y) {
            $image_src = explode(',', base_url('assets/uploads/property/' . $y->featured_image_thumb));
            $avatar = user_avatar_table($y->featured_image_thumb, $image_src, user_avatar);
            $published = ($y->published == 'true') ? '<span class="text-success">Yes</span>' : '<span class="text-danger">No</span>';
            $availability = ($y->availability == 'true') ? '<span class="text-success">Available</span>' : '<span class="text-danger">Sold</span>';
            $amenities = explode('| ' . ' ', $y->amenities);

            $row = array();
            $row[] = checkbox_bulk_action($y->id);
            $row[] = $this->current_model->options($y->id) . $this->current_model->modals($y->id);
            //$row[] = $y->avatar;
            $row[] = $y->title;
            $row[] = $y->description;
            $row[] = '$' . $y->price;
            $row[] = $y->state;
            $row[] = $y->lga;
            $row[] = $y->address;
            $row[] = $amenities;
            $row[] = $video;
            $row[] = $availability;
            $row[] = $published;
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


    /* ========== New property ========== */
    public function new_property($error = array('error' => '')) {
        $this->admin_header('Admin', 'Add property');
        $this->load->view('admin/property/new_property', $error);
        $this->admin_footer();
    }


    /* ========== Add property ========== */
    public function add_property() {

        $data = array();
        $errorUploadType = $statusMsg = '';

            $validate_featured_image = $this->validate_image_upload('featured_image', 'Uploaded Featured Images - ERROR');
            $validate_floor_plans = $this->validate_image_upload('floor_plans', 'Uploaded Floor Plan Images - ERROR');

            $error_list = (($validate_featured_image) ? $validate_featured_image : '').(($validate_floor_plans) ? $validate_floor_plans : '');
            if ($validate_featured_image OR $validate_floor_plans) {
                 //upload does not happen when file is selected
                 $this->session->set_flashdata('status_msg_error', $error_list);
                 redirect(site_url('properties/new_property'));
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
            $floor_plans = array();
            $floor_plans_thumbnail = array();



            if ($this->form_validation->run()) {

                // If files are selected to upload 
                if (!empty($_FILES['featured_image']['name']) && count(array_filter($_FILES['featured_image']['name'])) > 0) {
                    $filesCount = count($_FILES['featured_image']['name']);
                    for ($i = 0; $i < $filesCount; $i++) {
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
                            $this->new_property($error); //reload page with upload errors

                        } else { //file is selected, upload happens, everyone is happy
                            $featured_image = $this->upload->data('file_name');
                            //generate thumbnail of the image with dimension 500x500
                            $thumbnail = generate_image_thumb($featured_image, '500', '500');
                            array_push($featured_images, $featured_image);
                            array_push($featured_images_thumbnail, $thumbnail);
                        }
                    }
                }


                if (!empty($_FILES['floor_plans']['name']) && count(array_filter($_FILES['floor_plans']['name'])) > 0) {
                    $filesCount = count($_FILES['floor_plans']['name']);
                    for ($i = 0; $i < $filesCount; $i++) {
                        $_FILES['file']['name']     = $_FILES['floor_plans']['name'][$i];
                        $_FILES['file']['type']     = $_FILES['floor_plans']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['floor_plans']['tmp_name'][$i];
                        $_FILES['file']['error']     = $_FILES['floor_plans']['error'][$i];
                        $_FILES['file']['size']     = $_FILES['floor_plans']['size'][$i];

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
                            $this->new_property($error); //reload page with upload errors

                        } else { //file is selected, upload happens, everyone is happy
                            $floor_plan = $this->upload->data('file_name');
                            //generate thumbnail of the image with dimension 500x500
                            $thumbnail = generate_image_thumb($floor_plan, '500', '500');
                            array_push($floor_plans, $floor_plan);
                            array_push($floor_plans_thumbnail, $thumbnail);
                        }
                    }
                }

                $this->property_model->add_new_property(implode(',', $featured_images), implode(',', $featured_images_thumbnail), implode(',', $floor_plans), implode(',', $floor_plans_thumbnail));
                $this->session->set_flashdata('status_msg', 'Property added and published successfully.');
                redirect(site_url('properties'));
            } else {
                $this->new_property(); //validation fails, reload page with validation errors
            }
        }
        
    }
    

    /* ========== Validate image of upload ======== */
    public function validate_image_upload($featured_image, $input_name = false) {
        // If files are selected to upload 
        if (!empty($_FILES[$featured_image]['name']) && count(array_filter($_FILES[$featured_image]['name'])) > 0) {

            $error_list = '';
            $filesCount = count($_FILES[$featured_image]['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name']     = $_FILES[$featured_image]['name'][$i];
                $_FILES['file']['type']     = $_FILES[$featured_image]['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES[$featured_image]['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES[$featured_image]['error'][$i];
                $_FILES['file']['size']     = $_FILES[$featured_image]['size'][$i];

                // File upload configuration 
                $config['max_size'] = 1024 * 5;
                $current_file = 'file #' . ($i+1) . '(' . $_FILES['file']['name'] . ') - ';

                ($config['max_size'] < ($_FILES['file']['size'] * 0.0009765625)) ? $error_list .= $current_file . 'File exceeding maximum file size(5MB)<br>' : '';
            }
            if ($error_list != '') {
                return ($input_name) ? '<b>'.$input_name.'</b> <br>'.$error_list : $error_list ;
            } else {
                return false;
            }
        } else {
            return null;
        }
    }


    /* ========== Edit Property ========== */
    public function edit_property($id, $error = array('error' => '')) {
        //check staff exists
        $this->check_data_exists($id, 'id', 'property', 'admin');
        $property_details = $this->common_model->get_property_details_by_id($id);
        $page_title = 'Edit property: '  . $property_details->title;
        $this->admin_header('Admin', $page_title);
        $data['y'] = $this->common_model->get_property_details_by_id($id);
        $data['upload_error'] = $error;
        $this->load->view('admin/property/edit_property', $data);
        $this->admin_footer();
    }


    public function edit_property_details($id) {

        $data = array();
        $errorUploadType = $statusMsg = '';

            $validate_featured_image = $this->validate_image_upload('featured_image', 'Uploaded Featured Images - ERROR');
            $validate_floor_plans = $this->validate_image_upload('floor_plans', 'Uploaded Floor Plan Images - ERROR');

            $error_list = (($validate_featured_image) ? $validate_featured_image : '').(($validate_floor_plans) ? $validate_floor_plans : '');
            if ($validate_featured_image OR $validate_floor_plans) {
                 //upload does not happen when file is selected
                 $this->session->set_flashdata('status_msg_error', $error_list);
                 redirect(site_url('properties/edit_property/'.$id));
            }else {
            
            //check property exists
		    $this->check_data_exists($id, 'id', 'property', 'admin');
            $this->form_validation->set_rules('title', 'Title', 'trim');
            $this->form_validation->set_rules('description', 'Description', 'trim|min_length[2]|max_length[800]');
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_rules('state', 'State');
            $this->form_validation->set_rules('lga', 'LGA', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('amenities[]', 'Amenities');
            $this->form_validation->set_rules('video', 'Video');

            $featured_images = array();
            $featured_images_thumbnail = array();
            $featured_images_error = array();
            $floor_plans = array();
            $floor_plans_thumbnail = array();
            $floor_plans_error = array();


            $y = $this->property_model->get_property_details($id);
            if ($this->form_validation->run()) {

                // If featured images are selected to upload 
                if (!empty($_FILES['featured_image']['name']) && count(array_filter($_FILES['featured_image']['name'])) > 0) {
                    //delete previous featured image
                    $this->property_model->delete_property_featured_images($y->id);
                   
                    //upload new featured image
                    $filesCount = count($_FILES['featured_image']['name']);
                    for ($i = 0; $i < $filesCount; $i++) {
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
                        // Handle the uploaded image
                        if ($this->upload->do_upload('file')) {
                            $upload_data = $this->upload->data();
                            $featured_image = $upload_data['file_name'];

                            //generate thumbnail of the image with dimension 500x500
                            $thumbnail = generate_image_thumb($featured_image, '500', '500');

                            //updating featured image array
                            array_push($featured_images, $featured_image);
                            array_push($featured_images_thumbnail, $thumbnail);

                            
                        } else {
                            // Handle the upload error
                            $upload_error = $this->upload->display_errors();
                            array_push($featured_images_error, $upload_error);
                        }

  
                    }
                } else {
                    $featured_images = explode(',', $y->featured_image);
                    $featured_images_thumbnail = explode(',', $y->featured_image_thumb);
                }

                // If floor plans are selected to upload
                if (!empty($_FILES['floor_plans']['name']) && count(array_filter($_FILES['floor_plans']['name'])) > 0) {
                    //delete previous floor plans image
                    $this->property_model->delete_property_floor_plans_images($y->id);
                   
                    //upload new featured image
                    $filesCount = count($_FILES['floor_plans']['name']);
                    for ($i = 0; $i < $filesCount; $i++) {
                        $_FILES['file']['name']     = $_FILES['floor_plans']['name'][$i];
                        $_FILES['file']['type']     = $_FILES['floor_plans']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['floor_plans']['tmp_name'][$i];
                        $_FILES['file']['error']     = $_FILES['floor_plans']['error'][$i];
                        $_FILES['file']['size']     = $_FILES['floor_plans']['size'][$i];

                        // File upload configuration 
                        $config['upload_path']          = 'assets/uploads/properties'; //path to save the files
                        $config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';  //extensions which are allowed
                        $config['max_size']             = 1024 * 5; //filesize cannot exceed 4MB
                        $config['file_ext_tolower']     = TRUE; //force file extension to lower case
                        $config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
                        $config['detect_mime']          = TRUE; //detect type of file to avoid code injection

                        $this->load->library('upload', $config);
                        // Handle the uploaded image
                        if ($this->upload->do_upload('file')) {
                            $upload_data = $this->upload->data();
                            $floor_plans_image = $upload_data['file_name'];

                            //generate thumbnail of the image with dimension 500x500
                            $thumbnail = generate_image_thumb($floor_plans_image, '500', '500');

                            //updating featured image array
                            array_push($floor_plans, $floor_plans_image);
                            array_push($floor_plans_thumbnail, $thumbnail);

                            
                        } else {
                            // Handle the upload error
                            $upload_error = $this->upload->display_errors();
                            array_push($floor_plans_error, $upload_error);
                        }
                    }
                } else {
                    $floor_plans = explode(',', $y->floor_plans);
                    $floor_plans_thumbnail = explode(',', $y->floor_plans_thumb);
                }

                if (!empty($featured_images_error)) {

                    $this->session->set_flashdata('status_msg_error', ','.$featured_images_error);
                    redirect(site_url('properties/edit_property/'.$id));

                }elseif (!empty($floor_plans_error)) {

                    $this->session->set_flashdata('status_msg_error', ','.$floor_plans_error);
                    redirect(site_url('properties/edit_property/'.$id));

                }

                $this->property_model->edit_property($id, implode(',', $featured_images), implode(',', $featured_images_thumbnail), implode(',', $floor_plans), implode(',', $floor_plans_thumbnail));
                $this->session->set_flashdata('status_msg', 'Property added and published successfully.');
                redirect(site_url('properties/edit_property/'.$y->id));
            } else {
                //validation fails, reload page with validation errors
                $this->session->set_flashdata('status_msg_error', $validation_errors);
                redirect(site_url('properties/edit_property/'.$id)); 
            }
        }
        
    }


    public function publish_property($id) {
        $this->property_model->publish_property($id);
        $this->session->set_flashdata('status_msg', 'Property published successfully.');
        redirect($this->agent->referrer());
    }


    public function unpublish_property($id) {
        $this->property_model->unpublish_property($id);
        $this->session->set_flashdata('status_msg', 'Property unpublished successfully.');
        redirect($this->agent->referrer());
    }


    public function available($id) {
        $this->property_model->available($id);
        $this->session->set_flashdata('status_msg', 'Property is available.');
        redirect($this->agent->referrer());
    }


    public function sold($id) {
        $this->property_model->sold($id);
        $this->session->set_flashdata('status_msg', 'Property is sold.');
        redirect($this->agent->referrer());
    }


    public function delete_property($id) {
        //check admin exists
        $this->check_data_exists($id, 'id', 'property', 'admin');
        $this->property_model->delete_property($id);
        $this->session->set_flashdata('status_msg', 'Property deleted successfully.');
        redirect($this->agent->referrer());
    }


    public function bulk_actions_property() {
        $this->form_validation->set_rules('check_bulk_action', 'Bulk Select', 'trim');
        $selected_rows = count($this->input->post('check_bulk_action', TRUE));
        if ($this->form_validation->run()) {
            if ($selected_rows > 0) {
                $this->property_model->bulk_actions_property();
            } else {
                $this->session->set_flashdata('status_msg_error', 'No item selected.');
            }
        } else {
            $this->session->set_flashdata('status_msg_error', 'Bulk action failed!');
        }
        redirect($this->agent->referrer());
    }







}
