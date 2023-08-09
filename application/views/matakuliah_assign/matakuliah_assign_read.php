<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Matakuliah Assign Detail</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Id Matakuliah</td>
                        <td><?php echo $id_matakuliah; ?></td>
                    </tr>
                    <tr>
                        <td>Id Dosen</td>
                        <td><?php echo $id_dosen; ?></td>
                    </tr>
                    <tr>
                        <td>Id Kelas</td>
                        <td><?php echo $id_kelas; ?></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo site_url('matakuliah_assign') ?>" class="btn bg-purple">Cancel</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>