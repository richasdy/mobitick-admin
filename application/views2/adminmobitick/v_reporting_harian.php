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
                                    <th>Nama Trayek</th>
                                    <th>Asal</th>
                                    <th>Tujuan</th>
                                    <th>Jumlah Tiket</th>
                                    <th>Harga</th>
                                    <th>Waktu</th>
                                 <!--   <th>Action</th> -->
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
											<td>'.$row->nama_trayek.'</td>
											<td>'.$row->asal.'</td>
											<td>'.$row->tujuan.'</td>
											<td>'.$row->jumlah_tiket.'</td>
											<td>'.$row->harga_total.'</td>
											<td>'.$row->date_time.'</td>
											
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