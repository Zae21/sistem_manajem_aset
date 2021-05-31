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
  Tambah Transaksi Perencanaan
  <small>Perencanaan Invoice</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
  </ol>
</section>
<!-- Main content -->
<form class="form-horizontal" action="<?php echo site_url('perencanaan/tambah_proses');?>" method="post">
  <section class="content">
    <!-- Default box -->
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-md-6">
          <div class="form-group">
            <label class="col-lg-4 control-label">ID. Perencanaan</label>
            <div class="col-lg-7">
              <input type="text" id="id_perencanaan" name="id_perencanaan" class="form-control" value="<?= $kodeunik; ?>" readonly>
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
              <input type="text" id="tgl_rencana_pengadaan" name="tgl_rencana_pengadaan" class="form-control datepicker" value="">
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
                      <td align="center"><h5>Kategori Asset</h5></td>
                      <td align="center"><h5>Jenis Asset</h5></td>
                      <td align="center"><h5>Jumlah Asset Diajukan</h5></td>
                      <td align="center"><h5>Harga Asset</h5></td>
                      <td align="center"><h5>Total Harga Asset</h5></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="text" class="form-control 0" name="nama_asset[]" required></td>
                      <td><select name="id_kategori_asset[]" class="form-control" id="id_kategori_asset">
                        <option>Pilih Kategori</option>
                        <?php
                        foreach($result_kategori_pilihan as $row)
                        {
                        echo '<option value="'.$row['id_kategori_asset'].'">'.$row['nama_kategori'].'</option>';
                        }
                        ?>
                      </select></td>
                      <td><select name="id_jenis_asset[]" class="form-control" id="id_jenis_asset">
                        <option>Pilih Jenis</option>
                        <?php
                        foreach($result_jenis_pilihan as $row)
                        {
                        echo '<option value="'.$row['id_jenis_asset'].'">'.$row['nama_jenis'].'</option>';
                        }
                        ?>
                      </select></td>
                      <td><input type="number" id="jumlah_0"class="form-control 0 jumlah" name="jumlah[]" required></td>
                      <td><input type="number" id="harga_0" class="form-control 0 harga" name="harga[]" onchange="total_otomatis(0)" required></td>
                      <td><input type="number" id="total_0" class="form-control 0 total_harga" name="total_harga[]" required></td>
                    </tr>
                  </tbody>
                </table>
                <a id="tambah" class="btn btn-primary" onclick="tambah();">+</a>
                <a id="kurang" class="btn btn-primary" onclick="kurang();">-</a>
                <hr>
                <div class="total col-md-4 pull-right" width="10px" align="center">
                  <label>Total Harga</label>
                  <input type="text" id="total_perencanaan" class="form-control 0 total_perencanaan" name="total_perencanaan" required>
                </div>
                <!--  <button type="button" class="btn btn-primary tambah-form" data-toggle="modal" data-target="#mymodaladd"><i class="fa fa-plus"></i>Tambah</button> -->
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
            var add_asset = "<input type='text' class='form-control' name='nama_asset[]' required>";
            var kategori_asset = "<select name='id_kategori_asset[]' class='form-control' id='id_kategori_asset'><option>Pilih Kategori</option><?php foreach($result_kategori_pilihan as $row) { echo "<option value='".$row['id_kategori_asset']."'>".$row['nama_kategori'].'</option>'; } ?> </select>";
            var jenis_asset = "<select name='id_jenis_asset[]' class='form-control' id='id_jenis_asset'><option>Pilih Jenis</option><?php foreach($result_jenis_pilihan as $row) { echo "<option value='".$row['id_jenis_asset']."'>".$row['nama_jenis'].'</option>'; } ?> </select>";
            var jumlah = "<input id='jumlah_"+ i +"' type='number' class='jumlah form-control' name='jumlah[]' required>";
            var harga = "<input id='harga_" + i + "'onchange = 'total_otomatis("+ i +")' type='number' class='harga_asset form-control' name='harga[]' required>";
            var total_harga = "<input id='total_"+ i +"' type='number' class='total_harga form-control' name='total_harga[]' required>";
            $("#addAsset tbody").append("<tr class='"+i+"'><td>"+add_asset+"</td><td>"+kategori_asset+"</td><td>"+jenis_asset+"</td><td>"+jumlah+"</td><td>"+harga+"</td><td>"+total_harga+"</td></tr>")
            };
            function kurang() {
            if(i>0){
            $("#addAsset tbody tr").remove("."+i);
            i--;
            } else {
            i = 1;
            }
            };
            //   function total_otomatis() {
            
            // var harga_asset = $(".harga_asset").val();
            // //console.log(harga_asset);
            // var jumlah_asset = $(".jumlah_asset").val();
            // total_harga = harga_asset * jumlah_asset; //a kali b
            // $(".total_harga").val(total_harga);
            // }
            function total_otomatis(i) {
            // body...
            var jumlah_asset = document.getElementById('jumlah_'+i).value;
            var harga_asset = document.getElementById('harga_'+i).value;
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
            document.getElementById('total_perencanaan').value = subtotal;
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