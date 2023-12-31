<!-- Default box -->

<div class="row">
  <div class="col-md-3 col-xs-12">
    <!-- Profile Image -->
    <div class="card">
      <div class="card-body">
        <div class="row justify-content-center">
          <img class="profile-user-img img-responsive rounded-circle" src="<?= base_url('assets/uploads/image/profile/') . $user['image']; ?>" alt="User profile picture" width="100px">

        </div>
        <h3 class="profile-username text-center"><?= $user['first_name'] . ' ' . $user['last_name']; ?></h3>
        <p class="text-muted text-center">Role : <?= $usergroups['name']; ?></p>
        <table class="table table-striped table-md">
          <tr>
            <td>
              <b>Email</b>
            </td>
            <td>
              <?= $email; ?>
            </td>
          </tr>

        </table>
        <a href="<?= base_url(); ?>auth/change_password" class="btn btn-primary btn-block"><b>Change Password</b></a>

        <a href="<?= base_url(); ?>auth/logout" class="btn btn-danger btn-block"><b>Sign Out</b></a>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!--  box edit-->
  <div class="col-md-5 col-xs-12">
    <div class="card">
      <div class="card-header with-border">
        <h3>Edit Profil</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <?php echo form_open_multipart('profile'); ?>
      <div class="card-body">
        <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" class="form-control" id="first_name" value="<?= $user['first_name']; ?>" name="first_name">
          <?= form_error('first_name', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="last_name">Last Name</label>
          <input type="text" class="form-control" id="last_name" value="<?= $user['last_name']; ?>" name="last_name">
          <?= form_error('last_name', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="text" class="form-control" id="email" value="<?= $user['email']; ?>" name="email">
          <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image">
            <label class="custom-file-label" for="image">Choose file</label>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
  <!--  / box edit-->


</div>