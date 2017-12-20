<?php 
/**
* 
*/
class User extends Super_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		
	}
	function list_data(){
		$list = $this->user_m->get_datatables();
		foreach ($list as $usr) {
			$row = array($usr->id_user, $usr->username, $usr->level, $usr->nama_jurusan, 
				'<a class="btn btn-sm btn-success" href="user/edit/'.$usr->id_user.'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_user('."'".$usr->id_user."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
				);
			
             $this->data[] = $row;
		}
		unset($usr);
		$output = array(
					'draw' => $_POST['draw'], 
					'recordsTotal' => $this->user_m->count_all(),
					"recordsFiltered" => $this->user_m->count_filtered(),
                    "data" => $this->data,

			);
		echo json_encode($output);
	}

	function index(){
		$this->data['meta_title'] ='Data User';
		$this->data['jurusan'] = $this->user_m->pilih('jurusan');
		$this->data['subview'] = 'user/lihat';
		$this->load->view('_layout_main', $this->data);
	}

	function ajax_tambah(){
		$this->data['success'] = false;
		$this->data['ada'] = false;
		$this->data['messages'] = array();
		$cek = array('username' => $this->input->post('username'));
		$isi = array('username' => $this->input->post('username'),
					'password' => $this->user_m->password_hashing($this->input->post('password')
						),
					'level' => $this->input->post('level'),
					'id_jurusan' => $this->input->post('jurusan')
					);
		$validate = $this->user_m->validate_admin;
		$this->form_validation->set_rules($validate);
		if ($this->form_validation->run()) {
			if (!count($this->user_m->get_by($cek))) {
				if ($this->user_m->tambah($isi)) {
				$this->data['success'] = true;		
				}
			}
			else{
			$this->data['ada'] = true;
			}
			
		}
		else {
				foreach ($_POST as $key => $value) {
					$this->data['messages'][$key] = form_error($key);
				}
			}
		echo json_encode($this->data);
	}

	function edit($id){
		$this->data['meta_title'] ='Edit User';
		$this->data['user'] = $this->user_m->get($id);		
		$this->data['subview'] = 'user/edit';
		$this->load->view('_layout_main', $this->data);
	}

	function delete($id)
    {
        if (count($this->user_m->delete($id))) {
			 echo json_encode(array("status" => true));
		}
		else{
			echo json_encode(array("status" => false));
		}
       
    }
    function update(){
		$this->data['success'] = false;
		$this->data['messages'] = array();
		$id = $this->input->post('id');
		$pswd = $this->user_m->password_hashing($this->input->post('password'));
		$isi = array('username' => $this->input->post('username'),
			'password' => $pswd);
		$validate = $this->user_m->validate_admin;
		$this->form_validation->set_rules($validate);
		if ($this->form_validation->run()) {
			if (count($this->user_m->edit($id, $isi))) {
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
		$this->data['meta_title'] ='Tambah User';	
		$this->data['subview'] = 'user/tambah';
		$this->load->view('_layout_main', $this->data);
	}

	function ajax_jurusan(){
		$id = $this->input->post('level');
		if ($id == 1) {
			$this->data['jurusan'] = $this->user_m->pilih('jurusan', 'where id_jurusan=0');
		}
		else{
			$this->data['jurusan'] = $this->user_m->pilih('jurusan', 'where id_jurusan!= 0 ');
		}
		echo json_encode($this->data);
		
	}

}