<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_income extends CI_Model {

  public $table = 'mstr_income';
  public $id = 'ID_INCOME';
  public $order = 'DESC';

  function __construct()
  {
      parent::__construct();
  }

  function kode_income()
  {
		  $this->db->select('mstr_income.ID_income');
		  $this->db->order_by('ID_income','DESC');
		  $this->db->limit(1);
		  $query = $this->db->get('mstr_income');      //cek dulu apakah ada sudah ada kode di tabel.
//      if($query->num_rows() == '001'){
//      $data = $query->row();
//      $kode = intval($data->kode) + 1;
//      }
//      else {
//      $kode = 001;
//      }
      $b = 'INC';
      $c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
      $d = date('Y');
//		  $kodemax = str_pad(STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  //$kodejadi = "ODJ-9921-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
      $no_income = $b.'/'.$c[date('n')].'/'.$d;
      return $no_income;
	}


  function jml_hari()
  {
    $tahun = date('Y'); //Mengambil tahun saat ini
    $bulan = date('m'); //Mengambil bulan saat ini
    $tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

//    echo "Jumlah hari pada bulan saat ini adalah <b>{$tanggal}</b>";
	}

  function insertSkor()
      {
          $query = $this->db->query("CALL insert_skor()");
      //    return $query->result();
      }

  function insert_absen($id, $data)
      {
          $this->db->where($this->id, $id);
          $this->db->update($this->table, $data);
      }

}
?>
