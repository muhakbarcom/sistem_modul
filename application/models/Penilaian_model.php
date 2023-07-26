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

  function updateInsert_()
  {
    $data = $this->input->post('data');

    // Menyimpan data yang akan di-update atau di-insert
    $insert_data = array();
    $update_data = array();

    // Pisahkan data menjadi array untuk operasi INSERT dan UPDATE
    foreach ($data as $row) {
      if (!empty($row['id'])) {
        $update_data[] = $row;
      } else {
        $insert_data[] = $row;
      }
    }

    // Jika ada data untuk di-insert, lakukan operasi INSERT
    if (!empty($insert_data)) {
      $this->db->insert_batch('penilaian_nilai', $insert_data);
    }

    // Jika ada data untuk di-update, lakukan operasi UPDATE
    if (!empty($update_data)) {
      foreach ($update_data as $row) {
        $this->db->where('id', $row['id']);
        $this->db->update('penilaian_nilai', $row);
      }
    }

    $response_status = array(
      'status' => true,
      'message' => 'Data berhasil disimpan'
    );

    return $response_status;
  }

  function get_data_nilai($id)
  {
    $this->db->select('k.*,n.id as id_nilai, n.id_intership_program_mahasiswa,  n.nilai');
    $this->db->from('penilaian_kriteria k');
    $this->db->join('penilaian_nilai n', 'k.id = n.id_kriteria', 'left');
    $this->db->where('n.id_intership_program_mahasiswa', $id);

    $res = $this->db->get()->result();

    return $res;
  }

  function print_getDataInfo($id)
  {
    $this->db->select('u.first_name, u.last_name, u.nim,u.jurusan, u.perguruan_tinggi, ip.program_start, ip.program_end, ip.program_name,ir.role_name');
    $this->db->from('internship_program_mahasiswa ipm');
    $this->db->join('user u', 'ipm.id_user = u.id', 'left');
    $this->db->join('internship_program ip', 'ipm.id_program = ip.id_program', 'left');
    $this->db->join('internship_role ir', 'ipm.id_role = ir.id_internship_role', 'left');
    $this->db->where('ipm.id', $id);

    $res = $this->db->get()->row();

    return $res;
  }

  function print_getDataNilai($id)
  {
    $this->db->select('*');
    $this->db->from('penilaian_nilai pn');
    $this->db->join('penilaian_kriteria pk', 'pn.id_kriteria = pk.id', 'left');
    $this->db->where('pn.id_intership_program_mahasiswa	', $id);

    $res = $this->db->get()->result();

    return $res;
  }
}

/* End of file Penilaian_model.php */
