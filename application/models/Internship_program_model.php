<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Internship_program_model extends CI_Model
{

    public $table = 'internship_program';
    public $id = 'id_program';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id_program,program_name,program_desc,program_start,program_end');
        $this->datatables->from('internship_program');
        //add this line for join
        //$this->datatables->join('table2', 'internship_program.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('internship_program/read/$1'), '<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"') . "  " . anchor(site_url('internship_program/update/$1'), '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"') . "  " . anchor(site_url('internship_program/delete/$1'), '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="return confirmdelete(\'internship_program/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_program');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by("program_start", $this->order);
        return $this->db->get($this->table)->result();
    }

    function getAllByIdUser($id_user, $id_program = null)
    {
        $this->db->from('internship_program p');
        $this->db->join('internship_program_mahasiswa m', 'p.id_program = m.id_program', 'inner');
        $this->db->where('m.id_user', $id_user);
        if ($id_program != null) {
            $this->db->where('p.id_program', $id_program);
        }
        $this->db->order_by("p.program_start", $this->order);
        return $this->db->get()->result();
    }

    function register($id_program, $user)
    {
        $data = array(
            'id_program' => $id_program,
            'id_user' => $user,
            // 'id_role' => $this->input->post('id_role', TRUE),
            'created_at' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('internship_program_mahasiswa', $data);
        return $this->db->insert_id();
    }

    function insertStepRegister($data) // step 1 pendaftaran
    {
        $dataDetail = array(
            'id_program_mahasiswa' => $data['id'],
            'step' => $data['step'],
            'created_at' => date('Y-m-d H:i:s'),
            'status' => $data['status']
        );
        $this->db->insert('internship_program_mahasiswa_detail', $dataDetail);
        $id = $this->db->insert_id();

        if ($id) {
            // update id_role and step to internship_program_mahasiswa
            $this->db->where('id', $data["id"]);
            $this->db->update('internship_program_mahasiswa', array('id_role' => $data['id_role'], 'step' => $data['step']));

            return true;
        } else {
            return false;
        }
    }

    function insertStepAdministration($data)
    {
        $dataDetail = array(
            'id_program_mahasiswa' => $data['id'],
            'step' => $data['step'],
            'created_at' => date('Y-m-d H:i:s'),
            'status' => $data['status']
        );
        $this->db->insert('internship_program_mahasiswa_detail', $dataDetail);
        $id = $this->db->insert_id();

        if ($id) {
            $this->db->where('id', $data["id"]);
            $this->db->update('internship_program_mahasiswa', array('cv' => $data['cv'], 'step' => $data['step']));

            if ($this->db->affected_rows() > 0) {
                return true; // Update berhasil
            } else {
                return false; // Update gagal
            }

            return true;
        } else {
            return false;
        }
    }

    function insertStepInterview($data)
    {
        $dataDetail = array(
            'id_program_mahasiswa' => $data['id'],
            'step' => $data['step'],
            'created_at' => date('Y-m-d H:i:s'),
            'status' => $data['status']
        );
        $this->db->insert('internship_program_mahasiswa_detail', $dataDetail);
        $id = $this->db->insert_id();

        if ($id) {
            $this->db->where('id', $data["id"]);
            $this->db->update('internship_program_mahasiswa', array('link_interview' => $data['link_interview'], 'step' => $data['step']));

            if ($this->db->affected_rows() > 0) {
                return true; // Update berhasil
            } else {
                return false; // Update gagal
            }

            return true;
        } else {
            return false;
        }
    }

    function insertLaporanHarian($data)
    {
        $this->db->insert('laporan_harian', $data);
        $id = $this->db->insert_id();

        if ($id) {
            return true;
        } else {
            return false;
        }
    }

    function insertLaporanMingguan($data)
    {
        $this->db->insert('laporan_mingguan', $data);
        $id = $this->db->insert_id();

        if ($id) {
            return true;
        } else {
            return false;
        }
    }

    function IsThereWeeklyReport($data)
    {
        $this->db->where('id_program_mahasiswa', $data['id_program_mahasiswa']);
        $this->db->where('weekStart', $data['weekStart']);
        $this->db->where('weekEnd', $data['weekEnd']);
        $this->db->from('laporan_mingguan');
        $res = $this->db->get()->row_array();

        return $res;
    }

    function getDataLaporanharian($id_program_mahasiswa = null)
    {
        $this->db->select('lh.*, m.nama, m.nim, p.program_name');
        $this->db->from('laporan_harian lh');
        $this->db->join('internship_program_mahasiswa m', 'lh.id_program_mahasiswa = m.id', 'inner');
        $this->db->join('internship_program p', 'm.id_program = p.id_program', 'inner');
        if ($id_program_mahasiswa != null) {
            $this->db->where('lh.id_program_mahasiswa', $id_program_mahasiswa);
        }
        $this->db->order_by("lh.created_at", "desc");
        return $this->db->get()->result();
    }

    function isRegistered($id_program, $id_user)
    {
        $this->db->where('id_program', $id_program);
        $this->db->where('id_user', $id_user);
        $this->db->from('internship_program_mahasiswa');
        return $this->db->count_all_results();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function getRoleByIdProgram($id)
    {
        $this->db->select('pr.*, r.role_name');

        $this->db->where("pr.id_i_program", $id);
        $this->db->join('internship_role r', 'pr.id_i_role = r.id_internship_role', 'left');
        $this->db->from('internship_program_role pr');

        return $this->db->get()->result();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_program', $q);
        $this->db->or_like('program_name', $q);
        $this->db->or_like('program_desc', $q);
        $this->db->or_like('program_start', $q);
        $this->db->or_like('program_end', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_program', $q);
        $this->db->or_like('program_name', $q);
        $this->db->or_like('program_desc', $q);
        $this->db->or_like('program_start', $q);
        $this->db->or_like('program_end', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function insert_role($data)
    {
        $this->db->insert("internship_program_role", $data);
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
        $this->deleteDetail($id);
    }

    // delete data
    function deleteDetail($id)
    {
        $this->db->where("id_i_program", $id);
        $this->db->delete("internship_program_role");
    }

    // delete bulkdata
    function deletebulk()
    {
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data);
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);
    }

    function getLaporanHarian($id)
    {
        $this->db->from('laporan_harian');
        $this->db->where('id_program_mahasiswa', $id);
        return $this->db->get()->result();
    }
}

/* End of file Internship_program_model.php */
/* Location: ./application/models/Internship_program_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-30 08:15:01 */
/* http://harviacode.com */