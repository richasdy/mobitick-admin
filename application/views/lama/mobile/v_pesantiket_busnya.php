 <div class="formItem">
        <span class="labelForm">Bus / Kendaraan</span>
       <select class="selectForm" onChange="ubah_bus()" id="idBusnya" name="id_jadwalbus">

<?php
	if(empty($query)){
		echo '<option>No Schedule</option>';
	}
	else{
		echo '<option value="0">Pilih Bus</option>';
		foreach ($query as $row){
			echo ' <option value="'.$row->id_jadwalbus.'">Bus: '.$row->nama_tipe.' | Alamat: '.$row->lokasi_keberangkatan.'</option>';
		}
	}
	
?>
</select>

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