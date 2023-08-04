<!-- ----------------- Dashboard untuk ADMIN ------------------ -->

<?php if (session()->get('level') == 1) { ?>
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
    <section class="content">
      <div class="container-fluid"> 
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $jml_prodi ?></h3>

                <p>Program Studi</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-address-book"></i>
              </div>
              <a href="<?= base_url('Prodi')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $jml_mhs ?> </h3>

                <p>Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="fas fas fa-solid fa-users"></i>
              </div>
              <a href="<?= base_url('Mahasiswa')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $jml_dsn ?></h3>

                <p>Dosen</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-user-graduate"></i>
              </div>
              <a href="<?= base_url('Dosen')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $jml_user ?></h3>
                <!-- <sup style="font-size: 20px">%</sup> -->
                <p>User</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-user"></i>
              </div>
              <a href="<?= base_url('User')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



<!-- ----------------- Dashboard untuk TENDIK ------------------ -->

<?php } elseif (session()->get('level') == 2) {?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tendik</h1>
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
<section class="content">
      <div class="container-fluid"> 
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $jml_prodi ?></h3>

                <p>Program Studi</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-address-book"></i>
              </div>
              <a href="<?= base_url('Prodi')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $jml_mhs ?> </h3>

                <p>Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="fas fas fa-solid fa-users"></i>
              </div>
              <a href="<?= base_url('Mahasiswa')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $jml_dsn ?></h3>

                <p>Dosen</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-user-graduate"></i>
              </div>
              <a href="<?= base_url('Dosen')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $jml_user ?></h3>
                <!-- <sup style="font-size: 20px">%</sup> -->
                <p>User</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-user"></i>
              </div>
              <a href="<?= base_url('User')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<!-- ----------------- Dashboard untuk DOSEN ------------------ -->

<?php } elseif (session()->get('level') == 3) {?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dosen</h1>
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
<section class="content">
      <div class="container-fluid"> 
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $jml_prodi ?></h3>

                <p>Program Studi</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-address-book"></i>
              </div>
              <a href="<?= base_url('Prodi')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $jml_mhs ?> </h3>

                <p>Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="fas fas fa-solid fa-users"></i>
              </div>
              <a href="<?= base_url('Mahasiswa')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $jml_dsn ?></h3>

                <p>Dosen</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-user-graduate"></i>
              </div>
              <a href="<?= base_url('Dosen')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $jml_user ?></h3>
                <!-- <sup style="font-size: 20px">%</sup> -->
                <p>User</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-user"></i>
              </div>
              <a href="<?= base_url('User')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<!-- ----------------- Dashboard untuk MAHASISWA ------------------ -->

<?php } elseif (session()->get('level') == 4) {?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mahasiswa</h1>
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
    <section class="content">
      <div class="container-fluid"> 
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>50</h3>

                <p>KRS</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>SKS</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>KHS</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Transkrip Nilai</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

 
        <!-- Card Rekap IPK -->
        <div class="col-md-6">
          <div class="card card-teal">
            <div class="card-header">
              <h3 class="card-title">Rekap IPK Mahasiswa</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="ipk" width="100%" height="40%"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- /Card Rekap IPK -->



        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
        



        
<?php }?>


<!-- ChartJS -->
<script src="<?php echo base_url() ?>/template/plugins/chart.js/Chart.min.js"></script>

<script>
var ctx = document.getElementById('ipk');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Smt 1', 'Smt 2', 'Smt 3', 'Smt-4', 'Smt-5', 'Smt-6' , 'Smt-7' , 'Smt-8'],
        datasets: [{
            label: 'Rekap IPK',
            data: [1, 1.5, 2, 2.5, 3, 3.5, 4, 4],
            backgroundColor: [
                'rgba(0, 128, 128, 0)',
            ],
            borderColor: [
                'rgba(0, 128, 128, 1)',
                'rgba(0, 128, 128, 1)',
                'rgba(0, 128, 128, 1)',
                'rgba(0, 128, 128, 1)',
                'rgba(0, 128, 128, 1)',
                'rgba(0, 128, 128, 1)',
                'rgba(0, 128, 128, 1)',
                'rgba(0, 128, 128, 1)'
            ],
            borderWidth: 3
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
