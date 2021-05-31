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
        Blank page
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<?php $data = $this->session->userdata(); ?>

        <img src="http://localhost/robot.png" alt="" width="200px">
        <br><br>
            <h1 style="color: #3399ff;">@<?= $data['username']; ?></h1>
        <br>

        <form action="<?= base_url('home/ganti_password'); ?>" method="POST">
            <hr>

            <br><br>

            <input type="text" name="password" class="inputan" placeholder="password" value="<?= $data['password']; ?>" readonly> <br><br>

            <input type="password" name="pw_baru"  class="inputan" placeholder="password baru">    <br>
            <?= form_error('pw_baru'); ?>

            <br>

            <input type="text" name="cpw_baru"  class="inputan" placeholder="ulangi password baru">  <br>
            <?= form_error('cpw_baru'); ?>

            <br>

            <input type="submit" name="submit" value="Ganti Password">
        </form>

<?php 
$this->load->view('_partials/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>