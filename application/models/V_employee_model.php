<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_employee_model extends CI_Model
{

    public $table = 'v_employee';
    public $id = '';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }


    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_by_id($user_id)
    {
        return $this->db->query("SELECT * FROM employee where id='$user_id'")->row();
    }
}
