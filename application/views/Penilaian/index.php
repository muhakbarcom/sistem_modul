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
                    <th class="text-center">Nilai Akhir</th>
                    <?php if (!$this->ion_auth->in_group(13)) : ?>
                      <th class="text-center">Print</th>
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
                      <td><?= $d->created_at; ?></td>
                      <td class="text-center">
                        <?php if (!$this->ion_auth->in_group(13)) : ?>
                          <!-- jika bukan mahasiswa -->
                          <button onclick="nilai(<?= $d->id; ?>)" class="btn btn-warning btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Nilai</button>
                        <?php else : ?>
                          <button onclick="nilai(<?= $d->id; ?>)" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Lihat Nilai</button>
                        <?php endif; ?>
                      </td>
                      <?php if (!$this->ion_auth->in_group(13)) : ?>
                        <td class="text-center"> <button onclick="print(<?= $d->id; ?>)" class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"></i></button>
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
  var id_kriteria = []; // array
  var id_intership_program_mahasiswa = 0;
  $(document).ready(function() {
    // $('#modalBootstrapSave').on('click', function() {
    //   var modeInput = $('#modeInput').val();

    //   _action();
    // })

    $('#mytable').DataTable();

    $('#modalBootstrapSave').on('click', function() {
      var data = [];

      $.each(id_kriteria, function(index, value) {
        var nilai = $(`#nilai_${value}`).val();
        var id = $(`#nilai_${value}`).data('id');

        var temp = {
          id: id,
          id_intership_program_mahasiswa: id_intership_program_mahasiswa,
          id_kriteria: value,
          nilai: nilai
        };

        data.push(temp);
      })
      console.log(data)
      _action(data);
    })
  });

  function _action(data) {
    $.ajax({
      url: baseUrl + 'penilaian/aksi_',
      type: 'POST',
      dataType: 'json',
      data: {
        data: data

      },
      success: function(data) {
        if (data.status) {
          iziToast.success({
            title: 'Berhasil',
            message: data.message,
            position: 'topRight'
          });
          $('#modalBootstrap').modal('hide');
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

  function print(id) {
    var url = baseUrl + 'penilaian/print/' + id;
    window.open(url, '_blank');
  }

  function nilai(id) {
    // ajax get data
    $.ajax({
      url: baseUrl + 'penilaian/get_data_nilai',
      type: 'POST',
      dataType: 'json',
      data: {
        id: id
      },
      success: function(data) {
        if (data.status) {
          var html = '';
          var data_all = data.data;
          $('#modalBootstrapTitle').html('Nilai Akhir');

          // set data
          $.each(data_all, function(index, value) {
            if (value.id_nilai) {
              html += `<div class="form-group">
                        <label for="nilai_${value.id}">${value.kriteria}</label>
                        <input type="number" min="0" max="100" class="form-control nilaiInput" data-id="${value.id_nilai}" id="nilai_${value.id}" value="${value.nilai}">
                      </div>`;
              id_intership_program_mahasiswa = value.id_intership_program_mahasiswa;
            } else {
              html += `<div class="form-group">
                      <label for="nilai_${value.id}">${value.kriteria}</label>
                      <input type="number" min="0" max="100" class="form-control nilaiInput" data-id="" id="nilai_${value.id}" value="" >
                      </div>`;
            }
            id_kriteria.push(value.id);
          })

          <?php if ($this->ion_auth->in_group(13)) : ?>
            // jika mahasiswa
            $('.nilaiInput').attr('readonly', 'readonly ');
            $('#modalBootstrapSave').hide();
          <?php endif; ?>

          $('#modalBootstrapBody').html(html);
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: data.message
          });
        }
      }
    });

    // show modal
    $('#modalBootstrap').modal('show');
  }

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