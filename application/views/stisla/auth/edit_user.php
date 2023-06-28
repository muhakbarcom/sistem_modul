<div class="row">
  <div class="col-12 col-md-12 col-lg-6">
    <div class="card">
      <div class="card-header">
        <h4><?php echo "Edit" . $title  ?></h4>
      </div>


      <div class="card-body">
        <p><?php echo lang('edit_user_subheading'); ?></p>
        <?php
        if ($message != "") {
        ?>
          <div id="infoMessage" class="callout callout-danger"><?php echo $message; ?></div> <?php } ?>
        <?php echo form_open(uri_string()); ?>

        <div class="form-group">
          <div class="row">
            <div class="col-md-6"><?php echo lang('edit_user_fname_label', 'first_name'); ?> <br />
              <?php echo form_input($first_name); ?></div>
            <div class="col-md-6"><?php echo lang('edit_user_lname_label', 'last_name'); ?> <br />
              <?php echo form_input($last_name); ?></div>
          </div>
        </div>

        <div class="form-group">
          <?php echo lang('edit_user_phone_label', 'phone'); ?> <br />
          <?php echo form_input($phone); ?>
        </div>

        <div class="form-group">
          <?php echo lang('edit_user_email_label', 'email'); ?> <br />
          <?php echo form_input($email); ?>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-md-6"><?php echo lang('edit_user_password_label', 'password'); ?> <br />
              <?php echo form_input($password); ?></div>
            <div class="col-md-6"><?php echo lang('edit_user_password_confirm_label', 'password_confirm'); ?><br />
              <?php echo form_input($password_confirm); ?></div>
          </div>
        </div>

        <?php if ($this->ion_auth->is_admin()) : ?>
          <div class="form-group">
            <h3><?php echo lang('edit_user_groups_heading'); ?></h3>
            <?php foreach ($groups as $group) : ?>
              <div class="checkbox">
                <label class="col-md-3">
                  <?php
                  $gID = $group['id'];
                  $checked = null;
                  $item = null;
                  foreach ($currentGroups as $grp) {
                    if ($gID == $grp->id) {
                      $checked = ' checked="checked"';
                      break;
                    }
                  }
                  ?>
                  <input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo $checked; ?>>
                  <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                </label>
              </div>
            <?php endforeach ?>
          </div>
        <?php endif ?>

        <?php echo form_hidden('id', $user->id); ?>
        <?php echo form_hidden($csrf); ?>
        <div class="form-group">
          <div class="row">
            <?php echo form_submit('submit', lang('edit_user_submit_btn'), 'class="btn btn-primary ml-3"'); ?>
            <a href="<?php echo site_url('users') ?>" class="btn btn-secondary ml-2">Cancel</a>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>