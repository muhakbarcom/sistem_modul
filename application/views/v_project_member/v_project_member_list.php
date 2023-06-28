<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List Project Member</h3>
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
                    <!-- <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Project Name</th>
                            <th>Name</th>
                            <th>Hourly Rate</th>
                            <th>Membership Status</th>
                        </tr>
                    </tfoot> -->
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