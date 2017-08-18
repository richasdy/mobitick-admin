<?php
	class M_bus extends CI_Model {
		
	function selectAllBus($id_user){
		$query=$this->db->query("SELECT * FROM bus where ID_user=$id_user");
		return $query->result();
	}
	
	function selectAllBusMap($id_user){
		$query=$this->db->query("SELECT * FROM bus 
		LEFT JOIN
		raw_track_data
		ON
		raw_track_data.ID_Bus = bus.ID
		where ID_user=$id_user");
		return $query->result();
	}
	
	
	function selectBus($data){
		$query=$this->db->query("SELECT * FROM bus where ID_user=$data[id_user] and ID=$data[id_bus]");
		return $query->row();
	}
	
	function submitBus($data){
		$dataArray = array(
				   'ID' => '',
				   'ID_user' => $data['id_user'],
				   'plat_nomer' => $data['plat_nomer']
				);
		$this->db->insert('bus', $dataArray);
	}
	
	function updateBus($data){
		$dataArray = array(
				   'plat_nomer' => $data['plat_nomer']
				);
		$this->db->where('ID', $data['id_bus']);
		$this->db->where('ID_user', $data['id_user']);
		$this->db->update('bus', $dataArray); 
	}
	function deleteBus($data){
			$this->db->delete('raw_track_data', array('ID_bus' => $data['id_bus'])); 
			$this->db->delete('bus', array('ID' => $data['id_bus'])); 
	}
	
	
}
?>