</div>
<!-- /.content-wrapper -->



  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="<?php echo base_url() ?>">STIDAR Sumenep</a>.</strong>
    All rights reserved.
    
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>/template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>/template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>/template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url() ?>/template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>/template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>/template/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url() ?>/template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<!-- <script src="<?php echo base_url() ?>/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>-->
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>/template/dist/js/adminlte.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo base_url() ?>/template/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>/template/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url() ?>/template/plugins/toastr/toastr.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>/template/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Ion Slider -->
<script src="<?php echo base_url() ?>/template/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>/template/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>/template/plugins/chart.js/Chart.bundle.min.js"></script>

<script>
// Tabel
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": true, 
      "autoWidth": false,
      "searching": true,
      //"buttons": ["excel", "pdf", "print",]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
// Menampilkan Gambar di Form Input
  function bacaGambar(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
          $('#gambar_load').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('#preview_gambar').change(function () {
      bacaGambar(this);
 
  })
  
//untuk edit   
  function bacaGambaredit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
          $('.gambar_load').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('.preview_gambar').change(function () {
      bacaGambaredit(this);

  })

</script>

<script>
// BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>

<script>
//Datemask yyyy/mm/dd
    $('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
</script>

<script>
//Toastr
  <?php if(session()->getFlashdata('error')): ?>
    toastr.error("<?= session()->getFlashdata('error'); ?>");
  <?php endif ?>
  <?php if(session()->getFlashdata('sukses')): ?>
    toastr.success("<?= session()->getFlashdata('sukses'); ?>");
  <?php endif ?>
</script>

<script>
  //Tambah Anggota Kelas
  $(document).ready(function() {
    $('#centangSemua').click(function(e) {
      if ($(this).is(':checked')) {
        $('.centangNomhs').prop('checked', true);
      } else {
        $('.centangNomhs').prop('checked', false);
      }
    });

  //Delete Anggota Kelas
    $('#centangSemuaDelet').click(function(e) {
      if ($(this).is(':checked')) {
        $('.centangmhs').prop('checked', true);
      } else {
        $('.centangmhs').prop('checked', false);
      }
    }); 


  });
</script>

<script>
//Tambah Jadwal
  $(document).ready(function() {
    $(document).on('click', '#select', function() {
      var $id_kelas = $(this).data('id_kelas');
      var $id_matkul = $(this).data('id_matkul');
      var $id_dosen = $(this).data('id_dosen');
      var $id_ta = $(this).data('id_ta');
      var $angkatan = $(this).data('angkatan');
      $('#id_kelas').val($id_kelas);
      $('#id_matkul').val($id_matkul);
      $('#id_dosen').val($id_dosen);
      $('#id_ta').val($id_ta);
      $('#angkatan').val($angkatan);

    })
  })
</script>

<script>
//Ion Slider
$(function () {
 $('#jml_pertemuan').ionRangeSlider({
      min     : 1,
      max     : 14,
      type    : 'single',
      step    : 1,
      postfix : ' Pertemuan',
      prettify: true,
      hasGrid : true
 })
})
</script>

<script>
//Tombol Edit Biodata Mahasiswa
  $(document).ready(function() {
    $('#simpan').hide();
    $('#simpan1').hide();
    $('#batal').hide();
    $('.form-control-md').hide();

    })
    

    $('#edit').click(function() {
    $('#simpan').show();
    $('#simpan1').show();
    $('#batal').show();
    $('#edit').hide();
    $('.form-control-md').show();
    $('.form-tampil').hide();

    })
    
    
    $('#batal').click(function() {
    $('#simpan').hide();
    $('#simpan1').hide();
    $('#batal').hide();
    $('#edit').show();
    $('.form-control-md').hide();
    $('.form-tampil').show();

    })
    
</script>



</body>
</html>
