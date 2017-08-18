<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-sign-post">Edit Kota</span>
                        <input class="mws-button red small" type="button" style="float:right; margin-top:-28px;" onclick="hiddenEditKota()" value="X"></input>
                    </div>
                    <style>
					.current.active {background:#C5D52B;}
					</style>
                    <div class="mws-panel-body">
                        <style>
						.inputtext { height:32px; margin-right:10px; padding:0 5px 0 5px;}
						</style>
                    	<form class="mws-form" action="manage_posisi_kota/update_kota" method="post">
                    		<div class="mws-form-inline">
                            	<!-- form 1 -->
                                <div class="mws-form-row form-1">
                                   <label>Nama Kota</label>
                                    <div class="mws-form-item small">
                                   	<input name="id_kota" class="large inputtext" type="text" style="width:30%; display:none;" value="<?=$query_kota->ID?>"></input>
                                   	<input name="nama_kota" class="large inputtext" type="text" placeholder="Nama kota" style="width:30%;" value="<?=$query_kota->nama_lokasi?>"></input>
                                   	<input name="latitude" class="large inputtext" type="text" placeholder="Latitude"  style="width:17%;" value="<?=$query_kota->latitude?>"></input>
                                   	<input name="longitude" class="large inputtext" type="text" placeholder="Longitude"  style="width:17%;" value="<?=$query_kota->longitude?>"></input>
                                    <input type="submit" value="UPDATE DATA" class="mws-button green" />
                                    </div>
                                </div>
                                <!-- END form 1 -->
                    		</div>
                    		<div class="mws-button-row">
                    			
                    				
                    		</div>
                    	</form>
                    </div>
                </div>