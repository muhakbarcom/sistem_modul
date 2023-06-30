<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Internship_program extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        // $this->layout->auth();
        // $this->layout->auth_privilege($c_url);
        $this->load->model('Internship_program_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Internship Program';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Internship Program' => '',
        ];

        $data['page'] = 'internship_program/internship_program_list';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Internship_program_model->json();
    }

    public function read($id)
    {
        $row = $this->Internship_program_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_program' => $row->id_program,
                'program_name' => $row->program_name,
                'program_desc' => $row->program_desc,
                'program_start' => $row->program_start,
                'program_end' => $row->program_end,
            );
            $data['title'] = 'Internship Program';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'internship_program/internship_program_read';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('internship_program'));
        }
    }

    public function get_role()
    {
        $this->load->model('Internship_role_model');
        $data = $this->Internship_role_model->get_all();
        echo json_encode($data);
    }

    public function getAll()
    {
        $data = $this->Internship_program_model->get_all();
        echo json_encode($data);
    }

    public function getAllByIdUser()
    {
        $user = $this->ion_auth->user()->row()->id;
        $data = $this->Internship_program_model->getAllByIdUser($user);
        echo json_encode($data);
    }

    public function isRegistered()
    {
        $id_program = $this->input->post('id_program', TRUE);
        $user = $this->ion_auth->user()->row()->id;
        $data = $this->Internship_program_model->isRegistered($id_program, $user);
        $status = false;
        if ($data > 0) {
            $status = true;
        }
        $response = array(
            'status' => $status,
            'id_user' => $user,
            'id_program' => $id_program,
        );
        echo json_encode($response);
    }

    public function register()
    {
        $id_program = $this->input->post('id_program', TRUE);
        $user = $this->ion_auth->user()->row()->id;
        $data = $this->Internship_program_model->register($id_program, $user);
        $status = false;
        if ($data != null) {
            $status = true;
        }
        $response = array(
            'status' => $status,
        );
        echo json_encode($response);
    }


    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('internship_program/create_action'),
            'id_program' => 0,
            'program_name' => set_value('program_name'),
            'program_desc' => set_value('program_desc'),
            'program_start' => set_value('program_start'),
            'program_end' => set_value('program_end'),
        );
        $data['title'] = 'Internship Program';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'internship_program/internship_program_form';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->db->trans_start(); // Memulai transaksi

            try {
                $data = array(
                    'program_name' => $this->input->post('program_name', TRUE),
                    'program_desc' => $this->input->post('program_desc', TRUE),
                    'program_start' => $this->input->post('program_start', TRUE),
                    'program_end' => $this->input->post('program_end', TRUE),
                );

                $id = $this->Internship_program_model->insert($data);
                $roles = $this->input->post('role', TRUE);

                foreach ($roles as $role) {
                    $data = array(
                        'id_i_role' => $role,
                        'id_i_program' => $id,
                    );

                    $this->Internship_program_model->insert_role($data);
                }

                $this->db->trans_complete(); // Menyelesaikan transaksi

                if ($this->db->trans_status() === FALSE) {
                    throw new Exception('Database transaction failed.');
                }

                $this->session->set_flashdata('success', 'Update Record Success');

                $response = array(
                    'code' => '200', // success or not?
                    'status' => true,
                    'message' => 'Create Record Success',
                );
                echo json_encode($response);
            } catch (Exception $e) {
                $this->db->trans_rollback(); // Menggulirkan kembali transaksi jika terjadi kesalahan
                $this->session->set_flashdata('error', 'Update Record Failed: ' . $e->getMessage());
                $response = array(
                    'code' => '400', // success or not?
                    'status' => false,
                    'message' => $e->getMessage(),
                );
                echo json_encode($response);
            }
        }
    }

    public function getRoleByIdProgram()
    {
        $id = $this->input->post('id_program', TRUE);
        $data = $this->Internship_program_model->getRoleByIdProgram($id);
        echo json_encode($data);
    }

    public function update($id)
    {
        $row = $this->Internship_program_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('internship_program/update_action'),
                'id_program' => set_value('id_program', $row->id_program),
                'program_name' => set_value('program_name', $row->program_name),
                'program_desc' => set_value('program_desc', $row->program_desc),
                'program_start' => set_value('program_start', $row->program_start),
                'program_end' => set_value('program_end', $row->program_end),
            );
            $data['title'] = 'Internship Program';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'internship_program/internship_program_form';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('internship_program'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_program', TRUE));
        } else {
            $data = array(
                'program_name' => $this->input->post('program_name', TRUE),
                'program_desc' => $this->input->post('program_desc', TRUE),
                'program_start' => $this->input->post('program_start', TRUE),
                'program_end' => $this->input->post('program_end', TRUE),
            );

            $this->Internship_program_model->update($this->input->post('id_program', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('internship_program'));
        }
    }

    public function delete($id)
    {
        $row = $this->Internship_program_model->get_by_id($id);

        if ($row) {
            $this->Internship_program_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('internship_program'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('internship_program'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Internship_program_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('program_name', 'program name', 'trim|required');
        $this->form_validation->set_rules('program_desc', 'program desc', 'trim|required');
        $this->form_validation->set_rules('program_start', 'program start', 'trim|required');
        $this->form_validation->set_rules('program_end', 'program end', 'trim|required');

        $this->form_validation->set_rules('id_program', 'id_program', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Internship_program.php */
/* Location: ./application/controllers/Internship_program.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-30 08:15:01 */
/* http://harviacode.com */