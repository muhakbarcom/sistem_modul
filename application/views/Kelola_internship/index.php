<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $title; ?></h3>
        </div>
        <div class="card-body">

          <form id="myform" method="post" onsubmit="return false">


            <div class="table-responsive">
              <div class="row mb-5">
                <div class="col-5">
                  <label for="">Filter Date</label>
                  <input type="date" class="form-control" id="date">
                </div>
              </div>
              <table class="table table-bordered table-striped" id="mytable">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program</th>
                    <th>Tanggal Laporan</th>
                    <th>Tanggal Absen</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Status Kehadiran</th>
                    <th>Aktivitas</th>
                    <th>Alasan Tidak Hadir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($data as $d) {
                  ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $d->first_name . ' ' . $d->last_name; ?></td>
                      <td><?= $d->program_name; ?></td>
                      <td><?= $d->tanggal; ?></td>
                      <td><?= $d->created_at; ?></td>
                      <td><?= $d->jam_mulai; ?></td>
                      <td><?= $d->jam_selesai; ?></td>
                      <td><?php

                          switch ($d->status_kehadiran) {
                            case 1:
                              echo "Hadir";
                              break;
                            case 0:
                              $teks = "Tidak Hadir";
                              switch ($d->alasan_kehadiran) {
                                case 1:
                                  $teks .= " Sakit";
                                  break;
                                case 2:
                                  $teks .= " Izin";
                                  break;
                                case 3:
                                  $teks .= " Tanpa Keterangan";
                                  break;
                                default:
                                  # code...
                                  break;
                              }
                              echo $teks;
                              break;
                          }

                          ?></td>
                      <td><?= $d->aktivitas; ?></td>
                      <td><?= $d->keterangan_kehadiran; ?></td>
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

    $('#date').on('change', function() {
      var date = $(this).val();
      $.ajax({
        url: baseUrl + 'kelola_internship/getData',
        type: 'POST',
        dataType: 'json',
        data: {
          date: date
        },
        success: function(data) {
          var html = '';
          var no = 1;
          // destroy datatable
          $('#mytable').DataTable().destroy();
          $.each(data, function(i, item) {
            html += `<tr>
                <td>${no++}</td>
                <td>${item.first_name} ${item.last_name}</td>
                <td>${item.program_name}</td>
                <td>${item.tanggal}</td>
                <td>${item.created_at}</td>
                <td>${item.jam_mulai}</td>
                <td>${item.jam_selesai}</td>
                <td>`;

            switch (item.status_kehadiran) {
              case 1:
                html += "Hadir";
                break;
              case 0:
                let teks = "Tidak Hadir";
                switch (item.alasan_kehadiran) {
                  case 1:
                    teks += " Sakit";
                    break;
                  case 2:
                    teks += " Izin";
                    break;
                  case 3:
                    teks += " Tanpa Keterangan";
                    break;
                  default:
                    // Default case if no match is found
                    break;
                }
                html += teks;
                break;
            }

            html += `</td>
              <td>${item.aktivitas || ''}</td>
              <td>${item.keterangan_kehadiran || ''}</td>
            </tr>`;
          });

          $('#mytable tbody').html(html);
          $('#mytable').DataTable();
        }
      });
    })
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