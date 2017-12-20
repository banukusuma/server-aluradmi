<?php

/**
* 
*/
class Berkas extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('berkas_m');
	}

	function index(){
		$this->data['meta_title'] ='Data Berkas';
		$this->data['subview'] = 'berkas/index';
		$this->load->view('_layout_main', $this->data);
	}

	function list_data(){
		$list = $this->berkas_m->get_datatables();
		foreach ($list as $berkas) {
			$row = array($berkas->id_berkas,$berkas->nama_kategori,$berkas->nama_alur,$berkas->nama_keterangan,$berkas->nama, 
				'<a class="btn btn-sm btn-success" href="berkas/edit/'.$berkas->id_berkas.'" title="Edit")"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_berkas('."'".$berkas->id_berkas."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
				);
			
             $this->data[] = $row;
		}
		unset($berkas);
		$output = array(
					'draw' => $_POST['draw'], 
					'recordsTotal' => $this->berkas_m->count_all(),
					"recordsFiltered" => $this->berkas_m->count_filtered(),
                    "data" => $this->data,

			);
		echo json_encode($output);
	}

	public function delete($id)
    	{
	        if (count($this->berkas_m->delete($id))) {
				 echo json_encode(array("status" => true));
			}
			else{
				echo json_encode(array("status" => false));
			}
       
    	}
    function edit($id){
			$this->db->select('b.id_berkas ,b.nama ,a.id_alur,k.id_keterangan, a.id_kategori');
            $this->db->from('berkas as b');
            $this->db->join('keterangan as k', 'k.id_keterangan = b.id_keterangan');
            $this->db->join('alur as a', 'a.id_alur = k.id_alur');
            $this->db->where('b.id_berkas ='.$id);
            $this->db->where('a.id_jurusan ='.$this->session->userdata('id_jurusan'));
            $this->data['berkas'] = $this->db->get()->row();
            $this->data['meta_title'] ='Edit Berkas';
			$this->data['kategori'] = $this->berkas_m->pilih('kategori');
            $this->data['subview'] = 'berkas/edit';
			$this->load->view('_layout_main', $this->data);		
			
		}

		function update(){
			 $this->data['success'] = false;
			 $this->data['messages'] = array();
			 $id = array('id_berkas' => $this->input->post('id')) ;
			 $isi = array(
			 	'nama' => $this->input->post('nama'),
			 	'id_keterangan' =>$this->input->post('keterangan'),
				'timestamp' => date('Y-m-d H:i:s'));
			 $validate = $this->berkas_m->validate;
			$this->form_validation->set_rules($validate);
			if ($this->form_validation->run()) {
				if ($this->db->update('berkas',$isi,$id )) {
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

		function tambah(){
			$this->data['meta_title'] ='Tambah Berkas';
			$this->data['keterangan'] = $this->berkas_m->cari_keterangan($this->session->userdata('id_jurusan'));
			$this->data['alur'] = $this->berkas_m->pilih('alur','where id_jurusan ='.$this->session->userdata('id_jurusan'));
			$this->data['kategori'] = $this->berkas_m->pilih('kategori');
			$this->data['subview'] = 'berkas/tambah';
			$this->load->view('_layout_main', $this->data);
		}

		function ajax_tambah(){
			//setting variabel dan mengambil data dari post	
			$this->data['messages'] = array();
			$keterangan = $this->input->post('keterangan');
			$berkas = $this->input->post('nama');
			//setting rules form validation server side
			$validate = $this->berkas_m->validate_ketiga;
			$this->form_validation->set_rules($validate);
			//jika validasi sukses
			if ($this->form_validation->run()) {
				//memasukkan data dari setiap alur yang didapat melalui ajax
				foreach ($berkas as $key => $value) {
					$cek = array(
						'id_keterangan' => $keterangan,
						'nama' => $value
						);
					//jika alur sudah ada akan mengirim peringatan
					if (count($this->berkas_m->get_by($cek))) {
						$this->data['messages'][$key] = false;
					}
					else{
						$isi = array(
							'id_keterangan' => $keterangan,
							'nama' => $value,
							'timestamp' => date('Y-m-d H:i:s')
							);
						if (count($this->db->insert('berkas',$isi))) {
							$this->data['messages'][$key] = true;
							$this->data['nama'][$key] = $value;

							
						}
						
					}
				}
				unset($key);
					
			}
			echo json_encode($this->data);
		}

		function ajax_keterangan(){
		$id = $this->input->post('alur');
		$this->data['keterangan'] = $this->berkas_m->pilih('keterangan', 'where id_alur='.$id);;
        echo json_encode($this->data);
	}

}