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
		$this->session->set_flashdata('error','Must be logged in as admin');
				redirect(base_url());
	}
	}

	public function report(){
		if (isset($_SESSION['admin'])) {
			$this->load->model('blog_model');
			$data  = array(
				'reports' => $this->blog_model->getAllReport()
			);
			$this->load->view('includes/header.php');
			$this->load->view('includes/nav.php');
			$this->load->view('includes/year.php');
			$this->load->view('feedbacks',$data);
			$this->load->view('includes/footer.php');
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
		$this->session->set_flashdata('error','Must be logged in to view blogs');
				redirect(base_url());
	}
	}

	

	public function users(){
		$this->load->view('includes/header.php');
		$this->load->view('includes/nav.php');
		$this->load->view('register');
		$this->load->view('includes/footer.php');
	}

	public function getBlogYear($year){
		if (isset($_SESSION['logged_in'])) {

			$this->load->model('blog_model');
			$data  = array(
			'posts' => $this->blog_model->fetchYear($year)
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

	public function login_user(){
		$this->load->database();
		$this->load->model('user_model');
		$password  = $this->input->post('passwordinput');
		$email  =  $this->input->post('emailinput');
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
			$this->session->set_flashdata('error_pass','Wrong Email or Password');
				redirect(base_url());
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
			$this->session->set_flashdata('success_add_blog','Successfully Added Blog');
				redirect(base_url('blogs'));
		} else {
			$errors = array(
				'title' => form_error('title'),
				'body' => form_error('body'),
				'image' => form_error('image')
			);
			$this->session->set_flashdata('error_add_blog',($errors['title'].$errors['body'].$errors['image']));
				redirect(base_url('blogs'));
		}
	}

	public function add_report(){
		$this->load->database();
		$this->load->model('blog_model');

		$this->form_validation->set_rules('title','Title','required|min_length[8]');
		$this->form_validation->set_rules('body','Body','required|min_length[20]');

		$title   =   $this->input->post('title');
		$body  =  $this->input->post('body');

		$isValidated = $this->form_validation->run();
		if($isValidated){
			$this->load->database();
			$this->load->model('blog_model');

			$data =  array(
				'title' => $title,
				'body' => $body,
				'email' => $_SESSION['email'],
				'date' => date('Y-m-d H:i:s')
			);

			$result   = $this->blog_model->save_report($data);
			$response   =  array(
				'message' => 'Report successfully saved!!'
			);
			
			header('location:'.base_url('blogs'));
		}
	}


	public function test(){
		$this->load->view('contact');
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
			);
			
			$res = $this->blog_model->update($id,$data);
			$this->session->set_flashdata('success_edit_blog','Successfully Edited Blog');
				redirect(base_url('blogs'));
			
			} else {
				$errors = array(
					'title' => form_error('title'),
					'body' => form_error('body')
				);
				$this->session->set_flashdata('error_edit_blog',($errors['title'].$errors['body']));
				redirect(base_url('blogs'));
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
			
			$this->session->set_flashdata('success_add_comment','Successfully Added Comment');
				redirect(base_url('blogs/').$id."/comments");
		} else {
			$this->form_validation->set_error_delimiters(null, null);
			$errors  =  array(
				'comment' => form_error('comment'),
			);
			$this->session->set_flashdata('error_add_comment',$errors['comment']);
				redirect(base_url('blogs/').$id."/comments");
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
				$this->session->set_flashdata('success','Success!');
				redirect(base_url('users'));
			}
		}
		else {
			$errors = array(
				'fname' => form_error('fname'),
				'lname' => form_error('lname'),
				'password' => form_error('password'),
				'email' => form_error('email')
			);
			
			$this->session->set_flashdata('error',$errors['email']);
				redirect(base_url('users'));
		}
	}

}
?>