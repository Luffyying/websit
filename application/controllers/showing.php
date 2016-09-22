<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Showing extends CI_Controller {

	// public function __construct(){
	// 	parent::__construct();
	// 	$this->load->model('blog_model');
	// 	$this->load->model('comment_model');
	// 	$this->load->model('show_model');
	// 	$this->load->model('contact_model');
	// }
	public function showone(){
		$this->load->view('showone');
	}
	public function showtwo(){
		$this->load->view('showtwo');
	}
	public function showthree(){
		$this->load->view('showthree');
	}
	public function showfour(){
		$this->load->view('showfour');
	}
	public function showfive(){
		$this->load->view('showfive');
	}
	public function showsix(){
		$this->load->view('showsix');
	}
	public function showsev(){
		$this->load->view('showsev');
	}
	public function showeig(){
		$this->load->view('showeig');
	}
	public function shownine(){
		$this->load->view('shownine');
	}
	public function showten(){
		$this->load->view('showten');
	}
	public function level1(){
		$this->load->view('level1');
	}
	public function level2(){
		$this->load->view('level2');
	}
	public function showele(){
		$this->load->view('showele');
	}
}