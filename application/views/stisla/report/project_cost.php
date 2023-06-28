<div class="row justify-content-end">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="<?= base_url('assets/img/task-icon.png'); ?>" alt="" width="50px">
          </div>
          <div class="col-md-8">
            <div class="row font-weight-bold" style="color: #5B99E7;">Total Project</div>
            <div class="row" style="font-size: 20px;"><b><?= $total_project . " Project"; ?></b></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="<?= base_url('assets/img/dollar-icon.png'); ?>" alt="" width="50px">
          </div>
          <div class="col-md-8">
            <div class="row font-weight-bold" style="color: #5B99E7;">Total Amount</div>
            <div class="row" style="font-size: 20px;"><b><?= $amount; ?></b></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4><?php echo $subtitle . " - " . bulan_surat($date) ?></h4>
        <div class="card-header-action">
          <div class="row">
            <div class="col-md-6">
              <input type="text" class="form-control formdate2 " name="filter_month" id="filter_month" placeholder="Choose Month">
            </div>
            <div class="col-md-6">
              <div class="dropdown">
                <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Export</a>
                <div class="dropdown-menu">
                  <a href="<?= base_url('Report/export_excel/project_cost/?filter=' . $date); ?>" class="dropdown-item has-icon"><i class="fa fa-file-excel"></i> Excel</a>
                  <a href="<?= base_url('Report/export_pdf/project_cost/?filter=' . $date); ?>" class="dropdown-item has-icon"><i class="fa fa-file-pdf"></i> PDF</a>
                </div>
              </div>
              <a href="<?= base_url('Report/print/project_cost/?filter=' . $date); ?>" target="_BLANK" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <!-- <?= $total_project; ?>
        <?= $amount; ?> -->
        <table id="example" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Client</th>
              <th>Project Code</th>
              <th>Project Name</th>
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
                <td><?php echo $value->client_name ?></td>
                <td><?php echo $value->project_code ?></td>
                <td><?php echo $value->project_name ?></td>
                <td><?php echo rupiah($value->sum_of_amount) ?></td>
              </tr>
            <?php } ?>

          </tbody>
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

<script type="text/javascript">
  //when filter month hover then change mouse to pointer
  $('#filter_month').hover(function() {
    $(this).css('cursor', 'pointer');
  });

  // when filter_month is changed
  $('#filter_month').change(function() {
    var month = $(this).val();
    var url = "<?= base_url('Report/project_cost?filter='); ?>" + month;
    window.location.href = url;
  });

  // get month from url
  var url = window.location.href;
  var month = url.split('?')[1];
  var month = month.split('=')[1];
  $('#filter_month').val(month);
</script>