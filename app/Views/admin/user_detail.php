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

          
                    <div class="card card-success card-outline ">
                        <div class="row col-sm-12 card-body box-profile"> 
                            <div class="text-center col-sm-6 p-2">
                                <img class="img-thumbnail rounded" width="200" high="300" src="<?= base_url('foto/'. $user['foto_user'])?>">
                                <div class="col-sm-12 text-center p-2">
                                    <button data-toggle="modal" data-target="#gantifoto<?= session()->get('id_user') ?>"class="btn bg-teal btn-xs"><i class="fas fa-edit mr-1"></i>Ganti Foto</button>
                                </div>
                            </div>
                            <div class=" col-sm-6 p-2">
                              <?php 
                                echo form_open_multipart('User/mhs_edituser/'. $user['id_user']);
                              ?>
                                <h3 class="profile-username text-center"><?= $user['nama_user'] ?></h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                <b>Level User</b> <a class="float-right"><?php if($user['level'] == "3") { ?> Dosen <?php } else if ($user['level'] == "4") { ?> Mahasiswa <?php }?> </a>
                                </li>
                                <li class="list-group-item">
                                <b>Username</b> <a class="float-right"><?= $user['username'] ?></a>
                                <input name="username" value="<?= $user['username'] ?>" class="form-control" placeholder="Usernamer" hidden>
                                <input type="file" name="foto_user" id="" class="form-control preview_gambar" hidden>
                                </li>
                                <li class="list-group-item">
                                <b>Password</b> <a class="float-right form-tampil"> <?= $user['password'] ?></a>
                                <a class="float-right">
                                    <input name="password" type="password" class="form-control form-control-md" placeholder="Password">
                                </a>

                                </li>
                                </ul>
                                
                                <div class="col-sm-12 text-center p-2">
                                    <button id="edit" type="button" class="btn bg-teal btn-block btn-md"><i class="fas fa-edit mr-1"></i>Ganti Password</button> 
                                    <button id="batal" type="button" class="btn btn-warning btn-md"><i class="fas fa-undo mr-1" ></i> Batal</button> 
                                    <button id="simpan" type="submit" class="btn btn-danger btn-md"><i class="fas fa-save mr-1"></i> Simpan</button> 
                                </div>
                            <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>


<!-- Tampilan Modal Edit -->
      <div class="modal fade" id="editakun<?= session()->get('id_user') ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
                echo form_open_multipart('User/mhs_edituser/'. $user['id_user']);
              ?>
                <div class="form-group text-center">
                  <img src="<?= base_url('foto/' . session()->get('foto_user'))?>" id="" class="img-thumbnail rounded gambar_load" width="200" high="300" alt="User Image">
                </div>
                <div class="form-group">
                    <h3 class="profile-username text-center"><?= $user['nama_user'] ?></h3>
                </div>
                
              <div class="form-group">
                  <!-- <label>Username</label> -->
                  <input name="username" value="<?= $user['username'] ?>" class="form-control" placeholder="Usernamer" hidden>
              </div>
              <div class="form-group">
                  <label>Password</label> 
                  <input name="password" value="<?= $user['password'] ?>" class="form-control" placeholder="Password">
              </div>
              
                <div class="form-group">
                  <!-- <label>Pilih Foto</label> -->
                  <input type="file" name="foto_user" id="" class="form-control preview_gambar" hidden>
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


<!-- Tampilan Modal Ganti Foto -->
      <div class="modal fade" id="gantifoto<?= session()->get('id_user') ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ganti Foto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
                echo form_open_multipart('User/mhs_edituser/'. $user['id_user']);
              ?>
                <div class="form-group text-center">
                  <img src="<?= base_url('foto/' . session()->get('foto_user'))?>" id="" class="img-thumbnail rounded gambar_load" width="200" high="300" alt="User Image">
                </div>
                <div class="form-group">
                    <h3 class="profile-username text-center"><?= $user['nama_mhs'] ?></h3>
                </div>
                
              <div class="form-group">
                  <!-- <label>Username</label> -->
                  <input name="username" value="<?= $user['username'] ?>" class="form-control" placeholder="Usernamer" hidden>
              </div>
              <div class="form-group">
                  <!-- <label>Password</label> -->
                  <input name="password" value="<?= $user['password'] ?>" class="form-control" placeholder="Password" hidden>
              </div>
              
                <div class="form-group">
                  <label>Pilih Foto</label>
                  <input type="file" name="foto_user" id="" class="form-control preview_gambar">
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

