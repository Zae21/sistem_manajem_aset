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
        Blank page
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
{result}
    <!-- Default box -->
   <form method="post" action="<?php echo base_url('customer/ubah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Customer</label>
        <input type="text" class="form-control" id="id_customer" name="id_customer" placeholder="" value ="{id_customer}"readonly>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="{nama}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">No Identitas</label>
        <input type="text" class="form-control" id="no_id" name="no_id" placeholder="" value="{no_id}">
      </div>
       <div class="form-group">
        <label for="exampleInputEmail1">Jenis Identitas</label>
        <input type="text" class="form-control" id="jenis_id" name="jenis_id" placeholder="" value="{jenis_id}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Alamat</label>
        <input type="textarea" class="form-control" id="alamat" name="alamat" placeholder="" value="{alamat}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">No Handphone</label>
        <input type="textarea" class="form-control" id="no_hp" name="no_hp" placeholder="" value="{no_hp}">
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('customer') ?>" class="btn btn-danger">Cancel </a>
    </div>
    
  </form>
{/result}
</section><!-- /.content -->

<?php 
$this->load->view('_partials/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>