<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
		$this->load->model('Report_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['subtitle'] = '';
		$data['crumb'] = [
			'Dashboard' => '',
		];

		$date = date('Y-m');

		$data['page'] = $this->config->item('template') . 'dashboard/Index';
		$this->load->view($this->config->item('template') . 'template/backend', $data);
	}

	public function get_lineChart()
	{
		return $this->Report_model->get_lineChart();
	}

	public function get_lineChartProject()
	{
		return $this->Report_model->get_lineChartProject();
	}

	public function get_lineChart_month()
	{
		return $this->Report_model->get_lineChart_month();
	}

	public function get_lineChart_revenue()
	{
		$lineChart = $this->get_lineChart();
		$revenue = [];
		// foreach without "
		foreach ($lineChart as $key => $value) {
			$revenue[] = (int)$value->revenue;
		}
		$revenue = array_reverse($revenue);
		return $revenue;
	}

	public function get_lineChartProject_revenue()
	{
		$lineChart = $this->get_lineChartProject();
		$revenue = [];
		// foreach without "
		foreach ($lineChart as $key => $value) {
			$revenue[] = (int)$value->revenue;
		}
		$revenue = array_reverse($revenue);
		return $revenue;
	}

	public function get_lineChartProject_projectName()
	{
		$lineChart = $this->get_lineChartProject();
		$projectName = [];
		// foreach without "
		foreach ($lineChart as $key => $value) {
			$projectName[] = $value->name;
		}
		$projectName = array_reverse($projectName);
		return $projectName;
	}

	public function get_lineChart_kumulatif()
	{
		$lineChart = $this->get_lineChart_revenue();
		// print_r($lineChart);
		// die;
		$revenue = [];
		$kumulatif = 0;
		// foreach without "
		foreach ($lineChart as $key => $value) {
			$revenue[] = $kumulatif + $value;
			$kumulatif += $value;
		}
		$revenue = $revenue;
		return $revenue;
	}

	public function get_lineChart_total_cost()
	{
		$lineChart = $this->get_lineChart();
		$total_cost = [];
		foreach ($lineChart as $key => $value) {
			$total_cost[] = (int)$value->total_cost;
		}
		$total_cost = array_reverse($total_cost);
		return $total_cost;
	}

	public function get_revenue($date)
	{
		return singkat_rupiah($this->Report_model->calculate_total_revenue($date)->revenue);
	}

	public function get_direct_cost($date)
	{
		return singkat_rupiah($this->Report_model->calculate_total_direct_cost($date)->revenue);
	}

	public function get_general_cost($date)
	{
		return singkat_rupiah($this->Report_model->calculate_total_general_cost($date)->revenue);
	}

	public function get_overhead_cost($date)
	{
		return singkat_rupiah($this->Report_model->calculate_total_overhead_cost($date)->revenue);
	}

	public function get_top5($date)
	{
		return $this->Report_model->get_top5_report($date);
	}

	public function get_bottom5($date)
	{
		return $this->Report_model->get_bottom5_report($date);
	}
}
