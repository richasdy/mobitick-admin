	<div class="g_6 contents_header" >
		<h3 class="i_16_forms tab_label">
		  <a href="../c_kendaraan/kelola_kendaraan" style="color:#999 !important; text-decoration:underline;"> Kelola Kendaraan </a> > Input Data Kendaraan
		</h3>
	</div>
	<form action="proses_tambah_kendaraan" method="post">	
		<div class="g_12">
						<div class="widget_header">
							<h4 class="widget_header_title wwIcon i_16_forms">Input Data kendaraan</h4>
						</div>
						<div class="widget_contents noPadding">
							<div class="line_grid">
								<div class="g_3"><span class="label">Nama Bus</span></div>
								<div class="g_9">
									<input class="simple_field" type="text" name="nama_bus" required />
								</div>
							</div>
							<div class="line_grid">
								<div class="g_3"><span class="label">Tipe Bus</span></div>
								<div class="g_9">
									 <select style="color:#888; font-size:13px; padding:5px 5px 5px 5px;" name="id_tipebusnya" required>
									<?php
									foreach ($query as $row){
										echo '
										<option value="'.$row->id_tipebus.'">'.$row->nama_tipe.'</option>
								   
										';
										}
									?>
									</select>
								</div>
							</div>
							<div class="line_grid">
								<div class="g_3"><span class="label">Nama Supir</span></div>
								<div class="g_9">
									<input class="simple_field" type="text"  name="nama_supir" required onblur="cekHuruf()" id="supir" />
								</div>
							</div>
							<div class="line_grid">
								<div class="g_3"><span class="label">No Polisi</span></div>
								<div class="g_9">
									<input class="simple_field" type="text"   name="no_polisi" required/>
								</div>
							</div>
								
							<div class="line_grid">
									<div class="g_3"><span class="label"></span></div>
									<div class="g_9">
										<input type="submit" value="tambah" class="submitIt simple_buttons" />
									</div>
								</div>
								</div>
								</div>
	</form>