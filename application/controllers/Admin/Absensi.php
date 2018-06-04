<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_absensi');
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
        $data ['main_view'] = 'admin/absensi/mstr_absensi_list';
        $this->load->view('theme/template', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_absensi->json();
    }

    public function read($id)
    {
        $row = $this->M_absensi->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_ABSENSI' => $row->ID_ABSENSI,
		'DESCP_ABSENSI' => $row->DESCP_ABSENSI,
		'POINT_ABSENSI' => $row->POINT_ABSENSI,
	    );
            $data ['main_view'] = 'admin/absensi/mstr_absensi_read';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/absensi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/absensi/create_action'),
	    'ID_ABSENSI' => set_value('ID_ABSENSI'),
	    'DESCP_ABSENSI' => set_value('DESCP_ABSENSI'),
	    'POINT_ABSENSI' => set_value('POINT_ABSENSI'),
	);
        $data ['main_view'] = 'admin/absensi/mstr_absensi_form';
        $this->load->view('theme/template', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'DESCP_ABSENSI' => $this->input->post('DESCP_ABSENSI',TRUE),
		'POINT_ABSENSI' => $this->input->post('POINT_ABSENSI',TRUE),
	    );

            $this->M_absensi->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil ditambahkan.
  </div>');
            redirect(site_url('admin/absensi'));
        }
    }

    public function update($id)
    {
        $row = $this->M_absensi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/absensi/update_action'),
		'ID_ABSENSI' => set_value('ID_ABSENSI', $row->ID_ABSENSI),
		'DESCP_ABSENSI' => set_value('DESCP_ABSENSI', $row->DESCP_ABSENSI),
		'POINT_ABSENSI' => set_value('POINT_ABSENSI', $row->POINT_ABSENSI),
	    );
            $data ['main_view'] = 'admin/absensi/mstr_absensi_form';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/absensi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_ABSENSI', TRUE));
        } else {
            $data = array(
		'DESCP_ABSENSI' => $this->input->post('DESCP_ABSENSI',TRUE),
		'POINT_ABSENSI' => $this->input->post('POINT_ABSENSI',TRUE),
	    );

            $this->M_absensi->update($this->input->post('ID_ABSENSI', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil diubah.
  </div>');
            redirect(site_url('admin/absensi'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_absensi->get_by_id($id);

        if ($row) {
            $this->M_absensi->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil dihapus.
  </div>');
            redirect(site_url('admin/absensi'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/absensi'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('DESCP_ABSENSI', 'descp absensi', 'trim|required');
	$this->form_validation->set_rules('POINT_ABSENSI', 'point absensi', 'trim|required|numeric');

	$this->form_validation->set_rules('ID_ABSENSI', 'ID_ABSENSI', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mstr_absensi.xls";
        $judul = "mstr_absensi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "DESCP ABSENSI");
	xlsWriteLabel($tablehead, $kolomhead++, "POINT ABSENSI");

	foreach ($this->M_absensi->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESCP_ABSENSI);
	    xlsWriteNumber($tablebody, $kolombody++, $data->POINT_ABSENSI);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Absensi.php */
/* Location: ./application/controllers/Absensi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-27 22:12:24 */
/* http://harviacode.com */
