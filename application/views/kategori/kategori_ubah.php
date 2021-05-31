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
   <form method="post" action="<?php echo base_url('kategori/ubah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Kategori</label>
        <input type="text" class="form-control" id="id_kategori_asset" name="id_kategori" placeholder="" value ="{id_kategori_asset}"readonly>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Kategori</label>
        <input type="text" class="form-control" id="nama" name="nama_kategori" placeholder="" value="{nama_kategori}">
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('kategori') ?>" class="btn btn-danger">Cancel </a>
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