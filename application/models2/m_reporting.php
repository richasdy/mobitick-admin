<?php
	class M_reporting extends CI_Model {
		
	function selectAllTransaksi($id_user){
		$query=$this->db->query("
		SELECT DISTINCT bus.plat_nomer, trayek.nama_trayek, lokasi.nama_lokasi as asal,  jumlah_tiket,harga_total, transaksi.longitude, transaksi.longitude,
		date_time, lokasi.nama_lokasi as asal, lokasi.nama_lokasi as tujuan from transaksi, bus, trayek, lokasi where transaksi.ID_bus = bus.ID and ID_lokasi_asal = lokasi.ID and transaksi.ID_trayek = trayek.ID
		ORDER BY date_time DESC

		");
		return $query->result();
	}

}
?>