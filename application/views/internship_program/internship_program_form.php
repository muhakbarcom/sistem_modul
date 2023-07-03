<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $button; ?> Internship_program</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="varchar">Program Name <?php echo form_error('program_name') ?></label>
                        <input type="text" class="form-control" name="program_name" id="program_name" placeholder="Program Name" value="<?php echo $program_name; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="program_desc">Program Desc <?php echo form_error('program_desc') ?></label>
                        <textarea class="form-control" rows="3" name="program_desc" id="program_desc" placeholder="Program Desc"><?php echo $program_desc; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Program Start <?php echo form_error('program_start') ?></label>
                        <input type="date" class="form-control" name="program_start" id="program_start" placeholder="Program Start" value="<?php echo $program_start; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="date">Program End <?php echo form_error('program_end') ?></label>
                        <input type="date" class="form-control" name="program_end" id="program_end" placeholder="Program End" value="<?php echo $program_end; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="date">Assign Role <?php echo form_error('program_end') ?></label>
                        <select class="select2 form-control" name="role" id="role" multiple>
                        </select>
                    </div>
                    <input type="hidden" name="id_program" id="id_program" value="<?php echo $id_program; ?>" />
                    <button type="button" class="btn btn-primary" id="submit"><?php echo $button ?></button>
                    <a href="<?php echo site_url('internship_program') ?>" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var id_program = <?php echo $id_program; ?>;
    var roles = [];
    var mode = "<?php echo $mode; ?>";
    var urlPost = "<?php echo $action; ?>";

    $(document).ready(function() {
        if (id_program != 0) {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/internship_program/getRoleByIdProgram",
                method: "POST",
                async: false,
                dataType: 'json',
                data: {
                    id_program: id_program
                },
                success: function(data) {
                    // insert data.id into roles
                    for (var i = 0; i < data.length; i++) {
                        roles.push(data[i].id_i_role);
                    }
                }
            });
        }


        $.ajax({
            url: "<?php echo base_url(); ?>index.php/internship_program/get_role",
            method: "POST",
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    var selected = "";
                    if (roles.includes(data[i].id_internship_role)) {
                        selected = "selected";
                    }

                    html += '<option ' + selected + ' value="' + data[i].id_internship_role + '">' + data[i].role_name + '</option>';
                }
                $('#role').html(html);
            }
        });



        $('#submit').on('click', function() {
            $.ajax({
                url: urlPost,
                method: "POST",
                async: false,
                dataType: 'json',
                data: {
                    program_name: $('#program_name').val(),
                    program_desc: $('#program_desc').val(),
                    program_start: $('#program_start').val(),
                    program_end: $('#program_end').val(),
                    id_program: $('#id_program').val(),
                    role: $('#role').val(),
                },
                success: function(data) {
                    if (data.status == true) {
                        window.location.href = "<?php echo base_url(); ?>/internship_program";
                    } else {
                        alert(data.message);
                    }
                }
            });
        })
    });
</script>