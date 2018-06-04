<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ruangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_ruangan');
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
        $data ['main_view'] = 'admin/ruangan/mstr_ruangan_list';
        $this->load->view('theme/template', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_ruangan->json();
    }

    public function read($id)
    {
        $row = $this->M_ruangan->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_RUANGAN' => $row->ID_RUANGAN,
		'DESCP_RUANGAN' => $row->DESCP_RUANGAN,
	    );
            $data ['main_view'] = 'admin/ruangan/mstr_ruangan_read';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/ruangan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/ruangan/create_action'),
	    'ID_RUANGAN' => set_value('ID_RUANGAN'),
	    'DESCP_RUANGAN' => set_value('DESCP_RUANGAN'),
	);
        $data ['main_view'] = 'admin/ruangan/mstr_ruangan_form';
        $this->load->view('theme/template', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'DESCP_RUANGAN' => $this->input->post('DESCP_RUANGAN',TRUE),
	    );

            $this->M_ruangan->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil ditambahkan.
  </div>');
            redirect(site_url('admin/ruangan'));
        }
    }

    public function update($id)
    {
        $row = $this->M_ruangan->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/ruangan/update_action'),
		'ID_RUANGAN' => set_value('ID_RUANGAN', $row->ID_RUANGAN),
		'DESCP_RUANGAN' => set_value('DESCP_RUANGAN', $row->DESCP_RUANGAN),
	    );
            $data ['main_view'] = 'admin/ruangan/mstr_ruangan_form';
            $this->load->view('theme/template', $data);

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/ruangan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_RUANGAN', TRUE));
        } else {
            $data = array(
		'DESCP_RUANGAN' => $this->input->post('DESCP_RUANGAN',TRUE),
	    );

            $this->M_ruangan->update($this->input->post('ID_RUANGAN', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil diubah.
  </div>');
            redirect(site_url('admin/ruangan'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_ruangan->get_by_id($id);

        if ($row) {
            $this->M_ruangan->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil dihapus.
  </div>');
            redirect(site_url('admin/ruangan'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/ruangan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('DESCP_RUANGAN', 'descp ruangan', 'trim|required');

	$this->form_validation->set_rules('ID_RUANGAN', 'ID_RUANGAN', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mstr_ruangan.xls";
        $judul = "mstr_ruangan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "DESCP RUANGAN");

	foreach ($this->M_ruangan->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESCP_RUANGAN);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Ruangan.php */
/* Location: ./application/controllers/Ruangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-27 06:25:52 */
/* http://harviacode.com */
