<?php

/**
* 
*/
class Alur_M extends MY_Model
{
	protected $_table = 'alur';
	var $column_order = array('k.nama' => 'asc', 'a.nama' => 'asc'); //set column field database for datatable orderable
    var $column_search = array('a.nama','k.nama','j.nama','a.urut'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('k.nama' => 'asc', 'a.nama' => 'asc'); // default order 
	protected $primary_key = 'id_alur';
	 public $validate = array(
        array( 'field' => 'nama', 
               'label' => 'Nama',
               'rules' => 'required|trim' ),
        array( 'field' => 'kategori',
               'label' => 'Kategori',
               'rules' => 'required|trim' ),
        array( 'field' => 'jurusan',
               'label' => 'jurusan',
               'rules' => 'required|trim' )
        
    );
     public $validate_user = array(
        array( 'field' => 'nama[]', 
               'label' => 'Nama',
               'rules' => 'required|trim' ),
        array( 'field' => 'kategori',
               'label' => 'Kategori',
               'rules' => 'required|trim' ),
        array( 'field' => 'jurusan',
               'label' => 'jurusan',
               'rules' => 'required|trim' )     
    );
     public $validate_urut = array(
        array( 'field' => 'kategori',
               'label' => 'Kategori',
               'rules' => 'required|trim' )  
    );
	function __construct()
	{
		parent:: __construct();
	}
	private function _get_datatables_query()
    {
            if ($this->session->userdata('level') != "1") {
                $this->column_order = array(null,'k.nama', 'a.nama', 'a.urut', null);
            $this->db->select('a.id_alur, a.nama, k.id_kategori , k.nama as nama_kategori,j.id_jurusan,  j.nama as nama_jurusan, a.urut');
                $this->db->from('alur as a');
                $this->db->where('a.id_jurusan ='. $this->session->userdata('id_jurusan'));
                $this->db->join('kategori as k', 'a.id_kategori = k.id_kategori');
                $this->db->join('jurusan as j', 'a.id_jurusan = j.id_jurusan');
            }
            else{ 
                $this->column_order = array(null,'j.nama','k.nama', 'a.nama', 'a.urut', null);  
                $this->db->select('a.id_alur, a.nama, k.id_kategori , k.nama as nama_kategori,j.id_jurusan,  j.nama as nama_jurusan, a.urut');
                $this->db->from('alur as a');
                $this->db->join('kategori as k', 'a.id_kategori = k.id_kategori');
                $this->db->join('jurusan as j', 'a.id_jurusan = j.id_jurusan');
            }
		
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