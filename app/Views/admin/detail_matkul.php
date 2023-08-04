<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 
            class="m-0">
            <a href="<?= base_url('matkul')?>"><?= $title ?></a>
             : 
            <small><?= $prodi['prodi'] ?></small>
            </h1>
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
  </div>
</div>

<!-- Main content -->

<div class="content">
  <div class="container-fluid">
    <div class="row "> 
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body p-2">
            <table>
              <tr>
                <th width="120px">Program Studi</th>
                <td width="20px">:</td>
                <td><?= $prodi['prodi'] ?></td>
              </tr>
              <tr>
                <th >Jenjang</th>
                <td>:</td>
                <td><?= $prodi['jenjang'] ?></td>
              </tr>
              <tr>
                <th>Fakultas</th>
                <td>:</td>
                <td><?= $prodi['fakultas'] ?></td>
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
            <h3 class="card-title"><?=$title?> </h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add">
                <i class="fas fa-plus"></i> Tambah Mata Kuliah
              </button>
            </div>
              <!-- /.card-tools -->
          </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table class="table table-head-fixed text-nowrap table-hover">              
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th >Kode</th>
                      <th >Mata Kuliah</th>
                      <th >SKS</th>
                      <th >Kategori</th>
                      <th >Semester</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; foreach ($matkul as $key => $value) { ?>
                    <tr>
                    <td class="text-center"><?= $no++; ?></td>
                      <td><?= $value['kode_matkul'] ?></td>
                      <td><?= $value['matkul'] ?></td>
                      <td><?= $value['sks'] ?></td>
                      <td><?= $value['kategori'] ?></td>
                      <td><?= $value['smt'] ?> (<?= $value['semester'] ?>) </td>
                      <td class="text-center">
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_matkul'] ?>"><i class="fas fa-trash"></i></button>
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
              <h4 class="modal-title">Tambah <?= $title ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
                echo form_open('matkul/add/'.$prodi['id_prodi']);
              ?>
              <div class="form-group">
              <label>Kode Mata Kuliah</label>
              <input name="kode_matkul" class="form-control" placeholder="Kode Matakuliah" required>
            </div>
            <div class="form-group">
              <label>Mata Kuliah</label>
              <input name="matkul" class="form-control" placeholder="Matakuliah" required>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select name="kategori" class="form-control"required>
                <option value="">Pilih Kategori</option>
                <option value="Wajib Nasional">Wajib Nasional</option>
                <option value="Wajib Prodi">Wajib Prodi</option>
                <option value="Pilihan">Pilihan</option>
                <option value="Muatan Lokal">Muatan Lokal</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jumlah SKS</label>
              <div class="form-group">
                <div class="btn-group btn-group-toggle btn-xs" data-toggle="buttons">
                  <label class="btn bg-teal active">
                    <input type="radio" name="sks" id="option_b1" autocomplete="off" value="1" checked> 1
                  </label>
                  <label class="btn bg-teal">
                    <input type="radio" name="sks" id="option_b2" autocomplete="off" value="2"> 2
                  </label>
                  <label class="btn bg-teal">
                    <input type="radio" name="sks" id="option_b3" autocomplete="off" value="3"> 3
                  </label>
                  <label class="btn bg-teal ">
                    <input type="radio" name="sks" id="option_b4" autocomplete="off" value="4"> 4
                  </label>
                </div>   
              </div>
            </div>
            <div class="form-group">
              <label>Semester</label>
                <div class="form-group">
                    <div class="btn-group btn-group-toggle btn-xs" data-toggle="buttons">
                      <label class="btn bg-teal active">
                        <input type="radio" name="smt" id="option_b1" autocomplete="off" value="1" checked> 1
                      </label>
                      <label class="btn bg-teal">
                        <input type="radio" name="smt" id="option_b2" autocomplete="off" value="2"> 2
                      </label>
                      <label class="btn bg-teal">
                        <input type="radio" name="smt" id="option_b3" autocomplete="off" value="3"> 3
                      </label>
                      <label class="btn bg-teal ">
                        <input type="radio" name="smt" id="option_b4" autocomplete="off" value="4"> 4
                      </label>
                      <label class="btn bg-teal">
                        <input type="radio" name="smt" id="option_b5" autocomplete="off" value="5"> 5
                      </label>
                      <label class="btn bg-teal">
                        <input type="radio" name="smt" id="option_b6" autocomplete="off" value="6"> 6
                      </label>
                      <label class="btn bg-teal">
                        <input type="radio" name="smt" id="option_b7" autocomplete="off" value="7"> 7
                      </label>
                      <label class="btn bg-teal">
                        <input type="radio" name="smt" id="option_b8" autocomplete="off" value="8"> 8
                      </label>
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
</div>

<!-- Tampilan Modal Delete -->
<?php foreach ($matkul as $key => $value) { ?>
      <div class="modal fade" id="delete<?= $value['id_matkul'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus <?= $title ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus <b><?= $value['matkul'] ?> ?</b>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
              <a href="<?= base_url('matkul/delete/' . $prodi['id_prodi'] . '/' . $value['id_matkul']) ?>" class="btn btn-danger">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php } ?>


      <!-- /.modal -->







