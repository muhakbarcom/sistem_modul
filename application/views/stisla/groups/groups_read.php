<div class="row">
    <div class="col-12 col-md-12 col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4><?php echo "Detail Role"  ?></h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td><?php echo $name; ?></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><?php echo $description; ?></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo site_url('groups') ?>" class="btn btn-primary">Back</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>