<?php
class M_laporan extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
  function report_sewa($startdate,$enddate)
  {
    $query = "SELECT
                    id_sewa,
                    id_karyawan,
                    tgl_transaksi,
                    id_customer,
                    dp,
                    subtotal
              FROM sewa
          WHERE tgl_transaksi >= '$startdate' AND tgl_transaksi <= '$enddate'
          ORDER BY id_sewa ASC";
		return $this->db->query($query);
	}
	
	function total($startdate,$enddate)
	{
		$query = "SELECT
						sum(subtotal) as subtotal
				  FROM sewa
			  WHERE tgl_transaksi >= '$startdate' AND tgl_transaksi <= '$enddate'
			  ORDER BY id_sewa ASC";
			return $this->db->query($query);
	}

	function report_pembayaran($startdate,$enddate)
	{
		$query = "SELECT
					id_pembayaran,
                    id_sewa,
					subtotal,
					tgl_bayar,
					jumlah_bayar,
					jenis_bayar,
					status
              FROM pembayaran
          WHERE tgl_bayar >= '$startdate' AND tgl_bayar <= '$enddate'
          ORDER BY id_pembayaran ASC";
		return $this->db->query($query);
	}
	
	function total_pembayaran($startdate,$enddate)
	{
		$query = "SELECT
						sum(subtotal) as subtotal
				  FROM pembayaran
			  WHERE tgl_bayar >= '$startdate' AND tgl_bayar <= '$enddate'
			  ORDER BY id_pembayaran ASC";
			return $this->db->query($query);
	}
}
