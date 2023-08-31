<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Matakuliah_assign extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Matakuliah_assign_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Matakuliah Assign';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Matakuliah Assign' => '',
        ];

        $data['page'] = 'matakuliah_assign/matakuliah_assign_list';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    function get_kelas()
    {
        $data = $this->db->get('kelas')->result();
        print_r(json_encode($data));
        die;
        echo json_encode($data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Matakuliah_assign_model->json();
    }

    function assign_matakuliah()
    {
        $id_assign = $this->input->post('id_assign');
        $id_matakuliah = $this->input->post('id_matakuliah');
        $id_kelas = $this->input->post('id_kelas');

        // Data yang akan di-update atau di-insert
        $data = array(
            'id_matakuliah' => $id_matakuliah,
            'id_kelas' => $id_kelas,
        );

        if ($id_assign) {
            // Jika ada ID penugasan, lakukan update
            $this->Matakuliah_assign_model->update($id_assign, $data);
        } else {
            // Jika tidak ada ID penugasan, lakukan insert baru
            $this->Matakuliah_assign_model->insert($data);
        }

        echo json_encode(array("status" => TRUE));
    }
    public function read($id)
    {
        $row = $this->Matakuliah_assign_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'id_matakuliah' => $row->id_matakuliah,
                'id_kelas' => $row->id_kelas,
            );
            $data['title'] = 'Matakuliah Assign';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'matakuliah_assign/matakuliah_assign_read';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('matakuliah_assign'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('matakuliah_assign/create_action'),
            'id' => set_value('id'),
            'id_matakuliah' => set_value('id_matakuliah'),
            'id_kelas' => set_value('id_kelas'),
        );
        $data['title'] = 'Matakuliah Assign';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'matakuliah_assign/matakuliah_assign_form';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_matakuliah' => $this->input->post('id_matakuliah', TRUE),
                'id_kelas' => $this->input->post('id_kelas', TRUE),
            );

            $this->Matakuliah_assign_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('matakuliah_assign'));
        }
    }

    public function update($id)
    {
        $row = $this->Matakuliah_assign_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('matakuliah_assign/update_action'),
                'id' => set_value('id', $row->id),
                'id_matakuliah' => set_value('id_matakuliah', $row->id_matakuliah),
                'id_kelas' => set_value('id_kelas', $row->id_kelas),
            );
            $data['title'] = 'Matakuliah Assign';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'matakuliah_assign/matakuliah_assign_form';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('matakuliah_assign'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'id_matakuliah' => $this->input->post('id_matakuliah', TRUE),
                'id_kelas' => $this->input->post('id_kelas', TRUE),
            );

            $this->Matakuliah_assign_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('matakuliah_assign'));
        }
    }

    public function delete($id)
    {
        $row = $this->Matakuliah_assign_model->get_by_id($id);

        if ($row) {
            $this->Matakuliah_assign_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('matakuliah_assign'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('matakuliah_assign'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Matakuliah_assign_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_matakuliah', 'id matakuliah', 'trim|required');
        $this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Matakuliah_assign.php */
/* Location: ./application/controllers/Matakuliah_assign.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-09 09:29:55 */
/* http://harviacode.com */