<h1> Profile</h1>
<div class="mws-panel grid_4">
                	<div class="mws-panel-header">
                    	<span class="mws-i-24 i-admin-user">My Profile</span>
                    </div>
                    <div class="mws-panel-body">
                    	<form class="mws-form" action="#">
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row">
                                	<label><img src="<?=$css?>/../example/profile.jpg" alt="User Photo" /></label>
                                	<div class="mws-form-item large">
                                    	<div class="mws-form-row">
                                	<label>
                                    Nama Perusahaan<br/>
                                    Username<br/>
                                    Paket<br/>
                                    
                                    </label>
                                	<div class="mws-form-item large">
                                    	<label>
										: &nbsp;&nbsp; <?php echo $this->session->userdata('nama_user')?><br/>
										: &nbsp;&nbsp; <?php echo $this->session->userdata('username')?><br/>
										: &nbsp;&nbsp; <?php 
										$authority = $this->session->userdata('authority');
										if($authority==1 || $authority==0)
										{echo'Professional';}
										else if($authority==2){echo 'Medium';}
										else if($authority==3){echo 'Standard';}
										else if($authority==4){echo 'Super Admin';}
										else{echo $authority.': Not Detected';}
										?><br/>
                                        
                                        </label>
                                    </div>
                                </div>
                                
                                    </div>
                                </div>
                                
                            	
                            	
                            	
                            </div>
                        </form>
                    </div>    	
                </div>
                