<?php 
/**
* 
*/
class MY_Controller extends CI_Controller
{
	public $data = array();
	function __construct()
	{
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('user_m');
		$data['subview'] = '';

	$exception_uris = array(
		'login',
		'login/logout',
		);
	if (in_array(uri_string(), $exception_uris) == FALSE) {
		if ($this->user_m->loggedin() == FALSE) {
			redirect('login');
		}
	}
		$this->form_validation->set_error_delimiters('<p class="text-danger">','<p>');
	}

}