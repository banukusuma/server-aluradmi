<?php

/**
* 
*/
class Gedung extends Super_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('gedung_m');
		$this->load->model('lantai_m');
		$this->load->library('upload');
	}
	function list_data(){
		$list = $this->gedung_m->get_datatables();
		foreach ($list as $gedung) {
			$row = array($gedung->id_gedung,$gedung->nama,$gedung->lantai,  
				'<a href="'.$gedung->denah.'" target="_blank"><img src="'.$gedung->denah_thumb.'"  /></a>',
				'<a class="btn btn-md btn-block btn-primary" href="gedung/edit/'.$gedung->id_gedung.'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit Gedung</a>',
				'<a class="btn btn-md btn-block btn-success" onclick="upload_denah('."'".$gedung->id_lantai."'".')" title="Upload"><i class="glyphicon glyphicon-upload"></i> Upload Denah</a>',
                  '<a class="btn btn-md btn-block btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_gedung('."'".$gedung->id_gedung."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
				);
			
             $this->data[] = $row;
		}
		unset($gedung);
		$output = array(
					'draw' => $_POST['draw'], 
					'recordsTotal' => $this->gedung_m->count_all(),
					"recordsFiltered" => $this->gedung_m->count_filtered(),
                    "data" => $this->data,

			);
		echo json_encode($output);
	}

	function index(){
		$this->data['meta_title'] ='Data Gedung';
		$this->data['subview'] = 'admin/gedung/index';
		$this->load->view('_layout_main', $this->data);
	}

	function tambah(){
		$this->data['meta_title'] ='Tambah Gedung';
		$this->data['subview'] = 'admin/gedung/tambah';
		$this->load->view('_layout_main', $this->data);
	}
	function ajax_tambah(){
		$this->data['messages'] = array();
		$nama = $this->input->post('nama');
		$jumlah_lantai = $this->input->post('jumlah');
		$latitude = $this->input->post('lat');
		$longitude = $this->input->post('lng');
		$isi = array('nama' => $nama ,
					 'latitude' => $latitude,
					 'longitude' => $longitude,
					 'timestamp' => date('Y-m-d H:i:s'));

		$validate = $this->gedung_m->validate;
		$this->form_validation->set_rules($validate);
		if ($this->form_validation->run()) {
			if ($this->gedung_m->get_by(array('nama' => $nama))) {
				$this->data['messages']['ada'] = true;
			}
			else{
				$this->data['messages']['ada'] = false;
				if ($id_gedung = $this->gedung_m->insert($isi)) {

					for ($i=0; $i < $jumlah_lantai ; $i++) { 
						$no_lantai = $i + 1;
						$link = base_url() . "denah/no-thumbnail.png";
						$thumb = base_url() . "denah/no-thumbnail_thumb.png";
						$isi_lantai = array('nama' => $no_lantai,
											'id_gedung' => $id_gedung,
											'timestamp' => date('Y-m-d H:i:s'),
											'link' => $link,
											'thumbnail' => $thumb);
						$this->data['isi'] = $isi_lantai;
						if ($this->db->insert('lantai', $isi_lantai)) {
							$this->data['messages']['success'] = true;
						}else{
							$this->data['messages']['success'] = false;
						}
						
						
					}
				}else {
					$this->data['messages']['success'] = false;
				}
			}
		}
		else {
			foreach ($_POST as $key => $value) {
				$this->data['messages']['validation'][$key] = form_error($key);
				}
			}
		echo json_encode($this->data);	
	}

	function upload(){
		$this->data['messages'] = array();
		$id_lantai = $this->input->post('id_lantai');
		$validate = $this->lantai_m->validate;
		$this->form_validation->set_rules($validate);
		if ($this->form_validation->run()) {
			$config['upload_path'] = './denah/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']  = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['remove_spaces'] = TRUE;
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('denah')){
			$this->data['messages']['error'] = $this->upload->display_errors();
			$link = base_url() . "denah/no-thumbnail.png";
			$thumb = base_url() . "denah/no-thumbnail_thumb.png";
			$this->data['messages']['success'] = false;
			}
		else{
			$config['image_library']  = 'gd2';
			$config['source_image']  = $this->upload->data('full_path');
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 150;
			$config['height']       = 100;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			$this->image_lib->clear();
			$link = base_url() . 'denah/' . $this->upload->data('file_name');
			$thumb = base_url() . 'denah/' . $this->upload->data('raw_name').'_thumb'.$this->upload->data('file_ext');
			if ($this->lantai_m->update($id_lantai, array('link' => $link , 'thumbnail' => $thumb, 'timestamp' => date('Y-m-d H:i:s')))) {
				$this->data['messages']['success'] = true;
			}
			}
			
		}
		else {
			foreach ($_POST as $key => $value) {
				$this->data['messages']['validation'][$key] = form_error($key);
				}
			}
		echo json_encode($this->data);	
		
	}

	function delete($id_gedung){
		if ($this->gedung_m->delete($id_gedung)) {
			$list_lantai = $this->lantai_m->get_many_by(array('id_gedung' => $id_gedung));
	        	foreach ($list_lantai as $key) {
	        		$this->db->delete('ruang', array('id_lantai' => $key->id_lantai));
	        	}
	        	unset($key);
	        	$this->db->delete('lantai', array('id_gedung' => $id_gedung));
			echo json_encode(array("status" => true));
			}
		else{
			echo json_encode(array("status" => false));
		}
	}

	function edit($id_gedung){
		$this->data['gedung'] = $this->gedung_m->get($id_gedung);
		$this->db->select('*');
        $this->db->from('lantai');
        $this->db->where('id_gedung ='.$id_gedung);
        $query = $this->db->get()->num_rows();
		$this->data['lantai'] = $query;
		$this->data['meta_title'] ='Edit Gedung';
		$this->data['subview'] = 'admin/gedung/edit';
		$this->load->view('_layout_main', $this->data);

	}

	function update(){
    	$this->data['success'] = false;
		$this->data['messages'] = array();
    	$id_gedung = $this->input->post('id');
    	$jml_lantai_post = $this->input->post('jumlah');
    	$isi_gedung = array('nama' => $this->input->post('nama'),
    			'latitude' => $this->input->post('lat'),
    			'longitude' => $this->input->post('lng'),
				'timestamp' => date('Y-m-d H:i:s')
				);
    	$validate = $this->gedung_m->validate;
			$this->form_validation->set_rules($validate);
			if ($this->form_validation->run()) {
				if ($this->gedung_m->update($id_gedung,$isi_gedung)) {
					$this->db->select('*');
        			$this->db->from('lantai');
        			$this->db->where('id_gedung ='.$id_gedung);
        			$jml_sekarang =  $this->db->get()->num_rows();
					if ($jml_sekarang < $jml_lantai_post) {
						for ($i=$jml_sekarang; $i < $jml_lantai_post; $i++) { 
							$no_lantai = $i + 1;
							$link = base_url() . "denah/no-thumbnail.png";
							$thumb = base_url() . "denah/no-thumbnail_thumb.png";
							$isi_lantai = array('nama' => $no_lantai,
												'id_gedung' => $id_gedung,
												'timestamp' => date('Y-m-d H:i:s'),
												'link' => $link,
												'thumbnail' => $thumb);
							$this->data['isi'] = $isi_lantai;
							if ($this->db->insert('lantai', $isi_lantai)) {
								$this->data['messages']['success'] = true;
							}else{
								$this->data['messages']['success'] = false;
							}
						}
					} elseif ($jml_sekarang > $jml_lantai_post) {
						for ($i= $jml_lantai_post; $i <$jml_sekarang  ; $i++) { 
							$no_lantai = $i + 1;
							$delete_lantai = array('nama' => $no_lantai, 'id_gedung' => $id_gedung);
							if ($this->db->delete('lantai', $delete_lantai)) {
								$this->data['messages']['success'] = true;
							}else{
								$this->data['messages']['success'] = false;
							}
						}
						}
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
