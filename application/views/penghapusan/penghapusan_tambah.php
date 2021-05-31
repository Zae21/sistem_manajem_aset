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
  Tambah Transaksi Penghapusan
  <small>Penghapusan Invoice</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
  </ol>
</section>
<!-- Main content -->
<form class="form-horizontal" action="<?php echo site_url('penghapusan/tambah_proses');?>" method="post">
  <section class="content">
    <!-- Default box -->
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-6">
          <div class="form-group">
            <label class="col-lg-4 control-label">ID. penghapusan</label>
            <div class="col-lg-7">
              <input type="text" id="id_penghapusan" name="id_penghapusan" class="form-control" value="<?= $kodeunik; ?>" readonly>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-4 control-label">Tanggal Transaksi</label>
            <div class="col-lg-7">
              <input type="date" id="tgl_transaksi" name="tgl_transaksi" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
            </div>
          </div>
          
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <div class="col-lg-7">
            <label for="exampleInputEmail1">Status Penghapusan</label>
            <select name="status" class="form-control" id="status">
              <option>Pending</option>
              <option>Proses</option>
              <option>Sudah Dihapus</option>
            </select>
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
          <div class="box-header with-border">
            <table id="addAsset" class="table table-striped" width=100%>
              <thead>
                <tr>
                  <td align="center"><h5>Nama Asset</h5></td>
                  <td align="center"><h5>Jumlah Asset</h5></td>
                  <td align="center"><h5>Jenis Penghapusan Asset</h5></td>
                  <td align="center"><h5>Nilai Asset Dihapus</h5></td>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><select name="id_asset[]" class="form-control" id="id_asset">
                    <option>Pilih Asset</option>
                    <?php
                    foreach($result_asset_pilihan as $row)
                    {
                    echo '<option value="'.$row['id_asset'].'">'.$row['nama_asset'].'>'.$row['jumlah'].'</option>';
                    }
                    ?>
                  </select></td>
                  <td><input type="number" id="jumlah_0"class="form-control 0 jumlah" name="jumlah[]" required></td>
                  
                  <td><input type="text" id="jenis_hapus_0"class="form-control 0 jenis_hapus" name="jenis_hapus[]" required></td>

                  <td><input type="number" id="nilai_asset_0"class="form-control 0 nilai_asset" name="nilai_asset[]" required></td>
                </tr>
              </tbody>
            </table>
            <a id="tambah" class="btn btn-primary" onclick="tambah();">+</a>
            <a id="kurang" class="btn btn-primary" onclick="kurang();">-</a>
            <hr>
           
                <div class="total col-md-4 pull-right" width="10px" align="center">
                  <label>Total Nilai Asset</label>
                  <input type="text" id="total_barang" class="form-control 0 total_barang" name="total_barang" required>
                </div>
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
        function tambah(){
        i++;

        var id_asset = "<select name='id_asset[]' class='form-control' id='id_asset'><option>Pilih Asset</option><?php foreach($result_asset_pilihan as $row) { echo "<option value='".$row['id_asset']."'>".$row['nama_asset'].'</option>'; } ?> </select>";
       
        var jumlah = "<input id='jumlah_"+ i +"' type='number' class='jumlah form-control' name='jumlah[]' required>";

        var jenis_hapus = "<input id='jenis_hapus_"+ i +"' type='text' class='jumlah form-control' name='jenis_hapus[]' required>";

        var nilai_asset = "<input id='nilai_asset_"+ i +"' type='number' class='jumlah form-control' name='nilai_asset[]' required>";
       
        $("#addAsset tbody").append("<tr class='"+i+"'><td>"+id_asset+"</td><<td>"+jumlah+"</td><td>"+jenis_hapus+"</td><td>"+nilai_asset+"</td></tr>")
        };
        function kurang() {
        if(i>0){
        $("#addAsset tbody tr").remove("."+i);
        i--;
        } else {
        i = 1;
        }
        };

        function subtotal() {
          console.log('jhjhjbj');
            let total = document.getElementsByClassName('total_barang');
            let subtotal = 0;
            for(let i = 0; i < total.length; i++) {
            subtotal += parseInt(total[i].value);
            }
            document.getElementById('jumlah_'+i).value = subtotal;
            }
        
        function goBack() {
        // body...
        window.history.back();
        }
        $(function(){
        $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
        });
        });
        </script>