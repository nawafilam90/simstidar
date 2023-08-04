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
        <div class="row "> 
          <div class="col-sm-12">

              <!-- Tampil Biodata -->
              <div class="row">
                <div class="col-sm-12">

                    <!-- Biodata Mahasiswa -->
                    <div class="card card-success card-outline ">
                        <div class="row col-sm-12 card-body box-profile"> 
                            <div class="text-center col-sm-6 p-2">
                                <img class="img-thumbnail rounded" width="200" high="300" src="<?= base_url('foto/'. $mahasiswa['foto_user'])?>">
                                <div class="col-sm-12 text-center p-2">
                                    
                                    <button data-toggle="modal" data-target="#gantifoto<?= session()->get('id_user') ?>"class="btn bg-teal btn-xs" <?php if (session()->get('level') == "1") { ?> hidden <?php } else if (session()->get('level') == "2") { ?> hidden <?php } ?> ><i class="fas fa-edit mr-1"></i>Ganti Foto</button>
                                </div>
                            </div>
                            <div class=" col-sm-6 p-2">
                                <h3 class="profile-username text-center"><?= $mahasiswa['nama_mhs'] ?></h3>
                                <p class="text-muted text-center"><?= $mahasiswa['nim'] ?></p>
                                <p class="text-muted text-center"><?= $mahasiswa['prodi'] ?></p>
                                <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                <b>IPK</b> <a class="float-right">3,80</a>
                                </li>
                                <li class="list-group-item">
                                <b>SKS</b> <a class="float-right">543</a>
                                </li>
                                </ul>
                                
          <?php 
            echo form_open('Mahasiswa/Edit/' . $mahasiswa['id_mhs']);
          ?>
                        
                                <div class="col-sm-12 text-center p-2">
                                    <button id="edit" type="button" class="btn bg-teal btn-block btn-md"><i class="fas fa-edit mr-1"></i> Edit Biodata</button> 
                                    <button id="batal" type="button" class="btn btn-warning btn-md"><i class="fas fa-undo mr-1" ></i> Batal</button> 
                                    <button id="simpan" type="submit" class="btn btn-danger btn-md"><i class="fas fa-save mr-1"></i> Simpan</button> 
                                </div>
                            </div>
                        </div>

                    </div>                                

                    <div class="card card-defauld">
                        <div class="card-body">
                            
                            <!-- Stepper Edit Biodata -->
                            <div class="bs-stepper">
                                <div class="bs-stepper-header pb-3 pt-1" role="tablist">
            
                                    <div class="step" data-target="#biodata-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="biodata-part" id="biodata-part-trigger">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Biodata</span>
                                        </button>
                                    </div>
                                    
                                    <div class="line"></div>
                                        <div class="step" data-target="#orangtua-part">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="orangtua-part" id="orangtua-part-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Orang Tua</span>
                                            </button>
                                        </div>
                                        
                                    <div class="line"></div>
                                        <div class="step" data-target="#akademik-part">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="akademik-part" id="akademik-part-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Akademik</span>
                                            </button>
                                        </div>
                                </div>

                                    <div id="biodata" class="bs-stepper-content">
                                        <div id="biodata-part" class="content" role="tabpanel" aria-labelledby="biodata-part-trigger">

                                            <div class="row">
                                                
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal" >Nama Mahasiswa</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['nama_mhs'] ?></span>
                                                    <input name="nama_mhs" value="<?= $mahasiswa['nama_mhs'] ?>" class="form-control form-control-md" placeholder="Nama Mahasiswa" >
                                                  </div>
                                              </div>
                        
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal" >NIM</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['nim'] ?></span>
                                                    <input name="nim"  value="<?= $mahasiswa['nim'] ?>" class="form-control form-control-md" placeholder="NIM" <?php if(session()->get('level')== "4") {?>  readonly <?php }?>>
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal" >Jenis Kelamin</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?php if($mahasiswa['jk'] == 'L') {echo 'Laki-laki'; }else{echo 'Perempuan';}?></span>
                                                    <div class="form-control form-control-md">
                                                      <div class="icheck-success d-inline col-sm-3">
                                                        <input type="radio" name="jk" value="L" id="radioSuccess1" 
                                                        <?php if($mahasiswa['jk'] == 'L') { echo 'checked'; }?>>
                                                        <label for="radioSuccess1">Lak-Laki
                                                        </label class="col-sm-4 col-form-label bg-teal">
                                                      </div>
                                                      <div class="icheck-success d-inline col-sm-3">
                                                        <input type="radio" name="jk" value="P" id="radioSuccess2" 
                                                        <?php if($mahasiswa['jk'] == 'P') { echo 'checked'; }?>>
                                                        <label for="radioSuccess2">Perempuan
                                                        </label class="col-sm-4 col-form-label bg-teal">
                                                      </div>
                                                    </div>
                                                  </div>
                                              </div>

                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal" >NIK</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['nik'] ?></span>
                                                    <input name="nik"  value="<?= $mahasiswa['nik'] ?>" class="form-control form-control-md" placeholder="NIK" >
                                                  </div>
                                              </div>
                        
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal" >Tempat Lahir</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['tempat_lahir'] ?></span>
                                                    <input name="tempat_lahir" value="<?= $mahasiswa['tempat_lahir'] ?>" class="form-control form-control-md" placeholder="Tempat Lahir" >
                                                  </div>
                                              </div>

                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal" >Tanggal Lahir</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                      <div class="input-group">
                                                        <div class="input-group-prepend">
                                                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <div class="d-flex align-items-center pl-1">
                                                        <span class="form-tampil"><?= date('d-m-Y', strtotime($mahasiswa['tgl_lahir'])) ?></span>
                                                        </div>
                                                        <input id="datemask" name="tgl_lahir" type="text" value="<?= $mahasiswa['tgl_lahir'] ?>" class="form-control form-control-md" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                                                      </div>
                                                  </div>
                                              </div>
                        
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Nomor HP</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['no_hp'] ?></span>
                                                    <input name="no_hp"  value="<?= $mahasiswa['no_hp'] ?>" class="form-control form-control-md" placeholder="Nomor HP" >
                                                  </div>
                                              </div>
                        
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Email</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['email'] ?></span>
                                                    <input name="email"  value="<?= $mahasiswa['email'] ?>" class="form-control form-control-md" placeholder="Email" >
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Alamat</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['alamat'] ?></span>
                                                    <input name="alamat"  value="<?= $mahasiswa['alamat'] ?>" class="form-control form-control-md" placeholder="Alamat" >
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">RT/RW</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['rt_rw'] ?></span>
                                                    <input name="rt_rw"  value="<?= $mahasiswa['rt_rw'] ?>" class="form-control form-control-md" placeholder="RT/RW" >
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Provinsi</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['provinsi'] ?></span>
                                                    <input name="provinsi"  value="<?= $mahasiswa['provinsi'] ?>" class="form-control form-control-md" placeholder="Provinsi">
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Kabupaten</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['kabupaten'] ?></span>
                                                    <input name="kabupaten"  value="<?= $mahasiswa['kabupaten'] ?>" class="form-control form-control-md" placeholder="Kabupaten" >
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Kecamatan</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['kecamatan'] ?></span>
                                                    <input name="kecamatan"  value="<?= $mahasiswa['kecamatan'] ?>" class="form-control form-control-md" placeholder="Kecamatan" >
                                                 </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Kelurahan</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['kelurahan'] ?></span>
                                                    <input name="kelurahan"  value="<?= $mahasiswa['kelurahan'] ?>" class="form-control form-control-md" placeholder="Kelurahan">
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group col-sm-12 text-center p-3">
                                                <button type="button" class="btn bg-teal" onclick="stepper.next()">Lanjut <i class="fas fa-share mr-1"></i> </button>
                                              </div>
                                            </div>
                                            
                                        </div>
                                    
                                        <div id="orangtua-part" class="content" role="tabpanel" aria-labelledby="orangtua-part-trigger">
                                            <div class="row">

                                              <div class="form-group row col-sm-12">
                                                <h6>Data Ayah</h6>
                                                <div class="line line-strong bg-teal mr-1"></div>
                                              </div>

                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Nama Ayah</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['nama_ayah'] ?></span>
                                                    <input name="nama_ayah"  value="<?= $mahasiswa['nama_ayah'] ?>" class="form-control form-control-md" placeholder="Nama Ayah" >
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Alamat Ayah</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['alamat_ayah'] ?></span>
                                                    <input name="alamat_ayah"  value="<?= $mahasiswa['alamat_ayah'] ?>" class="form-control form-control-md" placeholder="Alamat Ayah" >
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Pendidikan Ayah</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['pendidikan_ayah'] ?></span>
                                                    <input name="pendidikan_ayah"  value="<?= $mahasiswa['pendidikan_ayah'] ?>" class="form-control form-control-md" placeholder="Pendidikan Ayah" >
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Pekerjaan Ayah</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['pekerjaan_ayah'] ?></span>
                                                    <input name="pekerjaan_ayah"  value="<?= $mahasiswa['pekerjaan_ayah'] ?>" class="form-control form-control-md" placeholder="Pekerjaan Ayah" >
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Penghasilan Ayah</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['penghasilan_ayah'] ?></span>
                                                    <input name="penghasilan_ayah"  value="<?= $mahasiswa['penghasilan_ayah'] ?>" class="form-control form-control-md" placeholder="Penghasilan Ayah" >
                                                  </div>
                                              </div>

                                              <div class="form-group row col-sm-6">
                                              </div>
                                              
                                              <div class="form-group row col-sm-12">
                                                <h6>Data Ibu</h6>
                                                <div class="line line-strong bg-teal mr-1"></div>
                                              </div>

                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Nama Ibu</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['nama_ibu'] ?></span>
                                                    <input name="nama_ibu"  value="<?= $mahasiswa['nama_ibu'] ?>" class="form-control form-control-md" placeholder="Nama Ibu" >
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Alamat Ibu</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['alamat_ibu'] ?></span>
                                                    <input name="alamat_ibu" value="<?= $mahasiswa['alamat_ibu'] ?>" class="form-control form-control-md" placeholder="Alamat Ibu" >
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Pendidikan Ibu</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['pendidikan_ibu'] ?></span>
                                                    <input name="pendidikan_ibu"  value="<?= $mahasiswa['pendidikan_ibu'] ?>" class="form-control form-control-md" placeholder="Pendidikan Ibu" >
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Pekerjaan Ibu</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['pekerjaan_ibu'] ?></span>
                                                    <input name="pekerjaan_ibu"  value="<?= $mahasiswa['pekerjaan_ibu'] ?>" class="form-control form-control-md" placeholder="Pekerjaan Ibu" >
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Penghasilan Ibu</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['penghasilan_ibu'] ?></span>
                                                    <input name="penghasilan_ibu"  value="<?= $mahasiswa['penghasilan_ibu'] ?>" class="form-control form-control-md" placeholder="Penghasilan Ibu" >
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                              </div>
                                              
                                              <div class="form-group col-sm-12 text-center p-3">
                                                <button type="button" class="btn bg-teal" onclick="stepper.previous()"><i class="fas fa-reply mr-1"></i> Kembali</button>
                                                <button type="button" class="btn bg-teal" onclick="stepper.next()">Lanjut <i class="fas fa-share mr-1"></i></button>
                                              </div>
                                              
                                            </div>
                                        </div>

                                        <div id="akademik-part" class="content" role="tabpanel" aria-labelledby="akademik-part-trigger">
                                            <div class="row">
                                                
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Program Studi</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['kode_prodi'] ?> - <?= $mahasiswa['prodi'] ?></span>
                                                    <select name="id_prodi"   class="form-control form-control-md" placeholder="Program Studi" >
                                                        <option class="bg-teal" value="<?= $mahasiswa['id_prodi'] ?>"><?= $mahasiswa['kode_prodi'] ?> - <?= $mahasiswa['prodi'] ?></option>
                                                        <option value="1">PMI - Pengembangan Masyarakat Islam</option>
                                                        <option value="2">BKI - Bimbingan dan Konseling Islam</option>
                                                    </select>
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row col-sm-6">
                                                <label class="col-sm-4 col-form-label bg-teal">Tahun Masuk</label class="col-sm-4 col-form-label bg-teal">
                                                  <div class="d-flex align-items-center col-sm-8 p-1">
                                                    <span class="form-tampil"><?= $mahasiswa['angkatan'] ?></span>
                                                    <input name="angkatan"  value="<?= $mahasiswa['angkatan'] ?>" class="form-control form-control-md" placeholder="Tahun Masuk" >
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group col-sm-12 text-center p-3">
                                                <button type="button" class="btn bg-teal" onclick="stepper.previous()"><i class="fas fa-reply mr-1"></i> Kembali</button>
                                                <button id="simpan1" type="submit" class="btn btn-danger"><i class="fas fa-save mr-1"></i> Simpan</button>
                                              </div>
                                              
                                            </div>
                                        </div>
                                        
                                    </div>

                            </div>
                            <!-- /Stepper Edit Biodata -->
                            
            <?php echo form_close() ?>
            
                        <!-- /Biodata Mahasiswa -->

                        </div>
                        <!-- /card body -->
                    </div>

                 </div>
               </div>
               <!-- /Tampil Biodata -->
               
        </div>
      </div>
    </div>
  </div>
  
  
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
                echo form_open_multipart('User/mhs_gantifoto/'. $mahasiswa['id_user']);
              ?>
                <div class="form-group text-center">
                  <img src="<?= base_url('foto/' . session()->get('foto_user'))?>" id="" class="img-thumbnail rounded gambar_load" width="200" high="300" alt="User Image">
                </div>
                <div class="form-group">
                    <h3 class="profile-username text-center"><?= $mahasiswa['nama_mhs'] ?></h3>
                </div>
                
              <div class="form-group">
                  <!-- <label>Username</label> -->
                  <input name="username" value="<?= $mahasiswa['username'] ?>" class="form-control" placeholder="Usernamer" hidden>
              </div>
              <div class="form-group">
                  <!-- <label>Password</label> -->
                  <input name="password" value="<?= $mahasiswa['password'] ?>" class="form-control" placeholder="Password" hidden>
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
  
  

</div>
<!-- Content Wrapper. Contains page content -->




