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
  Tambah Transaksi Pembayaran
  <small>Pembayaran Invoice</small>
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
 <div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" action="<?php echo site_url('pembayaran/tambah_proses');?>" method="post">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">ID. Pembayaran</label>
                    <div class="col-lg-7">
                        <input type="text" id="id_pembayaran" name="id_pembayaran" class="form-control" value="<?= $kodeunik; ?>" readonly></td>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Tgl Pembayaran</label>
                    <div class="col-lg-7">
                        <input type="text" id="tgl_pembayaran" name="tgl_pembayaran" class="form-control tgl" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">ID Sewa</label>
                    <div class="col-lg-7">
                        <select name="id_sewa" class="form-control" onchange="isi_otomatis()" id="id_sewa" required>
                            <option value="">Pilih Transaksi Sewa</option>
                            <?php 
                            foreach($result_sewa_pilihan as $row)
                            { 
                              echo '<option value="'.$row['id_sewa'].'">'.$row['id_sewa'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Total Bayar</label>
                    <div class="col-lg-7">
                        <input type="text" id="subtotal" name="subtotal" class="form-control" readonly>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-lg-4 control-label">Jumlah Bayar</label>
                    <div class="col-lg-7">
                        <input type="number" id="jumlah_bayar" name="jumlah_bayar" class="form-control">
                    </div>
                </div>
            
               
              <div class="form-group">
                    <label class="col-lg-4 control-label">Jenis Bayar</label>
                    <div class="col-lg-7">
                        <select name="jenis_bayar" class="form-control" id="jenis_bayar" required>
                            <option value="">Pilih Status</option>
                            <option value="transfer">Transfer</option>
                            <option value="cash">Cash</option>
                        </select>
                    </div>
                </div>                

                <div class="form-group">
                    <label class="col-lg-4 control-label">Status</label>
                    <div class="col-lg-7">
                        <select name="status" class="form-control" id="status" required>
                            <option>Pilih Status</option>
                            <option value="lunas">Lunas</option>
                            <option value="belum lunas">Belum Lunas</option>                            
                        </select>
                    </div>
                </div>
            </div>
            </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="form-group">
          <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('pembayaran') ?>" class="btn btn-danger">Cancel </a>
    </div>
  </div>
  </div>
        </form>

    </div>
</div>
  
  </section><!-- /.content -->

  <?php
  $this->load->view('_partials/js');
  ?>
  <?php
  $this->load->view('_partials/footer');
  ?>
  
    
