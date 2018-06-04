<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Point_pegawai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_point_pegawai');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('point_pegawai/point_pegawai_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_point_pegawai->json();
    }

    public function read($id) 
    {
        $row = $this->M_point_pegawai->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_PEGAWAI' => $row->ID_PEGAWAI,
		'NAMA_PEGAWAI' => $row->NAMA_PEGAWAI,
		'point' => $row->point,
	    );
            $this->load->view('point_pegawai/point_pegawai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('point_pegawai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('point_pegawai/create_action'),
	    'ID_PEGAWAI' => set_value('ID_PEGAWAI'),
	    'NAMA_PEGAWAI' => set_value('NAMA_PEGAWAI'),
	    'point' => set_value('point'),
	);
        $this->load->view('point_pegawai/point_pegawai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ID_PEGAWAI' => $this->input->post('ID_PEGAWAI',TRUE),
		'NAMA_PEGAWAI' => $this->input->post('NAMA_PEGAWAI',TRUE),
		'point' => $this->input->post('point',TRUE),
	    );

            $this->M_point_pegawai->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('point_pegawai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_point_pegawai->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('point_pegawai/update_action'),
		'ID_PEGAWAI' => set_value('ID_PEGAWAI', $row->ID_PEGAWAI),
		'NAMA_PEGAWAI' => set_value('NAMA_PEGAWAI', $row->NAMA_PEGAWAI),
		'point' => set_value('point', $row->point),
	    );
            $this->load->view('point_pegawai/point_pegawai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('point_pegawai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'ID_PEGAWAI' => $this->input->post('ID_PEGAWAI',TRUE),
		'NAMA_PEGAWAI' => $this->input->post('NAMA_PEGAWAI',TRUE),
		'point' => $this->input->post('point',TRUE),
	    );

            $this->M_point_pegawai->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('point_pegawai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_point_pegawai->get_by_id($id);

        if ($row) {
            $this->M_point_pegawai->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('point_pegawai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('point_pegawai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ID_PEGAWAI', 'id pegawai', 'trim|required');
	$this->form_validation->set_rules('NAMA_PEGAWAI', 'nama pegawai', 'trim|required');
	$this->form_validation->set_rules('point', 'point', 'trim|required|numeric');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "point_pegawai.xls";
        $judul = "point_pegawai";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ID PEGAWAI");
	xlsWriteLabel($tablehead, $kolomhead++, "NAMA PEGAWAI");
	xlsWriteLabel($tablehead, $kolomhead++, "Point");

	foreach ($this->M_point_pegawai->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ID_PEGAWAI);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NAMA_PEGAWAI);
	    xlsWriteNumber($tablebody, $kolombody++, $data->point);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Point_pegawai.php */
/* Location: ./application/controllers/Point_pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-27 20:56:58 */
/* http://harviacode.com */