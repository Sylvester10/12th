<?php
defined('BASEPATH') or die('Direct access not allowed');


/* ===== Documentation ===== 
Name: Home
Role: Controller
Description: Controls access to events pages and functions in admin panel
Models: Events_model
Author: Sylvester Esso Nmakwe
Date Created: 10th January, 2023
*/



class Events extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->admin_restricted(); //allow only logged in users to access this class
		//$this->admin_role_restricted('Events Manager'); //only admin with this role can access this module
		$this->load->model('events_model');
		$this->admin_details = $this->common_model->get_admin_details($this->session->email);
	}



	public function events_list() {
		$total_events = $this->events_model->count_events();
		$inner_page_title = 'All Events (' . $total_events . ')';
		$this->admin_header('Admin', $inner_page_title);
		//config for pagination
		$config = array();
		$per_page = 5;  //number of items to be displayed per page
		$uri_segment = 3;  //pagination segment id: events/events_list/pagination_id
		$config["base_url"] = base_url('events/events_list');
		$config["total_rows"] = $total_events;
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
		$this->pagination->initialize($config);
		$page = $this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 0;
		$data["events"] = $this->events_model->get_events_list($config["per_page"], $page);
		$data["total_records"] = $config["total_rows"];
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;', $str_links); //explode the links 1 2 3 4 into distinct items for styling.
		$data['total_records'] = $this->events_model->count_events();
		$data['total_published'] = $this->events_model->count_published_events();
		$data['total_unpublished'] = $this->events_model->count_unpublished_events();
		$this->load->view('admin/publications/events/events_list', $data);
		$this->admin_footer();
	}


	public function create_event($error = array('error' => '')) {
		$this->admin_header('Admin', 'Add Event');
		$this->load->view('admin/publications/events/create_event', $error);
		$this->admin_footer();
	}


	public function create_event_ajax() {
		$this->form_validation->set_rules('venue', 'Venue', 'trim|required');
		$this->form_validation->set_rules('caption', 'Event Caption', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');

		//config for file uploads
		$config['upload_path']          = 'assets/uploads/events'; //path to save the files
		$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';  //extensions which are allowed
		$config['max_size']             = 1024 * 4; //filesize cannot exceed 4MB
		$config['file_ext_tolower']     = TRUE; //force file extension to lower case
		$config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
		$config['detect_mime']          = TRUE; //detect type of file to avoid code injection

		$this->load->library('upload', $config);

		if ($this->form_validation->run()) {

			if ($_FILES['featured_image']['name'] == "") { //file is not selected
				$this->session->set_flashdata('status_msg_error', 'No file selected.');
				redirect(site_url('events/create_event'));
			} elseif ((!$this->upload->do_upload('featured_image')) && ($_FILES['featured_image']['name'] != "")) {
				//upload does not happen when file is selected
				$error = array('error' => $this->upload->display_errors());
				$this->create_event($error); //reload page with upload errors

			} else { //file is selected, upload happens, everyone is happy
				$featured_image = $this->upload->data('file_name');
				//generate thumbnail of the image with dimension 500x500
				$thumbnail = generate_image_thumb($featured_image, '500', '500');
				$this->events_model->create_event($featured_image, $thumbnail);
				$this->session->set_flashdata('status_msg', 'Event created and published successfully.');
				redirect(site_url('events/events_list'));
			}
		} else {
			$this->create_event(); //validation fails, reload page with validation errors
		}
	}


	public function edit_event($id, $error = array('error' => '')) {
		//check event exists
		$this->check_data_exists($id, 'id', 'events', 'admin');
		$y = $this->events_model->get_event_details($id);
		$inner_page_title = 'Edit Event: ' . $y->caption;
		$this->admin_header('Admin', $inner_page_title);
		$data['y'] = $y;
		$this->load->view('admin/publications/events/edit_event', $data);
		$this->admin_footer();
	}


	public function edit_event_ajax($id) {
		//check event exists
		$this->check_data_exists($id, 'id', 'events', 'admin');
		$this->form_validation->set_rules('venue', 'Venue', 'trim|required');
		$this->form_validation->set_rules('caption', 'Event Caption', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');

		//config for file uploads
		$config['upload_path']          = 'assets/uploads/events'; //path to save the files
		$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';  //extensions which are allowed
		$config['max_size']             = 1024 * 4; //filesize cannot exceed 4MB
		$config['file_ext_tolower']     = TRUE; //force file extension to lower case
		$config['remove_spaces']        = TRUE; //replace space in file names with underscores to avoid break
		$config['detect_mime']          = TRUE; //detect type of file to avoid code injection

		$this->load->library('upload', $config);

		$y = $this->events_model->get_event_details($id);
		if ($this->form_validation->run()) {

			if ($_FILES['featured_image']['name'] == "") { //file is not selected

				$featured_image = $y->featured_image; //old featured image
				$thumbnail = $y->featured_image_thumb; //old thumbnail
				$this->events_model->edit_event($id, $featured_image, $thumbnail);
				$this->session->set_flashdata('status_msg', 'Event updated successfully.');
				redirect(site_url('events/edit_event/' . $id));
			} elseif ((!$this->upload->do_upload('featured_image')) && ($_FILES['featured_image']['name'] != "")) {
				//upload does not happen when file is selected
				$error = array('error' => $this->upload->display_errors());
				$this->edit_event($id, $error); //reload page with upload errors

			} else { //file is selected, upload happens, everyone is happy

				//delete old featured image and thumbnail from server
				$this->events_model->delete_events_featured_image($id);

				$featured_image = $this->upload->data('file_name');
				//generate thumbnail of the image with dimension 500x500
				$thumbnail = generate_image_thumb($featured_image, '500', '500');
				$this->events_model->edit_event($id, $featured_image, $thumbnail);
				$this->session->set_flashdata('status_msg', 'Event updated successfully.');
				redirect(site_url('events/edit_event/' . $id));
			}
		} else {
			$this->edit_event($id, $error); //validation fails, reload page with validation errors
		}
	}


	public function publish_event($id) {
		//check event exists
		$this->check_data_exists($id, 'id', 'events', 'admin');
		$this->events_model->publish_event($id);
		$this->session->set_flashdata('status_msg', 'Event published successfully.');
		redirect($this->agent->referrer());
	}


	public function unpublish_event($id) {
		//check event exists
		$this->check_data_exists($id, 'id', 'events', 'admin');
		$this->events_model->unpublish_event($id);
		$this->session->set_flashdata('status_msg', 'Event unpublished successfully.');
		redirect($this->agent->referrer());
	}


	public function delete_event($id) {
		//check event exists
		$this->check_data_exists($id, 'id', 'events', 'admin');
		$this->events_model->delete_event($id);
		$this->session->set_flashdata('status_msg', 'Event deleted successfully.');
		redirect($this->agent->referrer());
	}


	public function clear_events() {
		$this->events_model->clear_events();
		$this->session->set_flashdata('status_msg', 'Events cleared successfully.');
		redirect($this->agent->referrer());
	}


	public function bulk_actions_events() {
		$this->form_validation->set_rules('check_bulk_action', 'Bulk Select', 'trim');
		$selected_rows = count($this->input->post('check_bulk_action', TRUE));
		if ($this->form_validation->run()) {
			if ($selected_rows > 0) {
				$this->events_model->bulk_actions_events();
			} else {
				$this->session->set_flashdata('status_msg_error', 'No item selected.');
			}
		} else {
			$this->session->set_flashdata('status_msg_error', 'Bulk action failed!');
		}
		redirect($this->agent->referrer());
	}
}
