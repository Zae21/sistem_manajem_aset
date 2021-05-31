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
  Change Password
  <small>User</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Change Password</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
<div class="box">
  <form id="password-form" method="post" action="<?php echo site_url('auth/proses_ubahPassword')?>">
    <div class="box-body">
	  <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
      </div>
	  <div class="form-group">
        <label for="exampleInputEmail1">Confirm Password</label>
        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Masukan Password">
      </div>  
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary" onClick="validationPassword();">Change Password</button>
    </div>    
  </form>
</div>
  </section><!-- /.content -->
  <?php
  $this->load->view('_partials/js');
  ?>
  <!--tambahkan custom js disini-->
  <?php
  $this->load->view('_partials/footer');
  ?>
  
  <script>
  function validationPassword()
  {
	  var validator = $('#password-form').validate({
		  rules: {
			  oldpassword: "required",
			  password: "required",
			  confirmpassword:{				  
				  equalTo:"#password",
			  }
		  }
		});
  }
  </script>