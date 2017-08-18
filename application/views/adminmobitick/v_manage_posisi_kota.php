<h1 style="margin-left:12px;"> 
	<a href="manage_track" class="button_nav">Manage Rute</a> 
 	<a href="manage_posisi_kota" class="button_nav active">Manage Posisi Kota</a></h1>
    
<br/>
<div id="deleteKota">
</div>
<div id="load_addkota" style="display:none;">
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-sign-post">Tambah Kota</span>
                        <input class="mws-button red small" type="button" style="float:right; margin-top:-28px;" onclick="hiddenAddTrack()" value="X"></input>
                    </div>
                    <style>
					.current.active {background:#C5D52B;}
					</style>
                    <div class="mws-panel-body">
                        <style>
						.inputtext { height:32px; margin-right:10px; padding:0 5px 0 5px;}
						</style>
                    	<form class="mws-form" action="manage_posisi_kota/input_kota" method="post">
                    		<div class="mws-form-inline">
                            	<!-- form 1 -->
                                <div class="mws-form-row form-1">
                                   <label>Nama Kota</label>
                                    <div class="mws-form-item small">
                                   	<input name="nama_kota" class="large inputtext" type="text" placeholder="Nama kota" style="width:30%;"></input>
                                   	<input name="latitude" class="large inputtext" type="text" placeholder="Latitude"  style="width:17%;"></input>
                                   	<input name="longitude" class="large inputtext" type="text" placeholder="Longitude"  style="width:17%;"></input>
                                    <input type="submit" value="SUBMIT" class="mws-button green" />
                                    </div>
                                </div>
                                <!-- END form 1 -->
                               
                             
                               
                                
                    		</div>
                    		<div class="mws-button-row">
                    			
                    				
                    		</div>
                    	</form>
                    </div>
                </div>
</div>

<div id="load_editkota">
</div>
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                        <span class="mws-i-24 i-table-1">

   DATA KOTA

</span>
                        <div style="margin-top:-33px; float:right;">
                        <input class="mws-button black medium" type="button" value="Tambah Kota" onclick="add_track()"></input>
                        </div>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kota</th>
                                    <th>Latitude - Longitude</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
							$no=1;
							foreach ($query_kota as $row)
							{
							
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$row->nama_lokasi.'</td>
											<td>'.$row->latitude.','.$row->longitude.'</td>
											
											<td><input class="mws-button green small" type="button" value="Edit" onclick="edit_kota('.$row->ID.')"></input>
											<input class="mws-button red small" type="button" value="Delete"  onclick="return confirmDeleteKota('.$row->ID.')"></input></td>
											
											
										</tr>
										';
									$no++;
									
								
							}
							
							?>
                                
                               
                            </tbody>
                        </table>
                    </div>
                </div>
