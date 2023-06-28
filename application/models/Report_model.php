<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_model extends CI_Model
{

    // public $table = 'v_client';
    // public $id = 'name';
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



    function get_lineChart()
    {
        $date = date('Y-m');
        return $this->db->query("SELECT date,sum(invoice_amount) as revenue,sum(total_cost) as total_cost FROM v_profitability_report where date <= '$date' group by date order by date desc limit 12")->result();
    }

    function get_lineChartProject()
    {
        $date = date('Y-m');
        return $this->db->query("SELECT date,sum(invoice_amount) as revenue,sum(total_cost) as total_cost,concat(name,' (',project_code,')') as name,client_name FROM v_profitability_report where date <= '$date' group by project_code order by revenue desc limit 10")->result();
    }

    function get_lineChart_month()
    {
        $date = date('Y-m');
        return $this->db->query("SELECT date FROM v_profitability_report where date <= '$date' group by date order by date asc limit 12")->row();
    }
    function get_profitability_report($date)
    {
        return $this->db->query("SELECT * FROM v_profitability_report WHERE date='$date'")->result();
    }

    function get_top5_report($date)
    {
        return $this->db->query("SELECT client_name,project_code,name,EBIT as amount FROM v_profitability_report WHERE date='$date' and EBIT>=0 order by amount DESC limit 5")->result();
    }

    function get_bottom5_report($date)
    {
        return $this->db->query("SELECT client_name,project_code,name,EBIT as amount FROM v_profitability_report WHERE date='$date' and EBIT<0 order by amount ASC limit 5")->result();
    }

    function calculate_total_profitability($date)
    {
        return $this->db->query("SELECT sum(EBIT) as amount FROM v_profitability_report WHERE date='$date'")->row();
    }

    function calculate_total_revenue($date)
    {
        return $this->db->query("SELECT sum(invoice_amount) as revenue FROM invoice WHERE (date_format(invoice_date, '%Y-%m'))='$date'")->row();
    }

    function calculate_total_direct_cost($date)
    {
        return $this->db->query("SELECT sum(amount) as revenue FROM v_direct_cost WHERE date='$date'")->row();
    }

    function calculate_total_general_cost($date)
    {
        return $this->db->query("SELECT sum(amount) as revenue FROM v_general_cost WHERE date='$date'")->row();
    }

    function calculate_total_overhead_cost($date)
    {
        return $this->db->query("SELECT sum(amount) as revenue FROM v_overhead_cost WHERE date='$date'")->row();
    }

    function count_total_project_profit($date)
    {
        return $this->db->query("SELECT * FROM v_profitability_report WHERE date='$date' group by project_code")->num_rows();
    }

    function get_project_cost($date)
    {
        return $this->db->query("SELECT client_name,project_code,project_name,sum(amount) as sum_of_amount FROM report_project_cost WHERE date='$date' group by project_code")->result();
    }

    function calculate_total_project_cost($date)
    {
        return $this->db->query("SELECT sum(amount) as amount FROM report_project_cost WHERE date='$date'")->row();
    }
    function count_total_project_cost($date)
    {
        return $this->db->query("SELECT * FROM report_project_cost WHERE date='$date' group by project_code")->num_rows();
    }

    function get_logtime($date)
    {
        return $this->db->query("SELECT user_id, name,picture, SEC_TO_TIME(SUM(TIME_TO_SEC(time))) as time ,SUM(amount) AS `sum_of_amount` FROM report_logtime WHERE date='$date' group by user_id")->result();
    }

    function calculate_amount_logtime($date)
    {
        return $this->db->query("SELECT SUM(amount) AS `amount` FROM report_logtime WHERE date='$date'")->row();
    }
    function calculate_duration_logtime($date)
    {
        return $this->db->query("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(time))) as duration FROM report_logtime WHERE date='$date'")->row();
    }
    function count_employee_logtime($date)
    {
        return $this->db->query("SELECT * FROM report_logtime WHERE date='$date' group by user_id")->num_rows();
    }

    function get_logtime_detail($date, $user_id)
    {
        return $this->db->query("SELECT project_code,project_name,client_name,SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) as duration,sum(amount) as sum_of_amount  FROM report_detail_logtime WHERE date='$date' and user_id='$user_id' group by project_code")->result();
    }

    function calculate_amount_logtime_detail($date, $user_id)
    {
        return $this->db->query("SELECT sum(amount) as amount  FROM report_detail_logtime WHERE date='$date' and user_id='$user_id' group by user_id")->row();
    }

    function calculate_duration_logtime_detail($date, $user_id)
    {
        return $this->db->query("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) as duration FROM report_detail_logtime WHERE date='$date' and user_id='$user_id' group by user_id")->row();
    }

    function get_email_employee_logtime($date)
    {
        return $this->db->query("SELECT report_logtime.user_id,employee.email,employee.name,SEC_TO_TIME(SUM(TIME_TO_SEC(time))) as time FROM report_logtime join employee on (report_logtime.user_id=employee.id) WHERE date='$date' group by user_id")->result();
    }
}
