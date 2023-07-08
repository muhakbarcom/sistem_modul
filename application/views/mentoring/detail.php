<div class="container">

  <?php if (!$this->ion_auth->in_group(13)) : ?>
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <h6>Materi Bimbingan</h6>
            <div class="form-group">
              <div class="row mt-3">
                <div class="col-12">
                  <textarea class="form-control" name="materi" id="materi_teks" placeholder="Masukan keterangan..."></textarea>
                </div>
              </div>
              <div class="row mt-3 ">
                <div class="input-group col-6">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="materi_file">
                    <label class="custom-file-label" for="materi_file">
                      <i class="fas fa-file"></i> Choose file...
                    </label>
                  </div>
                </div>
                <div class="col-6 text-right">
                  <button type="button" id="materi_submit" class="btn btn-primary">Submit Materi</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <section id="materi"></section>
</div>
<script type="text/javascript">
  var materi_teks = $('#materi_teks');
  var materi_file = $('#materi_file');
  var mentoring_id = <?= $mentoring_id; ?>;
  var user_id = <?= $this->ion_auth->user()->row()->id; ?>;

  $(document).ready(function() {
    load_materi();

    $('#materi_submit').on('click', function() {
      onsubmit();
    })
  });

  function onsubmit() {

    var deskripsi = materi_teks.val();
    var file = materi_file[0].files[0];

    var formdata = new FormData();
    formdata.append('mentoring_id', mentoring_id);
    formdata.append('deskripsi', deskripsi);
    formdata.append('file', file);

    $.ajax({
      type: "POST",
      url: "<?= base_url('mentoring/addMateri'); ?>",
      data: formdata,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(response) {
        if (response.status == true) {
          load_materi();
        } else {
          swal("Gagal", response.message, "error");
        }
      }
    });
  }

  function load_materi() {
    $section = $('#materi');
    $.ajax({
      type: "GET",
      url: "<?= base_url('mentoring/getMateri'); ?>",
      data: {
        mentoring_id: <?= $mentoring_id; ?>
      },
      dataType: "json",
      success: function(response) {

        if (response.status == true) {
          $section.html('');
          $.each(response.data, function(i, data) {
            var kolom_komentar = '';
            if (data.detail.length > 0) {
              $.each(data.detail, function(i, detail) {
                kolom_komentar += `
                <hr>
                <div class="row" id="detailKomentar_${detail.komentar_id}">
                  <div class="col-6">
                    <b>${detail.first_name} ${detail.last_name}</b>
                  </div>
                  <div class="col-6 text-right">
                    <small>${detail.tanggal}</small>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <p>
                    ${detail.komentar}
                    </p>
                  </div>
                </div>`;

                if (detail.user_id == user_id) {
                  kolom_komentar += ` <div class="row">
                    <div class="col-12">
                      <button class="btn btn-sm" onclick="onDeleteComment(${detail.komentar_id})" style="text-decoration:none;font-size:11px">Hapus</button>
                    </div>
                        
                    </div>`;
                }

                kolom_komentar += `
                
                `;
              });
            }

            var html = `
            <div class="row justify-content-center">
              <div class="col-8">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <b>${data.first_name} ${data.last_name}</b><br>
                        <small>${data.tanggal}</small>
                      </div>
                      <div class="col-6 text-right">
                       `;

            if (data.mentor_id == user_id) {
              html += ` <div class="dropdown d-inline">
                          <button class="btn bg-white btn-sm" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <button onclick="onDeleteMateri(${data.materi_id})" class="dropdown-item has-icon" href="#"><i class="fa fa-trash"></i> Hapus</button>
                          </div></div>`;
            }

            html += `
                      
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <hr>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <p>${data.deskripsi}</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <a class="btn btn-sm btn-info" target="_BLANK" href="<?= base_url('assets/uploads/data/materi/'); ?>${data.file}"><i class="fa fa-link"></i> ${data.file}</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <hr>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <textarea class="form-control" style="border-radius: 20px;" name="diskusi" id="diskusi_teks_${data.materi_id}" placeholder="Mari berdiskusi..." onkeydown="checkEnter(event,${data.materi_id})"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div id="kolom_komentar">${kolom_komentar}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            `;


            $section.prepend(html);

          });
        }
      }
    });
  }

  function checkEnter(event, id) {
    var diskusi = $(`#diskusi_teks_${id}`);
    if (event.keyCode === 13) {
      event.preventDefault(); // Mencegah karakter baris baru ditambahkan ke textarea
      var text = diskusi.val();

      if (text != '') {
        data = {
          materi_id: id,
          komentar: text
        }

        diskusi.val('');
        insertKomentar(data);
      }
    }
  }

  function insertKomentar(data) {
    $.ajax({
      type: "POST",
      url: "<?= base_url('mentoring/addKomentar'); ?>",
      data: data,
      dataType: "json",
      success: function(response) {
        if (response.status == true) {
          load_materi();
        } else {
          iziToast.warning({
            title: 'Gagal!',
            message: response.message,
            position: 'topRight'
          });
        }
      }
    });
  }

  function onDeleteComment(id) {
    swal({
        title: 'Apakah anda yakin ingin menghapus komentar ini?',
        text: 'data yang dihapus tidak dapat dikembalikan',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            type: "POST",
            url: "<?= base_url('mentoring/deleteKomentar'); ?>",
            data: {
              komentar_id: id
            },
            dataType: "json",
            success: function(response) {
              if (response.status == true) {
                load_materi();
              } else {
                iziToast.warning({
                  title: 'Gagal!',
                  message: response.message,
                  position: 'topRight'
                });
              }
            }
          });
        }
      });
  }

  function onDeleteMateri(id) {
    swal({
        title: 'Apakah anda yakin ingin menghapus materi ini?',
        text: 'data yang dihapus tidak dapat dikembalikan',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            type: "POST",
            url: "<?= base_url('mentoring/deleteMateri'); ?>",
            data: {
              materi_id: id
            },
            dataType: "json",
            success: function(response) {
              if (response.status == true) {
                load_materi();
              } else {
                iziToast.warning({
                  title: 'Gagal!',
                  message: response.message,
                  position: 'topRight'
                });
              }
            }
          });
        }
      });
  }
</script>