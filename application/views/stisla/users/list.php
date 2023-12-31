<style type="text/css">
  .table>thead>tr>td,
  .table>tbody>tr>td {
    padding-left: 8px;
  }
</style>
<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>List Users</h4>
      </div>
      <div class="card-body">

        <form id="myform" method="post" onsubmit="return false">

          <div class="row" style="margin-bottom: 10px">
            <div class="col-xs-12 col-md-4">
              <p><?php echo anchor('auth/create_user', '<i class="fa fa-plus"></i> ' . lang('index_create_user_link'), 'class="btn btn-primary"') ?> </p>
            </div>
            <div class="col-xs-12 col-md-4 text-center">
              <div style="margin-top: 4px" id="message">

              </div>
            </div>
            <div class="col-xs-12 col-md-4">

            </div>
          </div>
          <div class="table-responsive">
            <table cellpadding="0" cellspacing="10" id="mytable" class="table table-striped">
              <thead>
                <tr>
                  <th><?php echo lang('index_fname_th'); ?></th>
                  <th><?php echo lang('index_lname_th'); ?></th>
                  <th><?php echo lang('index_email_th'); ?></th>
                  <th nowrap="nowrap">Roles</th>
                  <th class="d-none"><?php echo lang('index_status_th'); ?></th>
                  <th><?php echo lang('index_action_th'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $user) : ?>
                  <tr>
                    <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td nowrap="nowrap">
                      <?php $myArray = array(); ?>
                      <?php foreach ($user->groups as $group) : ?>
                        <?php $myArray[] = anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?>
                      <?php endforeach ?>
                      <?= implode(', ', $myArray); ?>

                    </td>
                    <td class="d-none"><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, lang('index_active_link'), 'class="btn btn-success btn-xs"') : anchor("auth/activate/" . $user->id, lang('index_inactive_link'), 'class="btn btn-danger  btn-xs"'); ?></td>
                    <td><?php echo anchor("users/read/" . $user->id, '<i class="fa fa-search-plus"></i>', 'class="btn btn-primary btn-xs" data-toogle="tooltip" title="Detail User"');
                        echo " ";
                        echo anchor("auth/edit_user/" . $user->id, '<i class="fa fa-user-edit"></i>', 'class="btn btn-warning btn-xs" data-toogle="tooltip" title="Edit User"');
                        echo " ";
                        echo anchor('users/delete/' . $user->id, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="return confirmdelete(\'users/delete/' . $user->id . '\')" data-toggle="tooltip" title="Delete"'); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#mytable").DataTable(

  );

  function confirmdelete(linkdelete) {
    alertify.confirm("Apakah anda yakin akan  menghapus data tersebut?", function() {
      location.href = linkdelete;
    }, function() {
      alertify.error("Penghapusan data dibatalkan.");
    });
    $(".ajs-header").html("Konfirmasi");
    return false;
  }
</script>