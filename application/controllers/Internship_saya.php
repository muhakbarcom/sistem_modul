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

    function onGraduate()
    {
        $id = $this->input->post('id_program_mahasiswa');
        $step = 4; // 1 = Registration, 2 = Administration, 3 = Interview, 4 = On Job, 5 = Graduate
        $status = 1; // 1 = Sedang Berjalan, 2 = Selesai, 3 = Dibatalkan

        $isGraduate = $this->isGraduate($id);

        $data = [
            'id' => $id,
            'step' => $step,
            'created_at' => date('Y-m-d H:i:s'),
            'status' => $status
        ];

        if ($isGraduate) {
            $response_status = true;
        } else {
            $response_status = $this->Internship_program_model->onGraduate($data);
        }

        $message = 'Data berhasil disimpan';

        $response = [
            'status' => $response_status,
            'data' => $data,
            'message' => $message
        ];

        echo json_encode($response);
    }

    function isGraduate($id)
    {
        $data = $this->Internship_program_model->isGraduate($id);
        if ($data) {
            return true;
        } else {
            return false;
        }
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

    function insertLaporanHarian()
    {
        $id_program_mahasiswa = $this->input->post('id_program_mahasiswa');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');
        $tanggal = $this->input->post('tanggal');
        $aktivitas = $this->input->post('aktivitas');
        $keterangan_kehadiran = $this->input->post('keterangan');
        $status_kehadiran = $this->input->post('statusKehadiran');
        $alasan_kehadiran = $this->input->post('alasanKehadiran');

        $data = [
            'id_program_mahasiswa' => $id_program_mahasiswa,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
            'tanggal' => $tanggal,
            'aktivitas' => $aktivitas,
            'keterangan_kehadiran' => $keterangan_kehadiran,
            'status_kehadiran' => $status_kehadiran,
            'alasan_kehadiran' => $alasan_kehadiran,
        ];

        $response_status = $this->Internship_program_model->insertLaporanHarian($data);
        $response = [
            'status' => $response_status,
            'data' => $data,
            'message' => $response_status ? 'Data berhasil disimpan' : 'Data gagal disimpan'
        ];

        echo json_encode($response);
    }

    function insertLaporanMingguan()
    {
        $id_program_mahasiswa = $this->input->post('id_program_mahasiswa');
        $weekStart = $this->input->post('weekStart');
        $weekEnd = $this->input->post('weekEnd');
        $laporan = $this->input->post('laporanMingguanTeks');

        $data = [
            'id_program_mahasiswa' => $id_program_mahasiswa,
            'weekStart' => $weekStart,
            'weekEnd' => $weekEnd,
            'laporan' => $laporan,
        ];

        $response_status = $this->Internship_program_model->insertLaporanMingguan($data);
        $response = [
            'status' => $response_status,
            'data' => $data,
            'message' => $response_status ? 'Data berhasil disimpan' : 'Data gagal disimpan'
        ];

        echo json_encode($response);
    }

    function insertLaporanAkhir()
    {
        $this->load->library('upload');

        $id = $this->input->post('id_program_mahasiswa');
        $fileLaporanAkhir = $_FILES['fileLaporanAkhir'];

        if ($fileLaporanAkhir['error'] == UPLOAD_ERR_OK) {
            $config['upload_path'] = './assets/uploads/data/laporan_akhir/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 2048; // Ukuran maksimum dalam kilobita (KB)

            $this->upload->initialize($config);

            if ($this->upload->do_upload('fileLaporanAkhir')) {
                // File berhasil diunggah
                $fileData = $this->upload->data(); // Informasi file yang diunggah
                $fileLaporanAkhirName = $fileData['file_name']; // Nama file

                // Lakukan operasi lain terkait file yang diunggah
            } else {
                // File gagal diunggah
                $error = $this->upload->display_errors();

                // Tindakan yang ingin Anda lakukan jika terjadi kesalahan saat unggah file
            }

            $data = [
                'id' => $id,
                'file' => $fileLaporanAkhirName,
            ];
            $response_status = $this->Internship_program_model->insertLaporanAkhir($data);
            $message = 'File Laporan Akhir berhasil diunggah';
        } else {
            $response_status = false;
            $message = 'File Laporan Akhir gagal diunggah';
        }

        $response = [
            'status' => $response_status,
            'data' => $data,
            'message' => $message
        ];

        echo json_encode($response);
    }

    function IsThereWeeklyReport()
    {
        $id_program_mahasiswa = $this->input->post('id_program_mahasiswa');
        $weekStart = $this->input->post('weekStart');
        $weekEnd = $this->input->post('weekEnd');

        $data = [
            'id_program_mahasiswa' => $id_program_mahasiswa,
            'weekStart' => $weekStart,
            'weekEnd' => $weekEnd,
        ];

        $response_status = $this->Internship_program_model->IsThereWeeklyReport($data);

        // jika response_status mengembalikan data, maka data tersebut akan dikirim ke frontend
        if ($response_status) {
            $status = true;
        } else {
            $status = false;
        }

        $response = [
            'status' => $status,
            'message' => $status ? 'Data ditemukan' : 'Data tidak ditemukan!',
            'data' => $response_status
        ];

        echo json_encode($response);
    }

    function getDataLaporanharian()
    {
        $id_program_mahasiswa = $this->input->get('id_program_mahasiswa');
        $dataLaporanHarian = $this->Internship_program_model->getLaporanHarian($id_program_mahasiswa);
        $response = [
            'status' => true,
            'data' => $dataLaporanHarian,
            'message' => 'Success'
        ];

        echo json_encode($response);
    }

    function getDataLaporanMingguan()
    {
        $id_program_mahasiswa = $this->input->get('id_program_mahasiswa');
        $dataLaporanMingguan = $this->Internship_program_model->getLaporanMingguan($id_program_mahasiswa);
        $response = [
            'status' => true,
            'data' => $dataLaporanMingguan,
            'message' => 'Success'
        ];

        echo json_encode($response);
    }

    function getDataLaporanAkhir()
    {
        $id_program_mahasiswa = $this->input->get('id_program_mahasiswa');
        $dataLaporanMingguan = $this->Internship_program_model->getLaporanAkhir($id_program_mahasiswa);
        $response = [
            'status' => true,
            'data' => $dataLaporanMingguan,
            'message' => 'Success'
        ];

        echo json_encode($response);
    }

    function downloadSertifikat($id_program_mahasiswa)
    {
        $dataSertifikat = $this->Internship_program_model->getIntershipProgramMahasiswa($id_program_mahasiswa)[0];
        // print_r($dataSertifikat);
        // die();

        $this->load->view('sertifikat', $dataSertifikat);
    }
}
