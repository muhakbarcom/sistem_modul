<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $button; ?> Krs_mahasiswa</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn btn-card-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-card-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="int">Id Mahasiswa <?php echo form_error('id_mahasiswa') ?></label>
                        <input type="text" class="form-control" name="id_mahasiswa" id="id_mahasiswa" placeholder="Id Mahasiswa" value="<?php echo $id_mahasiswa; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Id Matakuliah <?php echo form_error('id_matakuliah') ?></label>
                        <input type="text" class="form-control" name="id_matakuliah" id="id_matakuliah" placeholder="Id Matakuliah" value="<?php echo $id_matakuliah; ?>" />
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('krs_mahasiswa') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>