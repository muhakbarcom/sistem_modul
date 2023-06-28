<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $c_url = $this->router->fetch_class();
    $this->layout->auth();
    $this->layout->auth_privilege($c_url);
    $this->load->library('datatables');
  }

  public function milestone()
  {
    $this->load->model('V_milestone_model');
    if (!isset($_GET['filter'])) {
      $data['data'] = $this->V_milestone_model->get_all();
    } else {
      $date = $_GET['filter'];
      $data['data'] = $this->V_milestone_model->get_by_date($date);
      $data['date'] = $date;
    }




    $data['title'] = 'Milestone';
    $data['subtitle'] = 'Milestone';
    $data['crumb'] = [
      'Milestone' => '',
    ];
    $data['page'] = $this->config->item('template') . 'master/milestone';
    $this->load->view($this->config->item('template') . 'template/backend', $data);
  }
}

/* End of file Master.php */
