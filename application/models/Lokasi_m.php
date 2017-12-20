<?php

/**
* 
*/
class Lokasi_M extends MY_Model
{
	protected $_table = 'lokasi';
	protected $primary_key = 'id_lokasi';
	var $column_order = array(null,'nama','lattitude','longtitude',null); //set column field database for datatable orderable
    var $column_search = array('nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id_lokasi' => 'desc'); // default order 
	public $validate = array(
        array( 'field' => 'nama', 
               'label' => 'Nama',
               'rules' => 'required|trim|callback_cek_lokasi'),
        array( 'field' => 'ltt',
               'label' => 'Lattitude',
               'rules' => 'required|numeric'),
         array( 'field' => 'lot', 
               'label' => 'Longitude',
               'rules' => 'required|numeric')  
    );
        public $validate_edit = array(
        array( 'field' => 'nama', 
               'label' => 'Nama',
               'rules' => 'required|trim'),
        array( 'field' => 'ltt',
               'label' => 'Lattitude',
               'rules' => 'required|numeric'),
         array( 'field' => 'lot', 
               'label' => 'Longitude',
               'rules' => 'required|numeric')  
    );
	function __construct()
	{
		parent::__construct();
	}
	 private function _get_datatables_query()
    {
         
        $this->db->from($this->_table);
        $this->db->where('id_lokasi != 0');
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

	function cek_data(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'lattitude' => $this->input->post('ltt'),
			'longtitude' => $this->input->post('lot'),
			);
		return $this->get_by($data);
	}

	function tambah(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'lattitude' => $this->input->post('ltt'),
			'longtitude' => $this->input->post('lot'),
			);
		return $this->insert($data);
	}

	function edit($id){
		$data = array(
			'nama' => $this->input->post('nama'),
			'lattitude' => $this->input->post('ltt'),
			'longtitude' => $this->input->post('lot'),
			);
		return $this->update($id,$data);
	}
}