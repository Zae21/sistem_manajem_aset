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
  Detail Transaksi Perencanaan
  <small>Perencanaan Invoice</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
  </ol>
</section>
<!-- Main content -->
<form class="form-horizontal" action="<?php echo site_url('perencanaan/tampil_detail');?>" method="post">
  <section class="content">
    <!-- Default box -->
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-6">
          <div class="form-group">
            <label class="col-lg-4 control-label">ID. Transaksi</label>
            <div class="col-lg-7">
            <input type="text" id="id_perencanaan" name="id_perencanaan" class="form-control" value="<?= $kodeunik; ?>" readonly></td>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-lg-4 control-label">Tanggal Pengajuan</label>
          <div class="col-lg-7">
            <input type="date" id="tgl_transaksi" name="tgl_transaksi" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
          </div>
        </div>
        
        
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="col-lg-4 control-label">Tujuan Pengajuan</label>
          <div class="col-lg-7">
            <input type="text" id="tujuan" name="tujuan" class="form-control" value="">
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-lg-4 control-label">Tanggal Rencana Pengadaan</label>
          <div class="col-lg-7">
            <input type="date" id="tgl_rencana_pengadaan" name="tgl_rencana_pengadaan" class="form-control" value="">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <!-- box box-primary -->
        <div class="box box-primary">
          <!-- /modal dialog-->
          <!-- box-header -->
          <div class="box-header with-border">
            <button type="button" class="btn btn-primary tambah-form" data-toggle="modal" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah</button>
            <!--  <button onclick="loadData()">load</button> -->
          </div>
          <!-- /box-header -->
          <!-- view data -->
          <div class="box-body">
            <table id="" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama Asset</th>
                  <th>Kategori Asset</th>
                  <th>Jenis Asset</th>
                  <th>Jumlah Diajukan</th>
                  <th>Harga</th>
                  <th>Total Harga Asset Diajukan</th>
                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="table-tbody">
              </tbody>
            </table>
            </div><!-- /.box-body -->
          </div>
          <button class="btn btn-primary"><i class="fa fa-plus"></i>Simpan</button>
          <!-- /box box-primary-->
          </div><!--/.col (right) -->
          </div> <!-- /.row -->
          </section><!-- /.content -->
        </form>
        <!--tambahkan custom js disini-->
        <!-- modal dialog--><!-- modal dialog--><!-- modal dialog--><!-- modal dialog-->
        <div class="modal fade" id="mymodaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Data Produk</h4>
              </div>
              <form id="add-produk-modal">
                <div class="modal-body">
                  <div class="form-group">
                    <label>ID Produk</label>
                    <select name="id_produk" class="form-control" id="id_produk">
                      <option>Pilih Produk</option>
                      <?php
                      foreach($result_produk_pilihan as $row)
                      {
                      echo '<option value="'.$row['id_produk'].'">'.$row['nama'].'</option>';
                      }
                      ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Durasi/Harga perencanaan</label>
                    <select name="id_harga" class="form-control" id="id_harga">
                      <option>Pilih Durasi/Harga perencanaan</option>
                      <?php
                      foreach($result_harga_pilihan as $row)
                      {
                      echo '<option value="'.$row['id_harga'].'">'.$row['durasi'].' | '.$row['harga'].'</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" onkeyup="myFunction()">
                  </div>
                  <div class="form-group">
                    <label>Biaya</label>
                    <input type="number" class="form-control" name="biaya" id="biaya" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Tgl Pinjam</label>
                    <input type="text" class="form-control" id="tgl_pinjam" name="tgl_pinjam">
                  </div>
                  <div class="form-group">
                    <label>Jam Pinjam</label>
                    <input type="time" class="form-control" id="jam_pinjam"  min="00:00" max="23:59" name="jam_pinjam">
                  </div>
                  
                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" id="status">
                      <option>Pilih Status</option>
                      <option>Booking</option>
                      <option>Pinjam</option>
                      <option>Kembali</option>
                      <option>Batal</option>
                    </select>
                  </div>
                  
                  
                </div>
              </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" id="add_action">Simpana</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>
        
        <?php
        $this->load->view('_partials/js');
        ?>
        <?php
        $this->load->view('_partials/footer');
        ?>
        <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <script>
        $('#add_action').on('click',function (argument) {
        $(this).attr('disabled','disabled');
        var dataForm=$('#add-produk-modal').serialize();
        $.post("<?php echo site_url('perencanaan/tambah_detail_perencanaan/'.$this->uri->segment(3));?>",dataForm,function (argument) {
        console.log(argument);
        loadData();
        $('#mymodaladd').modal('hide');
        // body...
        })
        })
        function hapus(ini){
        var id=$(ini).data('id_cart');
        $.get("<?php echo site_url('perencanaan/deleteCart')?>/"+id,function (argument) {
        loadData();
        })
        }
        function loadData() {
        //code
        $("#table-tbody").load("<?php echo site_url('perencanaan/tampil_detail_perencanaan/'.$this->uri->segment(3));?>");
        }
        loadData();
        
        function myFunction() {
        var harga = $('#id_harga').val();
        var jumlah = $('#jumlah').val();
        var req= $.ajax({
        url: "<?= base_url('perencanaan/hitung_otomatis') ?>",
        type: 'post',
        data: {id_harga:harga,jumlah:jumlah},
        dataType: 'json',
        })
        req.done(function(data) {
        //console.log();
        $('#biaya').val(data);
        })
        }
        var date = new Date();
        date.setDate(date.getDate()-1);
        $('#tgl_pinjam').datepicker({
        minDate: date
        });
        </script>