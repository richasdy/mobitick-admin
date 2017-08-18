	<div class="g_6 contents_header">
		<h3 class="i_16_forms tab_label">
			<a style="color:#999 !important; text-decoration:underline;" href="../c_pemesanan/data_pemesanan">Kelola Data Pemesanan </a>> Input Data Pemesanan
		</h3>
	</div>
		<div class="g_12">
		<form action="proses_tambah_pemesanan" method="post">	
						<div class="widget_header">
							<h4 class="widget_header_title wwIcon i_16_forms">Input Data Pemesanan</h4>
						</div>
						<div class="widget_contents noPadding">
							<div class="line_grid">
								<div class="g_3"><span class="label"> Nama Pemesan </span></div>
								<div class="g_9">
									<input class="simple_field" type="text" name="nama_pemesan" onblur="cekNamaPemesan()" required id="nama_pemesan" />
									<p class="help-block"></p>
							</div>
						</div>
							<div class="line_grid">
							 <div class="control-group">
								<div class="g_3"><span class="label"> No HP </span></div>
								<div class="g_9">
								<div class="controls">
									<input class="simple_field" type="number" name="no_tlp" id="notelp" required />
									<p class="help-block"></p>
									</div>
									
							</div>
							</div>
						</div>
						 
							
							<div class="line_grid">
								<div class="g_3"><span class="label"> Jadwal Keberangkatan </span></div>
								<div class="g_9">
									<input class="simple_field pick_date" id="tanggalnya" type="text" name="tgl_keberangkatan" onchange="ubah_tanggal()" required />
							</div>
						</div>
							
							<div class="line_grid">
								<div class="g_3"><span class="label"> Kendaraan </span></div>
								<div class="g_9">
									<div id="bus"></div>
							</div>
						</div>
						<div class="line_grid">
								<div class="g_3"><span class="label"> Harga (Rp.) </span></div>
								<div class="g_9">
									<input class="simple_field" type="text"  name="harga" id="harga" readonly="readonly" required/>
							</div>
						</div>
							
									<div id="kursi"></div>
							
								<div class="line_grid">
								<div class="g_3"><span class="label"></span></div>
								<div class="g_9">
									<input type="submit" value="Pesan" class="submitIt simple_buttons" />
								</div>
							</div>
                            </div></form>
                            </div>

	<script>

	function ubah_tanggal(){
		tgl = document.getElementById("tanggalnya").value;
		var mySplitResult = tgl.split("-");
		tanggal = mySplitResult[0];
		bulan = mySplitResult[1];	
		tahun = mySplitResult[2];
		tanggalnya = tahun+'-'+bulan+'-'+tanggal;
		$('#bus').load('<?=$base_url;?>c_pemesanan/load_bus/'+tanggalnya).fadeIn("slow");
		//alert(tanggalnya);
		//document.getElementById('tujuannya').value='Solo '+tgl ;
	}

	function ubah_bus(){
		idBus = document.getElementById("idBusnya").value;
		var mySplitResult = idBus.split("_");
		idBus = mySplitResult[0];
		idBus = parseInt(idBus);
		harga = mySplitResult[1];
		
		if(idBus==0){
		$('#kursi').hide();
		$("#harga").val("");
		}else{
		//	alert(idBus);
		$('#kursi').load('<?=$base_url;?>c_pemesanan/load_kursi/'+idBus).fadeIn("slow");
		$("#harga").val(harga);
		}
	}	
		
	</script>