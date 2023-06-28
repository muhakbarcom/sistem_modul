<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autosync extends CI_Controller
{
  public $clockify_workspaces;
  public $clockify_x_api_key;
  public $clockify_base_url;
  public $airtable_base_url;
  public $airtable_authorization;
  public $airtable_cookie;
  public $jurnal_base_url;
  public $jurnal_authorization;
  public $jurnal_cookie;
  public $jurnal_apikey;

  public function __construct()
  {
    parent::__construct();
    $this->clockify_workspaces = $this->config->item('clockify_workspaces');
    $this->clockify_x_api_key = $this->config->item('clockify_x_api_key');
    $this->clockify_base_url = $this->config->item('clockify_base_url');
    $this->airtable_base_url = $this->config->item('airtable_base_url');
    $this->airtable_authorization = $this->config->item('airtable_authorization');
    $this->airtable_cookie = $this->config->item('airtable_cookie');
    $this->jurnal_base_url = $this->config->item('jurnal_base_url');
    $this->jurnal_authorization = $this->config->item('jurnal_authorization');
    $this->jurnal_cookie = $this->config->item('jurnal_cookie');
    $this->jurnal_apikey = $this->config->item('jurnal_apikey');
  }

  public function index()
  {
    // die;
    $this->sync_client();
    $this->sync_project();
    $this->sync_project_member();
    $this->sync_employee();
    $this->sync_logtime();
    $this->sync_milestone();
    $this->sync_client_table();
    $this->sync_project_table();
    $this->sync_invoice();
    $this->sync_general_cost();
    $this->session->set_flashdata('success', "Synchronization was successful");
    redirect('dashboard', 'refresh');
  }

  public function sync_client()
  {

    // get data from clockify
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->clockify_base_url . $this->clockify_workspaces . "/clients?archived=false&name&page=1&page-size=100&sort-column=NAME&sort-order=ASCENDING",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        "X-Api-Key: " . $this->clockify_x_api_key,
      ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    curl_close($curl);

    // empty table
    $table = 'client';
    $this->db->empty_table($table);
    // insert all $response to database
    foreach ($response as $key => $value) {
      $data = [
        'name' => $value['name'],
        'id' => $value['id'],
      ];

      $this->db->where('id', $value['id']);
      $q = $this->db->get($table);
      $this->db->reset_query();

      if ($q->num_rows() > 0) {
        $this->db->where('id', $value['id'])->update($table, $data);
      } else {
        $this->db->set('id', $value['id'])->insert($table, $data);
      }
    }

    $response = [
      'status' => 'success',
      'message' => 'Data client from Clocify was successfully synchronized',
    ];
    echo json_encode($response);
  }

  public function date_slash_to_minus($date)
  {
    $date = explode("/", $date); // Exploding the / character into array
    $datetime = $date[2] . '-' . $date[1] . '-' . $date[0];
    return $datetime;
  }


  public function sync_project()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->clockify_base_url . $this->clockify_workspaces . "/projects?archived=false&name&page=&page-size=&sort-column=NAME&sort-order=ASCENDING",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        "X-Api-Key: " . $this->clockify_x_api_key,
      ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    curl_close($curl);

    // empty table
    $table = 'project';
    $this->db->empty_table($table);
    // insert all $response to database
    foreach ($response as $key => $value) {
      // jika tidak ada "-"
      if (strpos($value['name'], '-') === false) {
        $project_code = "";
        // ambil 3 huruf pertama dari $project_code
        $client_nick = "";
        $project_name = $value['name'];
      } else {
        $explode = explode("-", $value['name']);
        $explode1 = trim($explode[0]);
        $explode2 = trim($explode[1]);
        $explode3 = trim($explode[2]);
        $project_code = $explode1;
        // ambil 3 huruf pertama dari $project_code
        $client_nick = substr($project_code, 0, 3);
        $project_name = $explode3;
      }

      $data_project = [
        'id' => $value['id'],
        'project_code' => $project_code,
        'client_id' => $value['clientId'],
        'client_name' => $value['clientName'],
        'name' => $project_name,
        'duration' => $value['duration'],
        'note' => $value['note']
      ];

      $this->db->where('id', $value['id']);
      $q = $this->db->get($table);
      $this->db->reset_query();

      if ($q->num_rows() > 0) {
        $this->db->where('id', $value['id'])->update($table, $data_project);
      } else {
        $this->db->set('id', $value['id'])->insert($table, $data_project);
      }

      $data_client = [
        'nick' => $client_nick,
      ];
      $table2 = 'client';
      $this->db->where('id', $value['clientId']);
      $q = $this->db->get($table2);
      $this->db->reset_query();

      if ($q->num_rows() > 0) {
        $this->db->where('id', $value['clientId'])->update($table2, $data_client);
      } else {
        $this->db->set('id', $value['clientId'])->insert($table2, $data_client);
      }
    }
    $response = [
      'status' => 'success',
      'message' => 'Data project from Clocify was successfully synchronized',
    ];
    echo json_encode($response);
  }

  public function sync_project_member()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->clockify_base_url . $this->clockify_workspaces . "/projects?archived=false&name&page=&page-size=&sort-column=NAME&sort-order=ASCENDING",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        "X-Api-Key: " . $this->clockify_x_api_key,
      ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    curl_close($curl);

    // empty table
    $table = 'project_member';
    $this->db->empty_table($table);
    // insert all $response to database
    foreach ($response as $key => $value) {
      $memberships = $value['memberships'];

      foreach ($memberships as $key => $value) {
        $data = [
          'project_id' => $value['targetId'],
          'user_id' => $value['userId'],
          'hourly_rate' => $value['hourlyRate'],
          'cost_rate' => $value['costRate'],
          'membership_type' => $value['membershipType'],
          'membership_status' => $value['membershipStatus']
        ];

        $sql = $this->db->query("select count(id_data) as data from project_member where project_id = '" . $value['targetId'] . "' and user_id = '" . $value['userId'] . "'")->row();

        if ($sql->data > 0) {
          $this->db->where('project_id', $value['targetId'])->where('user_id', $value['userId'])->update($table, $data);
        } else {
          $this->db->set('project_id', $value['targetId'])->set('user_id', $value['userId'])->insert($table, $data);
        }

        $this->db->reset_query();
      }
    }
    $response = [
      'status' => 'success',
      'message' => 'Data project member from Clocify was successfully synchronized',
    ];
    echo json_encode($response);
  }

  public function sync_employee()
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->clockify_base_url . $this->clockify_workspaces . "/users?memberships=ALL",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        "X-Api-Key: " . $this->clockify_x_api_key,
      ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);


    curl_close($curl);

    // empty table
    $table = 'employee';
    $this->db->empty_table($table);
    foreach ($response as $key => $value) {

      $data = [
        'id' => $value['id'],
        'email' => $value['email'],
        'name' => $value['name'],
        'picture' => $value['profilePicture'],
        'status' => $value['status'],
        'amount' => substr($value['memberships'][0]['hourlyRate']['amount'], 0, -2)
      ];

      $this->db->where('id', $value['id']);
      $q = $this->db->get($table);
      $this->db->reset_query();

      if ($q->num_rows() > 0) {
        $this->db->where('id', $value['id'])->update($table, $data);
      } else {
        $this->db->set('id', $value['id'])->insert($table, $data);
      }
    }
    $response = [
      'status' => 'success',
      'message' => 'Data employee from Clocify was successfully synchronized',
    ];
    echo json_encode($response);
  }


  public function convert_duration($duration)
  {
    // get 2 number before H letter
    $hourpos = strpos($duration, 'H');
    $hour = substr($duration, 0, $hourpos);
    // number only
    $hour = preg_replace('/[^0-9]/', '', $hour);

    // get 2 number before M letter
    $minpos = strpos($duration, 'M');
    $minute = substr($duration, $minpos - 2, $minpos - 4);
    // number only
    $minute = preg_replace('/[^0-9]/', '', $minute);

    // get 2 number before S letter
    $secpos = strpos($duration, 'S');
    $second = substr($duration, $secpos - 2, $secpos);
    // number only
    $second = preg_replace('/[^0-9]/', '', $second);

    if ($hour == "") {
      $hour = 0;
    }

    if ($minute == "") {
      $minute = 0;
    }

    if ($second == "") {
      $second = 0;
    }

    $hour = $hour * 3600;
    $minute = $minute * 60;
    $second = $second;

    return $hour + $minute + $second;
  }

  public function sync_logtime()
  {

    // get data employee
    $employee = $this->db->get('employee')->result();
    // empty table
    $table = 'logtime';
    $this->db->empty_table($table);
    foreach ($employee as $value) {
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => $this->clockify_base_url . $this->clockify_workspaces . "/user/$value->id/time-entries",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
          "X-Api-Key: " . $this->clockify_x_api_key,
        ),
      ));

      $response = curl_exec($curl);
      $response = json_decode($response, true);

      curl_close($curl);
      $manhourly = $value->amount;


      foreach ($response as $key => $value) {

        $total = $this->convert_duration($value['timeInterval']['duration']);
        // duration = $total to hh:mm:ss
        $duration = gmdate("H:i:s", $total);
        $ratepersec = $manhourly / 3600;
        $amount = $total * $ratepersec;
        // $amount = number_format($amount, 2);

        $data = [
          'id' => $value['id'],
          'description' => $value['description'],
          'user_id' => $value['userId'],
          'project_id' => $value['projectId'],
          'timeinterval_start' => $value['timeInterval']['start'],
          'timeinterval_end' => $value['timeInterval']['end'],
          'timeinterval_duration' => $duration,
          'rate' => $manhourly,
          'amount' => $amount,
        ];
        $this->db->where('id', $value['id']);
        $q = $this->db->get('logtime');
        $this->db->reset_query();

        if ($q->num_rows() > 0) {
          $this->db->where('id', $value['id'])->update('logtime', $data);
        } else {
          $this->db->set('id', $value['id'])->insert('logtime', $data);
        }
      }
    }
    $response = [
      'status' => 'success',
      'message' => 'Data logtime from Clocify was successfully synchronized',
    ];
    echo json_encode($response);
  }

  public function sync_milestone()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->airtable_base_url . "Dashboard%20Milestones?maxRecords=100&view=Milestone%20Data",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        "Authorization:" . $this->airtable_authorization,
        "Cookie:" . $this->airtable_cookie,
      ),
    ));

    $response = curl_exec($curl);

    $response = json_decode($response, true);
    curl_close($curl);
    // empty table
    $table = 'milestone';
    $this->db->empty_table($table);
    // insert all $response to database
    foreach ($response['records'] as $key => $value) {
      if (isset($value['fields']['Milestone Name'])) {
        $milestone_name = $value['fields']['Milestone Name'];
      } else {
        $milestone_name = null;
      }

      if (isset($value['fields']['Adjustment Date'])) {
        $adjustment_date = $value['fields']['Adjustment Date'];
      } else {
        $adjustment_date = null;
      }

      if (isset($value['fields']['Actual Date'])) {
        $actual_date = $value['fields']['Actual Date'];
      } else {
        $actual_date = null;
      }

      if (isset($value['fields']['Contract Date'])) {
        $contract_date = $value['fields']['Contract Date'];
      } else {
        $contract_date = null;
      }

      if (isset($value['fields']['Milestone Status'])) {
        $milestone_status = $value['fields']['Milestone Status'];
      } else {
        $milestone_status = null;
      }

      $data = [
        'id' => $value['id'],
        'created_time' => $value['createdTime'],
        'project_code' => $value['fields']['Project Code'][0],
        'milestone_value' => $value['fields']['Milestone Value'],
        'project_status' => $value['fields']['Project Status'][0],
        'project_year' => $value['fields']['Project Year'][0],
        'milestone_name' => $milestone_name,
        'adjustment_date' => $adjustment_date,
        'actual_date' => $actual_date,
        'contract_date' => $contract_date,
        'milestone_status' => $milestone_status,

      ];

      $this->db->where('id', $value['id']);
      $q = $this->db->get($table);
      $this->db->reset_query();

      if ($q->num_rows() > 0) {
        $this->db->where('id', $value['id'])->update($table, $data);
      } else {
        $this->db->set('id', $value['id'])->insert($table, $data);
      }
    }
    $response = [
      'status' => 'success',
      'message' => 'Data milestone from Airtable was successfully synchronized',
    ];
    echo json_encode($response);
  }

  public function sync_summary_report()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://reports.api.clockify.me/v1/workspaces/" . $this->clockify_workspaces . "/reports/summary",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{
    
      "dateRangeStart": "2022-01-10T00:00:00.000",
      "dateRangeEnd": "2022-05-16T23:59:59.000",
      "summaryFilter": {
        "groups": [
          "USER",
          "PROJECT",
          "TIMEENTRY"
        ]
        }
    }',
      CURLOPT_HTTPHEADER => array(
        "X-Api-Key: " . $this->clockify_x_api_key,
        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);

    $response = json_decode($response, true);

    curl_close($curl);

    return $response;
  }

  public function sync_project_table()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->airtable_base_url . "Project?maxRecords=100&view=Grid%20view",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        "Authorization:" . $this->airtable_authorization,
        "Cookie:" . $this->airtable_cookie,
      ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    curl_close($curl);
    // print_r($response);
    // die;
    // insert all $response to database
    foreach ($response['records'] as $key => $value) {

      $project_code = $value['fields']['Project Code'][0];


      if (isset($value['fields']['Status Project'])) {
        $project_status = $value['fields']['Status Project'];
      } else {
        $project_status = null;
      }


      if (isset($value['fields']['Project Start'])) {
        $project_start = $value['fields']['Project Start'];
      } else {
        $project_start = null;
      }

      if (isset($value['fields']['Project Finish Estimation'])) {
        $project_finish = $value['fields']['Project Finish Estimation'];
      } else {
        $project_finish = null;
      }

      if (isset($value['fields']['Project Value'])) {
        $project_value = $value['fields']['Project Value'];
      } else {
        $project_value = null;
      }

      if (isset($value['fields']['tribe'][0])) {
        $tribe = $value['fields']['tribe'][0];
        $tribe = $this->sync_tribe($tribe);
      } else {
        $tribe = null;
      }

      if (isset($value['fields']['Status Project (from Order)'])) {
        $status_order = "";
        foreach ($value['fields']['Status Project (from Order)'] as $key => $value) {
          $status_order = $status_order . "," . $value;
        }
        // hapus comma di awal
        $status_order = substr($status_order, 1);
      } else {
        $status_order = null;
      }

      $data_project = [
        'status' => $project_status,
        'status_order' => $status_order,
        'project_value' => $project_value,
        'project_start' => $project_start,
        'project_finish' => $project_finish,
        'tribe' => $tribe
      ];

      $this->db->where('project_code', $project_code);
      $q = $this->db->get('project');
      $this->db->reset_query();

      if ($q->num_rows() > 0) {
        $this->db->where('project_code', $project_code)->update('project', $data_project);
      }
    }
    $response = [
      'status' => 'success',
      'message' => 'Data project from Airtable was successfully synchronized',
    ];
    echo json_encode($response);
  }
  public function sync_client_table()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->airtable_base_url . "Client?maxRecords=3&view=Client",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        "Authorization:" . $this->airtable_authorization,
        "Cookie:" . $this->airtable_cookie,
      ),
    ));

    $response = curl_exec($curl);

    $response = json_decode($response, true);
    curl_close($curl);

    // insert all $response to database
    foreach ($response['records'] as $key => $value) {
      if (isset($value['fields']['Client Values'])) {
        $client_value = $value['fields']['Client Values'];
      } else {
        $client_value = null;
      }
      if (isset($value['fields']['Email'])) {
        $client_email = $value['fields']['Email'];
      } else {
        $client_email = null;
      }
      $data = [
        'value' => $client_value,
        'email' => $client_email
      ];

      $this->db->where('nick', $value['fields']['Client Nick']);
      $q = $this->db->get('client');
      $this->db->reset_query();

      if ($q->num_rows() > 0) {
        $this->db->where('nick', $value['fields']['Client Nick'])->update('client', $data);
      }
    }
    $response = [
      'status' => 'success',
      'message' => 'Data client from Airtable was successfully synchronized',
    ];
    echo json_encode($response);
  }

  public function sync_tribe($tribe_id)
  {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->airtable_base_url . "Tribe/$tribe_id",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        "Authorization:" . $this->airtable_authorization,
        "Cookie:" . $this->airtable_cookie,
      ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    curl_close($curl);

    return $response['fields']['Tribe Name'];
  }

  public function sync_invoice()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->jurnal_base_url . "sales_invoices",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        "Authorization:" . $this->jurnal_authorization,
        'Cookie: incap_ses_501_1892526=y37dC/hnLis3CyjffenzBmlYuGIAAAAATYj4YZ/5r4KxNA/hFUJmFg==; nlbi_1892526=q/IUT9Hm+BSN7rz5F3nkPQAAAAD/9Z07euvB3jVNIBCHcS7d; visid_incap_1892526=oNeYz7w1Tq2BaGAWrA2jeY3CNmIAAAAAQUIPAAAAAADzO1NDVM8G2KncWuKkZfTT'
      ),
    ));

    $response = curl_exec($curl);

    $response = json_decode($response, true);
    curl_close($curl);

    $table = 'invoice';
    $this->db->empty_table($table);
    // insert all $response to database
    // insert all $response to database
    foreach ($response['sales_invoices'] as $key => $value) {
      if (isset($value['id'])) {
        $id = $value['id'];
      } else {
        $id = null;
      }

      if (isset($value['transaction_no'])) {
        $invoice_number = $value['transaction_no'];
      } else {
        $invoice_number = null;
      }

      if (isset($value['transaction_date'])) {
        $invoice_date = $value['transaction_date'];
        $invoice_date = $this->date_slash_to_minus($invoice_date);
      } else {
        $invoice_date = null;
      }

      if (isset($value['original_amount'])) {
        $invoice_amount = $value['original_amount'];
      } else {
        $invoice_amount = null;
      }

      if (isset($value['person']['display_name'])) {
        $client_name = $value['person']['display_name'];
      } else {
        $client_name = null;
      }

      if (isset($value['tags_string'])) {
        $project_code = $value['tags_string'];
      } else {
        $project_code = null;
      }

      if (isset($value['attachments'][0]['link_url'])) {
        $invoice_file = $value['attachments'][0]['link_url'];
      } else {
        $invoice_file = null;
      }

      $data = [
        'id' => $id,
        'invoice_number' => $invoice_number,
        'invoice_date' => $invoice_date,
        'invoice_amount' => $invoice_amount,
        'client_name' => $client_name,
        'project_code' => $project_code,
        'invoice_file' => $invoice_file
      ];

      $this->db->where('id', $id);
      $q = $this->db->get($table);
      $this->db->reset_query();

      if ($q->num_rows() > 0) {
        $this->db->where('id', $id)->update($table, $data);
      } else {
        $this->db->set('id', $id)->insert($table, $data);
      }
    }
    $response = [
      'status' => 'success',
      'message' => 'Data invoice from Jurnal.id was successfully synchronized',
    ];
    echo json_encode($response);
  }

  public function sync_general_cost()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->jurnal_base_url . "expenses",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        "Authorization:" . $this->jurnal_authorization,
        "apikey:" . $this->jurnal_apikey,
        "Cookie:" . $this->jurnal_cookie
      ),
    ));

    $response = curl_exec($curl);

    $response = json_decode($response, true);
    curl_close($curl);

    $table = 'general_expenses';
    $this->db->empty_table($table);
    // insert all $response to database
    // insert all $response to database
    foreach ($response['expenses'] as $key => $value) {
      if (isset($value['id'])) {
        $id = $value['id'];
      } else {
        $id = null;
      }

      if (isset($value['amount_receive'])) {
        $amount = $value['amount_receive'];
      } else {
        $amount = null;
      }

      if (isset($value['transaction_date'])) {
        $date = $value['transaction_date'];
        $date = $this->date_slash_to_minus($date);
      } else {
        $date = null;
      }

      if (isset($value['account_category'])) {
        $description = $value['account_category'];
      } else {
        $description = null;
      }

      $data = [
        'id' => $id,
        'amount' => $amount,
        'date' => $date,
        'description' => $description
      ];

      $this->db->where('id', $id);
      $q = $this->db->get($table);
      $this->db->reset_query();

      if ($q->num_rows() > 0) {
        $this->db->where('id', $id)->update($table, $data);
      } else {
        $this->db->set('id', $id)->insert($table, $data);
      }
    }
    $response = [
      'status' => 'success',
      'message' => 'Data general cost from Jurnal.id was successfully synchronized',
    ];
    echo json_encode($response);
  }
}
