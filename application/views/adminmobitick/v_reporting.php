<!--
<h1 style="margin-left:12px;"> 
	<a href="reporting" class="button_nav active">Harian</a> 
 	<a href="reporting_mingguan" class="button_nav">Mingguan</a>
 	<a href="reporting_bulanan" class="button_nav">Bulanan</a>
 	<a href="reporting_tahunan" class="button_nav">Tahunan</a></h1>
    -->
<br/>

<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                        <span class="mws-i-24 i-table-1">

   DATA TRANSAKSI

</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Plat Nomor</th>
                                    <th>Today Transaction</th>
                                    <th>All Transaction</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
							$no=1;
							foreach ($query as $row)
							{
							
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$row->plat_nomer.'</td>
											<td>'.$row->today_transaction.'<a href="reporting/todayTransaction/'.$row->ID_bus.'"><input class="mws-button black small" type="button" value="View"></a></td>
											<td>'.$row->all_transaction.'<a href="reporting/allTransaction/'.$row->ID_bus.'"><input class="mws-button black small" type="button" value="View"></a></td> <!--'.$row->ID_bus.' -->
											<!--
											<td><input class="mws-button green small" type="button" value="Edit"></input>
											<input class="mws-button red small" type="button" value="Delete"></input></td>
											-->
											
										</tr>
										';
									$no++;
							}
							
							?>
                                
                               
                            </tbody>
                        </table>
                    </div>
                </div>
<div id="load_detailrute"></div>