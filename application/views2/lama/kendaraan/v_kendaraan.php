	<div class="g_6 contents_header">
		<h3 class="i_16_forms tab_label">Kelola Kendaraan</h3></div>
	
	<div id="editKendaraan"></div>
	<div class="g_12">
	<div class="widget_header wwOptions">
		<h4 class="widget_header_title wwIcon i_16_data">Data kendaraan</h4>
    <div class="w_Options i_16_add">
		<ul class="drop_menu menu_with_icons right_direction">
			<li> <a class="i_16_add" href="../c_kendaraan/tambah_kendaraan" title="New Flie"> <span class="label">kendaraan</span> </a> </li>
			<li onclick="viewTipe()"> <a class="i_16_progress" title="2 Files Left" href="../c_kendaraan/data_tipebus"><span class="label">Tipe Bus</span> </a> </li>
		</ul>
    </div>
	</div>
	
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
					<th>Nama Bus</th>
					<th>Tipe Bus</th>
					<th>Nama Supir</th>
					<th>No Polisi</th>
					<th>Aksi</th>
				</tr>
			</thead>
	
	<tbody>
        <?php
							foreach ($query as $row){
							echo '
							<tr>
									<td>'.$row->nama_bus.'</td>
									<td>'.$row->nama_tipe.'</td>
									<td>'.$row->nama_supir.'</td>
									<td>'.$row->no_polisi.'</td>
									<td>
									<div style="margin-left:-65px; float:right; padding-top:10px;">
									<div class="simple_buttons" >
										<div class="bwIcon i_16_wysiwyg" onclick="edit_kendaraan('.$row->id_bus.')"> Edit </div>
									  	</div>
									  	<div class="simple_buttons" >
										<div class="bwIcon i_16_close" onclick="delete_kendaraan('.$row->id_bus.')"> Delete </div>
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