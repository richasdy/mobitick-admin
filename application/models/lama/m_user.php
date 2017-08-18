<?php
class M_user extends CI_Model{

	function selectAllUser(){
		$query=$this->db->get("admin");
		return $query->result();
	}
	
	function SelectDataUser($id){
			$query=$this->db->query("SELECT * FROM admin where id_admin=$id");
			return $query->row();
	}

	function getDataUser(){
		$query=$this->db->query("SELECT * FROM admin");
		return $query->result();
	}
	
	
	function UpdateUser($data){
		$query=$this->db->query("
		UPDATE `admin` 
		SET 
		`nama_admin` = '$data[nama_admin]', 
		`username` = '$data[username]',
		`password` = '$data[password]',
		`status_admin` = '$data[status_admin]' 
		WHERE 
		`id_admin` =$data[id_admin];
		");
	}
	
	function InputUser($data){
		$query=$this->db->query("INSERT INTO admin (`id_admin` ,`nama_admin` ,`username` ,`password` ,`status_admin`)VALUES ('' , '$data[nama_admin]', '$data[username]', '$data[password]', '$data[status_admin]');");
	}
	
	function DeleteUser($id){
		$query=$this->db->query("DELETE FROM `admin` WHERE `admin`.`id_admin` = $id");
	}
}
?>