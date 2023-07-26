<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Penilaian_model');
    $this->load->model('Penilaian_kriteria_model');

    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Penilaian';
    $data['subtitle'] = '';
    $data['crumb'] = [
      'Penilaian' => '',
    ];
    if ($this->ion_auth->in_group(13)) {
      $id_user = $this->ion_auth->user()->row()->id;
      $data['data'] = $this->Penilaian_model->get_all_mahasiswa($id_user);
    } else {
      $id_user = "";
      $data['data'] = $this->Penilaian_model->get_all();
    }
    // print_r($data['data']);
    // die;
    $data['page'] = 'Penilaian/index';
    $this->load->view($this->config->item('template') . 'template/backend', $data);
  }

  function get_data_nilai()
  {
    $id = $this->input->post('id');

    $nilai = $this->Penilaian_model->get_data_nilai($id);
    $kriteria_all = $this->Penilaian_kriteria_model->get_all();

    // merge $nilai and $kriteria_all
    $data = [];
    foreach ($kriteria_all as $k) {
      $data['data'][$k->id] = $k;
    }

    foreach ($nilai as $n) {
      $data['data'][$n->id] = $n;
    }
    $data['status'] = true;
    echo json_encode($data);
  }

  public function aksi_()
  {
    $response_status = $this->Penilaian_model->updateInsert_();

    echo json_encode($response_status);
  }

  public function print($id)
  {
    $info = $this->Penilaian_model->print_getDataInfo($id);
    $nilai = $this->Penilaian_model->print_getDataNilai($id);

    $data['nilai'] = $nilai;
    $data['info'] = $info;

    //total dari nilai->nilai
    $total = 0;
    foreach ($nilai as $n) {
      $total += $n->nilai;
    }

    $total = $total / count($nilai);
    $data['total'] = $total;

    $this->load->view('penilaian/print', $data, FALSE);
  }

  public function aksi()
  {

    $response_status = $this->Penilaian_model->updateInsert();

    echo json_encode($response_status);
  }
}

/* End of file Penilaian.php */
