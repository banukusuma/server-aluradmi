<?php

/**
* 
*/
class Admin_Controller extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->user_m->cek_level() == TRUE) {
			redirect('admin/error');
		}
	}
}