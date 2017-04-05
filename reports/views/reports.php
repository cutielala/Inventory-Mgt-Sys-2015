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
                                                                                        <a href="<?php echo base_url().'index.php';?>">Main</a>
										</li>
										<li><?php echo $this->uri->segment(1);?></li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Report</h3>
									
									</div>
									<div class="description">Overview, Statistics and more</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- DASHBOARD CONTENT -->
						<div class="row">
							<!-- COLUMN 1 -->
							<div class="col-md-10 col-md-offset-1">
								<div class="row">
				
					
								        <div class="col-lg-6">
												<a class="btn btn-info btn-icon input-block-level" href="<?php echo base_url();?>index.php/reports/invoice_rpt">
													<i class="fa fa-money fa-3x"></i>
													<div>Invoices Report</div>
													
												</a>
										</div>
									    <div class="col-lg-6">
												<a class="btn btn-info btn-icon input-block-level" href="<?php echo base_url();?>index.php/reports/comp_salesbetweendates">
													<i class="fa fa-vcard-o fa-3x"></i>
													<div>Customer Sales Details</div>
													<span class="label label-right label-warning">SO with Invoiced, return and cancel status</span>
												</a>
										</div>
										<div class="col-lg-6">
												<a class="btn btn-info btn-icon input-block-level" href="<?php echo base_url();?>index.php/reports/bk_order_rpt">
													<i class="fa fa-exclamation-circle fa-3x"></i>
													<div>Back Order Report </div>
													
												</a>
										</div>
							            <div class="col-lg-6">
												<a class="btn btn-info btn-icon input-block-level" href="<?php echo base_url();?>index.php/reports/sale_item_summary_dates">
													<i class="fa fa-cutlery fa-3x"></i>
													<div>Products Sold Summary</div>
													
												</a>
										</div>
					                    <div class="col-lg-6">
												<a class="btn btn-info btn-icon input-block-level" href="<?php echo base_url();?>index.php/reports/inventory_summary">
													<i class="fa fa-industry fa-3x"></i>
													<div>Inventory Summary</div>
													
												</a>
										</div>
						                <div class="col-lg-6">
												<a class="btn btn-info btn-icon input-block-level" href="<?php echo base_url();?>index.php/reports/est_invt">
													<i class="fa fa-stack-overflow fa-3x"></i>
													<div>Estimated Inventory Duration</div>
													
												</a>
										</div>
								        <div class="col-lg-6">
												<a class="btn btn-info btn-icon input-block-level" href="<?php echo base_url();?>index.php/reports/stock_rpt">
													<i class="fa fa-sort-amount-asc fa-3x"></i>
													<div>Stock Report</div>
													
												</a>
										</div>
							            <div class="col-lg-6">
												<a class="btn btn-info btn-icon input-block-level" href="<?php echo base_url();?>index.php/reports/invoice_merg">
													<i class="fa fa-clipboard fa-3x"></i>
													<div>Merging Invoices(PDF)</div>
													
												</a>
										</div>
								    
							
								</div>
                                                            
                                                     
								
							</div>
							<!-- /COLUMN 1 -->
							
							<!-- /COLUMN 2 --><div class="divide-20"></div>
							<div class="col-md-10 col-md-offset-1">
								<div class="row">

								 <div class="hidden">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left red">
												<i class="fa fa-download fa-3x"></i>
										   </div>
										    <a href="<?php echo base_url();?>reports/pdf_dl_by_date"/>
											<div class="panel-right">
												<div class="title"><h4><strong>Download C.E distributors Invoices to the Dropbox </h4></strong></div>
												</div></a>
										
									 </div>
								  </div>
								  </div>
								  	<div class="hidden">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left red">
												<i class="fa fa-users fa-3x"></i>
										   </div>
										    <a href="<?php echo base_url();?>reports/sale_by_product"/><div class="panel-right">
                                                                                       <div class="number">
                                                                                               </div>
												<div class="title">(test /dont use)sales Between dates PDF</div>
												
                                                                                    </div></a>
										</div>
									 </div>
								  </div>
								  <!--
								  <div class="col-lg-6">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left red">
												<i class="fa fa-folder-o fa-3x"></i>
										   </div>
										    <a href="<?php echo base_url();?>reports/sale_by_date"/><div class="panel-right">
                                                                                       <div class="number">
                                                                                               </div>
												<div class="title">Sales Between dates</div>
												
                                                                                    </div></a>
										</div>
									 </div>
								  </div>
								  -->
								  <div class="hidden">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left red">
												<i class="fa fa-folder-o fa-3x"></i>
										   </div>
										    <a href="<?php echo base_url();?>reports/inventory_summary"/><div class="panel-right">
                                                                                       
												<div class="title"><h4><strong>Inventory Summary </strong></h4></div>
												
                                                                                    </div></a>
										</div>
									 </div>
								  </div>
								    <div class="hidden">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left red">
												<i class="fa fa-users fa-3x"></i>
										   </div>
										    <a href="<?php echo base_url();?>reports/sale_by_product"/><div class="panel-right">
                                                                                       <div class="number">
                                                                                               </div>
												<div class="title">sales Between dates PDF</div>
												
                                                                                    </div></a>
										</div>
									 </div>
								    </div>
								</div>
                                                            
                                  <div class="separator"></div>                             
								
							</div>
								
						</div>
					
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
	
		
	<!-- DATE RANGE PICKER -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- SPARKLINES -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/sparklines/jquery.sparkline.min.js"></script>
	<!-- EASY PIE CHART -->
	<script src="<?php echo base_url();?>assets/js/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/easypiechart/jquery.easypiechart.min.js"></script>
	<!-- FLOT CHARTS -->
	<script src="<?php echo base_url();?>assets/js/flot/jquery.flot.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/flot/jquery.flot.time.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/flot/jquery.flot.selection.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/flot/jquery.flot.resize.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/flot/jquery.flot.pie.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/flot/jquery.flot.stack.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/flot/jquery.flot.crosshair.min.js"></script>
	<!-- TODO -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-todo/js/paddystodolist.js"></script>
	<!-- TIMEAGO -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/timeago/jquery.timeago.min.js"></script>
	<!-- FULL CALENDAR -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/fullcalendar/fullcalendar.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- GRITTER -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/gritter/js/jquery.gritter.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo base_url();?>assets/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			 App.setPage("dynamic_table");  //Set current page
			App.setPage("reports");
			//App.setPage("index");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
<?php echo Modules::run('template/footer'); ?>