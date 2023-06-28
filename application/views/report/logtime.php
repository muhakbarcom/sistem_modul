<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Logtime - <?php echo bulan_surat($date) ?></h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
            <i class="fa fa-refresh"></i></button>
        </div>
      </div>
      <div class="row" style="margin: 10px;">
        <div class="col-md-3"></div>
        <div class="col-md-3">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                <div class="row">
                  <div class="col-md-4">
                    <img src="<?= base_url('assets/img/employee-icon.png'); ?>" alt="" width="50px">
                  </div>
                  <div class="col-md-8">
                    <div class="row text-bold" style="color: #5B99E7;">Total Employee</div>
                    <div class="row" style="font-size: 20px;"><b><?= $employee; ?></b> <small>Employee</small></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                <div class="row">
                  <div class="col-md-4">
                    <img src="<?= base_url('assets/img/calendar-icon.png'); ?>" alt="" width="50px">
                  </div>
                  <div class="col-md-8">
                    <div class="row text-bold" style="color: #5B99E7;">Total Duration</div>
                    <div class="row" style="font-size: 20px;"><b><?= $duration; ?></b> <small>hour</small></div>
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
          <input type="text" class="formdate2 form-control" name="filter_month" id="filter_month" placeholder="Choose Month">
        </div>
        <div class="col-md-3">
          <button class="akbr_btn akbr_primary" id="reminder_logtime">
            <i class="fa fa-bell"></i> Reminder Logtime
          </button>
        </div>
      </div>

      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>#</th>
              <th>Name</th>
              <th>Time</th>
              <th style="width: 110px;">Sum of Amount</th>
              <th style="width: 110px;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($report as $value) {
            ?>
              <tr>
                <td class="text-center" style="width: 10px;"><?php echo $no++ ?></td>
                <td><img src="<?php echo $value->picture ?>" alt="" width="50px"></td>
                <td><?php echo $value->name ?></td>
                <!-- time to hour -->
                <td><?php
                    echo time_to_hour($value->time) . " Hour";
                    ?></td>
                <td class="text-right"><?php echo rupiah($value->sum_of_amount) ?></td>
                <td class="text-center"><a class="badge bg-primary rounded-pill" href="#" id="detail-logtime" data-id="<?= $value->user_id; ?>"> <span class="fas fa-search-plus"></span> Detail</a></td>
              </tr>
            <?php } ?>

          </tbody>
          <!-- <tfoot>
            <tr>
              <th>No</th>
              <th>#</th>
              <th>Name</th>
              <th>Time</th>
              <th>Sum of Amount</th>
              <th>Action</th>
            </tr>
          </tfoot> -->
        </table>

      </div>
    </div>
  </div>
</div>
<script>
  // when detail-logtime clicked
  $(document).on('click', '#detail-logtime', function() {
    // get current url
    var url = window.location.href;
    // get ?filter= data on url
    var filter = url.split('?filter=')[1];
    if (filter == undefined) {
      // current YYYY-MM
      var date = new Date();
      var year = date.getFullYear();
      var month = date.getMonth() + 1;
      var month = month < 10 ? '0' + month : month;
      var filter = year + '-' + month;
    }

    var id = $(this).data('id');
    var cururl = "<?= base_url('Report/logtime_detail/') ?>" + id + "?filter=" + filter;
    window.location.href = cururl;
  });


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
  // when syncBtn is clicked
  $('#reminder_logtime').click(function() {
    Swal.fire({
      title: 'Reminder Logtime?',
      allowOutsideClick: false,
      text: "This action will send reminder to all employee that have not logtime or less than 35 hour",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, reminder it!'
    }).then((result) => {
      if (result.isConfirmed) {
        // change pointer to loading
        document.body.style.cursor = 'wait';

        Swal.fire({
          allowOutsideClick: false,
          title: 'Send email reminder!',
          html: 'Just take your coffee and wait for a while.',
          didOpen: () => {
            Swal.showLoading()
          }
        })

        window.location.href = "<?= base_url('Report/reminder_logtime'); ?>";
      }
    })
  })



  window.addEventListener("load", function() {
    Swal.hideLoading()
  });

  // when filter month hover then change mouse to pointer
  $('#filter_month').hover(function() {
    $(this).css('cursor', 'pointer');
  });

  // when filter_month is changed
  $('#filter_month').change(function() {
    var month = $(this).val();
    var url = "<?= base_url('Report/logtime?filter='); ?>" + month;
    window.location.href = url;
  });
</script>