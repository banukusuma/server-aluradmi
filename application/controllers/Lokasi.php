<?php 

/**
* 
*/
class Lokasi extends Admin_Controller
{
	
	function __construct()
		{
			parent:: __construct();
			$this->load->model('lokasi_m');
			
		}
	function list_data(){
		$list = $this->lokasi_m->get_datatables();
		foreach ($list as $lok) {
			$row = array($lok->id_lokasi, $lok->nama, $lok->lattitude, $lok->longtitude, 
				'<a class="btn btn-sm btn-success" title="Edit" href="lokasi/edit/'.$lok->id_lokasi.'"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_lokasi('."'".$lok->id_lokasi."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
				);
			
             $this->data[] = $row;
		}
		$output = array(
					'draw' => $_POST['draw'], 
					'recordsTotal' => $this->lokasi_m->count_all(),
					"recordsFiltered" => $this->lokasi_m->count_filtered(),
                    "data" => $this->data,

			);
		echo json_encode($output);
	}

	function index()
		{
			$this->data['meta_title'] ='Data Lokasi';
			$this->data['subview'] = 'lokasi/index';
			$this->load->view('_layout_main', $this->data);
		}

		function ajax_tambah(){
		$this->data['success'] = false;
		$this->data['messages'] = array();
		$cek = array('nama' => $this->input->post('nama'));
		$isi = array('nama' => $this->input->post('nama'),
					'lattitude' => $this->input->post('ltt'),
					'longtitude' => $this->input->post('lot'),
					'timestamp' => date('Y-m-d H:i:s'));
		$validate = $this->lokasi_m->validate;
		$this->form_validation->set_rules($validate);
		if ($this->form_validation->run()) {
				if ($this->lokasi_m->insert($isi)) {
				$this->data['success'] = true;		
				}
			}
		else {
				foreach ($_POST as $key => $value) {
					$this->data['messages'][$key] = form_error($key);
				}
			}
		echo json_encode($this->data);
	}


	function update(){
		$this->data['success'] = false;
		$this->data['messages'] = array();
		$id = $this->input->post('id');
		$isi = array('nama' => $this->input->post('nama'),
					'lattitude' => $this->input->post('ltt'),
					'longtitude' => $this->input->post('lot'),
					'timestamp' => date('Y-m-d H:i:s'));
		$validate = $this->lokasi_m->validate_edit;
		$this->form_validation->set_rules($validate);
		if ($this->form_validation->run()) {
			$this->db->where('id_lokasi', $id);
			$query = $this->db->update('lokasi', $isi);
			if (count($query)) {
				$this->data['success'] = true;
			}
			
		}
		else {
				foreach ($_POST as $key => $value) {
					$this->data['messages'][$key] = form_error($key);
				}
			}
		echo json_encode($this->data);	
	}

	public function delete($id)
    	{
	        if (count($this->lokasi_m->delete($id))) {
				 echo json_encode(array("status" => true));
			}
			else{
				echo json_encode(array("status" => false));
			}
       
    	}

   	function tambah(){
   		$this->data['meta_title'] ='Tambah Lokasi';
   		$this->data['subview'] = 'lokasi/tambah';
		$this->load->view('_layout_main', $this->data);
   	}

   	function edit($id){
   		$this->data['meta_title'] ='Edit Lokasi';
   		$this->data['lokasi'] = $this->lokasi_m->get($id);
   		$this->data['subview'] = 'lokasi/edit';
		$this->load->view('_layout_main', $this->data);
   	}

   	public function cek_lokasi($str){
   		if (count($this->lokasi_m->get_by(array('nama' => $str)))) {
   			$this->form_validation->set_message('cek_lokasi', 'nama lokasi sudah ada');
            return FALSE;
   		}
   		else{
   			return TRUE;
   		}
   	}

}