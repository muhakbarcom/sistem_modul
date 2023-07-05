<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Penilaian_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Penilaian';
    $data['subtitle'] = '';
    $data['crumb'] = [
      'Penilaian' => '',
    ];

    $data['data'] = $this->Penilaian_model->get_all();
    // print_r($data['data']);
    // die;
    $data['page'] = 'Penilaian/index';
    $this->load->view($this->config->item('template') . 'template/backend', $data);
  }

  public function aksi()
  {

    $response_status = $this->Penilaian_model->updateInsert();

    echo json_encode($response_status);
  }
}

/* End of file Penilaian.php */
