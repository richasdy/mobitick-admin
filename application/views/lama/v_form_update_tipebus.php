	<div id="formEditTipeBus">
		<form action="proses_update_tipebus" method="post" id="formTipeBusnya">
    <div class="g_12">
    <div class="widget_header">
        <h4 class="widget_header_title wwIcon i_16_forms">Update Tipe Bus</h4>
    </div>
    
	<div class="widget_contents noPadding">
    <div class="line_grid">
    <div class="g_3"><span class="label">Nama Tipe</span></div>
    <div class="g_9">
		<input class="simple_field" type="text" name="nama_tipe" value="<?=$query->nama_tipe?>" />
    </div>
    </div>
    
	<div class="line_grid">
	<div class="g_3"><span class="label">Harga (Rp.)</span></div>
	<div class="g_9">
		<input class="simple_field" type="text" name="harga" value="<?=$query->harga?>"  />
        <input class="simple_field" type="hidden" name="id_tipebus" value="<?=$query->id_tipebus?>"  />
    </div>
    </div>
	
    <div class="line_grid">
    <div class="g_3"><span class="label">Jumlah Kursi</span></div>
    <div class="g_9">
		<select style="color:#888; font-size:13px; padding:5px 5px 5px 5px;" name="jumlah_kursi">
              <?php 
								$select = "selected";
								for($i=1; $i<=50; $i++)
								{
								if($query->jumlah_kursi==$i){
								echo '<option value="'.$i.'" '.$select.'>'.$i.'</option>';
								}else{
								echo '<option value="'.$i.'">'.$i.'</option>';	
								}
								
								}
								?>
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
	</div>
	<script type="text/javascript">
		function hiddenFormTipeBus2()
		{
			$('#formEditTipeBus').slideDown();
		}
	</script>