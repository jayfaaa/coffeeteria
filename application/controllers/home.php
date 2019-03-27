<?php
class Home extends CI_Controller {
	public function index(){
		$this->load->view('includes/header.php');
		$this->load->view('includes/nav.php');
		$this->load->view('home.php');
		$this->load->view('includes/footer.php');
	}

	public function logout(){
		session_destroy();
		header('location:'.base_url());
	}

	public function about(){
		$this->load->view('includes/header.php');
		$this->load->view('includes/nav.php');
		$this->load->view('about_us.php');
		$this->load->view('includes/footer.php');
	}

	public function contact(){
		$this->load->view('includes/header.php');
		$this->load->view('includes/nav.php');
		$this->load->view('contact_us.php');
		$this->load->view('includes/footer.php');
	}

	public function blogs(){
		if (isset($_SESSION['logged_in'])) {
		$this->load->view('includes/header.php');
		$this->load->view('includes/nav.php');
		$this->load->view('blogs');
		$this->load->view('includes/footer.php');
	} else {
		header('location:'.base_url());
	}
	}

	public function users(){
		$this->load->view('includes/header.php');
		$this->load->view('includes/nav.php');
		$this->load->view('register');
		$this->load->view('includes/footer.php');
	}

	public function login_user(){
		$this->load->database();
		$this->load->model('user_model');

		$password  = $this->input->post('password');
		$email  =  $this->input->post('email');

		$userExists  =  $this->user_model->check_email($email);
		if(!$userExists){
			$this->output->set_status_header(404);
			$this->output
        			->set_content_type('application/json')
					->set_output(json_encode(array('message' =>  'Email does not exist!' )));

		} else {
			$correctLogin = $this->user_model->check_valid($email,$password);

			
			if ($correctLogin) {
				$newdata = array(
			        'email'     => $email,
			        'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				header('location:'.base_url(). "blogs");
			} else {
				$this->output->set_status_header(404);
			$this->output
        			->set_content_type('application/json')
					->set_output(json_encode(array('message' =>  'Incorrect Password' )));
			}
		}
	}

	public function register_user(){
		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('password','Password','required|min_length[8]');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users_t.email]',
			array(
				'is_unique' => 'Email is taken already'
			)
		);

		$fname   =   $this->input->post('fname');
		$lname  =  $this->input->post('lname');
		$password  = $this->input->post('password');
		$email  =  $this->input->post('email');

		$isValidated  =  $this->form_validation->run();
		if($isValidated){
			//Ready for saving to database
			$this->load->database();
			$this->load->model('user_model');

			$data   =  array(
				'fname' => $fname,
				'lname' => $lname,
				'password' => password_hash($password,PASSWORD_DEFAULT),
				'email' => $email
			);

			$result   = $this->user_model->save($data);
			$response   =  array(
				'message' => 'User successfully saved!!'
			);
			header('location:'.base_url());
			
		}
		else {

			//Form has errors
			$this->form_validation->set_error_delimiters(null, null);
			$errors  =  array(
				'fname' => form_error('fname'),
				'lname' => form_error('lname'),
				'username' =>form_error('username'),
				'password' => form_error('password'),
				'email' => form_error('email')
			);
			$this->output->set_status_header(422);
			$this->output
        			->set_content_type('application/json')
					->set_output(json_encode($errors));
		}
	}

}
?>