

<div id="load_addbus" style="display:none;">
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-sign-post">Tambah Bus</span>
                        <input class="mws-button red small" type="button" style="float:right; margin-top:-28px;" onclick="hiddenAddBus()" value="X"></input>
                    </div>
                    <style>
					.current.active {background:#C5D52B;}
					</style>
                    <div class="mws-panel-body">
                        <style>
						.inputtext { height:32px; margin-right:10px; padding:0 5px 0 5px;}
						</style>
                    	<form class="mws-form" action="manage_bus/input_bus" method="post">
                    		<div class="mws-form-inline">
                            	<!-- form 1 -->
                                <div class="mws-form-row form-1">
                                   <label>Plat nomor bus</label>
                                    <div class="mws-form-item small">
                                   	<input name="plat_nomer" class="large inputtext" type="text" placeholder="Plat nomor" style="width:30%;"></input>
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
<div id="load_editbus">

</div>

<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                        <span class="mws-i-24 i-table-1">

   DATA BUS

</span>
                        <div style="margin-top:-33px; float:right;">
                        <input class="mws-button black medium" type="button" value="Tambah Bus" onclick="add_bus()"></input>
                        </div>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Rute Trayek</th>
                                    <th>Action</th>
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
											
											<td>
											<input class="mws-button green small" type="button" value="Edit"  onclick="edit_bus('.$row->ID.')"></input>
											<input class="mws-button red small" type="button" value="Delete"  onclick="confirmDeleteBus('.$row->ID.')"></input>
											</td>
											
											
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