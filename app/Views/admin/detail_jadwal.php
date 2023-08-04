<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 
            class="m-0">
            <a href="<?= base_url('jadwal')?>"><?= $title ?></a>
            <small>Tahun Akademik : <?= $ta_aktif['ta']?>-<?= $ta_aktif['semester']?></small>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
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
                <th width="130px">Program Studi</th>
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
              <tr>
                <th>Tahun Akademik</th>
                <td>:</td>
                <td><?= $ta_aktif['ta']?>-<?= $ta_aktif['semester']?></td>
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
                <i class="fas fa-plus"></i> Tambah Jadwal Kuliah
              </button>
            </div>
              <!-- /.card-tools -->
          </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table class="table table-head-fixed text-nowrap table-hover table-sm">              
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th >Smt</th>
                      <th >kelas</th>
                      <th >Hari</th>
                      <th >Waktu</th>
                      <th >Kode Matkul</th>
                      <th >Mata Kuliah</th>
                      <th >SKS</th>
                      <th >Dosen</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; 
                      foreach ($jadwal as $key => $value) { ?>
                        <?php if($ta_aktif['id_ta']==$value['id_ta']) { ?>
                          <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $value['smt'] ?></td>
                            <td><?= $value['nama_kelas'] ?></td>
                            <td><?= $value['hari'] ?></td>
                            <td><?= $value['waktu'] ?></td>
                            <td><?= $value['kode_matkul'] ?></td>
                            <td><?= $value['matkul'] ?></td>
                            <td><?= $value['sks'] ?></td>
                            <td><?= $value['nama_dosen'] ?></td>
                            <td class="text-center"> 
                              <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_jadwal'] ?>"><i class="fas fa-edit"></i></button>
                              <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_jadwal'] ?>"><i class="fas fa-trash"></i></button>
                            </td>
                          </tr>
                        <?php } ?>
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
              <h4 class="modal-title">Tambah <?= $title ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <?php 
                 echo form_open('jadwal/add/'.$prodi['id_prodi']);
            ?>

              <table id="example1" class="table table-striped table-hover table-responsive table-sm">              
                  <thead>
                    <tr>
                      <th >NO</th>
                      <th >Tambah</th>
                      <th >Kelas</th>
                      <th width="250px">Mata Kuliah</th>
                      <th width="150px">Dosen Pengampu</th>
                      <th >Angkatan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                      foreach ($kelas as $key => $data) { ?>
                      <?php if($ta_aktif['id_ta']==$data['id_ta']) { ?>

                          <tr >
                          <td><?= $no++; ?></td>
                          <td>
                              <button id="select" class="btn btn-success btn-xs" 
                              data-id_kelas = "<?= $data['id_kelas'] ?>"
                              data-id_matkul = "<?= $data['id_matkul'] ?>"
                              data-id_dosen = "<?= $data['id_dosen'] ?>"
                              data-id_ta = "<?= $data['id_ta'] ?>"
                              data-angkatan = "<?= $data['angkatan'] ?>"                      
                              ><i class="fas fa-plus"></i></button>
                            </td>
                            <td><?= $data['nama_kelas'] ?></td>
                            <td><?= $data['matkul'] ?></td>
                            <td><?= $data['nama_dosen'] ?></td>
                            <td><?= $data['angkatan'] ?></td>
                          </tr>
                      <?php } ?>
                    <?php } ?>
                  </tbody>
              </table>

            <div class="form-group" hidden>
              <label>Kelas</label>
              <input name="id_kelas" id="id_kelas" class="form-control"  required>
            </div>
            <div class="form-group" hidden>
              <label>Matkul</label>
              <input name="id_matkul" id="id_matkul" class="form-control"  required>
            </div>
            <div class="form-group" hidden>
              <label>Dosen</label>
              <input name="id_dosen" id="id_dosen" class="form-control"  required>
            </div>
            <div class="form-group" hidden>
              <label>Tahun Akademik</label>
              <input name="id_ta" id="id_ta" class="form-control"  required>
            </div>
            <div class="form-group" hidden>
              <label>Angkatan</label>
              <input name="angkatan" id="angkatan" class="form-control"  required>
            </div>
            
            </div>
            <?php echo form_close() ?>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>


<!-- Tampilan Modal Edit -->
<?php foreach ($jadwal as $key => $value) { ?>
      <div class="modal fade" id="edit<?= $value['id_jadwal'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit <?= $title ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
                echo form_open('jadwal/edit/'. $prodi['id_prodi'] . '/' . $value['id_jadwal']);
              ?>
              <div class="row container-fluid mb-3">
                <table>
                  <tr>
                    <th width="130px">Kelas</th>
                    <td width="20px">:</td>
                    <td><?= $value['nama_kelas'] ?></td>
                  </tr>
                  <tr>
                    <th >Mata Kuliah</th>
                    <td>:</td>
                    <td><?= $value['matkul'] ?></td>
                  </tr>
                  <tr>
                    <th>Dosen</th>
                    <td>:</td>
                    <td><?= $value['nama_dosen'] ?></td>
                  </tr>
                </table>
              </div>

              <div class="row">
                <div class="form-group col-sm-6">
                  <label>Hari</label>
                  <select name="hari" id="hari" class="form-control">
                    <option class="bg-success" value="<?= $value['hari'] ?>">
                      <?php if ($value['hari'] === NULL) { ?>Pilih Hari
                      <?php } else { ?><?= $value['hari'] ?><?php } ?>
                    </option>
                    <option value="Ahad">Ahad</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jum'at">Jum'at</option>
                    <option value="Sabtu">Sabtu</option>
                  </select>            
                </div>
                <div class="form-group col-sm-6">
                  <label>Waktu</label>
                  <select name="waktu" id="waktu" class="form-control">
                    <option class="bg-success" value="<?= $value['waktu'] ?>">
                      <?php if ($value['waktu'] === NULL) { ?>Pilih waktu
                      <?php } else { ?><?= $value['waktu'] ?><?php } ?>
                    </option>
                    <option value="07.30-09.00">Jam 1 (07.30-09.00)</option>
                    <option value="09.30-11.00">Jam 2 (09.30-11.00)</option>
                    <option value="13.30-15.00">Jam 3 (13.30-15.00)</option>
                    <option value="15.30-17.00">Jam 4 (15.30-17.00)</option>
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
<?php foreach ($jadwal as $key => $value) { ?>
      <div class="modal fade" id="delete<?= $value['id_jadwal'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus <?= $title ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus <b><?= $value['matkul'] ?> - <?= $value['nama_dosen'] ?></b> dari jadwal?

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
              <a href="<?= base_url('jadwal/delete/' . $prodi['id_prodi'] . '/' . $value['id_jadwal']) ?>" class="btn btn-danger">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php } ?>


      <!-- /.modal -->


