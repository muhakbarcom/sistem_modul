<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="box-title">Internship Role Detail</h3>

            </div>
            <!-- /.box-header -->
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Role Name</td>
                        <td><?php echo $role_name; ?></td>
                    </tr>
                    <tr>
                        <td>Role Description</td>
                        <td><?php echo $role_description; ?></td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><img src="<?= site_url('assets/uploads/image/internship_role/') . $image; ?>" alt=""></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo site_url('internship_role') ?>" class="btn bg-purple">Cancel</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>