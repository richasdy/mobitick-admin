
<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

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
	  <div class="one_half last">
    <style>
	 .formItem{ display:block; margin-bottom:12px;}
	 .selectForm{color:#777; margin-left:0px;margin-top:25px;  font-size:12px; padding:8px 5px 8px 5px; z-index:10;}
	 .inputForm{ padding:8px; margin-left:0px;margin-top:25px; }
	 .buttonForm{ padding:8px 20px 8px 20px; margin-top:40px; }
	 .margin { margin-left:0px; margin-top:25px;}
	 .labelForm{font-size:15px;  position:absolute; width:200px; background:none;}
	 #formPemesanan { background-color:#F7F7F7; padding:30px 15px 20px 25px; border:1px solid #CCC; }
	    </style>
       <h3><i>Download Tiket</i></h3>

    <form action="pesantiket_proses" method="post" id="formPemesanan" >
    
         <fieldset>
        
        <div class="formItem">
        <div class="labelForm">Kode Tiket</div>
        <input name="tanggal" type="text" id="kodetiket"  class="inputForm" style="width:80px;" required value='' onBlur="cekKodeTiket()"/>
        </div>
       
      
        <div id="button">
        <div class="formItem">
        <span class="labelForm"></span>
     
        <input onClick="dolink(this); return false;" 
        type="button"  value='DOWNLOAD' class="buttonForm margin" />
        </div>
        </div>
        
        </fieldset>
        
        </form> 
        <div id="valid_msg"/>
<script>
function dolink(){
	var kt = document.getElementById("kodetiket").value;
	//alert(obj.getAttribute("href"+"oke"));
	document.location.href = "<?=$base_url?>pdf/download/"+kt;
	}
</script>
    </div>

    </div>
            
</div>

</div><!-- end content area -->



<!-- Footer
======================================= --><!-- end copyright info --> 
  
  </div>
 <link rel="stylesheet" href="<?=$css?>/datepicker/datepicker-stylesheet.css" type="text/css" />
<script type="text/javascript" src="<?=$js?>/mainmenu/jquery-1.7.1.min.js"></script> 
<script type="text/javascript" src="<?=$js?>/datepicker/jquery-ui.js"></script>
<?php
include "validasi.html";
?>
</body>
</html>
