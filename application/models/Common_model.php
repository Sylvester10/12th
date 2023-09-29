<?php
defined('BASEPATH') or exit('Direct access to script not allowed');


class Common_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}



	/* ===== Last Login ===== */
	public function update_last_login($user_id, $table)
	{
		$data = array(
			'last_login' => date('Y-m-d H:i:s'), //curent timestamp	 
		);
		$this->db->where('id', $user_id);
		return $this->db->update($table, $data);
	}


	public function get_last_login_stats($period, $period_type, $table)
	{
		$period_type = strtoupper($period_type);
		$where = 	"last_login IS NOT NULL AND 
					last_login > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL {$period} {$period_type})";
		$this->db->where($where);
		$query = $this->db->get($table)->num_rows();
		return $query;
	}





	/* =================== Admins ====================== */
	public function get_admin_details($email)
	{ //get admin info by email
		return $this->db->get_where('admins', array('email' => $email))->row();
	}


	public function get_admin_details_by_id($id)
	{ //get admin info	id
		return $this->db->get_where('admins', array('id' => $id))->row();
	}


	public function get_admins()
	{ //get all admins
		return $this->db->get_where('admins')->result();
	}


	/* =================== Staff ====================== */
	public function get_staff_details($email)
	{ //get staff info by email
		return $this->db->get_where('staff', array('email' => $email))->row();
	}


	public function get_staff_details_by_id($id)
	{ //get staff info	id
		return $this->db->get_where('staff', array('id' => $id))->row();
	}


	public function get_staff()
	{ //get all staff
		return $this->db->get_where('staff')->result();
	}

	public function get_activated_staff()
	{ //get all active staff
		return $this->db->get_where('staff', array('active' => 'true'))->result();
	}


	/* =================== Events ====================== */
	public function get_events_details($email)
	{ //get event info by email
		return $this->db->get_where('events', array('email' => $email))->row();
	}


	public function get_events_details_by_id($id)
	{ //get event info by id
		return $this->db->get_where('events', array('id' => $id))->row();
	}


	public function get_event()
	{ //get all events
		$this->db->order_by('date_added', 'DESC');
		return $this->db->get_where('events')->result();
	}

	public function get_events($limit)
	{ //get all events with page limit
		$this->db->order_by('date_added', 'DESC');
		$this->db->limit($limit);
		return $this->db->get_where('events')->result();
	}


	/* =================== Property ====================== */
	public function get_property_details($email)
	{ //get property info by email
		return $this->db->get_where('property', array('email' => $email))->row();
	}


	public function get_property_details_by_id($id)
	{ //get property info by id
		return $this->db->get_where('property', array('id' => $id))->row();
	}


	public function get_property()
	{ //get all property
		$this->db->order_by('date_added', 'DESC');
		return $this->db->get_where('property')->result();
	}

	public function get_properties($limit)
	{ //get all property with page limit
		$this->db->order_by('date_added', 'DESC');
		$this->db->limit($limit);
		return $this->db->get_where('property')->result();
	}

	public function get_published_property()
	{ //get all published property
		return $this->db->get_where('property', array('published' => 'true'))->result();
	}



	/* =================== Affiliates ====================== */
	public function get_affiliates()
	{ //get all property
		$this->db->order_by('date_added', 'DESC');
		return $this->db->get_where('affiliates')->result();
	}


	public function get_affiliates_details_by_id($id)
	{ //get property info by id
		return $this->db->get_where('affiliates', array('id' => $id))->row();
	}


	/* =================== Locations ====================== */
	public function get_locations()
	{ //get all property
		$this->db->order_by('date_added', 'DESC');
		return $this->db->get_where('locations')->result();
	}


	public function get_locations_details_by_id($id)
	{ //get property info by id
		return $this->db->get_where('locations', array('id' => $id))->row();
	}


	/* =================== Projects ====================== */
	public function get_project_details($email)
	{ //get property info by email
		return $this->db->get_where('projects', array('email' => $email))->row();
	}


	public function get_project_details_by_id($id)
	{ //get property info by id
		return $this->db->get_where('projects', array('id' => $id))->row();
	}


	public function get_projects()
	{ //get all property
		$this->db->order_by('date_created', 'DESC');
		return $this->db->get_where('projects')->result();
	}

	public function get_project($limit)
	{ //get all property with page limit
		$this->db->order_by('date_created', 'DESC');
		$this->db->limit($limit);
		return $this->db->get_where('projects')->result();
	}

	public function get_published_projects()
	{ //get all published property
		return $this->db->get_where('projects', array('published' => 'true'))->result();
	}
}
