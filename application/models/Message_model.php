<?php
defined('BASEPATH') or exit('Direct access to script not allowed');

/* ===== Documentation ===== 
Name: Message_model
Role: Model
Description: Controls the DB processes of Message from admin panel
Controller: Message
Author: Sylvester Nmakwe
Date Created: 10th January, 2023
*/




class Message_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}



	public function contact_us() {
		$name = ucwords($this->input->post('name', TRUE));
		$email = $this->input->post('email', TRUE);
		$phone = ucwords($this->input->post('phone', TRUE));
		$message = ucfirst($this->input->post('message', TRUE));
		$message = nl2br($message);
		$data = array(
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'message' => $message,
		);
		$this->db->insert('contact_messages', $data);

		//email admin		
	}




	public function send_email() {

		$email = strtolower($this->input->post('email', TRUE));
		$subject = ucfirst($this->input->post('subject', TRUE));
		$message = nl2br(ucfirst($this->input->post('message', TRUE)));

		$data = array(
			'email' => $email,
			'subject' => $subject,
			'message' => $message,
		);

		//Send email to user
		try {

			require_once 'application/third_party/mail.php';
			$mail->addAddress($email);
			//$mail->AddEmbeddedImage('application/third_party/image/check.png', 'check', 'check.png');
			$mail->AddEmbeddedImage('application/third_party/image/12th_city_logo.png','logo','12th_logo.jpg');
			$body = $body = '<!DOCTYPE html>
			<html>
				<head>
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<style type="text/css">
						*{

							box-sizing: border-box;
							padding:0;
							margin: 0;
							font-family: "Montserrat", sans-serif;
							font-size: 13px;

					}
					</style>
				</head>
				<body>
					<!--styling the container-->
					<div id="container" style="width: 100%; height: auto; padding: 10px 10px 10px 10px; background-color:rgb(240, 240, 240); position: relative; border-radius:5px; ">

						<!--Logo-->
						<div id="icon_cont" style="position: relative; width: width: 92%; margin-top: 5px; margin-bottom: 15px;">
							<div id="icon" style="position: relative; width: 100px; margin:auto;">
								<img src="cid:logo" style="width:100px;" width="100">
							</div>
						</div>
						
						<div id="paymentContainer" style="max-width: 400px; height: auto; background-color: white; margin:auto; position: relative; padding:10px 0px 10px 0px; border-radius:20px; ">


							<!--Message -->
							<div id="msg" style="position: relative; width: 80%; margin:auto; text-align: left; color: rgb(90,90,90); margin-top: 10px;"><b style="color:rgb(40,40,40); font-size: 1.2em;">Hello, </b>
							</div>

							<!--Body -->
							<div id="amount" style="position: relative; width: 80%; margin:auto; text-align: left; font-size: 13px; margin-top: 20px;">
								'.$message.'
							</div>

							<div id="amount" style="position: relative; text-align: center; font-size: 13px; margin-top: 20px; margin-bottom: 20px;">
								<a href="https://12thcityrealestate.ng/properties_idu/" target="_blank" style="text-decoration: none; padding: 10px;background-color: #ccac00;; color: white; border-radius: 5px;">View Our Listing</a>
							</div>
						</div>

						<div id="fooooo" style="width: 100%; text-align: center; margin-top: 20px; color: #494949; margin-bottom: 10px; ">
							<span>&copy;</span>2023  12thcity Real Estate. All rights reserved.
						</div>

					</div>

				</body>
			</html>';

			// Content

			$mail->isHTML(true);    // Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $body;
			$mail->AltBody = $body;


			$mail->send();
		} catch (Exception $e) {
		}
	} 
	

	/* ===================== Admin ================= */
	public function get_message_details($msg_id) {
		return $this->db->get_where('contact_messages', array('id' => $msg_id))->row();
	}


	public function get_messages($limit, $offset) {
		$this->db->limit($limit, $offset); //limit to be used as per_page, offset to be used as pagination segment
		$this->db->order_by("date_sent", "DESC");
		$query = $this->db->get('contact_messages');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}


	public function count_messages() {
		return $this->db->get_where('contact_messages')->num_rows();
	}


	public function get_latest_message() {
		$this->db->order_by("date_sent", "DESC");
		$this->db->limit(1); //just one
		return $this->db->get_where('contact_messages')->row();
	}


	public function reply_message($msg_id) {
		$message = nl2br(ucfirst($this->input->post('message', TRUE)));
		$y = $this->get_message_details($msg_id);
		$subject = 'RE: ' . $y->subject;
		$email = $y->email;

		$status = $this->email_model->send_mail($email, $subject, $message);
	}


	public function delete_message($msg_id) {
		return $this->db->delete('contact_messages', array('id' => $msg_id));
	}


	public function bulk_actions_messages() {
		$selected_rows = count($this->input->post('check_bulk_action', TRUE));
		$bulk_action_type = $this->input->post('bulk_action_type', TRUE);
		$row_id = $this->input->post('check_bulk_action', TRUE);
		foreach ($row_id as $msg_id) {
			$this->delete_message($msg_id);
			$this->session->set_flashdata('status_msg', "{$selected_rows} messages deleted successfully.");
		}
	}



}
