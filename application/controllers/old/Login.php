<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Manila");
class Login extends CI_Controller {

	
    public function __construct(){
			parent::__construct();
			$this->load->model('LoginModel');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->library('email');        
			$this->load->helper(array('form','url','string'));
			if($this->session->has_userdata('isloggedin') && $this->session->access_lvl=="administrator")
			{
				redirect(base_url().'AdminController/index');
			}
			if($this->session->has_userdata('isloggedin') && $this->session->access_lvl=="employee")
			{
				redirect(base_url().'EmployeeController/index');
			}
			if($this->session->has_userdata('isloggedin') && $this->session->access_lvl=="user")
			{
				redirect(base_url().'UserController/landing');
			}
		}
    
        public function insert_user_log($username, $action,$link){
        $log = array(
            'username' => $username,
            'action' => $action,
            'link' => $link,
            'date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_userlog', $log);
    }
    
    
    
    public function logon()
	{
		$this->load->view('login/loginview');
	}
    public function register()
	{
		$this->load->view('login/registerview');
	}
    public function recover()
	{
		$this->load->view('login/recoverview');
	}
	public function login()
		{
	 
			$this->load->view('includes/login');
			
		}
		public function display(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if($this->form_validation->run()){
					$cond = array (
						'username' => $this->input->post('username'),
						'password' => sha1($this->input->post('password')),
					

					);
			
					$user = $this->LoginModel->getUsers($cond);
					  if(!$user == null){ 					
				 if($user->access_lvl=="administrator"){
									$newdata = array(
											'id'    => $user->account_id,
											'first_name'  => $user->firstname,
											'middle_name'  => $user->middlename,
											'last_name'  => $user->lastname,
											'username'   => $user->username,
											'isloggedin'=> true,
											'level' => $data['u']->access_lvl
											
																				
									);                   
									$this->session->set_userdata($newdata);
									$this->session->name = $user->firstname;
									$this->session->username = $user->username;
									$this->session->access_lvl = $user->access_lvl;
									$this->insert_user_log($this->session->username, "Logged in" , "Login/Display");
									redirect('AdminController/index');           
				}
				if($user->access_lvl=="employee"){
									$newdata = array(
											'id'    => $user->account_id,
											'first_name'  => $user->firstname,
											'middle_name'  => $user->middlename,
											'last_name'  => $user->lastname,
											'username'   => $user->username,
											'isloggedin'=> true,
											'level' => $data['u']->access_lvl
											
																				
									);                   
									$this->session->set_userdata($newdata);
									$this->session->name = $user->firstname;
									$this->session->username = $user->username;
									$this->session->access_lvl = $user->access_lvl;
									$this->insert_user_log($this->session->username, "Logged in" , "Login/Display");
									redirect('EmployeeController/index');           
				}
				if($user->access_lvl=="user"){
									$newdata = array(
											'id'    => $user->account_id,
											'first_name'  => $user->firstname,
											'middle_name'  => $user->middlename,
											'last_name'  => $user->lastname,
											'username'   => $user->username,
											'isloggedin'=> true,
											'level' => $data['u']->access_lvl
											
																				
									);                   
									$this->session->set_userdata($newdata);
									$this->session->id = $user->account_id;
									$this->session->name = $user->firstname;
									$this->session->username = $user->username;
									$this->session->access_lvl = $user->access_lvl;
									$this->insert_user_log($this->session->username, "Logged in" , "Login/Display");
									redirect('UserController/landing');           
				}

		/*	}
			else{
				   $data2['u'] = $this->AdminModel->getUsers($cond);
				$this->load->view('includes/changepass',$data2);
			}*/
			}else{
			
				$data['title'] = 'Login';
				$data['message'] = 'Invalid username or password';

				
				$this->load->view('login/loginview',$data);
			  
			}
			}
		}

		public function reg(){
        
                $user = array(
                    'firstname' => $this->input->post('first_name'),
					'middlename' => $this->input->post('middle_name'),
					'lastname' => $this->input->post('last_name'),
                    'password' => sha1($this->input->post('password')),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email_address'),
                    'access_lvl' => "user",
					'haveCurrentBook' => "n",
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
                   
                   $this->insert_user_log("Guest", "Register account - ".$this->input->post('username') , "Login/register");
                    $this->LoginModel->insertUser($user);
                   // redirect('admins/index');
				   $data['title'] = "Successfully created a account";
				   $this->load->view('login/loginview',$data);
				   
                }
        
                
            }
		
		public function forget(){
			
			$this->load->view('includes/forget');
			}   
			public function forget_pass(){
			
				$data = array(
					'email' => $this->input->post('email'),
				);
				$accountDetails = $this->AdminModel->getUsers($data);
		
				if ($accountDetails) {
					
		
					$this->email->from('zedricabadines1@gmail.com', 'Demn Brah');
					$this->email->to($accountDetails->email);
		
					$this->email->subject('Password Reset Link');
					$code=$accountDetails->activation;
					$this->email->message("ITO ANG IYONG VERIFICATION CODE  : ".$code);
				   // $this->load->view('includes/activation');
		
					if (!$this->email->send()) {
						
					} else {
						
						//$this->insert_user_log($this->session->username, 'logged out');
						redirect('Login/activation/'.$accountDetails->account_id);
						
					}
				}     
			}
			public function activation(){
				$tae = $this->uri->segment(3);
				$this->load->view('includes/activation');
				
			}
			public function activate(){

					$user = array(
						'activation' => $this->input->post('code')   
					);
					
			$this->insert_user_log($this->session->username, 'activated');
					$acti = $this->AdminModel->getUsers($user);
					if(!$acti->activation == null){
					   redirect('Login/changepas/'.$acti->account_id);
					}
					else{
						redirect('Login/activate/'.$acti->account_id);
					}
			}
			public function changePassword(){
				$account_id = $this->uri->segment(3);
				$data['u'] = $this->AdminModel->getUser($account_id);
				$pass = array(
					'username' =>  $data['u']->username,
					'password' => sha1($this->input->post('changepassword'))
				);
				$this->AdminModel->updateUser($account_id,$pass);
				if($data['u']->access_lvl=="Administrator"){
									$newdata = array(
											'id'    => $user->account_id,
											'name'  => $data['u']->name,
											'username'   => $data['u']->username,
											'isloggedin'=> true,
											'level' => $data['u']->access_lvl
											
																				
									);                   
									$this->insert_user_log($data['u']->username, 'logged in');
									$this->session->set_userdata($newdata);
									$this->session->name = $data['u']->name;
									$this->session->access_lvl = $data['u']->access_lvl;
									redirect('admins/index  ');           
				}
				else if($data['u']->access_lvl=="Supervisor"){
					if(!$data['u'] == null){       
									$newdata = array(
											'id'    => $user->account_id,
											'name'  => $data['u']->name,
											'username'   => $data['u']->username,
											'isloggedin'=> true,
											'level' => $data['u']->access_lvl
											
									);           
									$this->insert_user_log($data['u']->username, 'logged in');
									$this->session->set_userdata($newdata);
									$this->session->name = $data['u']->name;
									$this->session->access_lvl = $data['u']->access_lvl;
									redirect('supervisors/index');
								}
								else{
									$data['title'] = 'Login';
									$data['message'] = 'Invalid username or password';
									$this->load->view('includes/login',$data);             
								}     
				}
				else if($data['u']->access_lvl=="User"){
					if(!$data['u'] == null){ 
						  $newdata = array(
											'id'    => $user->account_id,
											'name'  => $data['u']->name,
											'username'   => $data['u']->username,
											'isloggedin'=> true,  
											'level' => $data['u']->access_lvl         
									);
									$this->insert_user_log($data['u']->username, 'logged in');
									$this->session->set_userdata('isloggedin','User');
									$this->session->name = $data['u']->name;
									$this->session->access_lvl = $data['u']->access_lvl;
									$this->session->set_flashdata('myflashdata',true);
									redirect('users/index');
								}
								else{
									$data['title'] = 'Login';
									$data['message'] = 'Invalid username or password';
									$this->load->view('includes/login',$data);
								}
				}
				
				
			}
			public function palit(){
				$tae = $this->uri->segment(3);
				$data = array('password'=> sha1($this->input->post('password')));
				$this->insert_user_log($this->session->username, 'palit');
				$this->AdminModel->updatePass($tae, $data);
			}

}