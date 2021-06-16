<?php
class M_holding extends CI_Model{

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

  function tampilUser(){
    return $this->db->get('user');
    }

  function tampilOutlet(){
    return $this->db->get('outlet');
    }

}
