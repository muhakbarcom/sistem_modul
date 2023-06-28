<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List V_client</h3>
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
                            <th>Nick</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Values</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($v_client as $value) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $value->nick ?></td>
                                <td><?php echo $value->name ?></td>
                                <td><?php echo $value->email ?></td>
                                <td><?php echo rupiah($value->value) ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nick</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Values</th>
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