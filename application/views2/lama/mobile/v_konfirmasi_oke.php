<html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
	<title>PO RAJAWALI</title>
	
	<meta charset="utf-8">
	<meta name="keywords" content="" />
	<meta name="description" content="" />
    
    <!-- Favicon --> 
	<link rel="shortcut icon" href="<?=$images?>/favicon.html">
    
    <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- Google fonts - witch you want to use - (rest you can just remove) -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700italic,700,600italic,600,400italic,300italic,300|Roboto:100,300,400,500,700&amp;subset=latin,latin-ext' type='text/css' />
    
    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    <!-- ######### CSS STYLES ######### -->
	
    <link rel="stylesheet" href="<?=$css?>/reset.css" type="text/css" />
	<link rel="stylesheet" href="<?=$css?>/style.css" type="text/css" />
    
    <link rel="stylesheet" href="<?=$css?>/font-awesome/css/font-awesome.min.css">
    
    <!-- responsive devices styles -->
	<link rel="stylesheet" media="screen" href="<?=$css?>/responsive-leyouts.css" type="text/css" />
     
    <!-- style switcher -->
    <link rel = "stylesheet" media = "screen" href = "<?=$js?>/style-switcher/color-switcher.css" />
    
    <!-- sticky menu -->
    <link rel="stylesheet" href="<?=$js?>/sticky-menu/core.css">
    
    <!-- progressbar -->
  	<link rel="stylesheet" href="<?=$js?>/progressbar/ui.progress-bar.css">
    
    
</head>

<body>

<a href="<?=$base_url?>mobile">
<div style="text-align:left; padding:15px 10px 15px 30px;;background-color:#F90; position:fixed; width:100%; top:0; color:white !important; font-size:18px;z-index:100;">HOME</div></a>
<div class="site_wrapper" style="margin-top:30px;">
</div>
   




<!-- Contant
======================================= -->

<div class="container">

	<div class="content_fullwidth">
        	
    <div class="one_half">
        

   
    <h3><i>Konfirmasi</i></h3>

    <form action="input_pemesanan_tiket" method="post" id="formPemesanan">
    
        <fieldset>
        
       
       <div class="labelForm">Terima Kasih telah melakukan konfirmasi! <br/>Kode Verifikasi Anda <h2><?php echo $kode_pemesanan; ?></h2>akan segera kami validasi.</div>
      
        
        </fieldset>
        
      </form> 
    <style>
	 .labelForm{font-size:15px;  width:auto; background:none; text-align:center;}
	 #formPemesanan { background-color:#F7F7F7; padding:20px; border:1px solid #CCC; height:auto;}
	 </style>  
    </div>
	</div>

</div><!-- end content area -->


<div class="clearfix mar_top5"></div>

<!-- Footer
======================================= -->


  
 </div>
 <link rel="stylesheet" href="<?=$css?>/datepicker/datepicker-stylesheet.css" type="text/css" />
<script type="text/javascript" src="<?=$js?>/mainmenu/jquery-1.7.1.min.js"></script> 
<script type="text/javascript" src="<?=$js?>/datepicker/jquery-ui.js"></script>
<script>
 $(function() {
//$( "#datepicker" ).datepicker({minDate: 0, maxDate: "+1M +10D" });
$('#datepicker').datepicker({
				inline: true,
				showOtherMonths: true,
				//dateFormat: 'dd MM yy',
				dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
				//showOn: "button",
				//buttonImage: "img/calendar-blue.png",
				//buttonImageOnly: true,
			//	minDate: 0,
			//	maxDate: "+1M +10D",
				dateFormat: 'dd-mm-yy' 
			});

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
		$('#hargaKursinya').show();
		$('#button').show();	
	}
	else if(jlhkursi==2){
		document.getElementById("totalHargaKursi").value = totalHarga;
		$('#penumpang1').show();	
		$('#penumpang2').show();	
		$('#penumpang3').hide();
		$('#hargaKursinya').show();
		$('#button').show();	
	}
	else if(jlhkursi==3){
		document.getElementById("totalHargaKursi").value = totalHarga;
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
	var mySplitResult = tgl.split("-");
	tanggal = mySplitResult[0];
	bulan = mySplitResult[1];	
	tahun = mySplitResult[2];
	tanggalnya = tahun+'-'+bulan+'-'+tanggal;
	$('#Busnya').load('<?=$base_url;?>c_pemesanan/load_bus2/'+tanggalnya).fadeIn("slow");
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
			if(noKursiPenumpang2!='No Kursi'){
				if(noKursiPenumpang2==noKursiPenumpang1){
					alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
					document.getElementById("noKursi1").value = 'No Kursi';
				}
			}
		}
		else if(jumlahKursi==3){
			if(noKursiPenumpang2!='No Kursi'){
				if(noKursiPenumpang2==noKursiPenumpang1){
					alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
					document.getElementById("noKursi1").value = 'No Kursi';
				}
			}
			if(noKursiPenumpang3!='No Kursi'){
				if(noKursiPenumpang3==noKursiPenumpang1){
					alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
					document.getElementById("noKursi1").value = 'No Kursi';
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
			if(noKursiPenumpang1!='No Kursi'){
				if(noKursiPenumpang1==noKursiPenumpang2){
					alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
					document.getElementById("noKursi2").value = 'No Kursi';
				}
			}
		}
		else if(jumlahKursi==3){
			if(noKursiPenumpang3!='No Kursi'){
				if(noKursiPenumpang3==noKursiPenumpang2){
					alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
					document.getElementById("noKursi2").value = 'No Kursi';
				}
			}
			if(noKursiPenumpang1!='No Kursi'){
				if(noKursiPenumpang1==noKursiPenumpang2){
					alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
					document.getElementById("noKursi2").value = 'No Kursi';
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
			if(noKursiPenumpang1!='No Kursi'){
				if(noKursiPenumpang1==noKursiPenumpang3){
					alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
					document.getElementById("noKursi3").value = 'No Kursi';
				}
			}
			if(noKursiPenumpang2!='No Kursi'){
				if(noKursiPenumpang2==noKursiPenumpang3){
					alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
					document.getElementById("noKursi3").value = 'No Kursi';
				}
			}
		}
	}


</script>

<!-- ######### JS FILES ######### --> 
<!-- get jQuery from the google apis --> 


</body>
</html>
