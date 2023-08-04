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
            <h3 class="card-title">Data <?=$title?> </h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add">
                <i class="fas fa-plus"></i> Tambah Prodi
              </button>
            </div>
              <!-- /.card-tools -->
          </div>
            <!-- /.card-header -->
            
          <div class="card-body table-responsive">
              <table class="table table-head-fixed text-nowrap table-hover">              
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Fakultas</th>
                      <th>Kode Prodi</th>
                      <th>Program Studi</th>
                      <th>Jenjang</th>
                      <th>Ketua Prodi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1;
                      foreach ($prodi as $key => $value) { ?>

                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $value['fakultas'] ?></td>
                      <td><?= $value['kode_prodi'] ?></td>
                      <td><?= $value['prodi'] ?></td>
                      <td><?= $value['jenjang'] ?></td>
                      <td><?= $value['ka_prodi'] ?></td>
                      <td>
                          <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_prodi'] ?>"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_prodi'] ?>"><i class="fas fa-trash"></i></button>
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
              <h4 class="modal-title">Tambah Prodi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
                echo form_open('prodi/add');
              ?>
              <div class="form-group">
                <label>Fakultas</label>
                  <select name="id_fakultas" class="form-control" required>
                    <option value="">Pilih Fakultas</option>
                    <?php foreach  ($fakultas as $key => $value) { ?>
                      <option value="<?= $value['id_fakultas']?>"><?= $value['fakultas']?></option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                <label>Kode Prodi</label>
                <input name="kode_prodi" class="form-control" placeholder="Kode Prodi" required>
              </div>
              <div class="form-group">
                <label>Prodi</label>
                <input name="prodi" class="form-control" placeholder="Prodi" required>
              </div>
              <div class="form-group">
                <label>Jenjang</label>
                <select name="jenjang" class="form-control" required>
                    <option value="">Pilih Jenjang</option>
                      <option value="S-1">S-1</option>
                      <option value="S-2">S-2</option>
                      <option value="S-3">S-3</option>
                </select>
              </div>
              <div class="form-group">
                <label>Ketua Prodi</label>
                <select name="ka_prodi" class="form-control" required>
                <option value="">Pilih Dosen</option>
                    <?php foreach  ($dosen as $key => $value) { ?>
                      <option value="<?= $value['nama_dosen']?>"><?= $value['nama_dosen']?></option>
                    <?php } ?>
                  </select>
                </select>
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
      <?php foreach ($prodi as $key => $value) { ?>
      <div class="modal fade" id="edit<?= $value['id_prodi'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Prodi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
                echo form_open('prodi/update/' . $value['id_prodi']);
              ?>
              <div class="form-group">
                <label>Fakultas</label>
                <select name="id_fakultas" class="form-control" required>
                    <option class="bg-teal" value="<?= $value['id_fakultas']?>"><?= $value['fakultas']?></option>
                    <?php foreach  ($fakultas as $key => $fakul) { ?>
                      <option value="<?= $fakul['id_fakultas']?>"><?= $fakul['fakultas']?></option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                <label>Kode Prodi</label>
                <input name="kode_prodi" value="<?= $value['kode_prodi'] ?>"class="form-control" placeholder="Kode Prodi" required>
              </div>
              <div class="form-group">
                <label>Prodi</label>
                <input name="prodi" value="<?= $value['prodi'] ?>"class="form-control" placeholder="Prodi" required>
              </div>
              <div class="form-group">
                <label>Jenjang</label>
                <select name="jenjang" class="form-control" required>
                    <option class="bg-teal" value="<?= $value['jenjang']?>"><?= $value['jenjang']?></option>
                      <option value="S-1">S-1</option>
                      <option value="S-2">S-2</option>
                      <option value="S-3">S-3</option>
                </select>
              </div>
              <div class="form-group">
                <label>Ketua Prodi</label>
                <select name="ka_prodi" class="form-control" required>
                <option class="bg-teal" value="<?= $value['ka_prodi']?>"><?= $value['ka_prodi']?></option>
                    <?php foreach  ($dosen as $key => $value) { ?>
                      <option value="<?= $value['nama_dosen']?>"><?= $value['nama_dosen']?></option>
                    <?php } ?>
                  </select>
                </select>
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
    <?php foreach ($prodi as $key => $value) { ?>
      <div class="modal fade" id="delete<?= $value['id_prodi'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Prodi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus <b><?= $value['prodi'] ?> ?</b>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
              <a href="<?= base_url('prodi/delete/' . $value['id_prodi']) ?>" class="btn btn-danger">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php } ?>


      <!-- /.modal -->





