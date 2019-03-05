<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Manila");
class AdminController extends CI_Controller {


	public function __construct(){
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper(array('form','url','string'));

      if(!$this->session->has_userdata('isloggedin')||$this->session->access_lvl!="administrator"){
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
	
	public function index()
	{
        $head['title'] = "Bluelagoon";
        $data['transaction'] = $this->AdminModel->countAllTransaction();
        $data['user'] = $this->AdminModel->countAllUser();
        $data['sales'] = $this->AdminModel->countTransaction();
        $data['pack'] = $this->AdminModel->countAllPackage();
        $data['cur'] = $this->AdminModel->getCurrentTransaction();
        $data['four'] = $this->AdminModel->get4Package();
		$this->load->view('AdminView/header',$head);
        $this->load->view('AdminView/index',$data);
        $this->load->view('AdminView/footer');
	}
    public function forcasting()
	{
	    $year = $this->uri->segment(3);
        $data['user'] = $this->AdminModel->foreCast($year);
        $data['datee'] = $this->AdminModel->foreCastAll();
        $head['title'] = "Bluelagoon - Sales Forecast";
        $data['yeartitle'] = $year;
		$this->load->view('AdminView/header',$head);
        $this->load->view('AdminView/forcast',$data);
        $this->load->view('AdminView/footer');
	}
     public function userlog()
	{
        $head['title'] = "Bluelagoon - User logs";
        $data['user'] = $this->AdminModel->viewLogs();
		$this->load->view('AdminView/header',$head);
        $this->load->view('AdminView/userlog',$data);
        $this->load->view('AdminView/footer');
	}
  public function users()
	{
    $data['user'] = $this->AdminModel->getAllUser();
    $head['title'] = "Bluelagoon";
    $data['error'] = $this->session->flashdata('error');
		$this->load->view('AdminView/header',$head);
		$this->load->view('AdminView/usersview',$data);
    $this->load->view('AdminView/footer');
	}
	public function client()
	{
    $data['client'] = $this->AdminModel->getAllClient();
    $head['title'] = "Bluelagoon - Customer Management";
		$this->load->view('AdminView/header',$head);
		$this->load->view('AdminView/clientview',$data);
    $this->load->view('AdminView/footer');
	}

   public function logout(){
        //$this->insert_user_log($this->session->username, 'logged out');
        $this->session->sess_destroy();
        $this->insert_user_log($this->session->username, "Logout" , "AdminController/logout");
        redirect('Login/','Logged out');
        }
        public function editUser(){
        $id = $this->session->id;

        $data['u'] = $this->AdminModel->getUser($id);
        $head['title'] = "Bluelagoon";
        $this->load->view('AdminView/header',$head);
        $this->load->view('AdminView/editUser', $data);
        $this->load->view('AdminView/footer');
    }
    public function viewAccount(){
        $id = $this->uri->segment(3);
        $head['title'] = "Bluelagoon";
        $data['u'] = $this->AdminModel->getUser($id);
        $this->load->view('AdminView/header',$head);
        $this->load->view('AdminView/viewUserAcc', $data);
        $this->load->view('AdminView/footer');
    }
     public function editAcc(){
        $id = $this->uri->segment(3);
        $head['title'] = "Bluelagoon";
        $data['u'] = $this->AdminModel->getUser($id);
        $this->load->view('AdminView/header',$head);
        $this->load->view('AdminView/editAccount', $data);
        $this->load->view('AdminView/footer');
    }
    public function do_editAcc(){
        $id = $this->input->post('id');
                $user = array(
                    'firstname' => $this->input->post('first_name'),
					'middlename' => $this->input->post('middle_name'),
					'lastname' => $this->input->post('last_name'),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email_address'),
                    'address' => $this->input->post('home_address'),
                    'access_lvl' => $this->input->post('access_lvl'),
                    'updated_at'=> time(),
					 
                    
                );
        
                $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[3]');
				$this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[3]');
              //  $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_accounts.username]');
               // $this->form_validation->set_rules('email_address', 'Email', 'required|is_unique[tbl_accounts.email]');
                $this->form_validation->set_rules('home_address', 'Home Address', 'required');
                $this->form_validation->set_rules('mobileno', 'Mobile Number', 'required');
                if ($this->form_validation->run() == FALSE)
                {
                    redirect(base_url().'AdminController/editAcc/'.$id);
                }
                else
                {
                   
                   $this->insert_user_log($this->session->username, "Edit Account" , "AdminController/editAcc");
                    $this->AdminModel->updateUser($id,$user);
                   // redirect('admins/index');
                   $this->session->set_flashdata('error', 'Successfully Upadated a account');
				   $data['title'] = "Successfully Upadated a account";
				   redirect(base_url().'AdminController/users/');				   
                }   
            }
        public function deleteUser(){
            $account_id = $this->uri->segment(3);        
          $this->insert_user_log($this->session->username, "Delete Account : ID = ".$account_id , "AdminController/deleteUser");
            $this->AdminModel->deleteUser($account_id);
            $this->session->set_flashdata('error', 'Successfully Deleted a account');
            redirect('AdminController/users');
        }
        public function register(){
            $head['title'] = "Bluelagoon";
        $this->load->view('AdminView/header',$head);
        $this->load->view('AdminView/register');
        $this->load->view('AdminView/footer');
    }
   public function reg(){
        
                $user = array(
                    'firstname' => $this->input->post('first_name'),
					'middlename' => $this->input->post('middle_name'),
					'lastname' => $this->input->post('last_name'),
                    'password' => sha1($this->input->post('password')),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email_address'),
                    'access_lvl' => $this->input->post('access_lvl'),
                    'mobileno' => $this->input->post('mobileno'),
                    'created_at'=> time(),
					'activation' => mt_rand(100000, 999999),
                    'picpath'=> 'sample1.jpg', //static
					 
                    
                );
        
                $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[3]');
				$this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[3]');
                $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_accounts.username]');
                $this->form_validation->set_rules('email_address', 'Email', 'required|is_unique[tbl_accounts.email]');
				$this->form_validation->set_rules('password',"Password","required|alpha_numeric");
                $this->form_validation->set_rules('confirm_password',"Confirm Password","required|alpha_numeric|matches[password]");
                if ($this->form_validation->run() == FALSE)
                {
                    $this->register();
                }
                else
                {
                   
                   $this->insert_user_log($this->session->username, "Register Account with username ".$this->input->post('username') , "AdminController/editAcc");
                    $this->AdminModel->insertUser($user);
                   // redirect('admins/index');
				   $data['title'] = "Successfully created a account";
				   $this->session->set_flashdata('error', 'Successfully created a account');
				   $this->users();
				   
                }
        
                
            }
     public function packagelist(){
         $head['title'] = "Bluelagoon";
         $data['error'] = $this->session->flashdata('error');
        $data['user'] = $this->AdminModel->getAllPackage();
		$this->load->view('AdminView/header',$head);
		$this->load->view('AdminView/packageView',$data);
        $this->load->view('AdminView/footer');
	}
	
	public function feedbacklist(){
         $head['title'] = "Bluelagoon";
         $data['error'] = $this->session->flashdata('error');
        $data['user'] = $this->AdminModel->getAllFeedback();
        $data['four'] = $this->AdminModel->getratePackage();
		$this->load->view('AdminView/header',$head);
		$this->load->view('AdminView/feedback',$data);
        $this->load->view('AdminView/footer');
	}
	

	
    public function viewPackage(){
        
        $id =$this->uri->segment(3); 
        $data['user'] = $this->AdminModel->getPackage($id);
        $data['error'] = $this->session->flashdata('error');
        $data['inc'] = $this->AdminModel->getInclusion($id);
        $data['tour'] = $this->AdminModel->getTour($id);
        $head['title'] = $data['user']->package_name;
		$this->load->view('AdminView/header',$head);
		$this->load->view('AdminView/packageDetails',$data);
        $this->load->view('AdminView/footer');
	}
     public function addPackage(){ 
        $data['error'] = $this->session->flashdata('error');
        $head['title'] = " Add New Package";
        $this->load->view('AdminView/header',$head);
        $this->load->view('AdminView/addPackage',$data);
        $this->load->view('AdminView/footer');
    }  
    public function do_addPackage(){
                $user = array(
                    'package_name' => $this->input->post('package_name'),
                    'package_place' => $this->input->post('package_place'),
					'package_status' => $this->input->post('package_status'),
                    'package_dateA'=>strtotime($this->input->post('Sdate')),
                    'package_dateE'=>strtotime($this->input->post('Edate')),
                  
                );
        
                $this->form_validation->set_rules('package_name', 'Package Name', 'required|is_unique[tbl_package.package_name]');
                $this->form_validation->set_rules('package_place', 'Country or City', 'required');
				$this->form_validation->set_rules('package_status', 'Status', 'required');
                if ($this->form_validation->run() == FALSE)
                {
                    $this->session->set_flashdata('error', validation_errors());
                    redirect(base_url().'AdminController/addPackage');
                }
                else
                {
                   
                     $this->insert_user_log($this->session->username, "Register tour package with name of ".$this->input->post('package_name') 
                     , "AdminController/addPackage");
                    $this->AdminModel->insertPackage($user);
                   // redirect('admins/index');
				   $data['title'] = "Successfully Upadated a account";
				   $this->session->set_flashdata('error', 'Successfully created a package');
				   redirect(base_url().'AdminController/packagelist');				   
                }   
            } 
        public function editPackage(){ 
            $id =$this->uri->segment(3);
            $data['error'] = $this->session->flashdata('error');
            $data['package'] = $this->AdminModel->getPackage($id);
            $head['title'] =" Edit Package";
		    $this->load->view('AdminView/header',$head);
		    $this->load->view('AdminView/editPackage',$data);
            $this->load->view('AdminView/footer');
	}  
    public function do_editPackage(){
        $id = $this->input->post('id');
                $user = array(
                    'package_name' => $this->input->post('package_name'),
                    'package_place' => $this->input->post('package_place'),
					'package_status' => $this->input->post('package_status'),
                    'package_dateA'=>strtotime($this->input->post('Sdate')),
                    'package_dateE'=>strtotime($this->input->post('Edate')),                 
                );
                    $this->insert_user_log($this->session->username, "Modify tour package with name of ".$this->input->post('package_name') 
                     , "AdminController/editPackage");
                    $this->AdminModel->updatePackage($id,$user);
                    $this->session->set_flashdata('error', 'Successfully Updated a package');
				   $data['title'] = "Successfully Upadated a account";
				   redirect(base_url().'AdminController/packagelist');				    
            }   


    public function deletePackage(){
            $id = $this->uri->segment(3);        
          $this->insert_user_log($this->session->username, "Delete tour package with ID of ".$id 
                     , "AdminController/deletePackage");
            $this->AdminModel->deletePackage($id);
            $this->session->set_flashdata('error', 'Successfully Deleted a package');
            redirect(base_url().'AdminController/packagelist');
        }


    public function viewInclusion(){
        
        $id =$this->uri->segment(3); 
        $id2 =$this->uri->segment(4); 
        $data['user'] = $this->AdminModel->getPackage($id2);
        $data['inc'] = $this->AdminModel->getOneInclusion($id);
        $head['title'] = $data['user']->package_name." - Edit Inclusion";
		$this->load->view('AdminView/header',$head);
		$this->load->view('AdminView/editInclusion',$data);
        $this->load->view('AdminView/footer');
	}
     public function do_editInclusion(){
        $id = $this->input->post('id');
                $user = array(
                    'inclusions' => $this->input->post('inclusions'),
                    'price' => $this->input->post('price'),
					'description' => $this->input->post('description'),                  
                );
                   $this->insert_user_log($this->session->username, "Edit Inclusion package with name of ".$this->input->post('inclusion') 
                     , "AdminController/do_editInclusion");
                    $this->AdminModel->updateInclusion($id,$user);
                    $this->session->set_flashdata('error', 'Successfully Updated a Inclusion');
				   $data['title'] = "Successfully Upadated a account";
				   redirect(base_url().'AdminController/packagelist');				    
            }

    public function deleteInclusion(){
            $id = $this->uri->segment(3);        
          $this->insert_user_log($this->session->username, "Delete Inclusion package with ID of ".$id
                     , "AdminController/deleteInclusion");
                     $this->session->set_flashdata('error', 'Successfully Deleted a package');
            $this->AdminModel->deleteInclusion($id);
            redirect(base_url().'AdminController/packagelist');
        }

    public function addInclusion(){
        $id = $this->uri->segment(3); 
        $data['error'] = $this->session->flashdata('error');
        $data['user'] = $this->AdminModel->getPackage($id);    
        $head['title'] = $head['title'] = $data['user']->package_name." - Add Inclusion";;
        $this->load->view('AdminView/header',$head);
        $this->load->view('AdminView/addInclusion',$data);
        $this->load->view('AdminView/footer');
    }
    public function do_addInclusion(){
        $id = $this->input->post('id');
                $user = array(
                    'inclusions' => $this->input->post('inclusions'),
                    'price' => $this->input->post('price'),
					'description' => $this->input->post('description'),
					'inc_package_id' => $id,                   
                );
        
                $this->form_validation->set_rules('inclusions', 'Inclusion Name', 'required|is_unique[tbl_inclusions.inclusions]');
				$this->form_validation->set_rules('description', 'Description', 'required');
                if ($this->form_validation->run() == FALSE)
                {
                    $this->session->set_flashdata('error', validation_errors());
                    redirect(base_url().'AdminController/addInclusion/'.$id);
                }
                else
                {
                   
                   $this->insert_user_log($this->session->username, "Add Inclusion package with name of ".$this->input->post('inclusions') 
                     , "AdminController/deleteInclusion");
                    $this->AdminModel->insertInclusion($user);
                   // redirect('admins/index');
                   $this->session->set_flashdata('error', 'Successfully created a inclusion');
				   $data['title'] = "Successfully Upadated a accounts";
				   redirect(base_url().'AdminController/viewPackage/'.$id);				   
                }   
            }
            public function viewHotel(){
        
        $id =$this->uri->segment(3); 
        $id2 =$this->uri->segment(4); 
        $data['user'] = $this->AdminModel->getPackage($id2);
        $data['tour'] = $this->AdminModel->getOneHotel($id);
        $head['title'] = $data['user']->package_name." - Edit Hotel Accomodation";
		$this->load->view('AdminView/header',$head);
		$this->load->view('AdminView/editHotel',$data);
        $this->load->view('AdminView/footer');
	}
    public function do_editHotel(){
        $id = $this->input->post('id');
                $user = array(
                    'tour_name' => $this->input->post('tour_name'),
					'description' => $this->input->post('description'),                  
                );
                   $this->insert_user_log($this->session->username, "Edit Hotel Accommodation with name of ".$this->input->post('tour_name') 
                     , "AdminController/do_editHotel");
                    $this->AdminModel->updateHotel($id,$user);
                    $this->session->set_flashdata('error', 'Successfully Updated a Hotel Accommodation');
				   $data['title'] = "Successfully Upadated a account";
				   redirect(base_url().'AdminController/packagelist');				    
            }
     public function deleteHotel(){
            $id = $this->uri->segment(3);        
          $this->insert_user_log($this->session->username, "Delete Hotel Accommodation with ID of ".$id
                     , "AdminController/do_editHotel");
            $this->AdminModel->deleteHotel($id);
            $this->session->set_flashdata('error', 'Successfully Deleted a Hotel Accommodation');
            redirect(base_url().'AdminController/packagelist');
        }
        public function addHotel(){
        $id = $this->uri->segment(3); 
        $data['error'] = $this->session->flashdata('error');
        $data['user'] = $this->AdminModel->getPackage($id);    
        $head['title'] = $head['title'] = $data['user']->package_name." - Add Hotel Accommodation";;
        $this->load->view('AdminView/header',$head);
        $this->load->view('AdminView/addHotel',$data);
        $this->load->view('AdminView/footer');
    }   
    public function do_addHotel(){
        $id = $this->input->post('id');
                $user = array(
                    'tour_name' => $this->input->post('tour_name'),
                    'tour_slots' => $this->input->post('tour_slots'),
					'description' => $this->input->post('description'),
					'package_id_f' => $id,                   
                );
        
                $this->form_validation->set_rules('tour_name', 'Hotel Accommodation Name', 'required|is_unique[tbl_tourpackage.tour_name]');
                $this->form_validation->set_rules('tour_slots', 'tour_slots', 'required');
				$this->form_validation->set_rules('description', 'Description', 'required');
                if ($this->form_validation->run() == FALSE)
                {
                    $this->session->set_flashdata('error', validation_errors());
                    redirect(base_url().'AdminController/addHotel/'.$id);
                }
                else
                {
                   
                   $this->insert_user_log($this->session->username, "Add Hotel Accommodation with name of ".$this->input->post('tour_name') 
                     , "AdminController/do_addHotel");
                    $this->AdminModel->insertHotel($user);
                   // redirect('admins/index');
                   $this->session->set_flashdata('error', 'Successfully Created a Hotel Accommodation');
				   $data['title'] = "Successfully Upadated a account";
				   redirect(base_url().'AdminController/viewPackage/'.$id);				   
                }   
            }    
            public function viewRate(){
        
        $id =$this->uri->segment(3);
        $id2 =$this->uri->segment(4);  
        $data['user'] = $this->AdminModel->getPackage($id2);
        $data['tour'] = $this->AdminModel->getOneHotel($id);
        $data['error'] = $this->session->flashdata('error');
        $data['rate'] = $this->AdminModel->getRate($id);
        $head['title'] = $data['user']->package_name." - Package Rates";
		$this->load->view('AdminView/header',$head);
		$this->load->view('AdminView/viewRate',$data);
        $this->load->view('AdminView/footer');
	}

        public function deleteRate(){
            $id = $this->uri->segment(3);        
          $this->insert_user_log($this->session->username, "Delete Tour Rates with ID of ".$id 
                     , "AdminController/deleteRate");
            $this->AdminModel->deleteRate($id);
            $this->session->set_flashdata('error', 'Successfully Delete Rate');
            redirect(base_url().'AdminController/packagelist');
        }
        public function addRate(){
        $id = $this->uri->segment(3);
        $id2 = $this->uri->segment(4); 
        $data['tour'] = $this->AdminModel->getOneHotel($id);
        $data['error'] = $this->session->flashdata('error');
        $data['user'] = $this->AdminModel->getPackage($id2);    
        $head['title'] = $head['title'] = $data['user']->package_name." - Add Hotel Rates";;
        $this->load->view('AdminView/header',$head);
        $this->load->view('AdminView/addRate',$data);
        $this->load->view('AdminView/footer');
    }  
    public function do_addRate(){
        $id = $this->input->post('id');
        $id2 = $this->input->post('id2');
                $user = array(
                    'rate_name' => $this->input->post('rate_name'),
                    'rate_person' => $this->input->post('rate_person'),
					'rate_price' => $this->input->post('rate_price'),
					'tour_id_f' => $id,                   
                );
        
                $this->form_validation->set_rules('rate_name', 'Rate Inclusion name', 'required');
                $this->form_validation->set_rules('rate_person', 'Number of people', 'required');
				$this->form_validation->set_rules('rate_price', 'price', 'required');
                if ($this->form_validation->run() == FALSE)
                {
                    $this->session->set_flashdata('error', validation_errors());
                    redirect(base_url().'AdminController/addRate/'.$id.'/'.$id2);
                }
                else
                {
                   
                  $this->insert_user_log($this->session->username, "Add Tour Rates with name of ".$this->input->post('rate_name') 
                     , "AdminController/do_addRate");
                     $this->session->set_flashdata('error', 'Successfully Created a Rate');
                    $this->AdminModel->insertRate($user);
                   // redirect('admins/index');
				   $data['title'] = "Successfully Upadated a account";
				   redirect(base_url().'AdminController/viewRate/'.$id.'/'.$id2);				   
                }   
            }


        public function transactionlist(){
        
 
        $data['transaction'] = $this->AdminModel->getTransactionList();
        $data['error'] = $this->session->flashdata('error');
        $data['package'] = $this->AdminModel->getAllPackage();
        $head['title'] = "Bluelagoon - Transactions";
		$this->load->view('AdminView/header',$head);
		$this->load->view('AdminView/transactionList',$data);
        $this->load->view('AdminView/footer');
	}
	 public function transactionalllist(){
        
 
        $data['transaction'] = $this->AdminModel->getTransactionList();
        $data['error'] = $this->session->flashdata('error');
        $data['package'] = $this->AdminModel->getAllPackage();
         $data['pack'] = $this->AdminModel->getAllPackage();
        $data['four'] = $this->AdminModel->get4mostPackage();
        $data['coun'] = $this->AdminModel->count4mostPackage();
        $head['title'] = "Bluelagoon - All Transactions";
		$this->load->view('AdminView/header',$head);
		$this->load->view('AdminView/transactionAllList',$data);
        $this->load->view('AdminView/footer');
	}
		
       public function viewTransaction(){
        $id = $this->uri->segment(3);

        $data['u'] = $this->AdminModel->getAllTransaction($id);
        if($data['u']==NULL){
            $this->session->set_flashdata('error', 'This Transaction is already paid or Canceled');
            redirect(base_url().'AdminController/transactionlist/');	
        }
        $data['package'] = $this->AdminModel->getPackage($data['u']->package_id);
        $data['tour'] = $this->AdminModel->getTour_T($data['u']->tour_id);
        $data['rate'] = $this->AdminModel->getRate_T($data['u']->rate_id);
        $data['inc'] = $this->AdminModel->getInclusion_T($data['u']->package_id);
        $data['inclusion'] = explode(',',$data['u']->inclusion_id);
    //    for($i=0;$i<count($inclusion);$i++){
     //       echo json_encode($inclusion[$i]);
      //      echo "asdasd     ";
      //      $num = (int)$inclusion[$i];
      //      echo $num;
      //  }
//echo json_encode($data['inclusion']);
      //  echo json_encode($data['u']);
       $head['title'] = "Bluelagoon - ".$data['u']->name;
       $this->load->view('AdminView/header',$head);
      $this->load->view('AdminView/viewtransaction', $data);
      $this->load->view('AdminView/footer');
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
        $data['zed'] = $this->AdminModel->getTransaction($id);
        $this->AdminModel->UpdateUser($data['zed']->account_id,$user2);
         $this->AdminModel->UpdateCancel($id,$user);
         $this->insert_user_log($this->session->username, "Cancel Transaction with ID of ".$id
                     , "AdminController/cancelTransaction");
         redirect(base_url().'AdminController/viewTransaction/'.$id);
    }
    public function verifyTransaction(){
        $id = $this->uri->segment(3);
       $data['user'] =  $this->AdminModel->getTransaction($id);
        $user = array(
					'status' =>"verified",
                    'date_verified' => time(),
                );
          $this->load->library('email');
$this->email->from('tna@one-travelnowasia.xyz', 'Bluelagoon');
$this->email->to($data['user']->email); 

        $this->email->subject('Verified Travel Tour');
        
        
        $data = array(
            'body' => "<p>Good Day!</p>
<p>&nbsp;</p>
<p>Greetings from TNA Travel and Tours!</p>
<p>&nbsp;</p>
<p>Your booking is verified&nbsp;</p>
<p>&nbsp;</p>
<p>Check it online and proceed to payment!</p>
<p>BDO</p>
<p>The Account name:Bluelagoon</p>
<p>The Account number:00265897562</p>
<p>You only have 5 days to transact your payment</p>
<p>For more information, you can visit us in our office at 14-Nicanor Roxas Street, San Roque, 1801 Marikina City and please call (02) 984-7213</p>",
        );
        
        //Email Message Body
        $this->email->message($this->load->view('container',$data,true));
    
        // Sending of emails        
        if(!$this->email->send()){
            echo $this->email->print_debugger();
            echo json_encode(array('success'=>0));
        }else{
            $this->AdminModel->UpdateVerify($id,$user);
            
         redirect(base_url().'AdminController/viewTransaction/'.$id);
       }
         
    }
    
    
    public function verifyPayment(){
        $id = $this->uri->segment(3);
        $data['acc'] =  $this->AdminModel->getTransaction($id);
        $user = array(
					'status' =>"Booked",
                    'isCurrent' => "n",
                    'isRated' => "n",
                    
                );
        $pay = array(
                    'name' => $this->session->username,
                    'transaction_id' => $this->input->post('transaction_id'),
                    'cost' => $this->input->post('cost'),
                    'date' => date('m',strtotime($this->input->post('date_created'))),
                     'dateyear' => date('Y',strtotime($this->input->post('date_created'))),
                );
        $user2 = array(
                    'haveCurrentBook' => "n",
                );
                  $this->load->library('email');
$this->email->from('tna@one-travelnowasia.xyz', 'Bluelagoon');
$this->email->to($data['acc']->email); 

        $this->email->subject('Verified Payment Travel Tour');
        
        
        $mail = array(
            'body' => '<p><strong>TRAVEL-NOW ASIA&nbsp;</strong></p>
<p><em>This is to confirm that your payment has been completed. The Booking is done!,we will send your itinerary of the tours you select,For additional assistance regarding your purchase, contact our (02) 984-7213</em></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p style="text-align: center;"><strong><em>** THIS IS A SYSTEM-GENERATED EMAIL. DO NOT REPLY. **</em>&nbsp;</strong></p>');
        
        
        //Email Message Body
        $this->email->message($this->load->view('container',$mail,true));
    
        // Sending of emails        
        if(!$this->email->send()){
            echo $this->email->print_debugger();
            echo json_encode(array('success'=>0));
        }else{
            $this->session->set_flashdata('error', 'Successfully Updated');
        $this->AdminModel->updateUser($data['acc']->account_id,$user2);
        $this->AdminModel->insertDeposit($pay);
         $this->AdminModel->UpdateVerify($id,$user);
         $this->insert_user_log($this->session->username, "Verify Transaction with ID of ".$id
                     , "AdminController/verifyPayment");
                     $this->session->set_flashdata('error', 'Successfully Verified a transaction');
         redirect(base_url().'AdminController/transactionlist');
        }
    }
    
    
    
    public function backup_db()
    {
        $this->load->dbutil();

        $prefs = array(     
                'format'      => 'zip',             
                'filename'    => 'TravelNowAsia_db_backup.sql'
              );


        $backup =& $this->dbutil->backup($prefs); 

        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $save = 'pathtobkfolder/'.$db_name;

        $this->load->helper('file');
        write_file($save, $backup); 


        $this->load->helper('download');
        force_download($db_name, $backup); 
    }
      



    
    ////////
    public function addSales(){ 
        $data['error'] = $this->session->flashdata('error');
      
        $head['title'] = "Bluelagoon - Sales Forecast";
        $data['user'] = $this->AdminModel->getAllPayment();
        $this->load->view('AdminView/header',$head);
        $this->load->view('AdminView/addSales',$data);
        $this->load->view('AdminView/footer');
     
    }  
    public function do_addSales(){
                $user = array(
                    'name' => $this->input->post('name'),
                    'cost' => $this->input->post('cost'),
                    'date' => date('m',strtotime($this->input->post('date_created'))),
                    'dateyear' => date('Y',strtotime($this->input->post('date_created'))),
                    
                  
                );
        
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('cost', 'Cost', 'required');
				
                if ($this->form_validation->run() == FALSE)
                {
                    $this->session->set_flashdata('error', validation_errors());
                    redirect(base_url().'AdminController/addSales');
                }
                else
                {
                   
                    
                    $this->AdminModel->insertSales($user);
                   // redirect('admins/index');
				   $data['title'] = "Successfully Upadated a account";
				   $this->session->set_flashdata('Successfully add payment');
				   redirect(base_url().'AdminController/forcasting/2018');				   
                }   
            } 

/////

public function addAquaSales(){ 
    $data['error'] = $this->session->flashdata('error');
  
    $head['title'] = "Aquapogi - Inventory";
    $data['user'] = $this->AdminModel->getAllAquaPayment();
    $data['salese'] = $this->AdminModel->countTransactione();
  
    $this->load->view('AdminView/header',$head);
    $this->load->view('AdminView/addAquaSales',$data);
    $this->load->view('AdminView/footer');
 
}  
public function do_addAquaSales(){
            $user = array(
                'container' => $this->input->post('container'),
                'cost' => $this->input->post('cost'),
                'date'=>strtotime($this->input->post('date')),
                
                
              
            );
    
            $this->form_validation->set_rules('container', 'Container', 'required');
            $this->form_validation->set_rules('cost', 'Cost', 'required');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('error', validation_errors());
                redirect(base_url().'AdminController/addSales');
            }
            else
            {
               
                
                $this->AdminModel->insertAquaSales($user);
               // redirect('admins/index');
               $data['title'] = "Successfully Upadated a account";
               $this->session->set_flashdata('Successfully add payment');
               redirect(base_url().'AdminController/addaquasales');				   
            }   
        } 

       
        public function deletemoto(){
            $id = $this->uri->segment(3);        
            $this->AdminModel->deletemoto($id);
            $this->session->set_flashdata( 'Successfully Deleted a package');
            redirect(base_url().'AdminController/addaquaSales');
        }

        
        /////
        public function addcredit(){ 
            $data['error'] = $this->session->flashdata('error');
          
            $head['title'] = "Aquapogi - Inventory";
            $data['user'] = $this->AdminModel->getAllAquaCredit();
         
          
            $this->load->view('AdminView/header',$head);
            $this->load->view('AdminView/creditlist',$data);
            $this->load->view('AdminView/footer');
         
        }  
        public function do_addcredit(){
                    $user = array(
                        'name' => $this->input->post('name'),
                        'container' => $this->input->post('container'),
                        'cost' => $this->input->post('cost'),
                        'date'=>strtotime($this->input->post('date')),
                        
                        
                      
                    );
                    $this->form_validation->set_rules('name', 'Name', 'required');
                    $this->form_validation->set_rules('container', 'Container', 'required');
                    $this->form_validation->set_rules('cost', 'Cost', 'required');
                    
                    if ($this->form_validation->run() == FALSE)
                    {
                        $this->session->set_flashdata('error', validation_errors());
                        redirect(base_url().'AdminController/addcredit');
                    }
                    else
                    {
                       
                        
                        $this->AdminModel->insertAquaCredit($user);
                       // redirect('admins/index');
                       $data['title'] = "Successfully Upadated a account";
                       $this->session->set_flashdata('Successfully add payment');
                       redirect(base_url().'AdminController/addcredit');				   
                    }   
                } 
        
        
                public function deletemotodin(){
                    $id = $this->uri->segment(3);        
                    $this->AdminModel->deletemotodin($id);
                    $this->session->set_flashdata( 'Successfully Deleted a package');
                    redirect(base_url().'AdminController/addcredit');
                }

}