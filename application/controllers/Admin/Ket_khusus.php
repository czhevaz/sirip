<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ket_khusus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_ket_khusus');
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
        $data ['main_view'] = 'admin/ket_khusus/mstr_ket_khusus_list';
        $this->load->view('theme/template', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_ket_khusus->json();
    }

    public function read($id)
    {
        $row = $this->M_ket_khusus->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_KET' => $row->ID_KET,
		'DESCP_KET' => $row->DESCP_KET,
		'POINT_KET' => $row->POINT_KET,
	    );
            $data ['main_view'] = 'admin/ket_khusus/mstr_ket_khusus_read';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/ket_khusus'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/ket_khusus/create_action'),
	    'ID_KET' => set_value('ID_KET'),
	    'DESCP_KET' => set_value('DESCP_KET'),
	    'POINT_KET' => set_value('POINT_KET'),
	);
        $data ['main_view'] = 'admin/ket_khusus/mstr_ket_khusus_form';
        $this->load->view('theme/template', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'DESCP_KET' => $this->input->post('DESCP_KET',TRUE),
		'POINT_KET' => $this->input->post('POINT_KET',TRUE),
	    );

            $this->M_ket_khusus->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil ditambahkan.
  </div>');
            redirect(site_url('admin/ket_khusus'));
        }
    }

    public function update($id)
    {
        $row = $this->M_ket_khusus->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/ket_khusus/update_action'),
		'ID_KET' => set_value('ID_KET', $row->ID_KET),
		'DESCP_KET' => set_value('DESCP_KET', $row->DESCP_KET),
		'POINT_KET' => set_value('POINT_KET', $row->POINT_KET),
	    );
            $data ['main_view'] = 'admin/ket_khusus/mstr_ket_khusus_form';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/ket_khusus'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_KET', TRUE));
        } else {
            $data = array(
		'DESCP_KET' => $this->input->post('DESCP_KET',TRUE),
		'POINT_KET' => $this->input->post('POINT_KET',TRUE),
	    );

            $this->M_ket_khusus->update($this->input->post('ID_KET', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil diubah.
  </div>');
            redirect(site_url('admin/ket_khusus'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_ket_khusus->get_by_id($id);

        if ($row) {
            $this->M_ket_khusus->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil dihapus.
  </div>');
            redirect(site_url('admin/ket_khusus'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/ket_khusus'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('DESCP_KET', 'descp ket', 'trim|required');
	$this->form_validation->set_rules('POINT_KET', 'point ket', 'trim|required|numeric');

	$this->form_validation->set_rules('ID_KET', 'ID_KET', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mstr_ket_khusus.xls";
        $judul = "mstr_ket_khusus";
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
	xlsWriteLabel($tablehead, $kolomhead++, "DESCP KET");
	xlsWriteLabel($tablehead, $kolomhead++, "POINT KET");

	foreach ($this->M_ket_khusus->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESCP_KET);
	    xlsWriteNumber($tablebody, $kolombody++, $data->POINT_KET);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Ket_khusus.php */
/* Location: ./application/controllers/Ket_khusus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-27 12:34:22 */
/* http://harviacode.com */
