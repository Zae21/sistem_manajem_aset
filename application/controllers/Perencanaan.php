<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perencanaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('M_Perencanaan', 'mod');
		$this->load->model('M_Asset');
		$this->load->model('M_Jenis');
		$this->load->model('M_Kategori');
		$this->load->model('M_Nilai_penyusutan');
		
	}
	

	public function index()
	{
		$data['title']='Tabel perencanaan';
		//$data['kodeunik'] = $this->M_Perencanaan->buat_kode();
		$data['result']=$this->mod->tampil_perencanaan()['result'];
		$data['total_data']=$this->mod->tampil_perencanaan()['total_data'];

		//print('<pre>'); print_r($data); exit();
		$this->parser->parse('perencanaan/perencanaan_tampil', $data);
	}

	public function detail_perencanaan($id_det_perencanaan)
	{

	
		$data=$this->mod->tampil_detail_perencanaan($id_det_perencanaan);
		

		echo json_encode($data);
		
		//$this->parser->parse('perencanaan/perencanaan_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah perencanaan';
		$data['kodeunik'] = $this->mod->buat_kode();	
		$data['result_kategori_pilihan'] = $this->M_Kategori->tampil_kategori_pilihan()['result'];
		$data['result_asset_pilihan'] = $this->M_Asset->tampil_asset_pilihan()['result'];
		$data['result_jenis_pilihan'] = $this->M_Jenis->tampil_jenis_pilihan()['result'];
		$this->parser->parse('perencanaan/perencanaan_tambah', $data);
	}

	public function tambah_proses()
	{
		//print_r($this->input->post());die();
		$id_perencanaan = $this->input->post('id_perencanaan');
		$data=[
			"id_perencanaan"	=> $id_perencanaan,
			"id_user"	=> $this->session->userdata('id_user'),
			"tgl_transaksi"	=> $this->input->post('tgl_transaksi'),
			"tujuan"	=> $this->input->post('tujuan'),
			//"tgl_pinjam"	=> $this->input->post('tgl_pinjam'),
			"tgl_rencana_pengadaan"	=> $this->input->post('tgl_rencana_pengadaan'),
			"total_perencanaan"	=> $this->input->post('total_perencanaan'),
			
		];
		// for ($i=0; $i <sizeof($this->input->post('nama_asset')) ; $i++) { 
		// 	echo $this->input->post('nama_asset')[$i];
		// 	echo "<br>";
		// }
		// die();
		$this->session->set_userdata('user_id');

		//$this->input->post
		$this->mod->tambah_perencanaan($data);
     $nama_asset = $this->input->post('nama_asset');
     $id_kategori_asset = $this->input->post('id_kategori_asset');
     $id_jenis_asset = $this->input->post('id_jenis_asset');
     $jumlah = $this->input->post('jumlah');
     $harga = $this->input->post('harga');
     $total_harga = $this->input->post('total_harga');
	for ($i=0; $i <sizeof($nama_asset) ; $i++) { 
			$detail = array(
		                 'id_perencanaan' => $id_perencanaan,
		                 'nama_asset' => $nama_asset[$i],
		                 'id_kategori_asset' => $id_kategori_asset[$i],
		                 'id_jenis_asset' => $id_jenis_asset[$i],
		                 'jumlah' => $jumlah[$i],
		                 'harga' => $harga[$i],
		                 'total_harga' => $total_harga[$i]
					  ); 
			$this->mod->tambah_detail($detail);
		}

		redirect(site_url('perencanaan'));
	}


	public function pembatalan_perencanaan($id_perencanaan)
	{
		# code...
		$data['result']=$this->mod->pembatalan($id_perencanaan);
		redirect(site_url('perencanaan'));
	}
	
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('perencanaan'));
	}
	public function deleteCart($id)
	{
		 $this->mod->deleteCart($id);
	}

	public function transaksi_pinjam($id)
	{
		$this->mod->update_status($id);
	}
	public function transaksi_kembali()
	{	
		
		$jam_harus_kembali=$this->mod->get_tanggal_kembali($this->input->post('id_det_perencanaan'));
		$datenow=date('Y-m-d H:i:s');

		$awal  = new DateTime($jam_harus_kembali);
		$akhir = new DateTime($datenow); // Waktu sekarang
		$diff  = $awal->diff($akhir)->format("%h");
		$selisih=$diff;

		if ($this->input->post('id_denda')=='') {
			$denda=0;
		} else {
			if ($selisih > 1) {
				$where=array('id_denda'=>$this->input->post('id_denda'));
				$denda=$this->mod->get_denda($where);
			} else {
				$denda=0;
			}
		}
		$data=array('denda'=>$denda,
					'id_denda'=>$this->input->post('id_denda'),
					'jam_pengembalian'=>$datenow,
					'status'=>'kembali');

		//print_r($this->input->post());die();
		$this->mod->update_kembali($data,$this->input->post('id_det_perencanaan'));
	}

	public function print_data($id_det_perencanaan)
	{
		# code...
	$data['hasil_detail'] = $this->mod->tampil_detail_perencanaan($id_det_perencanaan);
	//print_r($data);die();
	$this->load->view('perencanaan/perencanaan_cetak',$data);


	// $data['hasil_detail']=$this->mod->tampil_detail_perencanaan($id_det_perencanaan);
	// $data['data_utama']=$this->mod->tampil_perencanaan()['result'];
 //    $this->load->view('perencanaan/perencanaan_cetak',$data);
 //    $html = $this->output->get_output();
 //    $this->load->library('dompdf_gen');
 //    $this->dompdf->load_html($html);
 //    $this->dompdf->render();
 //    $sekarang=date("d:F:Y:h:m:s");
 //    $this->dompdf->stream("pendaftaran".$sekarang.".pdf",array('Attachment'=>0));
	}
}

/* End of file perencanaan.php */
/* Location: ./application/controllers/perencanaan.php */