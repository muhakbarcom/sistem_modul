<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $button; ?> Internship_role</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="varchar">Role Name <?php echo form_error('role_name') ?></label>
                            <input type="text" class="form-control" name="role_name" id="role_name" placeholder="Role Name" value="<?php echo $role_name; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="role_description">Role Description <?php echo form_error('role_description') ?></label>
                            <textarea class="form-control" rows="3" name="role_description" id="role_description" placeholder="Role Description"><?php echo $role_description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image <?php echo form_error('image') ?></label>
                            <input type="file" class="form-control" name="image" id="image" placeholder="Image">
                        </div>
                        <input type="hidden" name="id_internship_role" value="<?php echo $id_internship_role; ?>" />
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                        <a href="<?php echo site_url('internship_role') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>