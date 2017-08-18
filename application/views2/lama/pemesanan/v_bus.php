<select style="color:#888; font-size:12px; padding:5px 5px 5px 5px;" onChange="ubah_bus()" id="idBusnya" name="id_jadwalbus" required>

<?php
	if(empty($query))
	{
		echo '<option>No Schedule</option>';
	}
	else
	{
		echo '<option value="0"></option>';
		foreach ($query as $row)
		{
			echo ' 
			<option value="'.$row->id_jadwalbus.'_'.$row->harga.'">
			Bus : '.$row->nama_tipe.' | 
			Pool : '.$row->nama_pool.' |
			Tujuan : '.$row->kota_akhir.'
			
			</option>';
		}
	}
	
?>
</select>