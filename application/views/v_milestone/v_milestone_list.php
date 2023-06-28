<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List Milestone</h3>
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
    $(function() {
        $('#example1').DataTable()

    });
</script>