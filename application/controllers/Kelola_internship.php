<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_internship extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kelola_internship_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $date = $this->input->post('date');

    $data['title'] = 'Kelola internship';
    $data['subtitle'] = '';
    $data['crumb'] = [
      'Kelola_internship' => '',
    ];

    if ($date == '') {
      // $date = date('Y-m-d');
    }

    $data['data'] = $this->Kelola_internship_model->get_all($date);
    // print_r($data['data']);
    // die;
    $data['page'] = 'Kelola_internship/index';
    $this->load->view($this->config->item('template') . 'template/backend', $data);
  }

  function getData()
  {
    $date = $this->input->post('date');
    $date = date('Y-m-d', strtotime($date));
    $data = $this->Kelola_internship_model->get_all($date);
    echo json_encode($data);
  }

  public function aksi()
  {

    $response_status = $this->Kelola_internship_model->updateInsert();

    echo json_encode($response_status);
  }
}

/* End of file Kelola_internship.php */
