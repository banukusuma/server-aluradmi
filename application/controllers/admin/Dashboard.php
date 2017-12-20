<?php

/**
* 
*/
class Dashboard extends Super_Controller
{
	
	function __construct()
	{
		parent:: __construct();
	}

	function index(){
		$this->data['meta_title'] ='Dashboard Admin';
		$this->data['subview'] = 'admin/dashboard/index';
		$this->load->view('_layout_main', $this->data);
	}
}