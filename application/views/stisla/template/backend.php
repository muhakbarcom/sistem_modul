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

  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.2.0/css/rowGroup.bootstrap4.min.css"> -->

  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/alertify/css/alertify.css">

  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/bootstrap-daterangepicker/daterangepicker.css"> -->
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"> -->
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>stisla_assets/modules/select2/dist/css/select2.min.css"> -->
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
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script> -->

  <script src="<?= base_url(); ?>assets/plugins/alertify/alertify.js"></script>

  <!-- datatables -->
  <!-- <script src="<?php echo base_url(); ?>stisla_assets/modules/datatables/datatables.min.js"></script> -->
  <!-- <script src="<?php echo base_url(); ?>stisla_assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script> -->

  <!-- CSS Datepicker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap-datetimepicker.min.css">

  <!-- Datepicker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/bootstrap-datetimepicker.id.js"></script>

  <!-- <script src="<?php echo base_url(); ?>stisla_assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script> -->
  <script src="<?php echo base_url(); ?>stisla_assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <!-- <script src="<?php echo base_url(); ?>stisla_assets/js/page/modules-datatables.js"></script> -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" id="syncBtn" data-toggle="dropdown" class="btn btn-primary nav-link nav-link-lg message-toggle beep shadow-none"><i class="fas fa-sync"></i>
              <div class="d-sm-none d-lg-inline-block">Sync</div>
            </a>
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
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">GPP System</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">GPP</a>
          </div>
          <ul class="sidebar-menu">
            <?php $menus = $this->layout->get_menu() ?>
            <?php foreach ($menus as $menu) : ?>
              <li class="menu-header"><?php echo $menu['label'] ?></li>
              <?php if (is_array($menu['children'])) : ?>
                <?php foreach ($menu['children'] as $menu2) : ?>
                  <?php if ($title == $menu2['label']) : ?>
                    <li <?php echo is_array($menu2['children']) ? ' class="nav-item active" ' : '' ?>>
                    <?php else : ?>
                    <li <?php echo is_array($menu2['children']) ? ' class="nav-item" ' : '' ?>>
                    <?php endif ?>
                    <?php if (is_array($menu2['children'])) : ?>
                      <?php if ($title == $menu2['label']) : ?>
                    <li class="dropdown active">
                    <?php else : ?>
                    <li class="nav-item dropdown">
                    <?php endif ?>

                    <a href="<?php echo $menu2['link'] != '#' ? base_url($menu2['link']) : '#' ?>" class="nav-link has-dropdown" data-toggle="dropdown">
                      <i class="<?php echo $menu2['icon'] ?>"></i> <span><?php echo $menu2['label'] ?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <?php foreach ($menu2['children'] as $menu3) : ?>
                        <?php if (is_array($menu3['children'])) : ?>
                          <?php if ($title  and $subtitle == $menu3['label']) : ?>
                            <li class="active">
                            <?php else : ?>
                            <li>
                            <?php endif ?>
                            <a href="<?php echo $menu3['link'] != '#' ? base_url($menu3['link']) : '#' ?>" class="nav-link">
                              <i class="<?php echo $menu3['icon'] ?>"></i> <span><?php echo $menu3['label'] ?></span>
                            </a>
                            </li>
                          <?php else : ?>
                            <?php if ($subtitle == $menu3['label']) : ?>
                              <li class='active'>
                              <?php else : ?>
                              <li>
                              <?php endif ?>
                              <a href="<?php echo $menu3['link'] != '#' ? base_url($menu3['link']) : '#' ?>" class="nav-link">
                                <i class="<?php echo $menu3['icon'] ?>"></i> <span><?php echo $menu3['label'] ?></span>
                              </a>
                              </li>
                            <?php endif ?>
                          <?php endforeach ?>
                    </ul>
                    </li>
                  <?php else : ?>
                    <?php if ($title == $menu2['label']) : ?>
                      <li class="active">
                      <?php else : ?>
                      <li>
                      <?php endif ?>
                      <a href="<?php echo $menu2['link'] != '#' ? base_url($menu2['link']) : '#' ?>" class="nav-link">
                        <i class="<?php echo $menu2['icon'] ?>"></i> <span><?php echo $menu2['label'] ?>
                      </a>
                      </li>
                    <?php endif ?>
                  <?php endforeach ?>
                <?php endif ?>
              <?php endforeach ?>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>
          <?php $this->load->view($page); ?>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <b>Developed by<a href="https://muhakbar.com"> Muhammad Akbar</b></a>
        </div>
        <div class="footer-right">
          <strong>Copyright &copy; <?= date('Y'); ?> <a href="https://muhakbar.com">GPP System v1.1</a>.</strong> All rights
          reserved.
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url('/assets/dist/js/'); ?>sweetalert2.all.min.js"></script>
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




  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>stisla_assets/js/scripts.js"></script>
  <script src="<?php echo base_url(); ?>stisla_assets/js/custom.js"></script>
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
  $('#syncBtn').click(function() {
    // add class 'btn-progress' to syncBtn

    Swal.fire({
      title: 'Are you sure?',
      allowOutsideClick: false,
      text: "Sync data will replace current data!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, sync it!'
    }).then((result) => {
      if (result.isConfirmed) {
        // change pointer to loading
        document.body.style.cursor = 'wait';
        $(this).addClass('btn-progress');
        // send ajax request
        statustext = 'Just take your coffee and wait for a while.';
        Swal.fire({
          allowOutsideClick: false,
          title: 'Synchronizing!',
          html: statustext,
          didOpen: () => {
            Swal.showLoading()
          }
        })

        sync_client(
          function() {
            sync_project(
              function() {
                sync_project_member(
                  function() {
                    sync_employee(
                      function() {
                        sync_logtime(
                          function() {
                            sync_milestone(
                              function() {
                                sync_client_table(
                                  function() {
                                    sync_project_table(
                                      function() {
                                        sync_invoice(
                                          function() {
                                            sync_general_cost();
                                          }
                                        );
                                      }
                                    );
                                  }
                                );
                              }
                            );
                          }
                        );
                      }
                    );
                  }
                );
              }
            );
          }
        );

        function sync_client(callback) {
          // sync client data
          $.ajax({
            url: '<?= base_url('/Autosync/sync_client'); ?>',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
              if (data.status == 'success') {
                myCallback("<br><br> <div class='text-left' style='font-size:14px'><i class='fas fa-check-circle' style='color:green'></i> " + data.message +
                  "</div>");
                callback();
              } else {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-times-circle'></i> " + data.message + "</div>");
              }
            },
          });
        }

        function sync_project(callback) {
          $.ajax({
            url: '<?= base_url('/Autosync/sync_project'); ?>',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
              if (data.status == 'success') {
                myCallback("<div class='text-left' style='font-size:14px'><i class='fas fa-check-circle' style='color:green'></i> " + data.message + "</div>");
                callback();
              } else {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-times-circle'></i> " + data.message + "</div>");
              }
            },
          });
        }

        function sync_project_member(callback) {
          $.ajax({
            url: '<?= base_url('/Autosync/sync_project_member'); ?>',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
              if (data.status == 'success') {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-check-circle' style='color:green'></i> " + data.message + "</div>");
                callback();
              } else {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-times-circle'></i> " + data.message + "</div>");
              }
            },
          });
        }

        function sync_employee(callback) {
          $.ajax({
            url: '<?= base_url('/Autosync/sync_employee'); ?>',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
              if (data.status == 'success') {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-check-circle' style='color:green'></i> " + data.message + "</div>");
                callback();
              } else {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-times-circle'></i> " + data.message + "</div>");
              }
            },
          });
        }

        function sync_logtime(callback) {
          $.ajax({
            url: '<?= base_url('/Autosync/sync_logtime'); ?>',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
              if (data.status == 'success') {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-check-circle' style='color:green'></i> " + data.message + "</div>");
                callback();
              } else {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-times-circle'></i> " + data.message + "</div>");
              }
            },
          });
        }

        function sync_milestone(callback) {
          $.ajax({
            url: '<?= base_url('/Autosync/sync_milestone'); ?>',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
              if (data.status == 'success') {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-check-circle' style='color:green'></i> " + data.message + "</div>");
                callback();
              } else {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-times-circle'></i> " + data.message + "</div>");
              }
            },
          });
        }

        function sync_client_table(callback) {
          $.ajax({
            url: '<?= base_url('/Autosync/sync_client_table'); ?>',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
              if (data.status == 'success') {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-check-circle' style='color:green'></i> " + data.message + "</div>");
                callback();
              } else {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-times-circle'></i> " + data.message + "</div>");
              }
            },
          });
        }

        function sync_project_table(callback) {
          $.ajax({
            url: '<?= base_url('/Autosync/sync_project_table'); ?>',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
              if (data.status == 'success') {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-check-circle' style='color:green'></i> " + data.message + "</div>");
                callback();
              } else {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-times-circle'></i> " + data.message + "</div>");
              }
            },
          });
        }

        function sync_invoice(callback) {
          $.ajax({
            url: '<?= base_url('/Autosync/sync_invoice'); ?>',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
              if (data.status == 'success') {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-check-circle' style='color:green'></i> " + data.message + "</div>");
                callback();
              } else {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-times-circle'></i> " + data.message + "</div>");
              }
            },
          });
        }

        function sync_general_cost() {
          $.ajax({
            url: '<?= base_url('/Autosync/sync_general_cost'); ?>',
            type: 'POST',
            dataType: 'json',
            success: function(data) {
              if (data.status == 'success') {
                myCallback("<div class='text-left' style='font-size:14px;'> <i class='fas fa-check-circle' style='color:green'></i> " + data.message + "</div>");
                //delay 3 second
                setTimeout(function() {
                  // change pointer to default
                  document.body.style.cursor = 'default';
                  // remove class 'btn-progress' from syncBtn
                  $('#syncBtn').removeClass('btn-progress');
                  // show success alert
                  myCallback('Done');
                }, 3000);

              } else {
                myCallback("<div class='text-left' style='font-size:14px'> <i class='fas fa-times-circle'></i> " + data.message + "</div>");
              }
            },
          });
        }

        function myCallback(response) {
          statustext = statustext + response;
          if (response == 'Done') {
            Swal.fire({
              // allowOutsideClick: false,
              title: 'Sync complete!',
              html: statustext,
              // didOpen: () => {
              //   Swal.showLoading()
              // }
            })
          } else {
            Swal.fire({
              allowOutsideClick: false,
              title: 'Synchronizing!',
              html: statustext,
              didOpen: () => {
                Swal.showLoading()
              }
            })
          }

        }

      }
    })
  })

  window.addEventListener("load", function() {
    Swal.hideLoading()
  });

  $('.formdate2').datepicker({
    format: "yyyy-mm",
    autoclose: true,
    startView: "months",
    minViewMode: "months"
  });
</script>