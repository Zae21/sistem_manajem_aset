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
        Denda
        <small>Edit Denda</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master Data</a></li>
        <li class="active">Denda</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
{result}
    <!-- Default box -->
   <form method="post" action="<?php echo base_url('denda/ubah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Denda</label>
        <input type="text" class="form-control" id="id_denda" name="id_denda" placeholder="" value ="{id_denda}"readonly>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Denda</label>
        <input type="text" class="form-control" id="nama_denda" name="nama_denda" placeholder="" value="{nama_denda}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Harga Denda</label>
        <input type="text" class="form-control" id="harga" name="harga" placeholder="" value="{harga}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Keterangan Denda</label>
        <textarea class="form-control" id="keterangan" name="keterangan" placeholder="" value="{keterangan}"></textarea>
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('denda') ?>" class="btn btn-danger">Cancel </a>
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