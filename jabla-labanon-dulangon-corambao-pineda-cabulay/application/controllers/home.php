<?php
class Home extends CI_Controller {
	public function index(){
		$this->load->view('includes/header.php');
		$this->load->view('includes/nav.php');
		$this->load->view('home.php');
		$this->load->view('includes/footer.php');
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

	public function registration(){
		$this->load->view('includes/header.php');
		$this->load->view('includes/nav.php');
		$this->load->view('register');
		$this->load->view('includes/footer.php');
	}

	public function blogs(){
		$this->load->view('includes/header.php');
		$this->load->view('includes/nav.php');
		$this->load->view('blogs');
		$this->load->view('includes/footer.php');
	}

}

?>