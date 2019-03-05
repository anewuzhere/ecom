<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Manila");
class UserController extends CI_Controller {


	public function __construct(){
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper(array('form','url','string'));
        

      if(!$this->session->has_userdata('isloggedin')||$this->session->access_lvl!="user"){
            redirect('Login/');
        }
    }
     public function insert_user_log($username, $action,$link){
        $data = array(
            'username' => $username,
            'action' => $action,
            'link' => $link,
            'date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_userlog', $data);
    }
    public function landing()
	{
        $id = $this->session->id;
        $head['title'] = "Bluelagoon Travel and Tours";
        $data['anal'] = $this->UserModel->getlastTransaction($id);
       if($data['anal'] != NULL){ $data['package'] = $this->UserModel->getPackage($data['anal']->package_id);}
        $data['reco'] = $this->UserModel->get4Package();
        $data['u'] = $this->UserModel->getAllPackage();
		$this->load->view('UserView/header',$head);
    	$this->load->view('UserView/landing',$data);        
       $this->load->view('UserView/footer');
	}
	public function rateMyTransaction()
	{
         $id = $this->uri->segment(3);
         $id2 = $this->session->id;
         $data['anal'] = $this->UserModel->getlastTransaction($id2);
        $data['package'] = $this->UserModel->getPackage($data['anal']->package_id);
        $ratin = $data['package']->ratings + $this->input->post('stars');
        $user = array(
                    'ratings' => $ratin,  
                );
        $acc = array(
                    'isRated' => "y",  
                );
        $this->UserModel->updatePackage($data['package']->package_id,$user);
        $this->UserModel->UpdateCancel($id,$acc);
        redirect(base_url().'UserController/landing');
        
	}
	public function index()
	{
        $id =  $this->session->id;
        $data['error'] = $this->session->flashdata('error');
        $data['success'] = $this->session->flashdata('success');
        $data['pack'] = $this->UserModel->getAllPackage();
        $data['u'] = $this->UserModel->getUser($id);
        $head['title'] = "Travel Now Asia";
		$this->load->view('UserView/header',$head);
		$this->load->view('UserView/index',$data);        
        $this->load->view('UserView/footer');
	}
   public function logout(){
       $this->insert_user_log($this->session->username, "Logged Out" , "AdminController/logout");
        $this->session->sess_destroy();
        redirect('Login/','Logged out');
        }
    public function editUser(){
        $id = $this->uri->segment(3);

        $data['u'] = $this->UserModel->getUser($id);
        $head['title'] = "Travel Now Asia";
        $this->load->view('UserView/header',$head);
        $this->load->view('UserView/editUser', $data);
        $this->load->view('UserView/footer');
    }

    public function ajaxHotel(){
        $id = $this->uri->segment(3);
      $q = $this->UserModel->HotelAjax($id);
       echo json_encode($q);
        }
    public function ajaxRate(){
        $id = $this->uri->segment(3);
      $q = $this->UserModel->RateAjax($id);
       echo json_encode($q);
        }

    public function ajaxInclusion(){
        $id = $this->uri->segment(3);
      $q = $this->UserModel->InclusionAjax($id);
       echo json_encode($q);
        }

    public function do_book(){
        $data['rate'] = $this->UserModel->getRate($this->input->post('rate'));
            $price = 0;
            $elylove = "";
           // $inclusions = implode(',',$_POST['ckb']);
           // $inclusion = explode(',',$inclusions);
          //  echo $inclusion;
         if($_POST['ckb'] != NULL){
         foreach($_POST['ckb'] as $ely){
             $str = (string)$ely;
             $intr = (int)$ely;
            $elylove .= $str.',';
            //echo $str." ";
            $data['inc'] = $this->UserModel->getInclusion2($intr);
                $price += $data['inc']->price;
               // echo $price;
                
         }
         }
             $price = ($price + $data['rate']->rate_price) * $data['rate']->rate_person;
           $user = array(
                    'account_id' => $this->session->id,
                    'package_id' => $this->input->post('package'),
					'tour_id' => $this->input->post('hotel'), 
                    'rate_id' => $this->input->post('rate'),
                    'inclusion_id' => $elylove,
					'name' => $this->input->post('name'),
					'mobileno' => $this->input->post('mobileno'),       
                    'email' => $this->input->post('email_address'),
                    'address' => $this->input->post('home_address'),
					'date' => strtotime($this->input->post('date')),
					'status' =>"On hold",
                    'isCurrent' =>"y",
                    'price' =>$price,
                    'date_created' =>time(),  
                );
                $acc = array(
                    'haveCurrentBook' => "y",  
                );
        
                $this->form_validation->set_rules('package', 'package', 'required');
                $this->form_validation->set_rules('hotel', 'hotel', 'required');
				$this->form_validation->set_rules('rate', 'rate', 'required');
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('mobileno', 'mobileno', 'required');
				$this->form_validation->set_rules('email_address', 'email_address', 'required');
                $this->form_validation->set_rules('home_address', 'home_address', 'required');
                if ($this->form_validation->run() == FALSE)
                {
                    $this->session->set_flashdata('error', validation_errors());
                    redirect(base_url().'UserController/index');
                }
                else
                {
                   
                   $this->insert_user_log($this->session->username, "Book Transaction With ID of ".$this->session->id , "UserController/index");
                    $this->UserModel->insertBook($user);
                     $this->UserModel->updateUser($this->session->id,$acc);
                   // redirect('admins/index');
                   $this->session->set_flashdata('success', 'Successfully Booked a Travel Package');
				   $data['title'] = "Successfully Upadated a account";
				  redirect(base_url().'UserController/index');				   
                } 

        }
        
    
public function do_book_fixed(){
        $elylove= " ";
        $data['fix'] = $this->UserModel->getInclusion_fixed($this->input->post('id'));
        $data['inc'] = $this->UserModel->getInclusion($this->input->post('id'));
        $data['rate'] = $this->UserModel->getRate($this->input->post('rate'));
            $price =  0;

            foreach($data['inc'] as $money){
                $price += $money->price;
                         
            }
         //  echo join(',',$data['fix']);
        // print_r (',',json_encode($data['fix']));
        foreach($data['fix'] as $love){
            $str = (string)$love->inc_id;
            $elylove .= $str.',';
            }
            $price = ($price + $data['rate']->rate_price) * $data['rate']->rate_person;
        $user = array(
                    'account_id' => $this->session->id,
                    'package_id' => $this->input->post('id'),
					'tour_id' => $this->input->post('hotel'), 
                    'rate_id' => $this->input->post('rate'),
                    'inclusion_id' => $elylove,
					'name' => $this->input->post('name'),
					'mobileno' => $this->input->post('mobileno'),       
                    'email' => $this->input->post('email_address'),
                    'address' => $this->input->post('home_address'),
					'date' => strtotime($this->input->post('date')),
					'status' =>"On hold",
                    'isCurrent' =>"y",
                    'price' =>$price,
                    'date_created' =>time(),  
                );
        
                $this->form_validation->set_rules('hotel', 'hotel', 'required');
				$this->form_validation->set_rules('rate', 'rate', 'required');
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('mobileno', 'mobileno', 'required');
				$this->form_validation->set_rules('email_address', 'email_address', 'required');
                $this->form_validation->set_rules('home_address', 'home_address', 'required');
                if ($this->form_validation->run() == FALSE)
                {
                    $this->session->set_flashdata('error', validation_errors());
                    redirect(base_url().'UserController/index');
                }
                else
                {
                   
                   $this->insert_user_log($this->session->username, "Book Transaction With ID of ".$this->session->id , "UserController/index");
                   $this->session->set_flashdata('success', 'Successfully Booked a Travel Package');
                    $this->UserModel->insertBook($user);
                   // redirect('admins/index');
				   $data['title'] = "Successfully Upadated a account";
				  redirect(base_url().'UserController/index');				   
                } 
        } 


            

            public function myTransactions(){
        $id = $this->session->id;
        $data['error'] = $this->session->flashdata('error');
        $data['success'] = $this->session->flashdata('success');
        $data['u'] = $this->UserModel->getAllTransaction($id);
        if($data['u']==NULL){
            $this->session->set_flashdata('error', 'No Current Transaction');
            redirect(base_url().'UserController/index');	
        }
        $data['package'] = $this->UserModel->getPackage($data['u']->package_id);
        $data['tour'] = $this->UserModel->getTour($data['u']->tour_id);
        $data['rate'] = $this->UserModel->getRate($data['u']->rate_id);
        $data['inc'] = $this->UserModel->getInclusion($data['u']->package_id);
        $data['inclusion'] = explode(',',$data['u']->inclusion_id);
       $head['title'] = "Travel Now Asia - My Booking";
       $this->load->view('UserView/header',$head);
      $this->load->view('UserView/mytransaction', $data);
      $this->load->view('UserView/footer');
    }

    public function cancelTransaction(){
        $id = $this->uri->segment(3);
        $user = array(
					'status' =>"cancelled",
                    'isCurrent' =>"n",
                );
        $user2 = array(
					'haveCurrentBook' =>"n",
                );
         $this->UserModel->UpdateCancel($id,$user);
         $this->session->set_flashdata('success', 'Successfully Cancelled a Travel Package');
          $this->UserModel->updateUser($this->session->id,$user2);
         redirect(base_url().'UserController/index');
    }
    

    public function addPayment(){
        $id = $this->uri->segment(3);
        $data['success'] = $this->session->flashdata('success');
        $data['u'] = $this->UserModel->getTransaction($id);
        $head['title'] = "Travel Now Asia - Add Payment";
        $this->load->view('UserView/header',$head);
        $this->load->view('UserView/addpayment', $data);
        $this->load->view('UserView/footer');
    }
    public function pastTransaction(){
        
        $id = $this->session->id;
        $data['transaction'] = $this->UserModel->getprevtransaction($id);
        $data['error'] = $this->session->flashdata('error');
        $data['package'] = $this->UserModel->getAllPackage();
        $head['title'] = "Travel Now Asia - Previous Transactions";
		$this->load->view('UserView/header',$head);
		$this->load->view('UserView/pastTransaction',$data);
        $this->load->view('UserView/footer');
	}
    public function do_addPayment(){
        $id = $this->input->post('id');
        $user = array(
					'paymentmethod' => $this->input->post('customer1'),
                    'end_date' => strtotime($this->input->post('datedeposit')),
                    'end_time' => strtotime($this->input->post('endtime')),
                    'deposit_id' => $this->input->post('bank'),
                );
         $this->form_validation->set_rules('customer1', 'Payment Type', 'required');
         $this->form_validation->set_rules('datedeposit', 'Date Deposit', 'required');
         $this->form_validation->set_rules('endtime', 'Time', 'required');
                if ($this->form_validation->run() == FALSE)
                {
                    $this->session->set_flashdata('error', validation_errors());
                    redirect(base_url().'UserController/index');
                }
                else
                {       
         $this->UserModel->UpdateCancel($id,$user);
            $this->session->set_flashdata('success', 'Successfully Added a payment');
         redirect(base_url().'UserController/myTransactions');
                }
    }

    public function do_upload()
    {
        $id = $this->input->post('id');
        $data['u'] = $this->UserModel->getTransaction($id);
        
            $config['upload_path']          = './images/receipts/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1024;
            $config['max_width']            = 1200;
            $config['max_height']           = 1200;
            $config['file_name']            = $data['u']->transaction_id;
            $config['overwrite']            = FALSE;
            
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('userfile'))
            {
                    $data['error'] = $this->upload->display_errors();
                    $head['title'] = "Travel Now Asia - Add Payment";
                    $this->load->view('UserView/header',$head);
                    $this->load->view('UserView/addpayment', $data);
                    $this->load->view('UserView/footer');
            }
            else
            {
                    $data = $this->upload->data();
                    $this->session->set_flashdata('success', 'Successfully Upload Image');
                    $this->UserModel->updateCancel($id,array(
                        'picpath' => $data['file_name'],                        
                        ));
                    redirect(base_url().'UserController/addPayment/'.$id);
            }
    }


    public function fixed()
	{
        $id =  $this->uri->segment(3);
        $data['error'] = $this->session->flashdata('error');
        $data['pack'] = $this->UserModel->getPackage($id);
        $data['hotel'] = $this->UserModel->HotelAjax($id);
        $data['inc'] = $this->UserModel->getInclusion($data['pack']->package_id);
        $data['u'] = $this->UserModel->getUser($this->session->id);
        $head['title'] = "Travel Now Asia";
		$this->load->view('UserView/header',$head);
		$this->load->view('UserView/fixed',$data);        
        $this->load->view('UserView/footer');
	}

       /*     public function test(){
       $string = "1,2,3";
$integerIDs = array_map('intval', explode(',', $string));

$imp = implode(',',$integerIDs);
echo $imp;
            }

            */
}