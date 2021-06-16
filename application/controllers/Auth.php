<?php

class Auth extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_auth');
		$this->load->library('form_validation');
	}

	function index(){
	$data['main_view'] = 'v_login';
	$this->load->view('auth/v_login', $data);
	}

	function login(){
		$data['main_view'] = 'v_login';
		$this->load->view('v_login', $data);
	}
	//alvin
	public function cek_login(){
		if($this->session->userdata('logged_in') == FALSE){

			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {

				if($this->m_auth->cek_user_holding() == TRUE){

					$status = $this->session->userdata('jabatan');
					if($status=="holding"){
						redirect('holding/index');
					}else if ($status == "owner"){
						redirect('owner/index');
					}else if ($status == "manajer"){
						redirect('manajer/index');
					}else{
						redirect('staff/index');
					}
				} else{
					$this->session->set_flashdata('notif', 'Username atau Password salah');
					redirect('auth/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
					redirect('auth/index');
			}
		} else {
			redirect('auth/logout');
		}
	}

	function logout_non_aktif(){
		$this->session->set_flashdata('notif', 'mohon maaf user sudah non aktif, untuk melihat data silahkan hubungi operator');
		$this->session->sess_destroy();
		$this->load->view('v_login');
	}

	 function logout(){
		// $id_peminjam = $this->session->userdata('id_login');
		// $peminjaman = $this->m_auth->get_peminjaman_pending($id_peminjam);
		// foreach ($peminjaman as $u) {
		// 	$id=$u->id_peminjaman;
		// 	$where_peminjaman = array('id_peminjaman' => $id);
		// 	$where_non_rutin = array('id_peminjaman_non_rutin' => $id);
		// 	$this->m_auth->hapus_data($where_non_rutin,'peminjaman_non_rutin');
		// 	$this->m_auth->hapus_data($where_non_rutin,'detail_peminjaman_non_rutin');
		// 	$this->m_auth->hapus_data($where_peminjaman,'peminjaman');
		// }
		$this->session->sess_destroy();
		redirect('Auth');
	}

	function lupa_password(){
		$data['main_view'] = 'v_lupa_password';
		$this->load->view('v_lupa_password', $data);
	}
}
