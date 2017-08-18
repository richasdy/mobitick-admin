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

    <form action="konfirmasi_proses2" method="post" id="formPemesanan" enctype="multipart/form-data" onSubmit="return validation(this)" >
    
        <fieldset>
        
        <div class="formItem">
        <div class="labelForm">Kode Verifikasi</div>
        <input name="kode_pemesanan" type="text"
          class="inputForm" required  id="BuktiBayar" onBlur="cekBuktiBayar()"/>
        </div>
		<div class="formItem">
    <div class="labelForm">Nama Pengirim</div>
		 <input name="namaPengirim" type="text" id="namaPengirim"  onChange="cekNamaPengirim()" value=''  class="inputForm" required/>
    </div> 	 
	
                <div class="formItem">
              <div class="labelForm">No Identitas <span style="font-size:12px;">(KTP/SIM)</span></div>
              <input name="no_identitas" type="text" id="noIdentitas"  onChange="cekNoIdentitas()" value=''  class="inputForm" required/>
            </div>
            


	<div class="formItem">
    <div class="labelForm">No Rekening</div>
		 <input name="norek" type="text" id="norek"  onChange="cekNoRek()" value=''  class="inputForm" required/>
    </div> 	 
	
	<div class="formItem">
    <div class="labelForm">Rekening Tujuan</div>
		 <!--<input name="rektujuan" type="text" id="rektujuan"  onChange="cekRekTujuan()" value=''  class="inputForm" required/>-->
		   <select class="selectForm"  name="rektujuan">
				<option>BNI : 02223489145</option>
                <option>BRI : 013808760</option>
           </select>
    </div> 	 
	
	<div class="formItem">
    <div class="labelForm">Total Bayar (Rp.)</div>
		 <input name="totalbayar" type="text" id="totalbayar" onChange="cekTotalBayar()" value=''  class="inputForm" required/>
    </div> 	
    
        <div class="formItem">
        <div class="labelForm">Tanggal Pengiriman</div>
       <input name="tanggal" type="text" id="datepicker" readonly class="inputForm" style="width:90px;" required/>
        </div>
       
       
        <div class="formItem">
        <div class="labelForm">Bukti Bayar</div>
        <input name="userfile" type="file" value="Unggah Foto"
         readonly class="inputForm" id="BuktiBayar" onChange="checkName(this, 'fname', 'submit')" />Ket: JPG Only
        </div>
       
        <div class="formItem">
        <div class="labelForm">Keterangan Lain</div>
        <textarea class="inputForm" cols="35" name="ket_lain" ></textarea>
        </div>
       
        <div class="formItem">
              <div class="labelForm">Capctha <span style="font-size:12px;">(key sensitive)</span></div>
              <br/>
               <div style="display:inline !important; margin-right:80px;"><?=$image;?></div><br/> 
              <input name="word" type="text" class="inputForm" required placeholder="insert captcha"/>
            </div>
       
      
      
        <div id="button">
        <div class="formItem">
        <span class="labelForm"></span>
        <input type="submit" id="submit"  value='KONFIRMASI' class="buttonForm margin" />
        </div>
        </div>
        
        </fieldset>
        
        </form> 
        
        <form style="display:none;" action="upload.php" method="post" id="idf" enctype="multipart/form-data">
 Upload file: <input type="file" name="fup" onChange="checkName(this, 'fname', 'submit')" /><br />
 File name: <input type="text" value="" name="denumire" id="fname" /><br />
 <input type="submit" id="submit" value="Submit" disabled="disabled" />
</form>
<script type="text/javascript"><!--
var ar_ext = ['gif', 'jpe', 'jpg', 'png'];        // array with allowed extensions

function checkName(el, to, sbm) {
// - coursesweb.net
  // get the file name and split it to separe the extension
  var name = el.value;
  var ar_name = name.split('.');

  // for IE - separe dir paths (\) from name
  var ar_nm = ar_name[0].split('\\');
  for(var i=0; i<ar_nm.length; i++) var nm = ar_nm[i];

  // add the name in 'to'
  document.getElementById(to).value = nm;

  // check the file extension
  var re = 0;
  for(var i=0; i<ar_ext.length; i++) {
    if(ar_ext[i] == ar_name[1]) {
      re = 1;
      break;
    }
  }

  // if re is 1, the extension is in the allowed list
  if(re==1) {
    // enable submit
    document.getElementById(sbm).disabled = false;
  }
  else {
    // delete the file name, disable Submit, Alert message
    el.value = '';
    document.getElementById(sbm).disabled = true;
    alert('".'+ ar_name[1]+ '" is not an file type allowed for upload');
  }
}
--></script>
   <style>
	 .formItem{ display:block; margin-bottom:12px;}
	 .selectForm{color:#777; margin-left:0px;margin-top:25px;  font-size:12px; padding:8px 5px 8px 5px; z-index:10;}
	 .inputForm{ padding:8px; margin-left:0px;margin-top:25px; }
	 .buttonForm{ padding:8px 20px 8px 20px; margin-top:40px; }
	 .margin { margin-left:0px; margin-top:25px;}
	 .labelForm{font-size:15px;  position:absolute; width:200px; background:none;}
	 #formPemesanan { background-color:#F7F7F7; padding:30px 15px 20px 25px; border:1px solid #CCC; }
	    </style>
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
<script>
 $(function() {

$('#datepicker').datepicker({
				inline: true,
				showOtherMonths: true,
				//dateFormat: 'dd MM yy',
				dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
				//showOn: "button",
				//buttonImage: "img/calendar-blue.png",
				//buttonImageOnly: true,
				minDate: 0,
			//	maxDate: "+1M +10D",
				dateFormat: 'dd-mm-yy' 
			});

});
</script>
</body>
</html>