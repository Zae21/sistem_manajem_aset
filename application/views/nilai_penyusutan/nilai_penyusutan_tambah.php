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
  Nilai Penyusutan
  <small>Tambah Data</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Master Data</a></li>
    <li class="active">Nilai Penyusutan</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
<div class="box">
  <form method="post" action="<?php echo base_url('nilai_penyusutan/tambah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Nilai Penyusutan</label>
        <td><input type="text" name='id_nilai_penyusutan' class="form-control" value="<?= $kodeunik; ?>" readonly></td>
      </div>
      <div class="form-group">
        <!-- <?php
        print_r($result_kategori_pilihan);
        ?> -->
        <label for="id_kategori_asset" class="control-label">ID Asset</label>
        <div class="form-group">
          <select class="form-control" name="id_asset">
            <?php
            foreach($result_asset_pilihan as $row)
            {
            echo '<option value="'.$row['id_asset'].'">'.$row['nama_asset'].'</option>';
            }
            ?>
          </select>
        </div>
      </div>
       <div class="form-group">
        <label for="exampleInputEmail1">Durasi (Tahun) </label>
        <input type="text" class="form-control" id="umur" name="umur" placeholder="">
      </div>
       <div class="form-group">
        <label for="exampleInputEmail1">Nilai Penyusutan (%) </label>
        <textarea class="form-control" id="nilai_penyusutan" name="nilai_penyusutan" placeholder=""></textarea>
      </div>
      
      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('nilai_penyusutan') ?>" class="btn btn-danger">Cancel </a>
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