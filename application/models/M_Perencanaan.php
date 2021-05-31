<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Perencanaan extends CI_Model {

	public $table='perencanaan';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(perencanaan.id_perencanaan,4) as kode', FALSE);
		  $this->db->order_by('id_perencanaan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('perencanaan');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $ym = date('ym');
		  $kodejadi = "TRP$ym".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}


	public function ambil_harga($id_harga)
	{
		$this->db->select('durasi,harga')
			->from('harga')
			->where('id_harga',$id_harga);
		$query=$this->db->get();
		return  $query->row();
	}


	public function tambah_detail($detail)
	{
		$this->db->insert('det_perencanaan',$detail);
		return TRUE;
		//$query=$this->db->set($detail)->get_compiled_insert('det_perencanaan');
		//print('<pre>'); print_r($query); exit();

		//$this->db->query($query);	
	}
	// public function reset_cart()
	// {
	// 	$this->db->truncate('cart');
	// 	return TRUE;
	// }

	public function tampil_perencanaan()
	{

	$this->db->select('*')
    		->from('perencanaan')
    		->join('users','perencanaan.id_user=users.id_user');

    $query=$this->db->get_compiled_select();
    //print_r($query);die();
    $data['result']=$this->db->query($query)->result();
	$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	
	public function tampil_detail_perencanaan($id_det_perencanaan)
	{

		$this->db->select('*')
				->from('det_perencanaan dp')
    			->join('kategori_asset ka','dp.id_kategori_asset=ka.id_kategori_asset')
    			->join('jenis_asset ja','dp.id_jenis_asset=ja.id_jenis_asset')
    			->join('perencanaan','dp.id_perencanaan=perencanaan.id_perencanaan')
    			->where("dp.id_perencanaan", $id_det_perencanaan);

		$query = $this->db->get()->result();
		//print_r($query);die();
		
		return $query;
	}

	public function detail_perencanaan()
	{
		$this->db->select('*')
				->from('det_perencanaan')
    			->join('kategori_asset','det_perencanaan.id_kategori_asset=kategori_asset.id_kategori_asset')
    			->join('jenis_asset','det_perencanaan.id_jenis_asset=jenis_asset.id_jenis_asset');
	
		$query = $this->db->get()->result();
		//print_r($query);die();
		return $query;
	}
	
	public function tampil_perencanaan_pilihan()
	{
		$where = "status_data = 'Disetujui'";
		$this->db->select(['id_perencanaan','total_perencanaan'])
			->from('perencanaan')
			->where($where);

		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function ambil_data_perencanaan($id_perencanaan)
	{
		# code...
		$this->db->select('*')
    		->from('perencanaan')
    		->join('users','perencanaan.id_user=users.id_user')
    		->where("perencanaan.id_perencanaan", $id_perencanaan);

    $query=$this->db->get_compiled_select();
    //print_r($query);die();
    $data['result']=$this->db->query($query)->result();
	
		return $data;
	}

	public function ambil_detail_perencanaan($id_perencanaan)
	{
		# code...
		$this->db->select('*')
    		->from('det_perencanaan')
    		->where("det_perencanaan.id_perencanaan", $id_perencanaan);

    $query=$this->db->get_compiled_select();
    //print_r($query);die();
    $data=$this->db->query($query)->result();
	
		return $data;
	}

	public function tambah_perencanaan($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('perencanaan');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_perencanaan($data)
	{
		$this->db->where("id_perencanaan", $this->input->post('id_perencanaan'));
		$query=$this->db->set($data)->get_compiled_update('perencanaan');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function pembatalan($id)
	{
		# code...
		$this->db->set(['status_data'=> 'Dibatalkan']);
		$this->db->where('id_perencanaan', $id);
		return $this->db->update('perencanaan');
	}

	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_perencanaan', $id);
    $this->db->delete('perencanaan');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
	
}

/* End of file m_perencanaan.php */
/* Location: ./application/models/m_perencanaan.php */