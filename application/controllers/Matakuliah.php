<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Matakuliah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Matakuliah_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Matakuliah';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Matakuliah' => '',
        ];

        $data['page'] = 'matakuliah/matakuliah_list';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Matakuliah_model->json();
    }

    public function get_data_dosen()
    {
        // ion_auth get data user by group id = 14 (dosen)
        $users = $this->ion_auth->users(14)->result();

        echo json_encode($users);
    }



    public function read($id)
    {
        $row = $this->Matakuliah_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'kode_matakuliah' => $row->kode_matakuliah,
                'nama_matakuliah' => $row->nama_matakuliah,
                'id_dosen' => $row->id_dosen,
            );
            $data['title'] = 'Matakuliah';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'matakuliah/matakuliah_read';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('matakuliah'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('matakuliah/create_action'),
            'id' => set_value('id'),
            'kode_matakuliah' => set_value('kode_matakuliah'),
            'nama_matakuliah' => set_value('nama_matakuliah'),
            'id_dosen' => set_value('id_dosen'),
        );
        $data['title'] = 'Matakuliah';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'matakuliah/matakuliah_form';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kode_matakuliah' => $this->input->post('kode_matakuliah', TRUE),
                'nama_matakuliah' => $this->input->post('nama_matakuliah', TRUE),
                'id_dosen' => $this->input->post('id_dosen', TRUE),
            );

            $this->Matakuliah_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('matakuliah'));
        }
    }

    public function update($id)
    {
        $row = $this->Matakuliah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('matakuliah/update_action'),
                'id' => set_value('id', $row->id),
                'kode_matakuliah' => set_value('kode_matakuliah', $row->kode_matakuliah),
                'nama_matakuliah' => set_value('nama_matakuliah', $row->nama_matakuliah),
                'id_dosen' => set_value('id_dosen', $row->id_dosen),
            );
            $data['title'] = 'Matakuliah';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'matakuliah/matakuliah_form';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('matakuliah'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'kode_matakuliah' => $this->input->post('kode_matakuliah', TRUE),
                'nama_matakuliah' => $this->input->post('nama_matakuliah', TRUE),
                'id_dosen' => $this->input->post('id_dosen', TRUE),
            );

            $this->Matakuliah_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('matakuliah'));
        }
    }

    public function delete($id)
    {
        $row = $this->Matakuliah_model->get_by_id($id);

        if ($row) {
            $this->Matakuliah_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('matakuliah'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('matakuliah'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Matakuliah_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_matakuliah', 'kode matakuliah', 'trim|required');
        $this->form_validation->set_rules('nama_matakuliah', 'nama matakuliah', 'trim|required');
        $this->form_validation->set_rules('id_dosen', 'id dosen', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Matakuliah.php */
/* Location: ./application/controllers/Matakuliah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-09 09:29:51 */
/* http://harviacode.com */