<html lang="en-gb" class="no-js">
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
<div class="site_wrapper"> 
  
  <!-- HEADER -->
  <header id="header"> 
    
    <!-- Top header bar -->
    <div id="trueHeader">
      <div class="wrapper">
        <div class="container"> 
          
          <!-- Logo -->
          <div class="one_fourth"><a href="index.html" id="logo"></a></div>
          
          <!-- Menu -->
          <div class="three_fourth last">
            <nav id="access" class="access" role="navigation">
              <div id="menu" class="menu">
                <ul id="tiny">
                  <li><a href="home">Home</a></li>
                  <li><a href="pesantiket" >Pemesanan</a></li>
                  <li><a href="konfirmasi"  class="active">Tiket</a></li>
                  <li><a href="login">Login</a></li>
                </ul>
              </div>
            </nav>
            <!-- end nav menu --> 
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- end header -->
  
  <div class="clearfix"></div>
  <div class="page_title">
    <div class="container">
      <div class="title">
        <h1>Tiket</h1>
      </div>
      <div class="pagenation">&nbsp;<a href="home">Home</a> <i>/</i>Tiket</div>
    </div>
  </div>
  <!-- end page title --> 
  
  <!-- Contant
======================================= -->
  
  <div class="container">
    <div class="content_fullwidth">
      <div class="one_half">
        <h3><i>Konfirmasi</i></h3>
        <form action="konfirmasi_proses_new" method="post" id="formPemesanan" enctype="multipart/form-data" onSubmit="return validation(this)" >
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
         readonly class="inputForm" id="BuktiBayar" onChange="checkName(this, 'fname', 'submit')" />
              Ket: JPG Only </div>
            <div class="formItem">
              <div class="labelForm">Keterangan Lain</div>
              <textarea class="inputForm" cols="35" name="ket_lain" ></textarea>
            </div>
           
            <div class="formItem">
              <div class="labelForm">Capctha <span style="font-size:12px;">(key sensitive)</span></div>
               <div style="display:inline !important; margin-left:180px;"><?=$image;?></div> 
              <input name="word" type="text" class="inputForm" required placeholder="insert captcha"/>
            </div>
            <div id="button">
              <div class="formItem"> <span class="labelForm"></span>
                <input type="submit" id="submit"  value='KONFIRMASI' class="buttonForm margin" />
              </div>
            </div>
          </fieldset>
        </form>
        <form style="display:none;" action="upload.php" method="post" id="idf" enctype="multipart/form-data">
          Upload file:
          <input type="file" name="fup" onChange="checkName(this, 'fname', 'submit')" />
          <br />
          File name:
          <input type="text" value="" name="denumire" id="fname" />
          <br />
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
	 .selectForm{color:#777; margin-left:180px;  font-size:12px; padding:8px 5px 8px 5px; z-index:10;}
	 .inputForm{ padding:8px; margin-left:180px; }
	 .buttonForm{ padding:8px 20px 8px 20px; margin-top:20px; }
	 .margin { margin-left:180px; }
	 .labelForm{font-size:15px;  position:absolute; width:200px; background:none;}
	 #formPemesanan { background-color:#F7F7F7; padding:30px 15px 20px 25px; border:1px solid #CCC; }
	 </style>
      </div>
      <div class="one_half last">
        <h3><i>Download Tiket</i></h3>
        <form action="pesantiket_proses" method="post" id="formPemesanan" >
          <fieldset>
            <div class="formItem">
              <div class="labelForm">Kode Tiket</div>
              <input name="tanggal" type="text" id="kodetiket"  class="inputForm" style="width:80px;" required value='' onBlur="cekKodeTiket()"/>
            </div>
            <div id="button">
              <div class="formItem"> <span class="labelForm"></span>
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
</div>
<!-- end content area -->

<div class="clearfix mar_top5"></div>

<!-- Footer
======================================= -->

<div class="copyright_info">
  <div class="container">
    <div class="one_half"> <b>Copyright © 2014 PO. Rajawali. All rights reserved.Terms of Use | Privacy Policy</b> </div>
  </div>
</div>
<!-- end copyright info --> 

<a href="#" class="scrollup">Scroll</a><!-- end scroll to top of the page-->
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
