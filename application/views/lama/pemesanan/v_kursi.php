	<div class="line_grid">
	<div class="g_3"><span class="label"> No Kursi </span></div>
	<div class="g_9">
								
	<?php

		$i=1;
		while ($i <= $query2->jumlah_kursi)
		{
			$cek=true;
			foreach($query as $row)
		{
			if($i==$row->no_kursi)
		{
			echo '
			<input class="simple_form" checked disabled="disabled" type="checkbox" style="opacity: 0;"></input> 
    		<span class="label ilC" style="margin-left:-5px;">'.$row->no_kursi.'</span>
			';
			$cek=false;
		}
		}
			if ($cek)
			{
			echo '
			<input class="simple_form" type="checkbox" style="opacity: 0;" name="no_kursi" value="'.$i.'"></input> 
			<span class="label ilC" style="margin-left:-5px;">'.$i.'</span>';
			}
			$i++;
		}
	?>
						
	</div>
	</div>
	
	<div class="line_grid">
	<div class="g_3"><span class="label"> Nama Penumpang </span></div>
	<div class="g_9">
		<input class="simple_field" type="text"   name="nama_penumpang" required id="namaPenumpang"/></div>
	</div>
	
	<div class="line_grid">
	<div class="g_3"><span class="label"> Status </span></div>
	<div class="g_9">
		<select style="color:#888; font-size:12px; padding:5px 5px 5px 5px;" name="status" required>
			<option value="booking">booking </option>
            <option value="reserved">reserved</option>
        </select>
	</div>
	</div>
						
	
	<script>
	$(".simple_form").uniform(); 
	</script>