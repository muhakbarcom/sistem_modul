<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mentoring_model extends CI_Model
{
  public $table = 'internship_program';
  public $id = 'id_program';
  public $order = 'DESC';

  function __construct()
  {
    parent::__construct();
  }

  // get all
  function get_all()
  {
    $this->db->order_by("program_start", $this->order);
    return $this->db->get($this->table)->result();
  }
}

/* End of file Mentoring_model.php */
