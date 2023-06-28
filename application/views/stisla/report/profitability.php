<style>
  /* .dtHorizontalExampleWrapper {
    max-width: 600px;
    margin: 0 auto;
  } */

  #example th,
  td {
    white-space: nowrap;
    /* padding: 10px; */
  }

  table.dataTable thead .sorting:after,
  table.dataTable thead .sorting:before,
  table.dataTable thead .sorting_asc:after,
  table.dataTable thead .sorting_asc:before,
  table.dataTable thead .sorting_asc_disabled:after,
  table.dataTable thead .sorting_asc_disabled:before,
  table.dataTable thead .sorting_desc:after,
  table.dataTable thead .sorting_desc:before,
  table.dataTable thead .sorting_desc_disabled:after,
  table.dataTable thead .sorting_desc_disabled:before {
    bottom: .5em;
  }
</style>
<div class="row justify-content-end">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="<?= base_url('assets/img/task-icon.png'); ?>" alt="" width="50px">
          </div>
          <div class="col-md-8">
            <div class="row text-bold" style="color: #5B99E7;">Total Project</div>
            <div class="row" style="font-size: 20px;"><b><?= $total_project; ?></b> <small>Project</small></div>
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
            <div class="row text-bold" style="color: #5B99E7;">Total Amount</div>
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
                  <a href="<?= base_url('Report/export_excel/profitability_report/?filter=' . $date); ?>" class="dropdown-item has-icon"><i class="fa fa-file-excel"></i> Excel</a>
                  <a href="<?= base_url('Report/export_pdf/profitability_report/?filter=' . $date); ?>" class="dropdown-item has-icon"><i class="fa fa-file-pdf"></i> PDF</a>
                </div>
              </div>
              <a href="<?= base_url('Report/print/profitability_report/?filter=' . $date); ?>" target="_BLANK" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <!-- <?= $total_project; ?>
        <?= $amount; ?> -->
        <table id="example" class="table table-striped table-responsive" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Client</th>
              <th>Project Name</th>
              <th>Project Code</th>
              <th>Contract Amount</th>
              <th>Running Invoice</th>
              <th>Direct Cost</th>
              <th>Overhead Cost</th>
              <th>General Cost</th>
              <th>Total Cost</th>
              <th>EBIT</th>
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
                <td><?php echo $value->name ?></td>
                <td><?php echo $value->project_code ?></td>
                <td class="text-right"><?php echo rupiah($value->contract_amount) ?></td>
                <td class="text-right"><?php echo rupiah($value->running_invoice_amount) ?></td>
                <td class="text-right"><?php echo rupiah($value->direct_cost) ?></td>
                <td class="text-right"><?php echo rupiah($value->overhead_cost) ?></td>
                <td class="text-right"><?php echo rupiah($value->general_cost) ?></td>
                <td class="text-right"><?php echo rupiah($value->total_cost) ?></td>
                <td class="text-right"><?php echo rupiah($value->EBIT) ?></td>

              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  // when filter month hover then change mouse to pointer
  $('#filter_month').hover(function() {
    $(this).css('cursor', 'pointer');
  });

  // when filter_month is changed
  $('#filter_month').change(function() {
    var month = $(this).val();
    var url = "<?= base_url('Report/profitability_report?filter='); ?>" + month;
    window.location.href = url;
  });

  // get month from url
  var url = window.location.href;
  var month = url.split('?')[1];
  var month = month.split('=')[1];
  $('#filter_month').val(month);
</script>
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