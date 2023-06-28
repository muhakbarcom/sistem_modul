<!-- Default box -->
<div class="row">

      <!--  box edit-->
      <div class="col-md-6 col-xs-12">
            <div class="card box-primary">
                  <!-- flashdata -->
                  <div class="card-header with-border">
                        Edit Profil
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <div class="card-body">

                        <div id="infoMessage"><?php echo $message; ?></div>

                        <?php echo form_open("auth/change_password"); ?>

                        <p>
                              <?php echo lang('change_password_old_password_label', 'old_password'); ?> <br />
                              <?php echo form_input($old_password); ?>
                        </p>

                        <p>
                              <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length); ?></label> <br />
                              <?php echo form_input($new_password); ?>
                        </p>

                        <p>
                              <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm'); ?> <br />
                              <?php echo form_input($new_password_confirm); ?>
                        </p>

                        <?php echo form_input($user_id); ?>
                        <p>
                              <button type="submit" class="btn btn-primary">Change Password</button>
                              <a href="<?= base_url('profile'); ?>" class="btn btn-secondary">Back</a>
                        </p>

                        <?php echo form_close(); ?>
                  </div>
                  <!-- /.box-body -->
            </div>
            <!-- /.box -->
      </div>
      <!-- /.box -->
</div>