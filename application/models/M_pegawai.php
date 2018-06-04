<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pegawai extends CI_Model
{

    public $table = 'mstr_pegawai';
    public $id = 'ID_PEGAWAI';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('ID_PEGAWAI,NIK,NAMA_PEGAWAI,ALAMAT,GENDER,TEMPAT_LAHIR,TGL_LAHIR,EMAIL,PHONE,mstr_level.DESCP_LEVEL, mstr_ruangan.DESCP_RUANGAN as NamaRuangan,
                                  mstr_karir.DESCP_KARIR as JenjangKarir, mstr_risiko_kerja.DESCP_RISIKO as RisikoKerja, mstr_ket_khusus.DESCP_KET as KetKhusus,
                                  mstr_intensitas.DESCP_INTENSITAS as IntensitasPasien, mstr_absensi.DESCP_ABSENSI as Kehadiran');
        $this->datatables->from('mstr_pegawai');
        $this->datatables->join('mstr_level', 'mstr_pegawai.ID_LEVEL = mstr_level.ID_LEVEL', 'LEFT');
        $this->datatables->join('mstr_ruangan', 'mstr_pegawai.ID_RUANGAN = mstr_ruangan.ID_RUANGAN', 'LEFT');
        $this->datatables->join('mstr_karir', 'mstr_pegawai.ID_KARIR = mstr_karir.ID_KARIR', 'LEFT');
        $this->datatables->join('mstr_risiko_kerja', 'mstr_pegawai.ID_RISIKO = mstr_risiko_kerja.ID_RISIKO', 'LEFT');
        $this->datatables->join('mstr_ket_khusus', 'mstr_pegawai.ID_KET = mstr_ket_khusus.ID_KET', 'LEFT');
        $this->datatables->join('mstr_intensitas', 'mstr_pegawai.ID_INTENSITAS = mstr_intensitas.ID_INTENSITAS', 'LEFT');
        $this->datatables->join('mstr_absensi', 'mstr_pegawai.ID_ABSENSI = mstr_absensi.ID_ABSENSI', 'LEFT');
        $this->datatables->where('mstr_pegawai.STATUS', 'Y');
        //add this line for join
        //$this->datatables->join('table2', 'mstr_pegawai.field = table2.field');
        $this->datatables->add_column('aktif', '<span class="badge badge-success"><i class="fa fa-check" aria-hidden="true">Aktif</i></span>');
        $this->datatables->add_column('action',
        anchor(site_url('admin/pegawai/update/$1'),'<i class="fa fa-edit fa-lg" title="Edit" style="color:orange;">
         </i>')."&nbsp;"
        .anchor(site_url('admin/pegawai/delete/$1'),'<i class="fa fa-trash fa-lg" title="Hapus" style="color:red;">
         </i>','onclick="javasciprt: return confirm(\'Hapus Data ini ?\')"'), 'ID_PEGAWAI');
        return $this->datatables->generate();
    }

    // get alll
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID_PEGAWAI', $q);
	$this->db->or_like('NIK', $q);
	$this->db->or_like('NAMA_PEGAWAI', $q);
	$this->db->or_like('ID_LEVEL', $q);
	$this->db->or_like('ID_RUANGAN', $q);
	$this->db->or_like('ID_KARIR', $q);
	$this->db->or_like('ID_RISIKO', $q);
	$this->db->or_like('ID_KET', $q);
	$this->db->or_like('ID_INTENSITAS', $q);
	$this->db->or_like('ID_ABSENSI', $q);
	$this->db->or_like('ALAMAT', $q);
	$this->db->or_like('GENDER', $q);
	$this->db->or_like('TEMPAT_LAHIR', $q);
	$this->db->or_like('TGL_LAHIR', $q);
	$this->db->or_like('EMAIL', $q);
	$this->db->or_like('PHONE', $q);
	$this->db->or_like('STATUS', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_PEGAWAI', $q);
	$this->db->or_like('NIK', $q);
	$this->db->or_like('NAMA_PEGAWAI', $q);
	$this->db->or_like('ID_LEVEL', $q);
	$this->db->or_like('ID_RUANGAN', $q);
	$this->db->or_like('ID_KARIR', $q);
	$this->db->or_like('ID_RISIKO', $q);
	$this->db->or_like('ID_KET', $q);
	$this->db->or_like('ID_INTENSITAS', $q);
	$this->db->or_like('ID_ABSENSI', $q);
	$this->db->or_like('ALAMAT', $q);
	$this->db->or_like('GENDER', $q);
	$this->db->or_like('TEMPAT_LAHIR', $q);
	$this->db->or_like('TGL_LAHIR', $q);
	$this->db->or_like('EMAIL', $q);
	$this->db->or_like('PHONE', $q);
	$this->db->or_like('STATUS', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function insert_skor($data)
    {
        $this->db->insert('skor_awal', $data);
    }
    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-01 18:46:39 */
/* http://harviacode.com */
