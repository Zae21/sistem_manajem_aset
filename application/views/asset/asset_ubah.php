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
  <!-- Default box -->
  <form method="post" action="<?php echo base_url('asset/ubah_proses') ?>">
    {result}
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Asset</label>
        <input type="text" class="form-control" id="id_asset" name="id_asset" placeholder="" value ="{id_asset}"readonly>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Asset</label>
        <input type="text" class="form-control" id="nama_asset" name="nama_asset" placeholder="" value="{nama_asset}">
      </div>

      <div class="form-group">
        <!-- <?php
        print_r($result_kategori_pilihan);
        ?>  -->
        <label for="id_jenis_asset" class="control-label">ID Jenis Asset</label>
        <div class="form-group">
          <select class="form-control" name="id_jenis_asset" >
            <?php
            
            foreach($result_jenis_pilihan as $row)
            {
            echo '<option value="'.$row['id_jenis_asset'].'">'.$row['nama_jenis'].'</option>';
            }
              
            ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <!-- <?php
        print_r($result_kategori_pilihan);
        ?>  -->
        <label for="id_kategori_asset" class="control-label">ID Kategori Asset</label>
        <div class="form-group">
          <select class="form-control" name="id_kategori_asset" >
            <?php
            
            foreach($result_kategori_pilihan as $row)
            {
            echo '<option value="'.$row['id_kategori_asset'].'">'.$row['nama_kategori'].'</option>';
            }
              
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Jumlah</label>
        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="" value="{jumlah}">
      </div>
     
      <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
          <select name="status" class="form-control" id="status">
            <option>Pilih Status</option>
            <option>Tersedia</option>
            <option>Maintenance</option>
            <option>Rusak</option>
            
          </select>
      </div>
      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('asset') ?>" class="btn btn-danger">Cancel </a>
    </div>
    {/result}
  </form>
  </section><!-- /.content -->
  <?php
  $this->load->view('_partials/js');
  ?>
  <!--tambahkan custom js disini-->
  <?php
  $this->load->view('_partials/footer');
  ?>