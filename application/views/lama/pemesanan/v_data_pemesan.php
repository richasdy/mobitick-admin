	<div class="g_12">
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables">Data Penumpang </h4>
    <div class="simple_buttons" style="float:right; margin-top:5px; margin-right:-10px;">
    <div class="bwIcon i_16_help" onclick="hiddenFormDataPemesanan()">keluar</div>
    </div>
	</div>
	
	<div class="widget_contents noPadding">
		<table class="tables">
			<thead>
				<tr>
					<th> Nama Pemesan </th>
                    <th> Nama Penumpang </th>
					<th> No Tlp </th>
					<th> No Kursi</th>
					<th> Status </th>
				</tr>
			</thead>

	<tbody>
			<?php
				foreach ($query as $row)
				{
					echo '
							<tr>
									<td>'.$row->nama_pemesan.'</td>
									<td>'.$row->nama_penumpang.'</td>
									<td>'.$row->no_tlp.'</td>
									<td>'.$row->no_kursi.'</td>
									<td>'.$row->status.'</td>
							</tr>
								';
				}
							
			?>
	</tbody>
	</table>
	</div>
	</div>