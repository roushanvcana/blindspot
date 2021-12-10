<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("user_model");
	}
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
		$this->load->view('admin/dashboard');
	}

	public function add_startup()
	{
        $data['detail'] =$this->db->get("startup_setting")->result_array();
		$id = $this->session->userdata("id");
		if ($this->input->post()) {

			$userdata = array(
				"past_content" => $this->input->post('past_content'),
				"future_content" => $this->input->post('future_content'),
				"middle_content" => $this->input->post('middle_content'),
				"position" => $this->input->post('position'),
				"status" => 'Active',
				"created_at" =>  date('Y-m-d H:i:s'),

			);
			$register = $this->db->insert('startup_setting', $userdata);
			if ($register) {
				$this->session->set_flashdata('success', 'You are successfully registered');
				redirect('startup-add');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong');
				redirect('startup-add',$userdata);
			}
		}

		$this->load->view('admin/startup',$data);
	}

	public function edit_startup()
	{
		$id =  $this->input->post('hid');
		$id =  $this->input->post('hid');
		$data['details'] = $this->db->get("startup_setting")->result_array();
		$data['edit_details'] = $this->db->get_where("startup_setting",array('id' => $id))->row_array();
		$id = $this->session->userdata("id");
		//        print_r($id);
		// die;
		if ($this->input->post()) {


			$userdata = array(
				"past_content" => $this->input->post('past_content'),
				"future_content" => $this->input->post('future_content'),
				"middle_content" => $this->input->post('middle_content'),
				"position" => $this->input->post('position'),
				"status" => '1',
				"updated_at" =>  date('Y-m-d H:i:s'),
			);

			$register = $this->db->update('startup_setting', $userdata, array('id' => $id));
			if ($register) {
				$this->session->set_flashdata('success', 'Profile updated successfully ');
				redirect('startup-add');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong');
				redirect('startup-add', $userdata);
			}
		}
		$this->load->view('admin/startup');
	}

	public function delete($id)
	{

		$id = $this->session->userdata('id');

		$delete = $this->db->delete('startup_setting',array('id'=>$id));
		if ($delete) {
			redirect('startup-add');
		}
	}

	public function modify($id){
        $data['details'] = $this->db->get("startup_setting")->result_array();
		//$id = $this->uri->segment(3);
		$data['getValue']	= $this->db->get_where("startup_setting",array('id'=>$id))->row_array();	
		$this->load->view('admin/startup',$data);
	}

}
