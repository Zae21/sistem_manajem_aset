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
            Manajemen
            <small>User</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">           
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                    <a href="<?php echo base_url('auth/tambah'); ?>" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
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
                    <th>Username</th>
                    <th>Nama User</th>
                    <th>Password</th>
                    <th>E-Mail</th>
                    <th>Telepon</th>
                    <th>Hak Akses</th>
                    <th width="200px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($result as $user): ?>
                  <tr>
                    <td >
                      <?php echo $user->username ?>
                    </td>
                    <td >
                      <?php echo $user->nama_user ?>
                    </td>
                    <td class="hidetext">
                      <?php echo $user->password ?>
                    </td>
                    <td>
                      <?php echo $user->email ?>
                    </td>
                    <td>
                      <?php echo $user->telepon ?>
                    </td>
                    </td>
                    <td>
                      <?php echo $user->hak_akses ?>
                    </td>
                    
                    <td>
                      <a href="<?php echo site_url('auth/edit/'.$user->id_user. '/' . url_title($user->nama_user)) ?>"
                       class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
                      <button onclick="deleteConfirm('<?php echo base_url('auth/delete/'.$user->id_user) ?>')"
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