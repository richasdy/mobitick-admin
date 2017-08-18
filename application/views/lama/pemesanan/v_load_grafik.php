	<!-- Vertical Bars -->
     
				<div class="g_12" style="margin-top:40px;">
					<div class="widget_header">
						<h4 class="widget_header_title wwIcon i_16_bars">Grafik Pembelian Tiket - <?=$m?> <?=$y?></h4>
                        
                       
					</div>
					<div class="widget_contents">
                  
                    
						<table class="highchart" data-graph-container-before="1" data-graph-type="column" border=1 style="font-size:13;">
  <thead>
      <tr>
          <th>Date Keberangkatan Bus</th>
          <th>Pemesanan Tiket</th>
      </tr>
   </thead>
   <tbody>
   <?php
   foreach ($query as $row){
   echo '
   <tr>
          <td>'.$row->tgl_keberangkatan.'</td>
          <td>'.$row->jumlah_pemesanan.'</td>
   </tr>
					
	';
					
	}
   
   ?>
   
     
  </tbody>
</table>
					</div>
				</div>
 

 <Script>
 $(document).ready(function() {
  $('table.highchart').highchartTable();
  
  $( "#buttonnya" ).click(function() {
	bulannya = document.getElementById("bulannya").value;
	tahunnya = document.getElementById("tahunnya").value;
	tanggalnya = tahunnya+'-'+bulannya;
	alert (tanggalnya);
   $('#user').load('<?=$base_url;?>c_pemesanan/load_grafik/'+tanggalnya).fadeIn("slow");
	});
});
 </script>