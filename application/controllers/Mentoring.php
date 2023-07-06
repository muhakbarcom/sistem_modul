<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mentoring extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mentoring_model');
    $this->load->model('Internship_program_model', 'Program');
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

  function detail($id_program): void
  {
    $data['title'] = 'Mentoring';
    $data['subtitle'] = '';
    $data['crumb'] = [
      'Mentoring' => '',
    ];

    $data['page'] = 'mentoring/detail';
    $data['program'] = $this->Program->get_all();
    $this->load->view($this->config->item('template') . 'template/backend', $data);
  }

  public function getData()
  {
    $response  = $this->Program->get_all();
    $response = array(
      "data" => $response,
    );
    echo json_encode($response);
  }
}

/* End of file Mentoring.php */
