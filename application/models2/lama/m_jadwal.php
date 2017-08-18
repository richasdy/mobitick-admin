<?php
class M_jadwal extends CI_Model{
	
	function validasi_jadwal($data) 
		{ 
		$array = array('tgl_keberangkatan' => $data['tgl_keberangkatan'],'id_busnya' => $data['id_busnya'],'id_rutenya' => $data['id_rute']);
		$this->db->where($array);
		$query = $this->db->get("jadwalbus");
		if($query->num_rows() > 0) {
			return $query->row();}
		}
		

	function selectAllJadwal(){
		$this->db->order_by("id_jadwalbus","desc");
		$query=$this->db->query("
		SELECT * FROM 
		jadwalbus 
		LEFT JOIN 
		bus 
		ON 
		bus.id_bus = jadwalbus.id_busnya
		LEFT JOIN
		tipebus
		ON
		tipebus.id_tipebus=bus.id_tipebusnya
		LEFT JOIN
		rute
		ON
		rute.id_rute=jadwalbus.id_rutenya
		");
		return $query->result();
	}
	
	function SelectDataJadwal($id){
	
		$query=$this->db->query("
		SELECT * FROM 
		jadwalbus 
		LEFT JOIN 
		bus 
		ON 
		bus.id_bus = jadwalbus.id_busnya
		LEFT JOIN
		rute
		ON
		rute.id_rute = jadwalbus.id_rutenya
		LEFT JOIN
		tipebus
		ON
		tipebus.id_tipebus=bus.id_tipebusnya
		
		where id_jadwalbus=$id");
		return $query->row();
	}

	function getDataJadwal(){
	
		$query=$this->db->query("SELECT * FROM jadwalbus 
		LEFT JOIN 
		bus 
		ON bus.id_bus = jadwalbus.id_busnya 
		LEFT JOIN 
		rute 
		ON rute.id_rute=jadwalbus.id_rutenya
		");
		return $query->result();
	}
	
	
	function UpdateJadwal($data){
	
		$query=$this->db->query("
		UPDATE `jadwalbus` SET 
		`tgl_keberangkatan` = '$data[tgl_keberangkatan]',
		`id_busnya` = '$data[id_busnya]',
		`jam` = '$data[jam_keberangkatan]',
		`id_rutenya` = '$data[id_rutenya]'
		WHERE 
		`id_jadwalbus` =$data[id_jadwalbus];");
	}
	
	function UpdateRute($data){
		$query=$this->db->query("
		UPDATE `rute` SET 
		`nama_pool` = '$data[nama_pool]',
		`tlp_pool` = '$data[tlp_pool]',
		`jam_berangkatbus` 	= '$data[jam_berangkatbus]',
		`kota_awal` = '$data[kota_awal]',
		`kota_akhir` = '$data[kota_akhir]',
		`lokasi_keberangkatan` 	= '$data[lokasi_keberangkatan]'
		WHERE 
		`id_rute` =$data[id_rute];");
	}
	
	function InputJadwal($data){
		$query=$this->db->query(
		
		"INSERT INTO  `jadwalbus` 
		(`id_jadwalbus` ,`tgl_keberangkatan` ,`id_busnya` ,`jam` ,`id_rutenya`)
			VALUES 
			(NULL , '$data[tgl_keberangkatan]', '$data[id_busnya]', '$data[jam]', '$data[id_rute]')
		;"
		);
	}
	
	function InputRute($data){
		$query=$this->db->query(
		"INSERT INTO `rute` 
		(`id_rute` , `nama_pool` , `tlp_pool`, `jam_berangkatbus` , `kota_awal` ,`kota_akhir` ,`lokasi_keberangkatan`)
		VALUES 
		(NULL , '$data[nama_pool]', '$data[tlp_pool]', '$data[jam_berangkatbus]', '$data[kota_awal]', '$data[kota_akhir]', '$data[lokasi_keberangkatan]')
		;"
		);
	}
	
	function DeleteJadwal($id){
		$query=$this->db->query("DELETE FROM `jadwalbus` WHERE `id_jadwalbus` = $id");
	}
	
	function DeleteRute($id){
		$query=$this->db->query("DELETE FROM `rute` WHERE `id_rute` = $id");
	}
	
	
	function selectAllRute(){
		$this->db->order_by("id_rute","asc");
		$query=$this->db->query("SELECT * FROM rute");
		return $query->result();
	}
	
	function selectRute($id){
		$query=$this->db->query("SELECT * FROM rute where id_rute = $id");
		return $query->row();
	}
	
	function getKursiBus($id_jadwalbus){
	$query = $this->db->query("
	SELECT *
	FROM jadwalbus
	LEFT JOIN rute ON rute.id_rute = jadwalbus.id_rutenya
	LEFT JOIN bus ON bus.id_bus = jadwalbus.id_busnya
	LEFT JOIN pemesanan_tiket ON pemesanan_tiket.id_jadwalbusnya = jadwalbus.id_jadwalbus
	LEFT JOIN penumpang ON penumpang.kode_pemesanannya = pemesanan_tiket.kode_pemesanan 
	WHERE id_jadwalbus =$id_jadwalbus
	AND STATUS = 'reserved'
	");	
	return $query->num_rows();
	}
	
}
?>