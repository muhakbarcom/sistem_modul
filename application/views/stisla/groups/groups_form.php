<div class="row">
    <div class="col-12 col-md-12 col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4><?php echo $button . " Role"  ?></h4>
            </div>
            <div class="card-body">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="varchar">Name <?php echo form_error('name') ?></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Description <?php echo form_error('description') ?></label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('groups') ?>" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>