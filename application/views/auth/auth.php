<?php
$this->load->view('_partials/header');
?>
<body class="hold-transition login-page">
  <style>
  body{
  /*background: url(<?php echo base_url('assets/img/bg.jpg'); ?>) no-repeat center center fixed !important;*/
  }
  div.box-login{
    width: 100%;
    height: 100%;
  background-color: grey;
  }
  </style>
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>IFRAME</b>MULTIMEDIA</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php echo validation_errors(); ?>
      <?php echo form_open('auth/auth'); ?>
      <!-- <form action="<?php echo base_url('auth/auth')?>" method="post"> -->
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!--  <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
				<br><center><p>Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a></p></center>
				
				
      </div>
    </form>
    
    <!-- /.social-auth-links -->
    <!--     <a href="#">I forgot my password</a><br>
    -->
  </div>
  <!-- /.login-box-body -->
</div>
</body>
<?php
$this->load->view('_partials/js');
?>

<!--tambahkan custom js disini-->
