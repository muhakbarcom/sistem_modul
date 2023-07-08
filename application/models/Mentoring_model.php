<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mentoring_model extends CI_Model
{
  public $table = 'mentoring';
  public $id = 'id';
  public $order = 'DESC';

  function __construct()
  {
    parent::__construct();
  }

  // get all
  function get_all()
  {
    $this->db->order_by("program_start", $this->order);
    return $this->db->get('internship_program')->result();
  }

  function get_by_program($id_program)
  {
    $this->db->where('id_program', $id_program);
    return $this->db->get($this->table)->row();
  }

  function getMateriById($mentoring_id)
  {
    $this->db->select('mm.*,u.first_name,u.last_name');

    $this->db->from('mentoring_materi mm');
    $this->db->join('user u', 'mm.mentor_id = u.id', 'left');
    $this->db->where('mm.mentoring_id', $mentoring_id);
    return $this->db->get()->result();
  }

  function create($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  function getKomentarById($materi_id)
  {
    $this->db->select('mk.*,u.first_name,u.last_name');

    $this->db->from('mentoring_komentar mk');
    $this->db->join('user u', 'mk.user_id = u.id', 'left');
    $this->db->where('mk.materi_id', $materi_id);
    $this->db->order_by('mk.komentar_id', 'desc');

    return $this->db->get()->result();
  }
}

/* End of file Mentoring_model.php */
