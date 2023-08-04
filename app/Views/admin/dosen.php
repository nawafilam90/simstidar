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
                <i class="fas fa-plus"></i> Tambah <?= $title?>
              </button>
            </div>
              <!-- /.card-tools -->
          </div>
            <!-- /.card-header -->
            
          <div class="card-body table-responsive">
              <table id="example1" class="table table-hover">              
                  <thead>
                    <tr >
                      <th width="40px" >NO</th>
                      <th >NIDN/NIY</th>
                      <th >NAMA DOSEN</th>
                      <th >PENDIDIKAN</th>
                      <th >AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1;
                      foreach ($dosen as $key => $value) { ?>
                    <tr >
                      <td><?= $no++; ?></td>
                      <td><?= $value['nidn'] ?></td>
                      <td><?= $value['nama_dosen'] ?></td>
                      <td><?= $value['pendidikan'] ?></td>
                      <td>
                          <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_dosen'] ?>"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_dosen'] ?>"><i class="fas fa-trash"></i></button>
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
                echo form_open('dosen/add');
              ?>
              <div class="form-group">
                  <label>NIDN / NIY</label>
                  <input name="nidn" class="form-control" placeholder="NIDN / NIY">
              </div>
              <div class="form-group">
                  <label>Nama Dosen</label>
                  <input name="nama_dosen" class="form-control" placeholder="Nama Dosen" required>
              </div>
              <div class="form-group">
                  <label>Pendidikan Dosen</label>
                  <input name="pendidikan" class="form-control" placeholder="S-2, S-3," required>
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
      <?php foreach ($dosen as $key => $value) { ?>
      <div class="modal fade" id="edit<?= $value['id_dosen'] ?>">
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
                echo form_open_multipart('dosen/edit/' . $value['id_dosen']);
              ?>
              <div class="form-group">
                  <label>NIDN / NIY</label>
                  <input name="nidn" value="<?= $value['nidn'] ?>" class="form-control" placeholder="NIDN / NIY">
              </div>
              <div class="form-group">
                  <label>Nama Dosen</label>
                  <input name="nama_dosen" value="<?= $value['nama_dosen'] ?>" class="form-control" placeholder="Nama Dosen" required>
              </div>
              <div class="form-group">
                  <label>Pendidikan Dosen</label>
                  <input name="pendidikan" value="<?= $value['pendidikan'] ?>" class="form-control" placeholder="S-2, S-3" required>
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
    <?php foreach ($dosen as $key => $value) { ?>
      <div class="modal fade" id="delete<?= $value['id_dosen'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus <?=$title?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus <b><?= $value['nama_dosen'] ?> ?</b>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
              <a href="<?= base_url('dosen/delete/' . $value['id_dosen']) ?>" class="btn btn-danger">Hapus</a>
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
                echo form_open_multipart('dosen/upload');
              ?>
                <div class="form-group">
                  <label>Import File</label>
                  <input type="file" name="fileimport" class="form-control">
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool bg-success">
                    <a class="fas fa-download" href="<?php echo base_url()?>/assets/ImportDosen.xlsx"> Download Template</a>    
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




