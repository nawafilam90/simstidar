<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIM  | STIDAR</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<<?= base_url() ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">-->
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/toastr/toastr.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Ion Slider -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
  <!-- uPlot -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/uplot/uPlot.min.css">
  <!--style tabel Presensi Kelas-->
  <style type="text/css">
   
    .div1 {
    width: 100%;
    height: 600px;
    overflow: scroll;
    border: 0px solid #ffffff;
    }
    
    .div1 table {
        border-spacing: 0;
    }
    
    .th {
        border-left: none;
        border-right: 1px solid #bbbbbb;
        padding: 1px;
        width: 50px;
        min-width: 50px;
        position: sticky;
        top: 0;
        background: #20c997;
        color: #ffffff;
        font-weight: normal;
        z-index: 2;
    }
    
    .th1 {
        border-left: none;
        border-right: 1px solid #bbbbbb;
        padding: 1px;
        width: 50px;
        min-width: 50px;
        position: sticky;
        top: 66px;
        background: #20c997;
        color: #ffffff;
        font-weight: normal;
        z-index: 2;
    }
    
    .div1 td {
        border-left: none;
        border-right: 1px solid #bbbbbb;
        border-bottom: 1px solid #bbbbbb;
        padding: 1px;
        width: 50px;
        min-width: 50px;
    }
    
    .col1 {
        position: sticky;
        left: 0;
        width: 50px;
        min-width: 50px;
        z-index: 3;
    }
    
    .col2 {
        position: sticky;
        left: 0;
        width: 120px;
        min-width: 100px;
        z-index: 3;
    }
    
    .col3 {
        position: sticky;
        left: 0;
        width: 150px;
        min-width: 150px;
        z-index: 3;
    }
    
    .div1 td:nth-child(1),
    .div1 td:nth-child(2),
    .div1 td:nth-child(3) {
        background: #ffebb5;
        z-index: 2;
    }

  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
   <!--<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url() ?>/template/dist/img/logo_stidar.png" alt="logo_stidar" height="60" width="60">
  </div>-->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-teal navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item row align-items-center">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
      </li>
      <li class="navbar-nav align-items-center">
        <a href="#" class="text-white">Sistem Informasi Manajemen | STIDAR Sumenep</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments text-white"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url() ?>/template/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url() ?>/template/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url() ?>/template/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      
      <!-- User Menu -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="<?= base_url('foto/' . session()->get('foto_user')) ?>" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline text-white"><?= session()->get('nama_user') ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-teal p-1">
            <img src="<?= base_url('foto/' . session()->get('foto_user')) ?>" class="img-circle elevation-2" alt="User Image">

            <p class="mr-2">
              <?= session()->get('nama_user') ?> - <?php if (session()->get('level') == 1) echo 'Admin';
                                                      else if (session()->get('level') == 2)
                                                        echo 'Tendik';

                                                      else if (session()->get('level') == 3)
                                                        echo 'Dosen';

                                                      else if (session()->get('level') == 4)
                                                        echo 'Mahasiswa';

                                                    ?>
              <small><?= date('h-m-Y') ?></small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer p-2">
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-sm btn-rounded float-right bg-red"><i class="fas fa-undo mr-1"></i>Logout</a>
          </li>
        </ul>
      </li>
      
    </ul>
  </nav>
  
  
  <!-- /.navbar -->
  
  
  
  
  