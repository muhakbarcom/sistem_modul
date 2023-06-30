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
        // $this->load->model('Internship_program_model');
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
}
