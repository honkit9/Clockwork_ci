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
			$this->load->model('Room_Model');
			$data['result'] = $this->Room_Model->getRooms();
			$this->load->view('adminpanel/viewblog', $data);
		}else{
			$this->session->set_flashdata('error', 'Login First !');
			redirect('admin/login');
		}
	}

	function addblog(){
		if (isset($_SESSION['user_id'])) {
			$this->load->view('adminpanel/addblog');
		}else{
			$this->session->set_flashdata('error', 'Login First !');
			redirect('admin/login');
		}
	}

	function addblog_post(){
		/*print_r($_POST);
		print_r($_FILES);*/

		if ($_FILES) {
			//Image is Passed for Upload
			$config['upload_path']          = './assets/upload/roomimg/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    die($error);
                    //$this->load->view('upload_form', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

/*                    echo "<pre>";
                    print_r($data);
                    echo $data['upload_data']['file_name'];
*/					
                    $fileurl = "assets/upload/roomimg/".$data['upload_data']['file_name'];
                    $title = $_POST['roomtitle'];
                    $desc = $_POST['desc'];
					$price = $_POST['price'];
					$recommendation = $_POST['recomendation'];


                    $query = $this->db->query("INSERT INTO `room`( `Room_Name`, `Room_Summary`, `Room_Price`,`Recommendation`,`Room_Image`)
 							VALUES ('$title','$desc','$price','$recommendation','$fileurl')");

                    if ($query) {
                    	$this->session->set_flashdata('inserted', 'yes');
                    	redirect('admin/room/addblog');
                    }
                    else{
                    	$this->session->set_flashdata('inserted', 'no');
                    	redirect('admin/room/addblog');
                    }
                    //$this->load->view('upload_success', $data);
            }
		}else{
			// Image is not passed
		}

	}


	function editblog($roomid){
		//print_r($blog_id);

		if (isset($_SESSION['user_id'])) {
			$this->load->model('Room_Model');
			$data['result'] = $this->Room_Model->getRooms();
			$data['roomid'] = $roomid;

			$this->load->view("adminpanel/editblog", $data);
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
		//print_r($_POST);

		$delete_id = $_POST['delete_id'];

		$qu = $this->db->query("DELETE FROM `articles` WHERE `blogid`='$delete_id'");

		if ($qu) {
			echo "deleted";
		}else{
			echo "notdeleted";
		}

		//$this->

	}

}
