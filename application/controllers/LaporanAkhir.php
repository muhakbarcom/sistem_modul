<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LaporanAkhir extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('LaporanAkhir_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'List Laporan Akhir';
    $data['subtitle'] = '';
    $data['crumb'] = [
      'LaporanAkhir' => '',
    ];

    $data['data'] = $this->LaporanAkhir_model->get_all();

    $data['page'] = 'LaporanAkhir/index';
    $this->load->view($this->config->item('template') . 'template/backend', $data);
  }

  public function aksi()
  {

    $response_status = $this->LaporanAkhir_model->insert();

    echo json_encode($response_status);
  }
}

/* End of file LaporanAkhir.php */
