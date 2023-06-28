<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $c_url = $this->router->fetch_class();
    $this->layout->auth();
    $this->layout->auth_privilege($c_url);
    $this->load->model('Report_model');
    // $this->load->library('datatables');
  }

  public function project_cost()
  {

    $date = $this->filter(isset($_GET['filter']) ? $_GET['filter'] : date('Y-m'));
    $data['date'] = $date;
    $data['report'] = $this->get_project_cost($date);
    $data['total_project'] = $this->count_total_project_cost($date);
    $data['amount'] = $this->calculate_total_project_cost($date);
    $data['date'] = $date;
    $data['title'] = 'Project Cost';
    $data['subtitle'] = 'Project Cost';
    $data['crumb'] = [
      'Project Cost' => '',
    ];
    //$this->layout->set_privilege(1);
    $data['page'] = $this->config->item('template') . 'report/project_cost';
    $this->load->view($this->config->item('template') . 'template/backend', $data);
  }

  public function logtime()
  {

    $date = $this->filter(isset($_GET['filter']) ? $_GET['filter'] : date('Y-m'));
    $data['report'] = $this->get_logtime($date);
    $data['amount'] = $this->calculate_amount_logtime($date);
    $data['employee'] = $this->count_employee_logtime($date);
    $data['duration'] = $this->calculate_duration_logtime($date);
    $data['date'] = $date;
    $data['title'] = 'Logtime';
    $data['subtitle'] = 'Logtime';
    $data['crumb'] = [
      'Logtime' => '',
    ];
    //$this->layout->set_privilege(1);
    $data['page'] = $this->config->item('template') . 'report/logtime';
    $this->load->view($this->config->item('template') . 'template/backend', $data);
  }

  public function logtime_detail($user_id)
  {
    $date = $this->filter(isset($_GET['filter']) ? $_GET['filter'] : date('Y-m'));
    $this->load->model('V_employee_model');
    $data['user_id'] = $user_id;
    $data['employee'] = $this->V_employee_model->get_by_id($user_id);
    $data['duration'] = $this->calculate_duration_logtime_detail($date, $user_id);
    $data['amount'] = $this->calculate_amount_logtime_detail($date, $user_id);
    $data['report'] = $this->get_logtime_detail($date, $user_id);
    $data['date'] = $date;
    $data['title'] = 'Logtime';
    $data['subtitle'] = 'Logtime';
    $data['crumb'] = [
      'Logtime' => '',
    ];
    //$this->layout->set_privilege(1);
    $data['page'] = $this->config->item('template') . 'report/logtime_detail';
    $this->load->view($this->config->item('template') . 'template/backend', $data);
  }

  public function reminder_logtime()
  {
    $date = $this->input->post('date');
    if ($date == '') {
      $date = date('Y-m');
    }

    $email = $this->Report_model->get_email_employee_logtime($date);
    $employee = [];
    foreach ($email as $key => $value) {
      $duration = time_to_hour($value->time);
      if ($duration < 35) {
        $this->send_email($value->email, 'Reminder Logtime', $value->name, $duration);
        $employee[] = [
          'name' => $value->name,
          'duration' => $duration,
        ];
      }
    }
    $response = [
      'status' => 'success',
      'message' => 'Reminder Logtime Success',
      'employee' => $employee,
    ];
    echo json_encode($response);
    // $this->session->set_flashdata('success', "Reminder Logtime was successful");
    // redirect('Report/logtime');
  }

  public function logtime_pdf_reminder()
  {
    $this->load->library('dompdf_gen');
    $data = $this->input->post('data');
    // $data = json_decode($data, true);
    echo json_encode($data);
    $datareport = $data;
    $header = [
      'No',
      'Name',
      'Time'
    ];
    $body = [
      'name',
      'duration'
    ];

    $data['report'] = $datareport;
    $data['modul'] = 'Reminder Logtime Report';
    $data['date'] = date('Y-m');
    $data['header'] = $header;
    $data['body'] = $body;

    $paper_size = 'A4'; //paper size
    $orientation = 'landscape'; //tipe format kertas
    $html = $this->load->view('export', $data, true);
    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("welcome.pdf", array('Attachment' => 0));
  }

  public function profitability_report()
  {
    $date = $this->filter(isset($_GET['filter']) ? $_GET['filter'] : date('Y-m'));
    $data['report'] = $this->Report_model->get_profitability_report($date);
    $data['total_project'] = $this->Report_model->count_total_project_profit($date);
    $data['amount'] = $this->calculate_total_profitability($date);
    $data['date'] = $date;
    $data['title'] = 'Profitability Report';
    $data['subtitle'] = 'Profitability Report';
    $data['crumb'] = [
      'Profitability Report' => '',
    ];
    //$this->layout->set_privilege(1);
    $data['page'] = $this->config->item('template') . 'report/profitability';
    $this->load->view($this->config->item('template') . 'template/backend', $data);
  }

  public function top_bottom_5()
  {
    $date = $this->filter(isset($_GET['filter']) ? $_GET['filter'] : date('Y-m'));
    $data['top5'] = $this->get_top5($date);
    $data['bottom5'] = $this->get_bottom5($date);
    $data['date'] = $date;
    $data['title'] = 'Top 5 & Bottom 5';
    $data['subtitle'] = 'Top 5 & Bottom 5';
    $data['crumb'] = [
      'Top 5 & Bottom 5' => '',
    ];
    //$this->layout->set_privilege(1);
    $data['page'] = $this->config->item('template') . 'report/tb5';
    $this->load->view($this->config->item('template') . 'template/backend', $data);
  }


  // GET ZONE //
  public function get_project_cost($date)
  {
    return $this->Report_model->get_project_cost($date);
  }

  public function get_logtime($date)
  {
    return $this->Report_model->get_logtime($date);
  }

  public function get_logtime_detail($date, $user_id)
  {
    return $this->Report_model->get_logtime_detail($date, $user_id);
  }

  public function get_top5($date)
  {
    return $this->Report_model->get_top5_report($date);
  }

  public function get_bottom5($date)
  {
    return $this->Report_model->get_bottom5_report($date);
  }

  // CALCULATE ZONE //
  public function calculate_total_profitability($date)
  {
    return rupiah($this->Report_model->calculate_total_profitability($date)->amount);
  }

  public function count_total_project_cost($date)
  {
    return $this->Report_model->count_total_project_cost($date);
  }

  public function calculate_total_project_cost($date)
  {
    return rupiah($this->Report_model->calculate_total_project_cost($date)->amount);
  }

  public function calculate_amount_logtime_detail($date, $user_id)
  {
    return rupiah($this->Report_model->calculate_amount_logtime_detail($date, $user_id)->amount);
  }

  public function calculate_duration_logtime_detail($date, $user_id)
  {
    return time_to_hour($this->Report_model->calculate_duration_logtime_detail($date, $user_id)->duration);
  }

  public function calculate_duration_logtime($date)
  {
    return time_to_hour($this->Report_model->calculate_duration_logtime($date)->duration);
  }

  public function count_employee_logtime($date)
  {
    return $this->Report_model->count_employee_logtime($date);
  }

  public function calculate_amount_logtime($date)
  {
    return rupiah($this->Report_model->calculate_amount_logtime($date)->amount);
  }

  // FUNCTION //
  public function send_email($email, $subject, $name, $time)
  {
    send_email($email, $subject, $name, $time);
  }

  public function filter($date)
  {
    if (!isset($date)) {
      $date = date('Y-m');
    } else {
      $date = $date;
    }
    return $date;
  }


  // PRINT EXPORT //
  public function print($modul)
  {
    $this->load->library('dompdf_gen');

    if (!isset($_GET['filter'])) {
      $date = date('Y-m');
    } else {
      $date = $_GET['filter'];
      if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
      }
    }

    if ($modul === 'project_cost') {
      $datareport = $this->Report_model->get_project_cost($date);
      $header = [
        'No',
        'Client',
        'Project Code',
        'Project Name',
        'Sum of Amount',
      ];
      $body = [
        'client_name',
        'project_code',
        'project_name',
        'sum_of_amount',
      ];
    } elseif ($modul === 'profitability_report') {
      $datareport = $this->Report_model->get_profitability_report($date);
      $header = [
        'No',
        'Client',
        'Project Name',
        'Project Code',
        'Contract Amount',
        'Running Invoice',
        'Direct Cost',
        'Overhead Cost',
        'General Cost',
        'Total Cost',
        'EBIT'
      ];
      $body = [
        'client_name',
        'name',
        'project_code',
        'contract_amount',
        'running_invoice_amount',
        'direct_cost',
        'overhead_cost',
        'general_cost',
        'total_cost',
        'EBIT'
      ];
    } elseif ($modul === 'logtime') {
      $datareport = $this->Report_model->get_logtime($date);
      $header = [
        'No',
        'Name',
        'Time',
        'Sum of Amount',
      ];
      $body = [
        'name',
        'time',
        'sum_of_amount',
      ];
    } elseif ($modul === 'logtime_detail') {
      $datareport = $this->Report_model->get_logtime_detail($date, $user_id);
      $header = [
        'No',
        'Project Code',
        'Project Name',
        'Client Name',
        'Time',
        'Sum of Amount',
      ];
      $body = [
        'project_code',
        'project_name',
        'client_name',
        'duration',
        'sum_of_amount',
      ];
    }
    $date = bulan_surat($date);
    $data['report'] = $datareport;
    $data['modul'] = $modul;
    $data['header'] = $header;
    $data['body'] = $body;
    $data['date'] = $date;

    $this->load->view('print', $data);
  }

  public function export_pdf($modul)
  {
    $this->load->library('dompdf_gen');

    if (!isset($_GET['filter'])) {
      $date = date('Y-m');
    } else {
      $date = $_GET['filter'];
      if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
      }
    }

    if ($modul === 'project_cost') {
      $datareport = $this->Report_model->get_project_cost($date);
      $header = [
        'No',
        'Client',
        'Project Code',
        'Project Name',
        'Sum of Amount',
      ];
      $body = [
        'client_name',
        'project_code',
        'project_name',
        'sum_of_amount',
      ];
    } elseif ($modul === 'profitability_report') {
      $datareport = $this->Report_model->get_profitability_report($date);
      $header = [
        'No',
        'Client',
        'Project Name',
        'Project Code',
        'Contract Amount',
        'Running Invoice',
        'Direct Cost',
        'Overhead Cost',
        'General Cost',
        'Total Cost',
        'EBIT'
      ];
      $body = [
        'client_name',
        'name',
        'project_code',
        'contract_amount',
        'running_invoice_amount',
        'direct_cost',
        'overhead_cost',
        'general_cost',
        'total_cost',
        'EBIT'
      ];
    } elseif ($modul === 'logtime') {
      $datareport = $this->Report_model->get_logtime($date);
      $header = [
        'No',
        'Name',
        'Time',
        'Sum of Amount',
      ];
      $body = [
        'name',
        'time',
        'sum_of_amount',
      ];
    } elseif ($modul === 'logtime_detail') {
      $datareport = $this->Report_model->get_logtime_detail($date, $user_id);
      $header = [
        'No',
        'Project Code',
        'Project Name',
        'Client Name',
        'Time',
        'Sum of Amount',
      ];
      $body = [
        'project_code',
        'project_name',
        'client_name',
        'duration',
        'sum_of_amount',
      ];
    }
    $date = bulan_surat($date);
    $data['report'] = $datareport;
    $data['modul'] = $modul;
    $data['header'] = $header;
    $data['body'] = $body;
    $data['date'] = $date;

    $paper_size = 'A4'; //paper size
    $orientation = 'landscape'; //tipe format kertas
    $html = $this->load->view('export', $data, true);
    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("welcome.pdf", array('Attachment' => 0));
  }

  public function export_excel($modul)
  {
    if (!isset($_GET['filter'])) {
      $date = date('Y-m');
    } else {
      $date = $_GET['filter'];
      if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
      }
    }

    if ($modul === 'project_cost') {
      $datareport = $this->Report_model->get_project_cost($date);
      $header = [
        'No',
        'Client',
        'Project Code',
        'Project Name',
        'Sum of Amount',
      ];
      $body = [
        'client_name',
        'project_code',
        'project_name',
        'sum_of_amount',
      ];
    } elseif ($modul === 'profitability_report') {
      $datareport = $this->Report_model->get_profitability_report($date);
      $header = [
        'No',
        'Client',
        'Project Name',
        'Project Code',
        'Contract Amount',
        'Running Invoice',
        'Direct Cost',
        'Overhead Cost',
        'General Cost',
        'Total Cost',
        'EBIT'
      ];
      $body = [
        'client_name',
        'name',
        'project_code',
        'contract_amount',
        'running_invoice_amount',
        'direct_cost',
        'overhead_cost',
        'general_cost',
        'total_cost',
        'EBIT'
      ];
    } elseif ($modul === 'logtime') {
      $datareport = $this->Report_model->get_logtime($date);
      $header = [
        'No',
        'Name',
        'Time',
        'Sum of Amount',
      ];
      $body = [
        'name',
        'time',
        'sum_of_amount',
      ];
    } elseif ($modul === 'logtime_detail') {
      $datareport = $this->Report_model->get_logtime_detail($date, $user_id);
      $header = [
        'No',
        'Project Code',
        'Project Name',
        'Client Name',
        'Time',
        'Sum of Amount',
      ];
      $body = [
        'project_code',
        'project_name',
        'client_name',
        'duration',
        'sum_of_amount',
      ];
    }

    $date = bulan_surat($date);
    $this->load->helper('exportexcel');
    $namaFile = "{$modul}_{$date}.xls";
    // $judul = "groups";
    $tablehead = 0;
    $tablebody = 1;
    $nourut = 1;
    //penulisan header
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment;filename=" . $namaFile . "");
    header("Content-Transfer-Encoding: binary ");

    xlsBOF();

    $kolomhead = 0;
    foreach ($header as $kolom) {
      xlsWriteLabel($tablehead, $kolomhead++, $kolom);
    }

    foreach ($datareport as $data) {
      $kolombody = 0;

      //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
      xlsWriteNumber($tablebody, $kolombody++, $nourut);
      foreach ($body as $key => $value) {
        xlsWriteLabel($tablebody, $kolombody++, $data->$value);
      }

      $tablebody++;
      $nourut++;
    }

    xlsEOF();
    exit();
  }

  // TEST ZONE //

  public function tes_api()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.jurnal.id/partner/core/api/v1/general_ledger?end_date=30%2F06%2F2022&start_date=01%2F06%2F2022",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "{}",
      CURLOPT_HTTPHEADER => array(
        "apikey: 974fa97c1da2468b4d0609ac9005ba80",
        "authorization: bearer ddc37518b25e4a7495d13579ab7765eb",
        "content-type: application/json"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
  }

  public function test_email()
  {
    $logo = 'https://i.imgur.com/mCdnh1M.png';
    $name = "akbar";

    $html_content = '
    <html lang="en">
      <head>
        <style>
          .container {
            max-width: 500px;
            margin: 0 auto;
            border: rgb(182, 182, 182) solid 1px;
            border-radius: 20px;
            font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
            overflow: hidden;
          }
          .header {
            background-color: #5b99e7;
            color: #fafafa;
            text-align: center;
            margin-top: 0;
            padding: 20px;
            font-size: 20px;
          }
          .content {
            padding: 20px;
            margin-top: 0;
          }
        </style>
      </head>
      <body>
        <div class="container">
        <div class="header">
        GPP System : Reminder Logtime
        </div>
          <div class="content">
            <p>Hi, ' . $name . '</p>
            Your logtime is less than 35 hours.<br>
            Please check your logtime. <br>
            Thank
            You.<br><br>
            <hr>
            <center>
              <img src="' . $logo . '" width="50px" alt="logo gpp system"/>
            </center>
          </div>
        </div>
      </body>
    </html>';
    test_email('muhammad.akbar5999@gmail.com', 'tess2', $html_content);
  }

  public function tes_jurnal()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.jurnal.id/partner/core/api/v1/expenses',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: bearer 61e7d3c914ea48478b41c3a433a7d0c6',
        'apikey: 974fa97c1da2468b4d0609ac9005ba80',
        'Cookie: incap_ses_1219_1892526=L7KsNQ9ViTwJ8YTQWcLqEJl/uWIAAAAA7M5T0oIBJ/cziFQd13Eaag==; incap_ses_165_1892526=BTUeHG5ovmmP3qw3pzJKAsKDuWIAAAAA28071yKckixa+f+Nk4OQkQ==; incap_ses_962_1892526=hgUPY0CiCU5T3czTo7ZZDfd+uWIAAAAAMZNyv3JOsx0L11enqGNzvQ==; nlbi_1892526=D07Zdmbi8mZ8SqLKF3nkPQAAAAAGx1mMvl/d47qpW3CQGjkR; visid_incap_1892526=oNeYz7w1Tq2BaGAWrA2jeY3CNmIAAAAAQUIPAAAAAADzO1NDVM8G2KncWuKkZfTT'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    print_r($response);
  }
}
