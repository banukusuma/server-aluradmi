<?php 

/**
* 
*/
class Alur extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('alur_m');
		$this->load->model('keterangan_m');
		$this->load->model('berkas_m');
	}
		function list_data(){
		$list = $this->alur_m->get_datatables();
		foreach ($list as $alur) {
			$row = array($alur->id_alur,$alur->nama_kategori,$alur->nama,  $alur->urut,
				'<a class="btn btn-sm btn-success" href="alur/edit/'.$alur->id_alur.'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_alur('."'".$alur->id_alur."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
				);
			
             $this->data[] = $row;
		}
		unset($alur);
		$output = array(
					'draw' => $_POST['draw'], 
					'recordsTotal' => $this->alur_m->count_all(),
					"recordsFiltered" => $this->alur_m->count_filtered(),
                    "data" => $this->data,

			);
		echo json_encode($output);
	}

	function index(){
		$this->data['meta_title'] ='Data Alur';
		$this->data['subview'] = 'alur/index';
		$this->load->view('_layout_main', $this->data);
	}

	function edit($id){
		$this->data['kategori'] = $this->alur_m->pilih('kategori');
		$this->data['alur'] = $this->alur_m->get($id);
		$this->data['meta_title'] ='Edit Alur';
		$this->data['subview'] = 'alur/edit';
		$this->load->view('_layout_main', $this->data);		
	}
	function update(){
			$this->data['success'] = false;
			$this->data['messages'] = array();
			$id = $this->input->post('id');
			$isi= array('nama' => $this->input->post('nama'),
				'id_kategori' => $this->input->post('kategori'),
				'id_jurusan' => $this->input->post('jurusan'),
				'timestamp' => date('Y-m-d H:i:s')
				);
			$validate = $this->alur_m->validate;
			$this->form_validation->set_rules($validate);
			if ($this->form_validation->run()) {
				if ($this->alur_m->update($id,$isi)) {
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
    		$this->data['meta_title'] ='Tambah Alur';
    		$this->data['kategori'] = $this->alur_m->pilih('kategori');
    		$this->data['subview'] = 'alur/tambah';
			$this->load->view('_layout_main', $this->data);
    	}

    	function ajax_tambah(){
    	//setting variabel dan mengambil data dari post	
		$this->data['messages'] = array();
		$kategori = $this->input->post('kategori');
		$alur = $this->input->post('nama');
		$id_jurusan =  $this->input->post('jurusan');
		//setting rules form validation server side
		$validate = $this->alur_m->validate_user;
		$this->form_validation->set_rules($validate);
		//jika validasi sukses
		if ($this->form_validation->run()) {
			//memasukkan data dari setiap alur yang didapat melalui ajax
			foreach ($alur as $key => $value) {
				$cek = array(
					'id_kategori' => $kategori,
					'nama' => $value,
					'id_jurusan' => $id_jurusan
					);
				//jika alur sudah ada akan mengirim peringatan
				if (count($this->alur_m->get_by($cek))) {
					$this->data['messages'][$key] = false;
				}
				else{
					$this->db->select_max('urut');
					$this->db->where(array('id_kategori' => $kategori,
						'id_jurusan' => $id_jurusan));
					$query = $this->db->get('alur');
					$no = $query->result_array();
					$urut = $no[0]['urut'];
			
					$urut = $urut + 1;
					$isi = array(
						'id_kategori' => $kategori,
						'nama' => $value,
						'id_jurusan' => $id_jurusan,
						'urut' => $urut,
						'timestamp' => date('Y-m-d H:i:s')
						);
					if (count($this->alur_m->insert($isi))) {
						$this->data['messages'][$key] = true;
						$this->data['urut'][$key] = $urut;
					}
					
				}
			}
			unset($key);
				
		}
		echo json_encode($this->data);
    	}

    	function urut(){
    		$this->data['meta_title'] ='Urutkan Alur';
    		$this->data['kategori'] = $this->alur_m->pilih('kategori');
    		$this->data['subview'] = 'alur/urut';
			$this->load->view('_layout_main', $this->data);
    	}

    	function ajax_data_urut(){
    		$jurusan = $this->input->post('jurusan');
    		$kategori = $this->input->post('kategori');
    		$isi = array('id_jurusan' => $jurusan,'id_kategori' => $kategori );
    		$this->db->where($isi);
    		$this->db->order_by('urut', 'DESC');
    		$query = $this->db->get('alur')->result();
    		$this->data['alur'] = $query;
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
				$this->db->where('id_alur', $id);
				if (count($this->db->update('alur'))) {
					$this->data['messages'][$urut] = $value;
				}
				$urut = $urut + 1;

			}
			unset($key);
				
			echo json_encode($this->data);
    	}

    	function mengurutkan_kembali($data){
    		$urut = 1;	
    		foreach ($data as $key) {
    			$id = $key->id_alur;
    			$this->db->set('urut', $urut);
				$this->db->set('timestamp', date('Y-m-d H:i:s') );
				$this->db->where('id_alur', $id);
				$this->db->update('alur');
				$urut = $urut + 1;
    		}
    	}

    	public function delete($id)
    	{
    		$alur = $this->alur_m->get($id);
    		$id_kategori = $alur->id_kategori;
    		$id_jurusan = $alur->id_jurusan;
    		$urut = $alur->urut;
    		$this->db->select_max('urut');
			$this->db->where(array('id_kategori' => $id_kategori,
						'id_jurusan' => $id_jurusan));
			$query = $this->db->get('alur');
			$no = $query->result_array();
			$max_urut = $no[0]['urut'];

    		// ------------------------------------------------------------------------
    		//method untuk hapus
	        if ($this->alur_m->delete($id)) {
	        	$list_keterangan = $this->keterangan_m->get_many_by(array('id_alur' => $id));
	        	foreach ($list_keterangan as $key) {
	        		$this->db->delete('berkas', array('id_keterangan' => $key->id_keterangan));
	        	}
	        	unset($key);
	        	$this->db->delete('keterangan', array('id_alur' => $id));
	        	if ($urut != $max_urut) {
					$this->db->where(array('id_kategori' => $id_kategori,
						'id_jurusan' => $id_jurusan));
					$this->db->order_by('urut', 'ASC');
					$query = $this->db->get('alur')->result();
					$this->mengurutkan_kembali($query);
	        	}
				 echo json_encode(array("status" => true));
			}
			else{
				echo json_encode(array("status" => false));
			}
			//
       		// ------------------------------------------------------------------------
    	}
}