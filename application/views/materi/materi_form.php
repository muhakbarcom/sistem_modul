<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $button; ?> Materi</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="varchar">File Materi <?php echo form_error('file_materi') ?></label>
                        <input type="text" class="form-control" name="file_materi" id="file_materi" placeholder="File Materi" value="<?php echo $file_materi; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Nomor Pertemuan <?php echo form_error('nomor_pertemuan') ?></label>
                        <input type="text" class="form-control" name="nomor_pertemuan" id="nomor_pertemuan" placeholder="Nomor Pertemuan" value="<?php echo $nomor_pertemuan; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Id Matakuliah <?php echo form_error('id_matakuliah') ?></label>
                        <input type="text" class="form-control" name="id_matakuliah" id="id_matakuliah" placeholder="Id Matakuliah" value="<?php echo $id_matakuliah; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Upload <?php echo form_error('tanggal_upload') ?></label>
                        <input type="text" class="form-control" name="tanggal_upload" id="tanggal_upload" placeholder="Tanggal Upload" value="<?php echo $tanggal_upload; ?>" />
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('materi') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>