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
                            <th>Project Code</th>
                            <th>Milestone Name</th>
                            <th>Value</th>
                            <th>Status</th>
                            <th>Contract Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($v_milestone as $value) {
                        ?>
                            <tr>
                                <td class="text-center" style="width: 10px;"><?php echo $no++ ?></td>
                                <td><?php echo $value->project_code ?></td>
                                <td><?php echo $value->milestone_name ?></td>
                                <td><?php echo rupiah($value->milestone_value) ?></td>
                                <td><?php echo $value->milestone_status ?></td>
                                <td><?php
                                    if (isset($value->contract_date)) {
                                        echo date_surat($value->contract_date);
                                    } else {
                                        echo "-";
                                    };
                                    ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Project Code</th>
                            <th>Milestone Name</th>
                            <th>Value</th>
                            <th>Status</th>
                            <th>Contract Date</th>
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