<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('V_client_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['v_client'] = $this->V_client_model->get_all();
        $data['title'] = 'View Data';
        $data['subtitle'] = 'Client';
        $data['crumb'] = [
            'V Client' => '',
        ];

        $data['page'] = $this->config->item('template') . 'v_client/v_client_list';
        $this->load->view($this->config->item('template') . 'template/backend', $data);
    }
}
