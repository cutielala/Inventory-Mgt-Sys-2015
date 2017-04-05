<?php echo Modules::run('template/dash_head'); 


?>
       
</head>
<script language="JavaScript" type="text/javascript">
function showText(obj)
{

//previousweek= new Date(firstDay.getTime() - 7 * 24 * 60 * 60 * 1000);

date = new Date().toLocaleDateString().split("/")
date[0].length == 1 ? "0" + date[0] : date[0]//date
date[1].length == 1 ? "0" + date[1] : date[1]//month
date = date[1] + "/" + date[0] + "/" + date[2];


var showdate = function(n){
   var d = new Date();
   d.setDate(d.getDate()+n);
   //或者 d = d.getFullYear() + "-" +  (d.getMonth()+1) + "-" + d.getDate();
    d = d.toLocaleDateString().replace(/[\u4e00-\u9fa5]/g,'-').replace(/-$/,'')    
    
	d = d.split("/")
d[0].length == 1 ? "0" + d[0] : d[0]//date
d[1].length == 1 ? "0" + d[1] : d[1]//month
d = d[1] + "/" + d[0] + "/" + d[2];
	
	
	return d;
}


if(obj.value=='Today')
{
document.getElementById('datepickerFrom').value='';
document.getElementById('datepickerTo').value='';
//document.getElementById('mytext').style.display='block';
document.getElementById('datepickerFrom').value=date;
document.getElementById('datepickerTo').value=date;

obj.value='Today';
}
if(obj.value=='Last 7 Days')
{
document.getElementById('datepickerFrom').value='';
document.getElementById('datepickerTo').value='';
document.getElementById('datepickerFrom').value=showdate(-7);
document.getElementById('datepickerTo').value=date;
//document.getElementById('mytext').style.display='none';
//obj.value='Show';
}
else if 
(obj.value=='Last month')
{
document.getElementById('datepickerFrom').value='';
document.getElementById('datepickerTo').value='';
document.getElementById('datepickerFrom').value=showdate(-30);
document.getElementById('datepickerTo').value=date;
//obj.value='Show';
}
return;
}
 

</script>
<body>




	
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
                                               <a href="<?php echo base_url().'index.php';?>">Main</a>
										</li>
										<li><?php echo $this->uri->segment(1);?></li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Dashboard </h3>
										<!-- DATE RANGE PICKER -->
										
										<form action="<?php echo base_url();?>dashboard/filterByDate" method="post" enctype="multipart/form-data">
										
										<span class="date-range pull-right">
										    <div class="btn-group">											
													    <input type="button" class="js_update btn btn-default" onclick="showText(this)" value="Today"> 
												        <input type="button" class="js_update btn btn-default" onclick="showText(this)" value="Last 7 Days" > 
												        <input type="button"class="js_update btn btn-default" onclick="showText(this)" value="Last month" >
	                                                 
											</div>&nbsp;<input type="text" name="datepickerFrom" id="datepickerFrom"  placeholder="from" size="10" >
											          <input type="text" name="datepickerTo" id="datepickerTo" placeholder="to"   size="10" >
											<button type="submit" class="btn btn-primary">Search</button>
										</span>	
										    
											
										
										</form>
										<!-- /DATE RANGE PICKER -->
									</div>
									<div class="description">Overview, Statistics and more</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- DASHBOARD CONTENT -->
					
					
							   <!-- HERO GRAPH -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border blue">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i> <span class="hidden-inline-mobile">Sales</span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable ">
											<ul class="nav nav-tabs">
												 <li class="active"><a href="#box_tab1" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> <span class="hidden-inline-mobile">Sales Summary</span></a></li>
											     <li><a href="#box_tab2" data-toggle="tab"><i class="fa fa-search-plus"></i> <span class="hidden-inline-mobile">Search</span></a></li>
												
											 </ul>
											 <div class="tab-content">
												 <div class="tab-pane fade in active" id="box_tab1">
													<!-- TAB 1 -->
													 <!-- COLUMN 1 -->
							                            <div class="row">
							<div class="col-md-12">
							   
								<div class="row">
							
								    <div class="col-lg-4">
									    <div class="dashbox panel ">
										    <a class="btn btn-success input-block-level" href="<?php echo base_url();?>index.php/businesses">
												
										        <div class="panel-body">
										            <div class="panel-left blue">
												     <i class="fa fa-users fa-3x"></i>
										            </div>
                                                    <div class="panel-right grey">
										       	    <div class="number"><?php echo Modules::run('notifications/customers');?>
                                                    </div>
												     <div class="title">Customers</div>
										            </div>
										  
										        </div> 
                                            </a>
									   </div>
								    </div>  
								 
								    <div class="col-lg-4">
									   <div class="dashbox panel ">
										    <a class="btn btn-success input-block-level" href="<?php echo base_url();?>index.php/salesorders/order_pending">
												
										    <div class="panel-body">
										        <div class="panel-left red">
												<i class="fa fa-exclamation-circle fa-3x"></i>
										        </div>
                                                <div class="panel-right grey">
										       	<div class="number"><?php echo Modules::run('notifications/orders_pending');?>
                                                </div>
												<div class="title">Orders Pending</div>
										        </div>
										  
										   </div> 
                                            </a>
									    </div>
								    </div>
						
								    <div class="col-lg-4">
									    <div class="dashbox panel ">
										    <a class="btn btn-success input-block-level" href="<?php echo base_url();?>index.php/salesorders/order_invoiced">
												
										            <div class="panel-body">
										        <div class="panel-left blue">
												<i class="fa fa-money fa-3x"></i>
										        </div>
                                                <div class="panel-right grey">
										       	<div class="number"><?php echo Modules::run('notifications/invoiced');?>
                                                     </div>
												     <div class="title">Invoiced</div>
										        </div>
										  
										            </div> 
                                            </a>
									    </div>
								    </div>
								</div>                          
                                                             
                                <div class="row">
								   
								    <div class="col-lg-4">
									    <div class="dashbox panel ">
										    <a class="btn btn-success input-block-level" href="<?php echo base_url();?>index.php/salesorders/order_shipped">
												
										        <div class="panel-body">
										            <div class="panel-left blue">
												    <i class="fa fa-truck fa-3x"></i>
										        </div>
                                                <div class="panel-right grey">
										       	    <div class="number"><?php echo Modules::run('notifications/orders_shipped');?></div>
                                                     
												     <div class="title">Orders Shipped </div>
										        </div>
										  
										        </div> 
                                            </a>
									    </div>
								    </div> 
									 <div class="col-lg-4">
									    <div class="dashbox panel ">
										    <a class="btn btn-success input-block-level" href="<?php echo base_url();?>index.php/warehouse/lowstockitems">
												
										        <div class="panel-body">
										            <div class="panel-left red">
												        <i class="fa fa-warning fa-3x"></i>
										            </div>
                                                <div class="panel-right grey">
										       	<div class="number"><?php echo Modules::run('notifications/low_stock');?>
                                                </div>
												<div class="title">Items low  Stock</div>
										        </div>
										  
										   </div> 
                                            </a>
									    </div>
								    </div>
									 
				
								  <div class="col-lg-4">
									 <div class="dashbox panel ">
										 <a class="btn btn-success input-block-level" href="#">
												
										    <div class="panel-body">
										        <div class="panel-left blue">
												<i class="fa fa-gbp fa-3x"></i>
										        </div>
                                                <div class="panel-right grey">
										       	<div class="number">	<?php echo Modules::run('notifications/monthssales');?>
                                                </div>
												<div class="title">This Months Sales</div>
										        </div>
										  
										   </div> 
                                        </a>
									 </div>
								  </div>
									
								  
								  
								  
								  
								</div>
								
							</div>
							                             </div>
							<!-- /COLUMN 1 -->
												   <!-- /TAB 1 -->
												 </div>
												 <div class="tab-pane fade" id="box_tab2">
													<div class="row">
														<div class="col-md-8">
															<div class="col-md-8">
																<div class="panel panel-default  ">
											                        <div class="panel-heading    ">
																		 
												                        <h5 class="panel-title "> 
																			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
																			                    Search  All Sales Orders 
																			</a> 
																		</h5>
											                        </div>
											                            <div id="collapse1" class="panel-collapse collapse ">
												                                        <div class="panel-body"          >
														
														                   
															                                <form  target="_blank"action="<?php echo base_url();?>index.php/salesorders/search_allso" method="POST">
	                                                                            
																				
																			                   <table>
																								<tr>
																				                    <td>Buyer Name</td><td><input type="text" size="30" name="Company_name" /></td>
																								</tr>
																				                <tr> 
																								    <td>PO No.</td><td><input type="text" size="30" name="po_number"/></td></tr>
																				                <tr> 
																								    <td>SO No.</td><td>  <input type="text" size="30"name="salesorder_id" /></td>
																								</tr>
																								
																								<tr>  
																								    <td>Billing Address1</td><td><input type="text" size="30" name="Address_1" /></td>
																								</tr>
																				                <tr>  
																								    <td>Billing Postcode</td><td><input type="text"size="30" name="Postcode" /></td>
																								</tr>
																				                
																								<tr><br></tr> 
																								<tr> 
																								    <td>Receiver Name</td><td>  <input type="text" size="30"name="ShipToCompanyName" /></td>
																								</tr>
																         
																						         <tr>  
																								    <td>Shipping  Address1</td><td><input type="text" size="30" name="ship_Address_1" /></td>
																								</tr>
																								 <tr>  
																								    <td>Shipping Postcode</td><td><input type="text"size="30" name="ship_Postcode" /></td>
																								</tr>
																				               
																						        
																						        </table>
														                                       <br/>
																							   <button type="submit" class="btn btn-danger center pull-right  "value="submit" >
																							        <i class="fa fa-search-plus"></i> Search 
																							   </button>
															                               </form>
													
													
													
													
													
													                                    </div>
											                            </div>
										                                    </div>
                         										 
																          
																         
															</div>
															<div class="hidden well well-bottom">
																<h4>Month over Month Analysis</h4>
																<ol>
																	<li>Selection support makes it easy to construct flexible zooming schemes.</li>
																	<li>With a few lines of code, the small overview plot to the right has been connected to the large plot.</li>
																	<li>Try selecting a rectangle on either of them.</li>
																</ol>
															</div>
														</div>
													</div>
												</div>
											 </div>
										</div>
									</div>
								</div>
								
															</div>
														</div>
									
						<!-- /HERO GRAPH -->
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
	<!--20141214 viola add>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- DATA TABLES -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	

<!-- DATE PICKER -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.date.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.time.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
		
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
$(document).ready(function() {

		 $('#datepickerFrom').datepicker();
		 $('#datepickerTo').datepicker();//select date   viola 20141226
    });
		jQuery(document).ready(function() {		
			App.setPage("dashboard");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
<?php //echo Modules::run('template/footer'); ?>
</body>
</html>