	<div class="g_6 contents_header">
		<h3 class="i_16_forms tab_label"><a href="../c_kendaraan/kelola_kendaraan" style="color:#999 !important; text-decoration:underline;"> Kelola Kendaraan </a> > Kelola Tipe Bus</h3></div>
	
	<div id="editTipeBus"></div>
	<div id="formTipeBus" style="display:none;">
		<form action="proses_tambah_tipebus" method="post" id="formTipeBusnya">
    
	<div class="g_12">
    <div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms">Input Data Tipe Bus</h4>
    <div class="simple_buttons" style="float:right; margin-top:5px; margin-right:-10px;">
    <div class="bwIcon i_16_help" onclick="hiddenFormTipeBus()">keluar</div>
    </div>
    </div>
    
	<div class="widget_contents noPadding">
    <div class="line_grid">
    <div class="g_3"><span class="label">Nama Tipe</span></div>
    <div class="g_9">
		<input class="simple_field" type="text" name="nama_tipe" required /></div>
    </div>
	
    <div class="line_grid">
    <div class="g_3"><span class="label">Harga (Rp.)</span></div>
    <div class="g_9">
		<input class="simple_field" type="text" name="harga" required onblur="cekAngka()" id="harga" /></div>
    </div>
	
    <div class="line_grid">
    <div class="g_3"><span class="label">Jumlah Kursi</span></div>
    <div class="g_9">
		<select style="color:#888; font-size:13px; padding:5px 5px 5px 5px;" name="jumlah_kursi">
              <?php 
								for($i=1; $i<=50; $i++)
								{
								echo '<option value="'.$i.'">'.$i.'</option>';
								}
				?>
		</select>
	</div>
    </div>
        
	<div class="line_grid">
    <div class="g_3"><span class="label"></span></div>
    <div class="g_9">
		<input type="submit" value="tambah" class="submitIt simple_buttons" /></div>
	</div>
    </div>
    </div>
		</form>
	</div>

	<div class="g_12">
	<div class="widget_header wwOptions">
		<h4 class="widget_header_title wwIcon i_16_data">Data Tipe Bus</h4>
    <div class="widget_header">
    <div class="simple_buttons" style="float:right; margin-top:5px; margin-right:-10px;">
    <div class="bwIcon i_16_add" onclick="viewFormTipeBus()"> Tipe Bus </div>
    </div>
	</div>
	</div>
	
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
					<th>Nama Tipe</th>
					<th>Harga (Rp.)</th>
					<th>Jumlah Kursi</th>
					<th>Aksi</th>
				</tr>
			</thead>
	
	<tbody>
          <?php
							foreach ($query2 as $row){
							echo '
							<tr>
							<td>'.$row->nama_tipe.'</td>
							<td>'.$row->harga.'</td>
							<td>'.$row->jumlah_kursi.'</td>
							<td>
							<div style="margin-left:-105px; float:right; padding-top:10px;">
									<div class="simple_buttons" >
										<div class="bwIcon i_16_wysiwyg" onclick="edit_tipebus('.$row->id_tipebus.')"> Edit </div>
									  	</div>
									  	<div class="simple_buttons" >
										<div class="bwIcon i_16_close" onclick="delete_tipebus('.$row->id_tipebus.')"> Delete </div>
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
	
	<script type="text/javascript">
	function viewTipe()
	{
	$('#data_tipebus').slideDown(600);	
	}
	function viewFormTipeBus()
	{
		$('#formTipeBus').slideDown(600);
		}
	function hiddenFormTipeBus()
	{
		$('#formTipeBus').slideUp(800);
		}
	</script>