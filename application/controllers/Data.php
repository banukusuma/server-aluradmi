<?php

/**
* 
*/
class Data extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function semua_get(){
		$this->data['alur'] = $this->get_isi('alur')->result();
		$this->data['kategori'] = $this->get_isi('kategori')->result();
		$this->data['keterangan'] = $this->get_isi('keterangan')->result();
		$this->data['gedung'] = $this->get_isi('gedung')->result();
        $this->data['lantai'] = $this->get_isi('lantai')->result();
        $this->data['ruang'] = $this->get_isi('ruang')->result();
		$this->data['jurusan'] = $this->get_isi('jurusan')->result();
		$this->data['kategori'] = $this->get_isi('kategori')->result();
		$this->data['berkas'] = $this->get_isi('berkas')->result();
		$this->response($this->data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
	}

	function tambah_get(){
		$table = $this->get('table');
		$ts = $this->get('ts');
		if ($table == null || $ts == null) {
			$this->response([]); // HTTP 404 Not Found
		}
		else{
			if($table != 'user'){
				$this->data[$table] = $this->get_isi($table,null,$ts)->result();
				$this->response($this->data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
              }
             else{
                  $this->response([]); // HTTP 404 Not Found
                 }
		}
		
	}
	function update_get(){
		$table = $this->get('table');
		$id = $this->get('id');
		if ($table == null || $id == null) {
			$this->response([]); // HTTP 404 Not Found
		}
		else{
			$this->data[$table] = $this->get_isi($table,$id)->row();
			$this->response($this->data, REST_Controller::HTTP_OK); 
			// OK (200) being the HTTP response code
		}
		
	}

	private function get_isi($table ,$id = null, $timestamp = null){
		if ($id == null && $timestamp == null ) {
			if($table == "jurusan"){
              $this->db->where('id_jurusan != 0');
              }
			$query  = $this->db->get($table);
		}
		elseif ($id != null) {
			$this->db->from($table);
			$this->db->where('id_'.$table, $id);
			$query  = $this->db->get();
		}
		elseif($timestamp != null) {
			$this->db->from($table);
			if($table == "jurusan"){
              		$this->db->where('id_jurusan != 0');
              		}
			$this->db->where('timestamp>=', $timestamp);
			$this->db->where('timestamp<=', date('Y-m-d H:i:s'));
			$query  = $this->db->get();
		}
		else{
			$this->db->from($table);
			$this->db->where('timestamp>=', $timestamp);
			$this->db->where('timestamp<=', date('Y-m-d H:i:s'));
			$this->db->where('id_'.$table, $id);
			$query  = $this->db->get();
		}
		return $query;
		
	}

	private function getMaxAndCount($table){
		if($table == "jurusan"){
		   $this->db->where('id_jurusan != 0');
		}
		$jumlah = $this->db->count_all_results($table);
		$this->db->select_max("timestamp");
		$timestamp = $this->db->get($table)->row()->timestamp;
		return $hasil = array("jumlah" => $jumlah, "timestamp" => $timestamp );	
	}

	public function cekData_get(){
		$this->data['kategori'] = $this->getMaxAndCount("kategori");
		$this->data['jurusan'] = $this->getMaxAndCount("jurusan");
		$this->data['alur'] = $this->getMaxAndCount("alur");
		$this->data['gedung'] = $this->getMaxAndCount("gedung");
		$this->data['lantai'] = $this->getMaxAndCount("lantai");
		$this->data['ruang'] = $this->getMaxAndCount("ruang");
		$this->data['keterangan'] = $this->getMaxAndCount("keterangan");
		//baru diganti dibawah ini, sudah bener
		$this->data['berkas'] = $this->getMaxAndCount("berkas");
		$this->response($this->data, REST_Controller::HTTP_OK); 
	}

	public function isDataExist_get(){
		$table = $this->get('table');
		$id = $this->get('id');
		if ($table == null || $id == null) {
			$this->response([]); // HTTP 404 Not Found
		}else{
			if($table != 'user'){
				$ada = count($this->get_isi($table, $id, null)->row()) ? true : false;
				//$this->db->where("id_" .$table, $id);
                                $dikirim = array('table' => $table , 'id' => $id, 'ada' => $ada );
				$this->data['data'] = $dikirim;
                                //count($this->db->get($table)->row()) ? true : false ;
				$this->response($this->data, REST_Controller::HTTP_OK);
              }
             else{
                $this->response([]); // HTTP 404 Not Found
               }
		}
	}
	
	public function ambilDataTerbaru_get(){
		$ts = $this->get('timestamp');
		if ($ts != null) {
		$this->data['alur'] = $this->get_isi('alur',null,$ts)->result();
		$this->data['kategori'] = $this->get_isi('kategori',null,$ts)->result();
		$this->data['keterangan'] = $this->get_isi('keterangan',null,$ts)->result();
		$this->data['gedung'] = $this->get_isi('gedung',null,$ts)->result();
        	$this->data['lantai'] = $this->get_isi('lantai',null,$ts)->result();
        	$this->data['ruang'] = $this->get_isi('ruang',null,$ts)->result();
		$this->data['jurusan'] = $this->get_isi('jurusan',null,$ts)->result();
		$this->data['kategori'] = $this->get_isi('kategori',null,$ts)->result();
		$this->data['berkas'] = $this->get_isi('berkas',null,$ts)->result();
		$this->response($this->data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}else{
			$this->response([]); // HTTP 404 Not Found
		}
		
	}

	//method terbaru nanti malam tulis di server
	public function getNewData_get(){
		$table = $this->get('table');
		$ts = $this->get('timestamp');
		if($table != null && $ts != null){
		$this->data[$table] = $this->get_isi($table, null, $ts)->result();
		$this->response($this->data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}else{
			$this->response([]); // HTTP 404 Not Found
		}	
	}

	
}
