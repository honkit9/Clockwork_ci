<?php

class user extends CI_Model
{
	public $uid;
	public $username;
	public $password;
	public $email;
	public $phone;

	public function getUsers(){
		$query = $this->db->get('backenduser');
		return $query->result_array();
	}

	public function findRole($userid){
		$query = $this->db->where('uid',$userid)->get('userrole');
		return $query->result_array();
	}

	public function findDuplicateDetails($uname, $key){
		$query = $this->db->where($key,$uname)->get('backenduser');
		return $query->num_rows();
	}


}
