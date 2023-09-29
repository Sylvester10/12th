<?php
defined('BASEPATH') or die('Direct access not allowed');


/* ===== Documentation ===== 
Name: Home
Role: Controller
Description: Controls access to locations pages and functions in admin panel
Models: Locations_model
Author: Sylvester Esso Nmakwe
Date Created: 10th January, 2023
*/



class Locations extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->admin_restricted(); //allow only logged in users to access this class
        $this->load->model('locations_model');
        $this->admin_details = $this->common_model->get_admin_details($this->session->email);
    }



    /* ========== All locations ========== */
    public function index() {
        $inner_page_title = 'Locations (' . count($this->locations_model->get_locations()) . ')';
        $this->admin_header('Admin', $inner_page_title);
        $this->load->view('admin/locations/all_locations');
        $this->admin_footer();
    }

	
	public function locations_ajax() {
		$this->load->model('admin/locations/locations_model_ajax', 'current_model');
		$list = $this->current_model->get_records();
		$data = array();
		foreach ($list as $y) {
            
			$row = array();	
			$row[] = checkbox_bulk_action($y->id);
			$row[] = $this->current_model->options($y->id) . $this->current_model->modals($y->id);
			$row[] = $y->name; 
			$row[] = $y->about;  
			$row[] = x_date($y->date_added); 
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->current_model->count_all_records(),
			"recordsFiltered" => $this->current_model->count_filtered_records(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

    /* ========== Add locations ========== */
	public function new_location($error = array('error' => '')) {
		$this->admin_header('Admin', 'Add Location');
		$this->load->view('admin/locations/add_location', $error);
		$this->admin_footer();
	}
	
    
    public function add_location() {

        // validation rules
		$this->form_validation->set_rules('name', 'Location', 'trim|required');
		$this->form_validation->set_rules('about', 'Location info', 'trim|required');

        if ($this->form_validation->run()) {
			$this->locations_model->add_location(); //insert the data into db;
			$this->session->set_flashdata('status_msg', "Location added successfully.");
			redirect('locations');
		} else {
			echo validation_errors();
		}
		
	}


    public function edit_location($id, $error = array('error' => '')) { 
		//check location exists
		$this->check_data_exists($id, 'id', 'locations', 'admin');
		$location_details = $this->common_model->get_locations_details_by_id($id);
		$page_title = 'Edit Location: '  . $location_details->name;
		$this->admin_header($page_title, $page_title);
		$data['y'] = $location_details;
		$data['upload_error'] = $error;
		$this->load->view('admin/locations/edit_location', $data);
        $this->admin_footer();
        
    }


    public function edit_location_action($id) {
		$this->form_validation->set_rules('name', 'Location', 'trim|required');
		$this->form_validation->set_rules('about', 'Location info', 'trim|required');

		if ($this->form_validation->run())  {	
			
			$this->locations_model->edit_location($id);
			$this->session->set_flashdata('status_msg', "Location Updated successfully.");
			redirect('locations');
			
		} else { 
			echo validation_errors();
		}
	}


    public function delete_locations($id) {
        //check admin exists
        $this->check_data_exists($id, 'id', 'locations', 'admin');
        $this->locations_model->delete_locations($id);
        $this->session->set_flashdata('status_msg', 'locations deleted successfully.');
        redirect($this->agent->referrer());
    }


    public function bulk_actions_locations(){
        $this->form_validation->set_rules('check_bulk_action', 'Bulk Select', 'trim');
        $selected_rows = count($this->input->post('check_bulk_action', TRUE));
        if ($this->form_validation->run()) {
            if ($selected_rows > 0) {
                $this->locations_model->bulk_actions_locations();
            } else {
                $this->session->set_flashdata('status_msg_error', 'No item selected.');
            }
        } else {
            $this->session->set_flashdata('status_msg_error', 'Bulk action failed!');
        }
        redirect($this->agent->referrer());
    }
}
