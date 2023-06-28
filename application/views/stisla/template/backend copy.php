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
  <link rel="stylesheet" href="<?= base_url(); ?>stisla_assets/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/akbr_custom.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>stisla_assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>stisla_assets/css/components.css">
  <script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?= base_url(); ?>stisla_assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
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
                    <li class="nav-item dropdown active">
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

          <?php $this->load->view($page); ?> </section>
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
  <!-- jQuery 3 -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url(); ?>stisla_assets/js/stisla.js"></script>


  <!-- CSS Datepicker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap-datetimepicker.min.css">

  <!-- Datepicker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/bootstrap-datetimepicker.id.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url(); ?>stisla_assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>stisla_assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url(); ?>stisla_assets/js/page/index.js"></script>
  <script src="<?= base_url('/assets/dist/js/'); ?>sweetalert2.all.min.js"></script>
  <!-- AdminLTE for demo purposes -->
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

          Swal.fire({
            allowOutsideClick: false,
            title: 'Synchronizing!',
            html: 'Just take your coffee and wait for a while.',
            didOpen: () => {
              Swal.showLoading()
            }
          })

          window.location.href = "<?= base_url('Autosync'); ?>";
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