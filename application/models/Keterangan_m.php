<?php

/**
* 
*/
class Keterangan_M extends MY_Model
{
	protected $_table = 'keterangan';
	protected $primary_key = 'id_keterangan';
	var $column_order = array(); //set column field database for datatable orderable
    var $column_search = array('ka.nama','a.nama','k.nama','j.nama','a.urut', 'r.nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id_keterangan' => 'desc'); // default order 
    public $validate = array(
        array( 'field' => 'jurusan', 
               'label' => 'Jurusan',
               'rules' => 'required'),
        array( 'field' => 'kategori', 
               'label' => 'Kategori',
               'rules' => 'required'),
        array( 'field' => 'nama', 
               'label' => 'Nama',
               'rules' => 'required|trim'),
        array( 'field' => 'alur', 
               'label' => 'Alur',
               'rules' => 'required'),
        array( 'field' => 'ruang', 
               'label' => 'Ruang',
               'rules' => 'required'),
        array( 'field' => 'lantai', 
               'label' => 'Lantai',
               'rules' => 'required'),
        array( 'field' => 'gedung', 
               'label' => 'Gedung',
               'rules' => 'required')
    );
    public $validate_user = array(
        array( 'field' => 'alur', 
               'label' => 'Alur',
               'rules' => 'required')
    );
	function __construct()
	{
		parent::__construct();
	}
		private function _get_datatables_query()
    {

        if ($this->session->userdata('level') != "1") {
            $this->column_order = array(null, 'ka.nama', 'a.nama', 'k.nama', 'k.keterangan', 'k.urut', null, null);
        $this->db->select('k.id_keterangan ,k.nama ,k.keterangan ,a.nama as nama_alur,k.urut ,r.nama as nama_ruang, ka.nama as nama_kategori');
            $this->db->from('keterangan as k');
            $this->db->join('alur as a', 'a.id_alur = k.id_alur');
            $this->db->join('jurusan as j', 'a.id_jurusan = j.id_jurusan');
            $this->db->join('ruang as r', 'r.id_ruang = k.id_ruang');
            $this->db->join('kategori as ka', 'ka.id_kategori = a.id_kategori');
            $this->db->where('a.id_jurusan ='. $this->session->userdata('id_jurusan'));  
        }
        else{
        $this->column_order = array(null,'j.nama', 'ka.nama', 'a.nama', 'k.nama', 'k.keterangan', 'k.urut', null, null);   
            $this->db->select('k.id_keterangan ,k.nama ,k.keterangan ,a.nama as nama_alur ,j.nama as nama_jurusan ,k.urut ,r.nama as nama_ruang, ka.nama as nama_kategori, a.id_jurusan');
            $this->db->from('keterangan as k');
            $this->db->join('alur as a', 'a.id_alur = k.id_alur');
            $this->db->join('jurusan as j', 'a.id_jurusan = j.id_jurusan');
            $this->db->join('kategori as ka', 'ka.id_kategori = a.id_kategori');
            $this->db->join('ruang as r', 'r.id_ruang = k.id_ruang');

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
	   public function pilih($table, $where = NULL){
        $sql = "select * from $table $where";
         $query = $this->db->query($sql);
         return $query->result();
    }
}