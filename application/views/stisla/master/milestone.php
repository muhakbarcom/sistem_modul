<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4><?php echo $subtitle ?></h4>
        <div class="card-header-action">
          <div class="row">
            <div class="col-md-6">
              <input type="text" class="form-control formdate2 " name="filter_month" id="filter_month" placeholder="Choose Month">
            </div>
            <div class="col-md-6">
              <div class="dropdown">
                <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Export</a>
                <div class="dropdown-menu">
                  <a href="#" class="dropdown-item has-icon"><i class="fa fa-file-excel"></i> Excel</a>
                  <a href="#" class="dropdown-item has-icon"><i class="fa fa-file-pdf"></i> PDF</a>
                </div>
              </div>
              <a href="#" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
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
              <th>Project Code</th>
              <th>Project Name</th>
              <th>Milestone Name</th>
              <th>Value</th>
              <th>Contract Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($data as $value) {
            ?>
              <tr>
                <td class="text-center" style="width: 10px;"><?php echo $no++ ?></td>
                <td><?php echo $value->project_code ?></td>
                <td><?php echo $value->project_name ?></td>
                <td><?php echo $value->milestone_name ?></td>
                <td><?php echo rupiah($value->milestone_value) ?></td>
                <td><?php echo $value->contract_date ?></td>
              </tr>
            <?php } ?>

          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Project Code</th>
              <th>Project Name</th>
              <th>Milestone Name</th>
              <th>Value</th>
              <th>Contract Date</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#examplex').DataTable({
      rowGroup: {
        dataSrc: 2
      },
      order: [
        [2, 'desc']
      ]
    });
  });

  $(document).ready(function() {
    var table = $('#example').DataTable({
      rowGroup: {
        dataSrc: 1
      },
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

  // when filter month hover then change mouse to pointer
  $('#filter_month').hover(function() {
    $(this).css('cursor', 'pointer');
  });

  // when filter_month is changed
  $('#filter_month').change(function() {
    var month = $(this).val();
    var url = "<?= base_url('Master/milestone?filter='); ?>" + month;
    window.location.href = url;
  });

  // get month from url
  var url = window.location.href;
  var month = url.split('?filter=')[1];
  if (month != undefined) {
    $('#filter_month').val(month);
  }
  // add placeholder to filter month
  $('#filter_month').attr('placeholder', month);

  // get month from url
  var url = window.location.href;
  var month = url.split('?')[1];
  var month = month.split('=')[1];
  $('#filter_month').val(month);
</script>