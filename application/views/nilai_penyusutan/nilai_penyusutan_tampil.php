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
            Nilai Penyusutan
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Nilai Penyusutan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">           
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                    <a href="<?php echo base_url('nilai_penyusutan/tambah'); ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
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
                    <th width="150">ID Nilai Penyusutan</th>
                    <th>Nama Asset</th>
                    <th>Umur (Tahun) </th>
                    <th>Nilai Penyusutan (%) </th>
                   
                    <th width="200px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($result as $nilai_penyusutan): ?>
                  <tr>
                    <td >
                      <?php echo $nilai_penyusutan->id_nilai_penyusutan ?>
                    </td>
                    <td>
                      <?php echo $nilai_penyusutan->nama_asset ?>
                    </td>
                    <td>
                      <?php echo $nilai_penyusutan->umur ?>
                    </td>
                    <td>
                      <?php echo $nilai_penyusutan->nilai_penyusutan ?>
                    </td>
                    
                    <td>
                      <!-- <a href="<?php echo base_url('nilai_penyusutan/ubah/'.$nilai_penyusutan->id_nilai_penyusutan) ?>"
                       class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a> -->
                      <button onclick="deleteConfirm('<?php echo base_url('nilai_penyusutan/delete/'.$nilai_penyusutan->id_nilai_penyusutan) ?>')"
                       href="" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-trash"></i> Hapus </button>
                    </td>
                    
                  </tr>
                  <?php endforeach; ?>

                </tbody>
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
  
  $(function () {
    $('.datatable').DataTable()
    
  })

</script>