<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mstr_karir_model extends CI_Model
{

    public $table = 'mstr_karir';
    public $id = 'ID_KARIR';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('ID_KARIR,DESC_KARIR,POINT_KARIR');
        $this->datatables->from('mstr_karir');
        //add this line for join
        //$this->datatables->join('table2', 'mstr_karir.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('mstr_karir/read/$1'),'Read')." | ".anchor(site_url('mstr_karir/update/$1'),'Update')." | ".anchor(site_url('mstr_karir/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ID_KARIR');
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
        $this->db->like('ID_KARIR', $q);
	$this->db->or_like('DESC_KARIR', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_KARIR', $q);
	$this->db->or_like('DESC_KARIR', $q);
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

/* End of file Mstr_karir_model.php */
/* Location: ./application/models/Mstr_karir_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-26 22:52:06 */
/* http://harviacode.com */