<?php

/**
* 
*/
class Error extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$this->load->view('403_error');
	}
}