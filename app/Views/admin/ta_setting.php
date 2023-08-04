<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengaturan <?= $title ?></h1>
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
          </div>
            <!-- /.card-header -->
            
            <div class="card-body table-responsive">
              <table id="example1" class="table table-head-fixed text-nowrap table-hover">              
              <thead>
                    <tr class="text-center">
                      <th width="10px">No</th>
                      <th >Tahun Akademik</th>
                      <th >Semester</th>
                      <th >Status</th>
                      <th >Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1;
                      foreach ($ta as $key => $value) { ?>

                    <tr class="text-center">
                      <td ><?= $no++; ?></td>
                      <td><?= $value['ta'] ?></td>
                      <td><?= $value['semester'] ?></td>
                      <td >
                        <?php if ($value['status'] == 0) {
                          echo '<p class="loat-right badge bg-pink">Tidak Aktif</p>';
                        } else {
                          echo '<p class="loat-right badge bg-teal">Aktif</p>';
                        }
                        ?>  
                      </td>
                      <td >
                      <?php if ($value['status'] == 0) { ?>
                      <a href="<?= base_url('TA/set_status_ta/' . $value['id_ta']) ?>" class="btn bg-teal btn-xs"><i class="fas fa-edit"> Aktifkan</i></a>
                      <?php }?>  
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

</div>

