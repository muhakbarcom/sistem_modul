<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LaporanAkhir_model extends CI_Model
{
  public $table = 'laporan_akhir';
  public $id = 'id';
  public $order = 'DESC';

  function __construct()
  {
    parent::__construct();
  }

  // get all
  function get_all()
  {
    $this->db->select('l.*, p.program_name, u.first_name, u.last_name');
    $this->db->from('laporan_akhir l');
    $this->db->join('internship_program_mahasiswa m', 'l.id_program_mahasiswa = m.id', 'left');
    $this->db->join('internship_program p', 'm.id_program = p.id_program', 'left');
    $this->db->join('user u', 'm.id_user = u.id', 'left');
    $this->db->where('l.tanggal_pengumpulan = (SELECT MAX(tanggal_pengumpulan) FROM laporan_akhir WHERE id_program_mahasiswa = l.id_program_mahasiswa AND id_user = m.id_user)');
    $this->db->group_by('l.id_program_mahasiswa, m.id_user');
    $this->db->order_by('l.id', 'desc');

    return $this->db->get()->result();
  }

  function insert()
  {
    $id_program_mahasiswa = $this->input->post('id_program_mahasiswa');
    $komentar_mentor = $this->input->post('komentar_mentor');
    $modeInput = $this->input->post('modeInput');

    $data = array(
      'komentar_mentor' => $komentar_mentor,
      'status' => $modeInput == 'setuju' ? 'DISETUJUI' : 'DITOLAK',
    );

    $this->db->where('id', $id_program_mahasiswa);

    $response_status = $this->db->update('laporan_akhir', $data);
    $response = [
      'status' => $response_status,
      'data' => $data,
      'message' => 'Data berhasil disimpan'
    ];

    return $response;
  }
}

/* End of file LaporanAkhir_model.php */
