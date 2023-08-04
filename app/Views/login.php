
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIM STIDAR | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- CSS style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/style.css" />

</head>
<body class="hold-transition login-page">
  <div class="container">
      <div class="signin-signup">
              <?php 
                $errors = session()->getFlashdata('errors');
                   if (!empty($errors)) { ?>
                  <div class="alert social-media" role="alert">
                    <ul>
                      <?php foreach ($errors as $error):?>
                        <li><?= esc($error) ?></li>
                      <?php endforeach ?>
                    </ul>
                  </div>
              <?php } ?>

              <?php 
                  if (session()->getFlashdata('pesan')) {?>
                    <div class="alert social-media" role="alert">
                      <?= session()->getFlashdata('pesan'); ?>
                    </div>
              <?php }?>

              <?php 
                  if (session()->getFlashdata('sukses')) {?>
                    <div class="alert social-media" role="alert">
                      <?= session()->getFlashdata('sukses'); ?>
                    </div>
                  <?php }?>

            <?php
              echo form_open('auth/login');
            ?>
            <div>
            <img src="<?php echo base_url() ?>/template/dist/img/logo_stidar.png">
            </div>
            <h2 class="title">SIM STIDAR | Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="username" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <button type="submit" class="btn">Login</button>
            
            <?php echo form_close(); ?>
      </div>
      

      <div class="panels-container">
        <div class="panel left-panel" id="sign-up-btn">
          <div class="content">
            <h3>SIM STIDAR</h3>
            <p>
              Sistem Informasi Manajemen Kegiatan Akademik di Sekolah Tinggi Ilmu Dakwah Raudlatul Iman
            </p>
            <button class="btn transparent" id="sign-up-btn">
              STIDAR Sumenep
            </button>
          </div>
          <img src="<?php echo base_url() ?>/img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel" id="sign-in-btn">
          <div class="content">
            <h3>STIDAR Sumenep</h3>
            <p>
            The Green Islamic Campus of Civilization Development Centre
            </p>
            <button class="btn transparent" id="sign-in-btn">
              KAMPUS DAMAI
            </button>
      </div>
          <img src="<?php echo base_url() ?>/img/register.svg" class="image" alt="" />
    </div>
  </div>


</body>

<!-- jQuery -->
<script src="<?php echo base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- CSS Login -->
<script src="<?php echo base_url() ?>/app.js"></script>



</html>
