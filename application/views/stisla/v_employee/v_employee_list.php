<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo $subtitle ?></h4>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Picture</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($v_employee as $value) {
                        ?>
                            <tr>
                                <td class="text-center" style="width: 10px;"><?php echo $no++ ?></td>
                                <td><?php echo $value->email ?></td>
                                <td><?php echo $value->name ?></td>
                                <td><img src="<?php echo $value->picture ?>" alt="" width="50"></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Picture</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            lengthMenu: [
                [10, 25, 50, 100],
                ['10', '25', '50', '100']
            ]
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-sm-6:eq(0)');
    });
</script>