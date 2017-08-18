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

	function selectSummaryTransaksi($id_user){
		$query=$this->db->query("
		SELECT bus.`plat_nomer` , summaryTable . * 
		FROM (

			SELECT tempTableAll.`ID_bus` , tempTableAll.`all_transaction` , tempTableToday.`today_transaction` 
			FROM (

				SELECT  `ID_bus` , SUM(  `harga_total` ) AS  'all_transaction'
				FROM  `transaksi` 
				GROUP BY  `ID_bus`
			) AS tempTableAll
			LEFT JOIN (

				SELECT  `ID_bus` , SUM(  `harga_total` ) AS  'today_transaction'
				FROM (
		
					SELECT * 
					FROM  `transaksi` 
					WHERE DATE(  `date_time` ) = DATE( NOW( ) )
					) AS temp
				GROUP BY  `ID_bus`
				) AS tempTableToday ON tempTableAll.`ID_bus` = tempTableToday.`ID_bus`
			) AS summaryTable,  `bus` 
			WHERE  `bus`.`ID` = summaryTable.`ID_bus` 
		");
		return $query->result();
	}
	
	function reportTransaksiBusToday($id_user,$id_bus){
		$date = date("Y-m-d");
		$query=$this->db->query("
		SELECT table1.`plat_nomer` , table1.`nama_trayek` , table1.`asal` , table2.`tujuan` , table1.`jumlah_tiket` , table1.`harga_total` , table1.`date_time` 
		FROM (

			SELECT transaksi.ID, bus.plat_nomer, trayek.nama_trayek, lokasi.nama_lokasi AS asal, jumlah_tiket, harga_total, date_time
			FROM transaksi, bus, trayek, lokasi
			WHERE transaksi.ID_bus = bus.ID
			AND ID_lokasi_asal = lokasi.ID
			AND transaksi.ID_trayek = trayek.ID
			AND transaksi.ID_bus =$id_bus
			AND transaksi.ID_user =$id_user
			AND date(transaksi.date_time) = date(now())
			ORDER BY date_time DESC
			) AS table1, (

			SELECT transaksi.ID, lokasi.nama_lokasi AS tujuan
			FROM transaksi, lokasi
			WHERE ID_lokasi_tujuan = lokasi.ID
			AND transaksi.ID_bus =$id_bus
			AND transaksi.ID_user =$id_user
			AND date(transaksi.date_time) = date(now())
			) AS table2
			WHERE table1.`ID` = table2.`ID`
		");
		return $query->result();
	}

	function reportTransaksiBusOverall($id_user,$id_bus){
		$date = date("Y-m-d");;
		$query=$this->db->query("
		SELECT table1.`plat_nomer` , table1.`nama_trayek` , table1.`asal` , table2.`tujuan` , table1.`jumlah_tiket` , table1.`harga_total` , table1.`date_time` 
		FROM (

			SELECT transaksi.ID, bus.plat_nomer, trayek.nama_trayek, lokasi.nama_lokasi AS asal, jumlah_tiket, harga_total, date_time
			FROM transaksi, bus, trayek, lokasi
			WHERE transaksi.ID_bus = bus.ID
			AND ID_lokasi_asal = lokasi.ID
			AND transaksi.ID_trayek = trayek.ID
			AND transaksi.ID_bus =$id_bus
			AND transaksi.ID_user =$id_user
			ORDER BY date_time DESC
			) AS table1, (

			SELECT transaksi.ID, lokasi.nama_lokasi AS tujuan
			FROM transaksi, lokasi
			WHERE ID_lokasi_tujuan = lokasi.ID
			AND transaksi.ID_bus =$id_bus
			AND transaksi.ID_user =$id_user
			) AS table2
			WHERE table1.`ID` = table2.`ID`
		");
		return $query->result();
	}		

	function selectTransaksiToday($id_user){
		$date = date("Y-m-d");;
		$query=$this->db->query("
		SELECT HOUR(date_time) as jam, COUNT(*) as jumlah FROM transaksi
		where Date(date_time) = Date(now()) and ID_user=$id_user
		GROUP BY HOUR(date_time)
		");
		return $query->result();
	}
	
	function jumlahBus($id_user){
		$query=$this->db->query("
		SELECT COUNT(ID_user) as jumlah_bus FROM bus where ID_user = $id_user	
		");
		return $query->row();
	}

	function jumlahTrayek($id_user){
		$query=$this->db->query("
		SELECT COUNT(ID_user) as jumlah_trayek FROM trayek where ID_user = $id_user	
		");
		return $query->row();
	}

}
?>