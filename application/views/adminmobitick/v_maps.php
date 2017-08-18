<h1></h1>
<style>
body {font: 13px/1.5 "PTSansRegular",Arial,Helvetica,sans-serif !important;}
</style>
	<link rel="stylesheet" href="<?=$js?>/maplace/stylesheets/libs.min.css">
	<link rel="stylesheet" href="<?=$js?>/maplace/stylesheets/app.css">
	
	<section id="markers" class="row" style="margin-left:-0px;"><br/>
	
	<div class="four columns mobile-two">
		<ul class="tabs-content">
			<li class="active" id="example2Tab">
            <div class="gmap" id="gmap-3" style="width:110% !important; height:70vh !important;"></div>
            <div class="gmap" id="gmap-2" style="display:none;"></div>
			</li>
		</ul>
	
	</div>
	
	</section>

	<script src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.7?1343675510"></script> 
	<script src="<?=$js?>/maplace/javascripts/libs.min.js?v=0.1.2b"></script> 
	<script src="<?=$js?>/maplace/src/maplace.min.js?v=0.1.2c"></script> 
    <script>
	
var P1 = [
];
var LocsA = [
];
var LocsB = [

<?php
$i = 0;
$len = count($query);
foreach ($query as $row) {
	
	
    if ($i == $len - 1) {
        echo "
		 {
        lat: $row->latitude,
        lon: $row->longitude,
        title: '$row->plat_nomer',
        html: [
            '<h3>$row->plat_nomer</h3>'
        ].join(''),
        zoom: 12
		}
		";
    }else{
        echo "
		 {
        lat: $row->latitude,
        lon: $row->longitude,
        title: '$row->plat_nomer',
        html: [
            '<h3>$row->plat_nomer</h3>'
        ].join(''),
        zoom: 12
		},
		";
		}
    $i++;
	
}
?>
    
	
	
];
var LocsAB = LocsA.concat(LocsB);
var LocsC = [
];
var LocsD = [
];
	</script>
	<script src="<?=$js?>/maplace/data/points.js?v=0.1.2b"></script> 
	<script src="<?=$js?>/maplace/javascripts/app.js?v=0.1.2b"></script>