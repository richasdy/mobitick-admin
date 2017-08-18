<?php
class M_kendaraan extends CI_Model{


	function selectAllKendaraan(){
	
		$this->db->order_by("id_bus","desc");
		$query=$this->db->query("
		SELECT * FROM bus 
		LEFT JOIN 
		tipebus 
		ON 
		tipebus.id_tipebus = bus.id_tipebusnya
		");
		return $query->result();
	}


	function SelectDataKendaraan($id){
	
		$query=$this->db->query("SELECT * FROM bus LEFT JOIN tipebus ON tipebus.id_tipebus = bus.id_tipebusnya where id_bus=$id");
		return $query->row();
	}
	function selectDataTipeBus($id){
	
		$query=$this->db->query("SELECT * FROM tipebus where id_tipebus=$id");
		return $query->row();
	}

	function getDataKendaraan(){
	
	$query=$this->db->query("SELECT * FROM tipebus");
	return $query->result();
	}
	
	
	function UpdateKendaraan($data){
	$query=$this->db->query(
	"UPDATE `bus` SET `nama_bus` = '$data[nama_bus]',
	`id_tipebusnya` = '$data[id_tipebus]',
	`nama_supir` = '$data[nama_supir]',
	`no_polisi` = '$data[no_polisi]' WHERE `bus`.`id_bus` =$data[id_bus];
	");
	}
	
	function UpdateTipeBus($data){
	$query=$this->db->query(
	"UPDATE `tipebus` 
	SET 
	`nama_tipe` = '$data[nama_tipe]',
	`harga` = '$data[harga]',
	`jumlah_kursi` = '$data[jumlah_kursi]'
	WHERE `id_tipebus` =$data[id_tipebus];
	");
	}

	
	function InputKendaraan($data){
	$query=$this->db->query("
	INSERT INTO `bus` (`id_bus` , `nama_bus` , `id_tipebusnya` , `nama_supir` , `no_polisi`)
	VALUES (NULL , '$data[nama_bus]', '$data[id_tipebusnya]', '$data[nama_supir]', '$data[no_polisi]'
	);
	");
	}
	function InputTipeBus($data){
	$query=$this->db->query("
	INSERT INTO `tipebus` (`id_tipebus` , `nama_tipe` , `harga` , `jumlah_kursi`)
	VALUES (NULL , '$data[nama_tipe]', '$data[harga]', '$data[jumlah_kursi]'
	);
	");
	}
	
	function DeleteKendaraan($id){
		$query=$this->db->query("DELETE FROM `bus` WHERE `id_bus` =$id");
	}
	function DeleteTipeBus($id){
		$query=$this->db->query("DELETE FROM `tipebus` WHERE `id_tipebus` =$id");
	}

}
?>