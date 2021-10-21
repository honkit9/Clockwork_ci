<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *        http://example.com/index.php/welcome
	 *    - or -
	 *        http://example.com/index.php/welcome/index
	 *    - or -
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
			redirect("admin/dashboard");
		}

		$data = [];
		if (isset($_SESSION['error'])) {
			# code...
			//die($_SESSION['error']);

			$data['error'] = $_SESSION['error'];
		} else {
			$data['error'] = "NO_ERROR";
		}


		//$this->load->helper('url');
		$this->load->view('adminpanel/loginview', $data);
	}

	function login_post()
	{
		if (isset($_POST)) {
			$email = $_POST['name'];
			$password = $_POST['password'];

			echo $email;
			$query = $this->db->query("SELECT * FROM `backenduser` WHERE username='$email' AND password='$password'");

			if ($query->num_rows() > 0) {
				//Credentials are valid

				$result = $query->result_array();
				$this->session->set_userdata('user_id', $result[0]['uid']);


				$this->load->model('User');
				$rolearray = $this->User->findRole($result[0]['uid']);

				$i = 0;
				foreach ($rolearray as $role) {
					$i++;
					if ($role['delete_status'] == 1) {
						$this->session->set_userdata('role' . $i, 'yes');
					}
				}

				$this->session->set_flashdata('error', $result[0]['uid']);

				if (isset($_SESSION['role2']) && !isset($_SESSION['role1']) && !isset($_SESSION['role3'])) {
					redirect('Customer/Home');
				} else {
					redirect('admin/login');
				}
			} else {
				//invalid credentials
				$this->session->set_flashdata('error', 'Invalid Credentials');
				redirect("admin/login");
			}

		} else {
			die("Invalid Input!");
		}
	}


	function logout()
	{
		session_destroy();

		redirect('admin/login');
	}

	function register()
	{
		$data = [];
		if (isset($_SESSION['error'])) {
			# code...
			//die($_SESSION['error']);

			$data['error'] = $_SESSION['error'];
		} else {
			$data['error'] = "NO_ERROR";
		}

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		//set error message prefix tag
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

		//name validation
		$this->form_validation->set_rules('name', 'Username', 'is_unique[backenduser.username]|required|min_length[3]|max_length[15]',
			array('is_unique' => 'This %s already exists.',
				'required' => 'You must provide a %s.'));

		//phone validation
		$this->form_validation->set_rules('phone', 'Phone No.', 'is_unique[backenduser.phone]|required',
			array('required' => 'You must provide a %s.',
				'is_unique' => '%s is taken.'));

		//email validation
		$this->form_validation->set_rules('email', 'Email Address', 'is_unique[backenduser.email]|required|valid_email',
			array('required' => 'You must provide a %s.',
				'is_unique' => '%s is taken.'));

		//pw validation
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]',
			array('required' => 'You must provide a %s.'));

		//pw validation
		$this->form_validation->set_rules('rep_password', 'PasswordConf', 'required|matches[password]',
			array('required' => 'You must provide a %s.',
				'matches' => 'Password not match.'));

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('adminpanel/register');
		} else {
			if (isset($_POST['registerbtn'])) {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$uname = $this->input->post('name');
				$phone = $this->input->post('phone');

				$query = $this->db->query("INSERT INTO `backenduser`( `username`, `email`, `phone`,`password`)
					VALUES ('$uname','$email','$phone','$password')");

				$lastuid = $this->db->insert_id();
				$role1 = $this->db->query("INSERT INTO `userrole`( `uid`, `rid`, `delete_status`)
 							VALUES ('$lastuid','1','0')");
				$role2 = $this->db->query("INSERT INTO `userrole`( `uid`, `rid`, `delete_status`)
 							VALUES ('$lastuid','2','1')");
				$role3 = $this->db->query("INSERT INTO `userrole`( `uid`, `rid`, `delete_status`)
 							VALUES ('$lastuid','3','0')");

				if ($query && $role1 && $role2 && $role3) {
					$this->session->set_flashdata('registered', 'Yes');
					redirect('admin/login/');
				}
			}
		}
	}

	//native PHP form validation
//
//	function register_post(){
//		if(isset($_POST['registerbtn'])){
//			$email=$_POST['email'];
//			$password=$_POST['password'];
//			$uname = $_POST['name'];
//			$passrep = $_POST['rep_password'];
//			$phone = $_POST['phone'];
//
//			$this->load->model('User');
//			$unamecount = $this->User->findDuplicateDetails($uname,'username');
//			$emailcount = $this->User->findDuplicateDetails($email,'email');
//			$phonecount = $this->User->findDuplicateDetails($phone,'phone');
//			if($unamecount>0){
//				$this->session->set_flashdata('error', 'Username Taken');
//				redirect('admin/login/register');
//			}
//			if($emailcount>0){
//				$this->session->set_flashdata('error', 'Email Taken');
//				redirect('admin/login/register');
//			}
//			if($phonecount>0){
//				$this->session->set_flashdata('error', 'Phone No. Taken');
//				redirect('admin/login/register');
//			}
//			if($password != $passrep){
//				$this->session->set_flashdata('error', 'Passwords Not Match');
//				redirect('admin/login/register');
//			}
//
//			$query = $this->db->query("INSERT INTO `backenduser`( `username`, `email`, `phone`,`password`)
// 							VALUES ('$uname','$email','$phone','$password')");
//			$lastuid = $this->db->insert_id();
//			$role1 = $this->db->query("INSERT INTO `userrole`( `uid`, `rid`, `delete_status`)
// 							VALUES ('$lastuid','1','0')");
//			$role2 = $this->db->query("INSERT INTO `userrole`( `uid`, `rid`, `delete_status`)
// 							VALUES ('$lastuid','2','0')");
//			$role3 = $this->db->query("INSERT INTO `userrole`( `uid`, `rid`, `delete_status`)
// 							VALUES ('$lastuid','3','0')");
//
//			if ($query && $role1 && $role2 && $role3) {
//				$this->session->set_flashdata('registered', 'Yes');
//				redirect('admin/login/');
//			}
//			else{
//				$this->session->set_flashdata('registered', 'No ');
//				redirect('admin/login/');
//			}
//
//		}
//
//	}


	function forgotpw()
	{
		$this->load->view('adminpanel/forgotpw');
	}

	function forgotpw_post()
	{
		$from_email = "Boltboi.69.420@gmail.com"; //your mail account, must exist in your database
		$to_email = $this->input->post('receiver');//email that will be received from the view page

		//Load email library
		$this->load->library('email');

		$this->email->from($from_email, 'Boltboi.69.420@gmail.com'); //your mail account, must exist in your database
		$this->email->to($to_email); // Recipients, in this case we get it from the email form
		$this->email->subject('Testing for email Funtionality'); //Subject or also know as title for the mail
		$this->email->message('Greeting, this is just a test mail, please ignore it');//message you wanted to put in the description

		//Send mail
		if ($this->email->send())
			$this->session->set_flashdata("email_sent", "Email sent successfully.");// if mail manage to send, you will get this massage
		else
			$this->session->set_flashdata("email_sent", "Error in sending Email.");//if mail was unable to send
		$this->load->view('adminpanel/forgotpw'); //to load the particular view file, view is just a web page,or page fragement
	}
}
