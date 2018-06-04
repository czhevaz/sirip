<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi_pegawai extends CI_Controller {
	function __construct()
	{
			parent::__construct();
				$this->load->model('M_mutasi');
				$this->load->library('form_validation');
	}

	function index()
	{
		//$this->load->view('admin/indeks_pegawai/select2');

		//$this->load->library('datatables');
		$data['ID_MUTASI'] = $this->M_mutasi->kode_mutasi(); // variable $kodeunik merujuk ke file model_user.php pada function buat_kode. paham kan ya? harus paham dong
		//$this->load->model('M_mutasi');
		$data ['main_view'] = 'admin/indeks_pegawai/mutasi_pegawai';
		$this->load->view('theme/template', $data);
	}

	function mutasi()
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

		$info = $this->db->select('*')
										 ->from('mstr_pegawai')
										 ->join('mstr_level', 'mstr_pegawai.ID_LEVEL = mstr_level.ID_LEVEL')
										 ->join('mstr_ruangan', 'mstr_pegawai.ID_RUANGAN = mstr_ruangan.ID_RUANGAN')
										 ->join('mstr_karir', 'mstr_pegawai.ID_KARIR = mstr_karir.ID_KARIR')
										 ->join('mstr_risiko_kerja', 'mstr_pegawai.ID_RISIKO = mstr_risiko_kerja.ID_RISIKO')
										 ->join('mstr_ket_khusus', 'mstr_pegawai.ID_KET = mstr_ket_khusus.ID_KET')
										 ->join('mstr_intensitas', 'mstr_pegawai.ID_INTENSITAS = mstr_intensitas.ID_INTENSITAS')
										 ->join('mstr_absensi', 'mstr_pegawai.ID_ABSENSI = mstr_absensi.ID_ABSENSI')
										 ->where('ID_PEGAWAI',$id)
										 ->get()
										 ->row();
		echo json_encode($info);
	}


	public function proses_input(){
//			$this->input->post('submit'); //mengakap inputan yang disubmit lewat post
			$this->M_mutasi->insert_mutasi(); //mengakses fungsi addTransaski di model mtransaski
			//redirect('admin/transaksi'); //setelah selesai redirect ke halaman awal
			$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
																		<button type="button" class="close" data-dismiss="alert">&times;</button>
																		<strong>Success!</strong> Data berhasil ditambahkan</div>');
			redirect('admin/mutasi_pegawai');
		}

}
?>
