<?php
	class M_track extends CI_Model {
		
	function selectAllRute($id_user){
		$query=$this->db->query("SELECT * FROM trayek where ID_user=$id_user");
		return $query->result();
	}
	
	function selectRute($id_trayek){
		$query=$this->db->query("SELECT * FROM trayek where ID=$id_trayek");
		return $query->row();
	}

	function selectDetailRuteMaju($data){
		$query=$this->db->query("
		SELECT 
		urutan_trayek, nama_lokasi as kota 
		FROM harga_lokasi_trayek
		LEFT JOIN
		lokasi
		ON
		lokasi.ID = harga_lokasi_trayek.ID_lokasi_asal 
		where ID_trayek = '$data[id_trayek_maju]' and ID_user = '$data[id_user]'
		ORDER BY urutan_trayek ASC

		");
		return $query->result();
	}
	function selectDetailRuteBalik($data){
		$query=$this->db->query("
		
		SELECT 
		urutan_trayek, nama_lokasi as kota 
		FROM harga_lokasi_trayek
		LEFT JOIN
		lokasi
		ON
		lokasi.ID = harga_lokasi_trayek.ID_lokasi_asal 
		where ID_trayek = '$data[id_trayek_balik]' and ID_user = '$data[id_user]'
		ORDER BY urutan_trayek ASC
		
		");
		return $query->result();
	}
	function selectKota($id_user){
		$query=$this->db->query("
		SELECT ID, nama_lokasi
		FROM lokasi
		WHERE ID_user = $id_user
		");
		return $query->result();
	}
	function selectAllDataKota($id_user){
		$query=$this->db->query("
		SELECT *
		FROM lokasi
		WHERE ID_user = $id_user
		");
		return $query->result();
	}
	
	function poolasal($id){
		$poolasal=$this->db->query("SELECT nama_lokasi FROM lokasi where ID=$id");
		return $poolasal->row();
	}
	
	function pooltujuan($id){
		$pooltujuan=$this->db->query("SELECT nama_lokasi FROM lokasi where ID=$id");
		return $pooltujuan->row();
	}
	
	function getIdTrayekAsal($data){
		$idtrayek1=$this->db->query("SELECT ID FROM trayek where nama_trayek='$data[nama_pool_asal] - $data[nama_pool_tujuan]' and ID_user=$data[id_user]");
		return $idtrayek1->row();
	}
	
	function getIdTrayekTujuan($data){
		$idtrayek1=$this->db->query("SELECT ID FROM trayek where nama_trayek='$data[nama_pool_tujuan] - $data[nama_pool_asal]' and ID_user=$data[id_user]");
		return $idtrayek1->row();
	}
	

	function submitTrack($data){
		// trayek maju
		$query=$this->db->query("
		INSERT INTO `trayek` (
		`ID` ,
		`nama_trayek` ,
		`ID_user`
		)
		VALUES (
		NULL , 
		'$data[nama_pool_asal] - $data[nama_pool_tujuan]', 
		'$data[id_user]'
		);");
		
		// trayek balik
		$query2=$this->db->query("
		INSERT INTO `trayek` (
		`ID` ,
		`nama_trayek` ,
		`ID_user`
		)
		VALUES (
		NULL , 
		'$data[nama_pool_tujuan] - $data[nama_pool_asal]', 
		'$data[id_user]'
		);");
				
	}

	function editHargaLokasiTrayek($data){
		
	}
	
	function submitHargaLokasiTrayek($data){
	
		// Tabel: harga_lokasi_trayek
		// ID_lokasi_asal 	ID_lokasi_tujuan 	harga 	ID_trayek 	urutan_trayek 

		for ( $i = 1; $i <= ($data['maju']-1); $i ++) {
			$dataArray = array(
				   'ID_lokasi_asal' => $data['kota'.$i],
				   'ID_lokasi_tujuan' => $data['kota'.($i+1)],
				   'harga' => $data['harga'.($i+1)],
				   'ID_trayek' => $data['idTrayekAsal'],
				   'urutan_trayek' => $i
				);
			$this->db->insert('harga_lokasi_trayek', $dataArray);
		}
		 		
		for ( $i = 1; $i <= ($data['balik']-1); $i ++) {
			$dataArray2 = array(
				   'ID_lokasi_asal' => $data['kotab'.$i],
				   'ID_lokasi_tujuan' => $data['kotab'.($i+1)],
				   'harga' => $data['hargab'.($i+1)],
				   'ID_trayek' => $data['idTrayekTujuan'],
				   'urutan_trayek' => $i
				);
			$this->db->insert('harga_lokasi_trayek', $dataArray2);
		}

		
	}
	
	function _editTrackName($trackID,$track1,$track2)
	{
		$query1 = "UPDATE `trayek` SET  `nama_trayek` =  '$track1' WHERE  `trayek`.`ID` =$trackID;";
		$query2 = "UPDATE `trayek` SET  `nama_trayek` =  '$track2' WHERE  `trayek`.`ID` =".($trackID+1);
	}
	//************************************************************
	// BUS
	//************************************************************
	function selectAllBus($id_user){
		$query=$this->db->query("SELECT * FROM bus where ID_user=$id_user");
		return $query->result();
	}
	
	function tempDeleteTrack($id_track)
	{
		$this->db->delete('harga_lokasi_trayek', array('ID_trayek' => $id_track)); 
		$this->db->delete('harga_lokasi_trayek', array('ID_trayek' => ($id_track + 1))); 
	}
	
	function submitKota($data){
			$dataArray = array(
				   'ID' => '',
				   'nama_lokasi' => $data['nama_kota'],
				   'ID_user' => $data['id_user'],
				   'latitude' => $data['latitude'],
				   'longitude' => $data['longitude']
				);
			$this->db->insert('lokasi', $dataArray);
		}
	
	
	function updateKota($data){
			$dataArray = array(
				   'nama_lokasi' => $data['nama_kota'],
				   'latitude' => $data['latitude'],
				   'longitude' => $data['longitude']
				);
			$this->db->where('ID', $data['id_kota']);
			$this->db->update('lokasi', $dataArray); 
	}
	
	function getIdTrayekAsalnya($data){
		$idtrayekasal=$this->db->query("SELECT * FROM harga_lokasi_trayek where ID_lokasi_asal=$data[id_kota]");
		return $idtrayekasal->row();
	}

	function getIdTrayekBaliknya($data){
		$idtrayekbalik=$this->db->query("SELECT * FROM harga_lokasi_trayek where ID_lokasi_tujuan=$data[id_kota]");
		return $idtrayekbalik->row();
	}

	function deleteKota($data){
			$this->db->delete('harga_lokasi_trayek', array('ID_lokasi_asal' => $data['id_kota'])); 
			$this->db->delete('harga_lokasi_trayek', array('ID_lokasi_tujuan' => $data['id_kota'])); 
			$this->db->delete('lokasi', array('ID' => $data['id_kota'])); 
	}
	
	function deleteTrayek($data){
			$this->db->delete('trayek', array('ID' => $data['id_trayek_asal'])); 
			$this->db->delete('trayek', array('ID' => $data['id_trayek_balik'])); 
	}
	
	function selectDataKota($id){
		$query=$this->db->query("SELECT * FROM lokasi where ID=$id");
		return $query->row();
	}



}
?>