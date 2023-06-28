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
                            <th>Name Employee</th>
                            <th>Project Name</th>
                            <th>Hourly Rate</th>
                            <th>Membership Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($v_project_member as $value) {
                        ?>
                            <tr>
                                <td class="text-center" style="width: 10px;"><?php echo $no++ ?></td>
                                <td><?php echo $value->employee_name ?></td>
                                <td><?php echo $value->project_name ?></td>
                                <td><?php echo rupiah($value->hourly_rate) ?></td>
                                <td><?php echo $value->membership_status ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
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