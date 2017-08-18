<h1 style="margin-left:12px;"> 
	<a href="manage_track" class="button_nav active">Manage Rute</a> 
 	<a href="manage_posisi_kota" class="button_nav">Manage Posisi Kota</a></h1>
    
<br/>

<div id="load_addtrack" style="display:none;">
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-sign-post">Tambah Trayek</span>
                        <input class="mws-button red small" type="button" style="float:right; margin-top:-28px;" onclick="hiddenAddTrack()" value="X"></input>
                    </div>
                    <style>
					.current.active {background:#C5D52B;}
					</style>
                    <div class="mws-panel-body">
                        <div class="mws-wizard clearfix">
                            <ul>
                                <li class="current satu active">
                                    <a class="mws-ic-16 ic-accept" href="#">Nama Trayek</a>
                                </li>
                                <li class="current dua">
                                    <a href="#" class="mws-ic-16 ic-delivery">Trayek Maju</a>
                                </li>
                                <li class="current tiga">
                                    <a href="#" class="mws-ic-16 ic-delivery">Trayek Balik</a>
                                </li>
                                <li class="current empat">
                                    <a class="mws-ic-16 ic-user" href="#">Confirmation</a>
                                </li>
                            </ul>
                        </div>
                    	<form class="mws-form" action="manage_track/input_track" method="post">
                    		<div class="mws-form-inline">
                            	<!-- form 1 -->
                                <div class="mws-form-row form-1">
                                   <label>Nama Trayek</label>
                                    <div class="mws-form-item small">
                                    <select name="pool_asal" id="pool_asal"  class="chzn-select" style="width:200%;">
                                    <option value="0">Pool Asal</option>
									   <?php 
                                        foreach ($query_kota as $row)
                                        {
                                            echo '<option value="'.$row->ID.'">'.$row->nama_lokasi.'</option>';
                                        }
                                        ?>
                                    </select>
                                    <select name="pool_tujuan" id="pool_tujuan" class="chzn-select" style="width:200%;">
                                    <option value="0">Pool Tujuan</option>
									   <?php 
                                        foreach ($query_kota as $row)
                                        {
                                            echo '<option value="'.$row->ID.'">'.$row->nama_lokasi.'</option>';
                                        }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                                <!-- END form 1 -->
                                <!-- form 2 -->
                                <div class="mws-form-inline form-2" style="display:none;">
                                    <div class="mws-form-row">
                                        <label>Trayek Maju</label>
                                        <input type="text" name="jlh_trayekmaju" id="jlh_trayekmaju"  style="display:none" />
                                        <?php
                                        for ( $i = 1; $i <= 30; $i += 1) {
											echo '
											<!-- item $i -->
											<div class="mws-form-item large" id="form_'.$i.'"  style="display:none">
												<div class="mws-form-cols clearfix">
													<div class="mws-form-col-2-8 alpha">
													
														<div class="mws-form-item">
														 <select name="kota'.$i.'" id="change_pool_asal_'.$i.'"  class="chzn-select" style="width:200%;">
														 <option value=""></option>
														';
														foreach ($query_kota as $row)
														{
															echo '<option value="'.$row->ID.'">'.$row->nama_lokasi.'</option>';
														}
											echo '
														</select>
														</div>
													</div>
													<div class="mws-form-col-2-8 harga">
														<div class="mws-form-item">
															<input type="text" class="mws-textinput" placeholder="Harga" name="harga'.$i.'"  id="harga'.$i.'" />
														</div>
													</div>                                                
													<div class="mws-form-col-2-8">
														<div class="mws-form-item">
														<span class="ui-icon ui-icon-close" onclick="close_field('.$i.')"></span><span style=" float:left; margin-left:15% !important; margin-top:-12px !important;">'.$i.'</span>											
														</div>
													</div>                                                
													                                               
												</div>
												
												

											</div>
											
											';
										}
										?>
                                        
                                       
                                        
                                        <div class="mws-form-item large">
                                            <div class="mws-form-cols clearfix">
                                                <input id="add_item" class="mws-button green next" type="button" value="ADD FIELD"></input>                                           
                                            </div>
                                        </div>
                                        
                                    </div>
                           		</div>
                             	<!-- END form 2 -->
                             
                                <!-- form 3 -->
                                <div class="mws-form-inline form-3" style="display:none;">
                                    <div class="mws-form-row">
                                        <label>Trayek Balik</label>
                                         <input type="text" name="jlh_trayekbalik" id="jlh_trayekbalik"  style="display:none" />
                                        <?php
                                        for ( $i = 1; $i <= 30; $i += 1) {
											echo '
											<!-- item $i -->
											<div class="mws-form-item large" id="formb_'.$i.'" style="display:none">
												<div class="mws-form-cols clearfix">
													<div class="mws-form-col-2-8 alpha">
														<div class="mws-form-item">
														 <select name="kotab'.$i.'"   id="change_pool_tujuan_'.$i.'"    class="chzn-select" style="width:200%;">
														 <option value=""></option>
														';
														foreach ($query_kota as $row)
														{
															echo '<option value="'.$row->ID.'">'.$row->nama_lokasi.'</option>';
														}
											echo '
														</select>
														</div>
													</div>
													<div class="mws-form-col-2-8 harga">
														<div class="mws-form-item">
															<input type="text" class="mws-textinput" placeholder="Harga" name="hargab'.$i.'"  id="hargab'.$i.'"  />
														</div>
													</div>                                                
													<div class="mws-form-col-2-8">
														<div class="mws-form-item">
														<span class="ui-icon ui-icon-close" onclick="close_fieldb('.$i.')"></span>	<span style=" float:left; margin-left:15% !important; margin-top:-12px !important;">'.$i.'</span>												
														</div>
													</div>  
												</div>
												
												

											</div>
											
											';
										}
										?>
                                        
                                       
                                        
                                        <div class="mws-form-item large">
                                            <div class="mws-form-cols clearfix">
                                                <input id="add_itemb" class="mws-button green next" type="button" value="ADD FIELD"></input>                                           
                                            </div>
                                        </div>
                                        
                                    </div>
                           		</div>
                             	<!-- END form 3 -->
                             
                                <!-- form 4 -->
                                <div class="mws-form-inline form-4" style="display:none;">
                                    <div class="mws-form-row">
                                        <label></label>
                                       
                                        <div class="mws-form-item large">
                                            <div class="mws-form-cols clearfix">
                                                <input class="mws-button green" type="submit" value="KLIK OKE UNTUK SUBMIT"></input>                                           
                                            </div>
                                        </div>
                                        
                                    </div>
                           		</div>
                             	<!-- END form 4 -->
                             
                                
                    		</div>
                    		<div class="mws-button-row">
                    			<input type="button" value="Prev" class="mws-button gray left prev" onclick="prev()" />
                    			<input type="button" value="Next" class="mws-button green next" onclick="next()" id="buttonnext" />
                    		</div>
                    	</form>
                    </div>
                </div>

</div>
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                        <span class="mws-i-24 i-table-1">

   DATA RUTE TRAYEK

</span>
                        <div style="margin-top:-33px; float:right;">
                        <input class="mws-button black medium" type="button" value="Tambah Rute" onclick="add_track()"></input>
                        </div>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-datatable mws-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Rute Trayek</th>
                                    <th>Detail Rute</th>
                                 <!--   <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php
							$no=1;
							$t='trayek';
							foreach ($query as $row)
							{
							$trayek  = $row->nama_trayek;
							$pieces = explode(" - ", $trayek);
							$pieces[0];
							$pieces[1];
							
							if($pieces[1]!=$t)
								{
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$row->nama_trayek.'</td>
											
											<td><input class="mws-button black small" type="button" value="View Rute" onclick="show_detailrute('.$row->ID.')"></input></td>
											<!--<td><input class="mws-button green small" type="button" value="Edit"></input>
											<input class="mws-button red small" type="button" value="Delete"></input></td>
											-->
											
										</tr>
										';
									$no++;
									$t=$pieces[0];
								}
							}
							
							?>
                                
                               
                            </tbody>
                        </table>
                    </div>
                </div>
<div id="load_detailrute"></div>