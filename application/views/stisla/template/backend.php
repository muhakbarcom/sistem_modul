<!DOCTYPE html>
<?php
$setting_aplikasi = $this->db->get('setting')->row();
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= "{$title} - {$setting_aplikasi->nama}"; ?></title>
  <!-- logo website -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/fontawesome/css/all.min.css">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets//modules/izitoast/css/iziToast.min.css">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.2.0/css/rowGroup.bootstrap4.min.css"> -->

  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/alertify/css/alertify.css">

  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/bootstrap-daterangepicker/daterangepicker.css"> -->
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/select2/dist/css/select2.min.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css"> -->
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"> -->

  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"> -->

  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/ionicons/css/ionicons.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/css/components.css">
  <script src="<?php echo base_url(); ?>stisla_assets/modules/chart.min.js"></script>

  <!-- cdn js datatables bootstrap 4 -->
  <script src="<?php echo base_url(); ?>stisla_assets/modules/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

  <script src="<?= base_url(); ?>assets/plugins/alertify/alertify.js"></script>
  <script src="<?php echo base_url(); ?>stisla_assets/modules/select2/dist/js/select2.min.js""></script>
  <!-- datatables -->
  <!-- <script src=" <?php echo base_url(); ?>stisla_assets/modules/datatables/datatables.min.js"></script> -->
  <!-- <script src="<?php echo base_url(); ?>stisla_assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script> -->

  <!-- CSS Datepicker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap-datetimepicker.min.css">

  <!-- Datepicker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/bootstrap-datetimepicker.id.js"></script>

  <script src="<?php echo base_url(); ?>stisla_assets/modules/jquery-ui/jquery-ui.min.js"></script>
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg bg-success" style="height: 80px;"></div>
      <nav class="navbar navbar-expand-lg main-navbar" style="top: 0;">
        <a href="<?= base_url(); ?>" class="navbar-brand sidebar-gone-hide">
          <img src="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>" alt="" class="img-thumbnail" style="height:50px">
        </a>
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav">
            <li class="nav-item active"><a href="<?= base_url(); ?>" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="<?= base_url('internship_role'); ?>" class="nav-link">Internship Role</a></li>
            <li class="nav-item"><a href="<?= base_url('program'); ?>" class="nav-link">Internship Program</a></li>
          </ul>
        </div>
        <form class="form-inline ml-auto">
          <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <?php if ($this->ion_auth->logged_in()) : ?>
            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
              <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                  <div class="float-right">
                    <a href="#">Mark All As Read</a>
                  </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                  <a href="#" class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-icon bg-primary text-white">
                      <i class="fas fa-code"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      Template update is available now!
                      <div class="time text-primary">2 Min Ago</div>
                    </div>
                  </a>
                  <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                      <i class="far fa-user"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                      <div class="time">10 Hours Ago</div>
                    </div>
                  </a>
                  <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-success text-white">
                      <i class="fas fa-check"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                      <div class="time">12 Hours Ago</div>
                    </div>
                  </a>
                  <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-danger text-white">
                      <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      Low disk space. Let's clean it!
                      <div class="time">17 Hours Ago</div>
                    </div>
                  </a>
                  <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                      <i class="fas fa-bell"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      Welcome to Stisla template!
                      <div class="time">Yesterday</div>
                    </div>
                  </a>
                </div>
                <div class="dropdown-footer text-center">
                  <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
              </div>
            </li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?php echo base_url('assets/uploads/image/profile/' . $this->ion_auth->user()->row()->image); ?>" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->ion_auth->user()->row()->first_name . " " . $this->ion_auth->user()->row()->last_name; ?> </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title"><?= $this->ion_auth->user()->row()->first_name . " " . $this->ion_auth->user()->row()->last_name; ?> (<?= $user_groups = $this->ion_auth->get_users_groups($this->session->userdata('user_id'))->result()[0]->name; ?>)</div>
                <a href="<?php echo base_url('profile'); ?>" class="dropdown-item has-icon">
                  <i class="far fa-user"></i> Profile
                </a>
                <?php if ($this->ion_auth->in_group('13')) : ?>
                  <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon">
                    <i class="fas fa-pencil-alt"></i> Nilai
                  </a>

                <?php endif; ?>
                <?php if ($this->ion_auth->in_group('14')) : ?>


                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </div>
            </li>
          <?php else : ?>
            <li class="nav-item active"><a href="<?php echo base_url('auth/login'); ?>" class="nav-link">Login / Register</a></li>
          <?php endif; ?>
        </ul>
      </nav>

      <?php if ($this->ion_auth->logged_in()) : ?>
        <nav class="navbar navbar-secondary navbar-expand-lg">
          <div class="container">
            <ul class="navbar-nav">
              <?php $menus = $this->layout->get_menu() ?>
              <?php foreach ($menus as $menu) : ?>
                <?php if ($menu['id_menu'] != 121) : ?>
                  <?php if (is_array($menu['children'])) : ?>
                    <li class="nav-item <?php echo ($title == $menu['label']) ? "active" : "" ?> dropdown">
                      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="<?php echo $menu['icon'] ?>"></i>
                        <span><?php echo $menu['label'] ?></span>
                      </a>
                      <ul class="dropdown-menu">
                        <?php foreach ($menu['children'] as $menu2) : ?>
                          <?php if (is_array($menu2['children'])) : ?>
                            <li class="nav-item dropdown">
                              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="<?php echo $menu2['icon'] ?>"></i>
                                <span><?php echo $menu2['label'] ?></span>
                              </a>
                              <ul class="dropdown-menu">
                                <?php foreach ($menu2['children'] as $menu3) : ?>
                                  <?php if (is_array($menu3['children'])) : ?>
                                    <li class="nav-item <?php echo ($title == $menu3['label']) ? "active" : "" ?> dropdown">
                                      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                        <i class="<?php echo $menu3['icon'] ?>"></i>
                                        <span><?php echo $menu3['label'] ?></span>
                                      </a>
                                      <ul class="dropdown-menu">
                                        <?php foreach ($menu3['children'] as $menu4) : ?>
                                          <li class="nav-item <?php echo ($title == $menu4['label']) ? "active" : "" ?>">
                                            <a href="<?php echo $menu4['link'] != '#' ? base_url($menu4['link']) : '#' ?>" class="nav-link">
                                              <i class="<?php echo $menu4['icon'] ?>"></i>
                                              <span><?php echo $menu4['label'] ?></span>
                                            </a>
                                          </li>
                                        <?php endforeach ?>
                                      </ul>
                                    </li>
                                  <?php else : ?>
                                    <li class="nav-item <?php echo ($title == $menu3['label']) ? "active" : "" ?>">
                                      <a href="<?php echo $menu3['link'] != '#' ? base_url($menu3['link']) : '#' ?>" class="nav-link">
                                        <i class="<?php echo $menu3['icon'] ?>"></i>
                                        <span><?php echo $menu3['label'] ?></span>
                                      </a>
                                    </li>
                                  <?php endif ?>
                                <?php endforeach ?>
                              </ul>
                            </li>
                          <?php else : ?>
                            <li class="nav-item <?php echo ($title == $menu2['label']) ? "active" : "" ?>">
                              <a href="<?php echo $menu2['link'] != '#' ? base_url($menu2['link']) : '#' ?>" class="nav-link">
                                <i class="<?php echo $menu2['icon'] ?>"></i>
                                <span><?php echo $menu2['label'] ?></span>
                              </a>
                            </li>
                          <?php endif ?>
                        <?php endforeach ?>
                      </ul>
                    </li>
                  <?php else : ?>
                    <li class="nav-item <?php echo ($title == $menu['label']) ? "active" : "" ?>">
                      <a href="<?php echo $menu['link'] != '#' ? base_url($menu['link']) : '#' ?>" class="nav-link ">
                        <i class="<?php echo $menu['icon'] ?>"></i>
                        <span><?php echo $menu['label'] ?></span>
                      </a>
                    </li>
                  <?php endif ?>
                <?php endif ?>
              <?php endforeach ?>
            </ul>
          </div>
        </nav>
      <?php endif; ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <!-- <?php if ($this->ion_auth->logged_in() && $title != "Home") : ?>
            <div class="section-header">
              <h1><?= $title; ?></h1>
            </div>
          <?php endif; ?> -->
          <?php $this->load->view($page); ?>
        </section>
      </div>

    </div>
    <footer class="main-footer bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="row">
              <div class="col-12">
                <b>Telkom Direktorat Digital Business Bandung</b>
              </div>
              <div class="col-12">
                Jl. Gegerkalong Hilir No.47
                Kota Bandung, Jawa Barat 40152
                (022) 4571050
              </div>
              <div class="col-12 mt-3">
                <b>Telkom Direktorat Digital Business Jakarta</b>
              </div>
              <div class="col-12">
                Menara Multimedia lt 15
                Jl. Kebon Sirih No.12 Jakarta Pusat 10110
                (022) 3860500
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-12">
                <b>Follow Our Social Media</b>
              </div>
              <div class="col-12">
                <a target="_BLANK" href="https://instagram.com/internship_ddbtelkom?igshid=1fabxbyc1nbhj">internship_ddbtelkom</a>
              </div>
              <div class="col-12">
                <a target="_BLANK" href="https://m.youtube.com/channel/UCWkKD0cXXqG7spiJztMgDZg">Internship DDB Telkom</a>
              </div>
              <div class="col-12">
                <a target="_BLANK" href="https://wa.me/6281120000981?text=Halo+KakMin,+Saya+mau+bertanya+tentang+Digistar+Internship+DDB+Telkom">+6281120000981</a>
              </div>
              <div class="col-12">
                <a target="_BLANK" href="@mailto:internship.ddbtelkom@telkom.co.id">internship.ddbtelkom@telkom.co.id</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-12">
                <b>Supported by</b>
              </div>
              <div class="col-12">
                <img src="<?= base_url('assets/img/footer/bumn.png'); ?>" alt="">
              </div>
              <div class="col-12">
                <img src="<?= base_url('assets/img/footer/telkom.png'); ?>" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12">
            <div class="text-center ">
              <strong>Copyright &copy; <?= date('Y'); ?> <a href="https://muhakbar.com"></a><?= "{$setting_aplikasi->nama}"; ?></strong> All rights reserved.
            </div>
          </div>
        </div>
      </div>
    </footer>


  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url('/assets/dist/js/'); ?>sweetalert2.all.min.js"></script>
  <script src="<?= base_url('/stisla_assets/modules/sweetalert/'); ?>sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>stisla_assets/modules/popper.js"></script>
  <script src="<?php echo base_url(); ?>stisla_assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url(); ?>stisla_assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>stisla_assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url(); ?>stisla_assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>stisla_assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- <script src="<?php echo base_url(); ?>stisla_assets/simple-weater/jquery.simpleWeater.min.js"></script> -->
  <script src="<?php echo base_url(); ?>stisla_assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="<?php echo base_url(); ?>stisla_assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?php echo base_url(); ?>stisla_assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url(); ?>stisla_assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <script src="<?php echo base_url(); ?>stisla_assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url(); ?>stisla_assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

  <script src="<?php echo base_url(); ?>stisla_assets/modules/izitoast/js/iziToast.min.js"></script>
  <script src="<?php echo base_url(); ?>stisla_assets/js/page/modules-toastr.js"></script>


  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>stisla_assets/js/scripts.js"></script>
  <script src="<?php echo base_url(); ?>stisla_assets/js/custom.js"></script>

  <!-- Modal -->
  <div class="modal fade" id="modalBootstrap" tabindex="-1" role="dialog" aria-labelledby="modalBootstrapLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalBootstrapTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalBootstrapBody">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="modalBootstrapSave">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<script>
  // sweetallert
  <?php
  if (isset($this->session->success)) { ?>
    alertify.set('notifier', 'position', 'center');
    Swal.fire(
      'Good Job!',
      '<?= $this->session->success; ?>',
      'success'
    )

  <?php } elseif (isset($this->session->error)) { ?>
    alertify.set('notifier', 'position', 'center');
    Swal.fire(
      'Oopss!',
      '<?= $this->session->error; ?>',
      'error'
    )
  <?php } ?>

  //var notification = alertify.notify('sample', 'success', 5, function(){  console.log('dismissed'); });
</script>

<script type="text/javascript">
  // when syncBtn is clicked


  window.addEventListener("load", function() {
    // Swal.hideLoading()
  });

  $('.formdate2').datepicker({
    format: "yyyy-mm",
    autoclose: true,
    startView: "months",
    minViewMode: "months"
  });
</script>