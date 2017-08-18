<html lang="en-gb" class="no-js"> 

<head>
<title> PO RAJAWALI</title>
	
	<meta charset="utf-8">
		<meta name="keywords" content="" />
		<meta name="description" content="" />
	
	<link rel="shortcut icon" href="<?=$images?>/favicon.html">
    
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700italic,700,600italic,600,400italic,300italic,300|Roboto:100,300,400,500,700&amp;subset=latin,latin-ext' type='text/css' />
    
    <link rel="stylesheet" href="<?=$css?>/reset.css" type="text/css" />
	<link rel="stylesheet" href="<?=$css?>/style.css" type="text/css" />
    
    <link rel="stylesheet" href="<?=$css?>/font-awesome/css/font-awesome.min.css">
    
	<link rel="stylesheet" media="screen" href="<?=$css?>/responsive-leyouts.css" type="text/css" />
  
    <link rel = "stylesheet" media = "screen" href = "<?=$js?>/style-switcher/color-switcher.css" />
    
    <link rel="stylesheet" href="<?=$js?>/sticky-menu/core.css">
    
  	<link rel="stylesheet" href="<?=$js?>/progressbar/ui.progress-bar.css">
</head>

<body>
	<div id="trueHeader">
		<div class="wrapper">
			<div class="container">
				<div class="one_fourth"><a href="index.html" id="logo"></a></div>
					<div class="three_fourth last">
						<nav id="access" class="access" role="navigation">
							<div id="menu" class="menu">
								<ul id="tiny">
									<li><a href="home">Home</a></li>
									<li><a href="pesantiket" class="active" >Pemesanan</a></li>
									<li><a href="konfirmasi">Tiket</a></li>
									<li><a href="login">Login</a></li>
								</ul>
							</div>
						</nav>
					</div>
			</div>
		</div>
	</div>
</header>
<?php
echo $this->load->helper('fungsi'); //panggil fungsi -> tgl_sekarang
?>
<div class="clearfix"></div>
		<div class="page_title">
			<div class="container">
				<div class="title"><h1>Pemesanan</h1></div>
					<div class="pagenation">&nbsp;<a href="home">Home</a> <i>/</i> Pemesanan</div>
			</div>
		</div>

	<div class="container">

	<div class="content_fullwidth">
        	
    <div class="one_half">
     <h3><i>Form Pemesanan Tiket</i></h3>
		<form action="pesantiket_proses" method="post" id="formPemesanan" >
			<fieldset>
				<div class="formItem">
					<div class="labelForm">Tanggal Berangkat</div>
						<input name="tanggal" type="text" id="datepicker" readonly class="inputForm" style="width:90px;" value="<?php echo tgl_sekarang(); ?>" onChange="ubah_tanggal()"/>
							<?php
								$length = 6;
								$randomString = substr(str_shuffle("123456789123456789123456789123456789123456789456789123456789"), 0, $length);
							?>
						<input name="kode_pemesanan" type="hidden" class="inputForm" style="width:80px;" value="<?php echo $randomString; ?>" />
				</div>
				
	<div id="Busnya"></div>
		
    <div id="Kursinya"></div>

	<div id="button" style="display:none;">
        
	<div class="formItem">
		<span class="labelForm"></span>
			<input name="tanggal" type="submit"  value='PESAN' class="buttonForm margin"/>
    </div>
    </div>
        
        </fieldset>
        
        </form> 
    <style>
	 .formItem{ display:block; margin-bottom:12px;}
	 .selectForm{color:#777; margin-left:180px;  font-size:12px; padding:8px 5px 8px 5px; z-index:10;}
	 .inputForm{ padding:8px; margin-left:180px; }
	 .buttonForm{ padding:8px 20px 8px 20px; margin-top:40px; }
	 .margin { margin-left:180px; }
	 .labelForm{font-size:15px;  position:absolute; width:200px; background:none;}
	 #formPemesanan { background-color:#F7F7F7; padding:30px 15px 20px 25px; border:1px solid #CCC; }
	 </style>  
    </div>
 
    <div class="one_half last">
    
        <div class="address-info">
            <h3><i>Alamat Keberangkatan</i></h3>
                <ul>
                <li>
                <strong>PO Rajawali</strong><br />
						Pool-1. Jl.Gedung IV No 6 Cimahi | Jam Keberangkatan : 06:00 <br />
						Pool-2. Terminal Cicaheum Kios No 1 Bandung | Jam Keberangkatan : 08:00 <br />
						Pool-3. Jl.Soekrno Hatta No.45 Bandung | Jam Keberangkatan : 10:00 <br />
						Pool-4. Jl.BKR/PTT No 91  Bandung | Jam Keberangkatan : 12:00 <br />
						Pool-5. Jl.Kebon Jati No 180 Bandung | Jam Keberangkatan : 14:00 <br />
                </li>
            </ul>
        </div>

	</div>
	
	</div>

	</div>
	
	<div class="clearfix mar_top5"></div>
	
	<div class="copyright_info">
    <div class="container">
      <div class="one_half"> <b>Copyright © 2014 PO. Rajawali. All rights reserved. Terms of Use| Privacy Policy</b> </div>
    </div>
    </div>
 
	<a href="#" class="scrollup">Scroll</a><!-- end scroll to top of the page--> 
  </div>
 <link rel="stylesheet" href="<?=$css?>/datepicker/datepicker-stylesheet.css" type="text/css" />
<script type="text/javascript" src="<?=$js?>/mainmenu/jquery-1.7.1.min.js"></script> 
<script type="text/javascript" src="<?=$js?>/datepicker/jquery-ui.js"></script>\
<?php
include "validasi.html";
?>
    
<script>
 $(function() {
$( "#datepicker" ).datepicker({
					minDate: 0, 
					dateFormat: 'yy-mm-dd',
					maxDate: "+1M +10D"
					
				});
/*$('#datepicker').datepicker({
				inline: true,
				showOtherMonths: true,
				//dateFormat: 'dd MM yy',
				dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
				//showOn: "button",
				//buttonImage: "img/calendar-blue.png",
				//buttonImageOnly: true,
				//minDate: 0,
			//	maxDate: "+1M +10D",
				dateFormat: 'dd-mm-yy' 
			});*/

});
</script>

<script>
	function jumlahKursi(){
		jlhkursi = document.getElementById("kursi").value;
		harga = document.getElementById("hargaKursi").value;
		totalHarga = jlhkursi*harga;
		if(jlhkursi==1){
			document.getElementById("totalHargaKursi").value = totalHarga;
			$('#penumpang1').show();	
			$('#penumpang2').hide();	
			$('#penumpang3').hide();
			document.getElementById("namaPenumpang2").value = "asd";
			document.getElementById("noKursi2").value = "99";
			document.getElementById("namaPenumpang3").value = "asd";
			document.getElementById("noKursi3").value = "99";
			$('#hargaKursinya').show();
			$('#button').show();	
		}
		else if(jlhkursi==2){
			document.getElementById("totalHargaKursi").value = totalHarga;
			$('#penumpang1').show();	
			$('#penumpang2').show();	
			$('#penumpang3').hide();
			document.getElementById("namaPenumpang2").value = "";
			document.getElementById("noKursi2").value = "";
			document.getElementById("namaPenumpang3").value = "asd";
			document.getElementById("noKursi3").value = "99";
			$('#hargaKursinya').show();
			$('#button').show();	
		}
		else if(jlhkursi==3){
			document.getElementById("totalHargaKursi").value = totalHarga;
			document.getElementById("namaPenumpang3").value = "";
			document.getElementById("noKursi3").value = "";
			document.getElementById("namaPenumpang2").value = "";
			document.getElementById("noKursi2").value = "";
			$('#penumpang1').show();	
			$('#penumpang2').show();	
			$('#penumpang3').show();
			$('#hargaKursinya').show();
			$('#button').show();	
		}
		else{
			document.getElementById("totalHargaKursi").value = totalHarga;
			
			$('#penumpang1').hide();	
			$('#penumpang2').hide();	
			$('#penumpang3').hide();
			$('#hargaKursinya').hide();
			$('#button').hide();	
		}
		}
		
		
		
	function ubah_tanggal(){
		$('#penumpang1').hide();	
		$('#penumpang2').hide();	
		$('#penumpang3').hide();
		$('#button').hide();	
		$('#hargaKursinya').hide();
		$('#Kursinya').hide();	

		tgl = document.getElementById("datepicker").value;
		/*
		var mySplitResult = tgl.split("-");
		tanggal = mySplitResult[0];
		bulan = mySplitResult[1];	
		tahun = mySplitResult[2];
		tanggalnya = tahun+'-'+bulan+'-'+tanggal;
		alert(tgl);
		*/
		$('#Busnya').load('<?=$base_url;?>c_pemesanan/load_bus2/'+tgl).fadeIn("slow");
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
		$('#Kursinya').hide();
		$("#harga").val("");
		}else{
		//	alert(idBus);
		$('#Kursinya').load('<?=$base_url;?>c_pemesanan/load_kursi2/'+idBus).fadeIn("slow");
		$("#harga").val(harga);
		}
	}	

	function cek_kursi1(){
		var jumlahKursi = document.getElementById("kursi").value;
		noKursiPenumpang1 = document.getElementById("noKursi1").value;
		noKursiPenumpang2 = document.getElementById("noKursi2").value;
		noKursiPenumpang3 = document.getElementById("noKursi3").value;
			if(jumlahKursi==2){
				if(noKursiPenumpang2!=''){
					if(noKursiPenumpang2==noKursiPenumpang1){
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi1").value = '';
					}
				}
			}
			else if(jumlahKursi==3){
				if(noKursiPenumpang2!=''){
					if(noKursiPenumpang2==noKursiPenumpang1){
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi1").value = '';
					}
				}
				if(noKursiPenumpang3!=''){
					if(noKursiPenumpang3==noKursiPenumpang1){
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi1").value = '';
					}
				}
			}

		}


	function cek_kursi2(){
		var jumlahKursi = document.getElementById("kursi").value;
		noKursiPenumpang1 = document.getElementById("noKursi1").value;
		noKursiPenumpang2 = document.getElementById("noKursi2").value;
		noKursiPenumpang3 = document.getElementById("noKursi3").value;
			if(jumlahKursi==2){
				if(noKursiPenumpang1!=''){
					if(noKursiPenumpang1==noKursiPenumpang2){
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi2").value = '';
					}
				}
			}
			else if(jumlahKursi==3){
				if(noKursiPenumpang3!=''){
					if(noKursiPenumpang3==noKursiPenumpang2){
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi2").value = '';
					}
				}
				if(noKursiPenumpang1!=''){
					if(noKursiPenumpang1==noKursiPenumpang2){
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi2").value = '';
					}
				}
			}
		}

	function cek_kursi3(){
		var jumlahKursi = document.getElementById("kursi").value;
		noKursiPenumpang1 = document.getElementById("noKursi1").value;
		noKursiPenumpang2 = document.getElementById("noKursi2").value;
		noKursiPenumpang3 = document.getElementById("noKursi3").value;
			if(jumlahKursi==3){
				if(noKursiPenumpang1!=''){
					if(noKursiPenumpang1==noKursiPenumpang3){
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi3").value = '';
					}
				}
				if(noKursiPenumpang2!=''){
					if(noKursiPenumpang2==noKursiPenumpang3){
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi3").value = '';
					}
				}
			}
		}


</script>
</body>
</html>