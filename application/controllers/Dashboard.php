<?php

/**
* 
*/
class Dashboard extends Admin_Controller
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function index(){
		$this->data['meta_title'] ='Dashboard';
		$this->data['subview'] = 'dashboard/index';
		$this->load->view('_layout_main', $this->data);
	}
}