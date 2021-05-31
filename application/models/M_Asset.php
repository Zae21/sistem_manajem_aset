<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Asset extends CI_Model {

	public $table='asset';

	public function __construct()
	{
		parent::__construct();
		
	}

	function buat_kode()
	{
		$this->db->select('RIGHT(asset.id_asset,4) as kode', FALSE);
		  $this->db->order_by('id_asset','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('asset');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "ASST-$ym-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tampil_asset()
	{
		$this->db->select('*')
			->from('asset')
			->join('kategori_asset','asset.id_kategori_asset=kategori_asset.id_kategori_asset')
			->join('jenis_asset','asset.id_jenis_asset=jenis_asset.id_jenis_asset');
		
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	public function tampil_asset_pilihan()
	{
		$this->db->select(["id_asset", "nama_asset","jumlah"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function detail_asset($id_asset)
	{
		$this->db->select()
			->from($this->table)
			->where("id_asset", $id_asset);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_asset($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('asset');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_asset($data)
	{
		$this->db->where("id_asset", $this->input->post('id_asset'));
		$query=$this->db->set($data)->get_compiled_update('asset');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_asset', $id);
    $this->db->delete('asset');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
	
}

/* End of file m_asset.php */
/* Location: ./application/models/m_asset.php */