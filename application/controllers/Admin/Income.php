<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('M_income');
    $this->load->library('form_validation');
  }

  public function index() {

//    $data['main_view'] = 'admin/dashboard';
    $data['ID_INCOME'] = $this->M_income->kode_income();
    $data['jml_hari'] = $this->M_income->jml_hari();

    $data['main_view'] = 'admin/remunerasi/v_income';
    $this->load->view('theme/template', $data);
  }


  public function insert_income()
  {
      $this->_rules();
            $ID_INCOME = $this->input->post('ID_INCOME' ,TRUE); // deklarasi id_transaksi sekaligus nangkep inputan data yang udah disubmit
            $JUMLAH = $this->input->post('JUMLAH' ,TRUE);
            $JML_HARI = $this->input->post('JML_HARI' ,TRUE);
            $TGL_INCOME = $this->input->post('TGL_INCOME' ,TRUE);
            $KETERANGAN = $this->input->post('KETERANGAN' ,TRUE);
      //      $id_pemilik = $this->input->post('id_pemilik'); //sama kayak diatas//
      //      $pembayaran = $this->input->post('pembayaran'); //sama kayak diatas
            //$status = $this->input->post('status'); //kebetulan status di databasenya udah ada defaultnya jadi ga usah ditangkep, biar mysql yang ngisi sendiri
            $data = array( //array yang buat masukin data
                    'ID_INCOME'=>$ID_INCOME, // yang ditangkep dimasukin
                    'JUMLAH'=>$JUMLAH,
                    'JML_HARI'=>$JML_HARI,
                    'TGL_INCOME'=>$TGL_INCOME,
                    'KETERANGAN'=>$KETERANGAN
                    //'id_pemilik'=>$id_pemilik, // yang ditangkep dimasukin
                    //'pembayaran'=>$pembayaran, // yang ditangkep dimasukin
                    //'status'=>$status // gak aktif ini
                    );

          $this->M_income->insert($data);
          $this->M_income->insertSkor();
          $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Success!</strong> Data berhasil ditambahkan</div>');
          redirect(site_url('admin/income'));

  }


  public function _rules()
  {
      $this->form_validation->set_rules('ID_INCOME', 'ID_INCOME', 'trim|required');
      $this->form_validation->set_rules('JUMLAH', 'JUMLAH', 'trim|required|number');
      $this->form_validation->set_rules('TGL_INCOME', 'TGL_INCOME');

      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }


  function cari_pegawai()
	{
		$return_arr = array();
		$row_array = array();
		$text = $this->input->get('text');
//		$stat = $this->input->get('T');
		$mutasi = $this->db->select('*')
											 ->from('mstr_pegawai')
											 ->where('STATUS', 'Y')
											 ->like('NAMA_PEGAWAI', $text)
											 ->or_like('ID_PEGAWAI',$text)
											 ->or_like('NIK',$text)
											 ->get();
		if($mutasi->num_rows() > 0)
		{

			foreach($mutasi->result_array() as $row)
			{
				$row_array['id'] = $row['ID_PEGAWAI'];
				$row_array['text'] = utf8_encode("<strong>[".$row['NIK'] ."]</strong> $row[NAMA_PEGAWAI]");
				array_push($return_arr,$row_array);
			}

		}

		echo json_encode(array("results" => $return_arr ));
	}


  function get_info()
	{
		$id = $this->input->get('id');

		$info = $this->db->select('mstr_pegawai.ID_PEGAWAI, mstr_pegawai.NAMA_PEGAWAI, mstr_level.DESCP_LEVEL, mstr_ruangan.DESCP_RUANGAN, skor_pegawai.ABSEN')
										 ->from('mstr_pegawai')
										 ->join('mstr_level', 'mstr_pegawai.ID_LEVEL = mstr_level.ID_LEVEL', 'LEFT')
										 ->join('mstr_ruangan', 'mstr_pegawai.ID_RUANGAN = mstr_ruangan.ID_RUANGAN', 'LEFT')
										 ->join('skor_pegawai', 'mstr_pegawai.ID_PEGAWAI = skor_pegawai.ID_PEGAWAI', 'LEFT')
										 ->where('mstr_pegawai.ID_PEGAWAI',$id)
										 ->get()
										 ->row();
		echo json_encode($info);
	}


  function input_absen(){
//			$this->input->post('submit'); //mengakap inputan yang disubmit lewat post
      $this->M_income->insert_absen(); //mengakses fungsi addTransaski di model mtransaski
      //redirect('admin/transaksi'); //setelah selesai redirect ke halaman awal
      $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Success!</strong> Data berhasil ditambahkan</div>');
//      redirect('admin/mutasi_pegawai');
    }

}
?>
