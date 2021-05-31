 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/dist/img/user.jpg'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama_user'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

         <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-edit"></i> Dashboard</a></li>
                </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-history"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('laporan/sewa') ?>"><i class="fa fa-circle-o"></i> Laporan Perencanaan </a></li>
            <li><a href="<?php echo base_url('laporan/pembayaran') ?>"><i class="fa fa-circle-o"></i> Laporan Pengadaan </a></li>
            <li><a href="<?php echo base_url('laporan/pembayaran') ?>"><i class="fa fa-circle-o"></i> Laporan Pengelolaan </a></li>
             <li><a href="<?php echo base_url('laporan/pembayaran') ?>"><i class="fa fa-circle-o"></i> Laporan Penghapusan </a></li>
            <li><a href="<?php echo base_url('laporan/pembayaran') ?>"><i class="fa fa-circle-o"></i> Laporan Penyusutan </a></li>
          </ul>
        </li>
        
         <li>
          <a href="<?php echo base_url('auth/ubah_password') ?>">
            <i class="fa fa-lock"></i> <span>Change Password</span>
          </a>
        </li>
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">