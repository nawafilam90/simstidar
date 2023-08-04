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
              if (session()->getFlashdata('pesan')) {
                echo '<div class="alert bg-teal" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
               
              }
                
              ?>
  </div>
</div>
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row "> 
      <div class="col-sm-12">
        <div class="card card-teal shadow-sm">
          <div class="card-header">
            <h3 class="card-title">Data <?=$title?> </h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add">
                <i class="fas fa-plus"></i> Tambah Fakultas
              </button>
            </div>
              <!-- /.card-tools -->
          </div>
            <!-- /.card-header -->
            
          <div class="card-body table-responsive">
              <table class="table table-head-fixed text-nowrap table-hover">              
                  <thead>
                    <tr>
                      <th width="6%" class="text-center">No</th>
                      <th width="64%">Fakultas</th>
                      <th width="30%" class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1;
                      foreach ($fakultas as $key => $value) { ?>

                    <tr>
                      <td class="text-center"><?= $no++; ?></td>
                      <td><?= $value['fakultas'] ?></td>
                      <td class="text-center">
                          <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_fakultas'] ?>"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_fakultas'] ?>"><i class="fas fa-trash"></i></button>
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
              <h4 class="modal-title">Tambah Fakultas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
                echo form_open('fakultas/add');
              ?>
              <div class="form-group">
              <label>Fakultas</label>
              <input name="fakultas" class="form-control" placeholder="Fakultas" required>
              
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


<!-- Tampilan Modal Edit -->
      <?php foreach ($fakultas as $key => $value) { ?>
      <div class="modal fade" id="edit<?= $value['id_fakultas'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Fakultas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
                echo form_open('fakultas/edit/' . $value['id_fakultas']);
              ?>
              <div class="form-group">
              <label>Fakultas</label>
              <input name="fakultas" value="<?= $value['fakultas'] ?>" class="form-control" placeholder="Fakultas" required>
              
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
    <?php foreach ($fakultas as $key => $value) { ?>
      <div class="modal fade" id="delete<?= $value['id_fakultas'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Fakultas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus <b><?= $value['fakultas'] ?> ?</b>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
              <a href="<?= base_url('fakultas/delete/' . $value['id_fakultas']) ?>" class="btn btn-danger">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php } ?>


      <!-- /.modal -->





