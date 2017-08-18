<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-sign-post">Edit Bus</span>
                        <input class="mws-button red small" type="button" style="float:right; margin-top:-28px;" onclick="hiddenEditBus()" value="X"></input>
                    </div>
                    <style>
					.current.active {background:#C5D52B;}
					</style>
                    <div class="mws-panel-body">
                        <style>
						.inputtext { height:32px; margin-right:10px; padding:0 5px 0 5px;}
						</style>
                    	<form class="mws-form" action="manage_bus/update_bus" method="post">
                    		<div class="mws-form-inline">
                            	<!-- form 1 -->
                                <div class="mws-form-row form-1">
                                   <label>Plat nomor bus</label>
                                    <div class="mws-form-item small">
                                   	<input name="id_bus" class="large inputtext" type="text" style="width:30%; display:none;" value="<?=$query->ID?>"></input>
                                   	<input name="plat_nomer" class="large inputtext" type="text" placeholder="Plat nomor" style="width:30%;" value="<?=$query->plat_nomer?>"></input>
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