<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function __construct()
    {
            parent::__construct();
            $this->load->model('UserModel');
    }

    public function admin(){
        $this->load->view('include/login_header');
        $this->load->view('admin/login');
        $this->load->view('include/footer');
       if($this->session->userdata('username') !=''){ 
            redirect('admin/homepage');
       }else{} 
   }
    public function signinadmin(){

        $admin = array(
        'username' => $this->input->post('username'),
        'password' => sha1($this->input->post('password')));
        $admin = $this->AdminModel->getAdmin($admin);

        if(!$admin == null){

            $newdata = array(
                'name'  => $admin->name,
                'username' => $admin->username,
                'logged_in' => TRUE,
                'isAdmin' => TRUE
            );
            $this->session->set_userdata($newdata);
            redirect('admin/homepage');
        }
        else{
            $this->session->set_flashdata('error','Invalid Username or Password');  
            redirect('login/admin');
        }
    }

 

    public function logoutadmin(){
        $this->session->sess_destroy();
        redirect('login/admin');

    }
?>