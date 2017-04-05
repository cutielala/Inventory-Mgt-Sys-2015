       <!-- DATA TABLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
<!-- DATE RANGE PICKER -->
       <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
         	<!-- TYPEAHEAD -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/typeahead/typeahead.css" />
	<!-- FILE UPLOAD -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-fileupload/bootstrap-fileupload.min.css" />
	<!-- SELECT2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/select2/select2.min.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/uniform/css/uniform.default.min.css" />
	<!-- JQUERY UPLOAD -->
	<!-- blueimp Gallery styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/js/blueimp/gallery/blueimp-gallery.min.css">
	<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-upload/css/jquery.fileupload.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-upload/css/jquery.fileupload-ui.css">

    
</head>
        </body>

<?php echo Modules::run('template/menu'); ?>

        <?php foreach ($vendor->result() as $company)
        {
           
        }?>
        <!-- PAGE -->
	<section id="page">
				
		<div id="main-content">
		
			<div class="container">
				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- STYLER -->
									
									<!-- /STYLER -->
									<!-- BREADCRUMBS -->
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="#">Home</a>
										</li>
										
										<li>Vendor Profile</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Vendor Profile : <?php  echo $company->vendor_name; ?></h3>
									</div>
									<div class="description"></div>
                                                                        <div id="results"></div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- USER PROFILE --><?php if ($this->session->flashdata('message')) 
                                                    { echo $this->session->flashdata('message'); }?>
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border">
									<div class="box-title">
										<h4><i class="fa fa-user"></i><span class="hidden-inline-mobile"><?php  echo $company->vendor_name; ?></span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs user-profile">
											<ul class="nav nav-tabs">
											   <li class="active"><a href="#pro_edit" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile"> Edit Account</span></a></li>
											 </ul>
											<div class="tab-content">
											 
											   
											   <!-- EDIT ACCOUNT -->
											   <div class="tab-pane fade in active" id="pro_edit">
                                                                                               <form id="Accountform" name="myForm" class="form-horizontal" action="<?php echo base_url();?>vendors/update" method="post">
                                                                                                   <input type="hidden" name="id" class="form-control" value="<?php  echo $company->vendor_id; ?>">
                                                                                                        <div class="row">
														 <div class="col-md-12">
															<div class="box border green">
																<div class="box-title">
																	<h4><i class="fa fa-bars"></i> Information</h4>
																</div>
																<div class="box-body big">
																	<div class="row">
																	 <div class="col-md-12">
																		<h4> Information</h4>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Company Name</label> 
																		   <div class="col-md-8"><input type="text" name="vendor_name" class="form-control" value="<?php  echo $company->vendor_name; ?>"></div>
																		</div>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Address 1</label> 
																				<div class="col-md-8"><textarea  class="form-control " name="address" size="10" value="<?php  echo $company->address; ?>"></textarea></div>
																		        </div>
                                                                                                                                               
																		
																		<h4>Contact Information</h4>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Phone</label> 
																		   <div class="col-md-8"><input type="text" name="phone" class="form-control" value="<?php  echo $company->Contact; ?>"></div>
																		</div>
																		
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Notes</label> 
																		   <div class="col-md-8"><textarea name="notes" class="form-control"value="<?php  echo $company->notes; ?>"></textarea></div>
																		</div>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Email</label> 
																		   <div class="col-md-8">
																				<div class="input-group">
																				  <span class="input-group-addon">Email</span>
																				  <input type="text" name="email" class="form-control" placeholder="email address" value="<?php  echo $company->email; ?>">
																				</div>																			
																		   </div>
																		</div>
                                                                                 <div class="form-group">
                        <label class="col-md-4 control-label">currency  :</label>
                        <div class="col-md-8">
                            <select type="text" name="currency" required="required" class="form-control">
                                      
                                <option value="<?php $company->currency ?>"><?php echo $company->currency ?></option>
                              <option value="GBP">GBP</option>
                              <option value="USD">USD</option>
                              <option value="EURO">EURO</option>


                            </select>	
                        </div>
                    </div>                                                               
									 								 </div>
																  </div>
																</div>
															</div>
														 </div>
														 
													 </div>
												  
                                                                                               
                                                                                               
												  <div class="form-actions clearfix"> <input type="submit" name="submit"  class="btn btn-primary pull-right"> </div>
											   </form></div>
											   <!-- /EDIT ACCOUNT -->
											   
											   <!-- HELP -->
											 
											   <!-- /HELP -->
											</div>
										</div>
										<!-- /USER PROFILE -->
									</div>
								</div>
							</div>
						</div>
						
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
			</div>
		</div>
	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?php echo base_url();?>assets/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url();?>assets/bootstrap-dist/js/bootstrap.min.js"></script>
	<!-- DATA TABLES -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
		
	<!-- DATE RANGE PICKER -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- EASY PIE CHART -->
	<script src="<?php echo base_url();?>assets/js/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/easypiechart/jquery.easypiechart.min.js"></script>
	<!-- SPARKLINES -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/sparklines/jquery.sparkline.min.js"></script>
	<!-- UNIFORM -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/uniform/jquery.uniform.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo base_url();?>assets/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("view");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<script>
		
                
                $(document).ready(function(){
	$('#datatable1').dataTable();
        $('#datatable2').dataTable();
});
	</script>





	<!-- /JAVASCRIPTS -->
        
         <script type="text/javascript"> 
             
    $( ".sorting_1" ).bind( "submit", function(ev) {

    var frm1 = $('#additem');
    frm1.submit(function (ev) {
       
        $.ajax({
            type: frm1.attr('method'),
            url: frm1.attr('action'),
            data: frm1.serialize(),
            success: function (data) {
                alert('Item  added');
            }
        });
});
        ev.preventDefault();
    });
</script>
</body>
</html>      
