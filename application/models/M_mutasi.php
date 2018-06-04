<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_mutasi extends CI_Model {

  public $table = 'mutasi_pegawai';
  public $id = 'ID_MUTASI';
  public $order = 'DESC';

  function __construct()
  {
      parent::__construct();
  }

  function kode_mutasi(){
		  $this->db->select('LEFT(mutasi_pegawai.ID_MUTASI,3) as kode', FALSE);
		  $this->db->order_by('ID_MUTASI','DESC');
		  $this->db->limit(1);
		  $query = $this->db->get('mutasi_pegawai');      //cek dulu apakah ada sudah ada kode di tabel.
      if($query->num_rows() == '001'){
      $data = $query->row();
      $kode = intval($data->kode) + 1;
      }
      else {
      $kode = 001;
      }
      $b = 'MUT';
      $c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
      $d = date('Y');
		  $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  //$kodejadi = "ODJ-9921-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
      $no_mutasi = $kodemax.'/'.$b.'/'.$c[date('n')].'/'.$d;
      return $no_mutasi;
	}

  public function insert_mutasi()
    {
      $ID_MUTASI = $this->input->post('ID_MUTASI' ,TRUE); // deklarasi id_transaksi sekaligus nangkep inputan data yang udah disubmit
      $ID_PEGAWAI = $this->input->post('ID_PEGAWAI' ,TRUE);
      $LEVEL_ASAL = $this->input->post('ID_LEVEL' ,TRUE);
      $ID_LEVEL = $this->input->post('ID_LEVEL' ,TRUE);
      $ID_RUANGAN = $this->input->post('ID_RUANGAN' ,TRUE);
      $ID_KARIR = $this->input->post('ID_KARIR' ,TRUE);
      $ID_RISIKO = $this->input->post('ID_RISIKO' ,TRUE);
      $ID_KET = $this->input->post('ID_KET' ,TRUE);
      $ID_INTENSITAS = $this->input->post('ID_INTENSITAS' ,TRUE);
      $ID_ABSENSI = $this->input->post('ID_ABSENSI' ,TRUE);
      $tgl_mutasi = $this->input->post('TGL_MUTASI' ,TRUE); //sama kayak diatas
//      $id_pemilik = $this->input->post('id_pemilik'); //sama kayak diatas
//      $pembayaran = $this->input->post('pembayaran'); //sama kayak diatas
      //$status = $this->input->post('status'); //kebetulan status di databasenya udah ada defaultnya jadi ga usah ditangkep, biar mysql yang ngisi sendiri
      $data = array( //array yang buat masukin data
              'ID_MUTASI'=>$ID_MUTASI, // yang ditangkep dimasukin
              'ID_PEGAWAI'=>$ID_PEGAWAI,
              'LEVEL_ASAL'=>$LEVEL_ASAL,
              'ID_LEVEL'=>$ID_LEVEL,
              'RUANGAN_ASAL'=>$ID_RUANGAN,
              'KARIR_ASAL'=>$ID_KARIR,
              'RISIKO_ASAL'=>$ID_RISIKO,
              'KET_ASAL'=>$ID_KET,
              'INTENSITAS_ASAL'=>$ID_INTENSITAS,
              'ABSENSI_ASAL'=>$ID_ABSENSI,
              'TGL_MUTASI'=>$tgl_mutasi // yang ditangkep dimasukin
              //'id_pemilik'=>$id_pemilik, // yang ditangkep dimasukin
              //'pembayaran'=>$pembayaran, // yang ditangkep dimasukin
              //'status'=>$status // gak aktif ini
              );
      $this->db->insert('mutasi_pegawai',$data); // ini inti prosenya, yaitu masukin arrray data ke tabel transaksi
//			$this->M_mutasi->insert($data);
//			$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
//																		<button type="button" class="close" data-dismiss="alert">&times;</button>
//																		<strong>Success!</strong> Data berhasil ditambahkan</div>');
//			redirect('admin/mutasi_pegawai');
    }


}
?>
