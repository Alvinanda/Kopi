<?php
class m_manajer extends CI_Model{

  function tambahdata($data,$table){
   $this->db->insert($table,$data);
  }

  function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

  function edit_data($where,$table){
    return $this->db->get_where($table,$where);
  }

  function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

  function tampilBahanBaku($where){
    $this->db->where('outlet',$where);
    return $this->db->get_where('bahan_baku');
    }

    // function tampilShift($where){
    //   $this->db->where('outlet',$where);
    //   $this->db->join('shift')
    //   return $this->db->get_where('shift');
    // }

    function tampilShift($where){
      $this->db->select('*');
      $this->db->from('shift');
      $this->db->group_by('jam_masuk');
      $this->db->order_by('jam_masuk','asc');
      return $this->db->get();
    }

    function tampilJadwalShift(){
      $this->db->select('*');
      $this->db->from('jadwal_shift j');
      $this->db->join('user u', 'u.id_user = j.id_user');
      $this->db->order_by("hari", "asc");
      // $this->db->order_by('kode_shift','asc');
      return $this->db->get();
    }

  function tampilStarMember($where){
      $this->db->where('outlet',$where);
      $this->db->where('jabatan','star member');
      return $this->db->get_where('user');
      }

  function tampilMenuBar($where){
      $this->db->where('outlet',$where);
      return $this->db->get_where('menu_bar');
      }

  function tampilMenuRetail($where){
        $this->db->where('outlet',$where);
        return $this->db->get_where('menu_retail');
        }

  function tampilPegawai($where){
    $jabatan= array('staff', 'manajer');
    $this->db->where_in('jabatan',$jabatan);
    $this->db->where('outlet',$where);
    return $this->db->get_where('user');
    }

  function tampilOutlet(){
      return $this->db->get('outlet');
      }

  function lihatJadwalShift(){
    // $this->db->order_by('jam_masuk','ASC');
    // $this->db->group_by('jam_masuk');
    // $this->db->join('user', 'user.id_user = jadwal_shift.id_user');
    return $this->db->get('jadwal_shift')->result();
  }

  function lihatJadwalShiftUser($id){
    $this->db->select('j.id_jadwal, j.id_user, s.jam_masuk, s.jam_selesai, h.hari, h.hari_en');
    $this->db->from('jadwal_shift j');
    $this->db->join('shift s', 's.kode_shift = j.kode_shift');
    $this->db->join('hari h', 'h.id = j.hari');
    $this->db->where('j.id_user',$id);
    return $this->db->get()->result();
  }

  function tampilAbsensi($outlet){
    $this->db->select('a.id_absen, u.nama, s.jam_masuk, s.jam_selesai, a.checkin, a.checkout, a.status');
    $this->db->from('absensi a');
    $this->db->join('user u', 'u.id_user = a.id_user');
    $this->db->join('jadwal_shift j', 'j.id_jadwal = a.id_jadwal');
    $this->db->join('shift s', 's.kode_shift = j.kode_shift');
    $this->db->where('a.id_outlet',$outlet);
    return $this->db->get()->result();
  }

  function lihatHari(){
    return $this->db->get('hari');
  }

}
