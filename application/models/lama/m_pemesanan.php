<?php
class M_pemesanan extends CI_Model{

	
	function validasi_tanggal($data){
	
	$query=$this->db->query("
		SELECT 
			* 
			FROM 
			jadwalbus
		LEFT JOIN 
			rute 
			ON rute.id_rute = jadwalbus.id_rutenya
		where id_jadwalbus = $data[id_jadwalbus]
		");
		return $query->row();
		
	}
	
	function get_data_grafik($data){
	$query = $this->db->query("
		SELECT DATE(`tgl_keberangkatan`) as tgl_keberangkatan, COUNT( `tgl_keberangkatan` ) as jumlah_pemesanan 
		FROM pemesanan_tiket
		LEFT JOIN penumpang ON penumpang.kode_pemesanannya = pemesanan_tiket.kode_pemesanan 
		LEFT JOIN 
		jadwalbus 
		ON jadwalbus.id_jadwalbus = pemesanan_tiket.id_jadwalbusnya 
		where `tgl_keberangkatan` LIKE '$data[datenya]%'
		GROUP BY DATE(`tgl_keberangkatan`)
		");
		return	$query->result();
		/*
		SELECT DATE(`tgl_keberangkatan`) as tgl_keberangkatan, COUNT( `tgl_keberangkatan` ) as jumlah_pemesanan 
		FROM pemesanan_tiket
		LEFT JOIN penumpang ON penumpang.kode_pemesanannya = pemesanan_tiket.kode_pemesanan 
		LEFT JOIN 
		jadwalbus 
		ON jadwalbus.id_jadwalbus = pemesanan_tiket.id_jadwalbusnya 
		where status='reserved'
		and `tgl_keberangkatan` LIKE '$data[datenya]%'
		GROUP BY DATE(`tgl_keberangkatan`)
		*/
	}
	
	function selectAllPemesanan(){
		$query=$this->db->query("SELECT * FROM pemesanan_tiket 
		LEFT JOIN penumpang ON penumpang.kode_pemesanannya = pemesanan_tiket.kode_pemesanan 
		LEFT JOIN 
		admin 
		ON admin.id_admin = pemesanan_tiket.id_adminnya 
		LEFT JOIN 
		jadwalbus 
		ON jadwalbus.id_jadwalbus = pemesanan_tiket.id_jadwalbusnya 
		LEFT JOIN 
		rute 
		ON rute.id_rute=jadwalbus.id_rutenya
		LEFT JOIN 
		bus 
		ON bus.id_bus=jadwalbus.id_busnya 
		LEFT JOIN 
		tipebus 
		ON tipebus.id_tipebus=bus.id_tipebusnya
		order by tgl_pemesanan, jam_pemesanan desc
		");
		return $query->result();
	}

	function selectAllPemesananByBus($id){
		$this->db->order_by("id_pemesan","desc");
		$query=$this->db->query("SELECT * FROM pemesanan_tiket 
		LEFT JOIN penumpang ON penumpang.kode_pemesanannya = pemesanan_tiket.kode_pemesanan 
		LEFT JOIN 
		jadwalbus 
		ON jadwalbus.id_jadwalbus = pemesanan_tiket.id_jadwalbusnya 
		LEFT JOIN 
		rute 
		ON rute.id_rute=jadwalbus.id_rutenya 
		LEFT JOIN 
		bus 
		ON bus.id_bus=jadwalbus.id_busnya 
		LEFT JOIN 
		tipebus 
		ON tipebus.id_tipebus=bus.id_tipebusnya 
		
		where id_jadwalbusnya = $id and status='reserved'");
		return $query->result();
	}


	function SelectDataPemesanan($id){
		$query=$this->db->query("SELECT * FROM pemesanan_tiket 
		LEFT JOIN 
		jadwalbus 
		ON jadwalbus.id_jadwalbus = pemesanan_tiket.id_jadwalbusnya 
		LEFT JOIN 
		rute 
		ON rute.id_rute=jadwalbus.id_rutenya
		LEFT JOIN 
		bus 
		ON bus.id_bus=jadwalbus.id_busnya 
		LEFT JOIN 
		tipebus 
		ON 
		tipebus.id_tipebus=bus.id_tipebusnya 
		
		where id_pemesan=$id ");
		return $query->row();
	}

	function getDataPemesanan(){
		$date = date("Y-m-d");
		$query=$this->db->query("SELECT * FROM jadwalbus 
		LEFT JOIN 
		bus ON bus.id_bus= jadwalbus.id_busnya 
		LEFT JOIN 
		tipebus 
		ON tipebus.id_tipebus=bus.id_tipebusnya 
		
		WHERE tgl_keberangkatan >= '$date'");
		return $query->result();
	}
	
	function UpdatePemesanan($data){
		$query=$this->db->query("UPDATE `pemesanan_tiket` SET `status` = '$data[status]]' WHERE `pemesanan_tiket`.`id_pemesan` =$data[id_pemesanan] ;");
	}
	
	function UpdatePemesanan_TanpaKursi($data){
		$query = $this->db->query(
		"
		UPDATE `pemesanan_tiket` SET 
		`nama_pemesan` = '$data[nama_pemesan]',
		`no_tlp` = '$data[no_tlp]',
		`status` = '$data[status]',
		`nama_penumpang` = '$data[nama_penumpang]',
		`total_harga` = '$data[harga]' ,
		`id_adminnya` = '$data[log_admin]' 
		WHERE 
		`id_pemesan` =$data[id_pemesan];
		"
		);
	}
	
	function UpdatePemesanan_PakaiKursi($data){
		$query = $this->db->query(
		"  	 	
		UPDATE `pemesanan_tiket` SET 
		`id_jadwalbusnya` = '$data[id_jadwalbus]',
		`no_kursi` = '$data[no_kursi]',
		`nama_pemesan` = '$data[nama_pemesan]',
		`no_tlp` = '$data[no_tlp]',
		`status` = '$data[status]',
		`nama_penumpang` = '$data[nama_penumpang]',
		`total_harga` = '$data[harga]',
		`id_adminnya` = '$data[log_admin]' 

		WHERE 
		`id_pemesan` =$data[id_pemesan];
		"
		);
	}
	
	function InputPemesanan($data){
		$tgl_sekarang = date("Y-m-d");
		$query=$this->db->query("
		INSERT INTO `pemesanan_tiket` (
		`id_pemesan` ,
		`id_jadwalbusnya` ,
		`no_kursi` ,
		`nama_pemesan` ,
		`no_tlp` ,
		`tgl_pemesanan` ,
		`status` ,
		`kode_pemesanan` ,
		`nama_penumpang` ,
		`total_harga`
		)
		VALUES (
		NULL , '$data[id_jadwalbus]', '$data[no_kursi]', '$data[nama_pemesan]', '$data[no_tlp]', '$tgl_sekarang', '$data[status]', 'by Admin', '$data[nama_penumpang]', '$data[harga]'
		);
		");
	}
	
	function SelectDataPemesanan2($kode){
		$query=$this->db->query("SELECT * FROM pemesanan_tiket 
		LEFT JOIN penumpang ON penumpang.kode_pemesanannya = pemesanan_tiket.kode_pemesanan 
		LEFT JOIN jadwalbus ON jadwalbus.id_jadwalbus = pemesanan_tiket.id_jadwalbusnya 
		LEFT JOIN rute ON rute.id_rute=jadwalbus.id_rutenya 
		LEFT JOIN bus ON bus.id_bus=jadwalbus.id_busnya 
		LEFT JOIN tipebus ON tipebus.id_tipebus=bus.id_tipebusnya where kode_pemesanan='$kode' ");
		return $query->row();
	}
	function selectDataPemesanan3($kode){
		$query2=$this->db->query("SELECT * FROM pemesanan_tiket 
		LEFT JOIN penumpang ON penumpang.kode_pemesanannya = pemesanan_tiket.kode_pemesanan 
		LEFT JOIN jadwalbus ON jadwalbus.id_jadwalbus = pemesanan_tiket.id_jadwalbusnya 
		LEFT JOIN rute ON rute.id_rute=jadwalbus.id_rutenya 
		LEFT JOIN bus ON bus.id_bus=jadwalbus.id_busnya 
		LEFT JOIN tipebus ON tipebus.id_tipebus=bus.id_tipebusnya where kode_pemesanan='$kode' ");
		return $query2->result();
	}
	
	function selectBusByDate($tgl){
		
		$query=$this->db->query("
		SELECT 
		* 
    	FROM 
			jadwalbus
		LEFT JOIN 
			rute 
			ON rute.id_rute = jadwalbus.id_rutenya
		LEFT JOIN
			bus
			ON bus.id_bus = jadwalbus.id_busnya
		LEFT JOIN
			tipebus
			ON tipebus.id_tipebus = bus.id_tipebusnya
			where `tgl_keberangkatan`='$tgl'
		");
		return $query->result();
	}

	function selectKursiBus($idBus){
		$query=$this->db->query("
		SELECT 
		* 
    	FROM 
			pemesanan_tiket
				LEFT JOIN penumpang ON penumpang.kode_pemesanannya = pemesanan_tiket.kode_pemesanan 
		where id_jadwalbusnya = $idBus
		");
		return $query->result();
	}
	
	function getJumlahKursi($idBus){
		$query=$this->db->query("
		SELECT 
			* 
			FROM 
			jadwalbus
		LEFT JOIN
			bus
			ON bus.id_bus = jadwalbus.id_busnya
		LEFT JOIN 
			tipebus 
			ON tipebus.id_tipebus = bus.id_tipebusnya
		where id_jadwalbus = $idBus
		");
		return $query->row();
	}
	
	
	function DeletePemesanan($id){
		$query=$this->db->query("DELETE FROM `pemesanan_tiket` WHERE `id_pemesan` = $id");
	}
	
	function InputSatuPenumpang($data){
	
		$this->m_pemesanan->db2 = $this->load->database('db2',TRUE);
		$sms ="Terima Kasih $data[nama_pemesan], anda memesan dengan No Kursi:$data[no_kursi1], kode verifikasi:$data[kode_pemesanan]!. Segera lakukan konfirmasi! Batas konfirmasi 3 jam setelah pemesanan! ";
		$query2=$this->db2->query("
		INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$data[no_tlp]','$sms', 'Gammu 1.25.0')
		");
		
		$this->m_pemesanan->db = $this->load->database('default',TRUE);
		
		// input pemesanan tiket
		$query=$this->db->query("
		INSERT INTO `pemesanan_tiket` (
		`id_pemesan` ,
		`id_jadwalbusnya` ,
		`nama_pemesan` ,
		`no_tlp` ,
		`tgl_pemesanan` ,
		`jam_pemesanan` ,
		`status` ,
		`kode_pemesanan` ,
		`total_harga`,
		`status_verifikasi`
		)
		VALUES 
		(
		NULL , 
		'$data[id_jadwalbus]', 
		'$data[nama_pemesan]', 
		'$data[no_tlp]', 
		'$data[tgl_pemesanan]', 
		'$data[jam_pemesanan]',
		'$data[status]', 
		'$data[kode_pemesanan]', 
		'$data[harga]',
		'Belum'
		);
		");	
		
		// input nama penumpang
		$query=$this->db->query("
		INSERT INTO `penumpang` (
		`id_penumpang` ,
		`kode_pemesanannya` ,
		`nama_penumpang`,
		`no_kursi`,
		`penumpang_ke`
		)
		VALUES 
		(
		NULL , 
		'$data[kode_pemesanan]', 
		'$data[nama_penumpang1]',
		'$data[no_kursi1]',
		'1'
		);
		");	
	}
	
	function InputDuaPenumpang($data){
	$this->m_pemesanan->db2 = $this->load->database('db2',TRUE);
		$sms ="Terima Kasih $data[nama_pemesan], anda memesan dengan No Kursi:$data[no_kursi1], dan No Kursi2:$data[no_kursi2], kode verifikasi:$data[kode_pemesanan]!. Batas konfirmasi 3 jam setelah pemesanan! ";
		$query2=$this->db2->query("
		INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$data[no_tlp]','$sms', 'Gammu 1.25.0')
		");
		
		$this->m_pemesanan->db = $this->load->database('default',TRUE);
	
		// input pemesanan tiket
		$query=$this->db->query("
		INSERT INTO `pemesanan_tiket` (
		`id_pemesan` ,
		`id_jadwalbusnya` ,
		`nama_pemesan` ,
		`no_tlp` ,
		`tgl_pemesanan` ,
		`jam_pemesanan` ,
		`status` ,
		`kode_pemesanan` ,
		`total_harga`,
		`status_verifikasi`
		)
		VALUES 
		(
		NULL , 
		'$data[id_jadwalbus]', 
		'$data[nama_pemesan]', 
		'$data[no_tlp]', 
		'$data[tgl_pemesanan]', 
		'$data[jam_pemesanan]',
		'$data[status]', 
		'$data[kode_pemesanan]', 
		'$data[harga]',
		'Belum'
		);
		");	
		
		// input nama penumpang
		$query=$this->db->query("
		INSERT INTO `penumpang` (
		`id_penumpang` ,
		`kode_pemesanannya` ,
		`nama_penumpang`,
		`no_kursi`,
		`penumpang_ke`
		)
		VALUES 
		(
		NULL , 
		'$data[kode_pemesanan]', 
		'$data[nama_penumpang1]',
		'$data[no_kursi1]',
		'1'
		),
		(
		NULL , 
		'$data[kode_pemesanan]', 
		'$data[nama_penumpang2]',
		'$data[no_kursi2]',
		'2'
		);
		");	
	}

	function InputTigaPenumpang($data){
	$this->m_pemesanan->db2 = $this->load->database('db2',TRUE);
		$sms ="Terima Kasih $data[nama_pemesan], anda memesan dengan No Kursi:$data[no_kursi1], No Kursi2:$data[no_kursi2], dan No Kursi3:$data[no_kursi3],kode verifikasi:$data[kode_pemesanan]!.Batas konfirmasi 3 jam setelah pemesanan! ";
		$query2=$this->db2->query("
		INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$data[no_tlp]','$sms', 'Gammu 1.25.0')
		");
		
		$this->m_pemesanan->db = $this->load->database('default',TRUE);
	
		// input pemesanan tiket
		$query=$this->db->query("
		INSERT INTO `pemesanan_tiket` (
		`id_pemesan` ,
		`id_jadwalbusnya` ,
		`nama_pemesan` ,
		`no_tlp` ,
		`tgl_pemesanan` ,
		`jam_pemesanan` ,
		`status` ,
		`kode_pemesanan` ,
		`total_harga`,
		`status_verifikasi`
		)
		VALUES 
		(
		NULL , 
		'$data[id_jadwalbus]', 
		'$data[nama_pemesan]', 
		'$data[no_tlp]', 
		'$data[tgl_pemesanan]', 
		'$data[jam_pemesanan]',
		'$data[status]', 
		'$data[kode_pemesanan]', 
		'$data[harga]',
		'Belum'
		);
		");	
		
		
		// input nama penumpang
		$query=$this->db->query("
		INSERT INTO `penumpang` (
		`id_penumpang` ,
		`kode_pemesanannya` ,
		`nama_penumpang`,
		`no_kursi`,
		`penumpang_ke`
		)
		VALUES 
		(
		NULL , 
		'$data[kode_pemesanan]', 
		'$data[nama_penumpang1]',
		'$data[no_kursi1]',
		'1'
		),
		(
		NULL , 
		'$data[kode_pemesanan]', 
		'$data[nama_penumpang2]',
		'$data[no_kursi2]',
		'2'
		),
		(
		NULL , 
		'$data[kode_pemesanan]', 
		'$data[nama_penumpang3]',
		'$data[no_kursi3]',
		'3'
		);
		");	

	}	
}
?>