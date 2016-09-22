<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->model('comment_model');
		$this->load->model('show_model');
		$this->load->model('contact_model');
	}
	/*public function index()
	{
		$this -> load -> model('blog_category_model');
		$this -> load -> model('blog_model');


		$cate_id = $this -> input -> get('cateId');
		if(!$cate_id){
			//查所有的文章
			$blogs = $this -> blog_model -> get_all();
		}else{
			//根据类别查询该类别下的所有文章
			$blogs = $this -> blog_model -> get_by_category($cate_id);
		}
		//查所有的文章类别
		$categories = $this -> blog_category_model -> get_all();

		//跳转页面
		$this->load->view('index', array(
			'categories' => $categories,
			'blogs' => $blogs
		));
	}*/
	public function index(){
		$this ->load-> model('blog_category_model');
		$this ->load-> model('blog_model');
		$this->load->model('show_model');
		$categories = $this->blog_category_model->get_all();
		$blogs = $this->blog_model->get_all();
		$shows = $this->show_model->get_all();
		$this->load->view('index', array(
			'categories' => $categories,
			'blogs' => $blogs,
			'shows'=> $shows
		));
	}
	public function savemsg(){
		 $name = $this->input->post('name');
		 $phone = $this->input->post('phone');
		 $email= $this->input->post('email');
		 $message = $this->input->post('message');
		 $data = array(
		 	'name'=>$name,
		 	'phone'=>$phone,
		 	'email'=>$email,
		 	'message'=>$message);
		$res = $this->contact_model->save($data);
		if($res){
			echo 'success';
		}else{
			echo 'fail';
		}
		//echo 'success';
	}
    public function moreblog(){
    	$this->db->order_by('date', 'desc');//排序规则
    	$blog = $this->blog_model->get_all();
    	$data = array(
    		'blogs'=>$blog);
    	$this->load->view('bloglist',$data);
    }
    public function more_detial_blog(){
    	$count = $this->input->get('count');
    	$blog = $this->blog_model->get_more_all($count);
    	echo json_encode($blog);
    }
	public function get_shows(){
		 $this->load->model('show_model');
		 $cate_id = $this->input->get('cateId');
		 if(!$cate_id){
			$shows = $this->show_model->get_all();
			echo json_encode($shows);
					
		 }else{
		 	$shows = $this->show_model->get_by_category($cate_id);
		 	echo json_encode($shows);
		  }
		//$shows = 'ss';
		// echo json_encode($shows);//let the sqldata transform json
		//$a = {'name':'success','age':20};
		
	}
    public function get_more_shows(){
    	 $this->load->model('show_model');
		 $cate_id = $this->input->get('cateId');
		 $offset = $this->input->get('offset');
		
		 if(!$cate_id){
			$shows = $this->show_model->get_more_all($offset);
			echo json_encode($shows);				
		 }else{
		 	$shows = $this->show_model->get_more_by_category($cate_id,$offset);
		 	echo json_encode($shows);
		  }
    }
	public function view_show(){
		// $blog_id = $this -> input -> get('blogId');
	}
	public function blog_detial(){
		  $this ->load-> model('blog_model');
		  $id =$this->input->get('id'); 
		  $blog = $this->blog_model->get_blog_detial($id);
		  $comment = $this->comment_model->get_by_id($id);
		  $this->load->view('blogdetial',array(
		  	'blog'=>$blog,
		  	'comments'=>$comment));
	}
	public function add_leavemsg(){
		 $name = $this->input->get('name');
		 $phone = $this->input->get('phone');
		 $email= $this->input->get('email');
		 $message = $this->input->get('message');
		 $bgid = $this->input->get('bgid');
		 $data = array(
		 	'name'=>$name,
		 	'phone'=>$phone,
		 	'email'=>$email,
		 	'content'=>$message,
		 	'blog_id'=>$bgid);
		 	
		 $res = $this->comment_model->addcomment($data);
		 if($res){
		 	//$s = {'name':$name,'phone':$phone};
              echo json_encode($data);
		 }	
	}
}
