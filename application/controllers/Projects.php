<?php
defined('BASEPATH') or die('Direct access not allowed');


/* ===== Documentation ===== 
Name: Home
Role: Controller
Description: Controls access to Projects pages and functions in admin panel
Models: Projects_model
Author: Sylvester Esso Nmakwe
Date Created: 10th January, 2023
*/



class Projects extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->admin_restricted(); //allow only logged in users to access this class
		$this->load->model('projects_model');
		$this->admin_details = $this->common_model->get_admin_details($this->session->email);
	}



	/* ========== All projects ========== */
	public function index() {
		$inner_page_title = 'Projects (' . count($this->common_model->get_projects()) . ')'; 
		$this->admin_header('Projects', $inner_page_title);
		$this->load->view('admin/publications/projects/projects_list');
        $this->admin_footer();
	}
	
	
	public function projects_ajax() {
		$this->load->model('admin/projects/projects_model_ajax', 'current_model');
		$list = $this->current_model->get_records();
		$data = array();
		foreach ($list as $y) {
			$image_src = base_url('assets/uploads/projects/'.$y->featured_image);
			$avatar = user_avatar_table($y->featured_image, $image_src, user_avatar);
			$active = ($y->published == 'true') ? '<span class="text-success">Yes</span>' : '<span class="text-danger">No</span>';
			$row = array();	
			$row[] = checkbox_bulk_action($y->id);
			$row[] = $this->current_model->options($y->id) . $this->current_model->modals($y->id);
			$row[] = $avatar; 
			$row[] = $y->title; 
			$row[] = $y->location; 
			$row[] = $y->snippet; 
			$row[] = $y->brochure_file;  
			$row[] = $active; 
			$row[] = x_date($y->date_created); 
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


	public function create_project($error = array('error' => '')) {
		$this->admin_header('Admin', 'Add Project');
		$this->load->view('admin/publications/projects/create_project', $error);
		$this->admin_footer();
	}


	public function add_project() {
		
		$errorUploadType = $statusMsg = '';

			//validate file size
            $validate_featured_image = $this->validate_image_upload('featured_image', 'Uploaded Featured Image - ERROR');
            $validate_brochure_file = $this->validate_file_upload('brochure_file', 'Uploaded Brochure File - ERROR');

            $error_list = (($validate_featured_image) ? $validate_featured_image : '').(($validate_brochure_file) ? $validate_brochure_file : '');
            if ($validate_featured_image OR $validate_brochure_file) {
                 //upload does not happen when file is selected
                 $this->session->set_flashdata('status_msg_error', $error_list);
                 redirect(site_url('projects/create_project'));
            }else {

				$this->form_validation->set_rules('title', 'Title', 'trim');
				$this->form_validation->set_rules('location', 'Project Location', 'required');
				$this->form_validation->set_rules('description', 'Description', 'trim|min_length[2]|max_length[800]');

				$upload_error_array = array();
				$upload_featured_error_array = array();

				if ($this->form_validation->run()) {

					//loading upload library
					$this->load->library('upload');

					// If image file is selected to upload 
					if (!empty($_FILES['featured_image']['name'])) {
						
						$_FILES['file']['name']     = $_FILES['featured_image']['name'];
						$_FILES['file']['type']     = $_FILES['featured_image']['type'];
						$_FILES['file']['tmp_name'] = $_FILES['featured_image']['tmp_name'];
						$_FILES['file']['error']    = $_FILES['featured_image']['error'];
						$_FILES['file']['size']     = $_FILES['featured_image']['size'];

						// File upload configuration 
						$config['upload_path']          = 'assets/uploads/projects'; //path to save the files
						$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';  //extensions which are allowed
						$config['max_size']             = 1024 * 5; //filesize cannot exceed 4MB
						$config['file_ext_tolower']     = TRUE; //force file extension to lower case
						$config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
						$config['detect_mime']          = TRUE; //detect type of file to avoid code injection

						//Creating new configuration for upload
						$this->upload->initialize($config);
						if ($this->upload->do_upload('file')) {
							$featured_image = $this->upload->data('file_name');
							//generate thumbnail of the image with dimension 500x500
							$thumbnail = generate_image_thumb($featured_image, '500', '500');
							
						} else {
							// Handle the upload error
							$upload_error = $this->upload->display_errors();
							array_push($upload_featured_error_array, $upload_error);
							$upload_data = $this->upload->data();
							$featured_image_file = $upload_data['file_name'];
						}

					} 

					// If brochure file is selected to upload
					if (!empty($_FILES['brochure_file']['name'])) {
						
						$_FILES['file']['name']     = $_FILES['brochure_file']['name'];
						$_FILES['file']['type']     = $_FILES['brochure_file']['type'];
						$_FILES['file']['tmp_name'] = $_FILES['brochure_file']['tmp_name'];
						$_FILES['file']['error']    = $_FILES['brochure_file']['error'];
						$_FILES['file']['size']     = $_FILES['brochure_file']['size'];

						// File upload configuration 
						$config['upload_path']          = 'assets/uploads/projects'; //path to save the files
						$config['allowed_types']        = 'pdf';  //extensions which are allowed
						$config['max_size']             = 1024 * 5; //filesize cannot exceed 4MB
						$config['file_ext_tolower']     = TRUE; //force file extension to lower case
						$config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
						$config['detect_mime']          = TRUE; //detect type of file to avoid code injection

						//Creating new configuration for upload
						$this->upload->initialize($config);
						if ($this->upload->do_upload('file')) {
							$upload_data = $this->upload->data();
							$brochure_file = $upload_data['file_name'];
							
						} else {
							// Handle the upload error
							$upload_error = $this->upload->display_errors();
							array_push($upload_error_array, $upload_error);
							$upload_data = $this->upload->data();
							$brochure_file = $upload_data['file_name'];
						}
						
					} 

					//displaying error for brochure file, if any
					if (!empty($upload_error_array)) {

						$this->session->set_flashdata('status_msg_error', 'Brochure File Error: '.implode(' ', $upload_error_array).'('.$brochure_file.')');
						redirect(site_url('projects/create_project'));

					}

					//displaying error for featured image file, if any
					if (!empty($upload_featured_error_array)) {

						$this->session->set_flashdata('status_msg_error', 'Featured Image File Error: '.implode(' ', $upload_featured_error_array).'('.$featured_image_file.')');
						redirect(site_url('projects/create_project'));

					}

					$this->projects_model->add_project($featured_image, $thumbnail, $brochure_file);
					$this->session->set_flashdata('status_msg', 'Project added and published successfully.');
					redirect(site_url('projects'));
				} else {
					$this->session->set_flashdata('status_msg_error', validation_errors());
					redirect(site_url('projects/create_project'));
					//$this->create_project(); //validation fails, reload page with validation errors
				}
        }
	}
    

    /* ========== Validate image of upload ======== */
    public function validate_image_upload($featured_image, $input_name = false) {
        // If files are selected to upload 
        if (!empty($_FILES[$featured_image]['name'])) {

            $error_list = '';
			$_FILES['file']['name']     = $_FILES[$featured_image]['name'];
			$_FILES['file']['type']     = $_FILES[$featured_image]['type'];
			$_FILES['file']['tmp_name'] = $_FILES[$featured_image]['tmp_name'];
			$_FILES['file']['error']     = $_FILES[$featured_image]['error'];
			$_FILES['file']['size']     = $_FILES[$featured_image]['size'];

			// File upload configuration 
			$config['max_size'] = 1024 * 5;
			$current_file = $_FILES['file']['name'];

			($config['max_size'] < ($_FILES['file']['size'] * 0.0009765625)) ? $error_list .= $current_file . 'File exceeding maximum file size(5MB)<br>' : '';

            if ($error_list != '') {
                return ($input_name) ? '<b>'.$input_name.'</b> <br>'.$error_list : $error_list ;
            } else {
                return false;
            }
        } else {
            return null;
        }
    }
    

    /* ========== Validate file of upload ======== */
    public function validate_file_upload($brochure_file, $input_name = false, $file_size = (1024 * 5), $file_size_word = '5MB') {
        // If files are selected to upload 
        if (!empty($_FILES[$brochure_file]['name'])) {

            $error_list = '';
			$_FILES['file']['name']     = $_FILES[$brochure_file]['name'];
			$_FILES['file']['type']     = $_FILES[$brochure_file]['type'];
			$_FILES['file']['tmp_name'] = $_FILES[$brochure_file]['tmp_name'];
			$_FILES['file']['error']     = $_FILES[$brochure_file]['error'];
			$_FILES['file']['size']     = $_FILES[$brochure_file]['size'];

			// File upload configuration 
			$config['max_size'] = $file_size;
			$current_file = $_FILES['file']['name'];

			($config['max_size'] < ($_FILES['file']['size'] * 0.0009765625)) ? $error_list .= $current_file . 'File exceeding maximum file size('.$file_size_word.')<br>' : '';

            if ($error_list != '') {
                return ($input_name) ? '<b>'.$input_name.'</b> <br>'.$error_list : $error_list ;
            } else {
                return false;
            }
        } else {
            return null;
        }
    }


	public function edit_project($id, $error = array('error' => '')) {
		//check project exists
		$this->check_data_exists($id, 'id', 'projects', 'admin');
		$y = $this->projects_model->get_project_details($id);
		$inner_page_title = 'Edit project: ' . $y->title;
		$this->admin_header('Admin', $inner_page_title);
		$data['y'] = $y;
		$this->load->view('admin/publications/projects/edit_project', $data);
		$this->admin_footer();
	}


	public function edit_project_ajax($id) {
		//check project exists
		$this->check_data_exists($id, 'id', 'projects', 'admin');
		$y = $this->projects_model->get_project_details($id);
		$errorUploadType = $statusMsg = '';

			//validate file size
            $validate_featured_image = $this->validate_image_upload('featured_image', 'Uploaded Featured Image - ERROR');
            $validate_brochure_file = $this->validate_file_upload('brochure_file', 'Uploaded Brochure File - ERROR');

            $error_list = (($validate_featured_image) ? $validate_featured_image : '').(($validate_brochure_file) ? $validate_brochure_file : '');
            if ($validate_featured_image OR $validate_brochure_file) {
                 //upload does not happen when file is selected
                 $this->session->set_flashdata('status_msg_error', $error_list);
                 redirect(site_url('projects/edit_project/'.$id));
            }else {

            $this->form_validation->set_rules('title', 'Title', 'trim');
            $this->form_validation->set_rules('location', 'Project Location', 'required');
            $this->form_validation->set_rules('description', 'Description', 'trim|min_length[2]|max_length[800]');

			$upload_error_array = array();
			$upload_featured_error_array = array();

            if ($this->form_validation->run()) {

				//loading upload library
				$this->load->library('upload');

                // If image file is selected to upload 
                if (!empty($_FILES['featured_image']['name'])) {
                    
					$_FILES['file']['name']     = $_FILES['featured_image']['name'];
					$_FILES['file']['type']     = $_FILES['featured_image']['type'];
					$_FILES['file']['tmp_name'] = $_FILES['featured_image']['tmp_name'];
					$_FILES['file']['error']    = $_FILES['featured_image']['error'];
					$_FILES['file']['size']     = $_FILES['featured_image']['size'];

					// File upload configuration 
					$config['upload_path']          = 'assets/uploads/projects'; //path to save the files
					$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';  //extensions which are allowed
					$config['max_size']             = 1024 * 5; //filesize cannot exceed 4MB
					$config['file_ext_tolower']     = TRUE; //force file extension to lower case
					$config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
					$config['detect_mime']          = TRUE; //detect type of file to avoid code injection

					//Creating new configuration for upload
					$this->upload->initialize($config);
					if ($this->upload->do_upload('file')) {
						$featured_image = $this->upload->data('file_name');
						//generate thumbnail of the image with dimension 500x500
						$thumbnail = generate_image_thumb($featured_image, '500', '500');
						
					} else {
						// Handle the upload error
						$upload_error = $this->upload->display_errors();
						array_push($upload_featured_error_array, $upload_error);
						$upload_data = $this->upload->data();
						$featured_image_file = $upload_data['file_name'];
					}

                } else {
					$featured_image = $y->featured_image;
					$thumbnail = $y->featured_image_thumb;
				}

				// If brochure file is selected to upload
                if (!empty($_FILES['brochure_file']['name'])) {
                    
					$_FILES['file']['name']     = $_FILES['brochure_file']['name'];
					$_FILES['file']['type']     = $_FILES['brochure_file']['type'];
					$_FILES['file']['tmp_name'] = $_FILES['brochure_file']['tmp_name'];
					$_FILES['file']['error']    = $_FILES['brochure_file']['error'];
					$_FILES['file']['size']     = $_FILES['brochure_file']['size'];

					// File upload configuration 
					$config['upload_path']          = 'assets/uploads/projects'; //path to save the files
					$config['allowed_types']        = 'pdf';  //extensions which are allowed
					$config['max_size']             = 1024 * 5; //filesize cannot exceed 4MB
					$config['file_ext_tolower']     = TRUE; //force file extension to lower case
					$config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
					$config['detect_mime']          = TRUE; //detect type of file to avoid code injection

					//Creating new configuration for upload
					$this->upload->initialize($config);
					if ($this->upload->do_upload('file')) {
						$upload_data = $this->upload->data();
						$brochure_file = $upload_data['file_name'];
						
					} else {
						// Handle the upload error
						$upload_error = $this->upload->display_errors();
						array_push($upload_error_array, $upload_error);
						$upload_data = $this->upload->data();
						$brochure_file = $upload_data['file_name'];
					}
                    
                } else {
					$brochure_file = $y->brochure_file;
				}

				//displaying error for brochure file, if any
                if (!empty($upload_error_array)) {

                    $this->session->set_flashdata('status_msg_error', 'Brochure File Error: '.implode(' ', $upload_error_array).'('.$brochure_file.')');
                    redirect(site_url('projects/edit_project/'.$id));

                }

				//displaying error for featured image file, if any
                if (!empty($upload_featured_error_array)) {

                    $this->session->set_flashdata('status_msg_error', 'Featured Image File Error: '.implode(' ', $upload_featured_error_array).'('.$featured_image_file.')');
                    redirect(site_url('projects/edit_project/'.$id));

                }

                $this->projects_model->edit_project($id, $featured_image, $thumbnail, $brochure_file);
                $this->session->set_flashdata('status_msg', 'Project edited and published successfully.');
                redirect(site_url('projects/edit_project/'.$id));
            } else {
                $this->edit_project($id); //validation fails, reload page with validation errors
            }
        }
	}


	public function publish_project($id) {
		//check project exists
		$this->check_data_exists($id, 'id', 'projects', 'admin');
		$this->projects_model->publish_project($id);
		$this->session->set_flashdata('status_msg', 'Project published successfully.');
		redirect($this->agent->referrer());
	}


	public function unpublish_project($id) {
		//check project exists
		$this->check_data_exists($id, 'id', 'projects', 'admin');
		$this->projects_model->unpublish_project($id);
		$this->session->set_flashdata('status_msg', 'Project unpublished successfully.');
		redirect($this->agent->referrer());
	}


	public function delete_project($id) {
		//check project exists
		$this->check_data_exists($id, 'id', 'projects', 'admin');
		$this->projects_model->delete_project($id);
		$this->session->set_flashdata('status_msg', 'Project deleted successfully.');
		redirect($this->agent->referrer());
	}


	public function clear_projects() {
		$this->projects_model->clear_projects();
		$this->session->set_flashdata('status_msg', 'projects cleared successfully.');
		redirect($this->agent->referrer());
	}


	public function bulk_actions_projects() {
		$this->form_validation->set_rules('check_bulk_action', 'Bulk Select', 'trim');
		$selected_rows = count($this->input->post('check_bulk_action', TRUE));
		if ($this->form_validation->run()) {
			if ($selected_rows > 0) {
				$this->projects_model->bulk_actions_projects();
			} else {
				$this->session->set_flashdata('status_msg_error', 'No item selected.');
			}
		} else {
			$this->session->set_flashdata('status_msg_error', 'Bulk action failed!');
		}
		redirect($this->agent->referrer());
	}







}
