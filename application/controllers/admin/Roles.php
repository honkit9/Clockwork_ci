<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller
{

	public function index()
	{
		if (isset($_SESSION['user_id'])) {

			$this->load->model('User');
			$data['alluser']= $this->User->getUsers();
			$data['rolestatus'] = array('Admin','Customer','Team');
			$data['urtable'] = $this->db->get('userrole')->result_array();
			$this->load->view('adminpanel/roleview',$data);
		}else{
			$this->session->set_flashdata('error', 'Login First !');
			redirect("admin/login");
		}

		//$this->load->helper('url');
	}

	public function checkRole(){
		$status = $this->input->get('status');
		$this->load->model('User');
		$test = $this->User->findRole($status);
		foreach ($test as $key =>$res){
			echo $res['rid'];
		}

	}

	public function roleupdate(){
		$this->db->select('urid');
		$query = $this->db->get('userrole')->result_array(); // get all userrole

			foreach ($query as $res){

				if(in_array($res['urid'],$_POST['check_list'])){
					$this->db->set('delete_status', '1');
					$this->db->where('urid', $res['urid']);
					$this->db->update('userrole');
				}else{
					$this->db->set('delete_status', '0');
					$this->db->where('urid', $res['urid']);
					$this->db->update('userrole');
				}

		}
//		return redirect()->back()->withInput();
		$this->load->view('adminpanel/dashboard');
	}

}
