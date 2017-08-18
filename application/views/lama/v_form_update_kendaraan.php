	<div class="g_12">
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms">Update Data kendaraan</h4>
    <div class="simple_buttons" style="float:right; margin-top:5px; margin-right:-10px;">
	<div class="bwIcon i_16_help" onclick="hiddenForm4()">keluar</div>
	</div>
	</div>
	
	<div class="widget_contents noPadding">
		<form action="edit_kendaraan" method="post" >
	<div class="line_grid">
	<div class="g_3"><span class="label">Nama Bus</span></div>
	<div class="g_9">
		<input class="simple_field" type="text" value="<?php echo $query->nama_bus;?>" name="nama_bus" />
	</div>
	</div>
	
	<div class="line_grid">
	<div class="g_3"><span class="label">Tipe Bus</span></div>
	<div class="g_9">
		<select style="color:#888; font-size:12px; padding:5px 5px 5px 5px;" onChange="ubah_bus()" id="idBusnya" name="id_tipebus">
	<?php
		foreach ($query2 as $row)
		{
			if($query->id_tipebusnya==$row->id_tipebus)
			{
			$select="selected"
			;}
			else
			{
			$select=''
			;}
			echo ' <option value="'.$row->id_tipebus.'" '.$select.'>'.$row->nama_tipe.'</option>';
		}
	
	
	?>
		</select>
	</div>
	</div>
	
	<div class="line_grid">
	<div class="g_3"><span class="label">Nama Supir</span></div>
	<div class="g_9">
		<input class="simple_field" type="text" value="<?php echo $query->nama_supir;?>" name="nama_supir" />
	</div>
	</div>
	
	<div class="line_grid">
	<div class="g_3"><span class="label">No Polisi</span></div>
	<div class="g_9">
		<input class="simple_field" type="text" value="<?php echo $query->no_polisi;?>" name="no_polisi" />
		<input class="simple_field" type="hidden" value="<?php echo $query->id_bus;?>" name="id_bus" />
	</div>
	</div>
	
    <div class="line_grid">
	<div class="g_3"><span class="label"></span></div>
	<div class="g_9">
		<input type="submit" value="update" class="submitIt simple_buttons" />
	</div>
	</div>		

	</form>
	</div>
	</div>