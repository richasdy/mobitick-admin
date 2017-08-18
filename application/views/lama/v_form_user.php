<div class="g_6 contents_header">
    <h3 class="i_16_forms tab_label">
        <a style="color:#999 !important; text-decoration:underline;" href="../c_user/kelola_user">Kelola User </a>> Input Data User
    </h3>
</div>
<form action="proses_tambah_user" method="post">	
	<div class="g_12">
					<div class="widget_header">
						<h4 class="widget_header_title wwIcon i_16_forms"> Input Data User </h4>
					</div>
					<div class="widget_contents noPadding">
						<div class="line_grid">
							<div class="g_3"><span class="label"> Nama Admin </span></div>
							<div class="g_9">
								<input class="simple_field" type="text" name="nama_admin" onblur="cekNamaPemesan()" required id="nama_pemesan"  />
							</div>
						</div>
						<div class="line_grid">
							<div class="g_3"><span class="label"> Username </span></div>
							<div class="g_9">
								<input class="simple_field" type="text"  name="username" required />
							</div>
						</div>
						<div class="line_grid">
							<div class="g_3"><span class="label"> Password </span></div>
							<div class="g_9">
								<input class="simple_field" type="password"  name="password" required />
							</div>
						</div>
						<div class="line_grid">
							<div class="g_3"><span class="label"> Status Admin</span></div>
							<div class="g_9">
								<select name="status_admin" style="color:#888; font-size:13px; padding:5px 5px 5px 5px;">
            <option value="admin">admin</option>
            <option value="super admin">super admin</option>
            </select>
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