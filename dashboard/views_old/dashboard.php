<!DOCTYPE html>
<html lang="en">

<head>


	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8" />
	<title>Crown | Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
	
        
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/responsive.css" >
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="<?php echo base_url();?>/assets/js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/animatecss/animate.min.css" />
        <!-- JQUERY UI-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.min.css" />
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- DATE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/datepicker/themes/default.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/datepicker/themes/default.date.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/datepicker/themes/default.time.min.css" />
	<!-- FULL CALENDAR -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/fullcalendar/fullcalendar.min.css" />	
        
        <!-- TODO -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/jquery-todo/css/styles.css" />
	<!-- FULL CALENDAR -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/fullcalendar/fullcalendar.min.css" />
	<!-- GRITTER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/gritter/css/jquery.gritter.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

      	<!-- DATA TABLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/datatables/media/assets/css/datatables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />  
           
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
	<section id="page">
	<?php echo Modules::run('template/menu'); ?>
	<?php echo Modules::run('template/dash_head'); ?>
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
										<li><?php echo $this->uri->segment(1);?></li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Dashboard </h3>
										<!-- DATE RANGE PICKER -->
										<!----wait by viola
										<form action="<?php echo base_url();?>dashboard/filterByDate" method="post" enctype="multipart/form-data">
										--->
										<span class="date-range pull-right">
										<div class="btn-group">											
													    <input type="button" class="js_update btn btn-default" onclick="showText(this)" value="Today"> 
												        <input type="button" class="js_update btn btn-default" onclick="showText(this)" value="Last 7 Days" > 
												        <input type="button"class="js_update btn btn-default" onclick="showText(this)" value="Last month" >
	                                        
											</br></br>
											From <input type="text" name="datepickerFrom" id="datepickerFrom"   size="10" >
											To <input type="text" name="datepickerTo" id="datepickerTo"   size="10" >
											

											</div>
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
						<div class="row">
						     
							<!-- MESSENGER -->
								<div class="col-md-12">
								<div class="box border blue" id="messenger">
									<div class="box-title">
										<h4><i class="fa fa-bell"></i>Sales Summary</h4>
										<div class="tools">
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
									    
										
										
										
										<ul>
										    <!-- COLUMN 1 -->
							<div class="col-md-12">
							    <h1>Total</h1>
								<div class="row">
								  <div class="col-lg-4">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										<a href="<?php echo base_url();?>businesses"/>
										   <div class="panel-left red">
												<i class="fa fa-users fa-3x"></i>
										   </div>
										   <div class="panel-right">
                                                <div class="number"><?php echo Modules::run('notifications/customers');?>
                                                </div>
												<div class="title">Customers</div>
												
										   </div>
										</div>
									 </div>
								  </div>
								  <div class="col-lg-4">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										 
										<a href="<?php echo base_url();?>salesorders/order_pending"/>
										   <div class="panel-left blue">
												<i class="fa fa-book fa-3x"></i>
										   </div>
										   <div class="panel-right">
												<div class="number"><?php echo Modules::run('notifications/orders_pending');?></div>
												<div class="title">Orders Pending </div>
												
										   </div>
										</div>
									 </div>
								  </div>
								  <div class="col-lg-4">
									<div class="dashbox panel panel-default">
										    <div class="panel-body">
											<!----wait by viola--->
											<a href="<?php echo base_url();?>">
										        <div class="panel-left blue">
												     <i class="fa fa-money fa-3x"></i>
										        </div>
										        <div class="panel-right">
                                                     <div class="number"><?php echo Modules::run('notifications/invoiced');?>
                                                     </div>
												     <div class="title">Invoiced</div>
												
										        </div>
										    </div>
									 </div>
								</div>
								</div>
                                                            
                                                            
                                <div class="row">
								
								  
								  
								</div>
                                                             
                                <div class="row">
								    <div class="col-lg-4">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										<a href="<?php echo base_url();?>">
											
										   <div class="panel-left red">
												<i class="fa fa-truck fa-3x"></i>
										   </div>
										   <div class="panel-right">
												<div class="number"><?php echo Modules::run('notifications/orders_shipped');?></div>
												<div class="title">Orders Shipped </div>
												
										   </div>
										</div>
									 </div>
								  </div>
								     <div class="col-lg-4">
									    <div class="dashbox panel panel-default">
										    <div class="panel-body">
                                                <a href="<?php echo base_url();?>warehouse/lowstockitems"/>
											         <div class="panel-left blue">
												         <i class="fa fa-warning fa-3x"></i>
										            </div>
										        <div class="panel-right">
                                                     <div class="number"><?php echo Modules::run('notifications/low_stock');?>
                                                     </div>
												     <div class="title"> Items low  Stock 
													 </div>
                                                </div>
												</a>
										    </div>
									    </div>
								     </div>
									
								  <div class="col-lg-4">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left blue">
												<i class="fa fa-gbp fa-3x"></i>
										   </div>
										   <div class="panel-right">
                                                <div class="number">
												    <i class="fa fa-gbp">
													</i><strong>
													<?php echo Modules::run('notifications/monthssales');?>
													</strong>
                                                </div>
                                                <div class="title"> This Months Sales
												</div>
                                                                                       
										   </div>
										</div>
									 </div>
								  </div>
								</div>
								
							</div>
							<!-- /COLUMN 1 -->
										
											<li>Sales Analysis</li>
											
										</ul>
											
																			</div>
									
								</div>
								</div>
								<!-- /MESSENGER -->
						
							
						
							
						</div>
					
						<div class="row">
						<!-- CALENDAR -->
							
								
								
									
						</div>
						<!-- /CALENDAR & CHAT -->
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
<?php echo Modules::run('template/footer'); ?>
</body>
</html>