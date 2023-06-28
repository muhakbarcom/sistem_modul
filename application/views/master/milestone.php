<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <?php
        if (isset($date)) {
          $date = bulan_surat($date);
        } else {
          $date = "All Data";
        }
        ?>
        <h3 class="box-title">Milestone - <?php echo $date ?></h3>
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
                    <div class="row" style="font-size: 20px;"><b>xxx</b> <small>Project</small></div>
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
                  <div class="row" style="font-size: 20px;"><b>xxx</b></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row" style="margin-top:50px ;">
        <div class="col-md-6"></div>
        <div class="col-md-3">

        </div>
        <div class="col-md-3">
          <div class="row">
            <div class="col-md-7">
              <label for="">Filter : </label>
              <input type="text" class="form-control formdate2" name="filter_month" id="filter_month" placeholder="Choose Month">
            </div>
            <div class="col-md-5"><button class="akbr_btn akbr_danger">Show All</button></div>
          </div>
        </div>
      </div>

      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
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
    $('#example1').DataTable({
      order: [
        [2, 'desc']
      ],
      rowGroup: {
        dataSrc: 2
      }
    });
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
</script>