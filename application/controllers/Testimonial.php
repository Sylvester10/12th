<?php
defined('BASEPATH') or die('Direct access not allowed');


/* ===== Documentation ===== 
Name: Home
Role: Controller
Description: Controls access to Testimonial pages and functions in admin panel
Models: Testimonial_model
Author: Sylvester Esso Nmakwe
Date Created: 10th January, 2023
*/



class Testimonial extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->admin_restricted(); //allow only logged in super admins to access this class
		$this->load->model('testimonial_model');
		$this->admin_details = $this->common_model->get_admin_details($this->session->admin_email);
	}




	/* ====== Contact testimonials ====== */
	public function index() {
		$total_records = $this->testimonial_model->count_all_testimonials();
		$inner_page_title = 'Testimonials (' . $total_records . ')'; 
		$this->admin_header('Testimonials', $inner_page_title);	
		$data['total_records'] = $this->testimonial_model->count_all_testimonials();
        $data['testimony'] = $this->testimonial_model->get_all_testimonials();
		$this->load->view('admin/testimonials/all_testimonials', $data);
        $this->admin_footer();
	}
	
	
	public function add_new_testimonial() {	
		$this->form_validation->set_rules('name', 'Name', 'trim|min_length[2]|max_length[500]required');
		$this->form_validation->set_rules('testimony', 'Testimony', 'trim|required');

		if ($this->form_validation->run())  {		
			$this->testimonial_model->add_new_testimonial();
			$this->session->set_flashdata('status_msg', "Testimonial added successfully.");
			redirect('testimonial');
		} else { 
			echo validation_errors();
		}
    }


	public function edit_testimonial_action($testimonial_id) {
		$this->form_validation->set_rules('name', 'Name', 'trim|min_length[2]|max_length[500]required');
		$this->form_validation->set_rules('testimony', 'Testimony', 'trim|required');

		if ($this->form_validation->run())  {		
			$this->testimonial_model->edit_testimonial($testimonial_id);
			$this->session->set_flashdata('status_msg', "Testimonial Updated successfully.");
			redirect('testimonial');
		} else { 
			echo validation_errors();
		}
	}


	public function publish_testimonial($testimonial_id) { 
		$this->testimonial_model->publish_testimonial($testimonial_id);
		$this->session->set_flashdata('status_msg', 'Testimonial published successfully.');
		redirect($this->agent->referrer());
	}
	

	public function unpublish_testimonial($testimonial_id) { 
		//check photo exists
		$this->check_data_exists($testimonial_id, 'id', 'testimonials', 'testimonial');
		$this->testimonial_model->unpublish_testimonial($testimonial_id);
		$this->session->set_flashdata('status_msg', 'Testimonial Unpublished successfully.');
		redirect($this->agent->referrer());
	}

	
	public function delete_testimonial($testimonial_id) { 
		$this->testimonial_model->delete_testimonial($testimonial_id);
		$this->session->set_flashdata('status_msg', 'Testimonial deleted successfully.');
		redirect($this->agent->referrer());
	}
	
	
	public function bulk_actions_testimonials() { 
		$this->form_validation->set_rules('check_bulk_action', 'Bulk Select', 'trim');
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		if ($this->form_validation->run()) {
			if ($selected_rows > 0) {
				$this->testimonial_model->bulk_actions_testimonials();
			} else {
				$this->session->set_flashdata('status_msg_error', 'No item selected.');
			}
		} else {
			$this->session->set_flashdata('status_msg_error', 'Bulk action failed!');
		}
		redirect($this->agent->referrer());
	}





}