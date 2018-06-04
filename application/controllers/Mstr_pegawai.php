<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mstr_pegawai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mstr_pegawai_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('mstr_pegawai/mstr_pegawai_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mstr_pegawai_model->json();
    }

    public function read($id) 
    {
        $row = $this->Mstr_pegawai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_PEGAWAI' => $row->ID_PEGAWAI,
		'NIK' => $row->NIK,
		'NAMA_PEGAWAI' => $row->NAMA_PEGAWAI,
		'ALAMAT' => $row->ALAMAT,
		'GENDER' => $row->GENDER,
		'TEMPAT_LAHIR' => $row->TEMPAT_LAHIR,
		'TGL_LAHIR' => $row->TGL_LAHIR,
		'EMAIL' => $row->EMAIL,
		'PHONE' => $row->PHONE,
		'PHOTO' => $row->PHOTO,
		'AKTIF' => $row->AKTIF,
	    );
            $this->load->view('mstr_pegawai/mstr_pegawai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mstr_pegawai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mstr_pegawai/create_action'),
	    'ID_PEGAWAI' => set_value('ID_PEGAWAI'),
	    'NIK' => set_value('NIK'),
	    'NAMA_PEGAWAI' => set_value('NAMA_PEGAWAI'),
	    'ALAMAT' => set_value('ALAMAT'),
	    'GENDER' => set_value('GENDER'),
	    'TEMPAT_LAHIR' => set_value('TEMPAT_LAHIR'),
	    'TGL_LAHIR' => set_value('TGL_LAHIR'),
	    'EMAIL' => set_value('EMAIL'),
	    'PHONE' => set_value('PHONE'),
	    'PHOTO' => set_value('PHOTO'),
	    'AKTIF' => set_value('AKTIF'),
	);
        $this->load->view('mstr_pegawai/mstr_pegawai_form', $data);
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
		'ALAMAT' => $this->input->post('ALAMAT',TRUE),
		'GENDER' => $this->input->post('GENDER',TRUE),
		'TEMPAT_LAHIR' => $this->input->post('TEMPAT_LAHIR',TRUE),
		'TGL_LAHIR' => $this->input->post('TGL_LAHIR',TRUE),
		'EMAIL' => $this->input->post('EMAIL',TRUE),
		'PHONE' => $this->input->post('PHONE',TRUE),
		'PHOTO' => $this->input->post('PHOTO',TRUE),
		'AKTIF' => $this->input->post('AKTIF',TRUE),
	    );

            $this->Mstr_pegawai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mstr_pegawai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mstr_pegawai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mstr_pegawai/update_action'),
		'ID_PEGAWAI' => set_value('ID_PEGAWAI', $row->ID_PEGAWAI),
		'NIK' => set_value('NIK', $row->NIK),
		'NAMA_PEGAWAI' => set_value('NAMA_PEGAWAI', $row->NAMA_PEGAWAI),
		'ALAMAT' => set_value('ALAMAT', $row->ALAMAT),
		'GENDER' => set_value('GENDER', $row->GENDER),
		'TEMPAT_LAHIR' => set_value('TEMPAT_LAHIR', $row->TEMPAT_LAHIR),
		'TGL_LAHIR' => set_value('TGL_LAHIR', $row->TGL_LAHIR),
		'EMAIL' => set_value('EMAIL', $row->EMAIL),
		'PHONE' => set_value('PHONE', $row->PHONE),
		'PHOTO' => set_value('PHOTO', $row->PHOTO),
		'AKTIF' => set_value('AKTIF', $row->AKTIF),
	    );
            $this->load->view('mstr_pegawai/mstr_pegawai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mstr_pegawai'));
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
		'ALAMAT' => $this->input->post('ALAMAT',TRUE),
		'GENDER' => $this->input->post('GENDER',TRUE),
		'TEMPAT_LAHIR' => $this->input->post('TEMPAT_LAHIR',TRUE),
		'TGL_LAHIR' => $this->input->post('TGL_LAHIR',TRUE),
		'EMAIL' => $this->input->post('EMAIL',TRUE),
		'PHONE' => $this->input->post('PHONE',TRUE),
		'PHOTO' => $this->input->post('PHOTO',TRUE),
		'AKTIF' => $this->input->post('AKTIF',TRUE),
	    );

            $this->Mstr_pegawai_model->update($this->input->post('ID_PEGAWAI', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mstr_pegawai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mstr_pegawai_model->get_by_id($id);

        if ($row) {
            $this->Mstr_pegawai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mstr_pegawai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mstr_pegawai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NIK', 'nik', 'trim|required');
	$this->form_validation->set_rules('NAMA_PEGAWAI', 'nama pegawai', 'trim|required');
	$this->form_validation->set_rules('ALAMAT', 'alamat', 'trim|required');
	$this->form_validation->set_rules('GENDER', 'gender', 'trim|required');
	$this->form_validation->set_rules('TEMPAT_LAHIR', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('TGL_LAHIR', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('EMAIL', 'email', 'trim|required');
	$this->form_validation->set_rules('PHONE', 'phone', 'trim|required');
	$this->form_validation->set_rules('PHOTO', 'photo', 'trim|required');
	$this->form_validation->set_rules('AKTIF', 'aktif', 'trim|required');

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
	xlsWriteLabel($tablehead, $kolomhead++, "ALAMAT");
	xlsWriteLabel($tablehead, $kolomhead++, "GENDER");
	xlsWriteLabel($tablehead, $kolomhead++, "TEMPAT LAHIR");
	xlsWriteLabel($tablehead, $kolomhead++, "TGL LAHIR");
	xlsWriteLabel($tablehead, $kolomhead++, "EMAIL");
	xlsWriteLabel($tablehead, $kolomhead++, "PHONE");
	xlsWriteLabel($tablehead, $kolomhead++, "PHOTO");
	xlsWriteLabel($tablehead, $kolomhead++, "AKTIF");

	foreach ($this->Mstr_pegawai_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NIK);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NAMA_PEGAWAI);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ALAMAT);
	    xlsWriteLabel($tablebody, $kolombody++, $data->GENDER);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TEMPAT_LAHIR);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TGL_LAHIR);
	    xlsWriteLabel($tablebody, $kolombody++, $data->EMAIL);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PHONE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PHOTO);
	    xlsWriteLabel($tablebody, $kolombody++, $data->AKTIF);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Mstr_pegawai.php */
/* Location: ./application/controllers/Mstr_pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-01 06:46:49 */
/* http://harviacode.com */