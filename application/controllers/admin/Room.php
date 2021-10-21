<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

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
		if (isset($_SESSION['user_id'])) {
			if (isset($_SESSION['role1']) || isset($_SESSION['role3']) ) {

				$this->load->model('Room_Model');
				$data['result'] = $this->Room_Model->getRooms();
				$this->load->view('adminpanel/viewblog', $data);
			}else{
				show_error('Please contact admin for more info',404,'Access Forbidden');
			}
		}else{
			$this->session->set_flashdata('error', 'Login First !');
			redirect('admin/login');
		}
	}

	function addblog(){
		if (isset($_SESSION['user_id'])) {
			if (isset($_SESSION['role1']) ) {


				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');


				//set error message prefix tag
				$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
				//name validation
				$this->form_validation->set_rules('roomtitle', 'room title', 'is_unique[room.Room_Name]|required|min_length[3]|max_length[20]',
					array('is_unique' => 'This %s already exists.',
						'required' => 'You must provide a %s.'));

				//price validation
				$this->form_validation->set_rules('price', 'room price', 'required',
					array('required' => 'You must provide a %s.'));

				//desc validation
				$this->form_validation->set_rules('desc', 'room summary', 'required|min_length[3]|max_length[50]',
					array('required' => 'You must provide a %s.'));

				//recommendation validation
				$this->form_validation->set_rules('recomendation', 'room recommendation', 'required|min_length[3]|max_length[50]',
					array('required' => 'You must provide a %s.'));

				//image validation
//				$this->form_validation->set_rules('file', 'room image', 'required',
//					array('required' => 'You must provide a %s.'));

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('adminpanel/addblog');
				} else {
					//addblog_post
				}
			}else{
				show_error('Please contact admin for more info',404,'Access Forbidden');
			}
		}else{
			$this->session->set_flashdata('error', 'Login First !');
			redirect('admin/login');
		}
	}

	function addblog_post(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		//set error message prefix tag
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

		//name validation
		$this->form_validation->set_rules('roomtitle', 'room title', 'is_unique[room.Room_Name]|required|min_length[3]|max_length[20]',
			array('is_unique' => 'This %s already exists.',
				'required' => 'You must provide a %s.'));

		//price validation
		$this->form_validation->set_rules('price', 'room price', 'required',
			array('required' => 'You must provide a %s.'));

		//desc validation
		$this->form_validation->set_rules('desc', 'room summary', 'required|min_length[3]|max_length[50]',
			array('required' => 'You must provide a %s.'));

		//recommendation validation
		$this->form_validation->set_rules('recomendation', 'room recommendation', 'required|min_length[3]|max_length[50]',
			array('required' => 'You must provide a %s.'));


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('adminpanel/addblog');
		} else {
			if ($_FILES) {
				//Image is Passed for Upload
				$config['upload_path'] = './assets/upload/roomimg/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$new_name = time() . $_FILES["file"]['name'];
				$config['file_name'] = $new_name;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('file')) {
					$error = array('error' => $this->upload->display_errors());

					print_r($error);
				} else {
					$data = array('upload_data' => $this->upload->data());
					$fileurl = "assets/upload/roomimg/" . $data['upload_data']['file_name'];
					$title = $_POST['roomtitle'];
					$desc = $_POST['desc'];
					$price = $_POST['price'];
					$recommendation = $_POST['recomendation'];


					$query = $this->db->query("INSERT INTO `room`( `Room_Name`, `Room_Summary`, `Room_Price`,`Recommendation`,`Room_Image`)
 							VALUES ('$title','$desc','$price','$recommendation','$fileurl')");

					if ($query) {
						$this->session->set_flashdata('inserted', 'yes');
						redirect('admin/room/');
					} else {
						$this->session->set_flashdata('inserted', 'no');
						redirect('admin/room/addblog');
					}
				}
			} else {
				// Image is not passed
			}
		}
	}


	function editblog($roomid){
		//print_r($blog_id);

		if (isset($_SESSION['user_id'])) {
			if (isset($_SESSION['role1']) ) {
				$this->load->model('Room_Model');
				$data['result'] = $this->Room_Model->getRoomDetail($roomid);
				$data['roomid'] = $roomid;
				$this->load->view("adminpanel/editblog", $data);
			}else{
				show_error('Please contact admin for more info',404,'Access Forbidden');

			}
		}else{
			$this->session->set_flashdata('error', 'Login First !');
			redirect('admin/login');
		}
	}

	function editblog_post(){
		//print_r($_POST); die();

		print_r($_FILES);
		if ( $_FILES['file']['name'] ) {
			//die("Update File");		

			$config['upload_path']          = './assets/upload/roomimg/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    die("Error");
                    //$this->load->view('upload_form', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    /*echo "<pre>";
                    print_r($data['upload_data']['file_name']);
					*/

				$fileurl = "assets/upload/roomimg/".$data['upload_data']['file_name'];
				$title = $_POST['roomtitle'];
				$desc = $_POST['desc'];
				$price = $_POST['price'];
				$recommendation = $_POST['recomendation'];
				$status = $_POST['status'];
				$roomid = $_POST['roomid'];

                    $query = $this->db->query("UPDATE `room` SET `Room_Name`='$title',`Room_Summary`='$desc',`Room_Price`='$price', 
                  				`Recommendation`='$recommendation', `Room_Image`='$fileurl', `status`='$status' WHERE `Room_ID`='$roomid'");

                    if ($query) {
                    	$this->session->set_flashdata('updated', 'yes');
                    	redirect("admin/room");
                    }else{
                    	$this->session->set_flashdata('updated', 'no');
                    	redirect("admin/room");
                    }
            }



		}else{
			//die("Update without file");
			$title = $_POST['roomtitle'];
			$desc = $_POST['desc'];
			$price = $_POST['price'];
			$recommendation = $_POST['recomendation'];
			$status = $_POST['status'];
			$roomid = $_POST['roomid'];

			$query = $this->db->query("UPDATE `room` SET `Room_Name`='$title',`Room_Summary`='$desc',`Room_Price`='$price', 
                  				`Recommendation`='$recommendation', `status`='$status' WHERE `Room_ID`='$roomid'");

			if ($query) {
				$this->session->set_flashdata('updated', 'yes');
				redirect("admin/room");
			}else{
				$this->session->set_flashdata('updated', 'no');
				redirect("admin/room");
			}
		}
	}
	function deleteblog(){
		$delete_id = $_POST['delete_id'];

		$qu = $this->db->query("DELETE FROM `room` WHERE `Room_ID`='$delete_id'");

		if ($qu) {
			echo "deleted";
		}else{
			echo "notdeleted";
		}

//

	}

}
