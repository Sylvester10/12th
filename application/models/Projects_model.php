<?php
defined('BASEPATH') or exit('Direct access to script not allowed');

/* ===== Documentation ===== 
Name: Projects_model
Role: Model
Description: Controls the DB processes of Projects from admin panel
Controller: Projects
Author: Sylvester Nmakwe
Date Created: 10th January, 2023
*/




class Projects_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('profile_model');
	}




	public function get_project_details($id) {
		return $this->db->get_where('projects', array('id' => $id))->row();
	}
	

	public function get_recent_published_projects($limit) { //recent blog for homepage and sidebar
		$this->db->order_by('date_created', 'DESC');
		$this->db->limit($limit);
		return $this->db->get_where('projects', array('published' => 'true'))->result();
	}


	public function get_published_upcoming_projects($limit, $offset) {
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("date_created", "ASC"); //order by date_unix ASC so that the dates appear chronologically
		$date_unix_today = date('Ymd');
		$where = array(
			'published' => 'true',
			'date_created >=' => $date_unix_today, //ensure project date is not in the past
		);
		$this->db->where($where);
		$query = $this->db->get('projects');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}


	public function count_upcoming_projects() {
		$date_unix_today = date('Ymd');
		$where = array(
			'date_unix >=' => $date_unix_today, //ensure project date is not in the past
		);
		$this->db->where($where);
		return $this->db->get('projects')->num_rows();
	}


	/* =========== All projects ============== */
	public function get_projects($limit) { //get all projects
		$this->db->order_by('date_created', 'DESC');
		$this->db->limit($limit);
		return $this->db->get_where('projects')->result();
	}


	public function get_projects_list($limit, $offset) {
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("date_created", "DESC"); //order by date_created DESC so that the dates appear chronologically
		$query = $this->db->get_where('projects');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}


	public function get_published_projects_list($limit, $offset) {
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("date_created", "DESC"); //order by date_unix ASC so that the dates appear chronologically
		$query = $this->db->get_where('projects');
		$where = array(
			'published' => 'true', //Ensure project has been published
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


	public function count_projects() {
		return $this->db->get_where('projects')->num_rows();
	}


	public function count_published_projects() {
		return $this->db->get_where('projects', array('published' => 'true'))->num_rows();
	}


	public function count_unpublished_projects() {
		return $this->db->get_where('projects', array('published' => 'false'))->num_rows();
	}


	/* ========== Admin Actions: projects ============= */
	public function add_project($featured_image, $thumbnail, $brochure_file) {

		$title = ucwords($this->input->post('title', TRUE));
		$location = ucwords($this->input->post('location', TRUE));
		$description = nl2br(ucfirst($this->input->post('description', TRUE)));
		$snippet = mb_strimwidth(strip_tags($description), 0, 150, "...");

		$data = array(
			'title' => $title,
			'location' => $location,
			'description' => $description,
			'snippet' => $snippet,
			'featured_image' => $featured_image,
			'featured_image_thumb' => $thumbnail,
			'brochure_file' => $brochure_file,
			'published' => 'true',
		);
		return $this->db->insert('projects', $data);
	}


	public function edit_project($id, $featured_image, $thumbnail, $brochure_file) {

		$title = ucwords($this->input->post('title', TRUE));
		$location = ucwords($this->input->post('location', TRUE));
		$description = nl2br(ucfirst($this->input->post('description', TRUE)));
		$snippet = mb_strimwidth(strip_tags($description), 0, 150, "...");

		$data = array(
			'title' => $title,
			'location' => $location,
			'description' => $description,
			'snippet' => $snippet,
			'featured_image' => $featured_image,
			'featured_image_thumb' => $thumbnail,
			'brochure_file' => $brochure_file,
			'published' => 'true',
		);
		$this->db->where('id', $id);
		return $this->db->update('projects', $data);
	}


	public function publish_project($id) {
		$data = array(
			'published' => 'true',
		);
		$this->db->where('id', $id);
		return $this->db->update('projects', $data);
	}


	public function unpublish_project($id) {
		$data = array(
			'published' => 'false',
		);
		$this->db->where('id', $id);
		return $this->db->update('projects', $data);
	}


	public function delete_project_featured_images($id) {
		$y = $this->get_project_details($id);
		$featured_images = $y->featured_image;
		$featured_images_thumb = $y->featured_image_thumb;
		$folder = "./assets/uploads/projects/";
		
		$this->delete_file($featured_images, $folder);
		$this->delete_file($featured_images_thumb, $folder);
		
		
	}


	public function delete_project_brochure($id) {
		$y = $this->get_project_details($id);
		$brochure = $y->brochure_file;
		$folder = "./assets/uploads/projects/";
		
		$this->delete_file($brochure, $folder);
		
		
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


	public function delete_project($id) {
		$y = $this->get_project_details($id);
		//$this->delete_projects_featured_image($id); //remove image files from server
		return $this->db->delete('projects', array('id' => $id));
	}


	public function clear_projects() {
		return $this->db->truncate('projects');
	}


	public function bulk_actions_projects() {
		$selected_rows = count($this->input->post('check_bulk_action', TRUE));
		$bulk_action_type = $this->input->post('bulk_action_type', TRUE);
		$row_id = $this->input->post('check_bulk_action', TRUE);
		$projects = ($selected_rows == 1) ? 'project' : 'projects';
		foreach ($row_id as $id) {
			switch ($bulk_action_type) {
				case 'publish':
					$this->publish_project($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$projects} published successfully.");
					break;
				case 'unpublish':
					$this->unpublish_project($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$projects} unpublished successfully.");
					break;
				case 'delete':
					$this->delete_project($id);
					$this->session->set_flashdata('status_msg', "{$selected_rows} {$projects} deleted successfully.");
					break;
			}
		}
	}






    
}



