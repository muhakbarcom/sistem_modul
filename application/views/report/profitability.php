<style>
  /* .dtHorizontalExampleWrapper {
    max-width: 600px;
    margin: 0 auto;
  } */

  #example1 th,
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
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Project Cost - <?php echo bulan_surat($date) ?></h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
            <i class="fa fa-refresh"></i></button>
        </div>
      </div>

      <div class="row" style="margin: 10px;">
        <div class="col-md-6"></div>
        <div class="col-md-3">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
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
        </div>
        <div class="col-md-3">
          <div class="col-md-12">
            <div class="box-body" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
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

      <div class="row" style="margin-top:50px ;">
        <div class="col-md-6"></div>
        <div class="col-md-3">
          <input type="text" class="form-control formdate2" name="filter_month" id="filter_month" placeholder="Choose Month">
        </div>
        <div class="col-md-3">

        </div>
      </div>

      <div class="box-body">
        <table id="example1" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
<script>
  $(document).ready(function() {
    // $('.dataTables_length').addClass('bs-select');
    var table = $('#example1').DataTable({
      "scrollX": true,
      lengthMenu: [
        [10, 25, 50, -1],
        ['10 rows', '25 rows', '50 rows', 'Show all']
      ],
      lengthChange: false,
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
</script>