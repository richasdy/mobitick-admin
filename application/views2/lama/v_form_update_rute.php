	<form action="proses_update_rute" method="post" id="formTipeBusnya">
    <div class="g_12">
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms">Edit Data Rute</h4>
    <div class="simple_buttons" style="float:right; margin-top:5px; margin-right:-10px;">
    <div class="bwIcon i_16_help" onclick="hiddenFormKotaTujuan()">keluar</div>
    </div>
    </div>
    
	<div class="widget_contents noPadding">
    <div class="line_grid">
    <div class="g_3"><span class="label">Kota Awal</span></div>
    <div class="g_9">
		<input class="simple_field" type="hidden" name="id_rute" value="<?=$query->id_rute?>" />
        <input class="simple_field" type="text" name="kota_awal" value="<?=$query->kota_awal?>" />
	</div>
	</div>
        
	<div class="line_grid">
	<div class="g_3"><span class="label">Kota Akhir</span></div>
    <div class="g_9">
		<input class="simple_field" type="text" name="kota_akhir"value="<?=$query->kota_akhir?>"  />
    </div>
    </div>
    
	<div class="line_grid">
    <div class="g_3"><span class="label">Lokasi Keberangkatan</span></div>
    <div class="g_9">
		<input class="simple_field" type="text" name="lokasi_keberangkatan" value="<?=$query->lokasi_keberangkatan?>" />
	</div>
    </div>
        
	<div class="line_grid">
    <div class="g_3"><span class="label">Nama Pool</span></div>
    <div class="g_9">
		<input class="simple_field" type="text" name="nama_pool" value="<?=$query->nama_pool?>" />
	</div>
    </div>
        
	<div class="line_grid">
    <div class="g_3"><span class="label">Telp Pool</span></div>
    <div class="g_9">
		<input class="simple_field" type="text" name="tlp_pool" value="<?=$query->tlp_pool?>" />
	</div>
    </div>
        
	<div class="line_grid">
    <div class="g_3"><span class="label">Jam Keberangkatan</span></div>
    <div class="g_9">
        <select style="color:#888; font-size:13px; padding:5px 5px 5px 5px;" name="jam_berangkatbus">
			<option value="06:00" <?php if($query->jam_berangkatbus=='06:00'){echo'selected';}?>>06:00</option>
			<option value="08:00" <?php if($query->jam_berangkatbus=='08:00'){echo'selected';}?>>08:00</option>
			<option value="10:00" <?php if($query->jam_berangkatbus=='10:00'){echo'selected';}?>>10:00</option>
			<option value="12:00" <?php if($query->jam_berangkatbus=='12:00'){echo'selected';}?>>12:00</option>
			<option value="14:00" <?php if($query->jam_berangkatbus=='14:00'){echo'selected';}?>>14:00</option>
			<option value="16:00" <?php if($query->jam_berangkatbus=='16:00'){echo'selected';}?>>16:00</option>
         </select>
	</div>
    </div>
        
    <div class="line_grid">
    <div class="g_3"><span class="label"></span></div>
    <div class="g_9">
		<input type="submit" value="update" class="submitIt simple_buttons" />
	</div>
	</div>
	</div>
    </div>
	</form>