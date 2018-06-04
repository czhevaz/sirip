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
        $this->datatables->select('ID_PEGAWAI,NIK,NAMA_PEGAWAI,ALAMAT,GENDER,TEMPAT_LAHIR,TGL_LAHIR,EMAIL,PHONE,PHOTO,AKTIF');
        $this->datatables->from('mstr_pegawai');
        //add this line for join
        //$this->datatables->join('table2', 'mstr_pegawai.field = table2.field');
        $this->datatables->add_column('action',
        anchor(site_url('admin/pegawai/update/$1'),'<i class="fa fa-edit fa-lg" title="Edit" style="color:orange;">
         </i>')."&nbsp;&nbsp;&nbsp;&nbsp"
        .anchor(site_url('admin/pegawai/delete/$1'),'<i class="fa fa-trash fa-lg" title="Hapus" style="color:red;">
         </i>','onclick="javasciprt: return confirm(\'Hapus Data ini ?\')"'), 'NIK');
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

    function valid_id($NIK)
    {
    $query = $this->db->get_where($this->table, array('NIK' => $NIK));
    if ($query->num_rows() > 0)
      {
        return TRUE;
      }
    else
      {
        return FALSE;
      }
    }

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-26 19:17:14 */
/* http://harviacode.com */