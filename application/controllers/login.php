<?php

class Login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	
	}
	
	public function index($msg=NULL){
		$data['msg'] = $msg;
		$this->load->view('login_view', $data);
		
	}
	


	public function process(){
		$this->load->model('login_model');
		
		$result = $this->login_model->validate();
		if(! $result){
			
	
			$msg ='<font color=red>Invalid username and/or password </font><br/>';
			$this->index($msg);
			
		}else{
			redirect('staff');
		}
	}
			public function check_isvalidated(){
				if(! $this->session->userdata('validated')){
					redirect ('login');
				}
				
			}
			
			public function do__logout(){
				$this->session->sess_destroy();
				redirect('login');
		
			} 	
	
	} 	