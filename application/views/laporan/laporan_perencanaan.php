<?php
$this->load->view('_partials/header');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('_partials/topbar');
$this->load->view('_partials/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  Laporan
  <small>Sewa</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Laporan</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
<div class="box">
  <form method="post" action="<?php echo base_url('laporan/proses_sewa') ?>">
    <div class="panel-body">
   <div class="col-md-6">
    <div class="form-group">
        <label class="col-lg-4 control-label">Start Date</label>
        <div class="col-lg-7">
      <input type="text" class="form-control tgl" id="startdate" name="startdate" required>
    </div>
    </div>
     </div>
   <div class="col-md-6">
    <div class="form-group">    
    <label class="col-lg-4 control-label">End Date</label>
        <div class="col-lg-7">
      <input type="text" class="form-control tgl1" id="enddate" name="enddate" required>
    </div>
    </div>
     </div>
  </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    
  </form>
</div>
  </section><!-- /.content -->
  <?php
  $this->load->view('_partials/js');
  ?>
  <!--tambahkan custom js disini-->
  <?php
  $this->load->view('_partials/footer');
  ?>