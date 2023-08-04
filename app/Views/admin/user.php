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

<div class="content">
  <div class="container-fluid">
            <?php 
              if (session()->getFlashdata('error')) {?>
                <div class="alert alert-dismissible fade show bg-pink" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <?= session()->getFlashdata('error'); ?>
                </div>
              <?php }?>
              
              <?php 
              if (session()->getFlashdata('sukses')) {?>
                <div class="alert alert-dismissible fade show bg-teal" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <?= session()->getFlashdata('sukses'); ?>
                </div>
            <?php }?>
  </div>
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
                <i class="fas fa-plus"></i> Tambah <?= $title?>
              </button>
            </div>
              <!-- /.card-tools -->
          </div>
            <!-- /.card-header -->
            
          <div class="card-body table-responsive">
              <table id="example1"class="table table-hover">              
                  <thead>
                    <tr class="text-center">
                      <th >No</th>
                      <th >Foto</th>
                      <th >Nama User</th>
                      <th >Username</th>
                      <th >Password</th>
                      <th >Level</th>
                      <th >Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1;
                      foreach ($user as $key => $value) { ?>
                    <tr class="text-center">
                      <td><?= $no++; ?></td>
                      <td> <img src=" <?php if($value['foto_user'] == '') { ?> foto/profil.jpg <?php } else { ?> foto/<?= $value['foto_user']?> <?php }?>" class="img-circle" width="40px" height="40px" alt="Foto"> </td>
                      <td><?= $value['nama_user'] ?></td>
                      <td><?= $value['username'] ?></td>
                      <td><?= $value['password'] ?></td>
                      <td><?= $value['level'] ?></td>
                      <td>
                          <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_user'] ?>"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_user'] ?>"><i class="fas fa-trash"></i></button>
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
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah <?=$title?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
                echo form_open_multipart('user/add');
              ?>
              <div class="form-group">
                  <label>Nama User</label>
                  <input name="nama_user" class="form-control" placeholder="Nama User" required>
              </div>
              <div class="form-group">
                  <label>Username</label>
                  <input name="username" class="form-control" placeholder="Usernamer" required>
              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input name="password" class="form-control" placeholder="Password" required>
              </div>
              <div class="form-group">
                  <label>Level</label>
                  <input name="level" class="form-control" placeholder="Level" required>
              </div>
              <div class="row">
                <div class="form-group col-sm-8">
                  <label>Foto User</label>
                  <input type="file" name="foto_user" id="preview_gambar" class="form-control" required>
                </div>
                <div class="form-group col-sm-4 text-center">
                  <img src="<?= base_url('foto/default.jpg')?>" id="gambar_load" class="img-circle" width="100px" height="100px" alt="User Image">
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
      <?php foreach ($user as $key => $value) { ?>
      <div class="modal fade" id="edit<?= $value['id_user'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit <?=$title?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
                echo form_open_multipart('user/edit/' . $value['id_user']);
              ?>
              <div class="form-group">
                  <label>Nama User</label>
                  <input name="nama_user" value="<?= $value['nama_user'] ?>" class="form-control" placeholder="Nama User" required>
              </div>
              <div class="form-group">
                  <label>Username</label>
                  <input name="username" value="<?= $value['username'] ?>" class="form-control" placeholder="Usernamer" required>
              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input name="password" value="<?= $value['password'] ?>" class="form-control" placeholder="Password" required>
              </div>
                <div class="form-group">
                  <label>Level</label>
                  <input name="level" value="<?= $value['level'] ?>" class="form-control" placeholder="Level" required>
                </div>
              <div class="row">
                <div class="form-group col-sm-8">
                  <label>Foto User</label>
                  <input type="file" name="foto_user" id="" class="form-control preview_gambar">
                </div>
                <div class="form-group col-sm-4 text-center">
                  <img src="<?= base_url('foto/' . $value['foto_user'])?>" id="" class="img-circle gambar_load" width="100px" height="100px" alt="User Image">
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
    <?php foreach ($user as $key => $value) { ?>
      <div class="modal fade" id="delete<?= $value['id_user'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus <?=$title?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus <b><?= $value['nama_user'] ?> ?</b>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
              <a href="<?= base_url('user/delete/' . $value['id_user']) ?>" class="btn btn-danger">Hapus</a>
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
                echo form_open_multipart('user/upload');
              ?>
                <div class="form-group">
                  <label>Import File</label>
                  <input type="file" name="fileimport" class="form-control">
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool bg-success">
                    <a class="fas fa-download" href="<?php echo base_url()?>/assets/ImportUser.xlsx"> Download Template</a>    
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



