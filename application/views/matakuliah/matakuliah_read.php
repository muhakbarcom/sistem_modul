<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Matakuliah Detail</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Kode Matakuliah</td>
                        <td><?php echo $kode_matakuliah; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Matakuliah</td>
                        <td><?php echo $nama_matakuliah; ?></td>
                    </tr>
                    <tr>
                        <td>Id Dosen</td>
                        <td><?php echo $id_dosen; ?></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo site_url('matakuliah') ?>" class="btn bg-purple">Cancel</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>