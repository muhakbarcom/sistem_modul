<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Kelas';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Kelas' => '',
        ];

        $data['page'] = 'kelas/kelas_list';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    function get_kelas()
    {
        $data = $this->db->get('kelas')->result();
        echo json_encode($data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Kelas_model->json();
    }

    public function read($id)
    {
        $row = $this->Kelas_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama_kelas' => $row->nama_kelas,
            );
            $data['title'] = 'Kelas';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'kelas/kelas_read';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('kelas'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelas/create_action'),
            'id' => set_value('id'),
            'nama_kelas' => set_value('nama_kelas'),
        );
        $data['title'] = 'Kelas';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'kelas/kelas_form';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_kelas' => $this->input->post('nama_kelas', TRUE),
            );

            $this->Kelas_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('kelas'));
        }
    }

    public function update($id)
    {
        $row = $this->Kelas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelas/update_action'),
                'id' => set_value('id', $row->id),
                'nama_kelas' => set_value('nama_kelas', $row->nama_kelas),
            );
            $data['title'] = 'Kelas';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'kelas/kelas_form';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('kelas'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama_kelas' => $this->input->post('nama_kelas', TRUE),
            );

            $this->Kelas_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('kelas'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kelas_model->get_by_id($id);

        if ($row) {
            $this->Kelas_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('kelas'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('kelas'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Kelas_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_kelas', 'nama kelas', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Kelas.php */
/* Location: ./application/controllers/Kelas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-09 09:29:30 */
/* http://harviacode.com */