<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Internship_role extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        // $this->layout->auth();
        // $this->layout->auth_privilege($c_url);
        $this->load->model('Internship_role_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Internship Role';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Internship Role' => '',
        ];
        if ($this->ion_auth->in_group('1')) {
            $data['page'] = 'internship_role/internship_role_list';
        } else {
            $data['page'] = 'internship_role/internship_role_list_mahasiswa';
        }
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Internship_role_model->json();
    }

    public function getAllData()
    {
        $data = $this->Internship_role_model->get_all();
        echo json_encode($data);
    }

    public function read($id)
    {
        $row = $this->Internship_role_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_internship_role' => $row->id_internship_role,
                'role_name' => $row->role_name,
                'role_description' => $row->role_description,
                'image' => $row->image,
            );
            $data['title'] = 'Internship Role';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'internship_role/internship_role_read';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('internship_role'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('internship_role/create_action'),
            'id_internship_role' => set_value('id_internship_role'),
            'role_name' => set_value('role_name'),
            'role_description' => set_value('role_description'),
            'image' => set_value('image'),
        );
        $data['title'] = 'Internship Role';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'internship_role/internship_role_form';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $upload_image = $_FILES['image']['name'];
            $new_image = '';

            if ($upload_image) {
                $config['upload_path'] = './assets/uploads/image/internship_role/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('success', $this->upload->display_errors());
                    redirect('profile');
                }
            }

            $data = array(
                'role_name' => $this->input->post('role_name', TRUE),
                'role_description' => $this->input->post('role_description', TRUE),
                'image' => $new_image,
            );

            $this->Internship_role_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('internship_role'));
        }
    }

    public function update($id)
    {
        $row = $this->Internship_role_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('internship_role/update_action'),
                'id_internship_role' => set_value('id_internship_role', $row->id_internship_role),
                'role_name' => set_value('role_name', $row->role_name),
                'role_description' => set_value('role_description', $row->role_description),
                'image' => set_value('image', $row->image),
            );
            $data['title'] = 'Internship Role';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'internship_role/internship_role_form';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('internship_role'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_internship_role', TRUE));
        } else {
            $id = $this->input->post('id_internship_role', TRUE);
            $upload_image = $_FILES['image']['name'];
            $new_image = '';

            if ($upload_image) {
                $config['upload_path'] = './assets/uploads/image/internship_role/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('success', $this->upload->display_errors());
                    redirect('profile');
                }
            }
            $data = array(
                'role_name' => $this->input->post('role_name', TRUE),
                'role_description' => $this->input->post('role_description', TRUE),
                'image' => $new_image,
            );

            $this->Internship_role_model->update($id, $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('internship_role'));
        }
    }

    public function delete($id)
    {
        $row = $this->Internship_role_model->get_by_id($id);

        if ($row) {
            $this->Internship_role_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('internship_role'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('internship_role'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Internship_role_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('role_name', 'role name', 'trim|required');
        $this->form_validation->set_rules('role_description', 'role description', 'trim|required');
        // $this->form_validation->set_rules('image', 'image', 'trim|required');

        $this->form_validation->set_rules('id_internship_role', 'id_internship_role', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Internship_role.php */
/* Location: ./application/controllers/Internship_role.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-29 14:47:23 */
/* http://harviacode.com */