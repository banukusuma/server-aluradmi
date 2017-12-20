<?php

/**
* 
*/
class User_m extends MY_Model
{
	protected $_table = 'user';
	protected $primary_key = 'id_user';
	var $column_order = array(null,'username',null); //set column field database for datatable orderable
    var $column_search = array('username'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id_user' => 'desc'); // default order 
	  public $validate = array(
        array( 'field' => 'username', 
               'label' => 'Username',
               'rules' => 'required|trim' ),
        array( 'field' => 'password',
               'label' => 'Password',
               'rules' => 'required|trim' ),
        
    );
	    public $validate_admin = array(
        array( 'field' => 'username', 
               'label' => 'Username',
               'rules' => 'required|trim|alpha_numeric' ),
        array( 'field' => 'password',
               'label' => 'Password',
               'rules' => 'required|trim|matches[password_confirm]' ),
         array( 'field' => 'password_confirm',
               'label' => 'Password_confirm',
               'rules' => 'required|trim|matches[password]' )
        
    );

    public $validate_ganti = array(
        array( 'field' => 'id', 
               'label' => 'ID',
               'rules' => 'required' ),
        array( 'field' => 'old_password',
               'label' => 'Password',
               'rules' => 'required|trim|callback_cek_pswd' ),
        array( 'field' => 'new_password',
               'label' => 'New Password',
               'rules' => 'required|trim|matches[new_password_confirm]'),
         array( 'field' => 'new_password_confirm',
               'label' => 'New Password Confirm',
               'rules' => 'required|trim|matches[new_password]' )
        
    );

	function __construct()
	{
		parent:: __construct();
	}
	 private function _get_datatables_query()
    {
        $this->db->select('u.id_user, u.username, u.level, j.nama as nama_jurusan'); 
        $this->db->from('user as u');
        $this->db->join('jurusan as j', 'u.id_jurusan = j.id_jurusan');
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

	public function login(){
		$user = $this->get_by(array('username' =>  $this->input->post('username')
			));
		if (count($user)) {
			if ($this->password_cek($this->input->post('password'), 
			$user->password) == true) {
			$data = array(
				'username' => $user->username,
				'id_user' => $user->id_user,
                'level' => $user->level,
                'id_jurusan' => $user->id_jurusan,
				'loggedin' => TRUE
				);
			$this->session->set_userdata($data);
			return TRUE;
		      }
    		else {
    			return FALSE;
    		}
		}
		else{
			return FALSE;
		}
	}

	public function loggedin(){
		return (bool) $this->session->userdata('loggedin');
	}

	public function logout(){
		return  $this->session->sess_destroy();
	}
	public function lihat(){
		return $this->get_all();
	}

	public function password_hashing($string){
		return password_hash($string, PASSWORD_DEFAULT, array('cost' => 10));
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}
	public function password_cek($password,$hash){
		return password_verify($password, $hash);
	}

	public function edit($id, $data){
		$this->db->where('id_user', $id);
		return $this->db->update($this->_table, $data);
	}

     function pilih($table, $where = NULL){
        $sql = "select * from $table $where";
         $query = $this->db->query($sql);
         return $query->result();
    }

    public function cek_level(){
        if ($this->session->userdata('level') != "1") {
                return FALSE;
        }
        else{   
            return TRUE;
        }
    }

    function ganti_password(){
        $user = $this->get_by(array('id_user' => $this->input->post('id')));

        if (count($user)) {
            if ($this->password_cek($this->input->post('old_password'), 
                    $user->password) == true) {
                    $data_baru = array('password' => $this->password_hashing($this->input->post('new_password')));
                    if (count($this->edit($this->input->post('id'), $data_baru))) {
                        return TRUE;
                    }
                    
              }
            else {
                return FALSE;
            } 
        }
        else{
            return FALSE;
        }
    }

	}