<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Nilai_penyusutan extends CI_Model {

	public $table='nilai_penyusutan';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(nilai_penyusutan.id_nilai_penyusutan,4) as kode', FALSE);
		  $this->db->order_by('id_nilai_penyusutan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('nilai_penyusutan');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "NPS-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tampil_nilai_penyusutan()
	{
		$this->db->select('*')
			->from('nilai_penyusutan')
			->join('asset','asset.id_asset=nilai_penyusutan.id_asset');
			
		
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	public function tampil_nilai_penyusutan_pilihan()
	{
		$this->db->select(["id_nilai_penyusutan", "id_asset","nilai_penyusutan"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function detail_nilai_penyusutan($id_nilai_penyusutan)
	{
		$this->db->select()
			->from($this->table)
			->where("id_nilai_penyusutan", $id_nilai_penyusutan);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_nilai_penyusutan($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('nilai_penyusutan');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_nilai_penyusutan($data)
	{
		$this->db->where("id_nilai_penyusutan", $this->input->post('id_nilai_penyusutan'));
		$query=$this->db->set($data)->get_compiled_update('nilai_penyusutan');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_nilai_penyusutan', $id);
    $this->db->delete('nilai_penyusutan');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
}

/* End of file M_Nilai_penyusutan.php */
/* Location: ./application/models/M_Nilai_penyusutan.php */