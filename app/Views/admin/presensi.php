<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              <?= $title ?>
              <small> : <?= $ta_aktif['ta']?>-<?= $ta_aktif['semester']?></small>
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

<!-- Filter Tabel -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <?= form_open('presensi/filterkelas', ['target' => '_blank'])?>
        <div class="form-group col-sm-12">
          <label> Filter Berdasarkan (Prodi dan Angkatan) </label>
        </div>
        <div class="form-group col-sm-12">
          <div class="btn-group btn-group-toggle btn-xs" data-toggle="buttons">
            <?php foreach ($prodi as $key => $value) { ?>
              <label class="btn bg-teal">
                <input type="radio" name="prodi" id="prodi" autocomplete="off" value="<?=$value['id_prodi']?>" required> <?=$value['kode_prodi']?>
              </label>
            <?php }?>
          </div>   
          <div class="btn-group btn-group-toggle btn-xs" data-toggle="buttons"> 
            <?php for ($i = date('Y'); $i >= date('Y') - 6; $i--) { ?>
              <label class="btn bg-teal"> 
                <input type="radio" name="angkatan" id="angkatan" autocomplete="off" value="<?=$i?>" required> <?=$i?>
              </label>
            <?php }?>
          </div>
            <button type="submit" class="btn btn-warning "><i class="fas fa-filter"></i> Filter</button>
        </div>
      <?= form_close()?>
    </div>
  </div>
</div>

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row "> 
      <div class="col-sm-12">
        <div class="card card-teal shadow-sm">
          <div class="card-header">
            <h3 class="card-title"><?=$title?></h3>
          </div>
            <!-- /.card-header -->
           
          <div class="card-body table-responsive">
              <table id="example1"class="table table-hover table-sm sticky-table-headers__sticky">              
                  <thead>
                    <tr >
                      <th >No</th>
                      <th >Periode</th>
                      <th >Prodi</th>
                      <th >Kelas</th>
                      <th >Mata Kuliah</th>
                      <th >Dosen</th>
                      <th class="text-center">Presensi</th>
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
                        <?php if($ta_aktif['id_ta']==$value['id_ta']) { ?>
                          <tr >
                            <td><?= $no++; ?></td>
                            <td><?= $value['ta'] ?> <?= $value['semester'] ?></td>
                            <td><?= $value['kode_prodi'] ?></td>
                            <td><?= $value['nama_kelas'] ?></td>
                            <td><?= $value['matkul'] ?></td>
                            <td><?= $value['nama_dosen'] ?></td>
                            <td class="text-center"><p class="loat-right badge bg-warning"><?= $jml ?></p>
                            <a href="<?= base_url('presensi/presensi_kelas/' . $value['id_kelas']) ?>" class="loat-right badge bg-teal">Mahasiswa</a>
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


 