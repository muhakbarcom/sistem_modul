<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mentoring extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mentoring_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Mentoring';
    $data['subtitle'] = '';
    $data['crumb'] = [
      'Mentoring' => '',
    ];

    $data['page'] = 'mentoring/index';
    $this->load->view($this->config->item('template') . 'template/backend', $data);
  }
}

/* End of file Mentoring.php */
