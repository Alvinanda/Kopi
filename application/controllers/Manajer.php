<<?php

 class Manajer extends CI_Controller{
   function __construct(){
 		parent::__construct();
 		$this->load->helper('url');
 		$this->load->model('m_auth');
    $this->load->model('m_manajer');
 		$this->load->library('form_validation');
    $this->load->library('session');
    $data['session'] = $this->session->userdata();
   	//$this->load->view('layouts/header');
    //$this->load->view('layouts/sidebar_manajer', $data);
  //  $this->load->view('layouts/navbar', $data);

 	}

  function index(){
    $this->load->view('manajer/index');
    $this->load->view('layouts/footer');
  }

  function lihatProfil($id_user){
		$where = array('id_user' => $id_user);
		$data['user'] = $this->m_manajer->edit_data($where,'user')->result();
		$this->load->view('manajer/v_lihatProfil', $data);
		$this->load->view('layouts/footer');
	}

  //start of star member
  function tambahStarMember(){
    $outlet= $this->session->userdata('outlet');
    $data['outlet'] = $this->m_manajer->tampilStarMember($outlet)->result();
    $this->load->view('manajer/v_tambahStarMember',$data );
    $this->load->view('layouts/footer');

  }

  function tambahkanStarMember(){
    $nama= $this->input->post('nama');
    $password= "*********";
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
    $this->m_manajer->tambahdata($data,'user');
    $this->session->set_flashdata('notif',"User berhasil ditambahkan");
    redirect('manajer/lihatStarMember');
  }

  function lihatStarMember(){
    $outlet= $this->session->userdata('outlet');
    $data['star_member'] = $this->m_manajer->tampilStarMember($outlet)->result();

    $this->load->view('manajer/v_lihatStarMember', $data);
    $this->load->view('layouts/footer');
  }

  function updateStarMember($id_user){
		$where = array('id_user' => $id_user);
		$data['star_member'] = $this->m_manajer->edit_data($where,'user')->result();
		$this->load->view('manajer/v_editStarMember', $data);
    $this->load->view('layouts/footer');
	}

  function editStarMember0(){
		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$kelamin = $this->input->post('kelamin');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$nomor_telepon = $this->input->post('nomor_telepon');
		$status = $this->input->post('status');
		$jabatan = $this->input->post('jabatan');
		$outlet = $this->input->post('outlet');

		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'kelamin' => $kelamin,
			'tanggal_lahir' => $tanggal_lahir,
			'nomor_telepon' => $nomor_telepon,
			'status' => $status,
			'jabatan' => $jabatan,
			'outlet' => $outlet
		);

		$where = array('id_user' => $id_user);
		$this->m_manajer->update_data($where,$data,'user');
		$this->session->set_flashdata('notif', "Data user $id_user berhasil di Update");
		redirect('manajer/lihatStarMember');
	}

  function hapusStarMember($id_user){
		$where = array('id_user' => $id_user);
		$this->m_manajer->hapus_data($where,'user');
		$this->session->set_flashdata('notif', "Data User $id_user berhasil dihapus");
		redirect('manajer/lihatStarMember');
	}

  //end of Star Member

  // Start of Bahan Baku

  function tambahBahanBaku(){
    $this->load->view('manajer/v_tambahBahanBaku');
    $this->load->view('layouts/footer');

  }

  function tambahkanBahanBaku(){
    $nama= $this->input->post('nama');
    $jumlah= $this->input->post('jumlah');
    $keterangan= $this->input->post('keterangan');
    $outlet= $this->session->userdata('outlet');



    $data = array(
      'nama' => $nama,
      'jumlah' => $jumlah,
      'keterangan' => $keterangan,
      'outlet' => $outlet
    );
    $this->m_manajer->tambahdata($data,'bahan_baku');
    redirect('manajer/lihatBahanBaku');
  }

  function lihatBahanBaku(){
    $outlet= $this->session->userdata('outlet');
    $data['bahan_baku'] = $this->m_manajer->tampilBahanBaku($outlet)->result();
    $this->load->view('manajer/v_lihatBahanBaku', $data);
    $this->load->view('layouts/footer');
  }

  function updateBahanbaku($id_bahan){
    $where = array('id_bahan' => $id_bahan);
    $data['bahan_baku'] = $this->m_manajer->edit_data($where,'bahan_baku')->result();
    $this->load->view('manajer/v_editBahanBaku', $data);
    $this->load->view('layouts/footer');
  }

  function editBahanBaku(){
    $id_bahan = $this->input->post('id_bahan');
    $nama= $this->input->post('nama');
    $jumlah= $this->input->post('jumlah');
    $keterangan= $this->input->post('keterangan');
    $outlet= $this->session->userdata('outlet');

    $data = array(
      'nama' => $nama,
      'jumlah' => $jumlah,
      'keterangan' => $keterangan,
      'outlet' => $outlet
    );

    $where = array('id_bahan' => $id_bahan);
    $this->m_manajer->update_data($where,$data,'bahan_baku');
    redirect('manajer/lihatBahanBaku');
  }

  function hapusBahanBaku($id_bahan){
    $where = array('id_bahan' => $id_bahan);
    $this->m_manajer->hapus_data($where,'bahan_baku');
    redirect('manajer/lihatBahanBaku');
  }
  // end of Bahan Baku

  // start of Jadwal Shift
  function tambahJadwalShift(){
    $outlet = $this->session->userdata('outlet');
    $data['pegawai'] = $this->m_manajer->tampilPegawai($outlet)->result();
    $this->load->view('manajer/v_tambahJadwalShift', $data);
    $this->load->view('layouts/footer');
  }

  function tambahkanjadwalShift(){
    $id_user= $this->input->post('id_user');
    $jam_masuk= $this->input->post('jam_masuk');
    $jam_selesai= $this->input->post('jam_selesai');
    $id_outlet= $this->session->userdata('outlet');


    $data = array(
      'id_user' => $id_user,
      'jam_masuk' => $jam_masuk,
      'jam_selesai' => $jam_selesai,
      'id_outlet' => $id_outlet
    );
    $this->m_manajer->tambahdata($data,'jadwal_shift');
    redirect('manajer/lihatJadwalShift');
  }

  function lihatJadwalShift(){
    $outlet= $this->session->userdata('outlet');
    $data['bahan_baku'] = $this->m_manajer->tampilBahanBaku($outlet)->result();
    $this->load->view('manajer/fullcalendar');
    $this->load->view('layouts/footer');
  }


 }
