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
        <table id="example1" class="table table-bordered table-striped">
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
                <td class="text-right"><?php echo rupiah($value->sum_of_amount) ?></td>
              </tr>
            <?php } ?>

          </tbody>
          <!-- <tfoot>
            <tr>
              <th>No</th>
              <th>Client</th>
              <th>Project Code</th>
              <th>Project Name</th>
              <th>Sum of Amount</th>
            </tr>
          </tfoot> -->
        </table>

      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    var table = $('#example1').DataTable({
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
    var url = "<?= base_url('Report/project_cost?filter='); ?>" + month;
    window.location.href = url;
  });
</script>