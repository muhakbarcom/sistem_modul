<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penilaian_kriteria extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Penilaian_kriteria_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'penilaian_kriteria?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penilaian_kriteria?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penilaian_kriteria';
            $config['first_url'] = base_url() . 'penilaian_kriteria';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penilaian_kriteria_model->total_rows($q);
        $penilaian_kriteria = $this->Penilaian_kriteria_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penilaian_kriteria_data' => $penilaian_kriteria,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Penilaian Kriteria';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Penilaian Kriteria' => '',
        ];

        $data['page'] = 'penilaian_kriteria/penilaian_kriteria_list';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->Penilaian_kriteria_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'kriteria' => $row->kriteria,
            );
            $data['title'] = 'Penilaian Kriteria';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'penilaian_kriteria/penilaian_kriteria_read';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('penilaian_kriteria'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penilaian_kriteria/create_action'),
            'id' => set_value('id'),
            'kriteria' => set_value('kriteria'),
        );
        $data['title'] = 'Penilaian Kriteria';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'penilaian_kriteria/penilaian_kriteria_form';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kriteria' => $this->input->post('kriteria', TRUE),
            );

            $this->Penilaian_kriteria_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('penilaian_kriteria'));
        }
    }

    public function update($id)
    {
        $row = $this->Penilaian_kriteria_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penilaian_kriteria/update_action'),
                'id' => set_value('id', $row->id),
                'kriteria' => set_value('kriteria', $row->kriteria),
            );
            $data['title'] = 'Penilaian Kriteria';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'penilaian_kriteria/penilaian_kriteria_form';
            $this->load->view($this->config->item('template') . 'template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('penilaian_kriteria'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'kriteria' => $this->input->post('kriteria', TRUE),
            );

            $this->Penilaian_kriteria_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('penilaian_kriteria'));
        }
    }

    public function delete($id)
    {
        $row = $this->Penilaian_kriteria_model->get_by_id($id);

        if ($row) {
            $this->Penilaian_kriteria_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('penilaian_kriteria'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('penilaian_kriteria'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Penilaian_kriteria_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kriteria', 'kriteria', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Penilaian_kriteria.php */
/* Location: ./application/controllers/Penilaian_kriteria.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-25 09:45:36 */
/* http://harviacode.com */