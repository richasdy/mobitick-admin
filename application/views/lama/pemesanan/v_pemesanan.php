	<div class="g_6 contents_header">
		<h3 class="i_16_forms tab_label">Kelola Data Pemesanan</h3></div>
	
	<div id="editPemesanan"></div>
	<div class="g_12">
	<div id="loading"></div>
	<div class="widget_header wwOptions">
		<h4 class="widget_header_title wwIcon i_16_data">Data Pemesanan</h4>
	
	<div class="w_Options i_16_add">
		<ul class="drop_menu menu_with_icons right_direction">
			<li><a class="i_16_add"href='../c_pemesanan/tambahdata' title="New Flie"><span class="label">Pemesanan</span></a></li>
			
		</ul>
	</div>
	
	</div>
	
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
					<th> Status </th>
					<th> Waktu Pemesanan </th>
					<th> Nama Pemesan </th>
					<th> Kode Pemesanan</th>
					<th> No HP </th>
					
					<th> Jadwal Keberangkatan </th>
					<th> Lokasi Berangkat </th>
					<th> Rute </th>
					<th> Kendaraan</th>
					<th> No Kursi</th>
					<th> Nama Penumpang </th>
					
					<th> Total Harga </th>
					<th> Validasi Oleh </th>
					<th> Aksi </th>
				</tr>
			</thead>

	<tbody>
							<?php
							foreach ($query as $row){
								if( $row->kode_pemesanan==0){$kode='By-Admin';}
								else{$kode=$row->kode_pemesanan;}
							echo '
							<tr>
									<td>'.$row->status.'</td>
									<td>'.$row->tgl_pemesanan.'-'.$row->jam_pemesanan.'</td>
									<td>'.$row->nama_pemesan.'</td>
									<td>'.$kode.'</td>
									<td>'.$row->no_tlp.'</td>
									
									<td>'.$row->tgl_keberangkatan.' - '.$row->jam_berangkatbus.'</td>
									<td title="'.$row->lokasi_keberangkatan.'">'.$row->nama_pool.'</td>
									<td>'.$row->kota_awal.' - '.$row->kota_akhir.'</td>
									<td>'.$row->nama_tipe.' - '.$row->harga.'</td></td>
									<td>'.$row->no_kursi.'</td>
									<td>'.$row->nama_penumpang.'</td>
									
									<td>'.$row->total_harga.'</td>
									<td>'.$row->nama_admin.'</td>
									<td>
									<div style="margin-left:0px; float:right; padding-top:10px; width:147px;">
									<div class="simple_buttons" >
									<div class="bwIcon i_16_wysiwyg" onClick="dolink('.$row->kode_pemesanan.'); return false;"> Print Tiket </div>
								    </div>									
									<div class="simple_buttons" >
									<div class="bwIcon i_16_wysiwyg" onclick="edit_pemesanan('.$row->id_pemesan.')"> Edit </div>
								    </div>
									<div class="simple_buttons" >
									<div class="bwIcon i_16_close" onclick="delete_pemesanan('.$row->id_pemesan.')"> Delete </div>
									</div>
									</div>
									
									</td>
							</tr>
								';
							}
							
							?>
							</tbody>
						</table>
					</div>
				</div>
				<link href="http://fonts.googleapis.com/css?family=Oswald|Droid+Sans:400,700" rel="stylesheet" />
	
	<link rel="stylesheet" href="<?=$css?>/style.css" />
	
	<script src="<?=$js?>/jQuery/jquery-1.7.2.min.js"></script>

	<script src="<?=$js?>/Flot/jquery.flot.js"></script>
	<script src="<?=$js?>/Flot/jquery.flot.resize.js"></script>
	<script src="<?=$js?>/Flot/jquery.flot.pie.js"></script>

	<script src="<?=$js?>/DataTables/jquery.dataTables.min.js"></script>

	<script src="<?=$js?>/ColResizable/colResizable-1.3.js"></script>

	<script src="<?=$js?>/jQueryUI/jquery-ui-1.8.21.min.js"></script>

	<script src="<?=$js?>/Uniform/jquery.uniform.js"></script>

	<script src="<?=$js?>/Tipsy/jquery.tipsy.js"></script>

	<script src="<?=$js?>/Elastic/jquery.elastic.js"></script>
	
	<script src="<?=$js?>/ColorPicker/colorpicker.js"></script>

	<script src="<?=$js?>/SuperTextarea/jquery.supertextarea.min.js"></script>
	
	<script src="<?=$js?>/UISpinner/ui.spinner.js"></script>

	<script src="<?=$js?>/MaskedInput/jquery.maskedinput-1.3.js"></script>

	<script src="<?=$js?>/ClEditor/jquery.cleditor.js"></script>

	<script src="<?=$js?>/FullCalendar/fullcalendar.js"></script>

	<script src="<?=$js?>/ColorBox/jquery.colorbox.js"></script>

	<script src="<?=$js?>/kanrisha.js"></script>
	
	<script>
	function dolink(val){
		//alert(obj.getAttribute("href"+"oke"));
		window.open("<?=$base_url?>pdf/download/"+val, 'Print Tiket');
	}	
	</script>