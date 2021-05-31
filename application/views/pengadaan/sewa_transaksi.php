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
  Transaksi Sewa
  <small>Sewa Invoice</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
  </ol>
</section>
<!-- Main content -->
<form class="form-horizontal" action="<?php echo site_url('sewa/detail_transaksi');?>" method="post">
  <section class="content">
    <!-- Default box -->
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-6">
          <div class="form-group">
            <label class="col-lg-4 control-label">ID. Transaksi</label>
            <div class="col-lg-7">
            <input type="text" id="id_sewa" name="id_sewa" class="form-control" value="<?= $this->uri->segment(3); ?>" readonly></td>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-lg-4 control-label">Tgl Transaksi</label>
          <div class="col-lg-7">
            <input type="date" id="tgl_transaksi" name="tgl_transaksi" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
          </div>
        </div>

        
      </div>
      <div class="col-md-6">
      <div class="form-group">
          <label class="col-lg-4 control-label">ID Customer</label>
          <div class="col-lg-7">
            <input type="text" id="id_customer" name="id_customer" class="form-control" value="<?php echo $result['nama'] ?>" readonly>
          </div>
        </div>
         
          
          <div class="form-group">
            <label class="col-lg-4 control-label">Down Payment</label>
            <div class="col-lg-7">
              <input type="number" id="dp" name="dp" class="form-control" value="<?php echo $result['dp'] ?>">
            </div>
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
     
          <!-- /box-header -->
          <!-- view data -->
          <div class="box-body">
            <table id="" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Produk</th>
                  <th>Durasi/Lama Sewa</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Biaya</th>
                  <th>Jam Pinjam</th>
                  <th>Jam Harus Kembali</th>
                  <th>Jam Pengembalian</th>
                  <th>Status</th>
                  <th>Denda</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="table-tbody">
              </tbody>
            </table>
            </div><!-- /.box-body -->
          </div>
         
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
                <h4 class="modal-title" id="myModalLabel">Form Kembali Produk</h4>
              </div>
              <form id="add-produk-modal">
                <div class="modal-body">

                  <div>
                    <input type="hide" name="id_det_sewa" id="id_det_sewa">
                  </div>

                  <div class="form-group">
                    <label>Denda</label>
                    <select name="id_denda" class="form-control" id="id_denda">
                      <option value="">Tidak Ada Denda</option>
                      <?php
                      foreach($result_denda_pilihan as $row)
                      {
                      echo '<option value="'.$row['id_denda'].'">'.$row['nama_denda'].' | '.$row['harga'].' | '.$row['keterangan'].'</option>';
                      }
                      ?>
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
  $('#add_action').on('click', function (argument) {
    $(this).attr('disabled', 'disabled');
    var dataForm = $('#add-produk-modal').serialize();
    $.post("<?php echo site_url('sewa/transaksi_kembali')?>", dataForm, function (argument) {
      console.log(argument);
      loadData();
      $('#mymodaladd').modal('hide');
      // body...
    })
  })

function pinjam(ini) {
  var id = $(ini).data('id_det_sewa');
  $.get("<?php echo site_url('sewa/transaksi_pinjam')?>/" + id, function (argument) {
    loadData();
  })
}

function kembali(ini) {
  var id = $(ini).data('id_det_sewa');
  $('#id_det_sewa').val(id);
   $('#mymodaladd').modal('show');
}

function batal(ini) {
  var id = $(ini).data('id_det_sewa');
  $.get("<?php echo site_url('sewa/transaksi_batal')?>/" + id, function (argument) {
    loadData();
  })
}

function loadData() {
  //code
  $("#table-tbody").load("<?php echo site_url('sewa/sewa_transaksi/'.$this->uri->segment(3));?>");
}
loadData();

function myFunction() {
  var harga = $('#id_harga').val();
  var jumlah = $('#jumlah').val();
  var req = $.ajax({
    url: "<?= base_url('sewa/hitung_otomatis') ?>",
    type: 'post',
    data: {
      id_harga: harga,
      jumlah: jumlah
    },
    dataType: 'json',
  })
  req.done(function (data) {
    //console.log();
    $('#biaya').val(data);
  })
}
var date = new Date();
date.setDate(date.getDate() - 1);
$('#tgl_pinjam').datepicker({
  minDate: date
}); 
</script>