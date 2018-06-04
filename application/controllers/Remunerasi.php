<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Remunerasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_remunerasi');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('remunerasi/mstr_pegawai_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_remunerasi->json();
    }

    public function read($id) 
    {
        $row = $this->M_remunerasi->get_by_id($id);
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
            $this->load->view('remunerasi/mstr_pegawai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('remunerasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('remunerasi/create_action'),
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
        $this->load->view('remunerasi/mstr_pegawai_form', $data);
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

            $this->M_remunerasi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('remunerasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_remunerasi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('remunerasi/update_action'),
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
            $this->load->view('remunerasi/mstr_pegawai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('remunerasi'));
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

            $this->M_remunerasi->update($this->input->post('ID_PEGAWAI', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('remunerasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_remunerasi->get_by_id($id);

        if ($row) {
            $this->M_remunerasi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('remunerasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('remunerasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NIK', 'nik', 'trim|required');
	$this->form_validation->set_rules('NAMA_PEGAWAI', 'nama pegawai', 'trim|required');
	$this->form_validation->set_rules('ID_LEVEL', 'id level', 'trim|required');
	$this->form_validation->set_rules('ID_RUANGAN', 'id ruangan', 'trim|required');
	$this->form_validation->set_rules('ID_KARIR', 'id karir', 'trim|required');
	$this->form_validation->set_rules('ID_RISIKO', 'id risiko', 'trim|required');
	$this->form_validation->set_rules('ID_KET', 'id ket', 'trim|required');
	$this->form_validation->set_rules('ID_INTENSITAS', 'id intensitas', 'trim|required');
	$this->form_validation->set_rules('ID_ABSENSI', 'id absensi', 'trim|required');
	$this->form_validation->set_rules('ALAMAT', 'alamat', 'trim|required');
	$this->form_validation->set_rules('GENDER', 'gender', 'trim|required');
	$this->form_validation->set_rules('TEMPAT_LAHIR', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('TGL_LAHIR', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('EMAIL', 'email', 'trim|required');
	$this->form_validation->set_rules('PHONE', 'phone', 'trim|required');
	$this->form_validation->set_rules('STATUS', 'status', 'trim|required');

	$this->form_validation->set_rules('ID_PEGAWAI', 'ID_PEGAWAI', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Remunerasi.php */
/* Location: ./application/controllers/Remunerasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-26 17:36:21 */
/* http://harviacode.com */