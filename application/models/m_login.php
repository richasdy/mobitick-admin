<?php
	class M_login extends CI_Model {
		
		function validasi_login($data) 
		{ 
		$array = array('username' => $data['u'],'password' => $data['p']);
		$this->db->where($array);
		$query = $this->db->get("user");
		if($query->num_rows() > 0) {
			return $query->row();}
		}
		
	}
	?>