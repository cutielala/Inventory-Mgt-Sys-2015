<?php echo Modules::run('template/dash_head'); ?>
	
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/datatables/media/assets/css/datatables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
 </head>
</body>

<!-- PAGE -->

<?php echo Modules::run('template/menu'); ?>


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
											<a href="<?php echo base_url();?>">Main</a>
										</li>
										<li>
											<a href="<?php echo base_url();?>index.php/Company">Company</a>
										</li>
										
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Company</h3>
									</div>
									<div class="description">All Company</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
                                                
                                                
                                                <!-- customer add-->
						<div class="row">
						
								<div class="col-md-4 col-md-offset-4">
								    <div class="text-center">
													<div class="clearfix">
													    <a class="btn btn-block btn-danger" data-toggle="modal" data-target="#myModal" href="<?php echo base_url();?>/businesses/add_company"><i class="fa fa-plus-circle"></i>Add Customer</a>
							
													</div>
									</div>
                                    <div class="divide-20"></div>									
								</div>
						</div>		
						<div class="separator"></div>
                        <div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border red">
									<div class="box-title">
										<h4><i class="fa fa-users"></i>Businesses  </h4>
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
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									<div class="box-body">
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>Company</th>
                                                    <th>Country</th>
													<th>Phone</th>
													<th>Terms</th>													
                                                    <th> Change </th>
												</tr>
											</thead>
											<tbody>
                                                                                            
                                        <?php 
                                          $base_url = base_url();
                                                foreach ($company->result() as $company) {


 
												echo '<tr class="gradeX">';
													echo'<td>'.$company->Company_name.'</td>';
                                                    echo'<td>'.$company->Country.'</td>';
                                                    echo'<td>'.$company->Phone_number.'</td>';
                                                          if( $company->on_hold == 0){
                                                                                                        echo'<td>OK</td>';
                                                                                                        }
                                                                                                        else {
                                                                                                        echo'<td><strong class="red">ON HOLD</td>';
                                                             }
                                                                                                        
                                                                                                        
													echo'<td><div class="btn-group dropdown" style="margin-bottom:5px">	
													        <button class="btn btn-primary">Settings</button>
											                <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
											                <span class="caret"></span>
											                </button>
									
											<ul class="dropdown-menu">
											<li>
											<a href="'.$base_url.'index.php/businesses/view/'.$company->Company_id.'">View/Edit </a>
											</li>
																						
											<li class="divider"></li>
											<li>
											<a href="'.$base_url.'index.php/businesses/delete/'.$company->Company_id.'"  class="confirmation" >Delete</a>
											
											</li>
											</ul>
											</div></td>';
													
												echo '</tr>';
											
                                                                                            }?>
												
											</tbody>
											
										</table>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>	
						
						<!-- /DATA TABLES -->
						
						
					
						<div class="separator"></div>
						
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
			</div>
	
	<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">Add New Customer</h4>
					</div>
					<div class="modal-body">
					<?php 
                                        
                                        echo Modules::run('businesses/add_company_form');
                                        
                                        
                                        
                                        ?>
					</div>
					<!---
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary">Save changes</button>
					</div>
					--->
				  </div>
				</div>
			</div>
			<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->    
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</div>

    



	
<!--/PAGE -->
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?php echo base_url();?>assets/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url();?>assets/bootstrap-dist/js/bootstrap.min.js"></script>
	
		
	<!-- DATE RANGE PICKER -->

	<!-- SLIMSCROLL -->
	<!-- BLOCK UI -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- DATA TABLES -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	
	<script src="<?php echo base_url();?>assets/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			  App.setPage("customers");  //Set current page
			  App.init(); //Initialise plugins and elements
		});
                
        $(document).ready(function(){
	

	$('#datatable1').dataTable();
});
	</script>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure to delete it?');
    });
</script>
</script>

	<!-- /JAVASCRIPTS -->
<?php echo Modules::run('template/footer'); ?>					