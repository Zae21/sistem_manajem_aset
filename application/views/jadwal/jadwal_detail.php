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
  Penjadwalan Sewa CV. Iframe Multimedia Yogyakarta
  <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Sewa</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          
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
							<th>ID Sewa</th>
							<th>ID Produk</th>
							<th>Jam Pinjam</th>
							<th>Jam Harus Kembali</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Biaya</th>
							<th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $sewa): ?>
                      <tr>
                        <td >
                          <?php echo $sewa->id_sewa ?>
                        </td>
                        <td >
                          <?php echo $sewa->id_produk ?>
                        </td>
                        <td >
                          <?php echo $sewa->jam_pinjam ?>
                        </td>
                        <td >
                          <?php echo $sewa->jam_harus_kembali ?>
                        </td>
                       
                        <td >
                          <?php echo $sewa->jumlah ?>
                        </td>
                        <td >
                          <?php echo $sewa->harga ?>
                        </td>
						<td >
                          <?php echo $sewa->biaya ?>
                        </td>
						<td >
                          <?php echo $sewa->status ?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
					<tfoot>
						<tr>
							<th>ID Sewa</th>
							<th>ID Produk</th>
							<th>Jam Pinjam</th>
							<th>Jam Harus Kembali</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Biaya</th>
							<th>Status</th>
						</tr>
					</tfoot>
                  </table>
                </div>
              </div>
            </div>
            
            </div><!-- /.box-body -->
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

    $(document).ready(function() {
    $('.datatable').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );

</script>