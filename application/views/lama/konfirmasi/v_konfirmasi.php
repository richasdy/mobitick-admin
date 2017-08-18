	<div class="g_6 contents_header">
		<h3 class="i_16_forms tab_label">Kelola Konfirmasi</h3></div>

	<div id="editKonfirmasi"></div>
	<div class="g_12">
	<div id="loading"></div>
	<div class="widget_header wwOptions">
		<h4 class="widget_header_title wwIcon i_16_data">Data Konfirmasi</h4></div>
	
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
					<th>Expired Time</th>
					<th>Kode Verifikasi</th>
					<th>Nama Pengirim</th>
					<th>No Rekening</th>
					<th>Rekening Tujuan</th>
					<th>Total Bayar (Rp.)</th>
					<th>Tanggal Pengiriman</th>
					<th>Bukti Bayar</th>
					<th>Status Verifikasi</th>
					<th>Aksi</th>
									
								</tr>
							</thead>
							<tbody>
							<?php
							foreach ($query as $row){
							
							$time = date('H:i:s', strtotime($row->jam_pemesanan.' + 180 minutes') );
							$tm = explode (":", $time);
							$j = $tm[0]; 
							$m = $tm[1]; 
							$d = $tm[2]; 
							
							
							$jam = date('H:i:s');
							$jm = explode (":", $jam);
							$j2 = $jm[0]; 
							$m2 = $jm[1]; 
							$d2 = $jm[2];
							
							$expired_jam = $j-$j2;
							$expired_menit = $m-$m2;
							$expired_detik = $d-$d2;
							
							
							if($row->no_rekening==''){
								if($expired_detik<0){
								$expired_detik = 60+$expired_detik;
								}
								
								if($expired_menit<0){
									$expired_menit = 60+$expired_menit;
									$expired_jam = $expired_jam-1;
									if($expired_jam<0){
									$this->db->query("DELETE FROM `pemesanan_tiket` WHERE `kode_pemesanan` = $row->kode_pemesanan");
									$this->db->query("DELETE FROM `penumpang` WHERE `kode_pemesanannya` = $row->kode_pemesanan");
									}
								}
								$expired = $expired_jam.':'.$expired_menit.':'.$expired_detik;
							}else{
								$expired = '--------';
							}
							
							
							
							if ($row->bukti_bayar==''){
								$images = 'No File Upload';
								}
								else{
									$images = '<a href="'.$base_url.'/../liva/uploads/'.$row->bukti_bayar.'" 
									target="_blank">
									<img src="'.$base_url.'/liva/uploads/'.$row->bukti_bayar.'" width="100" >
									</a>';
									}
							echo '
							<tr>
									<td>'.$expired.'</td>
									<td>'.$row->kode_pemesanan.'</td>								
									<td>'.$row->nama_pengirim .'</td>
									<td>'.$row->no_rekening.'</td>
									<td>'.$row->rekening_tujuan.'</td>
									<td>'.$row->total_bayar.'</td>
									<td>'.$row->tgl_pengiriman.'</td>
									<td>'.$images.'
									</td>
									
									<td>'.$row->status_verifikasi.'</td>
									<td align="center">
									<div style="padding-top:10px;">
									<div class="simple_buttons" >
									<div class="bwIcon i_16_wysiwyg" 
									onclick="edit_verifikasi('.$row->kode_pemesanan.','.$row->id_pemesan.')"> Edit </div>
								    </div>
									<!--
									<div class="simple_buttons" >
									<div class="bwIcon i_16_close" onclick="delete_verifikasi('.$row->id_pemesan.')"> Delete </div>
									</div>
									-->
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