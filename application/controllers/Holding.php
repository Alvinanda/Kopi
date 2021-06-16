<?php

class Holding extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_auth');
    $this->load->model('m_holding');
		$this->load->library('form_validation');
    $data['session'] = $this->session->userdata();
  	// $this->load->view('layouts/header2');
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar', $data);
    $this->load->view('layouts/navbar', $data);
	}

  function index(){

    $this->load->view('holding/index');
    $this->load->view('layouts/footer');
	}

  function tambahUser(){
		$data['outlet'] = $this->m_holding->tampilOutlet()->result();
    $this->load->view('holding/v_tambahUser',$data );
    $this->load->view('layouts/footer');

  }

  function lihatUser(){
    $data['user'] = $this->m_holding->tampilUser()->result();
    $this->load->view('holding/v_lihatUser', $data);
    $this->load->view('layouts/footer');
  }

  function tambahkanUser(){
    $nama= $this->input->post('nama');
    $password= $this->input->post('password');
    $alamat= $this->input->post('alamat');
    $kelamin= $this->input->post('kelamin');
		$nomor_telepon= $this->input->post('nomor_telepon');
    $tangga_lahir= $this->input->post('tanggal_lahir');
    $status= $this->input->post('status');
    $jabatan= $this->input->post('jabatan');
    $outlet= $this->input->post('outlet');


    $data = array(
      'nama' => $nama,
      'password' => $password,
      'alamat' => $alamat,
      'kelamin' => $kelamin,
			'nomor_telepon' => $nomor_telepon,
      'tanggal_lahir' => $tangga_lahir,
      'status' => $status,
      'jabatan' => $jabatan,
      'outlet' => $outlet
    );
    $this->m_holding->tambahdata($data,'user');
    $this->session->set_flashdata('notif',"User berhasil ditambahkan");
    redirect('holding/lihatUser');
  }

	function updateUser($id_user){
		$where = array('id_user' => $id_user);
		$data['user'] = $this->m_holding->edit_data($where,'user')->result();
		$this->load->view('holding/v_editUser', $data);
    $this->load->view('layouts/footer');
	}

	function editUser(){
		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$alamat = $this->input->post('alamat');
		$kelamin = $this->input->post('kelamin');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$nomor_telepon = $this->input->post('nomor_telepon');
		$status = $this->input->post('status');
		$jabatan = $this->input->post('jabatan');
		$outlet = $this->input->post('outlet');

		$data = array(
			'nama' => $nama,
			'password' => $password,
			'alamat' => $alamat,
			'kelamin' => $kelamin,
			'tanggal_lahir' => $tanggal_lahir,
			'nomor_telepon' => $nomor_telepon,
			'status' => $status,
			'jabatan' => $jabatan,
			'outlet' => $outlet
		);

		$where = array('id_user' => $id_user);
		$this->m_holding->update_data($where,$data,'user');
		$this->session->set_flashdata('notif', "Data user $id_user berhasil di Update");
		redirect('holding/lihatUser');
	}

	function hapusUser($id_user){
		$where = array('id_user' => $id_user);
		$this->m_holding->hapus_data($where,'user');
		$this->session->set_flashdata('notif', "Data User $id_user berhasil dihapus");
		redirect('holding/lihatUser');
	}

	function tambahOutlet(){
		$this->load->view('holding/v_tambahOutlet');
		$this->load->view('layouts/footer');

	}

	function tambahkanOutlet(){
		$id_outlet= $this->input->post('id_outlet');
		$nama= $this->input->post('nama');
		$alamat= $this->input->post('alamat');
		$tanggal_berdiri= $this->input->post('tanggal_berdiri');
		$status= $this->input->post('status');
		$jam_buka= $this->input->post('jam_buka');
		$jam_tutup= $this->input->post('jam_tutup');

		$data = array(
			'id_outlet' => $id_outlet,
			'nama' => $nama,
			'alamat' => $alamat,
			'tanggal_berdiri' => $tanggal_berdiri,
			'status' => $status,
			'jam_buka' => $jam_buka,
			'jam_tutup' => $jam_tutup

		);

		$this->m_holding->tambahdata($data,'outlet');
		$this->session->set_flashdata('notif',"User berhasil ditambahkan");
		redirect('holding/lihatOutlet');
	}

	function lihatOutlet(){
    $data['outlet'] = $this->m_holding->tampilOutlet()->result();
    $this->load->view('holding/v_lihatOutlet', $data);
    $this->load->view('layouts/footer');
  }

	function updateOutlet($id_outlet){
		$where = array('id_outlet' => $id_outlet);
		$data['outlet'] = $this->m_holding->edit_data($where,'outlet')->result();
		$this->load->view('holding/v_editOutlet', $data);
    $this->load->view('layouts/footer');
	}

	function editOutlet(){
		$id_outlet= $this->input->post('id_outlet');
		$nama= $this->input->post('nama');
		$alamat= $this->input->post('alamat');
		$tanggal_berdiri= $this->input->post('tanggal_berdiri');
		$status= $this->input->post('status');
		$jam_buka= $this->input->post('jam_buka');
		$jam_tutup= $this->input->post('jam_tutup');

			$data = array(
				'nama' => $nama,
				'alamat' => $alamat,
				'tanggal_berdiri' => $tanggal_berdiri,
				'status' => $status,
				'jam_buka' => $jam_buka,
				'jam_tutup' => $jam_tutup

			);

		$where = array('id_outlet' => $id_outlet);
		$this->m_holding->update_data($where,$data,'outlet');
		$this->session->set_flashdata('notif', "Data user $id_outlet berhasil di Update");
		redirect('holding/lihatOutlet');
	}

	function hapusOutlet($id_outlet){
		$where = array('id_outlet' => $id_outlet);
		$this->m_holding->hapus_data($where,'outlet');
		$this->session->set_flashdata('notif', "Data User $id_outlet berhasil dihapus");
		redirect('holding/lihatOutlet');
	}

	function lihatProfil($id_user){
		$where = array('id_user' => $id_user);
		$data['user'] = $this->m_holding->edit_data($where,'user')->result();
		$this->load->view('holding/v_lihatProfil', $data);
		$this->load->view('layouts/footer');
	}

}
