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

    function lihatHari(){
      return $this->db->get('hari');
    }

    function tampilPenjualan($outlet){
      $this->db->where('id_outlet',$outlet);
      return $this->db->get_where('penjualan');
    }

    function tampilTotallPenjualan($outlet){
      $this->db->select('a.id_penjualan, SUM(u.harga * a.jumlah) as total');
      $this->db->from('detail_penjualan a');
      $this->db->join('menu_bar u', 'u.id_menu = a.id_menu');
      $this->db->where('a.id_outlet',$outlet);
      $this->db->group_by("a.id_penjualan");
      return $this->db->get();
    }

    function tampilTotallPenjualanPerHari($outlet){
      $this->db->select('x.tanggal, DAYOFWEEK(x.tanggal) as hari, SUM(u.harga * a.jumlah) as total');
      $this->db->from('detail_penjualan a');
      $this->db->join('penjualan x', 'x.id_penjualan = a.id_penjualan');
      $this->db->join('menu_bar u', 'u.id_menu = a.id_menu');
      $this->db->where('a.id_outlet',$outlet);
      $this->db->where('YEARWEEK(x.tanggal, 1) = YEARWEEK(CURDATE(), 1)');
      $this->db->group_by("DATE(x.tanggal)");
      return $this->db->get();
    }

    function tampilTotallPenjualanPerMinggu($outlet){
      $this->db->select('SUM(u.harga * a.jumlah) as total');
      $this->db->from('detail_penjualan a');
      $this->db->join('penjualan x', 'x.id_penjualan = a.id_penjualan');
      $this->db->join('menu_bar u', 'u.id_menu = a.id_menu');
      $this->db->where('a.id_outlet',$outlet);
      $this->db->group_by("YEARWEEK(x.tanggal, 1)");
      $this->db->order_by('x.tanggal');
      return $this->db->get();
    }

    function tampilPenjualanHariIni($where,$outlet){
      $this->db->where('DAYNAME(tanggal)',$where);
      $this->db->where('id_outlet',$outlet);
      return $this->db->get_where('penjualan');
    }

    function tampilDetailPenjualan($id_penjualan){
      $this->db->where('id_penjualan',$id_penjualan);
      return $this->db->get_where('detail_penjualan');
    }

    function tampilDetailPenjualan2($id_penjualan){
      $this->db->select('SUM(u.harga * a.jumlah) as total');
      $this->db->from('detail_penjualan a');
      $this->db->join('menu_bar u', 'u.id_menu = a.id_menu');
      $this->db->where('a.id_penjualan',$id_penjualan);
      return $this->db->get();
    }

    function tampilItemTerjualPerhari($outlet){
      $this->db->select('COUNT(a.id_penjualan) as terjual');
      $this->db->from('detail_penjualan a');
      $this->db->join('penjualan u', 'u.id_penjualan =  a.id_penjualan');
      $this->db->where('DAYNAME(u.tanggal) = DAYNAME(CURDATE())');
      $this->db->where('a.id_outlet', $outlet);
      return $this->db->get();
    }

    function tampilTotallPenjualanHariIni($outlet){
      $this->db->select('sum(a.jumlah * s.harga) as total ');
      $this->db->from('detail_penjualan a');
      $this->db->join('penjualan u', 'u.id_penjualan =  a.id_penjualan');
      $this->db->join('menu_bar s', 's.id_menu =  a.id_menu');
      $this->db->where('DAYNAME(u.tanggal) = DAYNAME(CURDATE())');
      $this->db->where('a.id_outlet', $outlet);
      return $this->db->get();
    }

    function tampilTotallPenjualanBulanIni($outlet){
      $this->db->select('sum(a.jumlah * s.harga) as total ');
      $this->db->from('detail_penjualan a');
      $this->db->join('penjualan u', 'u.id_penjualan =  a.id_penjualan');
      $this->db->join('menu_bar s', 's.id_menu =  a.id_menu');
      $this->db->where('MONTH(u.tanggal) = MONTH(CURDATE())');
      $this->db->where('a.id_outlet', $outlet);
      return $this->db->get();
    }





}
