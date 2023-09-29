<?php
defined('BASEPATH') or exit('Direct access to script not allowed');

/* ===== Documentation ===== 
Name: about_model
Role: Model
Description: Controls the DB processes of about from super admin panel
Controller: About
Author: Sylvester Nmakwe
Date Created: 10th January, 2023
*/




class About_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}




	public function get_about_details($id) {
		return $this->db->get_where('about', array('id' => $id))->row();
	}


	public function get_all_about() {
		$this->db->order_by("date_added","desc");
		return $this->db->get_where('about')->result();
	}


    public function count_all_about() { 
		return $this->db->get_where('about')->num_rows();
	}


	public function count_published_about() { 
		return $this->db->get_where('about', array('published' => 'true'))->num_rows();
	}


	public function count_unpublished_about() { 
		return $this->db->get_where('about', array('published' => 'false'))->num_rows();
	}


	public function get_recent_published_about($limit) { //recent about for homepage
		$this->db->order_by('date_added', 'DESC');
		$this->db->limit($limit); 
		return $this->db->get_where('about', array('published' => 'true'))->result();
	}

	public function add_new_about() {
		$about = ucfirst($this->input->post('about', TRUE));
		$date_added = time();
		
		$data = array (
			'about' => $about, 
			'date_added' => $date_added,  
		);
		return $this->db->insert('about', $data);
	}
	

	public function edit_about($about_id) {
		$about = ucfirst($this->input->post('about', TRUE));
		$date_added = time();
		
		$data = array (
			'about' => $about, 
			'date_added' => $date_added,
		);
		$this->db->where('id', $about_id);
		return $this->db->update('about', $data);
	}


	public function publish_about($about_id) { 
		$data = array (
			'published' => 'true',
		);
		$this->db->where('id', $about_id);
		return $this->db->update('about', $data);
	}


	public function unpublish_about($about_id) { 
		$data = array (
			'published' => 'false',
		);
		$this->db->where('id', $about_id);
		return $this->db->update('about', $data);
	}


	public function delete_about($about_id)	{
		$this->db->delete('about', array('id' => $about_id));
	}

	
	public function bulk_actions_about() {
		$selected_rows = count($this->input->post('check_bulk_action', TRUE)); 
		$bulk_action_type = $this->input->post('bulk_action_type', TRUE);		
		$row_id = $this->input->post('check_bulk_action', TRUE);
		$about = ($selected_rows == 1) ? 'about' : 'about';
		foreach ($row_id as $about_id) {
			switch ($bulk_action_type) {
				case 'publish':
					$this->publish_about($about_id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$about} published successfully.");
				break;
				case 'unpublish':
					$this->unpublish_about($about_id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$about} unpublished successfully.");
				break;
				case 'delete':
					$this->delete_about($about_id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$about} deleted successfully.");
				break;
			}
		} 
	}



}