<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
  public $table = 'internship_program_mahasiswa';
  public $id = 'id';
  public $order = 'DESC';

  function __construct()
  {
    parent::__construct();
  }

  function get_all()
  {
    $this->db->select('ipm.*,u.first_name,u.last_name,ip.program_name');
    $this->db->from('internship_program_mahasiswa ipm');
    $this->db->join('user u', 'ipm.id_user = u.id', 'inner');
    $this->db->join('internship_program ip', 'ipm.id_program = ip.id_program', 'inner');
    $this->db->where('ipm.step', '4');

    return $this->db->get()->result();
  }

  function get_all_mahasiswa($id_user = "")
  {
    $this->db->select('ipm.*,u.first_name,u.last_name,ip.program_name');
    $this->db->from('internship_program_mahasiswa ipm');
    $this->db->join('user u', 'ipm.id_user = u.id', 'inner');
    $this->db->join('internship_program ip', 'ipm.id_program = ip.id_program', 'inner');
    $this->db->where('ipm.step', '4');
    $this->db->where('ipm.id_user', $id_user);

    return $this->db->get()->result();
  }

  function updateInsert()
  {
    $id = $this->input->post('id');
    $nilai = $this->input->post('nilai');

    $data = [
      'nilai_akhir' => $nilai
    ];

    // Check if the record exists
    $existingRecord = $this->db->get_where('internship_program_mahasiswa', ['id' => $id])->row();

    if ($existingRecord) {
      // Update the record
      $this->db->where('id', $id);
      $this->db->update('internship_program_mahasiswa', $data);
    } else {
      // Insert a new record
      $data['id'] = $id;
      $this->db->insert('internship_program_mahasiswa', $data);
    }

    $response_status = array(
      'status' => true,
      'message' => 'Data berhasil disimpan'
    );

    return $response_status;
  }
}

/* End of file Penilaian_model.php */
