<html lang="en-gb" class="no-js"> <!--<![endif]-->
<head>
<title>PO RAJAWALI</title>
	
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
					<li><a href="pesantiket">Pemesanan</a></li>
					<li><a href="konfirmasi"  class="active">Tiket</a></li>
					<li><a href="login">Login</a></li>
                </ul>
			</div>
		</nav>
	</div>
	
	</div>
		
	</div>
    
	</div>
    
</header>


	<div class="clearfix"></div>

	<div class="page_title">

	<div class="container">
	
	<div class="title"><h1>Konfirmasi</h1></div>
    
	<div class="pagenation">&nbsp;<a href="home">Home</a> <i>/</i> Proses Konfirmasi</div>
	
	</div>
	
	</div>
	
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
	 .labelForm{font-size:15px;  width:100%; background:none; text-align:center;}
	  #formPemesanan { background-color:#F7F7F7; padding:40px 40px 40px 100px; border:1px solid #CCC; }
	</style>  
	
    </div>
       
	</div>

	</div>
	
	<div class="clearfix mar_top5"></div>
	<div class="arrow_02"></div>
    <div class="clearfix mar_top5"></div>
    <div class="container"></div>
    <div class="clearfix mar_top5"></div>

	<div class="copyright_info">
    <div class="container">
    <div class="one_half"> <b>Copyright © 2014 PO. Rajawali. All rights reserved.Terms of Use| Privacy Policy</b> </div>
      
    </div>
	</div>
 
	<a href="#" class="scrollup">Scroll</a>
	
	</div>
	<link rel="stylesheet" href="<?=$css?>/datepicker/datepicker-stylesheet.css" type="text/css" />
	<script type="text/javascript" src="<?=$js?>/mainmenu/jquery-1.7.1.min.js"></script> 
	<script type="text/javascript" src="<?=$js?>/datepicker/jquery-ui.js"></script>
	
	<script>
	$(function() 
	{
		$('#datepicker').datepicker(
		{
				inline: true,showOtherMonths: true,dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],dateFormat: 'dd-mm-yy' 
		});

	});
	</script>
	
	<script>
	function jumlahKursi()
	{
		jlhkursi = document.getElementById("kursi").value;
		harga = document.getElementById("hargaKursi").value;
		totalHarga = jlhkursi*harga;
		if(jlhkursi==1)
		{
			document.getElementById("totalHargaKursi").value = totalHarga;
			$('#penumpang1').show();	
			$('#penumpang2').hide();	
			$('#penumpang3').hide();
			$('#hargaKursinya').show();
			$('#button').show();	
		}
		else if(jlhkursi==2)
		{
			document.getElementById("totalHargaKursi").value = totalHarga;
			$('#penumpang1').show();	
			$('#penumpang2').show();	
			$('#penumpang3').hide();
			$('#hargaKursinya').show();
			$('#button').show();	
		}
		else if(jlhkursi==3)
		{
			document.getElementById("totalHargaKursi").value = totalHarga;
			$('#penumpang1').show();	
			$('#penumpang2').show();	
			$('#penumpang3').show();
			$('#hargaKursinya').show();
			$('#button').show();	
		}
		else
		{
			document.getElementById("totalHargaKursi").value = totalHarga;
			$('#penumpang1').hide();	
			$('#penumpang2').hide();	
			$('#penumpang3').hide();
			$('#hargaKursinya').hide();
			$('#button').hide();	
		}
		}
	function ubah_tanggal()
	{
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
	}

	function ubah_bus()
	{
		idBus = document.getElementById("idBusnya").value;
		var mySplitResult = idBus.split("_");
		idBus = mySplitResult[0];
		idBus = parseInt(idBus);
		harga = mySplitResult[1];
		
		if(idBus==0)
		{
		$('#Kursinya').hide();
		$("#harga").val("");
		}
		else
		{
		
		$('#Kursinya').load('<?=$base_url;?>c_pemesanan/load_kursi2/'+idBus).fadeIn("slow");
		$("#harga").val(harga);
		}
	}	

	function cek_kursi1()
	{
		var jumlahKursi = document.getElementById("kursi").value;
		noKursiPenumpang1 = document.getElementById("noKursi1").value;
		noKursiPenumpang2 = document.getElementById("noKursi2").value;
		noKursiPenumpang3 = document.getElementById("noKursi3").value;
			if(jumlahKursi==2)
			{
				if(noKursiPenumpang2!='No Kursi')
				{
					if(noKursiPenumpang2==noKursiPenumpang1)
					{
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi1").value = 'No Kursi';
					}
				}
			}
			else if(jumlahKursi==3)
			{
				if(noKursiPenumpang2!='No Kursi')
				{
					if(noKursiPenumpang2==noKursiPenumpang1)
					{
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi1").value = 'No Kursi';
					}
				}
				if(noKursiPenumpang3!='No Kursi')
				{
					if(noKursiPenumpang3==noKursiPenumpang1)
					{
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi1").value = 'No Kursi';
					}
				}
			}

		}


	function cek_kursi2()
	{
		var jumlahKursi = document.getElementById("kursi").value;
		noKursiPenumpang1 = document.getElementById("noKursi1").value;
		noKursiPenumpang2 = document.getElementById("noKursi2").value;
		noKursiPenumpang3 = document.getElementById("noKursi3").value;
			if(jumlahKursi==2)
			{
				if(noKursiPenumpang1!='No Kursi')
				{
					if(noKursiPenumpang1==noKursiPenumpang2)
					{
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi2").value = 'No Kursi';
					}
				}
			}
			else if(jumlahKursi==3)
			{
				if(noKursiPenumpang3!='No Kursi')
				{
					if(noKursiPenumpang3==noKursiPenumpang2)
					{
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi2").value = 'No Kursi';
					}
				}
				if(noKursiPenumpang1!='No Kursi')
				{
					if(noKursiPenumpang1==noKursiPenumpang2)
					{
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi2").value = 'No Kursi';
					}
				}
			}
		}

	function cek_kursi3()
	{
		var jumlahKursi = document.getElementById("kursi").value;
		noKursiPenumpang1 = document.getElementById("noKursi1").value;
		noKursiPenumpang2 = document.getElementById("noKursi2").value;
		noKursiPenumpang3 = document.getElementById("noKursi3").value;
			if(jumlahKursi==3)
			{
				if(noKursiPenumpang1!='No Kursi')
				{
					if(noKursiPenumpang1==noKursiPenumpang3)
					{
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi3").value = 'No Kursi';
					}
				}
				if(noKursiPenumpang2!='No Kursi')
				{
					if(noKursiPenumpang2==noKursiPenumpang3)
					{
						alert ('Maaf, Nomor kursi sudah dipilih. Silahkan pilih yang lain!');
						document.getElementById("noKursi3").value = 'No Kursi';
					}
				}
			}
		}
	</script>

</body>
</html>