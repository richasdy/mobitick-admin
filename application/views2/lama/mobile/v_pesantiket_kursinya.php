 <div class="formItem">
        <span class="labelForm">No Kursi Terisi</span>
        <div style="margin-left:180px;">
       <?php
		$i=1;
		while ($i <= $query2->jumlah_kursi) {
			$cek=true;
			foreach($query as $row){
				if($i==$row->no_kursi){
					echo '
					<input  checked disabled="disabled" type="radio" "></input> 
					<span class="label ilC" style="margin-left:-5px;">'.$row->no_kursi.'</span>
					';
					$cek=false;
				}
			}
			if ($cek){echo '
			<input type="radio" disabled="disabled"  name="no_kursi" value="'.$i.'"></input> 
			<span class="label ilC" style="margin-left:-5px;">'.$i.'</span>
			';}
			$i++;
		}
		?>
        </div>
        </div>
        
        <div class="formItem">
        <span class="labelForm">Harga 1 Kursi</span>
        <input type="text" value="<?php echo $query2->harga;?>" class="inputForm" id="hargaKursi" name="harga"/>
        </div>
        
        <div class="formItem">
        <span class="labelForm">Jumlah Penumpang</span>
        <select class="selectForm" onChange="jumlahKursi()" id="kursi" name="jumlah_penumpang">
                                <option>Jumlah</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                </select>
        </div>
        
        <div id="penumpang1" style="display:none;">
        <div class="formItem">
        <span class="labelForm">Nama Pemesan</span>
        <input name="nama_pemesan" type="text" id="nama_pemesan" onblur="cekNamaPemesan()" value=''  class="inputForm"
        required/>
        <p class="help-block"></p>
        </div>
       
        <div class="formItem">
        <div class="control-group">
        <span class="labelForm">No Telp</span>
              <div class="controls">
                <input name="no_tlp" type="number" id="notelp" value='' onblur="cekNoTelp()" class="inputForm" required/>
                 <p class="help-block"></p>
              </div>
        </div>
        </div>
   
        <div class="formItem">
        <span class="labelForm">Nama Penumpang 1</span>
        <input name="nama_penumpang1" type="text" id="namaPenumpang" value=''   onblur="cekNamaPenumpang()" class="inputForm" required/></div>
        
        <div class="formItem">
        <span class="labelForm">No Kursi</span>
        <select class="selectForm" name="no_kursi1" id="noKursi1" onchange="cek_kursi1()" required style="width:120px;">
                                <option></option>
                                 <?php
								$i=1;
								while ($i <= $query2->jumlah_kursi) {
									$cek=true;
									foreach($query as $row){
										if($i==$row->no_kursi){
											echo '';
											$cek=false;
										}
									}
									if ($cek){echo '
									<option value="'.$i.'">'.$i.'</option>
									';}
									$i++;
								}
								?>
                                <option value="99" style="display:none;">99</option>
                                </select>
        </div>
        </div>
        
        <div id="penumpang2" style="display:none;">        
        <div class="formItem">
        <span class="labelForm">Nama Penumpang 2</span>
        <input name="nama_penumpang2" type="text" id="namaPenumpang2" value=''   onblur="cekNamaPenumpang2()"   class="inputForm" required/></div>
        <div class="formItem">
        <span class="labelForm">No Kursi</span>
        <select class="selectForm" name="no_kursi2" id="noKursi2" onchange="cek_kursi2()" required style="width:120px;">
                                <option></option>
                                 <?php
								$i=1;
								while ($i <= $query2->jumlah_kursi) {
									$cek=true;
									foreach($query as $row){
										if($i==$row->no_kursi){
											echo '';
											$cek=false;
										}
									}
									if ($cek){echo '
									<option value="'.$i.'">'.$i.'</option>
									';}
									$i++;
								}
								?>
                                <option value="99" style="display:none;">99</option>
                                </select>
        </div>
        
        </div>
        
        <div id="penumpang3" style="display:none;">
        <div class="formItem">
        <span class="labelForm">Nama Penumpang 3</span>
        <input name="nama_penumpang3" type="text" id="namaPenumpang3" value=''   onblur="cekNamaPenumpang3()"  class="inputForm" required/></div>
        
        <div class="formItem">
        <span class="labelForm">No Kursi</span>
        <select class="selectForm" name="no_kursi3" id="noKursi3" onchange="cek_kursi3()" required style="width:120px;">
                                <option></option>
                                 <?php
								$i=1;
								while ($i <= $query2->jumlah_kursi) {
									$cek=true;
									foreach($query as $row){
										if($i==$row->no_kursi){
											echo '';
											$cek=false;
										}
									}
									if ($cek){echo '
									<option value="'.$i.'">'.$i.'</option>
									';}
									$i++;
								}
								?>
                                <option value="99" style="display:none;">99</option>
            					</select>
        </div>
        </div>
        
        <div class="formItem" style="display:none;" id="hargaKursinya">
        <span class="labelForm">Total Harga</span>
        <input type="text" id="totalHargaKursi" value=''  class="inputForm" readonly="readonly"/>
        <div id="totalHargaKursi2">
        </div>
        </div>
      
 <style>
	 .formItem{ display:block; margin-bottom:12px;}
	 .selectForm{color:#777; margin-left:180px;  font-size:12px; padding:8px 5px 8px 5px; z-index:10;}
	 .inputForm{ padding:8px; margin-left:180px; }
	 .buttonForm{ padding:8px 20px 8px 20px; margin-top:40px; }
	 .margin { margin-left:180px; }
	 .labelForm{font-size:15px;  position:absolute; width:200px; background:none;}
	 #formPemesanan { background-color:#F7F7F7; padding:20px 15px 20px 15px; border:1px solid #CCC; }
	 </style>  