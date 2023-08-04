<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
          <h1 class="text-teal">
            <a href="<?= base_url('nilai')?>"><?= $title ?></a>
          </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<!-- Main content -->

<div class="content">
  <div class="container-fluid">
    <div class="row "> 
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body p-2">
            <table >
              <tr>
                <th width="140px">Mata Kuliah</th>
                <td width="20px">:</td>
                <td><?= $kelas['matkul'] ?></td>
              </tr>
              <tr>
                <th width="140px">Program Studi</th>
                <td width="20px">:</td>
                <td><?= $kelas['prodi'] ?> ( <?= $kelas['kode_prodi'] ?> )</td>
              </tr>
              <tr>
                <th >Periode</th>
                <td>:</td>
                <td><?= $kelas['ta'] ?> <?= $kelas['semester'] ?></td>
              </tr>
              <tr>
                <th>Jumlah Anggota</th>
                <td>:</td>
                <td><?=$jml?></td>
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
            <h3 class="card-title">Anggota Kelas</h3>

            <div class="card-tools">
            <?=
            form_open('nilai/input_nilai/'.$kelas['id_kelas']);
            ?>
            <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-save"></i> Simpan Nilai</button>
            </div>
              <!-- /.card-tools -->
          </div>
            <!-- /.card-header -->

            <div class="card-body table-responsive">
              <table class="table table-bordered table-striped table-sm ">              
                    <tr class="bg-teal text-center">
                      <th rowspan="2" class="align-middle">No</th>
                      <th rowspan="2" class="align-middle">NIM</th>
                      <th rowspan="2" class="align-middle">Mahasiswa</th>
                      <th colspan="7" class="align-middle">Nilai</th>
                    </tr>
                    <tr class="bg-teal text-center">
                      <td class="align-middle" width="70px">Presensi (15%)</td>
                      <td class="align-middle" width="70px">Tugas (15%)</td>
                      <td class="align-middle" width="70px" >UTS (30%)</td>
                      <td class="align-middle" width="70px">UAS (40%)</td>
                      <td class="align-middle" width="70px">Akhir</td>
                      <td class="align-middle" width="70px">Indeks</td>
                      <td class="align-middle" width="70px">Huruf</td>
                    </tr>
                  <?php $no = 1;
                    foreach ($anggotakelas as $key => $value) { 
                      echo form_hidden ($value['id_anggota_kelas'] . 'id_anggota_kelas', $value['id_anggota_kelas']);
                      ?>

                    <tr>
                        <td class="text-center align-middle"><?= $no++; ?></td>
                        <td class="align-middle"><?= $value['nim'] ?></td>
                        <td class="align-middle"><?= $value['nama_mhs'] ?></td>
                        <td class="text-center align-middle">
                        <?php 
                            $pertemuan = $value['jml_pertemuan'] * 2;
                            if ( $pertemuan !== 0) {
                              $presensi = ($value['p1'] + 
                                          $value['p2'] + 
                                          $value['p3'] + 
                                          $value['p4'] + 
                                          $value['p5'] + 
                                          $value['p6'] + 
                                          $value['p7'] + 
                                          $value['p8'] + 
                                          $value['p9'] + 
                                          $value['p10'] + 
                                          $value['p11'] + 
                                          $value['p12'] + 
                                          $value['p13'] + 
                                          $value['p14']) / $pertemuan * 100;
                                          echo number_format($presensi, 0);
                            } ?> 
                            <input name="<?= $value['id_anggota_kelas'] ?>presensi" value="<?= $presensi?>" hidden>                          
                        </td>
                        <td class="text-center align-middle" ><input name="<?= $value['id_anggota_kelas'] ?>tugas" value="<?= $value['nilai_tugas']?>" class="form-control form-control-sm text-center" ></td>
                        <td class="text-center align-middle" ><input name="<?= $value['id_anggota_kelas'] ?>uts" value="<?= $value['nilai_uts']?>" class="form-control form-control-sm text-center" ></td>
                        <td class="text-center align-middle" ><input name="<?= $value['id_anggota_kelas'] ?>uas" value="<?= $value['nilai_uas']?>" class="form-control form-control-sm text-center" ></td>
                        <td class="text-center align-middle" ><?= $value['nilai_akhir']?></td>
                        <td class="text-center align-middle" ><?= $value['nilai_bobot']?></td>
                        <td class="text-center align-middle" ><?= $value['nilai_huruf']?></td>
                        
                    </tr>

                    <?php } ?>
                    <?= form_close() ?>

              </table>
          </div>
            <!-- /.card-body -->
          
        </div>
          <!-- /.card -->
      </div>
    </div>
  </div>
</div>
