<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Krs Mahasiswa Detail</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn btn-card-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-card-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Id Mahasiswa</td>
                        <td><?php echo $id_mahasiswa; ?></td>
                    </tr>
                    <tr>
                        <td>Id Matakuliah</td>
                        <td><?php echo $id_matakuliah; ?></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo site_url('krs_mahasiswa') ?>" class="btn bg-purple">Cancel</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>