<?php
$this->load->view('_partials/header');
?>
<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
<!--tambahkan custom css disini-->
<?php
$this->load->view('_partials/topbar');
$this->load->view('_partials/sidebar');
?>
<!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  Penghapusan
  <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Penghapusan</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
          <a href="<?php echo base_url('penghapusan/tambah'); ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
          </h3>
          <div class="box-tools">
            
            
          </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive">
            
            <!-- DataTables -->
            <div class="row">
              <div class="col-xs-12">
                <div class="table-responsive">
                  <table class="table table-hover datatable"  width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="150">ID Penghapusan</th>
                        <th width="150">Tanggal Penghapusan</th>
                        <th width="150">ID User Input</th>
                        <th width="150">Total Harga Asset Dihapus</th>
                        <th width="150">Status Penghapusan Asset</th>
                        <th width="200px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $penghapusan): ?>
                      <tr>
                        <td >
                          <?php echo $penghapusan->id_penghapusan ?>
                        </td>
                        <td >
                          <?php echo $penghapusan->tgl_hapus ?>
                        </td>
                        <td >
                          <?php echo $penghapusan->nama_user ?>
                        </td>
                        <td >
                          <?php echo $penghapusan->total_harga ?>
                        </td>
                        <td >
                          <?php echo $penghapusan->status ?>
                        </td>
                        <td>
                          <a href="" onclick="tampil_detail('<?php echo $penghapusan->id_penghapusan; ?>')" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#mymodaladd"><i class="fa fa-edit"></i> Detail</a>                         
                          <a target="_blank" class="btn btn-sm btn-primary" href="<?php echo base_url().'penghapusan/print_data/'.$penghapusan->id_penghapusan;?>">Cetak Invoice</a> 
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div><!-- /.box-body -->
            <!-- modal dialog--><!-- modal dialog--><!-- modal dialog--><!-- modal dialog-->
            <div class="modal fade" id="mymodaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Detail penghapusan</h4>
                  </div>
                  <table id="table1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID penghapusan</th>
                        <th>Nama Asset</th>
                        <th>Jumlah Asset</th>
                        
                      </tr>
                    </thead>
                    <tbody id="table-tbody">
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <!-- /.content -->
    <?php
    $this->load->view('_partials/js');
    ?>
    <!--tambahkan custom js disini-->
    <?php
    $this->load->view('_partials/footer');
    ?>
    <script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
    
    $(function () {
    $('.datatable').DataTable()
    
    })
    function tampil_detail(id)
    {
     
    $.ajax({
    url : "<?php echo site_url('penghapusan/detail_penghapusan/')?>" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
    var outstr = ''
    $.each(data, function( i, l ){
    outstr = outstr + '<tr>';
      outstr = outstr + '<td>'+ l.id_penghapusan + '</td>';
      outstr = outstr + '<td>'+ l.nama_asset + '</td>';
      outstr = outstr + '<td>'+ l.jumlah + '</td>';
    outstr = outstr + '</tr>';
    });
    if (outstr != '') {
    $('#table-tbody').html(outstr);
    }
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
    alert('Error get data from ajax');
    }
    });
    
    }

    function konfirmasi(){
         var tanya = confirm("Apakah Anda Akan Membatalkan Transaksi Ini ?");
         
 
         if(tanya === true) {
            var pembatalan = true;
         }else{
           var pembatalan = false;
         }
 
         document.getElementById("pesan").innerHTML = pesan;
         return pembatalan;
      }
    </script>