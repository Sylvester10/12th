<?php
defined('BASEPATH') or exit('Direct access to script not allowed');

/* ===Property_model
Role: Model
Description: Controls the DB processes of Property from admin panel
Controller: Property
Author: Sylvester Nmakwe
Date Created: 10th January, 2023
*/




class Property_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}




	//get all property
	public function get_property() {
		$this->db->order_by('date_added', 'DESC');
		return $this->db->get_where('property')->result();
	}


	//recent properties for events page with limit
	public function get_property_limit($limit) { 
		$this->db->order_by('date_added', 'DESC');
		$this->db->limit($limit); 
		return $this->db->get_where('property', array('published' => 'true'))->result();
	}


	//get all for homepage
	public function get_property_list($limit, $offset) {
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("date_added", "DESC"); //order by date_created DESC so that the dates appear chronologically
		$query = $this->db->get_where('property');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}


	//get property list in idu
	public function get_property_list_in_idu($limit, $offset) {
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->where("lga", "idu");
		$this->db->order_by("date_added", "DESC"); //order by date_created DESC so that the dates appear chronologically
		$query = $this->db->get_where('property');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}


	//get property list in lugbe
	public function get_property_list_in_lugbe($limit, $offset) {
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->where("lga", "lugbe");
		$this->db->order_by("date_added", "DESC"); //order by date_created DESC so that the dates appear chronologically
		$query = $this->db->get_where('property');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}


	//get property list in kurudu
	public function get_property_list_in_kurudu($limit, $offset) {
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->where("lga", "kurudu");
		$this->db->order_by("date_added", "DESC"); //order by date_created DESC so that the dates appear chronologically
		$query = $this->db->get_where('property');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}


	//get all published property
	public function get_published_property() {
		$this->db->where('published', 'true');
		return $this->db->get_where('property')->result();
	}


	//get property details by id
	public function get_property_details($id) { //get property info by id
		return $this->db->get_where('property', array('id' => $id))->row();
	}


	//get all available property
	public function get_available_property() {
		$this->db->where('availability', 'true');
		return $this->db->get_where('property')->result();
	}


	//get all published property in idu
	public function get_published_property_in_idu() {
		$this->db->where(array('lga' => 'idu', 'published' => 'true'));
		return $this->db->get_where('property')->result();
	}


	//get all published property in lugbe
	public function get_published_property_in_lugbe() {
		$this->db->where(array('lga' => 'lugbe', 'published' => 'true'));
		return $this->db->get_where('property')->result();
	}


	//get all published property in kurudu
	public function get_published_property_in_kurudu() {
		$this->db->where(array('lga' => 'kurudu', 'published' => 'true'));
		return $this->db->get_where('property')->result();
	}


	//count all properties
	public function count_property() { 
		return $this->db->get_where('property')->num_rows();
	}


	//count all properties in idu
	public function count_property_in_idu() { 
		return $this->db->get_where('property', array('lga' => 'idu'))->num_rows();
	}


	//count all properties in lugbe
	public function count_property_in_lugbe() { 
		return $this->db->get_where('property', array('lga' => 'lugbe'))->num_rows();
	}


	//count all properties in kurudu
	public function count_property_in_kurudu() { 
		return $this->db->get_where('property', array('lga' => 'kurudu'))->num_rows();
	}


	//count published properties
	public function count_published_property() {
		return $this->db->get_where('property', array('published' => 'true'))->num_rows();
	}


	//count published properties
	public function count_unpublished_property() {
		return $this->db->get_where('property', array('published' => 'false'))->num_rows();
	}


	//count all properties in Idu
	public function count_published_idu_property() {
		return $this->db->get_where('property', array('published' => 'true', 'lga' => 'idu'))->num_rows();
	}

	//count all properties in Lugbe
	public function count_published_lugbe_property() {
		return $this->db->get_where('property', array('published' => 'true', 'lga' => 'lugbe'))->num_rows();
	}

	//count all properties in Kurudu
	public function count_published_kurudu_property() {
		return $this->db->get_where('property', array('published' => 'true', 'lga' => 'kurudu'))->num_rows();
	}


	//add property
	public function add_new_property($featured_image, $thumbnail, $floor_plans, $floor_plans_thumbnail) {
		$title = ucwords($this->input->post('title', TRUE));
		$description = $this->input->post('description', TRUE);
		$price = $this->input->post('price', TRUE);
		$state = ucwords($this->input->post('state', TRUE));
		$lga = ucwords($this->input->post('lga', TRUE));
		$address = $this->input->post('address', TRUE);
		$amenities = ucwords(implode(", ", $this->input->post('amenities', TRUE)));
		$video = $this->input->post('video', TRUE);

		$data = array(
			'title' => $title,
			'description' => $description,
			'price' => $price,
			'state' => $state,
			'lga' => $lga,
			'address' => $address,
			'amenities' => $amenities,
			'video' => $video,
			'featured_image' => $featured_image,
			'featured_image_thumb' => $thumbnail,
			'floor_plans' => $floor_plans,
			'floor_plans_thumb' => $floor_plans_thumbnail,
		);
		$this->db->insert('property', $data);
	}


	//edit property
	public function edit_property($id, $featured_image, $thumbnail, $floor_plans, $floor_plans_thumbnail) {
		$title = ucwords($this->input->post('title', TRUE));
		$description = $this->input->post('description', TRUE);
		$price = $this->input->post('price', TRUE);
		$state = ucwords($this->input->post('state', TRUE));
		$lga = $this->input->post('lga', TRUE);
		$address = $this->input->post('address', TRUE);
		$amenities = ucwords(implode(", ", $this->input->post('amenities', TRUE)));
		$video = $this->input->post('video', TRUE);

		$data = array(
			'title' => $title,
			'description' => $description,
			'price' => $price,
			'state' => $state,
			'lga' => $lga,
			'address' => $address,
			'amenities' => $amenities,
			'video' => $video,
			'featured_image' => $featured_image,
			'featured_image_thumb' => $thumbnail,
			'floor_plans' => $floor_plans,
			'floor_plans_thumb' => $floor_plans_thumbnail,
		);
		$this->db->where('id', $id);
		return $this->db->update('property', $data);
	}


	//publish property
	public function publish_property($id) {
		$data = array(
			'published' => 'true',
		);
		$this->db->where('id', $id);
		return $this->db->update('property', $data);
	}


	//unpublish proprety
	public function unpublish_property($id) {
		$data = array(
			'published' => 'false',
		);
		$this->db->where('id', $id);
		return $this->db->update('property', $data);
	}


	//property available
	public function available($id) {
		$data = array(
			'availability' => 'true',
		);
		$this->db->where('id', $id);
		return $this->db->update('property', $data);
	}


	//property sold
	public function sold($id) {
		$data = array(
			'availability' => 'false',
		);
		$this->db->where('id', $id);
		return $this->db->update('property', $data);
	}


	//delete property image
	public function delete_property_featured_images($id) {
		$y = $this->get_property_details($id);
		$featured_images = $y->featured_image;
		$featured_images_thumb = $y->featured_image_thumb;
		$folder = "./assets/uploads/property/";
		
		$this->delete_file($featured_images, $folder);
		$this->delete_file($featured_images_thumb, $folder);
		
		
	}


	public function delete_property_floor_plans_images($id) {
		$y = $this->get_property_details($id);
		$floor_plans = $y->floor_plans;
		$floor_plans_thumb = $y->floor_plans_thumb;
		$folder = "./assets/uploads/property/";
		
		$this->delete_file($floor_plans, $folder);
		$this->delete_file($floor_plans_thumb, $folder);
		
		
	}


	public function delete_file($files, $folder) {
		if (is_string($files)) {
			$files = explode(',',$files);
			foreach($files as $file) {
				$file = trim($file);
				$file = $folder . $file;
				if(file_exists($file)) {
				  unlink($file);
				}
			}
			return true;
		}else {
			return false;
		}
	}


	//delete property
	public function delete_property($id) {
		$y = $this->common_model->get_property_details_by_id($id);
		 //remove image files from server
		$this->delete_property_featured_images($id);
		$this->delete_property_floor_plans_images($id);
		return $this->db->delete('property', array('id' => $id));
	}


	public function bulk_actions_property() {
		$selected_rows = count($this->input->post('check_bulk_action', TRUE));
		$bulk_action_type = $this->input->post('bulk_action_type', TRUE);
		$row_id = $this->input->post('check_bulk_action', TRUE);
		foreach ($row_id as $id) {
			switch ($bulk_action_type) {
				case 'delete':
					$this->delete_property($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} property(s) deleted successfully.");
					break;
				case 'publish':
					$this->publish_property($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} property(s) published successfully.");
					break;
				case 'unpublish':
					$this->unpublish_property($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} property(s) unpublished successfully.");
					break;
				case 'available':
					$this->available($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} property(s) now available");
					break;
				case 'sold':
					$this->sold($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} property(s) sold.");
					break;
			}
		}
	}
}
