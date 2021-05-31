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
  Form Tambah Jenis Asset
  <small>Master Data</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Master Data</a></li>
    <li class="active">Jenis</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
<div class="box">
  <form method="post" action="<?php echo base_url('jenis/tambah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Jenis Asset</label>
        <td><input type="text" name='id_jenis_asset' class="form-control" value="<?= $kodeunik; ?>" readonly></td>
      </div>
      
    
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Jenis</label>
        <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" placeholder="">
      </div>
      
      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('jenis') ?>" class="btn btn-danger">Cancel </a>
    </div>
    
  </form>
<div class="box">
  </section><!-- /.content -->
  <?php
  $this->load->view('_partials/js');
  ?>
  <!--tambahkan custom js disini-->
  <?php
  $this->load->view('_partials/footer');
  ?>