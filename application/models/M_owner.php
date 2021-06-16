<?php
class M_owner extends CI_Model{

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

  function tampilPegawai($where){
    $this->db->where('outlet',$where);
    return $this->db->get_where('user');
    }

  function tampilPengeluaran($where){
    $this->db->where('outlet',$where);
    return $this->db->get_where('pengeluaran');
    }

    function tampilMenuBar($where){
      $this->db->where('outlet',$where);
      return $this->db->get_where('menu_bar');
      }

      function tampilMenuRetail($where){
        $this->db->where('outlet',$where);
        return $this->db->get_where('menu_retail');
        }

  function tampilOutlet(){
    return $this->db->get('outlet');
    }

}
