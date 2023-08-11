<?php if ($this->ion_auth->in_group(14)) : ?>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col text-center">
                            <h3>Tambah Materi</h3>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-4 mt-2">
                        <div class="col-8">
                            <input type="hidden" name="id_matakuliah" id="id_matakuliah" value="<?= $id_matakuliah; ?>">
                            <div class="input-group">
                                <input class="form-control mr-2" type="number" name="nomor_pertemuan" id="nomor_pertemuan" placeholder="Nomor pertemuan.." style="max-width: 160px;">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file_materi">
                                    <label class="custom-file-label" for="file_materi">
                                        <i class="fas fa-file"></i> Choose file...
                                    </label>
                                </div>
                                <button class="btn btn-primary ml-2" id="materi_submit"><i class="fa fa-upload"></i> Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>

<?php foreach ($data as $materi) :; ?>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    Pertemuan <?= $materi['nomor_pertemuan']; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <?php foreach ($materi['file_materi'] as $mtr) : ?>
                                <a href="<?= base_url('assets/uploads/data/materi/' . $mtr['file_materi']); ?>" class="btn" target="_blank"><i class="fa fa-download"></i> <?= $mtr['file_materi']; ?></a> <a class="text-danger" href="<?= base_url('materi/delete/' . $mtr['id'] . '/' . $id_matakuliah); ?>"><i class="fa fa-trash"></i></a>
                                <br>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    var materi_file = $('#file_materi');
    var id_matakuliah = $('#id_matakuliah').val();
    $(document).ready(function() {
        // load_materi();

        $('#materi_submit').on('click', function() {
            onsubmit();
        })

        // Mendengarkan peristiwa pemilihan file
        $('#file_materi').on('change', function() {
            // Mendapatkan nama file yang dipilih
            var fileName = $(this).val().split('\\').pop();

            // Mengubah teks pada label dengan nama file yang dipilih
            $(this).next('.custom-file-label').html(fileName);
        });
    });

    function onsubmit() {

        var nomor_pertemuan = $('#nomor_pertemuan').val();
        var file = materi_file[0].files[0];
        var id = id_matakuliah;
        var formdata = new FormData();
        formdata.append('nomor_pertemuan', nomor_pertemuan);
        formdata.append('file_materi', file);
        formdata.append('id_matakuliah', id);

        $.ajax({
            type: "POST",
            url: "<?= base_url('materi/addMateri'); ?>",
            data: formdata,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                if (response.status == true) {
                    $('#nomor_pertemuan').val('');
                    $('#file_materi').val('');
                    $('#file_materi').next('.custom-file-label').html('<i class="fas fa-file"></i> Choose file...');
                    // reload this page
                    location.reload();

                } else {
                    swal("Gagal", response.message, "error");
                }
            }
        });
    }
</script>