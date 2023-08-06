<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-teal elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>" class="brand-link  bg-teal">
      <img src="<?php echo base_url() ?>/template/dist/img/logo_stidar.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .9">
      <span class="brand-text font-weight-dark ">SIM STIDAR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('foto/' . session()->get('foto_user')) ?>" class="img-circle elevation-1" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= session()->get('nama_user') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


<!-- Sidebar Untuk ADMIN -->

          <?php if (session()->get('level') == 1) { ?>
          <li class="nav-item menu-open">
            <a href="<?php echo base_url() ?>" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link bg-teal">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Mahasiswa')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-user-graduate"></i>
                <p>Data Mahasiswa</p></a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Dosen')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-user-graduate"></i>
                <p>Data Dosen</p></a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Matkul')?>" class="nav-link"><i class="nav-icon fas fa-book"></i>
                <p>Mata Kuliah</p></a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Prodi')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-address-book"></i>
                <p>Prodi</p></a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Fakultas')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-house-user"></i>
                <p>Fakultas</p></a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('TA')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-calendar-check"></i>
                <p>Tahun Akademik</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link bg-teal">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Akademik
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Kelas')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-users"></i>
                <p>Kelas Perkuliahan</p></a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Jadwal')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-newspaper"></i>
                <p>Jadwal Kuliah</p></a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Presensi')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-calendar"></i>
                <p>Presensi</p></a>
              </li>
            </ul>

          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link bg-teal">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Pengaturan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('User')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-user"></i>
                <p>User</p></a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('TA/setting')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-calendar-check"></i>
                <p>Atur Tahun Akademik</p></a>
              </li>
            </ul>
          </li>


<!-- Sidebar Untuk TENDIK -->

          <?php } elseif (session()->get('level') == 2) { ?>
            <li class="nav-item menu-open">
            <a href="<?php echo base_url() ?>" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <ul class="nav nav-treeview ">
              <li class="nav-item ">
                <a href="<?= base_url('Kelas')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-users text-teal"></i>
                <p>Kelas Perkuliahan</p></a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Jadwal')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-newspaper text-teal"></i>
                <p>Jadwal Kuliah</p></a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Presensi')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-calendar text-teal"></i>
                <p>Presensi</p></a>
              </li>
            </ul>
          </li>


<!-- Sidebar Untuk DOSEN -->

          <?php } elseif (session()->get('level') == 3) { ?>
            <li class="nav-item menu-open">
            <a href="<?php echo base_url() ?>" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('JadwalDosen')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-newspaper text-teal"></i>
                <p>Jadwal Mengajar</p></a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Nilai')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-newspaper text-teal"></i>
                <p>Nilai Mahasiswa</p></a>
              </li>
            </ul>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?php
                    $db = \Config\Database::connect();
                    $user = $db->table('user')
                              ->where('username' , session()->get('username'))
                              ->get()->getRowArray();
                ?>
                  
                <a href="<?= base_url('User/user_detail/'. $user['id_user'])?>" class="nav-link"><i class="nav-icon fas fa-user text-teal"></i>
                <p>User Akun</p></a>
              </li>
            </ul>


<!-- Sidebar Untuk MAHASISWA -->

          <?php } elseif (session()->get('level') == 4) { ?>
            <li class="nav-item menu-open">
            <a href="<?php echo base_url() ?>" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?php
                    $db = \Config\Database::connect();
                    $mhs = $db->table('mahasiswa')
                              ->where('nim' , session()->get('username'))
                              ->get()->getRowArray();
                ?>
                <a href="<?= base_url('Mahasiswa/biodata_mhs/'. $mhs['id_mhs'])?>" class="nav-link"><i class="nav-icon fas fa-solid fa-user-graduate text-teal"></i>
                <p>Biodata</p></a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('JadwalMahasiswa')?>" class="nav-link"><i class="nav-icon fas fa-solid fa-newspaper text-teal"></i>
                <p>Jadwal Kuliah</p></a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Nilaimhs')?>" class="nav-link"><i class="nav-icon fas fa-book-open text-teal"></i>
                <p>Nilai Akademik</p></a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Khs')?>" class="nav-link"><i class="nav-icon fas fa-book-open text-teal"></i>
                <p>KHS</p></a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?php
                    $db = \Config\Database::connect();
                    $user = $db->table('user')
                              ->where('username' , session()->get('username'))
                              ->get()->getRowArray();
                ?>
                  
                <a href="<?= base_url('User/user_detail/'. $user['id_user'])?>" class="nav-link"><i class="nav-icon fas fa-user text-teal"></i>
                <p>User Akun</p></a>
              </li>
            </ul>

          <?php }?>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


