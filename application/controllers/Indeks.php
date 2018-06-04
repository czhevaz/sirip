<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Indeks extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_indeks');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('indeks/det_indeks_pegawai_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_indeks->json();
    }

    public function read($id) 
    {
        $row = $this->M_indeks->get_by_id($id);
        if ($row) {
            $data = array(
		'NIK' => $row->NIK,
		'NAMA_PEGAWAI' => $row->NAMA_PEGAWAI,
		'DESCP_RUANGAN' => $row->DESCP_RUANGAN,
		'DESCP_LEVEL' => $row->DESCP_LEVEL,
		'DESC_KARIR' => $row->DESC_KARIR,
		'DESCP_RISIKO' => $row->DESCP_RISIKO,
		'DESCP_KET' => $row->DESCP_KET,
		'DESCP_INTENSITAS' => $row->DESCP_INTENSITAS,
		'DESCP_ABSENSI' => $row->DESCP_ABSENSI,
	    );
            $this->load->view('indeks/det_indeks_pegawai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('indeks'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('indeks/create_action'),
	    'NIK' => set_value('NIK'),
	    'NAMA_PEGAWAI' => set_value('NAMA_PEGAWAI'),
	    'DESCP_RUANGAN' => set_value('DESCP_RUANGAN'),
	    'DESCP_LEVEL' => set_value('DESCP_LEVEL'),
	    'DESC_KARIR' => set_value('DESC_KARIR'),
	    'DESCP_RISIKO' => set_value('DESCP_RISIKO'),
	    'DESCP_KET' => set_value('DESCP_KET'),
	    'DESCP_INTENSITAS' => set_value('DESCP_INTENSITAS'),
	    'DESCP_ABSENSI' => set_value('DESCP_ABSENSI'),
	);
        $this->load->view('indeks/det_indeks_pegawai_form', $data);
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
		'DESCP_RUANGAN' => $this->input->post('DESCP_RUANGAN',TRUE),
		'DESCP_LEVEL' => $this->input->post('DESCP_LEVEL',TRUE),
		'DESC_KARIR' => $this->input->post('DESC_KARIR',TRUE),
		'DESCP_RISIKO' => $this->input->post('DESCP_RISIKO',TRUE),
		'DESCP_KET' => $this->input->post('DESCP_KET',TRUE),
		'DESCP_INTENSITAS' => $this->input->post('DESCP_INTENSITAS',TRUE),
		'DESCP_ABSENSI' => $this->input->post('DESCP_ABSENSI',TRUE),
	    );

            $this->M_indeks->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('indeks'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_indeks->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('indeks/update_action'),
		'NIK' => set_value('NIK', $row->NIK),
		'NAMA_PEGAWAI' => set_value('NAMA_PEGAWAI', $row->NAMA_PEGAWAI),
		'DESCP_RUANGAN' => set_value('DESCP_RUANGAN', $row->DESCP_RUANGAN),
		'DESCP_LEVEL' => set_value('DESCP_LEVEL', $row->DESCP_LEVEL),
		'DESC_KARIR' => set_value('DESC_KARIR', $row->DESC_KARIR),
		'DESCP_RISIKO' => set_value('DESCP_RISIKO', $row->DESCP_RISIKO),
		'DESCP_KET' => set_value('DESCP_KET', $row->DESCP_KET),
		'DESCP_INTENSITAS' => set_value('DESCP_INTENSITAS', $row->DESCP_INTENSITAS),
		'DESCP_ABSENSI' => set_value('DESCP_ABSENSI', $row->DESCP_ABSENSI),
	    );
            $this->load->view('indeks/det_indeks_pegawai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('indeks'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'NIK' => $this->input->post('NIK',TRUE),
		'NAMA_PEGAWAI' => $this->input->post('NAMA_PEGAWAI',TRUE),
		'DESCP_RUANGAN' => $this->input->post('DESCP_RUANGAN',TRUE),
		'DESCP_LEVEL' => $this->input->post('DESCP_LEVEL',TRUE),
		'DESC_KARIR' => $this->input->post('DESC_KARIR',TRUE),
		'DESCP_RISIKO' => $this->input->post('DESCP_RISIKO',TRUE),
		'DESCP_KET' => $this->input->post('DESCP_KET',TRUE),
		'DESCP_INTENSITAS' => $this->input->post('DESCP_INTENSITAS',TRUE),
		'DESCP_ABSENSI' => $this->input->post('DESCP_ABSENSI',TRUE),
	    );

            $this->M_indeks->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('indeks'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_indeks->get_by_id($id);

        if ($row) {
            $this->M_indeks->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('indeks'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('indeks'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NIK', 'nik', 'trim|required');
	$this->form_validation->set_rules('NAMA_PEGAWAI', 'nama pegawai', 'trim|required');
	$this->form_validation->set_rules('DESCP_RUANGAN', 'descp ruangan', 'trim|required');
	$this->form_validation->set_rules('DESCP_LEVEL', 'descp level', 'trim|required');
	$this->form_validation->set_rules('DESC_KARIR', 'desc karir', 'trim|required');
	$this->form_validation->set_rules('DESCP_RISIKO', 'descp risiko', 'trim|required');
	$this->form_validation->set_rules('DESCP_KET', 'descp ket', 'trim|required');
	$this->form_validation->set_rules('DESCP_INTENSITAS', 'descp intensitas', 'trim|required');
	$this->form_validation->set_rules('DESCP_ABSENSI', 'descp absensi', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "det_indeks_pegawai.xls";
        $judul = "det_indeks_pegawai";
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
	xlsWriteLabel($tablehead, $kolomhead++, "DESCP RUANGAN");
	xlsWriteLabel($tablehead, $kolomhead++, "DESCP LEVEL");
	xlsWriteLabel($tablehead, $kolomhead++, "DESC KARIR");
	xlsWriteLabel($tablehead, $kolomhead++, "DESCP RISIKO");
	xlsWriteLabel($tablehead, $kolomhead++, "DESCP KET");
	xlsWriteLabel($tablehead, $kolomhead++, "DESCP INTENSITAS");
	xlsWriteLabel($tablehead, $kolomhead++, "DESCP ABSENSI");

	foreach ($this->M_indeks->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NIK);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NAMA_PEGAWAI);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESCP_RUANGAN);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESCP_LEVEL);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESC_KARIR);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESCP_RISIKO);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESCP_KET);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESCP_INTENSITAS);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESCP_ABSENSI);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Indeks.php */
/* Location: ./application/controllers/Indeks.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-30 05:12:14 */
/* http://harviacode.com */