	<div class="g_12">
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"> Update Data User </h4>
    <div class="simple_buttons" style="float:right; margin-top:5px; margin-right:-10px;">
    <div class="bwIcon i_16_help" onclick="hiddenForm2()">keluar</div>
    </div>
	</div>
	
	<form action="edit_user" method="post" >
	<div class="widget_contents noPadding">
		
	<div class="line_grid">
	<div class="g_3"><span class="label"> Nama Admin </span></div>
	<div class="g_9">
		<input class="simple_field" type="text" value="<?php echo $query->nama_admin;?>" name="nama_admin" />
	</div>
	</div>
	
	<div class="line_grid">
	<div class="g_3"><span class="label"> Username </span></div>
	<div class="g_9">
		<input class="simple_field" type="text" value="<?php echo $query->username;?>" name="username"/>
	</div>
	</div>
	
	<div class="line_grid">
	<div class="g_3"><span class="label"> Password </span></div>
	<div class="g_9">
		<input class="simple_field" type="password" value="<?php echo $query->password;?>" name="password" />
	</div>
	</div>
	
	<div class="line_grid">
	<div class="g_3"><span class="label"> Status Admin </span></div>
	<div class="g_9">
		<select style="color:#888; font-size:13px; padding:5px 5px 5px 5px;" name="status_admin">
			<option value="admin" <?php if($query->status_admin=='admin'){echo'selected';}?>>admin </option>
            <option value="super admin"  <?php if($query->status_admin=='super admin'){echo'selected';}?>>super admin</option>
         </select>
                                
		<input class="simple_field" type="hidden" value="<?php echo $query->id_admin;?>" name="id_admin" />
	</div>
	</div>
	
    <div class="line_grid">
	<div class="g_3"><span class="label"></span></div>
	<div class="g_9">
		<input type="submit" value="update" class="submitIt simple_buttons" />
	</div>
	</div>
				
	</div>
	</form>
	</div>