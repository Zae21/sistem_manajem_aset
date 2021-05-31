<?php 

//print_r($this->session->userdata());die();
switch ($this->session->userdata('hak_akses')) {
  case 'Pegawai':
    $this->load->view('_partials/sidebar_pegawai');
    break;

  case 'Manajer':
  	$this->load->view('_partials/sidebar_manajer');
  	break;
  
  default:
    $this->load->view('_partials/sidebar_admin');
    break;
}
 ?>