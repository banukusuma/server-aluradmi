<?php

/**
* 
*/
class Ruang_M extends MY_Model
{
	protected $_table = 'ruang';
	protected $primary_key = 'id_ruang';
	var $order = array('id_ruang' => 'desc');
	var $column_order = array('r.id_ruang', 'g.nama', 'l.nama', 'r.nama', null);
	var $column_search = array('g.nama', 'l.nama', 'r.nama');
	function __construct()
	{
		parent::__construct();
	}

    public $validate = array(
        array( 'field' => 'nama', 
               'label' => 'Nama',
               'rules' => 'required|trim' ),
        array( 'field' => 'gedung',
               'label' => 'Gedung',
               'rules' => 'required' ),
        array( 'field' => 'lantai',
               'label' => 'Lantai',
               'rules' => 'required' )
        
    );
     public $validate_user = array(
        array( 'field' => 'nama[]', 
               'label' => 'Nama',
               'rules' => 'required|trim' ),
        array( 'field' => 'gedung',
               'label' => 'Gedung',
               'rules' => 'required' ),
        array( 'field' => 'lantai',
               'label' => 'Lantai',
               'rules' => 'required' )    
    );

	private function _get_datatables_query()
    {
            
        $this->db->select('r.id_ruang, r.nama,l.nama as lantai, g.nama as nama_gedung');
         $this->db->from('ruang as r');
         $this->db->join('lantai as l', 'r.id_lantai = l.id_lantai');
         $this->db->join('gedung as g', 'g.id_gedung = l.id_gedung');
         $this->db->where('r.id_ruang != 99 ');
            	
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

    function pilih($table, $where = NULL){
        $sql = "select * from $table $where";
         $query = $this->db->query($sql);
         return $query->result();
    }
}