
<form action="../c_pemesanan/proses_update_pemesanan" method="post">
  <div class="g_12">
    <div class="widget_header">
      <h4 class="widget_header_title wwIcon i_16_forms">Update Data Pemesanan</h4>
      <div class="simple_buttons" style="float:right; margin-top:5px; margin-right:-10px;">
        <div class="bwIcon i_16_help" onclick="hiddenForm()"> keluar </div>
      </div>
    </div>
    <div class="widget_contents noPadding">
      <div class="line_grid">
        <div class="g_3"><span class="label"> Nama Pemesan </span></div>
        <div class="g_9">
         
<input class="simple_field"  type="hidden" value="<?=$this->session->userdata('id_admin')?>" name="log_admin" />
		<input class="simple_field" type="hidden" value="<?=$query->id_pemesan?>" name="id_pemesan" />
		<input class="simple_field" type="text" name="nama_pemesan" value="<?=$query->nama_pemesan?>" />
        </div>
      </div>
      <div class="line_grid">
        <div class="g_3"><span class="label"> No HP </span></div>
        <div class="g_9">
          <input class="simple_field" type="text" name="no_tlp" value="<?=$query->no_tlp?>" />
        </div>
      </div>
      <div class="line_grid">
        <div class="g_3"><span class="label"> Jadwal Keberangkatan </span></div>
        <div class="g_9">
          <input class="simple_field pick_date" id="tanggalnya" type="text" value="<?=$query->tgl_keberangkatan?>" name="tgl_keberangkatan" onchange="ubah_tanggal()" />
        </div>
      </div>
      <div class="line_grid">
        <div class="g_3"><span class="label"> Kendaraan </span></div>
        <div class="g_9"> <span style="color:#888; font-size:12px; padding:5px 5px 5px 5px;" id="namaBus">
          <?=$query->nama_bus?>
          </span>
          <div id="bus"></div>
        </div>
      </div>
      <div class="line_grid">
        <div class="g_3"><span class="label"> No Kursi </span></div>
        <div class="g_9"> <span style="color:#888; font-size:12px; padding:5px 5px 5px 5px;" id="noKursi">
          <?=$query->no_kursi?>
          </span>
          <div id="kursi"></div>
        </div>
      </div>
      <div class="line_grid">
        <div class="g_3"><span class="label"> Nama Penumpang </span></div>
        <div class="g_9">
          <input class="simple_field" type="text" value="<?=$query->nama_penumpang?>"   name="nama_penumpang"/>
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
        <div class="g_3"><span class="label"> Harga (Rp.)</span></div>
        <div class="g_9">
          <input class="simple_field" type="text"  name="harga" id="harga" value="<?=$query->harga?>" readonly="readonly"/>
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