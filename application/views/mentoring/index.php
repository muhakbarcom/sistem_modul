<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $title; ?></h3>
        </div>
        <div class="card-body">

          <form id="myform" method="post" onsubmit="return false">

            <div class="row" style="margin-bottom: 10px">
              <div class="col-xs-12 col-md-4 text-center">
                <div style="margin-top: 4px" id="message">

                </div>
              </div>
              <div class="col-xs-12 col-md-4 text-right">

              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th>Program Name</th>

                    <th width="80px">Action</th>
                  </tr>
                </thead>
                <tbody></tbody>

              </table>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    show_data();

  });



  function show_data() {
    // ajax
    $.ajax({
      type: "ajax",
      url: "<?= base_url('mentoring/getData'); ?>",
      async: false,
      dataType: "json",
      success: function(data) {
        var data = data.data;
        var html = '';
        var i;
        var no = 1;
        for (i = 0; i < data.length; i++) {
          html += `<tr>
            <td>${no++}</td>
            <td>${data[i].program_name}</td>
            <td><a class="btn btn-primary btn-sm" href="<?= base_url('mentoring/detail/'); ?>${data[i].id_program}"><i class="fa fa-eye"></i> Lihat Mentoring</a></td>
            </tr>`;
        }
        $('#mytable > tbody').html(html);
      }
    });

    $('#mytable').DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  }
</script>