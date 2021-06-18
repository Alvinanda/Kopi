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

    function tampilShift($where){
      $this->db->where('outlet',$where);
      return $this->db->get_where('shift');
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

}
