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

	public function admin(){
		if (isset($_SESSION['logged_in']) && isset($_SESSION['admin'])) {
		$this->load->view('includes/header.php');
		$this->load->view('includes/nav.php');
		$this->load->view('adminpage');
		$this->load->view('includes/footer.php');
	} else {
		header('location:'.base_url());
	}
	}

	public function blogs(){
		if (isset($_SESSION['logged_in'])) {

			$this->load->model('blog_model');
			$data  = array(
			'posts' => $this->blog_model->getAll()
			);
			$this->load->view('includes/header.php');
			$this->load->view('includes/nav.php');
			$this->load->view('includes/year.php');
			$this->load->view('blogs',$data);
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
		$admin = $this->user_model->check_emaiL_admin($email);
		if(!$userExists && !$admin){
			$this->output->set_status_header(404);
			$this->output
        			->set_content_type('application/json')
					->set_output(json_encode(array('message' =>  'Email does not exist!' )));

		} else {
			$correctLogin = $this->user_model->check_valid($email,$password);
			$adminLogin = $this->user_model->check_admin($email,$password);
			
			if ($adminLogin) {
				$newdata = array(
			        'email'     => $email,
			        'logged_in' => TRUE,
			        'admin' => TRUE
				);

				$this->session->set_userdata($newdata);
				header('location:'.base_url(). "admin");
			}
			else if ($correctLogin) {
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

	public function add_blog(){
		$this->load->database();
		$this->load->model('blog_model');

		$this->form_validation->set_rules('title','Title','required|min_length[8]');
		$this->form_validation->set_rules('image','Image','required');
		$this->form_validation->set_rules('body','Body','required|min_length[20]');

		$title   =   $this->input->post('title');
		$body  =  $this->input->post('body');
		$image  = $this->input->post('image');

		$isValidated = $this->form_validation->run();

		if($isValidated){
			$this->load->database();
			$this->load->model('blog_model');

			$data =  array(
				'title' => $title,
				'body' => $body,
				'image' => $image,
				'date' => date('Y-m-d H:i:s')
			);

			$result   = $this->blog_model->save($data);
			$response   =  array(
				'message' => 'Blog successfully saved!!'
			);
			
			header('location:'.base_url('blogs'));
		}
	}

	public function deleteComment($blogid,$commentid) {
		if (isset($_SESSION['admin']) || isset($_SESSION['logged_in'])) {
			$this->load->database();
			$this->load->model('blog_model');
			$res = $this->blog_model->delete($commentid);
			$response = array (
				'message' => "Comment deleted"
			);	

			header('location:'.base_url('blogs/').$blogid."/comments");
		}
	}

	public function deleteBlog($id) {
		if (isset($_SESSION['admin'])) {
			$this->load->database();
			$this->load->model('blog_model');
			$res = $this->blog_model->deletep($id);
			$response = array (
				'message' => "Post deleted"
			);	

			header('location:'.base_url('blogs'));
		}
	}

	public function edit_save($id) {
		if (isset($_SESSION['admin'])) {
			$this->form_validation->set_rules('title','Title','required|min_length[8]');
			$this->form_validation->set_rules('body','Body','required|min_length[20]');

			$title   =   $this->input->post('title');
			$body  =  $this->input->post('body');

			$isValidated = $this->form_validation->run();
			if ($isValidated) {
			$this->load->database();
			$this->load->model('blog_model');
			$data = array (
				'title' => $title,
				'body' => $body,
				'date' => date('Y-m-d H:i:s')
			);
			
			$res = $this->blog_model->update($id,$data);
			$response   =  array(
				'message' => 'Blog successfully saved!!'
			);
			
			header('location:'.base_url('blogs'));
			}
		}
	}

	public function edit_blog($id) {
		if (isset($_SESSION['admin'])) {
			$this->load->model('blog_model');
			$data  = array(
				'blogpost' => $this->blog_model->getPost($id),
			);
			$this->load->view('includes/header.php');
			$this->load->view('includes/nav.php');
			$this->load->view('editblog',$data);
			$this->load->view('includes/footer.php');
		} else {
			header('location:' .base_url('blogs'));
		}
	}

	public function viewBlog($id) {
		if (isset($_SESSION['logged_in'])) {
			$this->load->model('blog_model');
			$data  = array(
				'blogpost' => $this->blog_model->getPost($id),
				'comments' => $this->blog_model->getComment($id)
			);
			$this->load->view('includes/header.php');
			$this->load->view('includes/nav.php');
			$this->load->view('includes/year.php');
			$this->load->view('comment',$data);
			$this->load->view('includes/footer.php');
		}
	}

	//COMMENTS
	public function add_comment($id) {
		$this->form_validation->set_rules('comment','Comment','required|min_length[1]|max_length[250]');

		$comment = $this->input->post('comment');

		$isValidated = $this->form_validation->run();

		if ($isValidated) {
			$this->load->database();
			$this->load->model('blog_model');
			$data = array(
				'email' => $_SESSION['email'],
				'comment' => $comment,
				'blog_id' => $id,
				'date' => date('Y-m-d H:i:s')
			);

			$result = $this->blog_model->save_comment($data);
			$response   =  array(
				'message' => 'User successfully saved!!'
			);
			header('location:'.base_url('blogs/').$id."/comments");
		} else {
			$this->form_validation->set_error_delimiters(null, null);
			$errors  =  array(
				'comment' => form_error('comment'),
			);
			$this->output->set_status_header(422);
			$this->output
        			->set_content_type('application/json')
					->set_output(json_encode($errors));
		}
		// var_dump($comment);
		// var_dump($id);
		// var_dump($_SESSION['email']);


	}
	public function register_user(){
		$this->load->database();
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
			$this->load->model('user_model');
			$data   =  array(
				'fname' => $fname,
				'lname' => $lname,
				'password' => password_hash($password,PASSWORD_DEFAULT),
				'email' => $email
			);

			$result   = $this->user_model->save($data);
			if ($result) {
			header('location:'.base_url());
			}
		}
		else {
			$errors = array(
				'fname' => form_error('fname'),
				'lname' => form_error('lname'),
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