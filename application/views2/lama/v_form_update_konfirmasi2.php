	<form action="../c_konfirmasi/proses_update_konfirmasi" method="post">
	<div class="g_12">
    <div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms">Update Data Konfirmasi</h4>
		
	<div class="simple_buttons" style="float:right; margin-top:5px; margin-right:-10px;">
	<div class="bwIcon i_16_help" onclick="hiddenForm()">keluar </div>
    </div>
    </div>
	
    <div class="widget_contents noPadding">
    <div class="line_grid">
    <div class="g_3"><span class="label"> Kode Verifikasi </span></div>
    <div class="g_9">
    <input class="simple_field" type="hidden" value="<?=$this->session->userdata('id_admin')?>" name="log_admin" />
           <input class="simple_field" type="hidden" value="<?=$id_konfirmasi?>" name="id_konfirmasi" />
            <input class="simple_field" type="hidden" value="<?=$query->kode_pemesanan?>" name="kode_pemesanan" />
        <span class="label">  <?=$query->kode_pemesanan?></span>
        </div>
      </div>
      <div class="line_grid">
        <div class="g_3"><span class="label"> Nama Pemesan </span></div>
        <div class="g_9">
          <input class="simple_field" type="hidden" value="<?=$query->id_pemesan?>" name="id_pemesan" />
        <span class="label">  <?=$query->nama_pemesan?></span>
        </div>
      </div>
      <div class="line_grid">
        <div class="g_3"><span class="label"> Nama Penumpang </span></div>
        <div class="g_9">
          <?php 
		  foreach ( $query2 as $row){
		  echo  '<span class="label">'.$row->nama_penumpang.', No Kursi: '.$row->no_kursi.'</span><br/>';
		  }
		  ?>
        </div>
      </div>
      <div class="line_grid">
        <div class="g_3"><span class="label"> No HP </span></div>
        <div class="g_9">
         <span class="label"><?=$query->no_tlp?> </span>
        </div>
      </div>
      <div class="line_grid">
        <div class="g_3"><span class="label"> Jadwal Keberangkatan </span></div>
        <div class="g_9">
          <span class="label"><?=$query->tgl_keberangkatan?></span>
        </div>
      </div>
      <div class="line_grid">
        <div class="g_3"><span class="label"> Kendaraan </span></div>
        <div class="g_9"> <span class="label" id="namaBus">
          <?=$query->nama_bus?>
          </span>
          <div id="bus"></div>
        </div>
      </div>
      
      
      <div class="line_grid">
        <div class="g_3"><span class="label"> Status </span></div>
        <div class="g_9">
          <select style="color:#888; font-size:13px; padding:5px 5px 5px 5px;" name="status">
            <option value="booking" <?php if($query->status=='booking'){echo'selected';}?>>booking </option>
            <option value="reserved"  <?php if($query->status=='reserved'){echo'selected';}?>>reserved</option>
          </select>
        </div>
      </div>
      <div class="line_grid">
        <div class="g_3"><span class="label"> Harga</span></div>
        <div class="g_9">
           <?php 
		   $sum = 0;
			foreach($query2 as $row)
			{
			   $sum+= $row->harga;
			}
			echo  '<span class="label">Rp '.$sum.'</span><br/>';


		  ?>
        </div>
      </div>
      <div class="line_grid">
        <div class="g_3"><span class="label"></span></div>
        <div class="g_9">
          <input type="submit" value="update" class="submitIt simple_buttons" />
        </div>
      </div>
    </div>
  </div>
</form>
<script>
$( ".pick_date" ).datepicker({ dateFormat: 'dd-mm-yy' }).val();
</script>