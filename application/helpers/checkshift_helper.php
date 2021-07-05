<?php
/**
 * Helpher untuk mencetak tanggal dalam format bahasa indonesia
 *
 * @package CodeIgniter
 * @category Helpers
 * @author Ardianta Pargo (ardianta_pargo@yhaoo.co.id)
 * @link https://gist.github.com/ardianta/ba0934a0ee88315359d30095c7e442de
 * @version 1.0
 */

/**
 * Fungsi untuk merubah bulan bahasa inggris menjadi bahasa indonesia
 * @param int nomer bulan, Date('m')
 * @return string nama bulan dalam bahasa indonesia
 */
if (!function_exists('check_shift')) {
    function check_shift($jadwal){
        $time = date('H:i:s');
        foreach($jadwal as $j){
            if($j->jam_selesai == '00:00:00'){
              $j->jam_selesai = '24:00:00';
              if($time >= $j->jam_masuk && $time <= $j->jam_selesai){
                $j->jam_selesai = '00:00:00';
                return true;
              }else{
                $j->jam_selesai = '00:00:00';
                return false;
              };
            }else{
              if($time >= $j->jam_masuk && $time <= $j->jam_selesai){
                return true;
              }else{
                return false;
              };
            }
        }
    }
}

if(!function_exists('check_shift_selesai')){
  function check_shift_selesai($jadwal){
    $time = date('H:i:s');
    if($jadwal[0]->jam_selesai == '00:00:00'){
      $jadwal[0]->jam_selesai == '24:00:00';
    }
    return ($time >= $jadwal[0]->jam_selesai ? true : false);
  }
}
