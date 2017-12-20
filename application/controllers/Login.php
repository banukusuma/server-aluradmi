<?php

/**
* 
*/
class Login extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$validate = $this->user_m->validate;
		$this->form_validation->set_rules($validate);
		if ($this->form_validation->run() == TRUE) {
			
			if ($this->user_m->login() == TRUE) {
				if ($this->session->userdata('level') != "1" ) {
					$dashboard = 'dashboard';
					redirect($dashboard);
				}
				else{
					$admin_dashboard = 'admin/dashboard';
					redirect($admin_dashboard);
				}
			}
			else {
				$this->session->set_flashdata('error', '<div class="alert alert-info" role="alert"><center><span class="glyphicon glyphicon-close"> </span>Username atau Password Salah</center></div>');
				redirect('login','refresh');
			}
			
		}
		$this->data['meta_title'] = "Halaman Login";
		$this->load->view('user/login', $this->data);
		
	}

	function logout(){
		$this->user_m->logout();
		redirect('login');
	}

}