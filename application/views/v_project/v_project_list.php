<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List Project</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>

            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
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
    $(function() {
        $('#example1').DataTable()

    });
</script>