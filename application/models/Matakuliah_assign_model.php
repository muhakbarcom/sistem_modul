<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Matakuliah_assign_model extends CI_Model
{

    public $table = 'matakuliah_assign';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('m.id, m.kode_matakuliah, m.nama_matakuliah as matakuliah_nm, ma.id_kelas, k.nama_kelas as kelas_nm, ma.id as id_assign');
        $this->datatables->from('matakuliah m');
        //add this line for join
        $this->datatables->join('matakuliah_assign ma', 'm.id = ma.id_matakuliah', 'left');
        $this->datatables->join('kelas k', 'ma.id_kelas = k.id', 'left');
        // $this->datatables->add_column('action', anchor(site_url('matakuliah_assign/read/$1'), '<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"') . "  " . anchor(site_url('matakuliah_assign/update/$1'), '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"') . "  " . anchor(site_url('matakuliah_assign/delete/$1'), '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="return confirmdelete(\'matakuliah_assign/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id');
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
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('id_matakuliah', $q);
        $this->db->or_like('id_kelas', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('id_matakuliah', $q);
        $this->db->or_like('id_kelas', $q);
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

    // delete bulkdata
    function deletebulk()
    {
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data);
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);
    }
}

/* End of file Matakuliah_assign_model.php */
/* Location: ./application/models/Matakuliah_assign_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-09 09:29:55 */
/* http://harviacode.com */