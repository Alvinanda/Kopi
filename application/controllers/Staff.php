<?php

 class Staff extends CI_Controller{
   function __construct(){
 		parent::__construct();
 		$this->load->helper(['url','date','number']);
 		$this->load->model('m_auth');
    $this->load->model('m_staff');
 		$this->load->library('form_validation');
    $this->load->library('session');
    $data['session'] = $this->session->userdata();
   	$this->load->view('layouts/header');
    $this->load->view('layouts/sidebar_staff', $data);
    $this->load->view('layouts/navbar', $data);
 	}

  function index(){
    $outlet= $this->session->userdata('outlet');
    $id_user= $this->session->userdata('id_user');
    $data['jadwal'] = $this->m_staff->lihatJadwalShiftUser($id_user);
    // $hari = $this->m_staff->lihatHari();
    $data['check_shift'] = check_shift($data['jadwal']);
    $this->load->view('staff/index', $data);
    $this->load->view('layouts/footer');
  }

  function lihatProfil($id_user){
		$where = array('id_user' => $id_user);
		$data['user'] = $this->m_staff->edit_data($where,'user')->result();
		$this->load->view('staff/v_lihatProfil', $data);
		$this->load->view('layouts/footer');
	}


  // start of Jadwal Shift

  function lihatJadwalShift(){
    $outlet= $this->session->userdata('outlet');
    $data['user'] = $this->m_staff->tampilPegawai($outlet)->result();
    $data['shift'] = $this->m_staff->tampilShift($outlet)->result();
    $data['jadwal'] = $this->m_staff->tampilJadwalShift()->result();
    $data['hari'] = $this->m_staff->lihatHari()->result();
    $this->load->view('staff/v_lihatJadwalShift',$data);
    $this->load->view('layouts/footer');
  }

  //End of Jadwal Shift

  //start of Absensi

  function checkIn($id_jadwal){
    $outlet   = $this->session->userdata('outlet');
    $id_user  = $this->session->userdata('id_user');
    $jadwal = $this->m_staff->lihatJadwalShiftUser($id_user);
    if(!check_shift($jadwal)){
      redirect('staff/index');
    }
    $checkin  = date('Y-m-d H:i:s');
    $status   = 'belum divalidasi';

    $data = array(
      'id_user' => $id_user,
      'id_outlet' => $outlet,
      'id_jadwal' => $id_jadwal,
      'checkin' => $checkin,
      'status' => $status
    );

    $this->m_staff->tambahdata($data,'absensi');
    redirect('staff/index');
  }

  function checkOut($id_jadwal){
    $outlet   = $this->session->userdata('outlet');
    $id_user  = $this->session->userdata('id_user');
    $checkout  = date('Y-m-d H:i:s');
    $status   = 'belum divalidasi';

    $data = array(
      'id_user' => $id_user,
      'id_outlet' => $outlet,
      'id_jadwal' => $id_jadwal,
      'checkout' => $checkout,
      'status' => $status
    );

    $where = array('id_jadwal' => $id_jadwal);
    $this->m_staff->update_data($where,$data,'absensi');
    redirect('staff/index');
  }

  function lihatValidasi(){
    $outlet= $this->session->userdata('outlet');
    $id_user= $this->session->userdata('id_user');
    $data['absensi'] = $this->m_staff->tampilAbsensi($outlet,$id_user);
    $this->load->view('staff/v_lihatValidasiAbsensi', $data);
    $this->load->view('layouts/footer');
  }

  //end of absensi

  //start of menu

  function lihatMenuBar(){
    $outlet= $this->session->userdata('outlet');
    $data['menu_bar'] = $this->m_staff->tampilMenuBar($outlet)->result();
    $this->load->view('staff/v_lihatMenuBar', $data);
    $this->load->view('layouts/footer');
  }

  function lihatMenuRetail(){
    $outlet= $this->session->userdata('outlet');
    $data['menu_retail'] = $this->m_staff->tampilMenuRetail($outlet)->result();
    $this->load->view('staff/v_lihatMenuRetail', $data);
    $this->load->view('layouts/footer');
  }

  function inputPenjualan(){
		$data['member'] = $this->m_staff->tampilStarMember()->result();
		// $data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
    $this->load->view('staff/v_tambah_penjualan',$data);
    $this->load->view('layouts/footer');
	}

  function tambahkanPenjualan(){
    $random = (rand(10,99));

    $id_outlet= $this->session->userdata('outlet');
    $id_penjualan = (int)(date("Ymd").$id_outlet. $random);
    // var_dump(is_int($id_penjualan)); die;
    $tanggal= date('Y-m-d H:i:s');
    $nama_pembeli= $this->input->post('nama_pembeli');
    $id_user= $this->session->userdata('id_user');
    $status= $this->input->post('status');
    $star_member= $this->input->post('star_member');


    $data = array(
      'id_penjualan' => $id_penjualan,
      'nama_pembeli' => $nama_pembeli,
      'tanggal' => $tanggal,
      'id_user' => $id_user,
      'status' => $status,
      'id_outlet' => $id_outlet,
      'star_member' => $star_member
    );
    $this->m_staff->tambahdata($data,'penjualan');
    redirect('staff/inputDetailPenjualan/'.$id_penjualan);
  }

  function inputDetailPenjualan($id_penjualan){
    $id_outlet= $this->session->userdata('outlet');
		$data['penjualan'] = $this->m_staff->tampilPenjualan($id_penjualan)->result();
    $data['detail_penjualan'] = $this->m_staff->tampilDetailPenjualan($id_penjualan)->result();
    $data['detail_penjualan2'] = $this->m_staff->tampilDetailPenjualan2($id_penjualan)->result();
    // var_dump($data['detail_penjualan2'] ); die;
    $data['menuBar'] = $this->m_staff->tampilMenuBar($id_outlet)->result();
    $data['menuRetail'] = $this->m_staff->tampilMenuRetail($id_outlet)->result();
		// $data['penyelenggara'] = $this->m_admin->tampilPenyelenggara()->result();
    $this->load->view('staff/v_tambah_detail_penjualan',$data);
    $this->load->view('layouts/footer');
	}

  function tambahkanDetailPenjualan(){
    $id_penjualan = $this->input->post('id_penjualan');
    $id_menu = $this->input->post('id_menu');
    $jumlah= $this->input->post('jumlah');
    $id_outlet= $this->session->userdata('outlet');


    $data = array(
      'id_penjualan' => $id_penjualan,
      'id_menu' => $id_menu,
      'jumlah' => $jumlah,
      'id_outlet' => $id_outlet
    );
    $this->m_staff->tambahdata($data,'detail_penjualan');
    redirect('staff/inputDetailPenjualan/'.$id_penjualan);
  }

  function hapus_detail_penjualan($id_penjualan,$id){
		$where = array('id_penjualan' => $id_penjualan, 'id'=>$id);
		$this->m_staff->hapus_data($where,'detail_penjualan');
		$this->session->set_flashdata('notif', "Ruangan berhasil dihapus");
		redirect('staff/inputDetailPenjualan/'.$id_penjualan);
	}


 }
