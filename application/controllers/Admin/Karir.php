<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_karir');
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
        $data ['main_view'] = 'admin/karir/mstr_karir_list';
        $this->load->view('theme/template', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_karir->json();
    }

    public function read($id)
    {
        $row = $this->M_karir->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_KARIR' => $row->ID_KARIR,
		'DESCP_KARIR' => $row->DESCP_KARIR,
		'POINT_KARIR' => $row->POINT_KARIR,
	    );
            $data ['main_view'] = 'admin/karir/mstr_karir_read';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/karir'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/karir/create_action'),
	    'ID_KARIR' => set_value('ID_KARIR'),
	    'DESCP_KARIR' => set_value('DESCP_KARIR'),
	    'POINT_KARIR' => set_value('POINT_KARIR'),
	);
  $data ['main_view'] = 'admin/karir/mstr_karir_form';
  $this->load->view('theme/template', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    'ID_KARIR' => $this->input->post('ID_KARIR',TRUE),
		'DESCP_KARIR' => $this->input->post('DESCP_KARIR',TRUE),
    'POINT_KARIR' => $this->input->post('POINT_KARIR',TRUE),
	    );

            $this->M_karir->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil ditambahkan.
  </div>');
            redirect(site_url('admin/karir'));
        }
    }

    public function update($id)
    {
        $row = $this->M_karir->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/karir/update_action'),
		'ID_KARIR' => set_value('ID_KARIR', $row->ID_KARIR),
		'DESCP_KARIR' => set_value('DESCP_KARIR', $row->DESCP_KARIR),
		'POINT_KARIR' => set_value('POINT_KARIR', $row->POINT_KARIR),
	    );
            $data ['main_view'] = 'admin/karir/mstr_karir_form';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/karir'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_KARIR', TRUE));
        } else {
            $data = array(
              'ID_KARIR' => $this->input->post('ID_KARIR',TRUE),
          		'DESCP_KARIR' => $this->input->post('DESCP_KARIR',TRUE),
              'POINT_KARIR' => $this->input->post('POINT_KARIR',TRUE),
	    );

            $this->M_karir->update($this->input->post('ID_KARIR', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil diubah.
  </div>');
            redirect(site_url('admin/karir'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_karir->get_by_id($id);

        if ($row) {
            $this->M_karir->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil dihapus.
  </div>');
            redirect(site_url('admin/karir'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/karir'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('DESCP_KARIR', 'desc karir', 'trim|required');
  $this->form_validation->set_rules('POINT_KARIR', 'POINT_KARIR', 'trim|required');
	$this->form_validation->set_rules('ID_KARIR', 'ID_KARIR', 'trim|required');
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

	foreach ($this->M_karir->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESCP_KARIR);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Karir.php */
/* Location: ./application/controllers/Karir.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-26 21:48:31 */
/* http://harviacode.com */
