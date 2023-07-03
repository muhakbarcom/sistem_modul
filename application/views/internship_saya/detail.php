<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Internship Program Detail</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Program Name</td>
                        <td><?php echo $program_name; ?></td>
                    </tr>
                    <tr>
                        <td>Program Desc</td>
                        <td><?php echo $program_desc; ?></td>
                    </tr>
                    <tr>
                        <td>Program Start</td>
                        <td><?php echo $program_start; ?></td>
                    </tr>
                    <tr>
                        <td>Program End</td>
                        <td><?php echo $program_end; ?></td>
                    </tr>
                    <tr>
                        <td>Assign Role</td>
                        <td id="role"></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo site_url('internship_program') ?>" class="btn btn-primary">Cancel</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {


        $.ajax({
            url: "<?php echo base_url(); ?>index.php/internship_program/getRoleByIdProgram",
            method: "POST",
            async: false,
            dataType: 'json',
            data: {
                id_program: <?php echo $id_program; ?>
            },
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].id_internship_role + '">' + data[i].role_name + '</option>';
                }
                $('#role').html(html);
            }
        });
    })
</script>