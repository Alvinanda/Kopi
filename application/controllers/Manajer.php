<?php

 class Manajer extends CI_Controller{
   function __construct(){
 		parent::__construct();
 		$this->load->helper(['url','date']);
 		$this->load->model('m_auth');
    $this->load->model('m_manajer');
 		$this->load->library('form_validation');
    $this->load->library('session');
    $data['session'] = $this->session->userdata();
   	$this->load->view('layouts/header');
    $this->load->view('layouts/sidebar_manajer', $data);
    $this->load->view('layouts/navbar', $data);
 	}

  function index(){
    $outlet= $this->session->userdata('outlet');
    $id_user= $this->session->userdata('id_user');
    $data['jadwal'] = $this->m_manajer->lihatJadwalShiftUser($id_user);
    //ada shift hari ini
    $data['check_shift'] = $this->m_manajer->checkJadwalShiftHariIni($id_user, date('l'));
    if(!empty($data['check_shift'])){
      //ambil data apakah absen hari ini sudah check in atau belum
        $absen = $this->m_manajer->checkAbsen($id_user, $data['check_shift'][0]->id_jadwal, date('Y-m-d'));
        $data['checkin'] = (!empty($absen[0]->checkin) ? true : false);
        $data['jam_checkin'] = check_shift($data['jadwal']);
        $data['checkout'] = (!empty($absen[0]->checkout) ? true : false);
        $data['jam_checkout'] = !check_shift_selesai($data['jadwal']);
        $data['check_shift'] = true;
    }else{
      $data['checkin'] = false;
      $data['checkout'] = false;
      $data['jam_checkin'] = false;
      $data['jam_checkout'] = false;
      $data['check_shift'] = false;
    }
    $this->load->view('manajer/index', $data);
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

  //start of Shift
  function tambahShift(){
    $this->load->view('manajer/v_tambahShift' );
    $this->load->view('layouts/footer');
  }

  function tambahkanShift(){
    $kode_shift= $this->input->post('kode_shift');
    $jam_masuk= $this->input->post('jam_masuk');
    $jam_selesai= $this->input->post('jam_selesai');
    $id_outlet= $this->session->userdata('outlet');


    $data = array(
      'kode_shift' => $kode_shift,
      'jam_masuk' => $jam_masuk,
      'jam_selesai' => $jam_selesai,
      'outlet' => $id_outlet
    );
    $this->m_manajer->tambahdata($data,'shift');
    redirect('manajer/lihatShift');
  }

  function lihatShift(){
    $outlet= $this->session->userdata('outlet');
    $data['shift'] = $this->m_manajer->tampilShift($outlet)->result();
    $this->load->view('manajer/v_lihatShift', $data);
    $this->load->view('layouts/footer');
  }

  function updateShift($id_shift){
    $where = array('id_shift' => $id_shift);
    $data['bahan_baku'] = $this->m_manajer->edit_data($where,'shift')->result();
    $this->load->view('manajer/v_editShift', $data);
    $this->load->view('layouts/footer');
  }

  function editShift(){
    $id_shift = $this->input->post('id_shift');
    $kode_shift= $this->input->post('kode_shift');
    $jam_masuk= $this->input->post('jam_masuk');
    $jam_selesai= $this->input->post('jam_selesai');
    $id_outlet= $this->session->userdata('outlet');

    $data = array(
      'kode_shift' => $kode_shift,
      'jam_masuk' => $jam_masuk,
      'jam_selesai' => $jam_selesai,
      'outlet' => $id_outlet
    );

    $where = array('id_shift' => $id_shift);
    $this->m_manajer->update_data($where,$data,'shift');
    redirect('manajer/lihatShift');
  }

  function hapusShift($id_shift){
    $where = array('id_shift' => $id_shift);
    $this->m_manajer->hapus_data($where,'shift');
    redirect('manajer/lihatShift');
  }



 // end of Shift


  // start of Jadwal Shift
  function tambahJadwalShift(){
    $outlet = $this->session->userdata('outlet');
    $data['shift'] = $this->m_manajer->tampilShift($outlet)->result();
    $data['hari'] = $this->m_manajer->lihatHari($outlet)->result();
    $data['pegawai'] = $this->m_manajer->tampilPegawai($outlet)->result();
    $this->load->view('manajer/v_tambahJadwalShift', $data);
    $this->load->view('layouts/footer');
  }

  function tambahkanjadwalShift(){
    $id_user= $this->input->post('id_user');
    $kode_shift= $this->input->post('kode_shift');
    $hari= $this->input->post('hari');
    $id_outlet= $this->session->userdata('outlet');


    $data = array(
      'id_user' => $id_user,
      'id_outlet' => $id_outlet,
      'kode_shift' => $kode_shift,
      'hari' => $hari

    );
    $this->m_manajer->tambahdata($data,'jadwal_shift');
    redirect('manajer/lihatJadwalShift');
  }

  function lihatJadwalShift(){
    $outlet= $this->session->userdata('outlet');
    $data['user'] = $this->m_manajer->tampilPegawai($outlet)->result();
    $data['shift'] = $this->m_manajer->tampilShift($outlet)->result();
    $data['jadwal'] = $this->m_manajer->tampilJadwalShift()->result();
    $data['hari'] = $this->m_manajer->lihatHari()->result();
    $this->load->view('manajer/v_lihatJadwalShift',$data);
    $this->load->view('layouts/footer');
  }

  function updateJadwalShift($id_jadwal){
    $outlet= $this->session->userdata('outlet');
    $where = array('id_jadwal' => $id_jadwal);
    $data['jadwal'] = $this->m_manajer->edit_data($where,'jadwal_shift')->result();
    $data['shift'] = $this->m_manajer->tampilShift($outlet)->result();
    $data['hari'] = $this->m_manajer->lihatHari($outlet)->result();
    $data['pegawai'] = $this->m_manajer->tampilPegawai($outlet)->result();
    $this->load->view('manajer/v_editJadwalShift', $data);
    $this->load->view('layouts/footer');
  }

  function editJadwalShift(){
    $id_jadwal = $this->input->post('id_jadwal');
    $id_user= $this->input->post('id_user');
    $kode_shift= $this->input->post('kode_shift');
    $hari= $this->input->post('hari');
    $id_outlet= $this->session->userdata('outlet');

    $data = array(
      'id_user' => $id_user,
      'id_outlet' => $id_outlet,
      'kode_shift' => $kode_shift,
      'hari' => $hari
    );

    $where = array('id_jadwal' => $id_jadwal);
    $this->m_manajer->update_data($where,$data,'jadwal_shift');
    redirect('manajer/lihatJadwalShift');
  }

  function hapusJadwalShift($id_jadwal){
    $where = array('id_jadwal' => $id_jadwal);
    $this->m_manajer->hapus_data($where,'jadwal_shift');
    redirect('manajer/lihatJadwalShift');
  }

  //End of Jadwal Shift

  //start of Absensi

  function lihatAbsen(){
    $outlet= $this->session->userdata('outlet');
    $id_user= $this->session->userdata('id_user');
    $data['jadwal'] = $this->m_manajer->lihatJadwalShiftUser($id_user);

    // echo "<pre>";
    // var_dump($data); die;
    // echo "</pre>";
    $this->load->view('manajer/index',$data);
    $this->load->view('layouts/footer');
  }

  function checkIn($id_jadwal){
    $outlet   = $this->session->userdata('outlet');
    $id_user  = $this->session->userdata('id_user');
    $jadwal = $this->m_manajer->checkJadwalShiftHariIni($id_user, date('l'));
    if(!check_shift($jadwal)){
      redirect('manajer/index');
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

    $this->m_manajer->tambahdata($data,'absensi');
    redirect('manajer/index');
  }

  function checkOut($id_jadwal){
    $outlet   = $this->session->userdata('outlet');
    $id_user  = $this->session->userdata('id_user');

    $check_shift= $this->m_manajer->checkJadwalShiftHariIni($id_user, date('l'));
    $absen = $this->m_manajer->checkAbsen($id_user, $check_shift[0]->id_jadwal, date('l'));

    if(!check_shift($check_shift) && !empty($absen) && !check_shift_selesai($check_shift)){
      redirect('manajer/index');
    }
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
    $this->m_manajer->update_data($where,$data,'absensi');
    redirect('manajer/index');
  }

  function lihatValidasi(){
    $outlet= $this->session->userdata('outlet');
    $data['absensi'] = $this->m_manajer->tampilAbsensi($outlet);
    $this->load->view('manajer/v_lihatValidasiAbsensi', $data);
    $this->load->view('layouts/footer');
  }

  function validasiAbsensi($id_absen){
    $outlet   = $this->session->userdata('outlet');
    $status   = 'sudah divalidasi';

    $data = array(
      'status' => $status
    );

    $where = array('id_absen' => $id_absen);
    $this->m_manajer->update_data($where,$data,'absensi');
    redirect('manajer/lihatValidasi');
  }

  //end of absensi

  //start of menu

  function lihatMenuBar(){
    $outlet= $this->session->userdata('outlet');
    $data['menu_bar'] = $this->m_manajer->tampilMenuBar($outlet)->result();
    $this->load->view('manajer/v_lihatMenuBar', $data);
    $this->load->view('layouts/footer');
  }

  function lihatMenuRetail(){
    $outlet= $this->session->userdata('outlet');
    $data['menu_retail'] = $this->m_manajer->tampilMenuRetail($outlet)->result();
    $this->load->view('manajer/v_lihatMenuRetail', $data);
    $this->load->view('layouts/footer');
  }

  //end of menuBar

  //start of Laporan

  function lihatPenjualanHariIni(){
    $outlet= $this->session->userdata('outlet');
    $today = date('l');
    $data['penjualan'] = $this->m_manajer->tampilPenjualanHariIni($today,$outlet)->result();
    // $data['detail_penjualan'] = $this->m_manajer->tampilDetailPenjualan($id_penjualan)->result();
    $data['total'] = $this->m_manajer->tampilTotallPenjualan($outlet)->result();

  //  $data['menuBar'] = $this->m_owner->tampilMenuBar($id_outlet)->result();
  //  $data['menuRetail'] = $this->m_owner->tampilMenuRetail($id_outlet)->result();
    $this->load->view('manajer/v_lihatPenjualanHariIni',$data);
    $this->load->view('layouts/footer');
  }

  function lihatDetailPenjualan($id_penjualan){
    $id_outlet= $this->session->userdata('outlet');
    $today = date('l');
		$data['penjualan'] = $this->m_manajer->tampilPenjualan($id_penjualan)->result();
    $data['detail_penjualan'] = $this->m_manajer->tampilDetailPenjualan($id_penjualan)->result();
    $data['detail_penjualan2'] = $this->m_manajer->tampilDetailPenjualan2($id_penjualan)->result();

    $data['menuBar'] = $this->m_manajer->tampilMenuBar($id_outlet)->result();
    $data['menuRetail'] = $this->m_manajer->tampilMenuRetail($id_outlet)->result();
    $this->load->view('manajer/v_lihatDetailPenjualan',$data);
    $this->load->view('layouts/footer');
	}

  //end of Laporan


 }
