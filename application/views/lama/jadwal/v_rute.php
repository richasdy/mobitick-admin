	<div class="g_6 contents_header">
		<h3 class="i_16_forms tab_label">
			<a href="../c_jadwal/kelola_jadwal" style="color:#999 !important; text-decoration:underline;"> Kelola jadwal </a> > Kelola Rute</h3>
	</div>
	
	<div id="editRute"></div>
	<div id="formTipeBus" style="display:none;">
		<form action="proses_tambah_rute" method="post" id="formTipeBusnya">
    
	<div class="g_12">
    <div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms">Input Data Rute</h4>
    
	<div class="simple_buttons" style="float:right; margin-top:5px; margin-right:-10px;">
    <div class="bwIcon i_16_help" onclick="hiddenFormTipeBus()">keluar</div>
    </div>
    
	</div>
	
    <div class="widget_contents noPadding">
    <div class="line_grid">
    <div class="g_3"><span class="label">Kota Asal</span></div>
    <div class="g_9">
		<input class="simple_field" type="text" name="kota_awal" required onblur="cekKotaAsal()" id="kotaasal" />
    </div>
    </div>
	
    <div class="line_grid">
    <div class="g_3"><span class="label">Lokasi Keberangkatan</span></div>
    <div class="g_9">
		<input class="simple_field" type="text" name="lokasi_keberangkatan" required /></div>
    </div>
	
    <div class="line_grid">
    <div class="g_3"><span class="label">Kota Tujuan</span></div>
    <div class="g_9">
		<input class="simple_field" type="text" name="kota_akhir" required onblur="cekKotaTujuan()" id="kotatujuan" /></div>
    </div>
        
    <div class="line_grid">
    <div class="g_3"><span class="label">Nama Pool</span></div>
    <div class="g_9">
		<input class="simple_field" type="text" name="nama_pool" required  /></div>
    </div>
        
    <div class="line_grid">
    <div class="g_3"><span class="label">Telp Pool</span></div>
    <div class="g_9">
		<input class="simple_field" type="text" name="tlp_pool" required onblur="cekTlp()" id="tlp" /></div>
    </div>
    <div class="line_grid">
    <div class="g_3"><span class="label">Jam Berangkat Bus</span></div>
    <div class="g_9">
		
        <select name="jam_berangkatbus" style="color:#888; font-size:13px; padding:5px 5px 5px 5px;">
            <option>06:00</option>
        <option>08:00</option>
        <option>10:00</option>
        <option>12:00</option>
        <option>14:00</option>
        <option>16:00</option>
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
	<div id="loading"></div>
	<div id="data_tipebus">
    <div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables">Kelola Rute</h4>
	<div class="simple_buttons" style="float:right; margin-top:5px; margin-right:-10px;">
	<div class="bwIcon i_16_add" onclick="viewFormTipeBus()"> Rute </div>
    </div>
	</div>
	
    <div class="widget_contents noPadding">
      <table class="datatable tables ">
        <thead>
          <tr>
            <th width="20">No</th>
            <th>Kota Asal</th>
            <th>Alamat</th>
            <th>Kota Tujuan</th>
            <th>Pool</th>
            <th>Tlp Pool</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
		  $no=1;
							foreach ($query as $row){
							echo '
							<tr>
							<td align="center">'.$no.'</td>
							<td>'.$row->kota_awal.'</td>
							<td>'.$row->lokasi_keberangkatan.'</td>
							<td>'.$row->kota_akhir.'</td>
							<td>'.$row->nama_pool.'</td>
							<td>'.$row->tlp_pool.'</td>
							<td align="center">
							<div style="padding-top:10px;">
									
									<div class="simple_buttons" >
									<div class="bwIcon i_16_wysiwyg" onclick="edit_rute('.$row->id_rute.')"> Edit </div>
									</div>
									
	 						 </div>
							
							</td>
							
							<td align="center">
							<div style="padding-top:10px;">
									
									<div class="simple_buttons" >
									<div class="bwIcon i_16_close" onclick="delete_rute('.$row->id_rute.')"> Delete </div>
									</div>
	 						 </div>
							
							</td>
							
							</tr>
							';
							$no++;
							}
							?>
        </tbody>
		</table>
    </div>
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