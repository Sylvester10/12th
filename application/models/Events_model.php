<?php
defined('BASEPATH') or exit('Direct access to script not allowed');

/* ===== Documentation ===== 
Name: Events_model
Role: Model
Description: Controls the DB processes of Events from admin panel
Controller: Events
Author: Sylvester Nmakwe
Date Created: 10th January, 2023
*/




class Events_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('profile_model');
	}




	public function get_event_details($id) {
		return $this->db->get_where('events', array('id' => $id))->row();
	}
	

	public function get_recent_published_events($limit) { //recent blog for homepage and sidebar
		$this->db->order_by('date_created', 'DESC');
		$this->db->limit($limit);
		return $this->db->get_where('events', array('published' => 'true'))->result();
	}


	public function get_published_upcoming_events($limit, $offset) {
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("date_created", "ASC"); //order by date_unix ASC so that the dates appear chronologically
		$date_unix_today = date('Ymd');
		$where = array(
			'published' => 'true',
			'date_created >=' => $date_unix_today, //ensure event date is not in the past
		);
		$this->db->where($where);
		$query = $this->db->get('events');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}


	public function count_upcoming_events() {
		$date_unix_today = date('Ymd');
		$where = array(
			'date_unix >=' => $date_unix_today, //ensure event date is not in the past
		);
		$this->db->where($where);
		return $this->db->get('events')->num_rows();
	}


	public function count_published_upcoming_events() {
		$where = array(
			'published' => 'true',
		);
		$this->db->where($where);
		return $this->db->get('events')->num_rows();
	}


	public function count_unpublished_upcoming_events() {
		$date_unix_today = date('Ymd');
		$where = array(
			'published' => 'false',
			'date_unix >=' => $date_unix_today, //ensure event date is not in the past
		);
		$this->db->where($where);
		return $this->db->get('events')->num_rows();
	}



	/* =========== All Events ============== */
	public function get_events($limit) { //get all events
		$this->db->order_by('date_created', 'DESC');
		$this->db->limit($limit);
		return $this->db->get_where('events')->result();
	}


	public function get_events_list($limit, $offset) {
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("date_created", "DESC"); //order by date_created DESC so that the dates appear chronologically
		$query = $this->db->get_where('events');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}


	public function get_published_events_list($limit, $offset) {
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("date_created", "DESC"); //order by date_unix ASC so that the dates appear chronologically
		$query = $this->db->get_where('events');
		$where = array(
			'published' => 'true', //Ensure event has been published
		);
		$this->db->where($where);
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}


	public function count_events() {
		return $this->db->get_where('events')->num_rows();
	}


	public function count_published_events() {
		return $this->db->get_where('events', array('published' => 'true'))->num_rows();
	}


	public function count_unpublished_events() {
		return $this->db->get_where('events', array('published' => 'false'))->num_rows();
	}


	/* ========== Admin Actions: Events ============= */
	public function create_event($featured_image, $thumbnail) {

		$venue = ucwords($this->input->post('venue', TRUE));
		$caption = ucwords($this->input->post('caption', TRUE));
		$description = nl2br(ucfirst($this->input->post('description', TRUE)));
		$snippet = mb_strimwidth(strip_tags($description), 0, 50, "...");

		$data = array(
			'venue' => $venue,
			'caption' => $caption,
			'description' => $description,
			'snippet' => $snippet,
			'featured_image' => $featured_image,
			'featured_image_thumb' => $thumbnail,
			'published' => 'true',
		);
		return $this->db->insert('events', $data);
	}


	public function edit_event($id, $featured_image, $thumbnail) {

		$venue = ucwords($this->input->post('venue', TRUE));
		$caption = ucwords($this->input->post('caption', TRUE));
		$description = nl2br(ucfirst($this->input->post('description', TRUE)));
		$snippet = mb_strimwidth(strip_tags($description), 0, 50, "...");

		$data = array(
			'venue' => $venue,
			'caption' => $caption,
			'description' => $description,
			'snippet' => $snippet,
			'featured_image' => $featured_image,
			'featured_image_thumb' => $thumbnail,
			'published' => 'true',
		);
		$this->db->where('id', $id);
		return $this->db->update('events', $data);
	}


	public function publish_event($id) {
		$data = array(
			'published' => 'true',
		);
		$this->db->where('id', $id);
		return $this->db->update('events', $data);
	}


	public function unpublish_event($id) {
		$data = array(
			'published' => 'false',
		);
		$this->db->where('id', $id);
		return $this->db->update('events', $data);
	}


	public function delete_events_featured_image($id) {
		$y = $this->get_event_details($id);
		unlink('./assets/uploads/events/' . $y->featured_image); //delete the featured image
		unlink('./assets/uploads/events/' . $y->featured_image_thumb); //delete the thumbnail
	}


	public function delete_event($id) {
		$y = $this->get_event_details($id);
		//$this->delete_events_featured_image($id); //remove image files from server
		return $this->db->delete('events', array('id' => $id));
	}


	public function clear_events() {
		return $this->db->truncate('events');
	}


	public function bulk_actions_events() {
		$selected_rows = count($this->input->post('check_bulk_action', TRUE));
		$bulk_action_type = $this->input->post('bulk_action_type', TRUE);
		$row_id = $this->input->post('check_bulk_action', TRUE);
		$events = ($selected_rows == 1) ? 'event' : 'events';
		foreach ($row_id as $id) {
			switch ($bulk_action_type) {
				case 'publish':
					$this->publish_event($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$events} published successfully.");
					break;
				case 'unpublish':
					$this->unpublish_event($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$events} unpublished successfully.");
					break;
				case 'delete':
					$this->delete_event($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$events} deleted successfully.");
					break;
			}
		}
	}




}
