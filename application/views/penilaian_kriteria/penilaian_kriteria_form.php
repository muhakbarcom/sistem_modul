<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $button; ?> Penilaian_kriteria</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="varchar">Kriteria <?php echo form_error('kriteria') ?></label>
                        <input type="text" class="form-control" name="kriteria" id="kriteria" placeholder="Kriteria" value="<?php echo $kriteria; ?>" />
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('penilaian_kriteria') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>