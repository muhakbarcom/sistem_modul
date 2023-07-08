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
    // create data mentoring if not exist
    $data_mentoring = $this->Mentoring_model->get_by_program($id_program);
    if (!$data_mentoring) {
      $dataParamMentoring = [
        'id_program' => $id_program
      ];
      $id_mentoring = $this->Mentoring_model->create($dataParamMentoring);
    } else {
      $id_mentoring = $data_mentoring->mentoring_id;
    }

    $data['title'] = 'Mentoring';
    $data['subtitle'] = '';
    $data['crumb'] = [
      'Mentoring' => '',
    ];

    $data['mentoring_id'] = $id_mentoring;

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

  function addMateri()
  {
    $mentoring_id = $this->input->post('mentoring_id');
    $deskripsi = $this->input->post('deskripsi');
    $file = $_FILES['file'];
    $user_id = $this->ion_auth->user()->row()->id;
    // $id_program = $this->input->post('id_program');

    if ($file) {
      $file = $_FILES['file']['name'];
      $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|jpg|jpeg|png|gif';
      $config['max_size'] = '2048'; // kb
      $config['upload_path'] = './assets/uploads/data/materi/';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('file')) {
        $new_file = $this->upload->data('file_name');
        $this->db->set('file', $new_file);
        $data = [
          'mentoring_id' => $mentoring_id,
          'deskripsi' => $deskripsi,
          'file' => $new_file,
          'mentor_id' => $user_id
        ];

        $res = $this->db->insert('mentoring_materi', $data);
        $msg = 'Data berhasil ditambahkan';
        $status = $res ? true : false;
      } else {
        $msg = $this->upload->display_errors();
        $status = false;
      }
    } else {
      $data = [
        'mentoring_id' => $mentoring_id,
        'deskripsi' => $deskripsi,
        'mentor_id' => $user_id
      ];

      $status = false;
      $msg = 'Data gagal ditambahkan, file tidak boleh kosong';
    }

    $response_json = [
      'status' => $status,
      'message' => $msg,
      'param' => $data,
    ];

    echo json_encode($response_json);
  }

  function getMateri()
  {
    $mentoring_id = $this->input->get('mentoring_id');

    $materi = $this->Mentoring_model->getMateriById($mentoring_id);
    $obj = [];

    foreach ($materi as $value) {
      $obj[$value->materi_id] = $value;
      $materi_id = $value->materi_id;
      $detail = $this->Mentoring_model->getKomentarById($materi_id);
      if ($detail) {
        $obj[$value->materi_id]->detail = $detail;
      } else {
        $obj[$value->materi_id]->detail = [];
      }
    }

    $response_json = [
      'status' => true,
      'data' => $obj
    ];

    echo json_encode($response_json);
  }

  function addKomentar()
  {
    $materi_id = $this->input->post('materi_id');
    $komentar = $this->input->post('komentar');
    $user_id = $this->ion_auth->user()->row()->id;

    $data = [
      'materi_id' => $materi_id,
      'komentar' => $komentar,
      'user_id' => $user_id
    ];

    $res = $this->db->insert('mentoring_komentar', $data);
    $msg = 'Data berhasil ditambahkan';
    $status = $res ? true : false;

    $response_json = [
      'status' => $status,
      'message' => $msg,
      'param' => $data,
    ];

    echo json_encode($response_json);
  }

  function deleteKomentar()
  {
    $komentar_id = $this->input->post('komentar_id');

    $res = $this->db->delete('mentoring_komentar', ['komentar_id' => $komentar_id]);
    $msg = 'Data berhasil dihapus';
    $status = $res ? true : false;

    $response_json = [
      'status' => $status,
      'message' => $msg,
    ];

    echo json_encode($response_json);
  }

  function deletemateri()
  {
    $materi_id = $this->input->post('materi_id');

    $res = $this->db->delete('mentoring_materi', ['materi_id' => $materi_id]);
    $this->db->delete('mentoring_komentar', ['materi_id' => $materi_id]);
    $msg = 'Data berhasil dihapus';
    $status = $res ? true : false;

    $response_json = [
      'status' => $status,
      'message' => $msg,
    ];

    echo json_encode($response_json);
  }
}

/* End of file Mentoring.php */
