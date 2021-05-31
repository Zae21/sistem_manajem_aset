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
	public function hitung_otomatis()
	{
        $jumlah=$this->input->post('jumlah');
        $hasil = $hitung->harga*$jumlah;
        
        print_r(json_encode($hasil));die;
       
        //$this->load->view('perkalian',$data);
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
		
		$data['title']='Tambah Detail perencanaan';
		$data['kodeunik'] = $this->mod->buat_kode();
		$data['result_kategori_pilihan'] = $this->M_Kategori->tampil_kategori_pilihan()['result'];
		$data['result_asset_pilihan'] = $this->M_Asset->tampil_asset_pilihan()['result'];
		$data['result_jenis_pilihan'] = $this->M_Jenis->tampil_jenis_pilihan()['result'];
		$data['result']=$this->mod->detail_perencanaan($id_det_perencanaan);
		
		// print_r($data['result']);die();
		
		$this->parser->parse('perencanaan/perencanaan_detail', $data);
	}

	public function tampil_detail_perencanaan($id_det_perencanaan)
	{
		$result=$this->mod->detail_perencanaan($id_det_perencanaan)['result'];
		// print_r($result);die();
		$total=0;
		 
	}

	public function detail_transaksi($id_det_perencanaan)
	{
		
		$data['title']='Tambah Detail perencanaan';
		$data['kodeunik'] = $this->mod->buat_kode();
		$data['result_denda_pilihan'] = $this->m_denda->tampil_denda_pilihan()['result'];
		$data['result']=$this->mod->detail_perencanaan($id_det_perencanaan);
		print_r($data['result']);die();
		//$data['detail']=$this->mod->detail_perencanaan($id_det_perencanaan);

		$this->parser->parse('perencanaan/perencanaan_transaksi', $data);
	}

	public function perencanaan_transaksi($id_det_perencanaan)
	{
		$result=$this->mod->detail_perencanaan($id_det_perencanaan)['result'];
		// print_r($result);die();
		$total=0;
		$denda=0;
		 foreach ($result as $cart)

		 	{
		 		$denda=$denda+$cart['denda'];
		 		$total=$total+$cart['biaya'];
		 		echo "<tr> 
		 <td>".$cart['nama_produk']."</td>
		 <td>".$cart['durasi']."</td>
		 <td>".$cart['harga']."</td>
		 <td>".$cart['jumlah']."</td>
		 <td>".$cart['biaya']."</td>
		 <td>".$cart['jam_pinjam']."</td>
		 <td>".$cart['jam_harus_kembali']."</td>
		 <td>".$cart['jam_pengembalian']."</td>
		 <td>".$cart['status']."</td>
		 <td>".$cart['denda']."</td>
		 <td>
		 <button data-id_det_perencanaan='".$cart['id_det_perencanaan']."' type='button' onclick='pinjam(this)'>pinjam</button>
		 <button data-id_det_perencanaan='".$cart['id_det_perencanaan']."' type='button' onclick='kembali(this)'>kembali</button>
		  <button data-id_det_perencanaan='".$cart['id_det_perencanaan']."' type='button' onclick='batal(this)'>batal</button>
		 </td>
		 
		 </tr>";
		}
		$total_all=$denda+$total;
		echo "<tr> 
		 <td colspan='4'>Total</td>
		 
		 <td>
		 	$total_all
		 	<input type='hidden' name='total' value='$total_all'>
		 </td>
		 <td></td>
		 <td></td>
		 <td></td>
		 <td></td>
		 </tr>";
	}

	public function tambah_detail_perencanaan($id_perencanaan)
	{
		$id_harga=$this->input->post('id_harga');
		$dt_harga=$this->mod->ambil_harga($id_harga);
		$durasi=$dt_harga->durasi;
		$harga=$dt_harga->harga;
		$tgl_pinjam=date('Y-m-d',strtotime($this->input->post('tgl_pinjam')))." ".$this->input->post('jam_pinjam');
		$jam_harus_kembali = date('Y-m-d H:i:s', strtotime("+".$durasi." hours",strtotime($tgl_pinjam)));
		$data=[
			"id_perencanaan"	=> $id_perencanaan,
			"id_produk"	=> $this->input->post('id_produk'),
			"id_harga"	=> $this->input->post('id_harga'),
			"jam_pinjam"	=> $tgl_pinjam,
			"harga"	=> $harga,
			"jam_harus_kembali"	=> $jam_harus_kembali,
			"jumlah"	=> $this->input->post('jumlah'),
			"biaya"		=> $this->input->post('biaya'),
			//"subtotal"	=> $this->input->post('biaya')*$this->input->post('jumlah'),			
		];
		

		$this->mod->tambah_detail_perencanaan($data);
		echo $this->db->last_query();die();
	}

	
	public function tampil()
	{
		$result=$this->mod->cart();
		$total=0;
		 foreach ($result as $cart)

		 	{
		 		$total=$total+$cart->biaya;
		 		echo "<tr> 
		 <td>".$cart->nama_produk."</td>
		 <td>".$cart->durasi."</td>
		 <td>".$cart->harga."</td>
		 <td>".$cart->jumlah."</td>
		 <td>".$cart->biaya."</td>
		 <td>".$cart->jam_pinjam."</td>
		 <td>".$cart->jam_harus_kembali."</td>
		 <td>".$cart->status."</td>
		 <td><button data-id_cart='".$cart->id_cart."' type='button' onclick='hapus(this)'>hapus</button></td>
		 </tr>";
		}echo "<tr> 
		 <td colspan='4'>Total</td>
		 
		 <td>
		 	$total
		 	<input type='hidden' name='total' value='$total'>
		 </td>
		 <td></td>
		 <td></td>
		 <td></td>
		 <td></td>
		 </tr>";

	}
	public function insertToCart()
	{
		$id_harga=$this->input->post('id_harga');
		$dt_harga=$this->mod->ambil_harga($id_harga);
		$durasi=$dt_harga->durasi;
		$harga=$dt_harga->harga;
		$tgl_pinjam=date('Y-m-d',strtotime($this->input->post('tgl_pinjam')))." ".$this->input->post('jam_pinjam');
		$jam_harus_kembali = date('Y-m-d H:i:s', strtotime("+".$durasi." hours",strtotime($tgl_pinjam)));
		$data=[
			"id_produk"	=> $this->input->post('id_produk'),
			"id_harga"	=> $this->input->post('id_harga'),
			"jam_pinjam"	=> $tgl_pinjam,
			"harga"	=> $harga,
			"jam_harus_kembali"	=> $jam_harus_kembali,
			"jumlah"	=> $this->input->post('jumlah'),
			"biaya"		=> $this->input->post('biaya'),
			//"subtotal"	=> $this->input->post('biaya')*$this->input->post('jumlah'),			
		];
		$this->mod->tambah_cart($data);
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
		//print_r($this->input->post('nama_asset'));die();
		$data=[
			"id_perencanaan"	=> $this->input->post('id_perencanaan'),
			"id_user"	=> $this->session->userdata('id_user'),
			"tgl_transaksi"	=> $this->input->post('tgl_transaksi'),
			"tujuan"	=> $this->input->post('tujuan'),
			//"tgl_pinjam"	=> $this->input->post('tgl_pinjam'),
			//"tgl_kembali"	=> $this->input->post('tgl_kembali'),
			"total_perencanaan"	=> $this->input->post('total_perencanaan'),
			
		];
		$this->session->set_userdata('user_id');

		//$this->input->post
		$this->mod->tambah_perencanaan($data);
		
		$nama_asset = count($this->input->post('nama_asset'));
		for($i = 0; $i < $nama_asset; $i++) {
                $data_detail = array (
                 //'img' => "",
                 //'date_created' => date("Y-m-d"),
                 'nama_asset' => $_POST['nama_asset'][$i],
                 'id_kategori_asset' => $_POST['id_kategori_asset'][$i],
                 'id_jenis_asset' => $_POST['id_jenis_asset'][$i],
                 'jumlah' => $_POST['jumlah'][$i],
                 'harga' => $_POST['harga'][$i],
                 'total_harga' => $_POST['total_harga'][$i],
                );
                //$insert = $this->mod->tambah_detail($data_detail);
		//print_r($data_detail);die;
			
		$this->mod->tambah_detail($data_detail);
		// }

		// if ($this->mod->reset_cart()) {
		redirect(site_url('perencanaan'));
		}		
	}

	public function ubah($id)
	{
		$data['title']='Ubah perencanaan';
		$data['result']=$this->mod->detail_perencanaan($id);
		$this->parser->parse('perencanaan/perencanaan_ubah', $data);
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
}

/* End of file perencanaan.php */
/* Location: ./application/controllers/perencanaan.php */