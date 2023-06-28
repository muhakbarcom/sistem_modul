<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo "Detail " . $title  ?></h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                                    <li class="media justify-content-center">
                                        <img alt="image" class="rounded-circle" width="100" src="<?= base_url('/assets/uploads/image/profile/' . $image); ?>">
                                    </li>
                                    <li class="media ">
                                        <div class="media-body text-center">
                                            <div class="media-title"><?php echo $first_name . " " . $last_name; ?></div>
                                            <div class="text-job text-muted"><?php echo $email; ?></div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-title">Name</div>
                                        </div>
                                        <div class="media-items">
                                            <div class="media-item">
                                                <div class="media-value"><?php echo $first_name . " " . $last_name; ?></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-title">Role</div>
                                        </div>
                                        <div class="media-items">
                                            <div class="media-item">
                                                <?php $user_groups = $this->ion_auth->get_users_groups($id)->result();
                                                ?>
                                                <div class="media-value"><?php echo $user_groups[0]->name; ?></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-title">Email</div>
                                        </div>
                                        <div class="media-items">
                                            <div class="media-item">
                                                <div class="media-value"><?php echo $email; ?></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-title">Phone Number</div>
                                        </div>
                                        <div class="media-items">
                                            <div class="media-item">
                                                <div class="media-value"><?php echo $phone; ?></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <a href="<?php echo site_url('users') ?>" class="btn btn-primary">Back</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>