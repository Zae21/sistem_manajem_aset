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
  Tambah Data
  <small>User</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">User</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
<div class="box">
  <form method="post" action="<?php echo base_url('auth/tambah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="" required>
      </div>
	  <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="" required>
      </div>
	  <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="">
      </div>
	  <div class="form-group">
        <label for="exampleInputEmail1">Telp</label>
        <input type="text" class="form-control" id="telp" name="telp" placeholder="">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Hak Akses</label>
          <select name="hakses" class="form-control" id="hakses" required>
            <option value="">Pilih Hak Akses</option>
            <option value="Admin">Admin</option>
            <option value="Manajer">Manajer</option>
            <option value="Pegawai">Pegawai</option>         
          </select>
      </div>
	  <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
          <select name="status" class="form-control" id="status" required>
            <option value="">Pilih Status</option>
            <option value="aktif">aktif</option>
            <option value="blokir">blokir</option>        
          </select>
      </div>      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('auth/user') ?>" class="btn btn-danger">Cancel </a>
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