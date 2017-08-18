<?php
class M_konfirmasi extends CI_Model{

	function selectAllkonfirmasi(){
		
		$query=$this->db->query("SELECT * 
		FROM 
		pemesanan_tiket 
		LEFT JOIN
		konfirmasi
		ON
		konfirmasi.id_pemesanan_tiketnya = pemesanan_tiket.id_pemesan
		where 
		status_verifikasi = 'Belum' GROUP BY(kode_pemesanan)");
		return $query->result();
		
		
	}
	function UpdateKonfirmasinya($data){
		// ambil data pelanggan
		$this->m_konfirmasi->db = $this->load->database('default', TRUE);
		$query3=$this->db->query("SELECT * FROM `pemesanan_tiket` 
		LEFT JOIN
		jadwalbus
		ON
		jadwalbus.id_jadwalbus = pemesanan_tiket.id_jadwalbusnya WHERE `kode_pemesanan`=$data[kode_pemesanan] 
		"); 
		$row = $query3->row();
		//echo 'test:'.$row->no_tlp;
		
		// kirim sms ke pelanggan
		$this->m_konfirmasi->db2 = $this->load->database('db2', TRUE);
		$sms ="Terima Kasih $row->nama_pemesan, Data anda sudah kami validasi. Jadwal keberangkatan anda : $row->tgl_keberangkatan, Jam : $row->jam. Silahkan Download Tiket anda dengan kode tiket $row->kode_pemesanan.";
		$query4=$this->db2->query("
		INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$row->no_tlp', '$sms', 'Gammu 1.25.0')
		");  
		
		// update verifikasi data
		$this->m_konfirmasi->db = $this->load->database('default', TRUE);
		$query=$this->db->query("UPDATE 
		`pemesanan_tiket` SET 
		`status` = '$data[status]',
		`id_adminnya` = '$data[log_admin]',
		`status_verifikasi` = 'Sudah'
		 WHERE `kode_pemesanan` = 	$data[kode_pemesanan];");
	
	}
	function ProsesKonfirmasi($data){
		
		
		// ambil data pelanggan
		$this->m_konfirmasi->db = $this->load->database('default', TRUE);
		$query3=$this->db->query("SELECT * FROM `pemesanan_tiket` WHERE `kode_pemesanan`=$data[kode_pemesanan] 
		"); 
		$row = $query3->row();
		//echo 'test:'.$row->no_tlp;
		
		// kirim sms ke pelanggan
		$this->m_konfirmasi->db2 = $this->load->database('db2', TRUE);
		$sms ="Terima Kasih $row->nama_pemesan, Data anda akan segera kami validasi.";
		$query4=$this->db2->query("
		INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$row->no_tlp', '$sms', 'Gammu 1.25.0')
		");  
		
		// update verifikasi data
		$this->m_verifikasi->db = $this->load->database('default', TRUE);
		$query=$this->db->query("
		UPDATE `pemesanan_tiket` 
		SET
		`bukti_bayar` = '$data[file_name]',
		`ket_lain` = '$data[ket_lain]',
		`status_verifikasi` = 'Belum'
		WHERE `kode_pemesanan` = '$data[kode_pemesanan]';
		");
		// input data verifikasi		 	 	 	 	 	 	
		$query2=$this->db->query(
		"INSERT INTO `verifikasi` 
		(`id_verifikasi` ,`id_pemesanan_tiketnya` ,`nama_pengirim` ,`no_rekening` ,`rekening_tujuan`, `total_bayar` ,`tgl_pengiriman`)
		VALUES 
		(NULL , '$data[id_pemesan]', '$data[namaPengirim]', '$data[norek]', '$data[rektujuan]', '$data[totalbayar]', '$data[tanggal]')
		;"
		);
	}
	
	
	function Updateverifikasi($data){
		
		// ambil data pelanggan
		$this->m_verifikasi->db = $this->load->database('default', TRUE);
		$query3=$this->db->query("SELECT * FROM `pemesanan_tiket` 
		LEFT JOIN
		jadwalbus
		ON
		jadwalbus.id_jadwalbus = pemesanan_tiket.id_jadwalbusnya
		WHERE `kode_pemesanan`=$data[kode_pemesanan] 
		"); 
		$row = $query3->row();
		echo 'test:'.$row->no_tlp;
		
		// kirim sms ke pelanggan
		$this->m_verifikasi->db2 = $this->load->database('db2', TRUE);
		$sms ="Terima Kasih $data[nama_pemesan], Data anda sudah kami verifikasi. Jadwal keberangkatan anda : $row->tgl_keberangkatan, Jam : $row->jam. Silahkan Download Tiket anda dengan kode tiket $row->kode_pemesanan.";
		$query4=$this->db2->query("
		INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$row->no_tlp', '$sms', 'Gammu 1.25.0')
		");  
		
		// update verifikasi data
		$this->m_verifikasi->db = $this->load->database('default', TRUE);
		$query=$this->db->query("UPDATE `pemesanan_tiket` 
		SET 
		`kode_pemesanan` = '$data[kode_pemesanan]',
		`nama_pengirim` = '$data[nama_pengirim]',
		`norek` = '$data[norek]',
		`rektujuan` = '$data[rektujuan]',
		`totalbayar` = '$data[totalbayar]',
		`tgl_pengiriman` = '$data[tgl_pengiriman]',
		`bukti_bayar` = '$data[bukti_bayar]',
		WHERE 
		`id_verifikasi` =$data[id_verifikasi]
		;");
	}
	
	function getTiket($kode){
		$query=$this->db->query("SELECT * FROM pemesanan_tiket 
		LEFT JOIN
		jadwalbus
		ON
		jadwalbus.id_jadwalbus = pemesanan_tiket.id_jadwalbusnya
		LEFT JOIN
		rute
		ON
		rute.id_rute = jadwalbus.id_rutenya
		LEFT JOIN
		bus
		ON
		bus.id_bus = jadwalbus.id_busnya
		LEFT JOIN
		tipebus
		ON
		tipebus.id_tipebus = bus.id_tipebusnya
		where kode_pemesanan=$kode");
		return $query->result();
	}
	function CekKodePemesanan($data){
		$query=$this->db->query("SELECT * FROM pemesanan_tiket where kode_pemesanan=$data[kode_pemesanan]");
		if($query->num_rows() > 0) {
			return $query->row();}
	}
	function CekKodePemesananDownload($data){
			$query=$this->db->query("SELECT * FROM pemesanan_tiket where kode_pemesanan=$data[kode_pemesanan] and status='reserved'");
		if($query->num_rows() > 0) {
			return $query->row();}
	}

}
?>