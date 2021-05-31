<?php
$this->load->view('_partials/header');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('_partials/topbar');
$this->load->view('_partials/sidebar');
?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  Tambah Transaksi Pengadaan
  <small>Pengadaan Invoice</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
  </ol>
</section>
<!-- Main content -->
<form class="form-horizontal" action="<?php echo site_url('pengadaan/tambah_proses');?>" method="post">
  <section class="content">
    <!-- Default box -->
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-6">
          <div class="form-group">
            <label class="col-lg-4 control-label">ID. Pengadaan</label>
            <div class="col-lg-7">
              <input type="text" id="id_pengadaan" name="id_pengadaan" class="form-control" value="<?= $kodeunik; ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <!-- <?php
            print_r($result_perencanaan_pilihan);
            ?>  -->
            <label for="id_perencanaan" class="col-lg-4 control-label">ID Perencanaan Asset</label>
            <div class="col-lg-7">
              <select class="form-control" name="id_perencanaan" id="id_perencanaan">
                <option value="">Pilih Transaksi</option>
                <?php
                foreach($result_perencanaan_pilihan as $row)
                {
                echo '<option value="'.$row['id_perencanaan'].'">'.$row['id_perencanaan'].'</option>';
                }
                ?>
              </select>
            </div>
          </div>
          
          
          
          
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="col-lg-4 control-label">Tanggal Perencanaan</label>
            <div class="col-lg-7">
              <input type="date" id="tgl_perencanaan" name="tgl_perencanaan" class="form-control" value="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-4 control-label">Tanggal Pengadaan</label>
            <div class="col-lg-7">
              <input type="date" id="tgl_pengadaan" name="tgl_pengadaan" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
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
              <table id="addAsset" class="table table-striped" width=100%>
                <thead>
                  <tr>
                    <td align="center"><h5>Nama Asset</h5></td>
                    <!-- <td align="center"><h5>Kategori Asset</h5></td>
                    <td align="center"><h5>Jenis Asset</h5></td> -->
                    <td align="center"><h5>Jumlah Asset Diajukan</h5></td>
                    <td align="center"><h5>Harga Asset Rencana</h5></td>
                    <td align="center"><h5>Harga Asset Realisasi</h5></td>
                    <td align="center"><h5>Total Harga Asset</h5></td>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
             
              <hr>
              <div class="total col-md-4 pull-right" width="10px" align="center">
                <label>Total Harga Realisasi</label>
                <input type="text" id="total_pengadaan" class="form-control 0 total_pengadaan" name="total_pengadaan" required>
              </div>
              <div class="total col-md-4 pull-right" width="10px" align="center">
                <label>Total Harga Awal</label>
                <input type="text" id="total_harga_diajukan" class="form-control 0 total_pengadaan" name="total_harga_diajukan" required>
              </div>
              <!--  <button type="button" class="btn btn-primary tambah-form" data-toggle="modal" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah</button> -->
              <!--  <button onclick="loadData()">load</button> -->
            </div>
            <!-- /box-header -->
            <!-- view data -->
            
            
            <button class="btn btn-primary"><i class="fa fa-plus"></i>Simpan</button>
            <button onclick="goBack()" class="btn btn-danger"><i class="fa fa-plus"></i>Kembali</button>
            <!-- /box box-primary-->
            </div><!--/.col (right) -->
            </div> <!-- /.row -->
            </section><!-- /.content -->
          </form>
          <!--tambahkan custom js disini-->
          <!-- modal dialog--><!-- modal dialog--><!-- modal dialog--><!-- modal dialog-->
          
          <?php
          $this->load->view('_partials/js');
          ?>
          <?php
          $this->load->view('_partials/footer');
          ?>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
          <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
          <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
          
          
          <script type="text/javascript">
          var i = 0;
          
          function total_otomatis(i) {
          // body...
          var jumlah_asset = document.getElementById('jumlah_'+i).value;
          var harga_asset = document.getElementById('harga_realisasi'+i).value;
          let total_harga = jumlah_asset*harga_asset;
          document.getElementById('total_'+i).value = total_harga;
          subtotal();
          }

          function subtotal() {
          let total = document.getElementsByClassName('total_harga');
          let subtotal = 0;
          for(let i = 0; i < total.length; i++) {
          subtotal += parseInt(total[i].value);
          }
          document.getElementById('total_pengadaan').value = subtotal;
          }

          function goBack() {
          // body...
          window.history.back();
          }



          //Ajax Combobox
          $("#id_perencanaan").on("change", function() {
         
          var id_perencanaan = $(this).val();

          $.ajax({
              url: "<?php echo base_url('Pengadaan/isi_otomatis') ?>/"+id_perencanaan,
              method: "GET",
              cache: false,
              dataType: "json",
              data: {id: id_perencanaan}, 
              cache:false,
              success: function(response) {
                //console.log(response);
                //console.log(response.result[0]['tgl_transaksi']);
                var tgl_perencanaan = response.result[0]['tgl_transaksi'];
                var total_perencanaan = response.result[0]['total_perencanaan'];
                var htm="";

                   document.getElementById('tgl_perencanaan').value=tgl_perencanaan;
                   document.getElementById('total_harga_diajukan').value=total_perencanaan;

                   for (var a = response.result_detail.length - 1; a >= 0; a--) {
                    var det = response.result_detail[a];
                    //console.log(det['nama_asset']);
                     i++;
                    var add_asset = "<input type='text' class='form-control' name='nama_asset[]' value='"+det['nama_asset']+"' required>";
                    var jumlah = "<input id='jumlah_"+ i +"' type='number' class='jumlah form-control' name='jumlah[]' value='"+det['jumlah']+"' required>";
                    var harga_pengadaan = "<input id='harga_" + i + "'onchange = 'total_otomatis("+ i +")' type='number' class='harga_asset form-control' name='harga_pengadaan[]' value='"+det['harga']+"' required>";
                    var harga_realisasi = "<input id='harga_realisasi" + i + "'onchange = 'total_otomatis("+ i +")' type='number' class='harga_asset form-control' name='harga_realisasi[]' required>";
                    var total_harga = "<input id='total_"+ i +"' type='number' class='total_harga form-control' name='total_harga[]' value='0' required>";
                    htm=htm+"<tr class='"+i+"'>"+
                      "<td>"+add_asset+"</td>"+
                      "<td>"+jumlah+"</td>"+
                      "<td>"+harga_pengadaan+"</td>"+
                      "<td>"+harga_realisasi+"</td>"+
                      "<td>"+total_harga+"</td>"+
                      "</tr>";
                    $("#addAsset tbody").html(htm)

                     
                   }
                      }
                  });
                });

          </script>