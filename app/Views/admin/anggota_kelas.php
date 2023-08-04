<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('kelas')?>">Kelas</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<!-- Main content -->

<div class="content">
  <div class="container-fluid">
    <div class="row "> 
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body p-2">
            <table >
              <tr>
                <th width="140px">Mata Kuliah</th>
                <td width="20px">:</td>
                <td><?= $kelas['matkul'] ?></td>
              </tr>
              <tr>
                <th width="140px">Program Studi</th>
                <td width="20px">:</td>
                <td><?= $kelas['prodi'] ?></td>
              </tr>
              <tr>
                <th >Periode</th>
                <td>:</td>
                <td><?= $kelas['ta'] ?> <?= $kelas['semester'] ?></td>
              </tr>
              <tr>
                <th>Jumlah Anggota</th>
                <td>:</td>
                <td><?=$jml?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="row "> 
      <div class="col-sm-12">
        <div class="card card-teal shadow-sm">
          <div class="card-header">
            <h3 class="card-title">Data Anggota Kelas</h3>

            <div class="card-tools">
            <?=
            form_open('kelas/hapus_semua_anggota_kelas/'.$kelas['id_kelas']);
            ?>
            <button type="submit" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Hapus Anggota</button>
            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#add">
                <i class="fas fa-plus"></i> Tambah Anggota
              </button>
            </div>
              <!-- /.card-tools -->
          </div>
            <!-- /.card-header -->

            <div class="card-body table-responsive">
              <table class="table table-head-fixed text-nowrap table-hover table-sm">              
                  <thead>
                    <tr>
                      <th class="text-center">
                        <input type="checkbox" id="centangSemuaDelet">
                      </th>
                      <th class="text-center">No</th>
                      <th >NIM</th>
                      <th >Nama Mahasiswa</th>
                      <th >Angkatan</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1;
                    foreach ($anggotakelas as $key => $value) { ?>
                      <tr>
                        <td class="text-center"> 
                        <input type="checkbox" name="noanggota[]" class="centangmhs" value="<?= $value['id_anggota_kelas'] ?>">
                        </td>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $value['nim'] ?></td>
                        <td><?= $value['nama_mhs'] ?></td>
                        <td><?= $value['angkatan'] ?></td>
                    </tr>
                    <?php } ?>
                    <?= form_close() ?>

                  </tbody>
              </table>
          </div>
            <!-- /.card-body -->
          
        </div>
          <!-- /.card -->
      </div>
    </div>
  </div>
</div>

<!-- Tampilan Modal Add -->
<div class="modal fade" id="add">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah <?=$title?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <?php 
                echo form_open('kelas/tambah_anggota_kelas/'.$kelas['id_kelas']);
              ?>
              <button type="submit" class="btn btn-success btn-xs"><i class="fas fa-plus"></i> Tambahkan Anggota</button>
              <br></br>
              <table id="example1" class="table table-striped table-hover table-responsive table-sm">              
                  <thead>
                    <tr>
                      <th width="30px" >
                        <input type="checkbox" id="centangSemua">
                      </th>
                      <th >NO</th>
                      <th >NIM/NPM</th>
                      <th >Nama Mahasiswa</th>
                      <th >Jenis Kelamin</th>
                      <th >Program Studi</th>
                      <th >Angkatan</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1;
                      foreach ($mhs as $key => $value) { ?>
                        <?php if($kelas['id_prodi']==$value['id_prodi'] && $kelas['angkatan']==$value['angkatan'] ) { ?>
                    <tr >
                      <td>
                        <input type="checkbox" name="nomhs[]" class="centangNomhs" value="<?= $value['id_mhs'] ?>">
                      </td>
                      <td><?= $no++; ?></td>
                      <td><?= $value['nim'] ?></td>
                      <td><?= $value['nama_mhs'] ?></td>
                      <td><?= $value['jk'] ?></td>
                      <td><?= $value['kode_prodi'] ?></td>
                      <td><?= $value['angkatan'] ?></td>
                    </tr>
                        <?php } ?>
                      <?php } ?>

                      <?php echo form_close() ?>
                  </tbody>
              </table>
            <!-- /.card-body -->

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
</diV>
  <!-- /.modal -->

