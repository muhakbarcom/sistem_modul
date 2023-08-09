<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $button; ?> Matakuliah_assign</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="int">Matakuliah <?php echo form_error('id_matakuliah') ?></label>
                        <input type="text" class="form-control" name="id_matakuliah" id="id_matakuliah" placeholder="Id Matakuliah" value="<?php echo $id_matakuliah; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="int">Kelas <?php echo form_error('id_kelas') ?></label>
                        <input type="text" class="form-control" name="id_kelas" id="id_kelas" placeholder="Id Kelas" value="<?php echo $id_kelas; ?>" />
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('matakuliah_assign') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>