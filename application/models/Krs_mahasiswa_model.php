<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Krs_mahasiswa_model extends CI_Model
{

    public $table = 'krs_mahasiswa';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {

        $this->datatables->select('u.*,km.id as id_krs');
        $this->datatables->from('matakuliah u');
        $this->datatables->join('krs_mahasiswa km', 'u.id = km.id_matakuliah', 'left');
        $this->datatables->group_by('u.id');

        //add this line for join
        return $this->datatables->generate();
    }

    function get_all_mahasiswa($id_matakuliah)
    {
        $this->db->select('u.*,km.id as id_krs');
        $this->db->from('user u');
        $this->db->join('users_groups ug', 'u.id = ug.user_id');
        $this->db->join('krs_mahasiswa km', 'u.id = km.id_mahasiswa', 'left');
        $this->db->where('ug.group_id', 13);
        // $this->db->where('km.id', $id_matakuliah);
        return $this->db->get()->result();
    }

    function assignMatakuliah($id_matakuliah, $id_mahasiswa)
    {
        $this->db->where('id_matakuliah', $id_matakuliah);
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $data = $this->db->get('krs_mahasiswa')->row();
        if ($data) {
            $this->db->where('id_matakuliah', $id_matakuliah);
            $this->db->where('id_mahasiswa', $id_mahasiswa);
            $this->db->delete('krs_mahasiswa');
            $result = [
                'status' => 'delete',
                'message' => 'Data berhasil dihapus',
                'true' => true
            ];
        } else {
            $this->db->insert('krs_mahasiswa', [
                'id_matakuliah' => $id_matakuliah,
                'id_mahasiswa' => $id_mahasiswa,
            ]);
            $result = [
                'status' => 'insert',
                'message' => 'Data berhasil ditambahkan',
                'true' => true
            ];
        }
        return $result;
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
        $this->db->or_like('id_mahasiswa', $q);
        $this->db->or_like('id_matakuliah', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('id_mahasiswa', $q);
        $this->db->or_like('id_matakuliah', $q);
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

/* End of file Krs_mahasiswa_model.php */
/* Location: ./application/models/Krs_mahasiswa_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-09 17:55:48 */
/* http://harviacode.com */