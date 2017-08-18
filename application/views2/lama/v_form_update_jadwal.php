	<div class="g_12">
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms">Update Data jadwal</h4>
	<div class="simple_buttons" style="float:right; margin-top:5px; margin-right:-10px;">
	<div class="bwIcon i_16_help" onclick="hiddenForm5()">keluar</div>
	</div>
	</div>
	
	<div class="widget_contents noPadding">
		<form action="edit_jadwal" method="post" >
	<div class="line_grid">
	<div class="g_3"><span class="label"> Nama Bus </span></div>
	<div class="g_9">
		<select name="id_busnya" style="color:#888; font-size:12px; padding:5px 5px 5px 5px;">
									<?php
								foreach ($query1 as $row){
								if($row->id_bus==$query->id_busnya){
								echo '<option value="'.$row->id_bus.'" selected>'.$row->nama_bus.'</option>';
								}else{
								echo '<option value="'.$row->id_bus.'">'.$row->nama_bus.'</option>';	
								}
								
									}
								?>
								</select>
				</div>
				</div>
				
				<div class="line_grid">
				<div class="g_3"><span class="label"> Tanggal Keberangkatan </span></div>
				<div class="g_9">
					<input class="simple_field pick_date" 
                    type="text" 
                    value="<?php echo $query->tgl_keberangkatan;?>" 
                    name="tgl_keberangkatan"/>
		</div>
		</div>
				<div class="line_grid" style="display:none;">
				<div class="g_3"><span class="label"> Jam Keberangkatan </span></div>
				<div class="g_9">
					<input class="simple_field" type="text" value="<?php echo $query->jam;?>" name="jam_keberangkatan" />
		</div>
		</div>
				<div class="line_grid">
				<div class="g_3"><span class="label"> Rute </span></div>
				<div class="g_9">
					
					<select name="id_rutenya" style="color:#888; font-size:12px; padding:5px 5px 5px 5px;">
									<?php
								foreach ($query4 as $row){
								if($query->id_rutenya==$row->id_rute){
									echo '
									<option value="'.$row->id_rute.'" selected>
									Jam Berangkat '.$row->jam_berangkatbus.' | 
									'.$row->nama_pool.' |
									'.$row->kota_awal.' - '.$row->kota_akhir.'</option>
										';
									}
								else{
								echo '
									<option value="'.$row->id_rute.'">
									Jam Berangkat '.$row->jam_berangkatbus.' | 
									'.$row->nama_pool.' |
									'.$row->kota_awal.' - '.$row->kota_akhir.'</option>
										';
									}
								}
								
								?>
								</select></div>
		</div>
				
				<div class="line_grid">
				<div class="g_3"><span class="label"> </span></div>
				<div class="g_9">
					<input class="simple_field" type="hidden" value="<?php echo $query->id_jadwalbus;?>" name="id_jadwalbus" />
		
					<input type="submit" value="update" class="submitIt simple_buttons" />
		</div>
		</div>
				
		
	</form>
	</div>
	<script>
	$( ".pick_date" ).datepicker({ dateFormat: 'dd-mm-yy' }).val();
	</script>