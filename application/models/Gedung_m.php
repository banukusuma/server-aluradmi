<?php

/**
* 
*/
class Gedung_M extends MY_Model
{
	protected $_table = 'gedung';
	protected $primary_key = 'id_gedung';
	var $order = array('id_gedung' => 'desc');
	var $column_order = array('g.id_gedung', 'g.nama', 'l.nama', null,null,null,null);
	var $column_search = array('g.nama');
	function __construct()
	{
		parent::__construct();
	}

	public $validate = array(
		array('field' => 'nama',
				'label' => 'Nama gedung',
				'rules' => 'required|trim'),
		array( 'field' => 'lat',
               'label' => 'Latitude',
               'rules' => 'required|numeric'),
         array( 'field' => 'lng', 
               'label' => 'Longitude',
               'rules' => 'required|numeric'));

	private function _get_datatables_query()
    {
            
        $this->db->select('g.id_gedung, g.nama,l.id_lantai, l.nama as lantai, l.link as denah, l.thumbnail as denah_thumb');
         $this->db->from('gedung as g');
         $this->db->join('lantai as l', 'g.id_gedung = l.id_gedung');
         $this->db->where('g.id_gedung != 99 ');
            	
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
}