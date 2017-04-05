 <?php echo Modules::run('template/login_head');?>


     </head>
<body class="login">	
	<!-- PAGE -->
	<section id="page">
			<!-- HEADER -->
			<header>
				<!-- NAV-BAR -->
				
				<!--/NAV-BAR -->
			</header>
			<!--/HEADER -->
			<!-- LOGIN -->
                        
			<section id="login" class="visible">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="login-box-plain">
								<h2 class="bigintro">Sign In</h2>
								<div class="divide-40"></div>
								 <?php echo form_open("auth/login");?>
								  <div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<i class="fa fa-envelope"></i>
									
                                                                        <?php echo form_input($identity,'','type="email" class="form-control" id="exampleInputEmail1"');?> 
								  </div>
								  <div class="form-group"> 
									<label for="exampleInputPassword1">Password</label>
									<i class="fa fa-lock"></i>
                                                                        	<?php echo form_input($password,'','class="form-control" id="exampleInputPassword1" ');?>
									
								  </div>
								  <div class="form-actions">
									
									<button type="submit" class="btn btn-danger">Submit</button>
								  </div>
								  Login from http://79.77.3.70/
								</form>
								<!-- SOCIAL LOGIN -->
								<div class="divide-20"></div>
								<div class="center">
									Remember Me<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
								</div>
								<div class="divide-20"></div>
								<div class="social-login center">
									
								</div>
								<!-- /SOCIAL LOGIN -->
								
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--/LOGIN -->
			<!-- REGISTER -->
			
			<!--/REGISTER -->
			<!-- FORGOT PASSWORD -->
			
			<!-- FORGOT PASSWORD -->
	</section>

     </div>

            
            
            
            
    <!-- End .container -->

            
           	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?php echo base_url();?>/assets/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo base_url();?>/assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url();?>/assets/bootstrap-dist/js/bootstrap.min.js"></script>
	
	
	<!-- UNIFORM -->
	<script type="text/javascript" src="<?php echo base_url();?>/assets/js/uniform/jquery.uniform.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo base_url();?>/assets/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("login");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<script type="text/javascript">
		function swapScreen(id) {
			jQuery('.visible').removeClass('visible animated fadeInUp');
			jQuery('#'+id).addClass('visible animated fadeInUp');
		}
	</script>
	<!-- /JAVASCRIPTS -->
        
        