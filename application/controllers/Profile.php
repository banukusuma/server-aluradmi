<?php

/**
* 
*/
class Profile extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
	}

	function index(){
		$this->data['meta_title'] ='Ganti Password';
		$this->data['subview'] = 'user/profile';
		$this->data['action'] = 'profile/ganti';
		$this->data['alamat'] = site_url('dashboard');
		$this->load->view('_layout_main', $this->data);
	}

	function ganti(){
		$this->data['success'] = false;
		$this->data['messages'] = array();
		$validate = $this->user_m->validate_ganti;
		$this->form_validation->set_rules($validate);
			
		if ($this->form_validation->run()) {
			
				if ($this->user_m->ganti_password() == true) {
					$this->data['success'] = true;
				}	
			}
		else {
				foreach ($_POST as $key => $value) {
					$this->data['messages'][$key] = form_error($key);
				}
			}
		echo json_encode($this->data);
			
	}

	public function cek_pswd($str){
		$username = $this->session->userdata('username');
		$user = $this->user_m->get_by(array('username' =>  $username
			));
		if (count($user)) {
			if ($this->user_m->password_cek($str,$user->password) == true) {
			return TRUE;
		      }
    		else {
    			$this->form_validation->set_message('cek_pswd', 'password lama salah');
    			return FALSE;
    		}
		}
		else{
			$this->form_validation->set_message('cek_pswd', 'password lama salah');
			return FALSE;
		}
   	}


}