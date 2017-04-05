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

        <?php foreach ($company->result() as $company)
        {
           
        }?>
        <!-- PAGE -->
	<section id="page">
				
		<div id="main-content">
		    
			<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
		<div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  <h4 class="modal-title">Box Settings</h4>
				</div>
				<div class="modal-body">
                                    
                                    
                                    <!-- DATA TABLES -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border red">
									<div class="box-title">
										<h4><i class="fa fa-paste"></i>Item List</h4>
										<div class="tools hidden-xs">
											<a href="#box-config" data-toggle="modal" class="config">
												<i class="fa fa-cog"></i>
											</a>
											<a href="javascript:;" class="reload">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="javascript:;" class="collapse">
												<i class="fa fa-chevron-up"></i>
											</a>
											
										</div>
									</div>
									<div class="box-body">
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover red">
											<thead>
												<tr>
													
													<th>item Code</th>
													<th>Description</th>
                                                    <th> Price </th>
                                                    <th> add </th>
												</tr>
											</thead>
									        <tbody>
                                                                                            
                                                <?php 
                                                    $base_url = base_url();
                                                        foreach ($query->result() as $table) {
                                                            //if($table->qty > 0){
                                     


 
												 echo '<tr class="gradeX">';
                                                    echo '<form id="additem"  action="'.base_url().'businesses/item_added" method="post">';
                                                                                               
                                                        echo'<input type="hidden" class="from control" name="id" value="'.$this->uri->segment(3).'"/>';
													        echo'<td><strong><input type="hidden" class="from control"name="CCL_Item" value="'.$table->CCL_Item.'"/>'.$table->CCL_Item.'</strong></td>';
                                                                echo'<td><strong><input type="hidden" class="from control"name="Description" value="'.$table->Description.'"/>'.$table->Description.'</strong></td>';
                                                                    echo'<td><strong><div class="form-group"><div class="col-md-2"><input type="text" class="from control"name="itemPrice" value="'.$table->sell_price.'"/>'.$table->sell_price.'</div></div></strong></td>';
                                                                                                       
													echo'<td><input type="submit"  class="btn btn-primary" value="ADD"></button></td>';
													 echo '</form>';echo '</tr>';
												
                                                                                                 
                                                                                                // }
                                                }?>
												
									        </tbody>
											
										</table>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /DATA TABLES -->
				
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
				</div>
			  </div>
			</div>
		  </div>
		<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
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
										
										<li>Company Profile</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Company Profile : <?php  echo $company->Company_name; ?></h3>
									</div>
									<div class="description"></div>
                                                                        <div id="results"></div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<div class="row">
					        <div class="col-sm-8 ">
                                <a href="<?php echo base_url();?>businesses">
							    <button class="btn btn-danger btn-lg" >
						        <i class="fa fa-reply"></i> Back</button>
                       	         </a>
							
                            </div>
			            </div>
			            </br>
						
						
						
						<!-- USER PROFILE --><?php if ($this->session->flashdata('message')) 
                                                    { echo $this->session->flashdata('message'); }?>
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border">
									<div class="box-title">
										<h4><i class="fa fa-user"></i><span class="hidden-inline-mobile"><?php  echo $company->Company_name; ?></span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs user-profile">
											<ul class="nav nav-tabs">
											   <li><a href="#pro_edit" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile"> Edit Account</span></a></li>
											   <li class="active"><a href="#pro_overview" data-toggle="tab"><i class="fa fa-dot-circle-o"></i> <span class="hidden-inline-mobile">Overview</span></a></li>
											</ul>
											<div class="tab-content">
											   <!-- OVERVIEW -->

											   
											   <!-- EDIT ACCOUNT -->
											   <div class="tab-pane fade" id="pro_edit">
                                                    <form id="Accountform" name="myForm" class="form-horizontal" action="<?php echo base_url();?>businesses/update" method="post">
                                                                                                   <input type="hidden" name="id" class="form-control" value="<?php  echo $company->Company_id; ?>">
                                                                                                        <div class="row">
														 <div class="col-md-6">
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
																		   <div class="col-md-8"><input type="text" name="Company_name" class="form-control" value="<?php  echo $company->Company_name; ?>"></div>
																		</div>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Address 1</label> 
																		   <div class="col-md-8"><input  class="form-control " name="address1" type="text" value="<?php  echo $company->address1; ?>" size="10"></div>
																		</div>
                                                                                                                                                <div class="form-group">
																		   <label class="col-md-4 control-label">Address 2</label> 
																		   <div class="col-md-8"><input  class="form-control "  name="address2" type="text" value="<?php  echo $company->address2; ?>" size="10"></div>
																		</div>
                                                                                                                                                <div class="form-group">
																		   <label class="col-md-4 control-label"> Town / City</label> 
																		   <div class="col-md-8"><input  class="form-control "  name="County" type="text" value="<?php  echo $company->County; ?>" size="10"></div>
																		</div>
                                                                                                                                                <div class="form-group">
																		   <label class="col-md-4 control-label">Postcode</label> 
																		   <div class="col-md-8"><input  class="form-control " type="text" name="postcode" value="<?php  echo $company->postcode; ?>" size="10"></div>
																		</div>
																		
																		<h4>Contact Information</h4>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Phone</label> 
																		   <div class="col-md-8"><input type="text" name="Phone_number" placeholder="0123 456 789" class="form-control" value="<?php  echo $company->Phone_number; ?>"></div>
																		</div>
																		
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Notes</label> 
																		   <div class="col-md-8"><textarea name="notes" class="form-control"><?php  echo $company->notes; ?></textarea></div>
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
																		   <label class="col-md-4 control-label">Accounts Email</label> 
																		   <div class="col-md-8">
																				<div class="input-group">
																				  <span class="input-group-addon">Accounts</span>
																				  <input type="text" name="accounts_email" class="form-control" placeholder="email" value="<?php  echo $company->accounts_email; ?>">
																				</div>																			
																		   </div>
																		</div>
																	 </div>
																  </div>
																</div>
															</div>
														 </div>
														 <div class="col-md-6 form-vertical">
															<div class="box border inverse">
																<div class="box-title">
																	<h4><i class="fa fa-bars"></i>Admin Settings</h4>
																</div>
																<div class="box-body big">
																	<h4>Account  Settings</h4>
																		
                                                                                                                                        
                                                                                                                                        <div class="form-group">
																		   <label class="col-md-4 control-label">VAT No:</label> 
																		   <div class="col-md-8">
																				<div class="input-group">
																				  <span class="input-group-addon">VAT No:</span>
																				  <input type="text" name="VAT_Number" class="form-control" value="<?php echo $company->VAT_Number; ?>"placeholder="VAT">
																				</div>																			
																		   </div>
																		</div>
                                                                                                                                        
                                                                                                                                        <div class="form-group">
																		   <label class="col-md-4 control-label">PLACE ON HOLD</label> 
																		   <div class="col-md-8">
																				<div class="input-group">
																				  <span class="input-group-addon">On Hold:</span>
                                                                                                                                                                  <select name="on_hold" class="form-control">
                                                                                                                                                                      <option value="0">ALL OK</option>
                                                                                                                                                                      <option value="1">ON HOLD</option>
                                                                                                                                                                  </select>
																				</div>																			
																		   </div>
																		</div>
                                                                                                                                        
                                                                                                                                           <div class="form-group">
																		   <label class="col-md-4 control-label">VAT Exempt</label> 
																		   <div class="col-md-8">
																				<div class="input-group">
																				  <span class="input-group-addon">EXEMPT</span>
                                                                                                                                                                  <select name="vat_exempt" class="form-control">
                                                                                                                                                                      <option value="<?php echo $company->vat_exempt; ?>"><?php echo $company->vat_exempt; ?></option>
                                                                                                                                                                      <option value="NO">NO</option>
                                                                                                                                                                      <option value="YES">YES</option>
                                                                                                                                                                  </select>
																				</div>																			
																		   </div>
																		</div>
                                                                                                                                        
																</div>
															</div>
														 </div>
													 </div>
												  
                                                                                               
                                                                                               
												  <div class="form-actions clearfix"> <input type="submit" name="submit" value="Update Account" class="btn btn-primary pull-right"> </div>
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
			App.setPage("user_profile");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<script>
		
                
                $(document).ready(function(){
	$('#datatable1').dataTable();
        $('#datatable2').dataTable();
});
	</script>
        <!-- this is for account update form -->
      <script type="text/javascript">
    var frm = $('#Accountform');
    frm.submit(function (ev) {
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                alert('Changes Have been Saved');
            }
        });

        ev.preventDefault();
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
