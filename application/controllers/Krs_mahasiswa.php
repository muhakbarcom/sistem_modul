<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Krs_mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Krs_mahasiswa_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Krs Mahasiswa';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Krs Mahasiswa' => '',
        ];

        $data['page'] = 'krs_mahasiswa/krs_mahasiswa_list';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Krs_mahasiswa_model->json();
    }

    public function read($id)
    {
        $row = $this->Krs_mahasiswa_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'id_mahasiswa' => $row->id_mahasiswa,
                'id_matakuliah' => $row->id_matakuliah,
            );
            $data['title'] = 'Krs Mahasiswa';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'krs_mahasiswa/krs_mahasiswa_read';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('krs_mahasiswa'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('krs_mahasiswa/create_action'),
            'id' => set_value('id'),
            'id_mahasiswa' => set_value('id_mahasiswa'),
            'id_matakuliah' => set_value('id_matakuliah'),
        );
        $data['title'] = 'Krs Mahasiswa';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'krs_mahasiswa/krs_mahasiswa_form';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_mahasiswa' => $this->input->post('id_mahasiswa', TRUE),
                'id_matakuliah' => $this->input->post('id_matakuliah', TRUE),
            );

            $this->Krs_mahasiswa_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('krs_mahasiswa'));
        }
    }

    public function update($id)
    {
        $row = $this->Krs_mahasiswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('krs_mahasiswa/update_action'),
                'id' => set_value('id', $row->id),
                'id_mahasiswa' => set_value('id_mahasiswa', $row->id_mahasiswa),
                'id_matakuliah' => set_value('id_matakuliah', $row->id_matakuliah),
            );
            $data['title'] = 'Krs Mahasiswa';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'krs_mahasiswa/krs_mahasiswa_form';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('krs_mahasiswa'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'id_mahasiswa' => $this->input->post('id_mahasiswa', TRUE),
                'id_matakuliah' => $this->input->post('id_matakuliah', TRUE),
            );

            $this->Krs_mahasiswa_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('krs_mahasiswa'));
        }
    }

    public function delete($id)
    {
        $row = $this->Krs_mahasiswa_model->get_by_id($id);

        if ($row) {
            $this->Krs_mahasiswa_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('krs_mahasiswa'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('krs_mahasiswa'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Krs_mahasiswa_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_mahasiswa', 'id mahasiswa', 'trim|required');
        $this->form_validation->set_rules('id_matakuliah', 'id matakuliah', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Krs_mahasiswa.php */
/* Location: ./application/controllers/Krs_mahasiswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-09 17:55:48 */
/* http://harviacode.com */