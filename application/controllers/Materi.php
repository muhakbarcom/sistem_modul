<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Materi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Materi_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    function addMateri()
    {
        $nomor_pertemuan = $this->input->post('nomor_pertemuan');
        $id_matakuliah = $this->input->post('id_matakuliah');
        $fileUploaded = isset($_FILES['file_materi']) && !empty($_FILES['file_materi']);

        if ($fileUploaded) {
            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|xls|xlsx|zip|rar|jpg|jpeg|png';
            $config['max_size'] = '2048'; // kb
            $config['upload_path'] = './assets/uploads/data/materi/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_materi')) {
                $new_file = $this->upload->data('file_name');

                $data = [
                    'nomor_pertemuan' => $nomor_pertemuan,
                    'file_materi' => $new_file,
                    'id_matakuliah' => $id_matakuliah
                ];

                $res = $this->db->insert('materi', $data);
                $msg = 'Data berhasil ditambahkan';
                $status = $res ? true : false;
            } else {
                $msg = $this->upload->display_errors();
                $status = false;
            }
        } else {
            $data = [
                'nomor_pertemuan' => $nomor_pertemuan
            ];

            $status = false;
            $msg = 'Data gagal ditambahkan, file tidak boleh kosong';
        }

        $response_json = [
            'status' => $status,
            'message' => $msg,
        ];

        echo json_encode($response_json);
    }

    public function index()
    {
        $data['title'] = 'Materi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Materi' => '',
        ];

        $data['page'] = 'materi/materi_list';
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

    public function detail_materi($id)
    {
        $data['title'] = 'Materi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Materi' => '',
        ];

        // Mendapatkan data materi dari model berdasarkan ID
        $rows = $this->Materi_model->get_by_id($id);

        // Inisialisasi array untuk mengelompokkan data berdasarkan nomor_pertemuan
        $groupedData = array();

        // Looping untuk mengelompokkan data
        foreach ($rows as $row) {
            $nomor_pertemuan = $row->nomor_pertemuan;

            // Jika nomor_pertemuan belum ada dalam array, buat entri baru
            if (!isset($groupedData[$nomor_pertemuan])) {
                $groupedData[$nomor_pertemuan] = array(
                    'nomor_pertemuan' => $nomor_pertemuan,
                    'file_materi' => array()
                );
            }

            // Tambahkan data file_materi ke dalam array
            $groupedData[$nomor_pertemuan]['file_materi'][] = array(
                'id' => $row->id,
                'file_materi' => $row->file_materi,
                'tanggal_upload' => $row->tanggal_upload
            );
        }

        // Set data yang sudah diolah ke dalam data untuk tampilan
        $data['data'] = $groupedData;
        // print_r($data['data']);
        // die;

        $data['id_matakuliah'] = $id;
        $data['page'] = 'materi/materi_read';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('materi/create_action'),
            'id' => set_value('id'),
            'file_materi' => set_value('file_materi'),
            'nomor_pertemuan' => set_value('nomor_pertemuan'),
            'id_matakuliah' => set_value('id_matakuliah'),
            'tanggal_upload' => set_value('tanggal_upload'),
        );
        $data['title'] = 'Materi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'materi/materi_form';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'file_materi' => $this->input->post('file_materi', TRUE),
                'nomor_pertemuan' => $this->input->post('nomor_pertemuan', TRUE),
                'id_matakuliah' => $this->input->post('id_matakuliah', TRUE),
                'tanggal_upload' => $this->input->post('tanggal_upload', TRUE),
            );

            $this->Materi_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('materi'));
        }
    }

    public function update($id)
    {
        $row = $this->Materi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('materi/update_action'),
                'id' => set_value('id', $row->id),
                'file_materi' => set_value('file_materi', $row->file_materi),
                'nomor_pertemuan' => set_value('nomor_pertemuan', $row->nomor_pertemuan),
                'id_matakuliah' => set_value('id_matakuliah', $row->id_matakuliah),
                'tanggal_upload' => set_value('tanggal_upload', $row->tanggal_upload),
            );
            $data['title'] = 'Materi';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'materi/materi_form';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('materi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'file_materi' => $this->input->post('file_materi', TRUE),
                'nomor_pertemuan' => $this->input->post('nomor_pertemuan', TRUE),
                'id_matakuliah' => $this->input->post('id_matakuliah', TRUE),
                'tanggal_upload' => $this->input->post('tanggal_upload', TRUE),
            );

            $this->Materi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('materi'));
        }
    }

    public function delete($id, $id_matakuliah = null)
    {
        $row = $this->Materi_model->get_by_id_delete($id);

        if ($row) {
            $this->Materi_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('materi/detail_materi/' . $id_matakuliah));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('materi/detail_materi/' . $id_matakuliah));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Materi_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('file_materi', 'file materi', 'trim|required');
        $this->form_validation->set_rules('nomor_pertemuan', 'nomor pertemuan', 'trim|required');
        $this->form_validation->set_rules('id_matakuliah', 'id matakuliah', 'trim|required');
        $this->form_validation->set_rules('tanggal_upload', 'tanggal upload', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Materi.php */
/* Location: ./application/controllers/Materi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-09 09:29:59 */
/* http://harviacode.com */