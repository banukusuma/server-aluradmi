<?php

/**
* 
*/
class Berkas_M extends MY_Model
{
	protected $_table = 'berkas';
	protected $primary_key = 'id_berkas';
	var $column_order = array(); //set column field database for datatable orderable
    var $column_search = array('ka.nama', 'a.nama','b.nama','k.nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('b.id_berkas' => 'desc'); // default order 
	function __construct()
	{
		parent::__construct();
	}

	public $validate = array(
        array( 'field' => 'kategori', 
               'label' => 'kategori',
               'rules' => 'required'),
         array( 'field' => 'alur', 
               'label' => 'alur',
               'rules' => 'required'),
        array( 'field' => 'nama', 
               'label' => 'Berkas',
               'rules' => 'required|trim'),
        array( 'field' => 'keterangan', 
               'label' => 'keterangan',
               'rules' => 'required'),
    );

	public $validate_kedua = array(
        array( 'field' => 'nama', 
               'label' => 'Nama',
               'rules' => 'required'),
        array( 'field' => 'jurusan', 
               'label' => 'Jurusan',
               'rules' => 'required'),
        array( 'field' => 'keterangan', 
               'label' => 'keterangan',
               'rules' => 'required'),
    );
    public $validate_ketiga = array(
        array( 'field' => 'nama[]', 
               'label' => 'Nama',
               'rules' => 'required'),
        array( 'field' => 'keterangan', 
               'label' => 'keterangan',
               'rules' => 'required'),
    );
    public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function ganti($id = array(), $data = array()){
		$this->db->set($data);
		$this->db->where($id);
		$this->db->update($this->_table);
	}
	private function _get_datatables_query()
    {
            if ($this->session->userdata('level') != "1") {
                $this->column_order = array(null, 'k.nama', 'a.nama', 'k.nama', 'b.nama', null);
            $this->db->select('b.id_berkas, b.nama, k.nama as nama_keterangan, a.nama as nama_alur, ka.nama as nama_kategori');
                $this->db->from('berkas as b');
                $this->db->where('a.id_jurusan ='. $this->session->userdata('id_jurusan'));
                $this->db->join('keterangan as k', 'b.id_keterangan = k.id_keterangan');
                $this->db->join('alur as a', 'a.id_alur = k.id_alur');
                $this->db->join('kategori as ka', 'ka.id_kategori = a.id_kategori');
            }
            else{
                $this->column_order = array(null, 'j.nama','ka.nama', 'a.nama', 'k.nama', 'b.nama', null);   
                $this->db->select('b.id_berkas, b.nama, k.nama as nama_keterangan, j.nama as nama_jurusan, ka.nama as nama_kategori, a.nama as nama_alur');
                $this->db->from('berkas as b');
                $this->db->join('keterangan as k', 'b.id_keterangan = k.id_keterangan');
                $this->db->join('alur as a', 'a.id_alur = k.id_alur');
                $this->db->join('jurusan as j', 'j.id_jurusan = a.id_jurusan');
                $this->db->join('kategori as ka', 'ka.id_kategori = a.id_kategori');
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

	function cari_keterangan($id_jurusan, $id = NULL){
        if ($id == NULL) {
            $this->db->select('k.id_keterangan, k.nama as nama_keterangan');
            $this->db->from('keterangan as k');
            $this->db->where('a.id_jurusan ='. $id_jurusan);
            $this->db->join('alur as a', 'a.id_alur = k.id_alur');
            $this->db->join('jurusan as j', 'a.id_jurusan = j.id_jurusan');
        }
        else{
            $this->db->select('k.id_keterangan, k.nama as nama_keterangan');
            $this->db->from('keterangan as k');
            $this->db->where('a.id_jurusan ='. $id_jurusan);
            $this->db->where('k.id_alur ='.$id);
            $this->db->join('alur as a', 'a.id_alur = k.id_alur');
            $this->db->join('jurusan as j', 'a.id_jurusan = j.id_jurusan');
           
        }
		
        $query = $this->db->get();
        return $query->result();
	}

}