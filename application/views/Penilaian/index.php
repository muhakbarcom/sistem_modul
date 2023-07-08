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
              <div class="col-12 alert alert-warning">
                <div style="margin-top: 4px" id="message">
                  Semua Peserta Internship yang telah mencapai tahap akhir akan muncul pada halaman ini.
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="mytable">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th>Program</th>
                    <th>Nama Mahasiswa</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Nilai Akhir</th>
                    <?php
                    if (!$this->ion_auth->in_group(13)) {
                    ?>
                      <th>Action</th>
                    <?php
                    }
                    ?>
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
                      <td><?= $d->created_at; ?></td>
                      <td><input type="number" min="0" max="100" class="form-control" id="nilai_<?= $d->id; ?>" value="<?= $d->nilai_akhir; ?>" style="width:150px" onkeyup="unDisabledButton(<?= $d->id; ?>)" onkeypress="unDisabledButton(<?= $d->id; ?>)" <?= ($this->ion_auth->in_group(13) ? "readonly" : ""); ?>></td>
                      <?php
                      if (!$this->ion_auth->in_group(13)) {
                      ?>
                        <td>
                          <button id="btnSave_<?= $d->id; ?>" onclick="simpanNilai(<?= $d->id; ?>)" class="btn btn-primary btn-sm" disabled><i class="fa fa-save" aria-hidden="true"> Simpan</i>
                          </button>
                        </td>
                      <?php
                      }
                      ?>
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

  function simpanNilai(id) {
    var nilai = $(`#nilai_${id}`).val();

    if (nilai == '') {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Nilai harus diisi!'
      });
      return false;
    }

    var data = {
      id: id,
      nilai: nilai
    };

    $.ajax({
      url: baseUrl + 'penilaian/aksi',
      type: 'POST',
      dataType: 'json',
      data: data,
      success: function(data) {
        if (data.status) {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: data.message
          });
          disabledButton(id);
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: data.message
          });
        }
      }
    });

  }

  function unDisabledButton(id) {
    $(`#btnSave_${id}`).prop('disabled', false);
  }

  function disabledButton(id) {
    $(`#btnSave_${id}`).prop('disabled', true);
  }
</script>