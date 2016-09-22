<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('comment_model');
       // $this->load->model('contact_model');
        $this->load->model('contact_model');
        $this->load->model('blog_model');
    }
    public function index(){
        $blogs = $this->blog_model->get_all();
        $this->load->view('admin/admin_index',array('blogs'=>$blogs));
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
    public function post_blog($flag=0){
       
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3076';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload("img"))
        {
            $title = htmlspecialchars($this->input->post('title'));
            //provide the malicious code
            $clicked = htmlspecialchars($this->input->post('clicked'));
            $content = $this->input->post('contents');
            $upload_data = $this->upload->data();
            $this->load->library("image_lib");
            //压缩小图
            $config['image_library'] = 'gd2';
            $config['source_image'] = $upload_data['full_path'];
            $config['thumb_marker'] = '_thumb';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['master_dim'] = 'width';
            $config['width'] = 330;
            $config['height'] = 240;
            $config['maintain_ratio'] = FALSE;
            $this->image_lib-> initialize($config);
            $this->image_lib-> resize();
            $this->image_lib-> clear();
            $img = 'upload/'.$upload_data['raw_name'] . '_thumb'  . $upload_data['file_ext'];

            $this->load->model('blog_model');
            if($flag ==0){
                $rows = $this->blog_model->save($title, $clicked, $content, $img);
                if($rows > 0){
                    redirect('admin/blog');
                }else{
                    echo '发表文章失败';
                }
            }else{
                $rows = $this->blog_model->update($flag,$title, $clicked, $content, $img);
                 if($rows > 0){
                    redirect('admin/blog');
                }else{
                    echo '发表跟新失败';
                }
            }
        }else{
                var_dump($this->upload->display_errors());
                echo '文件上传失败!';
            }
    }
    public function mgr_blog($offset=0){
        /* page config start*/
        $title = $this->input->get('title');
        $total_rows = $this->blog_model->get_counts($title);
        $this->load->library('pagination');
        $config['base_url'] = 'admin/blog/';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        /* page config end*/
         $blogs = $this->blog_model-> get_blogs_by_page($title, $config['per_page'], $offset);
         $this->load->view('admin/admin_blog', array(
            'blogs' => $blogs
        ));
    }
    public function edit_blog(){
        $blog_id = $this->input->get('blog_id');
        $blog = $this->blog_model->get_by_id($blog_id);
        $this->load->view('admin/edit_blogs',array('blog'=>$blog));
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
   public function mgr_comment($offset=0){
    /* page config start*/
        $total_rows = $this->comment_model->get_counts();
        $this->load->library('pagination');
        $config['base_url'] = 'admin/comment/';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        /* page config end*/
       $com = $this->comment_model-> get_all_comments($config['per_page'], $offset);
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
/**contact
*/
   public function contact($offset=0){
        /* page config start*/
        $total_rows = $this->contact_model->get_counts();
        $this->load->library('pagination');
        $config['base_url'] = 'admin/contact/';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        /* page config end*/
         $contacts = $this->contact_model-> get_all($config['per_page'], $offset);
         $this->load->view('admin/admin_contact',array('contacts'=>$contacts));
   }
   public function delete_contact(){
        $con_id = $this ->input-> get('contactId');
        $rows = $this ->contact_model-> delete($con_id);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
   }
    public function delete_selected_contact(){
        $contact_ids = $this->input-> get('contactIdStr');
        $rows = $this->contact_model->delete_selected($contact_ids);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
   }
}
