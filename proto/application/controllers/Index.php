<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
    
    public function index(){
        $this->load->view('include/header');
        $this->load->view('include/header_nav');
        $this->load->view('include/footer');
        $this->load->view('system/admindash');
    }      
    
    }
?>