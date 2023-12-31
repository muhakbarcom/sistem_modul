<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Materi_model');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Laporan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Laporan' => '',
        ];

        $data['page'] = 'laporan/laporan_list';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Materi_model->json();
    }

    function get_by_id_dosen()
    {
        $this->load->model('Matakuliah_model');

        $id = $this->session->userdata('user_id');

        if ($this->ion_auth->in_group(14)) {
            $data = $this->Matakuliah_model->get_by_id_dosen($id);
        } else {
            $data = $this->Matakuliah_model->get_by_id_mahasiswa($id);
        }

        echo json_encode($data);
    }

    function get_laporan()
    {
        $data = $this->db->query("SELECT m.kode_matakuliah,m.nama_matakuliah,count(mtr.id) as total_materi 
        FROM matakuliah m 
        left join materi mtr on(m.id=mtr.id_matakuliah) 
        GROUP BY m.id")->result();

        echo json_encode($data);
    }
}

/* End of file Materi.php */
/* Location: ./application/controllers/Materi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-09 09:29:59 */
/* http://harviacode.com */