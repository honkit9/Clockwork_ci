<?php

class Room_Model extends CI_Model
{
	public $roomid;
	public $roomname;
	public $roomsummary;
	public $roomprice;
	public $recommendation;
	public $roomimage;

	public function getRooms(){
		$query = $this->db->order_by('Room_ID','Desc')->get('room');
		return $query->result_array();
	}

	public function getRoomDetail($roomid){
		$query = $this->db->where('Room_ID',$roomid)->get('room');
		return $query->result_array();
	}
}
