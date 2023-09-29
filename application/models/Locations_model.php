<?php
defined('BASEPATH') or exit('Direct access to script not allowed');

/* ===== Documentation ===== 
Name: Locations_model
Role: Model
Description: Controls the DB processes of Locations from admin panel
Controller: Locations
Author: Sylvester Nmakwe
Date Created: 10th January, 2023
*/





class Locations_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}


    
	//get all locations
	public function get_locations() {
		$this->db->order_by('date_added', 'DESC');
		return $this->db->get_where('locations')->result();
	}


	//get locations details by id
	public function get_locations_details($id) { 
		return $this->db->get_where('locations', array('id' => $id))->row();
	}


	//get locations details by location
	public function get_locations_details_idu() { 
		return $this->db->get_where('locations', array('name' => 'idu'))->row();
	}


	//get locations details by lugbe
	public function get_locations_details_lugbe() { 
		return $this->db->get_where('locations', array('name' => 'lugbe'))->row();
	}


	//get locations details by kurudu
	public function get_locations_details_kurudu() { 
		return $this->db->get_where('locations', array('name' => 'kurudu'))->row();
	}


	//count all locations
	public function count_locations() { 
		return $this->db->get_where('locations')->num_rows();
	}
	

    //add locations
	public function add_location() {
		$name = ucwords($this->input->post('name', TRUE));
		$about = $this->input->post('about', TRUE);
		$data = array(
			'name' => $name,
			'about' => $about,
		);
		$this->db->insert('locations', $data);

				
	}


	//edit locations
	public function edit_location($id) {
		$name = ucwords($this->input->post('name', TRUE));
		$about = $this->input->post('about', TRUE);

		$data = array(
			'name' => $name,
			'about' => $about,
		);
		$this->db->where('id', $id);
		return $this->db->update('locations', $data);
	}


	//delete locations
	public function delete_locations($id) {
		$y = $this->common_model->get_locations_details_by_id($id);
		return $this->db->delete('locations', array('id' => $id));
	}


	public function bulk_actions_locations() {
		$selected_rows = count($this->input->post('check_bulk_action', TRUE));
		$bulk_action_type = $this->input->post('bulk_action_type', TRUE);
		$row_id = $this->input->post('check_bulk_action', TRUE);
		foreach ($row_id as $id) {
			switch ($bulk_action_type) {
				case 'delete':
					$this->delete_locations($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} locations(s) deleted successfully.");
			}
		}
	}










}
