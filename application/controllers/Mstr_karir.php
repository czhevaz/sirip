<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mstr_karir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mstr_karir_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('mstr_karir/mstr_karir_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mstr_karir_model->json();
    }

    public function read($id) 
    {
        $row = $this->Mstr_karir_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_KARIR' => $row->ID_KARIR,
		'DESC_KARIR' => $row->DESC_KARIR,
		'POINT_KARIR' => $row->POINT_KARIR,
	    );
            $this->load->view('mstr_karir/mstr_karir_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mstr_karir'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mstr_karir/create_action'),
	    'ID_KARIR' => set_value('ID_KARIR'),
	    'DESC_KARIR' => set_value('DESC_KARIR'),
	    'POINT_KARIR' => set_value('POINT_KARIR'),
	);
        $this->load->view('mstr_karir/mstr_karir_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'DESC_KARIR' => $this->input->post('DESC_KARIR',TRUE),
	    );

            $this->Mstr_karir_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mstr_karir'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mstr_karir_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mstr_karir/update_action'),
		'ID_KARIR' => set_value('ID_KARIR', $row->ID_KARIR),
		'DESC_KARIR' => set_value('DESC_KARIR', $row->DESC_KARIR),
		'POINT_KARIR' => set_value('POINT_KARIR', $row->POINT_KARIR),
	    );
            $this->load->view('mstr_karir/mstr_karir_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mstr_karir'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_KARIR', TRUE));
        } else {
            $data = array(
		'DESC_KARIR' => $this->input->post('DESC_KARIR',TRUE),
	    );

            $this->Mstr_karir_model->update($this->input->post('ID_KARIR', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mstr_karir'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mstr_karir_model->get_by_id($id);

        if ($row) {
            $this->Mstr_karir_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mstr_karir'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mstr_karir'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('DESC_KARIR', 'desc karir', 'trim|required');

	$this->form_validation->set_rules('ID_KARIR', 'ID_KARIR', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mstr_karir.xls";
        $judul = "mstr_karir";
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
	xlsWriteLabel($tablehead, $kolomhead++, "DESC KARIR");

	foreach ($this->Mstr_karir_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESC_KARIR);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Mstr_karir.php */
/* Location: ./application/controllers/Mstr_karir.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-26 22:52:06 */
/* http://harviacode.com */