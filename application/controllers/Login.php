
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class   Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('admin/login');


	}

	public function login()
	{


		if ($this->input->post()) {
			$email = $this->input->post('email');

			$encrypt_password = md5($this->input->post('password'));

			$user_detail = $this->user_model->login($email, $encrypt_password);
			if (count($user_detail) > 0) {
				//Create Session
				$user_data = array(
					'id' => $user_detail[0]->id,
					'name' => $user_detail[0]->name,
					'phone' => $user_detail[0]->phone,
					'email' => $user_detail[0]->email,

				);

				$set_session = $this->session->set_userdata($user_data);


				//Set Message
				$this->session->set_flashdata('success', 'You are now logged in.');

				if ($this->input->post("RememberMe") == 'RememberMe') {
					setcookie("loginemail", $email, time() + (10 * 365 * 24 * 60 * 60));
					setcookie("loginPass", $this->input->post('password'),  time() + (10 * 365 * 24 * 60 * 60));
				} else {
					setcookie("loginemail", "");
					setcookie("loginPass", "");
				}
				redirect('dashboard', $set_session);
			} else {
				$this->session->set_flashdata('error', 'Login is invalid.');
				redirect('login');
			}
		}
		$this->load->view('admin/login');
	}
	}

