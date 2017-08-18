<html lang="en-US">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>PO RAJAWALI</title>

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
    <!--
	<script src="<?=$js?>/jqBootstrapValidation.js"></script>
    <script>
	  $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
	</script>
    -->
    <script src="<?=$base_url?>liva/js/jqBootstrapValidation.js"></script>
	<script src="<?=$base_url?>liva/js/validate.js"></script>
    <script>
	  $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
	</script>
    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<style>
#berhasil{position:fixed; z-index:100; top:0; left: 50%; margin:10px; padding:20px 30px 20px 30px; background:#0C0; color:white; display:none;}
#gagal {position:fixed; z-index:100; top:0; left: 50%; margin:10px; padding:20px 30px 20px 30px; background:red; color:white; display:none;}
</style>
<div id="berhasil">berhasil</div>
<div id="gagal">gagal</div>
	<div class="top_panel">
		<div class="wrapper">
			<div class="user">
            <span style="cursor:text;">
				<img src="<?=$images?>/user_avatar.png" alt="user_avatar" class="user_avatar"/>
				<span class="label2" ><?=$this->session->userdata('nama')?> (<?=$this->session->userdata('status_admin')?>)</span></span>
                <span class="label2">, <a href="../login/f_logout">Logout</a></span>
		
				
			</div>
		
	</div>	</div>

	<header class="main_header">
		<div class="wrapper">
			<div class="logo">
				<a href="#" title="Kanrisha Home">
					<img src="<?=$base_url?>/liva/images/logo2.png" alt="kanrisha_logo" />
				</a>
			</div>

		</div>
	</header>

	<div class="wrapper small_menu">
		<ul class="menu_small_buttons">
			<li><a title="General Info" class="i_22_dashboard smActive" href="index.html"></a></li>
			<li><a title="Your Messages" class="i_22_inbox" href="inbox.html"></a></li>
			<li><a title="Visual Data" class="i_22_charts" href="charts.html"></a></li>
			<li><a title="Kit elements" class="i_22_ui" href="ui.html"></a></li>
			<li><a title="Some Rows" class="i_22_tables" href="tables.html"></a></li>
			<li><a title="Some Fields" class="i_22_forms" href="forms.html"></a></li>
		</ul>
	</div>

	<div class="wrapper contents_wrapper">
		
		<aside class="sidebar">
			<ul class="tab_nav">
				<li class="<?php $uri = $this->uri->segment(2); if($uri=='' || $uri=='data_pemesanan' || $uri=='tambahdata' || $uri=='update_pemesanan'){ echo 'active_tab ';} ?> i_32_home">
					<a href="<?=$base_url?>c_pemesanan/data_pemesanan" title="Kelola Data Pemesanan">
						<span class="tab_label">Data Pemesanan</span>	
	
					</a>
				</li>
			
                <?php 
				if ($this->session->userdata('status_admin')=='super admin')
				{
					$stylesheet = '';	
				} else {$stylesheet = 'style="display:none;"';}
				
				?>
                
				<li class="<?php $uri = $this->uri->segment(2); if($uri=='kelola_user' || $uri=='tambah_user' || $uri=='update_user'){ echo 'active_tab ';} ?>i_32_ui" <?php echo $stylesheet;?>>
					<a href="<?=$base_url?>c_user/kelola_user" title="Kelola User">
						<span class="tab_label">Kelola User</span>
					</a>
				</li> 
				
				<li class="<?php $uri = $this->uri->segment(2); if($uri=='kelola_konfirmasi' || $uri=='tambah_konfirmasi' || $uri=='update_konfirmasi' ){ echo 'active_tab ';} ?> i_32_inbox">
					<a href="<?=$base_url?>c_konfirmasi/kelola_konfirmasi" title="Kelola Konfirmasi">
						<span class="tab_label">Kelola Konfirmasi</span>
					</a>
				</li>
				
				<li class="<?php $uri = $this->uri->segment(2); if($uri=='data_tipebus' || $uri=='kelola_kendaraan' || $uri=='tambah_kendaraan' || $uri=='update_kendaraan'){ echo 'active_tab ';} ?>i_32_dashboard"  <?php echo $stylesheet;?>>
					<a href="<?=$base_url?>c_kendaraan/kelola_kendaraan" title="Kelola Kendaraan">
						<span class="tab_label">Kelola Kendaraan</span>
					</a>
				</li>
				
				<li class="<?php $uri = $this->uri->segment(2); if(  $uri=='kelola_kotatujuan'|| $uri=='kelola_kotaasal'|| $uri=='kelola_rute'|| $uri=='kelola_jadwal'|| $uri=='tambah_jadwal' || $uri=='update_jadwal'){ echo 'active_tab ';} ?>i_32_ui"  <?php echo $stylesheet;?>>
					<a href="<?=$base_url?>c_jadwal/kelola_jadwal" title="Kelola Jadwal">
						<span class="tab_label">Kelola Jadwal</span>
					</a>
				</li>
				
				<li class="<?php $uri = $this->uri->segment(2); if(  $uri=='kelola_grafik'){ echo 'active_tab ';} ?>i_32_charts"  <?php echo $stylesheet;?>>
					<a href="<?=$base_url?>c_pemesanan/kelola_grafik" title="Kelola Grafik">
						<span class="tab_label">Kelola Grafik</span>
					</a>
				</li>
				
				
			</ul>
		</aside>

		<div class="contents">
			<div class="grid_wrapper">
				<div class="g_12 separator"><span></span></div>
				<?php
				
            $uri = $this->uri->segment(2);
            if($uri=='' || $uri=='data_pemesanan'){
            $this->load->view('v_data_pemesanan');
            }
			
			elseif($uri=='kelola_user'){
            $this->load->view('v_data_user');
            }
			
			elseif($uri=='kelola_grafik'){
            $this->load->view('v_grafik');
            }
			
            elseif($uri=='kelola_konfirmasi'){
            $this->load->view('v_data_konfirmasi');
            }
			
			elseif($uri=='kelola_kendaraan'){
			$this->load->view('v_data_kendaraan');
            }
			
			elseif($uri=='kelola_jadwal'){
            $this->load->view('v_data_jadwal');
            }
			
			
			elseif($uri=='kelola_rute'){
            $this->load->view('v_data_rute');
            }
			
			
        	elseif($uri=='tambahdata'){
			$this->load->view('v_form_pemesanan');
            }
			
			elseif($uri=='update_pemesanan'){
			$this->load->view('v_form_update_pemesanan');
			}
			
			elseif($uri=='tambah_user'){
			$this->load->view('v_form_user');
            }
			
			elseif($uri=='update_user'){
			$this->load->view('v_form_update_user');
			}
			
			elseif($uri=='update_konfirmasi'){
			$this->load->view('v_form_update_konfirmasi');
			}
			
			elseif($uri=='tambah_kendaraan'){
			$this->load->view('v_form_kendaraan');
            }
			
			elseif($uri=='update_kendaraan'){
			$this->load->view('v_form_update_kendaraan');
			}
			
			elseif($uri=='tambah_jadwal'){
			$this->load->view('v_form_jadwal');
            }
			
			elseif($uri=='update_jadwal'){
			$this->load->view('v_form_update_jadwal');
			}
			
			elseif($uri=='data_tipebus'){
			$this->load->view('v_data_tipebus');
			}
			
           else{
		  	echo 'lainnya';
            }	
			
			
        ?>
		</div>
		</div>
		</div>
	<footer>
		<div class="wrapper">
			<span class="copyright">
				Copyright © 2014 PO. Rajawali. All rights reserved.Terms of Use | Privacy Policy
			</span>
		</div>
	</footer>
	<script>
	function edit_pemesanan(id_pemesanan){
	$('#editPemesanan').load('<?=$base_url;?>c_pemesanan/update_pemesanan/'+id_pemesanan).fadeIn("slow");
	}
	function hiddenForm(){
	$('#editPemesanan').slideUp(600);
	$('#editVerifikasi').slideUp(600);
	$('#data_tipebus').slideUp(600);
	
	}
	
	function edit_user(id_admin){
	$('#editUser').load('<?=$base_url;?>c_user/update_user/'+id_admin).fadeIn("slow");
	}
	
	function delete_user(id_admin){
	var answer = confirm('Apakah anda yakin ingin menghapus user ini?');
		if (answer){
			$.get('<?=$base_url;?>c_user/delete_user/'+id_admin, function(data) {
			$('#user').load('<?=$base_url;?>c_user/load_user').fadeIn("slow");
			});
		}
	return false;
	}

	
	function delete_pemesanan(id_pemesan){
	var answer = confirm('Apakah anda yakin ingin menghapus Pemesanan ini?');
	
		if (answer){
			$.get('<?=$base_url;?>c_pemesanan/delete_pemesanan/'+id_pemesan, function(data) {
			$('#user').load('<?=$base_url;?>c_pemesanan/load_pemesanan').fadeIn("slow");
			});
		}
	
	return false;
	}

	function hiddenForm2(){
	$('#editUser').slideUp(600);
	}
	
	function edit_verifikasi(kode_pemesanannya,id_pemesanan){
	//	alert ('okde '+kode_pemesanannya+'_'+id_pemesanan);
	$('#editKonfirmasi').load('<?=$base_url;?>c_pemesanan/update_pemesanan2/'+kode_pemesanannya+'_'+id_pemesanan).fadeIn("slow");
	
	}
	
	function delete_konfirmasi(id_konfirmasi){
	var answer = confirm('Apakah anda yakin ingin menghapus data ini?');
		if (answer){
			$.get('<?=$base_url;?>c_konfirmasi/delete_konfirmasi/'+id_konfirmasi, function(data) {
			 $('#user').load('<?=$base_url;?>c_konfirmasi/load_konfirmasi').fadeIn("slow");
			});
		}
	return false;
	}
	
	function edit_kendaraan(id_bus){
	$('#editKendaraan').load('<?=$base_url;?>c_kendaraan/update_kendaraan/'+id_bus).fadeIn("slow");
	}
	function edit_tipebus(id_tipebus){
	$('#editTipeBus').load('<?=$base_url;?>c_kendaraan/update_tipebus/'+id_tipebus).fadeIn("slow");
	}
	function hiddenForm4(){
	$('#editKendaraan').slideUp(600);
	}
	
	function delete_kendaraan(id_bus){
	var answer = confirm('Apakah anda yakin ingin menghapus data ini?');
		if (answer){
			$.get('<?=$base_url;?>c_kendaraan/delete_kendaraan/'+id_bus, function(data) {
			 $('#user').load('<?=$base_url;?>c_kendaraan/load_kendaraan').fadeIn("slow");
			});
		}
	return false;
	}
	
	function delete_tipebus(id_tipebus){
	var answer = confirm('Apakah anda yakin ingin menghapus data ini?');
		if (answer){
			$.get('<?=$base_url;?>c_kendaraan/delete_tipebus/'+id_tipebus, function(data) {
			 $('#tipeBus').load('<?=$base_url;?>c_kendaraan/load_tipebus').fadeIn("slow");
			});
		}
	return false;
	}

	function edit_jadwal(id_jadwalbus){
	$('#editJadwal').load('<?=$base_url;?>c_jadwal/update_jadwal/'+id_jadwalbus).fadeIn("slow");
	}
	
	
	function edit_rute(id_rute){
	$('#editRute').load('<?=$base_url;?>c_jadwal/update_rute/'+id_rute).fadeIn("slow");
	}
	
	function hiddenForm5(){
	$('#editJadwal').slideUp(600);
	}
	
	
	function delete_jadwal(id_jadwalbus){
	var answer = confirm('Apakah anda yakin ingin menghapus data ini?');
		if (answer){
			$.get('<?=$base_url;?>c_jadwal/delete_jadwal/'+id_jadwalbus, function(data) {
			 $('#user').load('<?=$base_url;?>c_jadwal/load_jadwal').fadeIn("slow");
			});
		}
	return false;
	}
	
	function delete_rute(id_rute){
	var answer = confirm('Apakah anda yakin ingin menghapus data ini?');
		if (answer){
			$.get('<?=$base_url;?>c_jadwal/delete_rute/'+id_rute, function(data) {
			 $('#kotaTujuan').load('<?=$base_url;?>c_jadwal/load_rute').fadeIn("slow");
			});
		}
	return false;
	}
	
	
	

	//-----------------------------------------------
	//       v_form_update_pemesanan
	//-----------------------------------------------
	function ubah_tanggal(){
	$('#kursi').hide();
	$('#namaBus').hide();$('#noKursi').hide();
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
	setTimeout(function() {$('#result_true').slideUp(700);}, 2000);
</script>

</body>
</html>