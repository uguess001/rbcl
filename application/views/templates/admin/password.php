
<link href="<?php echo RESOURCE_PATH; ?>css/login_page.css" media="all" rel="stylesheet" type="text/css" />
	
        <script src="<?php echo RESOURCE_PATH; ?>js/login_page.js" type="text/javascript"></script>		
<div class="container">
    	<div class="row">
			<div class="col-md-6 ">
				<div class="panel panel-login fade in">
					<div class="panel-heading">
				  
						<div class="row">
						<h2>Retrieve your password here</h2>
							</div>
							
						<hr>
						<?php
            /*
             * Show Flash Data
             */ 
            $_flash_msg = $this->session->flashdata('_flash_login');
			
			
            if (!empty($_flash_msg)) {
                ?>
                <div class="alert1 alert1-<?php echo $_flash_msg['_css_cls']; ?>">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $_flash_msg['_message'];
					?>
                </div>
                <?php
            }
        ?>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form class="form-horizontal form-bordered" action="" method="post" id="grievance_reminder_frm">
								
									<div class="form-group">
									 <label class="control-label"  for="textfield"><span style="color: #ff0000;"> *</span>Email Address</label>
								<input type="email" name='email' placeholder="Enter email" class='form-control' data-rule-required="true" required="required"/>
									</div>
								
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="reset" id="reset" tabindex="4" class="form-control btn btn-login" value="Reset">
												 <input type="hidden" name="process" value="1"/>
											</div>
										</div>
									</div>
							
								</form>
									</div>
						</div>
					</div>
				</div>
			</div>
		<div class="col-md-6 ">
				<div class="panel panel-login fade in">
					<div class="panel-heading">
						<div class="row">
						<h2>Register Online </h2>
							
							</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								Are you a new member?
								<br>
								<br>
								<a href="<?php echo base_url().'applicant/register';?>"><button class="inner-page-butt-blue"><i class="icon-user"></i>&nbsp;Register Online</button></a>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</div>
	</div>

