<!-- Inner Container Start -->

<script>
$(function () {
	/*
	var d1 = [];
    for (var i = 0; i <= 10; i += 1)
        d1.push([i, parseInt(Math.random() * 30)]);

    var d2 = [];
    for (var i = 0; i <= 10; i += 1)
        d2.push([i, parseInt(Math.random() * 30)]);

    var d3 = [];
    for (var i = 0; i <= 10; i += 1)
        d3.push([i, parseInt(Math.random() * 30)]);

    var stack = 0, bars = true, lines = false, steps = false;
    
    $.plot($("#mws-bar-chart"), [ d1, d2, d3 ], {
        series: {
            stack: stack,
            lines: { show: lines, fill: true, steps: steps },
            bars: { show: bars, barWidth: 0.6 }
        }
    });
	*/
	var d1 = [];
	
    for (var i = 0; i <= 23; i += 1){
		<?php
		foreach ($query as $row)
		{
			echo "d1.push([$row->jam, $row->jumlah]);";
		}
		?>
     //d1.push([i, 23]); 
	 //d1.push([i, parseInt(Math.random() * 30)]);  
	//if(i != 5)
	//d1.push([i,5]);  
	}
	
	 
    var stack = 0, bars = true, lines = false, steps = false;
    
    $.plot($("#mws-bar-chart"), [ d1 ], {
        series: {
            stack: stack,
            lines: { show: lines, fill: true, steps: steps },
            bars: { show: bars, barWidth: 0.6 }
        }
    });
	
});
</script>
            <div class="container">
            
            	<!-- Statistics Button Container -->
            	<div class="mws-report-container clearfix">
                	
                    <!-- Statistic Item -->
                	<a class="mws-report" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-report-icon mws-ic  ic-chart-curve-go"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-report-content">
                        	<span class="mws-report-title">Transaksi Hari Ini</span>
                            <span class="mws-report-value">324</span>
                        </span>
                    </a>

                	<a class="mws-report" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-report-icon mws-ic ic-coins"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-report-content">
                        	<span class="mws-report-title">Pendapatan Hari Ini</span>
                            <span class="mws-report-value">740976</span>
                        </span>
                    </a>

                	<a class="mws-report" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-report-icon mws-ic ic-chart-bar"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-report-content">
                        	<span class="mws-report-title">Performa Poin</span>
                            <span class="mws-report-value">14234</span>
                        </span>
                    </a>
                    
                	<a class="mws-report" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-report-icon mws-ic ic-autos"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-report-content">
                        	<span class="mws-report-title">Jumlah Bus</span>
                            <span class="mws-report-value"><?=$query2->jumlah_bus;?></span>
                        </span>
                    </a>
                    
                	<a class="mws-report" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-report-icon mws-ic ic-routing-go-straight-right"></span>

                        <!-- Statistic Content -->
                        <span class="mws-report-content">
                        	<span class="mws-report-title">Jumlah Trayek</span>
                            <span class="mws-report-value"><?=($query3->jumlah_trayek)/2;?></span>
                        </span>
                    </a>
                </div>
                
                <!-- Panels Start -->
                
            	<div class="mws-panel grid_8" style="display:none;">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-graph">Line Charts</span>
                    </div>
                    <div class="mws-panel-body">
                    	<div class="mws-panel-content">
                    		<div id="mws-line-chart" style="width:100%; height:300px; "></div>
                    	</div>
                    </div>
                </div>
                
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-bar-graph">Today Transaction</span>
                    </div>
                    <div class="mws-panel-body">
                    	<div class="mws-panel-content">
                    		<div id="mws-bar-chart" style="width:100%; height:300px; "></div>
                    	</div>
                    </div>
                </div>
                
            	<div class="mws-panel grid_4"  style="display:none;">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-chart">Pie Chart 1</span>
                    </div>
                    <div class="mws-panel-body">
                    	<div class="mws-panel-content">
                    		<div id="mws-pie-1" style="width:100%; height:300px; "></div>
                    	</div>
                    </div>
                </div>
                
            	<div class="mws-panel grid_4"  style="display:none;">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-chart-2">Pie Chart 2</span>
                    </div>
                    <div class="mws-panel-body">
                    	<div class="mws-panel-content">
                    		<div id="mws-pie-2" style="width:100%; height:300px; "></div>
                    	</div>
                    </div>
                </div>
                
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->