<div class="row">
      <div class="col-12 col-md-12 col-lg-6">
            <div class="card">
                  <div class="card-header">
                        <h4><?php echo "Create" . $title  ?></h4>
                  </div>


                  <!-- /.box-header -->
                  <div class="card-body">
                        <p><?php echo lang('create_user_subheading'); ?></p>
                        <?php
                        if ($message != "") {
                        ?>
                              <div id="infoMessage" class="callout callout-danger"><?php echo $message; ?></div>
                        <?php } ?>
                        <?php echo form_open("auth/create_user"); ?>
                        <div class="row">
                              <div class="col-md-6"><?php echo lang('create_user_fname_label', 'first_name'); ?> <br />
                                    <?php echo form_input($first_name); ?></div>
                              <div class="col-md-6"><?php echo lang('create_user_lname_label', 'last_name'); ?> <br />
                                    <?php echo form_input($last_name); ?></div>
                        </div>

                        <p>

                        </p>

                        <?php
                        if ($identity_column !== 'email') {
                              echo '<p>';
                              echo lang('create_user_identity_label', 'identity');
                              echo '<br />';
                              echo form_error('identity');
                              echo form_input($identity);
                              echo '</p>';
                        }
                        ?>

                        <p>
                              <?php echo lang('create_user_email_label', 'email'); ?> <br />
                              <?php echo form_input($email); ?>
                        </p>

                        <p>
                              <?php echo lang('create_user_phone_label', 'phone'); ?> <br />
                              <?php echo form_input($phone); ?>
                        </p>

                        <div class="row">
                              <div class="col-md-6"><?php echo lang('create_user_password_label', 'password'); ?> <br />
                                    <?php echo form_input($password); ?></div>
                              <div class="col-md-6"><?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?> <br />
                                    <?php echo form_input($password_confirm); ?></div>
                        </div>


                        <p>
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
                                                ?>
                                                <input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo $checked; ?>>
                                                <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                          </label>
                                    </div>
                              <?php endforeach ?>
                        </div>
                  <?php endif ?>
                  </p>
                  <p><?php echo form_submit('submit', lang('create_user_submit_btn'), 'class="btn btn-primary"'); ?></p>

                  <?php echo form_close(); ?>

                  </div>
            </div>
      </div>
</div>