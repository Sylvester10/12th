<?php
defined('BASEPATH') or exit('Direct access to script not allowed');

/* ===== Documentation ===== 
Name: Affiliates_model
Role: Model
Description: Controls the DB processes of Affiliates from admin panel
Controller: Affiliates
Author: Sylvester Nmakwe
Date Created: 10th January, 2023
*/




class Affiliates_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


    
	//get all affiliates
	public function get_affiliates() {
		$this->db->order_by('date_added', 'DESC');
		return $this->db->get_where('affiliates')->result();
	}


	//get affiliates details by id
	public function get_affiliates_details($id) { 
		return $this->db->get_where('affiliates', array('id' => $id))->row();
	}


	//count all affiliates
	public function count_affiliates() { 
		return $this->db->get_where('affiliates')->num_rows();
	}


	//Add affiliate
	public function add_affilate($cv) {

		$name = ucwords($this->input->post('name', TRUE));
		$email = $this->input->post('email', TRUE);
		$phone = $this->input->post('phone', TRUE);
		$address = ucfirst($this->input->post('address', TRUE));
		$dob = $this->input->post('dob', TRUE);
		$qualification = $this->input->post('qualification', TRUE);
		$experience = $this->input->post('experience', TRUE);
		$cover_letter = ucfirst($this->input->post('cover_letter', TRUE));

		$data = array(
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'address' => $address,
			'dob' => $dob,
			'qualification' => $qualification,
			'experience' => $experience,
			'cover_letter' => $cover_letter,
			'cv' => $cv,
		);
		return $this->db->insert('affiliates', $data);
	}


	//delete affiliates
	public function delete_affiliates($id) {
		$y = $this->common_model->get_affiliates_details_by_id($id);
		return $this->db->delete('affiliates', array('id' => $id));
	}


	public function bulk_actions_affiliates() {
		$selected_rows = count($this->input->post('check_bulk_action', TRUE));
		$bulk_action_type = $this->input->post('bulk_action_type', TRUE);
		$row_id = $this->input->post('check_bulk_action', TRUE);
		foreach ($row_id as $id) {
			switch ($bulk_action_type) {
				case 'delete':
					$this->delete_affiliates($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} affiliates(s) deleted successfully.");
			}
		}
	}










}
