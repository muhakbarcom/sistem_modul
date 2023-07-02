<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Internship_saya extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Internship_program_model');
    }

    public function index()
    {
        $data['title'] = 'Internship Saya';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Internship Saya' => '',
        ];

        $data['page'] = 'internship_saya/index';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function detail($id_program)
    {
        $data['title'] = 'Internship Saya';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Internship Saya' => '',
        ];
        $id_user = $this->ion_auth->user()->row()->id;
        $dataProgram = $this->Internship_program_model->getAllByIdUser($id_user, $id_program)[0];
        $data['dataProgram'] = $dataProgram;
        switch ($dataProgram->step) {
            case 0:
                $data['page'] = 'internship_saya/1_registration';
                break;
            case 1:
                $data['page'] = 'internship_saya/2_administration';
                break;
            case 2:
                $data['page'] = 'internship_saya/3_interview';
                break;
            case 3:
                $data['page'] = 'internship_saya/4_onjob';
                break;
            case 4:
                $data['page'] = 'internship_saya/5_graduate';
                break;
            default:
                $data['page'] = 'internship_saya/index';
                break;
        }

        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    function registration()
    {
        $id_user = $this->ion_auth->user()->row()->id;
        $id = $this->input->post('id');
        $id_role = $this->input->post('id_role');
        $id_internship_program_mahasiswa = $this->input->post('id_program'); // id_program_mahasiswa
        $step = 1;
        $status = 1; // 1 = Sedang Berjalan, 2 = Selesai, 3 = Dibatalkan

        $data = [
            'id' => $id,
            'id_role' => $id_role,
            'id_user' => $id_user,
            'id_program_mahasiswa' => $id_internship_program_mahasiswa,
            'step' => $step,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $response_status = $this->Internship_program_model->insertStepRegister($data);
        $response = [
            'status' => $response_status,
            'data' => $data,
            'message' => 'Data berhasil disimpan'
        ];

        echo json_encode($response);
    }

    function administration()
    {
        $this->load->library('upload');

        $id = $this->input->post('id');
        $step = 2;
        $status = 1; // 1 = Sedang Berjalan, 2 = Selesai, 3 = Dibatalkan

        $cv = $_FILES['cv'];

        if ($cv['error'] == UPLOAD_ERR_OK) {
            $config['upload_path'] = './assets/uploads/data/cv/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] = 2048; // Ukuran maksimum dalam kilobita (KB)

            $this->upload->initialize($config);

            if ($this->upload->do_upload('cv')) {
                // File berhasil diunggah
                $fileData = $this->upload->data(); // Informasi file yang diunggah
                $cvName = $fileData['file_name']; // Nama file

                // Lakukan operasi lain terkait file yang diunggah
            } else {
                // File gagal diunggah
                $error = $this->upload->display_errors();

                // Tindakan yang ingin Anda lakukan jika terjadi kesalahan saat unggah file
            }

            $data = [
                'id' => $id,
                'step' => $step,
                'created_at' => date('Y-m-d H:i:s'),
                'cv' => $cvName,
                'status' => $status
            ];
            $response_status = $this->Internship_program_model->insertStepAdministration($data);
            $message = 'File CV berhasil diunggah';
        } else {
            $response_status = false;
            $message = 'File CV gagal diunggah';
        }

        $response = [
            'status' => $response_status,
            'data' => $data,
            'message' => $message
        ];

        echo json_encode($response);
    }

    function interview()
    {
        $id = $this->input->post('id');
        $link_interview = $this->input->post('link_interview');
        $step = 3;
        $status = 1; // 1 = Sedang Berjalan, 2 = Selesai, 3 = Dibatalkan

        $data = [
            'id' => $id,
            'step' => $step,
            'created_at' => date('Y-m-d H:i:s'),
            'link_interview' => $link_interview,
            'status' => $status
        ];
        $response_status = $this->Internship_program_model->insertStepInterview($data);
        $message = 'Data berhasil disimpan';

        $response = [
            'status' => $response_status,
            'data' => $data,
            'message' => $message
        ];

        echo json_encode($response);
    }

    function laporan()
    {
        $id_program_mahasiswa = $this->input->get('id_program_mahasiswa');
        $id_program = $this->input->get('id_program');
        $mingguKe = $this->input->get('mingguKe');
        $weekStart = $this->input->get('weekStart');
        $weekEnd = $this->input->get('weekEnd');

        $dataLaporanHarian = $this->Internship_program_model->getLaporanHarian($id_program_mahasiswa);

        $data['title'] = 'Internship Saya';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Internship Saya' => '',
        ];

        $data['id_program'] = $id_program;
        $data['id_program_mahasiswa'] = $id_program_mahasiswa;
        $data['mingguKe'] = $mingguKe;
        $data['weekStart'] = $weekStart;
        $data['weekEnd'] = $weekEnd;
        $data['dataLaporanHarian'] = $dataLaporanHarian;

        $data['page'] = 'internship_saya/laporan_detail';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }
}
