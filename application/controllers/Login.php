<?php
defined('BASEPATH') or exit('No direct script access allowed');


/* ===== Documentation ===== 
Name: Home
Role: Controller
Description: Controls access to login pages and functions in admin panel
Models: Login_model
Author: Sylvester Esso Nmakwe
Date Created: 10th January, 2023
*/



class Login extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}



	/* ========= Admin Login ============ */
	public function index() {
		//return admin to dashboard if still loggedin
		//$this->return_to_dashboard();
		$this->login_header('Admin Login');
		$this->load->view('login/login');
		$this->login_footer();
	}


	public function login_ajax() {
		$this->form_validation->set_rules(
			'email',
			'Email',
			'trim|required|valid_email',
			array('required' => 'Please enter your email')
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required',
			array('required' => 'Please enter your password')
		);

		$email = $this->input->post('email', TRUE);
		$password = $this->input->post('password', TRUE);
		$email_exists = $this->login_model->check_admin_email_exists($email);


		if ($this->form_validation->run()) {

			$y = $this->common_model->get_admin_details($email);
			if ($email_exists && $y->password == $password) {

				//email and password correct and user is active, create session with email and create login session
				$login_data = array('email' => $email, 'admin_loggedin' => true);
				$this->session->set_userdata($login_data);
				$res = ['status' => true, 'msg' => 'Login successful! <br> Redirecting to dashboard....'];
				echo json_encode($res);
				die;
			} else {
				//admin supplied wrong password
				$res = ['status' => false, 'msg' => 'Invalid login. Username or password incorrect'];
				echo json_encode($res);
				die;
			}
		} else { //form validation is not successful
			$res = ['status' => false, 'msg' => validation_errors()];
			echo json_encode($res);
		}
	}


	public function logout() {
		$data = array('email', 'admin_loggedin');
		$this->session->unset_userdata($data);
		redirect(site_url('login'));
	}






}
