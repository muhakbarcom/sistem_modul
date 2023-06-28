<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Logtime - <?php echo bulan_surat($date) ?></h4>
        <div class="card-header-action">
          <div class="row mr-3">
            <div class="dropdown">
              <a href="#" data-toggle="dropdown" class="mr-2 btn btn-primary dropdown-toggle">Export</a>
              <div class="dropdown-menu">
                <a href="<?= base_url('Report/export_excel/logtime_detail/?filter=' . $date . '&user_id=' . $user_id); ?>" class="dropdown-item has-icon"><i class="fa fa-file-excel"></i> Excel</a>
                <a href="<?= base_url('Report/export_pdf/logtime_detail/?filter=' . $date . '&user_id=' . $user_id); ?>" class="dropdown-item has-icon"><i class="fa fa-file-pdf"></i> PDF</a>
              </div>
            </div>
            <a href="<?= base_url('Report/export_pdf/logtime_detail/?filter=' . $date . '&user_id=' . $user_id); ?>" target="_BLANK" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
          </div>
        </div>
      </div>
      <div class="row" style="margin: 10px;">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-3">
              <img class="rounded-circle img-responsive" src="<?= $employee->picture; ?>" alt="" width="110px">
            </div>
            <div class="col-md-5">
              <div class="row text-bold" style="font-size: 30px;"><?= $employee->name; ?></div>
              <div class="row"><?= $employee->email; ?></div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="row">
            <div class="col-md-12">
              <div class="card-body" style="card-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                <div class="row">
                  <div class="col-md-4">
                    <img src="<?= base_url('assets/img/calendar-icon.png'); ?>" alt="" width="50px">
                  </div>
                  <div class="col-md-8">
                    <div class="row text-bold" style="color: #5B99E7;">Total Time</div>
                    <div class="row" style="font-size: 20px;"><b><?= $duration; ?></b> Hour</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="col-md-12">
            <div class="card-body" style="card-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
              <div class="row">
                <div class="col-md-4">
                  <img src="<?= base_url('assets/img/dollar-icon.png'); ?>" alt="" width="50px">
                </div>
                <div class="col-md-8">
                  <div class="row text-bold" style="color: #5B99E7;">Total Amount</div>
                  <div class="row" style="font-size: 20px;"><b><?= $amount; ?></b></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table id="example" class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Project Code</th>
              <th>Project Name</th>
              <th>Client Name</th>
              <th>Time</th>
              <th>Sum of Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($report as $value) {
            ?>
              <tr>
                <td class="text-center" style="width: 10px;"><?php echo $no++ ?></td>
                <td><?php echo $value->project_code ?></td>
                <td><?php echo $value->project_name ?></td>
                <td><?php echo $value->client_name ?></td>
                <!-- time to hour -->
                <td><?php
                    echo time_to_hour($value->duration) . " Hour";
                    ?></td>
                <td><?php echo rupiah($value->sum_of_amount) ?></td>
              </tr>
            <?php } ?>

          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Project Code</th>
              <th>Project Name</th>
              <th>Client Name</th>
              <th>Time</th>
              <th>Sum of Amount</th>
            </tr>
          </tfoot>
        </table>

      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    var table = $('#example').DataTable({
      lengthMenu: [
        [10, 25, 50, 100],
        ['10', '25', '50', '100']
      ],
      lengthChange: true,
      buttons: [{
          extend: 'pageLength'

        },
        {
          extend: 'print',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'excel',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'pdf',
          exportOptions: {
            columns: ':visible'
          }
        },
        'colvis'
      ]
    });

    table.buttons().container()
      .appendTo('#example1_wrapper .col-sm-6:eq(0)');
  });
</script>