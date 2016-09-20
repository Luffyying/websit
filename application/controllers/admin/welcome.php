<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('comment_model');
        //$this->load->model('show_model');
        $this->load->model('contact_model');
        $this->load->model('blog_model');
    }
    public function index(){
        $this->load->view('admin/admin_index');
    }
    public function manager_infor(){
        $this->load->view('admin/admin_infor');
    }
	public function login(){
        $this->load->view('admin/admin_login');
    }
    public function check_login(){
        $name=$this->input->post('name');
        $password=$this->input->post('password');
        $res = $this->user_model->check($name,$password);
        if($res){
            redirect('admin/index');
        }else{
            location.reload();
        }
    }
    /*
    blog
    */
    public function mgr_blog(){
        $blog = $this->blog_model-> get_all_blogs();
         $this->load->view('admin/admin_blog', array(
            'blogs' => $blog
        ));
    }
    public function add_blog(){
        $this->load->view('admin/add_blog');
    }
    public function delete_blog(){
        $blog_id = $this->input->get('blogId');
        $rows = $this->blog_model-> delete($blog_id);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    public function delete_selected_blog(){
        $blog_ids = $this->input->get('blogIdStr');
        $this->load->model('blog_model');
        $rows = $this->blog_model->delete_selected($blog_ids);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    public function blog_detial(){
        $blog_id = $this->input->get('blog_id');
        $blog = $this->blog_model->get_by_id($blog_id);
        $comments = $this->comment_model->get_by_id($blog_id);
        $this->load->view('admin/blog_detial',array('blog'=>$blog,'comments'=>$comments));   
    }
/**
comment 
*/
   public function mgr_comment(){
       $com = $this->comment_model-> get_all_comments();
         $this->load->view('admin/admin_comm', array(
            'comments' => $com
        ));
   }
   public function delete_comment(){
        $comm_id = $this ->input-> get('commId');
        $rows = $this ->comment_model-> delete($comm_id);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
   }
   public function delete_selected_comment(){
        $comm_ids = $this->input-> get('commIdStr');
        $rows = $this->comment_model->delete_selected($comm_ids);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
   }

    public function mgr_category(){
        $this -> load -> model('blog_category_model');
        $categories = $this -> blog_category_model -> get_all();
        $this -> load -> view('admin/admin_category', array(
            'categories' => $categories
        ));

    }
    public function add_category(){
        $this -> load -> view('admin/add_category');

    }
    public function save_category(){
        $cate_name = $this -> input -> post('cate_name');
        $this -> load -> model('blog_category_model');
        $rows = $this -> blog_category_model -> save($cate_name);
        if($rows > 0){
            redirect('admin/category');
        }else{
            echo '添加类型失败!';
        }
    }
    public function delete_category(){
        $cate_id = $this -> input -> get('cateId');
        $this -> load -> model('blog_category_model');
        $rows = $this -> blog_category_model -> delete($cate_id);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    public function delete_selected_category(){
        $cate_ids = $this -> input -> get('cateIdStr');
        $this -> load -> model('blog_category_model');
        $rows = $this -> blog_category_model -> delete_selected($cate_ids);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

}
