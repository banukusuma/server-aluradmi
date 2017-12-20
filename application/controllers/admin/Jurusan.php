<?php

/**
* 
*/
class Jurusan extends Super_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('jurusan_m');
		$this->load->model('alur_m');
		$this->load->model('keterangan_m');
	}

	function index(){
		$this->data['meta_title'] ='Data Jurusan';
		$this->data['subview'] = 'admin/jurusan/lihat';
		$this->load->view('_layout_main', $this->data);
	}

	function list_data(){
		$list = $this->jurusan_m->get_datatables();
		foreach ($list as $jur) {
			$row = array($jur->id_jurusan, $jur->nama, 
				'<a class="btn btn-sm btn-success" href="jurusan/edit/'.$jur->id_jurusan.'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_jurusan('."'".$jur->id_jurusan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
				);
			
             $this->data[] = $row;
		}
		unset($alur);
		$output = array(
					'draw' => $_POST['draw'], 
					'recordsTotal' => $this->jurusan_m->count_all(),
					"recordsFiltered" => $this->jurusan_m->count_filtered(),
                    "data" => $this->data,

			);
		echo json_encode($output);
	}

	function edit($id){
		$this->data['meta_title'] ='Edit Jurusan';
		$this->data['jurusan'] = $this->jurusan_m->get($id);		
		$this->data['subview'] = 'admin/jurusan/edit';
		$this->load->view('_layout_main', $this->data);
	}

	function update(){
		$this->data['success'] = false;
		$this->data['messages'] = array();
		$id = $this->input->post('id');
		$isi = array('nama' => $this->input->post('nama'),
				'timestamp' => date('Y-m-d H:i:s'));
		$validate = $this->jurusan_m->validate_kedua;
		$this->form_validation->set_rules($validate);
		if ($this->form_validation->run()) {
			if ($this->jurusan_m->update($id,$isi)) {
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
        if ($this->jurusan_m->delete($id)) {
			$list_alur = $this->alur_m->get_many_by(array('id_jurusan' => $id));
        	foreach ($list_alur as $key) {
        		$list_keterangan = $this->keterangan_m->get_many_by(array('id_alur' => $key->id_alur));
        		foreach ($list_keterangan as $list ) {
        			$this->db->delete('berkas', array('id_keterangan' => $list->id_keterangan));
        		}
        		unset($list);
        		$this->db->delete('keterangan', array('id_alur' => $key->id_alur));
        	}
        	unset($key);
        	$this->db->delete('alur', array('id_jurusan' => $id));
        	$this->db->delete('user', array('id_jurusan' => $id));
			echo json_encode(array("status" => true));
		}
		else{
			echo json_encode(array("status" => false));
		}
       
    }
    function ajax_tambah(){
    	//setting variabel dan mengambil data dari post	
		$this->data['messages'] = array();
		
		$jurusan = $this->input->post('nama');
		
		//setting rules form validation server side
		$validate = $this->jurusan_m->validate;
		$this->form_validation->set_rules($validate);
		//jika validasi sukses
		if ($this->form_validation->run()) {
			//memasukkan data dari setiap alur yang didapat melalui ajax
			foreach ($jurusan as $key => $value) {
				$cek = array(
					'nama' => $value
					);
				//jika alur sudah ada akan mengirim peringatan
				if (count($this->jurusan_m->get_by($cek))) {
					$this->data['messages'][$key] = false;
				}
				else{
					$isi = array(
						'nama' => $value,
						'timestamp' => date('Y-m-d H:i:s')
						);
					if (count($this->jurusan_m->insert($isi))) {
						$this->data['messages'][$key] = true;
						
					}
					
				}
			}
			unset($key);
				
		}
			echo json_encode($this->data);
    }
    function tambah(){
    	$this->data['meta_title'] ='Tambah Jurusan';
    	$this->data['subview'] = 'admin/jurusan/tambah';
		$this->load->view('_layout_main', $this->data);
    }
}