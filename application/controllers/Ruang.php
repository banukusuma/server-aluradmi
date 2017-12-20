<?php

/**
* 
*/
class Ruang extends Admin_Controller
{
	 function __construct()
	{
		parent::__construct();
		$this->load->model('ruang_m');
		$this->load->model('gedung_m');
		$this->load->model('lantai_m');
	}
	function list_data(){
		$list = $this->ruang_m->get_datatables();
		foreach ($list as $ruang) {
			$row = array($ruang->id_ruang,$ruang->nama_gedung,$ruang->lantai, $ruang->nama,
				'<a class="btn btn-sm btn-success" href="ruang/edit/'.$ruang->id_ruang.'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_ruang('."'".$ruang->id_ruang."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
				);
			
             $this->data[] = $row;
		}
		unset($ruang);
		$output = array(
					'draw' => $_POST['draw'], 
					'recordsTotal' => $this->ruang_m->count_all(),
					"recordsFiltered" => $this->ruang_m->count_filtered(),
                    "data" => $this->data,

			);
		echo json_encode($output);
	}

	function index(){
		$this->data['meta_title'] ='Data Ruang';
		$this->data['subview'] = 'ruang/index';
		$this->load->view('_layout_main', $this->data);
	}

	function delete($id)
    	{
	        if (count($this->ruang_m->delete($id))) {
				 echo json_encode(array("status" => true));
			}
			else{
				echo json_encode(array("status" => false));
			}
       
    	}

    function tambah(){
    	$this->data['meta_title'] ='Tambah Ruang';
    	$this->data['gedung'] = $this->ruang_m->pilih('gedung', 'where id_gedung != 99');
    	$this->data['subview'] = 'ruang/tambah';
		$this->load->view('_layout_main', $this->data);
    }

    function ajax_lantai(){
    	$id_gedung = $this->input->post('gedung');
    	$this->data['lantai'] = $this->ruang_m->pilih('lantai', 'where id_gedung = '.$id_gedung);
    	echo json_encode($this->data);
    }

    function ajax_tambah(){
    	//setting variabel dan mengambil data dari post	
		$this->data['messages'] = array();
		$lantai = $this->input->post('lantai');
		$ruang =  $this->input->post('nama');
		//setting rules form validation server side
		$validate = $this->ruang_m->validate_user;
		$this->form_validation->set_rules($validate);
		//jika validasi sukses
		if ($this->form_validation->run()) {
			//memasukkan data dari setiap ruang yang didapat melalui ajax
			foreach ($ruang as $key => $value) {
				$cek = array(
					'id_lantai' => $lantai,
					'nama' => $value
					);
				//jika ruang sudah ada akan mengirim peringatan
				if (count($this->ruang_m->get_by($cek))) {
					$this->data['messages'][$key] = false;
				}
				else{
					$isi = array(
						'id_lantai' => $lantai,
						'nama' => $value,
						'timestamp' => date('Y-m-d H:i:s')
						);
					if (count($this->ruang_m->insert($isi))) {
						$this->data['messages'][$key] = true;
					}
					
				}
			}
			unset($key);
				
		}
		echo json_encode($this->data);
    }

    function edit($id){
    	$this->data['gedung'] = $this->ruang_m->pilih('gedung', 'where id_gedung != 99');
    	$this->db->select('l.id_gedung,r.id_lantai, r.id_ruang, r.nama');
        $this->db->from('ruang as r');
        $this->db->join('lantai as l', 'r.id_lantai = l.id_lantai');
        $this->db->join('gedung as g', 'g.id_gedung = l.id_gedung');
        $this->db->where('r.id_ruang ='.$id);
        $query = $this->db->get()->row();
		$this->data['ruang'] = $query;
		$this->data['lantai'] = $this->ruang_m->pilih('lantai', 'where id_gedung = '.$query->id_gedung);
		$this->data['meta_title'] ='Edit Ruang';
		$this->data['subview'] = 'ruang/edit';
		$this->load->view('_layout_main', $this->data);	
    }

    function update(){
    	$this->data['success'] = false;
		$this->data['messages'] = array();
    	$id_ruang = $this->input->post('id');
    	$isi_ruang = array('nama' => $this->input->post('nama'),
				'id_lantai' => $this->input->post('lantai'),
				'timestamp' => date('Y-m-d H:i:s')
				);
    	$validate = $this->ruang_m->validate;
			$this->form_validation->set_rules($validate);
			if ($this->form_validation->run()) {
				if ($this->ruang_m->update($id_ruang,$isi_ruang)) {
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

}