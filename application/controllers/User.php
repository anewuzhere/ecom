<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
            parent::__construct();
            $this->load->model('UserModel');
    }
    
    
    public function index(){
        
    
        $this->load->view('include/header');
        $this->load->view('include/header_nav');
        $this->load->view('mode/index');
        $this->load->view('include/footer');

    }  
    public function form(){
        $this->load->view('include/header');
        // $this->load->view('include/header_nav');
        $this->load->view('include/footer');
        $this->load->view('mode/form',compact('items'));
    }  
    public function table(){
        
        $this->load->view('include/header');
        $this->load->view('include/header_nav');
        $this->load->view('mode/table');
        $this->load->view('include/footer');
    } 
    public function calendar(){
        
        $this->load->view('include/calendar_header');
        $this->load->view('include/header_nav'); 
        $this->load->view('mode/calendar');
        $this->load->view('include/calendar_footer');
    }  
    public function stats(){
        
        $this->load->view('include/header');
        $this->load->view('include/header_nav');
        $this->load->view('mode/stats');
        $this->load->view('include/stats_footer');
    }   
    public function manageuser(){
       
        $items =  $this->UserModel->getItems();
        $this->load->view('include/header');
        $this->load->view('include/header_nav');
        $this->load->view('include/footer');
        $this->load->view('mode/manageuser',compact('items'));
    }

    public function view($id){
        $item = $this->UserModel->getProd($id);
        $this->load->view('include/header');
        $this->load->view('include/header_nav');
        $this->load->view('mode/view',compact('item'));
        $this->load->view('include/footer');
    }
    public function add(){
        
        $this->load->view('include/header');
        // $this->load->view('include/header_nav');
        $this->load->view('mode/add' );
        $this->load->view('include/footer');

    }
    public function edit($id){
        $item =$this->UserModel->getProd($id);
        $this->load->view('include/header');
     
        $this->load->view('mode/edit',compact('item'));
        $this->load->view('include/footer');

    }
    public function delete($id){
        $item =$this->UserModel->getProd($id);
        $this->load->view('include/header');
        $this->load->view('include/header_nav');
        $this->load->view('mode/delete',compact('item'));
        $this->load->view('include/footer');
    } 
    public function del($id){
        // $this->debug($item);
        $data= $this->input->post();
        unset($data['delete']);
         $item =$this->uri->segment(4);
         $this->UserModel->delete($id,$data);
         redirect('user/manageuser');
     
        // return Redirect::route('item');
     }
     public function register(){
        $data = $this->input->post();
        
        unset($data['add']);

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('repass', 'Password Confirmation', 'required|matches[password]');
        
  

      if ($this->form_validation->run() == FALSE)
      {
          $this->add();
          echo "error";
      }
      else
      {
            $this->UserModel->insertUser($data);
       
          redirect('user/manageuser');
      }
  
        
}
public function update($id){
    $data = $this->input->post();
    unset($data['submit']);

    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
    $this->form_validation->set_rules('repass', 'Password Confirmation', 'required|matches[password]');
    


  if ($this->form_validation->run() == FALSE)
  {
       $this->edit('id');
      echo "error";
  }
  else
  {
    $this->UserModel-> update($id,$data);
      redirect('user/manageuser');
  }
//  public function update($id){
//         $data= $this->input->post();
//        //$this->debug($data);
//         unset($data['submit']);
//         $this->UserModel-> update($id,$data);
//         $this->index();
       
       
//     }
    }
}
?>