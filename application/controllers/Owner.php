<?php

 class Owner extends CI_Controller{

   function __construct(){
 		parent::__construct();
 		$this->load->helper('url');
 		$this->load->model('m_auth');
    $this->load->model('m_owner');
 		$this->load->library('form_validation');
    $this->load->library('session');
    $data['session'] = $this->session->userdata();
   	$this->load->view('layouts/header');
    $this->load->view('layouts/sidebar_owner', $data);
    $this->load->view('layouts/navbar', $data);

 	}

  function index(){
    $outlet= $this->session->userdata('outlet');
    $data['menuTerjual'] = $this->m_owner->tampilItemTerjualPerhari($outlet)->result();
    $data['total'] = $this->m_owner->tampilTotallPenjualanHariIni($outlet)->result();
    $data['total2'] = $this->m_owner->tampilTotallPenjualanHariIni2($outlet)->result();
    $data['totalBulan'] = $this->m_owner->tampilTotallPenjualanBulanIni($outlet)->result();
    $data['totalBulan2'] = $this->m_owner->tampilTotallPenjualanBulanIni2($outlet)->result();
    $this->load->view('owner/index', $data);
    $this->load->view('layouts/footer');
  }

  function lihatProfil($id_user){
		$where = array('id_user' => $id_user);
		$data['user'] = $this->m_owner->edit_data($where,'user')->result();
		$this->load->view('owner/v_lihatProfil', $data);
		$this->load->view('layouts/footer');
	}

//start of pegawai
  function tambahPegawai(){
    $outlet= $this->session->userdata('outlet');
		$data['outlet'] = $this->m_owner->tampilPegawai($outlet)->result();
    $this->load->view('owner/v_tambahPegawai',$data );
    $this->load->view('layouts/footer');

  }

  function tambahkanPegawai(){
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
    $this->m_owner->tambahdata($data,'user');
    $this->session->set_flashdata('notif',"User berhasil ditambahkan");
    redirect('owner/lihatPegawai');
  }

  function lihatPegawai(){
    $outlet= $this->session->userdata('outlet');
    $data['user'] = $this->m_owner->tampilPegawai($outlet)->result();

    $this->load->view('owner/v_lihatPegawai', $data);
    $this->load->view('layouts/footer');
  }

  function updatePegawai($id_user){
		$where = array('id_user' => $id_user);
		$data['user'] = $this->m_owner->edit_data($where,'user')->result();
		$this->load->view('owner/v_editPegawai', $data);
    $this->load->view('layouts/footer');
	}

  function editPegawai(){
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
		$this->m_owner->update_data($where,$data,'user');
		$this->session->set_flashdata('notif', "Data user $id_user berhasil di Update");
		redirect('owner/lihatPegawai');
	}

  function hapusPegawai($id_user){
		$where = array('id_user' => $id_user);
		$this->m_owner->hapus_data($where,'user');
		$this->session->set_flashdata('notif', "Data User $id_user berhasil dihapus");
		redirect('owner/lihatPegawai');
	}
//end of pegawai

//start of pengeluaran sekali
    function tambahPengeluaran(){
      $this->load->view('owner/v_tambahPengeluaran');
      $this->load->view('layouts/footer');

    }

    function tambahkanPengeluaran(){
      $nama= $this->input->post('nama');
      $total= $this->input->post('total');
      $keterangan= $this->input->post('keterangan');
      $tanggal_transaksi= $this->input->post('tanggal_transaksi');
      $outlet= $this->session->userdata('outlet');
      $tipe = 'sekali';



      $data = array(
        'nama' => $nama,
        'total' => $total,
        'keterangan' => $keterangan,
        'tanggal_transaksi' => $tanggal_transaksi,
        'outlet' => $outlet,
        'tipe' => $tipe
      );
      $this->m_owner->tambahdata($data,'pengeluaran');
      $this->session->set_flashdata('notif',"User berhasil ditambahkan");
      redirect('owner/lihatPengeluaran');
    }

    function lihatPengeluaran(){
      $outlet= $this->session->userdata('outlet');
      $data['pengeluaran'] = $this->m_owner->tampilPengeluaran($outlet)->result();
      $this->load->view('owner/v_lihatPengeluaran', $data);
      $this->load->view('layouts/footer');
    }

    function updatePengeluaran($id_pengeluaran){
  		$where = array('id_pengeluaran' => $id_pengeluaran);
  		$data['pengeluaran'] = $this->m_owner->edit_data($where,'pengeluaran')->result();
  		$this->load->view('owner/v_editPengeluaran', $data);
      $this->load->view('layouts/footer');
  	}

    function editPengeluaran(){
      $id_pengeluaran = $this->input->post('id_pengeluaran');
      $nama= $this->input->post('nama');
      $total= $this->input->post('total');
      $keterangan= $this->input->post('keterangan');
      $tanggal_transaksi= $this->input->post('tanggal_transaksi');
      $outlet= $this->session->userdata('outlet');
      $tipe = 'sekali';

      $data = array(
        'nama' => $nama,
        'total' => $total,
        'keterangan' => $keterangan,
        'tanggal_transaksi' => $tanggal_transaksi,
        'outlet' => $outlet,
        'tipe' => $tipe
      );

      $where = array('id_pengeluaran' => $id_pengeluaran);
      $this->m_owner->update_data($where,$data,'pengeluaran');
      $this->session->set_flashdata('notif', "Data user $id_pengeluaran berhasil di Update");
      redirect('owner/lihatPengeluaran');
    }

    function hapusPengeluaran($id_pengeluaran){
  		$where = array('id_pengeluaran' => $id_pengeluaran);
  		$this->m_owner->hapus_data($where,'pengeluaran');
  		$this->session->set_flashdata('notif', "Data User $id_user berhasil dihapus");
  		redirect('owner/lihatPengeluaran');
  	}

    //end of pengeluaran sekali

    //start of pengeluaran tetap
        function tambahPengeluaranTetap(){
          $this->load->view('owner/v_tambahPengeluaranTetap');
          $this->load->view('layouts/footer');

        }

        function tambahkanPengeluaranTetap(){
          $nama= $this->input->post('nama');
          $total= $this->input->post('total');
          $keterangan= $this->input->post('keterangan');
          $tanggal_transaksi= $this->input->post('tanggal_transaksi');
          $outlet= $this->session->userdata('outlet');
          $tipe = 'tetap';



          $data = array(
            'nama' => $nama,
            'total' => $total,
            'keterangan' => $keterangan,
            'outlet' => $outlet,
            'tipe' => $tipe
          );
          $this->m_owner->tambahdata($data,'pengeluaran');
          $this->session->set_flashdata('notif',"User berhasil ditambahkan");
          redirect('owner/lihatPengeluaranTetap');
        }

        function lihatPengeluaranTetap(){
          $outlet= $this->session->userdata('outlet');
          $data['pengeluaran'] = $this->m_owner->tampilPengeluaranTetap ($outlet)->result();
          $this->load->view('owner/v_lihatPengeluaranTetap', $data);
          $this->load->view('layouts/footer');
        }

        function updatePengeluaranTetap($id_pengeluaran){
      		$where = array('id_pengeluaran' => $id_pengeluaran);
      		$data['pengeluaran'] = $this->m_owner->edit_data($where,'pengeluaran')->result();
      		$this->load->view('owner/v_editPengeluaranTetap', $data);
          $this->load->view('layouts/footer');
      	}

        function editPengeluaranTetap(){
          $id_pengeluaran = $this->input->post('id_pengeluaran');
          $nama= $this->input->post('nama');
          $total= $this->input->post('total');
          $keterangan= $this->input->post('keterangan');
          $tanggal_transaksi= $this->input->post('tanggal_transaksi');
          $outlet= $this->session->userdata('outlet');
          $tipe = 'tetap';

          $data = array(
            'nama' => $nama,
            'total' => $total,
            'keterangan' => $keterangan,
            'outlet' => $outlet,
            'tipe' => $tipe
          );

          $where = array('id_pengeluaran' => $id_pengeluaran);
          $this->m_owner->update_data($where,$data,'pengeluaran');
          $this->session->set_flashdata('notif', "Data user $id_pengeluaran berhasil di Update");
          redirect('owner/lihatPengeluaranTetap');
        }

        function hapusPengeluaranTetap($id_pengeluaran){
      		$where = array('id_pengeluaran' => $id_pengeluaran);
      		$this->m_owner->hapus_data($where,'pengeluaran');
      		$this->session->set_flashdata('notif', "Data User $id_user berhasil dihapus");
      		redirect('owner/lihatPengeluaranTetap');
      	}

        //end of pengeluaran sekali

    //start of Menu Bar

    function tambahMenuBar(){
      $this->load->view('owner/v_tambahMenuBar');
      $this->load->view('layouts/footer');

    }

    function tambahkanMenuBar(){
      $nama= $this->input->post('nama');
      $harga= $this->input->post('harga');
      $status= $this->input->post('status');
      $outlet= $this->session->userdata('outlet');
      $tipe = 'menu_bar';



      $data = array(
        'nama' => $nama,
        'harga' => $harga,
        'status' => $status,
        'outlet' => $outlet,
        'tipe' => $tipe
      );
      $this->m_owner->tambahdata($data,'menu_bar');
      redirect('owner/lihatMenuBar');
    }

    function lihatMenuBar(){
      $outlet= $this->session->userdata('outlet');
      $data['menu_bar'] = $this->m_owner->tampilMenuBar($outlet)->result();
      $this->load->view('owner/v_lihatMenuBar', $data);
      $this->load->view('layouts/footer');
    }

    function updateMenuBar($id_menu){
  		$where = array('id_menu' => $id_menu);
  		$data['menu_bar'] = $this->m_owner->edit_data($where,'menu_bar')->result();
  		$this->load->view('owner/v_editMenuBar', $data);
      $this->load->view('layouts/footer');
  	}

    function editMenuBar(){
      $id_menu = $this->input->post('id_menu');
      $nama= $this->input->post('nama');
      $harga= $this->input->post('harga');
      $status= $this->input->post('status');
      $outlet= $this->session->userdata('outlet');

      $data = array(
        'nama' => $nama,
        'harga' => $harga,
        'status' => $status,
        'outlet' => $outlet
      );

      $where = array('id_menu' => $id_menu);
      $this->m_owner->update_data($where,$data,'menu_bar');
      redirect('owner/lihatMenuBar');
    }

    function hapusMenuBar($id_menu){
      $where = array('id_menu' => $id_menu);
      $this->m_owner->hapus_data($where,'menu_bar');
      redirect('owner/lihatMenuBar');
    }

  // end of Menu Retail

  function tambahMenuRetail(){
    $this->load->view('owner/v_tambahMenuRetail');
    $this->load->view('layouts/footer');

  }

  function tambahkanMenuRetail(){
    $nama= $this->input->post('nama');
    $harga= $this->input->post('harga');
    $status= $this->input->post('status');
    $outlet= $this->session->userdata('outlet');
    $tipe = 'menu_retail';



    $data = array(
      'nama' => $nama,
      'harga' => $harga,
      'status' => $status,
      'outlet' => $outlet,
      'tipe' => $tipe
    );
    $this->m_owner->tambahdata($data,'menu_bar');
    redirect('owner/lihatMenuRetail');
  }

  function lihatMenuRetail(){
    $outlet= $this->session->userdata('outlet');
    $data['menu_retail'] = $this->m_owner->tampilMenuRetail($outlet)->result();
    $this->load->view('owner/v_lihatMenuRetail', $data);
    $this->load->view('layouts/footer');
  }

  function updateMenuRetail($id_menu){
    $where = array('id_menu' => $id_menu);
    $data['menu_bar'] = $this->m_owner->edit_data($where,'menu_bar')->result();
    $this->load->view('owner/v_editMenuRetail', $data);
    $this->load->view('layouts/footer');
  }

  function editMenuRetail(){
    $id_retail = $this->input->post('id_retail');
    $nama= $this->input->post('nama');
    $harga= $this->input->post('harga');
    $status= $this->input->post('status');
    $outlet= $this->session->userdata('outlet');

    $data = array(
      'nama' => $nama,
      'harga' => $harga,
      'status' => $status,
      'outlet' => $outlet
    );

    $where = array('id_menu' => $id_retail);
    $this->m_owner->update_data($where,$data,'menu_bar');
    redirect('owner/lihatMenuRetail');
  }

  function hapusMenuRetail($id_retail){
    $where = array('id_retail' => $id_retail);
    $this->m_owner->hapus_data($where,'menu_retail');
    redirect('owner/lihatMenuRetail');
  }

  //End of Menu Retail

  //Start of Gaji
  function tambahGaji(){
    $this->load->view('owner/v_tambahGaji');
    $this->load->view('layouts/footer');

  }

  function tambahkanGaji(){
    $jabatan= $this->input->post('jabatan');
    $gaji= $this->input->post('gaji');
    $outlet= $this->session->userdata('outlet');



    $data = array(
      'jabatan' => $jabatan,
      'gaji' => $gaji,
      'outlet' => $outlet
    );
    $this->m_owner->tambahdata($data,'gaji');
    redirect('owner/lihatGaji');
  }

  function lihatGaji(){
    $outlet= $this->session->userdata('outlet');
    $data['gaji'] = $this->m_owner->tampilGaji($outlet)->result();
    $this->load->view('owner/v_lihatGaji', $data);
    $this->load->view('layouts/footer');
  }

  function updateGaji($id_gaji){
    $where = array('id_gaji' => $id_gaji);
    $data['gaji'] = $this->m_owner->edit_data($where,'gaji')->result();
    $this->load->view('owner/v_editGaji', $data);
    $this->load->view('layouts/footer');
  }

  function editGaji(){
    $id_gaji = $this->input->post('id_gaji');
    $jabatan= $this->input->post('jabatan');
    $gaji= $this->input->post('gaji');
    $outlet= $this->session->userdata('outlet');

    $data = array(
      'jabatan' => $jabatan,
      'gaji' => $gaji,
      'outlet' => $outlet
    );

    $where = array('id_gaji' => $id_gaji);
    $this->m_owner->update_data($where,$data,'gaji');
    redirect('owner/lihatGaji');
  }

  function hapusGaji($id_gaji){
    $where = array('id_gaji' => $id_gaji);
    $this->m_owner->hapus_data($where,'gaji');
    redirect('owner/lihatGaji');
  }
  //End of Gaji

  //start of  Laporan Penjualan

  function lihatPenjualan(){
    $outlet= $this->session->userdata('outlet');
    $data['penjualan'] = $this->m_owner->tampilPenjualan($outlet)->result();
    // $data['detail_penjualan'] = $this->m_owner->tampilDetailPenjualan($id_penjualan)->result();
      $data['total'] = $this->m_owner->tampilTotallPenjualan($outlet)->result();
    $data['total2'] = $this->m_owner->tampilTotallPenjualan2($outlet)->result();
  //  $data['menuBar'] = $this->m_owner->tampilMenuBar($id_outlet)->result();
  //  $data['menuRetail'] = $this->m_owner->tampilMenuRetail($id_outlet)->result();
    $this->load->view('owner/v_lihatPenjualan',$data);
    $this->load->view('layouts/footer');
  }

  function lihatPenjualanHariIni(){
    $outlet= $this->session->userdata('outlet');
    $today = date('l');
		$data['penjualan'] = $this->m_owner->tampilPenjualanHariIni($today,$outlet)->result();
    // $data['detail_penjualan'] = $this->m_owner->tampilDetailPenjualan($id_penjualan)->result();
    $data['total'] = $this->m_owner->tampilTotallPenjualan($outlet)->result();

  //  $data['menuBar'] = $this->m_owner->tampilMenuBar($id_outlet)->result();
  //  $data['menuRetail'] = $this->m_owner->tampilMenuRetail($id_outlet)->result();
    $this->load->view('owner/v_lihatPenjualanHariIni',$data);
    $this->load->view('layouts/footer');
	}

  function lihatDetailPenjualan($id_penjualan){
    $id_outlet= $this->session->userdata('outlet');
    $today = date('l');
		$data['penjualan'] = $this->m_owner->tampilPenjualanID($id_penjualan,$id_outlet)->result();
    $data['detail_penjualan'] = $this->m_owner->tampilDetailPenjualan($id_penjualan)->result();
    $data['detail_penjualan2'] = $this->m_owner->tampilDetailPenjualan2($id_penjualan)->result();

    $data['menuBar'] = $this->m_owner->tampilMenuBar($id_outlet)->result();
    $data['menuRetail'] = $this->m_owner->tampilMenuRetail($id_outlet)->result();
    $this->load->view('owner/v_lihatDetailPenjualan',$data);
    $this->load->view('layouts/footer');
	}

  function lihatPenjualanMingguan(){
    $outlet= $this->session->userdata('outlet');
		//$data['penjualan'] = $this->m_owner->tampilPenjualan($today,$outlet)->result();
    $data['hari'] = $this->m_owner->lihatHari()->result();
    $data['total'] = $this->m_owner->tampilTotallPenjualanPerHari($outlet)->result();

  //  $data['menuBar'] = $this->m_owner->tampilMenuBar($id_outlet)->result();
  //  $data['menuRetail'] = $this->m_owner->tampilMenuRetail($id_outlet)->result();
    $this->load->view('owner/v_lihatPenjualanMingguan',$data);
    $this->load->view('layouts/footer');
	}

  function lihatPenjualanBulanan(){
    $outlet= $this->session->userdata('outlet');
		//$data['penjualan'] = $this->m_owner->tampilPenjualan($today,$outlet)->result();
    $data['hari'] = $this->m_owner->lihatHari()->result();
    $data['total'] = $this->m_owner->tampilTotallPenjualanPerMinggu($outlet)->result();

  //  $data['menuBar'] = $this->m_owner->tampilMenuBar($id_outlet)->result();
  //  $data['menuRetail'] = $this->m_owner->tampilMenuRetail($id_outlet)->result();
    $this->load->view('owner/v_lihatPenjualanBulanan',$data);
    $this->load->view('layouts/footer');
	}

  //end of Laporan Penjualan

  //Start of lihatInvoice

  function lihatInvoice(){
    $outlet = $this->session->userdata('outlet');
    $bulan = 7;
    $data['totalPenjualan'] = $this->m_owner->tampilTotallPenjualanBulan($outlet,$bulan)->result();
    $data['totalPengeluaran'] = $this->m_owner->tampilTotalPengeluaranBulan($outlet,$bulan)->result();
    $data['totalPengeluaranTetap'] = $this->m_owner->tampilTotalPengeluaranBulanTetap($outlet)->result();
    $data['totalGaji'] = $this->m_owner->tampilTotalGajiBulan($outlet,$bulan)->result();
    $c = array();
    foreach ( $data['totalPenjualan'] as $penjualan ) {
      array_push($c,$penjualan->total);
    }
    $b = array();
    foreach ( $data['totalGaji'] as $gaji ) {
      array_push($b,$gaji->total);
    }

    $data['totalPenjualanBulan']= array_sum($c);
    $data['totalGajiBulan']= array_sum($b);

    $this->load->view('owner/v_lihatInvoice',$data);
    $this->load->view('layouts/footer');
  }

  //End of Invoice

 }
