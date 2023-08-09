<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Materi Detail</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>File Materi</td>
                        <td><?php echo $file_materi; ?></td>
                    </tr>
                    <tr>
                        <td>Nomor Pertemuan</td>
                        <td><?php echo $nomor_pertemuan; ?></td>
                    </tr>
                    <tr>
                        <td>Id Matakuliah</td>
                        <td><?php echo $id_matakuliah; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Upload</td>
                        <td><?php echo $tanggal_upload; ?></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo site_url('materi') ?>" class="btn bg-purple">Cancel</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>