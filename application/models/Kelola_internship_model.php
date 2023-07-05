<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_internship_model extends CI_Model
{
  public $table = 'internship_program_mahasiswa';
  public $id = 'id';
  public $order = 'DESC';

  function __construct()
  {
    parent::__construct();
  }

  function get_all($date = '')
  {

    $this->db->select('lh.*,u.first_name,u.last_name,ip.program_name');
    $this->db->from('laporan_harian lh');

    $this->db->join('internship_program_mahasiswa ipm', 'lh.id_program_mahasiswa = ipm.id', 'left');
    $this->db->join('user u', 'ipm.id_user = u.id', 'left');
    $this->db->join('internship_program ip', 'ipm.id_program = ip.id_program', 'left');
    if ($date != '') {
      $this->db->where('DATE(lh.created_at)', $date);
    }

    $this->db->order_by('lh.created_at', 'desc');

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

/* End of file Kelola_internship_model.php */
