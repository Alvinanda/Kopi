<?php

class M_auth extends CI_Model{

	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}
	//alvin
	public function cek_user_holding(){

		$u = $this->input->post('username');
		$p = $this->input->post('password');

		$query = $this->db->select('x.id_user, x.jabatan, x.nama, x.status as keadaan, x.outlet, s.status, s.nama as nama_outlet')
							->where('x.nama', $u)
						  ->where('x.password', $p)
							->join('outlet s', 's.id_outlet = x.outlet')
						  ->get('user x');

		if($this->db->affected_rows() > 0){

			$data_login = $query->row();
			// echo "<pre>";
			// var_dump($data_login); die;
			// echo "</pre>";
			$data_session = array(
									'logged_in' => TRUE,
									'id_user' => $data_login->id_user,
									'username' => $data_login->nama,
									'jabatan' => $data_login->jabatan,
									'status' => $data_login->keadaan,
									'status_outlet' => $data_login->status,
									'nama_outlet' => $data_login->nama_outlet,
									'outlet' => $data_login->outlet //alvin
								);
			$this->session->set_userdata($data_session);
			return TRUE;

		} else{
			return FALSE;
		}
	}

	public function cek_user_pegawai(){
		$u = $this->input->post('username');
		$p = $this->input->post('password');

		$query = $this->db->where('NIP', $u)
						  ->where('password', $p)
						  ->get('pegawai');
		if($this->db->affected_rows() > 0){

			$data_login = $query->row();

			$data_session = array(
									'logged_in' => TRUE,
									'id_login' => $data_login->NIP,
									'nama_login' => $data_login->Nama,
									'Status' => $data_login->Status,
									'stat' => $data_login->stat
								);
			$this->session->set_userdata($data_session);
			return TRUE;

		} else{
			return FALSE;
		}
    }

    public function cek_user_mahasiswa(){
		$u = $this->input->post('username');
		$p = $this->input->post('password');

		$query = $this->db->where('nim', $u)
						  ->where('password', $p)
						  ->get('mahasiswa');
		if($this->db->affected_rows() > 0){

			$data_login = $query->row();

			$data_session = array(
									'logged_in' => TRUE,
									'id_login' => $data_login->nim,
									'status' => 'mahasiswa',
									'nama_login' => $data_login->nama
								);
			$this->session->set_userdata($data_session);
			return TRUE;

		} else{
			return FALSE;
		}
	}

	// public function get_peminjaman_pending($id_peminjam){
	// 	$this->db->select('*');
	// 	$this->db->from('peminjaman');
	// 	$this->db->where('id_peminjam',$id_peminjam);
	// 	$this->db->where('status_peminjaman', 'pending');
	// 	$query=$this->db->get();
	// 	return $query->result();
	// }


	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function update_password($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

}
