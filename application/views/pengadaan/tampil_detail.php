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
  Perencanaan
  <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Perencanaan</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
          <a href="<?php echo base_url('perencanaan/tambah'); ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
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
                        <th width="150">ID Perencanaan</th>
                        <th width="150">Tanggal Pengajuan</th>
                        <th width="150">ID Staff Penginput</th>
                        <th width="150">Tujuan Pengajuan</th>
                        <th width="150">Tanggal Rencana Pengadaan</th>
                        <th width="150">Subtotal Perencanaan</th>
                        <th width="200px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $perencanaan): ?>
                      <tr>
                        <td >
                          <?php echo $perencanaan->id_perencanaan ?>
                        </td>
                        <td >
                          <?php echo $perencanaan->tgl_transaksi ?>
                        </td>
                        <td >
                          <?php echo $perencanaan->nama_user ?>
                        </td>
                        <td >
                          <?php echo $perencanaan->tujuan ?>
                        </td>
                        <td >
                          <?php echo $perencanaan->tgl_rencana_pengadaan ?>
                        </td>
                        <td >
                          <?php echo $perencanaan->total_perencanaan ?>
                        </td>
                        <td>
                          <a href="" onclick="tampil_detail('<?php echo $perencanaan->id_perencanaan; ?>')" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#mymodaladd"><i class="fa fa-edit"></i> Detail</a>
                          <a href="<?php echo base_url('perencanaan/tampil_detail_perencanaan/'.$perencanaan->id_perencanaan) ?>"  class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit Transaksi</a>
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
                    <h4 class="modal-title" id="myModalLabel">Detail Perencanaan</h4>
                  </div>
                  <table id="table1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID Perencanaan</th>
                        <th>Nama Asset</th>
                        <th>Kategori Asset</th>
                        <th>Jenis Asset</th>
                        <th>Jumlah Diajukan</th>
                        <th>Harga</th>
                        <th>Total Harga Asset Diajukan</th>
                        
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
    url : "<?php echo site_url('Perencanaan/detail_perencanaan/')?>/" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
    var outstr = ''
    $.each(data, function( i, l ){
    outstr = outstr + '<tr>';
      outstr = outstr + '<td>'+ l.id_perencanaan + '</td>';
      outstr = outstr + '<td>'+ l.nama_asset + '</td>';
      outstr = outstr + '<td>'+ l.id_kategori_asset + '</td>';
      outstr = outstr + '<td>'+ l.id_jenis_asset + '</td>';
      outstr = outstr + '<td>'+ l.jumlah + '</td>';
      outstr = outstr + '<td>'+ l.harga + '</td>';
      outstr = outstr + '<td>'+ l.total_harga + '</td>';
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
    </script>