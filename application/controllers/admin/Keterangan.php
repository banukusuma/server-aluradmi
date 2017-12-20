<?php

/**
* 
*/
class Keterangan extends Super_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('keterangan_m');
	}

	function index(){
		$this->data['meta_title'] ='Data Keterangan';
		$this->data['subview'] = 'admin/keterangan/index';
		$this->load->view('_layout_main', $this->data);
	}
	function list_data(){
		
		$list = $this->keterangan_m->get_datatables();
		foreach ($list as $ket) {
			$row = array($ket->id_keterangan,$ket->nama_jurusan,$ket->nama_kategori,$ket->nama_alur, $ket->nama, $ket->keterangan,   $ket->urut, $ket->nama_ruang,
				'<a class="btn btn-sm btn-success" href="keterangan/edit/'.$ket->id_jurusan.'/'.$ket->id_keterangan.'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_keterangan('."'".$ket->id_keterangan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
				);
			
             $this->data[] = $row;
		}
		unset($ket);
		$output = array(
					'draw' => $_POST['draw'], 
					'recordsTotal' => $this->keterangan_m->count_all(),
					"recordsFiltered" => $this->keterangan_m->count_filtered(),
                    "data" => $this->data,

			);
		echo json_encode($output);
	}
	
	
	function ajax_alur(){
		$id_kategori = $this->input->post('kategori');
   		$id_jurusan= $this->input->post('jurusan');
   		$this->data['alur'] = $this->keterangan_m->pilih('alur', 'where id_jurusan ='.$id_jurusan.' and id_kategori ='.$id_kategori);
		echo json_encode($this->data);

	}

	public function delete($id)
    {
    	$keterangan = $this->keterangan_m->get($id);
   			$id_alur = $keterangan->id_alur;
    		$urut = $keterangan->urut;
    		$this->db->select_max('urut');
			$this->db->where(array('id_alur' => $id_alur));
			$query = $this->db->get('keterangan');
			$no = $query->result_array();
			$max_urut = $no[0]['urut'];
				
        if ($this->keterangan_m->delete($id)) {
        	$this->db->delete('berkas', array('id_keterangan' => $id));
        	if ($urut != $max_urut) {
        		$this->db->where(array('id_alur' => $id_alur));
					$this->db->order_by('urut', 'ASC');
					$query = $this->db->get('keterangan')->result();
        		$this->mengurutkan_kembali($query);
        	}
			 echo json_encode(array("status" => true));
		}
		else{
			echo json_encode(array("status" => false));
		}
       
    }
    function mengurutkan_kembali($data){
    		$urut = 1;	
    		foreach ($data as $key) {
    			$id = $key->id_keterangan;
    			$this->db->set('urut', $urut);
				$this->db->set('timestamp', date('Y-m-d H:i:s') );
				$this->db->where('id_keterangan', $id);
				$this->db->update('keterangan');
				$urut = $urut + 1;
    		}
    	}

    function edit($id1, $id2){
    	$this->db->select('k.id_keterangan ,k.nama ,k.keterangan ,a.id_alur,r.id_ruang, a.id_jurusan, a.id_kategori');
            $this->db->from('keterangan as k');
            $this->db->join('alur as a', 'a.id_alur = k.id_alur');
            $this->db->join('ruang as r', 'r.id_ruang = k.id_ruang');
            $this->db->where('a.id_jurusan ='.$id1);
            $this->db->where('k.id_keterangan ='.$id2);
            $query = $this->db->get()->row();
            $this->data['keterangan'] = $query;
            $this->data['kategori'] = $this->keterangan_m->pilih('kategori');
            $this->data['meta_title'] ='Edit Keterangan';
    		$this->data['jurusan'] = $this->keterangan_m->pilih('jurusan','where id_jurusan !=0');
			$this->data['gedung'] = $this->keterangan_m->pilih('gedung');
	    	$this->db->select('r.id_ruang, l.id_lantai, g.id_gedung');
	        $this->db->from('ruang as r');
	        $this->db->join('lantai as l', 'l.id_lantai = r.id_lantai');
	        $this->db->join('gedung as g', 'g.id_gedung = l.id_gedung');
	        $this->db->where('r.id_ruang ='.$query->id_ruang);
	        $query_lokasi = $this->db->get()->row();
	        $this->data['lokasi'] = $query_lokasi;
    		$this->data['subview'] = 'admin/keterangan/edit';
			$this->load->view('_layout_main', $this->data);

    }

    function update(){
    	$this->data['success'] = false;
		$this->data['messages'] = array();
    	$id_keterangan = $this->input->post('id');
    	$isi_keterangan = array('nama' => $this->input->post('nama'),
				'keterangan' => $this->input->post('keterangan'),
				'id_alur' => $this->input->post('alur'),
				'id_ruang' => $this->input->post('ruang'),
				'timestamp' => date('Y-m-d H:i:s')
				);
    		$validate = $this->keterangan_m->validate;
			$this->form_validation->set_rules($validate);
			if ($this->form_validation->run()) {
				if ($this->keterangan_m->update($id_keterangan,$isi_keterangan)) {
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
    	$this->data['meta_title'] ='Tambah Keterangan';
    	$this->data['kategori'] = $this->keterangan_m->pilih('kategori');
    	$this->data['jurusan'] = $this->keterangan_m->pilih('jurusan','where id_jurusan !=0');
		$this->data['gedung'] = $this->keterangan_m->pilih('gedung', 'where id_gedung != 99');
		$this->data['subview'] = 'admin/keterangan/tambah';
		$this->load->view('_layout_main', $this->data);
    }
        function ajax_tambah(){
    	$this->data['messages'] = array();
    	$alur = $this->input->post('alur');
    	$input = $this->input->post('data');
    	$validate = $this->keterangan_m->validate_user;
    	
		$this->form_validation->set_rules($validate);
		if ($this->form_validation->run()) {
			foreach ($input as $key => $value) {
				
				$nama = $value['nama'];
				$lokasi = $value['ruang'];
				$keterangan = $value['keterangan'];
				$cek = array('nama' => $nama, 
					'id_alur' => $alur
					);
				
				if (count($this->keterangan_m->get_by($cek))) {
					$this->data['messages'][$key]  = false;
				}
				else{
					$this->db->select_max('urut');
					$this->db->where(array('id_alur' => $alur));
					$query = $this->db->get('keterangan');
					$no = $query->result_array();
					$urut = $no[0]['urut'];
				
					$urut = $urut + 1;
					$isi = array(
						'id_alur' => $alur,
						'nama' => $nama,
						'keterangan' => $keterangan,
						'urut' => $urut,
						'id_ruang' => $lokasi,
						'timestamp' => date('Y-m-d H:i:s')
						);
					if (count($this->db->insert('keterangan',$isi))) {
						$this->data['messages'][$key]= true;
						
					}

				}
				
			}
			unset($key);
		}
		echo json_encode($this->data);
		
    }
    function urut(){
    	$this->data['meta_title'] ='Urutkan Keterangan';
	   	$this->data['kategori'] = $this->keterangan_m->pilih('kategori');
	   	$this->data['jurusan'] = $this->keterangan_m->pilih('jurusan', 'where id_jurusan !=0');
		$this->data['subview'] = 'admin/keterangan/urut';
		$this->load->view('_layout_main', $this->data);
    }

    function ajax_data_urut(){
    		$alur = $this->input->post('alur');
    		$isi = array('id_alur' => $alur);
    		$this->db->where($isi);
    		$this->db->order_by('urut', 'DESC');
    		$query = $this->db->get('keterangan')->result();
    		$this->data['keterangan'] = $query;
    		echo json_encode($this->data);
    	}
   	function ajax_ubah_urutan(){
    	$urut = 1;	
    	$input = $this->input->post('data');  	
    	$this->data['messages'] = array();	
		//jika validasi sukses
		//memasukkan data dari setiap alur yang didapat melalui ajax
			foreach ($input as $key => $value) {
				$id = $value;			
				$isi = array('urut' => $urut);
				$this->db->set('urut', $urut);
				$this->db->set('timestamp', date('Y-m-d H:i:s') );
				$this->db->where('id_keterangan', $id);
				if (count($this->db->update('keterangan'))) {
					$this->data['messages'][$urut] = $value;
				}
				$urut = $urut + 1;

			}
			unset($key);
				
			echo json_encode($this->data);
    	}

    	function ajax_ruang(){
    		$id_lantai = $this->input->post('lantai');
    		$this->data['ruang'] = $this->keterangan_m->pilih('ruang', 'where id_lantai ='.$id_lantai);
    		echo json_encode($this->data);
    	}

}