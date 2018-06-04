<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Indeks_pegawai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_indeks_pegawai');
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
//        $this->load->view('admin/indeks_pegawai/mstr_pegawai_list');
        $data ['main_view'] = 'admin/indeks_pegawai/mstr_pegawai_list';
        $this->load->view('theme/template', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_indeks_pegawai->json();
    }

    public function read($id)
    {
        $row = $this->M_indeks_pegawai->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_PEGAWAI' => $row->ID_PEGAWAI,
		'NIK' => $row->NIK,
		'NAMA_PEGAWAI' => $row->NAMA_PEGAWAI,
		'ID_LEVEL' => $row->ID_LEVEL,
		'ID_RUANGAN' => $row->ID_RUANGAN,
		'ID_KARIR' => $row->ID_KARIR,
		'ID_RISIKO' => $row->ID_RISIKO,
		'ID_KET' => $row->ID_KET,
		'ID_INTENSITAS' => $row->ID_INTENSITAS,
		'ID_ABSENSI' => $row->ID_ABSENSI,
		'ALAMAT' => $row->ALAMAT,
		'GENDER' => $row->GENDER,
		'TEMPAT_LAHIR' => $row->TEMPAT_LAHIR,
		'TGL_LAHIR' => $row->TGL_LAHIR,
		'EMAIL' => $row->EMAIL,
		'PHONE' => $row->PHONE,
		'STATUS' => $row->STATUS,
	    );
            //$this->load->view('indeks_pegawai/mstr_pegawai_read', $data);
            $data ['main_view'] = 'indeks_pegawai/mstr_pegawai_read';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/indeks_pegawai'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/indeks_pegawai/create_action'),
	    'ID_PEGAWAI' => set_value('ID_PEGAWAI'),
	    'NIK' => set_value('NIK'),
	    'NAMA_PEGAWAI' => set_value('NAMA_PEGAWAI'),
	    'ID_LEVEL' => set_value('ID_LEVEL'),
	    'ID_RUANGAN' => set_value('ID_RUANGAN'),
	    'ID_KARIR' => set_value('ID_KARIR'),
	    'ID_RISIKO' => set_value('ID_RISIKO'),
	    'ID_KET' => set_value('ID_KET'),
	    'ID_INTENSITAS' => set_value('ID_INTENSITAS'),
	    'ID_ABSENSI' => set_value('ID_ABSENSI'),
	    'ALAMAT' => set_value('ALAMAT'),
	    'GENDER' => set_value('GENDER'),
	    'TEMPAT_LAHIR' => set_value('TEMPAT_LAHIR'),
	    'TGL_LAHIR' => set_value('TGL_LAHIR'),
	    'EMAIL' => set_value('EMAIL'),
	    'PHONE' => set_value('PHONE'),
	    'STATUS' => set_value('STATUS'),
	);
        //$this->load->view('admin/indeks_pegawai/mstr_pegawai_form', $data);
        $data ['main_view'] = 'admin/indeks_pegawai/mstr_pegawai_form';
        $this->load->view('theme/template', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NIK' => $this->input->post('NIK',TRUE),
		'NAMA_PEGAWAI' => $this->input->post('NAMA_PEGAWAI',TRUE),
		'ID_LEVEL' => $this->input->post('ID_LEVEL',TRUE),
		'ID_RUANGAN' => $this->input->post('ID_RUANGAN',TRUE),
		'ID_KARIR' => $this->input->post('ID_KARIR',TRUE),
		'ID_RISIKO' => $this->input->post('ID_RISIKO',TRUE),
		'ID_KET' => $this->input->post('ID_KET',TRUE),
		'ID_INTENSITAS' => $this->input->post('ID_INTENSITAS',TRUE),
		'ID_ABSENSI' => $this->input->post('ID_ABSENSI',TRUE),
		'ALAMAT' => $this->input->post('ALAMAT',TRUE),
		'GENDER' => $this->input->post('GENDER',TRUE),
		'TEMPAT_LAHIR' => $this->input->post('TEMPAT_LAHIR',TRUE),
		'TGL_LAHIR' => $this->input->post('TGL_LAHIR',TRUE),
		'EMAIL' => $this->input->post('EMAIL',TRUE),
		'PHONE' => $this->input->post('PHONE',TRUE),
		'STATUS' => $this->input->post('STATUS',TRUE),
	    );

            $this->M_indeks_pegawai->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/indeks_pegawai'));
        }
    }

    public function update($id)
    {
        $row = $this->M_indeks_pegawai->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/indeks_pegawai/update_action'),
		'ID_PEGAWAI' => set_value('ID_PEGAWAI', $row->ID_PEGAWAI),
		'NIK' => set_value('NIK', $row->NIK),
		'NAMA_PEGAWAI' => set_value('NAMA_PEGAWAI', $row->NAMA_PEGAWAI),
		'ID_LEVEL' => set_value('ID_LEVEL', $row->ID_LEVEL),
		'ID_RUANGAN' => set_value('ID_RUANGAN', $row->ID_RUANGAN),
		'ID_KARIR' => set_value('ID_KARIR', $row->ID_KARIR),
		'ID_RISIKO' => set_value('ID_RISIKO', $row->ID_RISIKO),
		'ID_KET' => set_value('ID_KET', $row->ID_KET),
		'ID_INTENSITAS' => set_value('ID_INTENSITAS', $row->ID_INTENSITAS),
		'ID_ABSENSI' => set_value('ID_ABSENSI', $row->ID_ABSENSI),
		'ALAMAT' => set_value('ALAMAT', $row->ALAMAT),
		'GENDER' => set_value('GENDER', $row->GENDER),
		'TEMPAT_LAHIR' => set_value('TEMPAT_LAHIR', $row->TEMPAT_LAHIR),
		'TGL_LAHIR' => set_value('TGL_LAHIR', $row->TGL_LAHIR),
		'EMAIL' => set_value('EMAIL', $row->EMAIL),
		'PHONE' => set_value('PHONE', $row->PHONE),
		'STATUS' => set_value('STATUS', $row->STATUS),
	    );
            //$this->load->view('admin/indeks_pegawai/mstr_pegawai_form', $data);
            $data ['main_view'] = 'admin/indeks_pegawai/mstr_pegawai_form';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/indeks_pegawai'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_PEGAWAI', TRUE));
        } else {
            $data = array(
		'NIK' => $this->input->post('NIK',TRUE),
		'NAMA_PEGAWAI' => $this->input->post('NAMA_PEGAWAI',TRUE),
		'ID_LEVEL' => $this->input->post('ID_LEVEL',TRUE),
		'ID_RUANGAN' => $this->input->post('ID_RUANGAN',TRUE),
		'ID_KARIR' => $this->input->post('ID_KARIR',TRUE),
		'ID_RISIKO' => $this->input->post('ID_RISIKO',TRUE),
		'ID_KET' => $this->input->post('ID_KET',TRUE),
		'ID_INTENSITAS' => $this->input->post('ID_INTENSITAS',TRUE),
		'ID_ABSENSI' => $this->input->post('ID_ABSENSI',TRUE),
		'ALAMAT' => $this->input->post('ALAMAT',TRUE),
		'GENDER' => $this->input->post('GENDER',TRUE),
		'TEMPAT_LAHIR' => $this->input->post('TEMPAT_LAHIR',TRUE),
		'TGL_LAHIR' => $this->input->post('TGL_LAHIR',TRUE),
		'EMAIL' => $this->input->post('EMAIL',TRUE),
		'PHONE' => $this->input->post('PHONE',TRUE),
		'STATUS' => $this->input->post('STATUS',TRUE),
	    );

            $this->M_indeks_pegawai->update($this->input->post('ID_PEGAWAI', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/indeks_pegawai'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_indeks_pegawai->get_by_id($id);

        if ($row) {
            $this->M_indeks_pegawai->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/indeks_pegawai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/indeks_pegawai'));
        }
    }



    // create akan menampilkan form
    public function pencarian()
  	{
  		$json = [];
    		$this->load->database();
    		if(!empty($this->input->get("q"))){
    			$this->db->like('NAMA_PEGAWAI', $this->input->get("q"));
    			$query = $this->db->select('ID_PEGAWAI,NAMA_PEGAWAI as text')
    						->limit(10)
    						->get("tags");
    			$json = $query->result();
    		}
    		echo json_encode($json);
        $data ['main_view'] = 'admin/indeks_pegawai/mstr_pegawai_form';
        $this->load->view('theme/template', $data);
    	}



    public function _rules()
    {
	$this->form_validation->set_rules('NIK', 'nik');
	$this->form_validation->set_rules('NAMA_PEGAWAI', 'nama pegawai');
	$this->form_validation->set_rules('ID_LEVEL', 'id level');
	$this->form_validation->set_rules('ID_RUANGAN', 'id ruangan');
	$this->form_validation->set_rules('ID_KARIR', 'id karir');
	$this->form_validation->set_rules('ID_RISIKO', 'id risiko');
	$this->form_validation->set_rules('ID_KET', 'id ket');
	$this->form_validation->set_rules('ID_INTENSITAS', 'id intensitas');
	$this->form_validation->set_rules('ID_ABSENSI', 'id absensi');
	$this->form_validation->set_rules('ALAMAT', 'alamat');
	$this->form_validation->set_rules('GENDER', 'gender');
	$this->form_validation->set_rules('TEMPAT_LAHIR', 'tempat lahir');
	$this->form_validation->set_rules('TGL_LAHIR', 'tgl lahir');
	$this->form_validation->set_rules('EMAIL', 'email');
	$this->form_validation->set_rules('PHONE', 'phone');
	$this->form_validation->set_rules('STATUS', 'status');

	$this->form_validation->set_rules('ID_PEGAWAI', 'ID_PEGAWAI', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mstr_pegawai.xls";
        $judul = "mstr_pegawai";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "NIK");
	xlsWriteLabel($tablehead, $kolomhead++, "NAMA PEGAWAI");
	xlsWriteLabel($tablehead, $kolomhead++, "ID LEVEL");
	xlsWriteLabel($tablehead, $kolomhead++, "ID RUANGAN");
	xlsWriteLabel($tablehead, $kolomhead++, "ID KARIR");
	xlsWriteLabel($tablehead, $kolomhead++, "ID RISIKO");
	xlsWriteLabel($tablehead, $kolomhead++, "ID KET");
	xlsWriteLabel($tablehead, $kolomhead++, "ID INTENSITAS");
	xlsWriteLabel($tablehead, $kolomhead++, "ID ABSENSI");
	xlsWriteLabel($tablehead, $kolomhead++, "ALAMAT");
	xlsWriteLabel($tablehead, $kolomhead++, "GENDER");
	xlsWriteLabel($tablehead, $kolomhead++, "TEMPAT LAHIR");
	xlsWriteLabel($tablehead, $kolomhead++, "TGL LAHIR");
	xlsWriteLabel($tablehead, $kolomhead++, "EMAIL");
	xlsWriteLabel($tablehead, $kolomhead++, "PHONE");
	xlsWriteLabel($tablehead, $kolomhead++, "STATUS");

	foreach ($this->M_indeks_pegawai->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NIK);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NAMA_PEGAWAI);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ID_LEVEL);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID_RUANGAN);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ID_KARIR);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID_RISIKO);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID_KET);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID_INTENSITAS);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID_ABSENSI);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ALAMAT);
	    xlsWriteLabel($tablebody, $kolombody++, $data->GENDER);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TEMPAT_LAHIR);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TGL_LAHIR);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EMAIL);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PHONE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->STATUS);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Indeks_pegawai.php */
/* Location: ./application/controllers/Indeks_pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-01 21:40:08 */
/* http://harviacode.com */
