<div class="row justify-content-end">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
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
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
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
            <div class="col-md-4">
              <input type="text" class="form-control formdate2 " name="filter_month" id="filter_month" placeholder="Choose Month">
            </div>
            <div class="col-md-8">
              <div class="dropdown">
                <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Export</a>
                <div class="dropdown-menu">
                  <a href="<?= base_url('Report/export_excel/logtime/?filter=' . $date); ?>" class="dropdown-item has-icon"><i class="fa fa-file-excel"></i> Excel</a>
                  <a href="<?= base_url('Report/export_pdf/logtime/?filter=' . $date); ?>" class="dropdown-item has-icon"><i class="fa fa-file-pdf"></i> PDF</a>
                </div>
              </div>
              <a href="<?= base_url('Report/print/logtime/?filter=' . $date); ?>" target="_BLANK" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
              <a href="#" id="reminder_logtime" class="btn btn-warning"> <i class="fa fa-bell"></i> Reminder</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <!-- <?= $total_project; ?>
        <?= $amount; ?> -->
        <table id="example" class="table table-bordered">
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
                <td class="text-center">
                  <a class="badge bg-primary rounded-pill text-light" style="text-decoration: none;" href="#" id="detail-logtime" data-id="<?= $value->user_id; ?>"> <span class="fas fa-search-plus"></span> Detail</a>
                </td>
              </tr>
            <?php } ?>

          </tbody>
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

<script type="text/javascript">
  // when syncBtn is clicked
  $('#reminder_logtime').click(function() {
    Swal.fire({
      title: 'Reminder Logtime?',
      allowOutsideClick: false,
      text: "This action will send reminder to all employee that have not logtime or less than 35 hour in a month",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, reminder it!'
    }).then((result) => {
      if (result.isConfirmed) {
        reminder_logtime();
      }
    })
  })


  function reminder_logtime() {
    statustextx = 'Just take your coffee and wait for a while.';
    Swal.fire({
      allowOutsideClick: false,
      title: 'Reminder!',
      html: statustextx,
      didOpen: () => {
        Swal.showLoading()
      }
    })
    $.ajax({
      url: '<?= base_url('/Report/reminder_logtime'); ?>',
      type: 'POST',
      data: {
        date: '<?= $date; ?>'
      },
      dataType: 'json',
      success: function(data) {
        // console.log(data.employee);
        if (data.status == 'success') {
          // logtime_pdf_reminder(data.employee);
          //delay 3 second
          setTimeout(function() {
            myCallbackx("<br><div> <i class='fas fa-check-circle' style='color:green'></i> " + data.message + "</div>");
            // change pointer to default
            document.body.style.cursor = 'default';
            // Swal.close();
            // Swal.hideLoading();
          }, 3000);

        } else {
          myCallbackx("<div style='font-size:14px'> <i class='fas fa-times-circle'></i> " + data.message + "</div>");
        }
      },
    });
  }

  function myCallbackx(response) {
    statustextx = statustextx + response;
    Swal.fire({
      title: 'Reminder complete!',
      html: statustextx,
    })
  }

  function logtime_pdf_reminder(employee) {
    $.ajax({
      url: '<?= base_url('/Report/logtime_pdf_reminder'); ?>',
      type: 'POST',
      data: {
        data: employee
      },
      dataType: 'json',
      success: console.log('success'),
      error: console.log('error'),
    });
  }

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

  // get month from url
  var url = window.location.href;
  var month = url.split('?')[1];
  var month = month.split('=')[1];
  $('#filter_month').val(month);
</script>