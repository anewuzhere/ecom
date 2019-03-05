<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Manila");
class EmployeeController extends CI_Controller {


	public function __construct(){
        parent::__construct();
        $this->load->model('EmployeeModel');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper(array('form','url','string'));

      if(!$this->session->has_userdata('isloggedin')||$this->session->access_lvl!="employee"){
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
        $head['title'] = "Travel Now Asia";
        $data['transaction'] = $this->EmployeeModel->countAllTransaction();
        $data['user'] = $this->EmployeeModel->countAllUser();
        $data['sales'] = $this->EmployeeModel->countTransaction();
        $data['pack'] = $this->EmployeeModel->countAllPackage();
        $data['cur'] = $this->EmployeeModel->getCurrentTransaction();
        $data['four'] = $this->EmployeeModel->get4Package();
		$this->load->view('EmployeeView/header',$head);
        $this->load->view('EmployeeView/index',$data);
        $this->load->view('EmployeeView/footer');
	}
    public function forcasting()
	{
	    $year = $this->uri->segment(3);
        $data['user'] = $this->EmployeeModel->foreCast($year);
        $data['datee'] = $this->EmployeeModel->foreCastAll();
        $head['title'] = "Travel Now Asia - Sales Forecast";
        $data['yeartitle'] = $year;
		$this->load->view('EmployeeView/header',$head);
        $this->load->view('EmployeeView/forcast',$data);
        $this->load->view('EmployeeView/footer');
	}
     public function userlog()
	{
        $head['title'] = "Travel Now Asia - User logs";
        $data['user'] = $this->EmployeeModel->viewLogs();
		$this->load->view('EmployeeView/header',$head);
        $this->load->view('EmployeeView/userlog',$data);
        $this->load->view('EmployeeView/footer');
	}
  public function users()
	{
    $data['user'] = $this->EmployeeModel->getAllUser();
    $head['title'] = "Travel Now Asia";
    $data['error'] = $this->session->flashdata('error');
		$this->load->view('EmployeeView/header',$head);
		$this->load->view('EmployeeView/usersview',$data);
    $this->load->view('EmployeeView/footer');
	}
	public function client()
	{
    $data['client'] = $this->EmployeeModel->getAllClient();
    $head['title'] = "Travel Now Asia - Customer Management";
		$this->load->view('EmployeeView/header',$head);
		$this->load->view('EmployeeView/clientview',$data);
    $this->load->view('EmployeeView/footer');
	}

   public function logout(){
        //$this->insert_user_log($this->session->username, 'logged out');
        $this->session->sess_destroy();
        $this->insert_user_log($this->session->username, "Logout" , "EmployeeController/logout");
        redirect('Login/','Logged out');
        }
        public function editUser(){
        $id = $this->session->id;

        $data['u'] = $this->EmployeeModel->getUser($id);
        $head['title'] = "Travel Now Asia";
        $this->load->view('EmployeeView/header',$head);
        $this->load->view('EmployeeView/editUser', $data);
        $this->load->view('EmployeeView/footer');
    }
    public function viewAccount(){
        $id = $this->uri->segment(3);
        $head['title'] = "Travel Now Asia";
        $data['u'] = $this->EmployeeModel->getUser($id);
        $this->load->view('EmployeeView/header',$head);
        $this->load->view('EmployeeView/viewUserAcc', $data);
        $this->load->view('EmployeeView/footer');
    }
     public function editAcc(){
        $id = $this->uri->segment(3);
        $head['title'] = "Travel Now Asia";
        $data['u'] = $this->EmployeeModel->getUser($id);
        $this->load->view('EmployeeView/header',$head);
        $this->load->view('EmployeeView/editAccount', $data);
        $this->load->view('EmployeeView/footer');
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
                    redirect(base_url().'EmployeeController/editAcc/'.$id);
                }
                else
                {
                   
                   $this->insert_user_log($this->session->username, "Edit Account" , "EmployeeController/editAcc");
                    $this->EmployeeModel->updateUser($id,$user);
                   // redirect('Employees/index');
                   $this->session->set_flashdata('error', 'Successfully Upadated a account');
				   $data['title'] = "Successfully Upadated a account";
				   redirect(base_url().'EmployeeController/users/');				   
                }   
            }
        public function deleteUser(){
            $account_id = $this->uri->segment(3);        
          $this->insert_user_log($this->session->username, "Delete Account : ID = ".$account_id , "EmployeeController/deleteUser");
            $this->EmployeeModel->deleteUser($account_id);
            $this->session->set_flashdata('error', 'Successfully Deleted a account');
            redirect('EmployeeController/users');
        }
        public function register(){
            $head['title'] = "Travel Now Asia";
        $this->load->view('EmployeeView/header',$head);
        $this->load->view('EmployeeView/register');
        $this->load->view('EmployeeView/footer');
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
                   
                   $this->insert_user_log($this->session->username, "Register Account with username ".$this->input->post('username') , "EmployeeController/editAcc");
                    $this->EmployeeModel->insertUser($user);
                   // redirect('Employees/index');
				   $data['title'] = "Successfully created a account";
				   $this->session->set_flashdata('error', 'Successfully created a account');
				   $this->users();
				   
                }
        
                
            }
     public function packagelist(){
         $head['title'] = "Travel Now Asia";
         $data['error'] = $this->session->flashdata('error');
        $data['user'] = $this->EmployeeModel->getAllPackage();
		$this->load->view('EmployeeView/header',$head);
		$this->load->view('EmployeeView/packageView',$data);
        $this->load->view('EmployeeView/footer');
	}
    public function viewPackage(){
        
        $id =$this->uri->segment(3); 
        $data['user'] = $this->EmployeeModel->getPackage($id);
        $data['error'] = $this->session->flashdata('error');
        $data['inc'] = $this->EmployeeModel->getInclusion($id);
        $data['tour'] = $this->EmployeeModel->getTour($id);
        $head['title'] = $data['user']->package_name;
		$this->load->view('EmployeeView/header',$head);
		$this->load->view('EmployeeView/packageDetails',$data);
        $this->load->view('EmployeeView/footer');
	}
     public function addPackage(){ 
        $data['error'] = $this->session->flashdata('error');
        $head['title'] = " Add New Package";
        $this->load->view('EmployeeView/header',$head);
        $this->load->view('EmployeeView/addPackage',$data);
        $this->load->view('EmployeeView/footer');
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
                    redirect(base_url().'EmployeeController/addPackage');
                }
                else
                {
                   
                     $this->insert_user_log($this->session->username, "Register tour package with name of ".$this->input->post('package_name') 
                     , "EmployeeController/addPackage");
                    $this->EmployeeModel->insertPackage($user);
                   // redirect('Employees/index');
				   $data['title'] = "Successfully Upadated a account";
				   $this->session->set_flashdata('error', 'Successfully created a package');
				   redirect(base_url().'EmployeeController/packagelist');				   
                }   
            } 
        public function editPackage(){ 
            $id =$this->uri->segment(3);
            $data['error'] = $this->session->flashdata('error');
            $data['package'] = $this->EmployeeModel->getPackage($id);
            $head['title'] =" Edit Package";
		    $this->load->view('EmployeeView/header',$head);
		    $this->load->view('EmployeeView/editPackage',$data);
            $this->load->view('EmployeeView/footer');
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
                     , "EmployeeController/editPackage");
                    $this->EmployeeModel->updatePackage($id,$user);
                    $this->session->set_flashdata('error', 'Successfully Updated a package');
				   $data['title'] = "Successfully Upadated a account";
				   redirect(base_url().'EmployeeController/packagelist');				    
            }   


    public function deletePackage(){
            $id = $this->uri->segment(3);        
          $this->insert_user_log($this->session->username, "Delete tour package with ID of ".$id 
                     , "EmployeeController/deletePackage");
            $this->EmployeeModel->deletePackage($id);
            $this->session->set_flashdata('error', 'Successfully Deleted a package');
            redirect(base_url().'EmployeeController/packagelist');
        }

    public function viewInclusion(){
        
        $id =$this->uri->segment(3); 
        $id2 =$this->uri->segment(4); 
        $data['user'] = $this->EmployeeModel->getPackage($id2);
        $data['inc'] = $this->EmployeeModel->getOneInclusion($id);
        $head['title'] = $data['user']->package_name." - Edit Inclusion";
		$this->load->view('EmployeeView/header',$head);
		$this->load->view('EmployeeView/editInclusion',$data);
        $this->load->view('EmployeeView/footer');
	}
     public function do_editInclusion(){
        $id = $this->input->post('id');
                $user = array(
                    'inclusions' => $this->input->post('inclusions'),
                    'price' => $this->input->post('price'),
					'description' => $this->input->post('description'),                  
                );
                   $this->insert_user_log($this->session->username, "Edit Inclusion package with name of ".$this->input->post('inclusion') 
                     , "EmployeeController/do_editInclusion");
                    $this->EmployeeModel->updateInclusion($id,$user);
                    $this->session->set_flashdata('error', 'Successfully Updated a Inclusion');
				   $data['title'] = "Successfully Upadated a account";
				   redirect(base_url().'EmployeeController/packagelist');				    
            }

    public function deleteInclusion(){
            $id = $this->uri->segment(3);        
          $this->insert_user_log($this->session->username, "Delete Inclusion package with ID of ".$id
                     , "EmployeeController/deleteInclusion");
                     $this->session->set_flashdata('error', 'Successfully Deleted a package');
            $this->EmployeeModel->deleteInclusion($id);
            redirect(base_url().'EmployeeController/packagelist');
        }

    public function addInclusion(){
        $id = $this->uri->segment(3); 
        $data['error'] = $this->session->flashdata('error');
        $data['user'] = $this->EmployeeModel->getPackage($id);    
        $head['title'] = $head['title'] = $data['user']->package_name." - Add Inclusion";;
        $this->load->view('EmployeeView/header',$head);
        $this->load->view('EmployeeView/addInclusion',$data);
        $this->load->view('EmployeeView/footer');
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
                    redirect(base_url().'EmployeeController/addInclusion/'.$id);
                }
                else
                {
                   
                   $this->insert_user_log($this->session->username, "Add Inclusion package with name of ".$this->input->post('inclusions') 
                     , "EmployeeController/deleteInclusion");
                    $this->EmployeeModel->insertInclusion($user);
                   // redirect('Employees/index');
                   $this->session->set_flashdata('error', 'Successfully created a inclusion');
				   $data['title'] = "Successfully Upadated a accounts";
				   redirect(base_url().'EmployeeController/viewPackage/'.$id);				   
                }   
            }
            public function viewHotel(){
        
        $id =$this->uri->segment(3); 
        $id2 =$this->uri->segment(4); 
        $data['user'] = $this->EmployeeModel->getPackage($id2);
        $data['tour'] = $this->EmployeeModel->getOneHotel($id);
        $head['title'] = $data['user']->package_name." - Edit Hotel Accomodation";
		$this->load->view('EmployeeView/header',$head);
		$this->load->view('EmployeeView/editHotel',$data);
        $this->load->view('EmployeeView/footer');
	}
    public function do_editHotel(){
        $id = $this->input->post('id');
                $user = array(
                    'tour_name' => $this->input->post('tour_name'),
					'description' => $this->input->post('description'),                  
                );
                   $this->insert_user_log($this->session->username, "Edit Hotel Accommodation with name of ".$this->input->post('tour_name') 
                     , "EmployeeController/do_editHotel");
                    $this->EmployeeModel->updateHotel($id,$user);
                    $this->session->set_flashdata('error', 'Successfully Updated a Hotel Accommodation');
				   $data['title'] = "Successfully Upadated a account";
				   redirect(base_url().'EmployeeController/packagelist');				    
            }
     public function deleteHotel(){
            $id = $this->uri->segment(3);        
          $this->insert_user_log($this->session->username, "Delete Hotel Accommodation with ID of ".$id
                     , "EmployeeController/do_editHotel");
            $this->EmployeeModel->deleteHotel($id);
            $this->session->set_flashdata('error', 'Successfully Deleted a Hotel Accommodation');
            redirect(base_url().'EmployeeController/packagelist');
        }
        public function addHotel(){
        $id = $this->uri->segment(3); 
        $data['error'] = $this->session->flashdata('error');
        $data['user'] = $this->EmployeeModel->getPackage($id);    
        $head['title'] = $head['title'] = $data['user']->package_name." - Add Hotel Accommodation";;
        $this->load->view('EmployeeView/header',$head);
        $this->load->view('EmployeeView/addHotel',$data);
        $this->load->view('EmployeeView/footer');
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
                    redirect(base_url().'EmployeeController/addHotel/'.$id);
                }
                else
                {
                   
                   $this->insert_user_log($this->session->username, "Add Hotel Accommodation with name of ".$this->input->post('tour_name') 
                     , "EmployeeController/do_addHotel");
                    $this->EmployeeModel->insertHotel($user);
                   // redirect('Employees/index');
                   $this->session->set_flashdata('error', 'Successfully Created a Hotel Accommodation');
				   $data['title'] = "Successfully Upadated a account";
				   redirect(base_url().'EmployeeController/viewPackage/'.$id);				   
                }   
            }    
            public function viewRate(){
        
        $id =$this->uri->segment(3);
        $id2 =$this->uri->segment(4);  
        $data['user'] = $this->EmployeeModel->getPackage($id2);
        $data['tour'] = $this->EmployeeModel->getOneHotel($id);
        $data['error'] = $this->session->flashdata('error');
        $data['rate'] = $this->EmployeeModel->getRate($id);
        $head['title'] = $data['user']->package_name." - Package Rates";
		$this->load->view('EmployeeView/header',$head);
		$this->load->view('EmployeeView/viewRate',$data);
        $this->load->view('EmployeeView/footer');
	}

        public function deleteRate(){
            $id = $this->uri->segment(3);        
          $this->insert_user_log($this->session->username, "Delete Tour Rates with ID of ".$id 
                     , "EmployeeController/deleteRate");
            $this->EmployeeModel->deleteRate($id);
            $this->session->set_flashdata('error', 'Successfully Delete Rate');
            redirect(base_url().'EmployeeController/packagelist');
        }
        public function addRate(){
        $id = $this->uri->segment(3);
        $id2 = $this->uri->segment(4); 
        $data['tour'] = $this->EmployeeModel->getOneHotel($id);
        $data['error'] = $this->session->flashdata('error');
        $data['user'] = $this->EmployeeModel->getPackage($id2);    
        $head['title'] = $head['title'] = $data['user']->package_name." - Add Hotel Rates";;
        $this->load->view('EmployeeView/header',$head);
        $this->load->view('EmployeeView/addRate',$data);
        $this->load->view('EmployeeView/footer');
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
                    redirect(base_url().'EmployeeController/addRate/'.$id.'/'.$id2);
                }
                else
                {
                   
                  $this->insert_user_log($this->session->username, "Add Tour Rates with name of ".$this->input->post('rate_name') 
                     , "EmployeeController/do_addRate");
                     $this->session->set_flashdata('error', 'Successfully Created a Rate');
                    $this->EmployeeModel->insertRate($user);
                   // redirect('Employees/index');
				   $data['title'] = "Successfully Upadated a account";
				   redirect(base_url().'EmployeeController/viewRate/'.$id.'/'.$id2);				   
                }   
            }


        public function transactionlist(){
        
 
        $data['transaction'] = $this->EmployeeModel->getTransactionList();
        $data['error'] = $this->session->flashdata('error');
        $data['package'] = $this->EmployeeModel->getAllPackage();
        $head['title'] = "Travel Now Asia - Transactions";
		$this->load->view('EmployeeView/header',$head);
		$this->load->view('EmployeeView/transactionList',$data);
        $this->load->view('EmployeeView/footer');
	}
	 public function transactionalllist(){
        
 
        $data['transaction'] = $this->EmployeeModel->getTransactionList();
        $data['error'] = $this->session->flashdata('error');
        $data['package'] = $this->EmployeeModel->getAllPackage();
        $head['title'] = "Travel Now Asia - All Transactions";
		$this->load->view('EmployeeView/header',$head);
		$this->load->view('EmployeeView/transactionAllList',$data);
        $this->load->view('EmployeeView/footer');
	}
       public function viewTransaction(){
        $id = $this->uri->segment(3);

        $data['u'] = $this->EmployeeModel->getAllTransaction($id);
        if($data['u']==NULL){
            $this->session->set_flashdata('error', 'This Transaction is already paid or Canceled');
            redirect(base_url().'EmployeeController/transactionlist/');	
        }
        $data['package'] = $this->EmployeeModel->getPackage($data['u']->package_id);
        $data['tour'] = $this->EmployeeModel->getTour_T($data['u']->tour_id);
        $data['rate'] = $this->EmployeeModel->getRate_T($data['u']->rate_id);
        $data['inc'] = $this->EmployeeModel->getInclusion_T($data['u']->package_id);
        $data['inclusion'] = explode(',',$data['u']->inclusion_id);
    //    for($i=0;$i<count($inclusion);$i++){
     //       echo json_encode($inclusion[$i]);
      //      echo "asdasd     ";
      //      $num = (int)$inclusion[$i];
      //      echo $num;
      //  }
//echo json_encode($data['inclusion']);
      //  echo json_encode($data['u']);
       $head['title'] = "Travel Now Asia - ".$data['u']->name;
       $this->load->view('EmployeeView/header',$head);
      $this->load->view('EmployeeView/viewtransaction', $data);
      $this->load->view('EmployeeView/footer');
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
        $data['zed'] = $this->EmployeeModel->getTransaction($id);
        $this->EmployeeModel->UpdateUser($data['zed']->account_id,$user2);
         $this->EmployeeModel->UpdateCancel($id,$user);
         $this->insert_user_log($this->session->username, "Cancel Transaction with ID of ".$id
                     , "EmployeeController/cancelTransaction");
         redirect(base_url().'EmployeeController/viewTransaction/'.$id);
    }
    public function verifyTransaction(){
        $id = $this->uri->segment(3);
       $data['user'] =  $this->EmployeeModel->getTransaction($id);
        $user = array(
					'status' =>"verified",
                    'date_verified' => time(),
                );
          $this->load->library('email');
$this->email->from('tna@one-travelnowasia.xyz', 'Travel Now Asia');
$this->email->to($data['user']->email); 

        $this->email->subject('Verified Travel Tour');
        
        
        $data = array(
            'body' => "<p>Good Day!</p>
<p>&nbsp;</p>
<p>Greetings from TNA Travel and Tours!</p>
<p>&nbsp;</p>
<p>Your booking is verified&nbsp;</p>
<p>&nbsp;</p>
<p>For more information, you can visit us in our office at 14-Nicanor Roxas Street, San Roque, 1801 Marikina City and please call (02) 984-7213</p>",
        );
        
        //Email Message Body
        $this->email->message($this->load->view('container',$data,true));
    
        // Sending of emails        
        if(!$this->email->send()){
            echo $this->email->print_debugger();
            echo json_encode(array('success'=>0));
        }else{
            $this->EmployeeModel->UpdateVerify($id,$user);
            
         redirect(base_url().'EmployeeController/viewTransaction/'.$id);
       }
         
    }
    
    
    public function verifyPayment(){
        $id = $this->uri->segment(3);
        $data['acc'] =  $this->EmployeeModel->getTransaction($id);
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
$this->email->from('tna@one-travelnowasia.xyz', 'Travel Now Asia');
$this->email->to($data['acc']->email); 

        $this->email->subject('Verified Payment Travel Tour');
        
        
        $mail = array(
            'body' => '<p><strong>TRAVEL-NOW ASIA&nbsp;</strong></p>
<p><em>This is to confirm that your payment has been completed. For additional assistance regarding your purchase, contact our (02) 984-7213</em></p>
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
        $this->EmployeeModel->updateUser($data['acc']->account_id,$user2);
        $this->EmployeeModel->insertDeposit($pay);
         $this->EmployeeModel->UpdateVerify($id,$user);
         $this->insert_user_log($this->session->username, "Verify Transaction with ID of ".$id
                     , "EmployeeController/verifyPayment");
                     $this->session->set_flashdata('error', 'Successfully Verified a transaction');
         redirect(base_url().'EmployeeController/transactionlist');
        }
    }
      
}