<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0"><?= $title ?> 
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

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row "> 
      <div class="col-sm-12">
        <div class="card card-teal shadow-sm">
          <div class="card-header">
            <h3 class="card-title">Data <?=$title?> </h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#import">
                <i class="fas fa-download"></i> Import <?=$title?>
              </button>
            </div>

            <div class="card-tools">
            </div>
              <!-- /.card-tools -->
          </div>
            <!-- /.card-header -->
            
          <div class="card-body table-responsive">
              <table class="table table-head-fixed text-nowrap table-hover">              
                  <thead class="text-center">
                    <tr>
                      <th >No</th>
                      <th >Fakultas</th>
                      <th >Kode Prodi</th>
                      <th >Program Studi</th>
                      <th >Jenjang</th>
                      <th >Jadwal Kuliah</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                      <?php 
                        $no = 1;
                        foreach ($prodi as $key => $value) { 
                        
                      ?>

                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $value['fakultas'] ?></td>
                      <td><?= $value['kode_prodi'] ?></td>
                      <td><?= $value['prodi'] ?></td>
                      <td><?= $value['jenjang'] ?></td>
                      <td>
                          <a href="<?= base_url('jadwal/detail_jadwal/'. $value['id_prodi']) ?>" class="btn bg-teal btn-xs"><i class="fas fa-calendar-check"></i></a>
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
                echo form_open_multipart('matkul/upload');
              ?>
                <div class="form-group">
                  <label>Import File</label>
                  <input type="file" name="fileimport" class="form-control">
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool bg-success">
                    <a class="fas fa-download" href="<?php echo base_url()?>/assets/ImportMataKuliah.xlsx"> Download Template</a>    
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





