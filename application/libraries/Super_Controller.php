<?php

/**
* 
*/
class Super_Controller extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->user_m->cek_level() == FALSE) {
			redirect('error');
		}
	}
}