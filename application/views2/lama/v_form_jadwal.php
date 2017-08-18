	<div class="g_6 contents_header">
		<h3 class="i_16_forms tab_label">
			<a style="color:#999 !important; text-decoration:underline;" href="../c_jadwal/kelola_jadwal">Kelola Jadwal </a>> Input Data Jadwal
		</h3>
	</div>
		<div class="g_12">
		<form action="proses_tambah_jadwal" method="post">	
						<div class="widget_header">
							<h4 class="widget_header_title wwIcon i_16_forms">Input Data Jadwal</h4>
						</div>
						<div class="widget_contents noPadding">
							<div class="line_grid">
								<div class="g_3"><span class="label"> Nama Bus </span></div>
								<div class="g_9">
								<select name="id_busnya" style="color:#888; font-size:12px; padding:5px 5px 5px 5px;">
									<?php
								foreach ($query1 as $row){
								echo '
								<option value="'.$row->id_bus.'">'.$row->nama_bus.'</option>
									';
									}
								?>
								</select>
								</div>
							</div>
							<div class="line_grid">
								<div class="g_3"><span class="label"> Tanggal Keberangkatan </span></div>
								<div class="g_9">
									<input type="text" required  name="tgl_keberangkatan" class="simple_field pick_date" />
								</div>
							</div>
							<div class="line_grid" style="display:none;">
								<div class="g_3"><span class="label"> Jam Keberangkatan </span></div>
								<div class="g_9">
									<input class="simple_field" type="text"  name="jam" />
								</div>
							</div>
							<div class="line_grid">
								<div class="g_3"><span class="label"> Rute </span></div>
								<div class="g_9">
								
									<select name="id_rute" required style="color:#888; font-size:12px; padding:5px 5px 5px 5px;">
									<?php
								foreach ($query4 as $row){
								echo '
								<option value="'.$row->id_rute.'">
								Jam: '.$row->jam_berangkatbus.' 
								- 
								'.$row->nama_pool.' 
								- 
								'.$row->kota_awal.' 
								- 
								'.$row->kota_akhir.'
								
								</option>
									';
									}
								?>
								</select>
								</div>
								</div>
								
								
							<div class="line_grid">
									<div class="g_3"><span class="label"></span></div>
									<div class="g_9">
										<input type="submit" value="tambah" class="submitIt simple_buttons" />
									</div>
								</div>
							
							</div>
								
							
								
								</form>
                                <div style="color:#888; font-size:14px; margin:25px 0 15px 5px;"> <b>Keterangan Pool:</b><br/><br/>
                                <?php
								foreach ($query4 as $row){
								echo $row->nama_pool.': '.$row->lokasi_keberangkatan.'<br/>';
									}
								?>
                                
                                
                                </div>
								</div>
                                
	<script>
	$( ".pick_date" ).datepicker({ dateFormat: 'dd-mm-yy' }).val();
	</script>