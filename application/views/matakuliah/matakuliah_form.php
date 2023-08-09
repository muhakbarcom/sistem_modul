<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $button; ?> Matakuliah</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="varchar">Kode Matakuliah <?php echo form_error('kode_matakuliah') ?></label>
                        <input type="text" class="form-control" name="kode_matakuliah" id="kode_matakuliah" placeholder="Kode Matakuliah" value="<?php echo $kode_matakuliah; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nama Matakuliah <?php echo form_error('nama_matakuliah') ?></label>
                        <input type="text" class="form-control" name="nama_matakuliah" id="nama_matakuliah" placeholder="Nama Matakuliah" value="<?php echo $nama_matakuliah; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Dosen Pengampu<?php echo form_error('id_dosen') ?></label>
                        <Select class="form-control" id="id_dosen" name="id_dosen"></Select>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('matakuliah') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var id_dosen = "<?php echo $id_dosen; ?>";
    $(document).ready(function() {
        // ajax to matakuliah/get_data_dosen
        $.ajax({
            url: "<?php echo base_url('matakuliah/get_data_dosen') ?>",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    if (id_dosen != '' && id_dosen == data[i].id) {
                        html += '<option value=' + data[i].id + ' selected>' + data[i].first_name + ' ' + data[i].last_name + '</option>';
                    } else {
                        html += '<option value=' + data[i].id + '>' + data[i].first_name + ' ' + data[i].last_name + '</option>';
                    }
                }
                $('#id_dosen').html(html);
            }
        });
    });
</script>