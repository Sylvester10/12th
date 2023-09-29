<?php
defined('BASEPATH') or exit('Direct access to script not allowed');

/* ===== Documentation ===== 
Name: Testimonial_model
Role: Model
Description: Controls the DB processes of Testimonial from admin panel
Controller: Testimonial
Author: Sylvester Nmakwe
Date Created: 10th January, 2023
*/




class Testimonial_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}




	public function get_testimonial_details($id) {
		return $this->db->get_where('testimonials', array('id' => $id))->row();
	}


	public function get_all_testimonials() {
		$this->db->order_by('date', 'DESC');
		return $this->db->get_where('testimonials')->result();
	}


    public function count_all_testimonials() { 
		return $this->db->get_where('testimonials')->num_rows();
	}


	public function count_published_testimonials() { 
		return $this->db->get_where('testimonials', array('published' => 'true'))->num_rows();
	}


	public function count_unpublished_testimonials() { 
		return $this->db->get_where('testimonials', array('published' => 'false'))->num_rows();
	}


	public function get_recent_published_testimonials($limit) { //recent testimonials for homepage
		$this->db->order_by('date', 'DESC');
		$this->db->limit($limit); 
		return $this->db->get_where('testimonials', array('published' => 'true'))->result();
	}


	public function add_new_testimonial() {
		$name = ucwords($this->input->post('name', TRUE));
		$testimony = ucfirst($this->input->post('testimony', TRUE));
		$url = prep_url($url);
		$data = array (
			'name' => $name,
			'testimony' => $testimony,  
		);
		return $this->db->insert('testimonials', $data);
	}


	public function edit_testimonial($testimonial_id) {
		$name = ucwords($this->input->post('name', TRUE));
		$testimony = ucfirst($this->input->post('testimony', TRUE));
		$data = array (
			'name' => $name,
			'testimony' => $testimony, 
		);
		$this->db->where('id', $testimonial_id);
		return $this->db->update('testimonials', $data);
	}


	public function publish_testimonial($testimonial_id) { 
		$data = array (
			'published' => 'true',
		);
		$this->db->where('id', $testimonial_id);
		return $this->db->update('testimonials', $data);
	}


	public function unpublish_testimonial($testimonial_id) { 
		$data = array (
			'published' => 'false',
		);
		$this->db->where('id', $testimonial_id);
		return $this->db->update('testimonials', $data);
	}


	public function delete_testimonial($testimonial_id)	{
		$this->db->delete('testimonials', array('id' => $testimonial_id));
	}
	

	public function bulk_actions_testimonials() {
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		$bulk_action_type = $this->input->post('bulk_action_type', TRUE);		
		$row_id = $this->input->post('check_bulk_action', TRUE);
		$testimonials = ($selected_rows == 1) ? 'testimonial' : 'testimonials';
		foreach ($row_id as $testimonial_id) {
			switch ($bulk_action_type) {
				case 'publish':
					$this->publish_testimonial($testimonial_id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$testimonials} published successfully.");
				break;
				case 'unpublish':
					$this->unpublish_testimonial($testimonial_id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$testimonials} unpublished successfully.");
				break;
				case 'delete':
					$this->delete_testimonial($testimonial_id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$testimonials} deleted successfully.");
				break;
			}
		} 
	}



}