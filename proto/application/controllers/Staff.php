<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
    public function __construct()
    {
            parent::__construct();
            $this->load->model('StaffModel');
    }
    
    
    public function index(){
        
        //$items =  $this->UserModel->getItems();
        $this->load->view('includes/header');
        $this->load->view('includes/header_nav');
        $this->load->view('staff/index');
        $this->load->view('includes/footer');
    }   
    public function calendar(){
        
        $this->load->view('includes/header');
        $this->load->view('includes/header_nav'); 
        $this->load->view('staff/calendars');
        $this->load->view('includes/footer');
    }  
    public function customer(){
         $items =  $this->StaffModel->view();
         $this->load->view('includes/header');
         $this->load->view('includes/header_nav');
         $this->load->view('staff/customer',compact('items'));
         $this->load->view('includes/footer');
     }
     public function driver(){
        
         $items =  $this->UserModel->getItems();
         $this->load->view('includes/header');
         $this->load->view('includes/header_nav');
      
         $this->load->view('staff/driver',compact('items'));
         $this->load->view('includes/footer');
     }
     public function conductor(){
        
         $items =  $this->UserModel->getItems();
         $this->load->view('includes/header');
         $this->load->view('includes/header_nav');
         $this->load->view('includes/footer');
         $this->load->view('staff/conductor',compact('items'));
     } 
     public function view($id){
        $item = $this->StaffModel->getProd($id);
        $this->load->view('includes/header');
        $this->load->view('includes/header_nav');
        $this->load->view('staff/view',compact('item'));
        $this->load->view('includes/footer');
    }
    public function add(){
        
        $this->load->view('includes/header');
        $this->load->view('includes/header_nav');
        $this->load->view('staff/add' );
        $this->load->view('includes/footer');

    }
    public function edit($id){
        $item =$this->UserModel->getProd($id);
        $this->load->view('includes/header');
        $this->load->view('');
        $this->load->view('staff/edit',compact('item'));
        $this->load->view('includes/footer');

    }
    public function delete($id){
        $item =$this->UserModel->getProd($id);
        $this->load->view('includes/header');
        $this->load->view('includes/header_nav');
        $this->load->view('staff/delete',compact('item'));
        $this->load->view('includes/footer');
    } 
    public function del($id){
        // $this->debug($item);
        $data= $this->input->post();
        unset($data['delete']);
         $item =$this->uri->segment(4);
         $this->StaffModel->delete($id,$data);
         redirect('staff/customer');
     
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
            $this->StaffModel->insertUser($data);
       
          redirect('staff/customer');
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
      redirect('staff/customer');
  }

    }
  
    }
?>