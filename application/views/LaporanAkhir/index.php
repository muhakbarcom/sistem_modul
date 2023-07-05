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
              <table class="table table-bordered table-striped" id="mytable">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th>Program</th>
                    <th>Nama Mahasiswa</th>
                    <th>Tanggal Pengumpulan</th>
                    <th>File</th>
                    <th>Komentar Mentor</th>
                    <th>Status</th>
                    <?php if (!$this->ion_auth->in_group(1)) : ?>
                      <th>Action</th>
                    <?php endif; ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($data as $d) {
                  ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $d->program_name; ?></td>
                      <td><?= $d->first_name . ' ' . $d->last_name; ?></td>
                      <td><?= $d->tanggal_pengumpulan; ?></td>
                      <td><a target="_BLANK" class="btn btn-primary" href="<?= base_url('assets/uploads/data/laporan_akhir/' . $d->file); ?>"><i class="fa fa-eye" aria-hidden="true"></i>
                        </a></td>
                      <td><?= $d->komentar_mentor; ?></td>
                      <td><?= $d->status; ?></td>
                      <?php if (!$this->ion_auth->in_group(1)) : ?>
                        <td>
                          <?php if ($d->status != "REVIEW") : ?>
                            <button class="btn btn-success btn-sm disabled"><i class="fa fa-check" aria-hidden="true"></i>
                            </button>
                          <?php else : ?>

                            <button onclick="setuju(<?= $d->id; ?>)" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i>
                            </button>
                            <button onclick="tolak(<?= $d->id; ?>)" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>

              </table>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var baseUrl = "<?= base_url(); ?>";
  $(document).ready(function() {
    $('#modalBootstrapSave').on('click', function() {
      var modeInput = $('#modeInput').val();

      _action();
    })

    $('#mytable').DataTable();
  });

  function setuju(id) {
    var modalBootstrap = $('#modalBootstrap');
    var modalTitle = $('#modalBootstrapTitle');
    var modalBody = $('#modalBootstrapBody');
    $('#modalBootstrapSave').show();
    modalBootstrap.modal('show');

    modalTitle.html('Masukan Komentar');
    modalBody.html(`
        <div class="row">
            <div class="col-12">
                <textarea class="form-control" id="komentar_mentor"></textarea>
                <input type="hidden" id="modeInput" value="setuju">
                <input type="hidden" id="id_program_mahasiswa" value="${id}">
            </div>
        </div>
        `);
  }

  function tolak(id) {
    var modalBootstrap = $('#modalBootstrap');
    var modalTitle = $('#modalBootstrapTitle');
    var modalBody = $('#modalBootstrapBody');
    $('#modalBootstrapSave').show();
    modalBootstrap.modal('show');

    modalTitle.html('Masukan Komentar');
    modalBody.html(`
        <div class="row">
            <div class="col-12">
                <textarea class="form-control" id="komentar_mentor"></textarea>
                <input type="hidden" id="modeInput" value="tolak">
                <input type="hidden" id="id_program_mahasiswa" value="${id}">
            </div>
        </div>
        `);
  }

  function _action() {
    var komentar_mentor = $('#komentar_mentor').val();
    var id_program_mahasiswa = $('#id_program_mahasiswa').val();
    var modeInput = $('#modeInput').val();

    if (komentar_mentor == '') {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Komentar harus diisi!'
      });
      return false;
    }

    var data = {
      id_program_mahasiswa: id_program_mahasiswa,
      komentar_mentor: komentar_mentor,
      modeInput: modeInput
    };

    $.ajax({
      url: baseUrl + 'laporanAkhir/aksi',
      type: 'POST',
      dataType: 'json',
      data: data,
      success: function(data) {
        if (data.status) {
          // Swal.fire({
          //   icon: 'success',
          //   title: 'Berhasil',
          //   text: data.message
          // });

          $('#modalBootstrap').modal('hide');

          setTimeout(function() {
            location.reload();
          }, 1000);
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: data.message
          });
        }
      }
    })
  }
</script>