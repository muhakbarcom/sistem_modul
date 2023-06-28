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
                            <th>Name</th>
                            <th>Duration</th>
                            <th>Client</th>
                            <th>Note</th>
                            <th>Status</th>
                            <th>Project Value</th>
                            <th>Project Start</th>
                            <th>Project Finish</th>
                            <th>Tribe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($v_project as $value) {
                        ?>
                            <tr>
                                <td class="text-center" style="width: 10px;"><?php echo $no++ ?></td>
                                <td><?php echo $value->project_code ?></td>
                                <td><?php echo $value->name ?></td>
                                <td><?php echo $value->duration ?></td>
                                <td><?php echo $value->client_name ?></td>
                                <td><?php echo $value->note ?></td>
                                <td><?php echo $value->status ?></td>
                                <td><?php echo rupiah($value->project_value) ?></td>
                                <td><?php echo date_surat($value->project_start) ?></td>
                                <td><?php echo date_surat($value->project_finish) ?></td>
                                <td><?php echo $value->tribe ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Project Code</th>
                            <th>Name</th>
                            <th>Duration</th>
                            <th>Client</th>
                            <th>Note</th>
                            <th>Status</th>
                            <th>Project Value</th>
                            <th>Project Start</th>
                            <th>Project Finish</th>
                            <th>Tribe</th>
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