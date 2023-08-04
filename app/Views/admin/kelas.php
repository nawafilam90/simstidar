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
        <div class="card card-teal shadow-sm">
          <div class="card-header">
            <h3 class="card-title">Data <?=$title?></h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#import">
                <i class="fas fa-download"></i> Import <?= $title?>
              </button>
            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add">
                <i class="fas fa-plus"></i> Tambah Kelas
              </button>
            </div>
              <!-- /.card-tools -->
          </div>
            <!-- /.card-header -->
            
          <div class="card-body table-responsive">
              <table id="example1"class="table table-hover table-sm">              
                  <thead>
                    <tr >
                      <th >No</th>
                      <th >Periode</th>
                      <th >Kelas</th>
                      <th >Mata Kuliah</th>
                      <th >SKS</th>
                      <th >Prodi</th>
                      <th >Dosen</th>
                      <th class="text-center">Anggota</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $db = \Config\Database::connect();
                        $no = 1;
                        foreach ($kelas as $key => $value) { 
                          $jml = $db->table('anggota_kelas')
                            ->where('id_kelas' ,$value['id_kelas'])
                            ->countAllResults();
                      ?>
                    <tr >
                      <td><?= $no++; ?></td>
                      <td><?= $value['ta'] ?> <?= $value['semester'] ?></td>
                      <td><?= $value['nama_kelas'] ?></td>
                      <td><?= $value['matkul'] ?></td>
                      <td><?= $value['sks'] ?></td>
                      <td><?= $value['kode_prodi'] ?></td>
                      <td><?= $value['nama_dosen'] ?></td>
                      <td> <p class="loat-right badge bg-warning"><?= $jml ?></p>
                      <a href="<?= base_url('kelas/anggota_kelas/' . $value['id_kelas']) ?>" class="loat-right badge bg-teal">Anggota</a>
                      </td>
                      <td class="text-center">
                          <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_kelas'] ?>"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_kelas']?>"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                        <?php } ?>


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
                echo form_open('kelas/add');
              ?>
              <div class="row">
                <div class="form-group col-sm-7">
                    <label>Periode / Semester</label>
                    <select name="id_ta" class="form-control" placeholder="Program Studi" required>
                        <option value="<?= $ta_aktif['id_ta']?>"><?= $ta_aktif['ta']?> (<?= $ta_aktif['semester']?>)</option>
                    </select>
                </div>
                <div class="form-group col-sm-5">
                    <label>Nama Kelas</label>
                    <input name="nama_kelas" class="form-control" placeholder="kode prodi-angkatan-semester" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-7">
                    <label>Program Studi</label>
                    <select name="id_prodi" class="form-control" placeholder="Program Studi" required>
                        <option value="" class="bg-success">Pilih Prodi</option>
                        <?php foreach  ($prodi as $key => $value) { ?>
                        <option value="<?= $value['id_prodi']?>"><?= $value['prodi']?> (<?= $value['kode_prodi']?>)</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-5">
                    <label>Angkatan</label>
                    <select name="angkatan" class="form-control" placeholder="Angkatan" required>
                          <option value="">Pilih Tahun</option>
                          <?php for ($i = date('Y'); $i >= date('Y') - 6; $i--) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-7">
                    <label>Mata Kuliah</label>
                    <select name="id_matkul" class="form-control" placeholder="Program Studi" required>
                        <option value="" class="bg-success">Pilih Mata Kuliah</option>
                        <?php foreach  ($listmatkul as $key => $value) { ?>
                        <option value="<?= $value['id_matkul']?>"><?= $value['kode_prodi']?> - <?= $value['matkul']?> (<?= $value['smt']?>-<?= $value['semester']?>)</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-5">
                    <label>Dosen</label>
                    <select name="id_dosen" class="form-control" placeholder="Nama Dosen" required>
                        <option value="" class="bg-success">Pilih Dosen</option>
                          <?php foreach  ($dosen as $key => $value) { ?>
                        <option value="<?= $value['id_dosen']?>"><?= $value['nama_dosen']?></option>
                        <?php } ?>
                    </select>
                </div>
              </div>
              
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
              <?php echo form_close() ?>
        </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Tampilan Modal Edit -->
  <?php foreach ($kelas as $key => $value) { ?>
      <div class="modal fade" id="edit<?= $value['id_kelas'] ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit kelas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
                echo form_open('kelas/update/' . $value['id_kelas']);
              ?>
              <div class="row">
                <div class="form-group col-sm-7">
                    <label>Periode / Semester</label>
                    <select name="id_ta" class="form-control" placeholder="Program Studi" >
                        <option value="<?= $value['id_ta']?>"><?= $value['ta']?> (<?= $value['semester']?>)</option>
                        <?php foreach  ($ta_list as $key => $ta) { ?>
                        <option value="<?= $ta['id_ta']?>"><?= $ta['ta']?> (<?= $ta['semester']?>)</option>
                        <?php } ?>

                    </select>
                </div>
                <div class="form-group col-sm-5">
                    <label>Nama Kelas</label>
                    <input name="nama_kelas" value="<?= $value['nama_kelas'] ?>" class="form-control" placeholder="kode prodi-angkatan-semester" >
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-7">
                    <label>Program Studi</label>
                    <select name="id_prodi" class="form-control" placeholder="Program Studi">
                        <option value="<?= $value['id_prodi']?>" class="bg-success"><?= $value['prodi']?> (<?= $value['kode_prodi']?>)</option>
                        <?php foreach  ($prodi as $key => $prd) { ?>
                        <option value="<?= $prd['id_prodi']?>"><?= $prd['prodi']?> (<?= $prd['kode_prodi']?>)</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-5">
                    <label>Angkatan</label>
                    <select name="angkatan" class="form-control" placeholder="Angkatan" >
                          <option value="<?= $value['angkatan'] ?>" class="bg-success"><?= $value['angkatan'] ?></option>
                          <?php for ($i = date('Y'); $i >= date('Y') - 6; $i--) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-7">
                    <label>Mata Kuliah</label>
                    <select name="id_matkul" class="form-control" placeholder="Program Studi" >
                        <option value="<?= $value['id_matkul']?>" class="bg-success"><?= $value['matkul']?> (<?= $value['smt']?>-<?= $value['semester']?>)</option>
                        <?php foreach  ($listmatkul as $key => $mk) { ?>
                        <option value="<?= $mk['id_matkul']?>"><?= $mk['kode_prodi']?> - <?= $mk['matkul']?> (<?= $mk['smt']?>-<?= $mk['semester']?>)</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-5">
                    <label>Dosen</label>
                    <select name="id_dosen" class="form-control" placeholder="Nama Dosen" >
                      <option value="<?= $value['id_dosen'] ?>" class="bg-success"><?= $value['nama_dosen'] ?></option>
                        <?php foreach  ($dosen as $key => $dsn) { ?>
                        <option value="<?= $dsn['id_dosen'] ?>"><?= $dsn['nama_dosen'] ?></option>
                        <?php } ?>
                    </select>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
              <?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php } ?>

      <!-- /.modal -->


  <!-- Tampilan Modal Delete -->
  <?php foreach ($kelas as $key => $value) { ?>
      <div class="modal fade" id="delete<?= $value['id_kelas'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Kelas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus <b><?= $value['nama_kelas'] ?> - <?= $value['matkul'] ?> ?</b>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
              <a href="<?= base_url('kelas/delete/' . $value['id_kelas']) ?>" class="btn btn-danger">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php } ?>


      <!-- /.modal -->
      
      
<!-- Tampilan Modal Import -->
<div class="modal fade" id="import">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Import <?=$title?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
                echo form_open_multipart('kelas/upload');
              ?>
                <div class="form-group">
                  <label>Import File</label>
                  <input type="file" name="fileimport" class="form-control">
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool bg-success">
                    <a class="fas fa-download" href="<?php echo base_url()?>/assets/ImportKelas.xlsx"> Download Template</a>    
                    </button>
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-success">Upload</button>
            </div>
              <?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

