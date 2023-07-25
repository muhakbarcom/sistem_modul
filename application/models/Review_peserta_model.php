<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Review_peserta_model extends CI_Model
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
        $this->datatables->select("ip.id_program, ip.program_name, concat(u.first_name,' ',u.last_name) as name , ir.role_name, ipm.id as id_ipm, (SELECT step from internship_program_mahasiswa_detail where id_program_mahasiswa = ipm.id ORDER BY id DESC limit 1) as step,
        (SELECT status from internship_program_mahasiswa_detail where id_program_mahasiswa = ipm.id ORDER BY id DESC limit 1) as status");
        $this->datatables->from('internship_program ip');
        $this->datatables->join('internship_program_mahasiswa ipm', 'ip.id_program = ipm.id_program', 'left');
        // $this->datatables->join('internship_program_mahasiswa_detail ipmd', 'ipm.id = ipmd.id_program_mahasiswa', 'left');
        $this->datatables->join('user u', 'ipm.id_user = u.id', 'left');
        $this->datatables->join('internship_role ir', 'ipm.id_role = ir.id_internship_role', 'left');
        $this->datatables->group_by("ipm.id");


        return $this->datatables->generate();
    }

    function insert($data)
    {
        $this->db->insert('internship_program_mahasiswa_detail', $data);
    }
}

/* End of file Review_peserta_model.php */
/* Location: ./application/models/Review_peserta_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-30 08:15:01 */
/* http://harviacode.com */