<?php
if(!function_exists('tgl_sekarang')){
	function tgl_sekarang(){
		$query = mysql_query('select curdate() as tgl from dual');
		$row = mysql_fetch_array($query);
		return $row['tgl'];
	}
}
?>