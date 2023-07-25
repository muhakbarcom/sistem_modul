<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_program_model extends CI_Model
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
        $this->datatables->select("ip.id_program, 
        ip.program_name, 
        SUM(CASE WHEN ipmd.step = 0 THEN 1 ELSE 0 END) AS total_pendaftar,
        SUM(CASE WHEN ipmd.step = 3 AND ipmd.status = 1 THEN 1 ELSE 0 END) AS belum_konfirmasi,
        SUM(CASE WHEN ipmd.step = 3 AND ipmd.status = 2 THEN 1 ELSE 0 END) AS diterima,
        SUM(CASE WHEN ipmd.step = 3 AND ipmd.status = 0 THEN 1 ELSE 0 END) AS ditolak");
        $this->datatables->from('internship_program ip');
        $this->datatables->join('internship_program_mahasiswa ipm', 'ip.id_program = ipm.id_program', 'left');
        $this->datatables->join('internship_program_mahasiswa_detail ipmd', 'ipm.id = ipmd.id_program_mahasiswa', 'left');
        $this->datatables->group_by("ip.id_program,ip.program_name");


        return $this->datatables->generate();
    }

    function insert($data)
    {
        $this->db->insert('internship_program_mahasiswa_detail', $data);
    }
}
