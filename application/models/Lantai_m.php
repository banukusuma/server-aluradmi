<?php

/**
* 
*/
class Lantai_M extends MY_Model
{
	protected $_table = 'lantai';
	protected $primary_key = 'id_lantai';
	function __construct()
	{
		parent::__construct();
	}

	public $validate = array(
		array('field' => 'id_lantai',
				'label' => 'id_lantai',
				'rules' => 'required'),
		);
	
}