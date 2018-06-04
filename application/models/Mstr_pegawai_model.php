<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mstr_pegawai_model extends CI_Model
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
        $this->datatables->select('ID_PEGAWAI,NIK,NAMA_PEGAWAI,ALAMAT,GENDER,TEMPAT_LAHIR,TGL_LAHIR,EMAIL,PHONE,PHOTO,AKTIF');
        $this->datatables->from('mstr_pegawai');
        //add this line for join
        //$this->datatables->join('table2', 'mstr_pegawai.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('mstr_pegawai/read/$1'),'Read')." | ".anchor(site_url('mstr_pegawai/update/$1'),'Update')." | ".anchor(site_url('mstr_pegawai/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ID_PEGAWAI');
        return $this->datatables->generate();
    }

    // get all
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
	$this->db->or_like('ALAMAT', $q);
	$this->db->or_like('GENDER', $q);
	$this->db->or_like('TEMPAT_LAHIR', $q);
	$this->db->or_like('TGL_LAHIR', $q);
	$this->db->or_like('EMAIL', $q);
	$this->db->or_like('PHONE', $q);
	$this->db->or_like('PHOTO', $q);
	$this->db->or_like('AKTIF', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_PEGAWAI', $q);
	$this->db->or_like('NIK', $q);
	$this->db->or_like('NAMA_PEGAWAI', $q);
	$this->db->or_like('ALAMAT', $q);
	$this->db->or_like('GENDER', $q);
	$this->db->or_like('TEMPAT_LAHIR', $q);
	$this->db->or_like('TGL_LAHIR', $q);
	$this->db->or_like('EMAIL', $q);
	$this->db->or_like('PHONE', $q);
	$this->db->or_like('PHOTO', $q);
	$this->db->or_like('AKTIF', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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

/* End of file Mstr_pegawai_model.php */
/* Location: ./application/models/Mstr_pegawai_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-01 06:46:49 */
/* http://harviacode.com */