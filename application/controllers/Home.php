<?php
defined('BASEPATH') or exit('No direct script access allowed');


/* ===== Documentation ===== 
Name: Home
Role: Controller
Description: Controls access to messages, property, events, affiliates, locations, projects and testimonial pages and functions in admin panel
Models: Message_model, Property_model, Events_model, Affiliates_model, Locations_model, Projects_model, Common_model, Testimonial_model
Author: Sylvester Esso Nmakwe
Date Created: 10th January, 2023
*/



class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('message_model');
		$this->load->model('property_model');
		$this->load->model('events_model');
		$this->load->model('affiliates_model');
		$this->load->model('testimonial_model');
		$this->load->model('locations_model');
		$this->load->model('projects_model');
		$this->load->model('common_model');
	}


	public function index() {
		$this->header('Home');
		$data['events'] = $this->events_model->get_events(5);
		$data['projects'] = $this->projects_model->get_recent_published_projects(5);
		$data['testimonials'] = $this->testimonial_model->get_recent_published_testimonials(10);
		$data['total_properties_idu'] = $this->property_model->count_property_in_idu();
		$data['total_properties_lugbe'] = $this->property_model->count_property_in_lugbe();
		$data['total_properties_kurudu'] = $this->property_model->count_property_in_kurudu();
		$this->load->view('home', $data);
		$this->footer();
	}


	public function about() {
		$this->header('About Us');
		$data['staff'] = $this->common_model->get_activated_staff();
		$this->load->view('about', $data);
		$this->footer();
	}


	//Properties in Idu
	public function property_idu() {
		$this->header('Properties in Idu');
		//config for pagination
		$config = array();
		$per_page = 3;  //number of items to be displayed per page
		$uri_segment = 3;  //pagination segment id
		$config["base_url"] = base_url('home/property_idu');
		$config["total_rows"] = $this->property_model->count_property_in_idu();
		$config["per_page"] = $per_page;
		$config["uri_segment"] = $uri_segment;
		$config['cur_tag_open'] = '<a class="pagination-active-page" href="#!">';	//disable click event of current link
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = 'First';
		$config['next_link'] = '&raquo;';	// >>
		$config['prev_link'] = '&laquo;';	// <<
		$config['last_link'] = 'Last';
		$config['display_pages'] = TRUE; //show pagination link digits
		$config['num_links'] = 3; //number of digit links

		//initize config using the pagination library
		$this->pagination->initialize($config);

		$page = $this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 0;
		$data["property"] = $this->property_model->get_property_list_in_idu($per_page, $page);
		$data["location"] = $this->locations_model->get_locations_details_idu();
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;', $str_links); //explode the links 1 2 3 4 into distinct items for styling.
		$data['total_records'] = $this->property_model->count_property_in_idu();
		$this->load->view('properties/property_idu', $data);
		$this->footer();
	}

	//Properties in Lugbe
	public function property_lugbe() {
		$this->header('Properties in Lugbe');
		//config for pagination
		$config = array();
		$per_page = 3;  //number of items to be displayed per page
		$uri_segment = 3;  //pagination segment id
		$config["base_url"] = base_url('home/property');
		$config["total_rows"] = $this->property_model->count_property_in_lugbe();
		$config["per_page"] = $per_page;
		$config["uri_segment"] = $uri_segment;
		$config['cur_tag_open'] = '<a class="pagination-active-page" href="#!">';	//disable click event of current link
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = 'First';
		$config['next_link'] = '&raquo;';	// >>
		$config['prev_link'] = '&laquo;';	// <<
		$config['last_link'] = 'Last';
		$config['display_pages'] = TRUE; //show pagination link digits
		$config['num_links'] = 3; //number of digit links

		//initize config using the pagination library
		$this->pagination->initialize($config);

		$page = $this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 0;
		$data["property"] = $this->property_model->get_property_list_in_lugbe($per_page, $page);
		$data["location"] = $this->locations_model->get_locations_details_lugbe();
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;', $str_links); //explode the links 1 2 3 4 into distinct items for styling.
		$data['total_records'] = $this->property_model->count_property_in_lugbe();
		$this->load->view('properties/property_lugbe', $data);
		$this->footer();
	}

	//Properties in Kurudu
	public function property_kurudu() {
		$this->header('Properties in Kurudu');
		//config for pagination
		$config = array();
		$per_page = 3;  //number of items to be displayed per page
		$uri_segment = 3;  //pagination segment id
		$config["base_url"] = base_url('home/property');
		$config["total_rows"] = $this->property_model->count_property_in_kurudu();
		$config["per_page"] = $per_page;
		$config["uri_segment"] = $uri_segment;
		$config['cur_tag_open'] = '<a class="pagination-active-page" href="#!">';	//disable click event of current link
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = 'First';
		$config['next_link'] = '&raquo;';	// >>
		$config['prev_link'] = '&laquo;';	// <<
		$config['last_link'] = 'Last';
		$config['display_pages'] = TRUE; //show pagination link digits
		$config['num_links'] = 3; //number of digit links

		//initize config using the pagination library
		$this->pagination->initialize($config);

		$page = $this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 0;
		$data["property"] = $this->property_model->get_property_list_in_kurudu($per_page, $page);
		$data["location"] = $this->locations_model->get_locations_details_kurudu();
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;', $str_links); //explode the links 1 2 3 4 into distinct items for styling.
		$data['total_records'] = $this->property_model->count_property_in_kurudu();
		$this->load->view('properties/property_kurudu', $data);
		$this->footer();
	}


	public function property_details($id) {
		//check property exists
		$this->check_data_exists($id, 'id', 'property', 'home/property_details');
		$this->header('Property Details');
		$property = $this->property_model->get_published_property(3);
		$property_details = $this->property_model->get_property_details($id);
		$data['y'] = $property_details;
		$data['property'] = $property;
		$this->load->view('properties/property_details', $data);
		$this->footer();
	}


	public function events() {
		$this->header('Events');
		//config for pagination
		$config = array();
		$per_page = 3;  //number of items to be displayed per page
		$uri_segment = 3;  //pagination segment id
		$config["base_url"] = base_url('home/events');
		$config["total_rows"] = $this->events_model->count_published_events();
		$config["per_page"] = $per_page;
		$config["uri_segment"] = $uri_segment;
		$config['cur_tag_open'] = '<a class="pagination-active-page" href="#!">';	//disable click event of current link
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = 'First';
		$config['next_link'] = '&raquo;';	// >>
		$config['prev_link'] = '&laquo;';	// <<
		$config['last_link'] = 'Last';
		$config['display_pages'] = TRUE; //show pagination link digits
		$config['num_links'] = 3; //number of digit links

		//initize config using the pagination library
		$this->pagination->initialize($config);

		$page = $this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 0;
		$data["events"] = $this->events_model->get_events_list($per_page, $page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;', $str_links); //explode the links 1 2 3 4 into distinct items for styling.
		$data['total_records'] = $this->events_model->count_published_events();
		$this->load->view('blog/blog', $data);
		$this->footer();
	}


	public function events_details($id) {
		//check event exists
		$this->check_data_exists($id, 'id', 'events', 'home/events_details');
		$this->header('Event Details');
		$events = $this->events_model->get_recent_published_events(3);
		$event_details = $this->events_model->get_event_details($id);
		$data['properties'] = $this->property_model->get_property_limit(3);
		$data['y'] = $event_details;
		$data['events'] = $events;
		$this->load->view('blog/blog_details', $data);
		$this->footer();
	}


	public function affiliate() {
		$this->header('Affiliate Program');
		$this->load->view('affiliate');
		$this->footer();
	}


	// Affiliate program form
	public function add_affiliate() {
		
		$errorUploadType = $statusMsg = '';

			//validate file size
            $validate_cv_file = $this->validate_file_upload('cv', 'CV Upload ERROR');

            $error_list = (($validate_cv_file) ? $validate_cv_file : '');
            if ($validate_cv_file) {
                 //upload does not happen when file is selected
                 $this->session->set_flashdata('status_msg_error', $error_list);
                 redirect(site_url('home/affiliate'));
            }else {

				$this->form_validation->set_rules('name','Name','trim|required',
					array('required' => 'Please enter your name')
				);
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required', array('required' => 'Please enter your email'));
				$this->form_validation->set_rules('phone','Phone Number','trim|is_natural|required',
					array('is_natural' => 'Please enter numbers only in the phone field', 'required' => 'Please enter your phone number')
				);
				$this->form_validation->set_rules('address','Address','trim|required',
					array('required' => 'Please enter your address')
				);
				$this->form_validation->set_rules('dob','Date of Birth','trim|required',
					array('required' => 'Please select your Date of birth')
				);
				$this->form_validation->set_rules('qualification','Qualification','trim|required',
					array('required' => 'Please select a qualification')
				);
				$this->form_validation->set_rules('experience','Experience','trim|required',
					array('required' => 'Please select a experience')
				);
				$this->form_validation->set_rules('cover_letter','Cover Letter','trim|required',
					array('required' => 'Please select a experience')
				);


				if ($this->form_validation->run()) {

					//loading upload library
					$this->load->library('upload');

					// If cv file is selected to upload
					if (!empty($_FILES['cv']['name'])) {
						
						$_FILES['file']['name']     = $_FILES['cv']['name'];
						$_FILES['file']['type']     = $_FILES['cv']['type'];
						$_FILES['file']['tmp_name'] = $_FILES['cv']['tmp_name'];
						$_FILES['file']['error']    = $_FILES['cv']['error'];
						$_FILES['file']['size']     = $_FILES['cv']['size'];

						// File upload configuration 
						$config['upload_path']          = 'assets/uploads/cv_files'; //path to save the files
						$config['allowed_types']        = 'pdf';  //extensions which are allowed
						$config['max_size']             = 1024 * 5; //filesize cannot exceed 4MB
						$config['file_ext_tolower']     = TRUE; //force file extension to lower case
						$config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
						$config['detect_mime']          = TRUE; //detect type of file to avoid code injection

						//Creating new configuration for upload
						$this->upload->initialize($config);
						if ($this->upload->do_upload('file')) {
							$upload_data = $this->upload->data();
							$cv = $upload_data['file_name'];
							
						} else {
							// Handle the upload error
							$upload_error = $this->upload->display_errors();
							//array_push($upload_error_array, $upload_error);
							$upload_data = $this->upload->data();
							$cv = $upload_data['file_name'];
						}
						
					} 

					//displaying error for brochure file, if any
					if (!empty($upload_error_array)) {

						$this->session->set_flashdata('status_msg_error', 'Brochure File Error: ('.$brochure_file.')');
						redirect(site_url('home/affiliate'));

					}

					$this->affiliates_model->add_affilate($cv);
					$this->session->set_flashdata('status_msg', 'Project added and published successfully.');
					redirect(site_url('affiliate'));
				} else {
					$this->session->set_flashdata('status_msg_error', validation_errors());
					redirect(site_url('home/affiliate'));
				}
        }
	}


	// Validate file of upload 
    public function validate_file_upload($cv, $input_name = false, $file_size = (1024 * 5), $file_size_word = '5MB') {
        // If files are selected to upload 
        if (!empty($_FILES[$cv]['name'])) {

            $error_list = '';
			$_FILES['file']['name']     = $_FILES[$cv]['name'];
			$_FILES['file']['type']     = $_FILES[$cv]['type'];
			$_FILES['file']['tmp_name'] = $_FILES[$cv]['tmp_name'];
			$_FILES['file']['error']     = $_FILES[$cv]['error'];
			$_FILES['file']['size']     = $_FILES[$cv]['size'];

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


	public function contact() {
		$this->header('Contact Us');
		$this->load->view('contact');
		$this->footer();
	}


	public function coming_soon() {

		$this->load->view('coming_soon');
	}


	// Contact Us
	public function contact_ajax() {
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
		$this->form_validation->set_rules(
			'phone',
			'Phone Number',
			'trim|is_natural|required',
			array('is_natural' => 'Please enter numbers only in the phone field')
		);
		$this->form_validation->set_rules('message', 'Message', 'trim|required');


		if ($this->form_validation->run()) {
			$this->message_model->contact_us(); //insert the data into db
			echo 1;
		} else {
			echo validation_errors();
		}
	}



}
