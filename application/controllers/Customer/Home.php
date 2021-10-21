<?php

class Home extends CI_Controller
{
	public function index(){
		$this->load->model('Room_Model');
		$data['rooms'] = $this->Room_Model->getPublishedRooms();

//		print_r($test);
		$this->load->view('Customer/homeview',$data);
	}

	public function checkroom($roomid){
		$this->load->model('Room_Model');
		$data['room_row']= $this->Room_Model->getRoomDetail($roomid);

		$this->load->view('Customer/roomdetail',$data);

	}

	public function logout(){
		session_destroy();

		redirect('admin/login');

	}
}
