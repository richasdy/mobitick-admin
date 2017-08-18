
<div class="mws-panel grid_4">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-list"><?=$trayek->nama_trayek?></span>
                        <?php
						$trayek  = $trayek->nama_trayek;
						$pieces = explode(" - ", $trayek);
						$pieces[0];
						$pieces[1];
						
						?>
                    </div>
                    <div class="mws-panel-body">
                    	<div class="mws-panel-content">
                        <div>
                            <ul>
                                <?php
                                foreach ($maju as $row)
                                {
                                    echo '<li>'.$row->kota.'</li>';
                                }
								
                                ?>
                                <li><?=$pieces[1];?></li>
                             </ul>
                         </div>
                    </div>
				</div>
		</div>
                

<div class="mws-panel grid_4">
        <div class="mws-panel-header">
           <span class="mws-i-24 i-list"><?=$pieces[1]?> - <?=$pieces[0]?></span>
           <input class="mws-button red small" type="button" value="X" onClick="hiddenRute()" style="float:right; margin-top:-28px;"></input>
                    </div>
                    <div class="mws-panel-body">
                    	<div class="mws-panel-content">
                        <div>
                            <ul>
                                <?php
                                foreach ($balik as $row)
                                {
                                    echo '<li>'.$row->kota.'</li>';
                                }
                                ?>
                                 <li><?=$pieces[0];?></li>
                             </ul>
                         </div>
                        </div>
                    </div>
				</div>				
           </div>