<html>

<head>	
	
	<title>Crown | Dashboard</title>
<!--20121222 viola -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
<!-- DATE RANGE PICKER -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />

<!--20121222 viola -->	
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/ css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/ css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/ css/responsive.css" >
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link href="<?php echo base_url(); ?>assets/ font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/ css/animatecss/animate.min.css" />

	<!-- TODO -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/ js/jquery-todo/css/styles.css" />
<!-- TYPEAHEAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/typeahead/typeahead.css" />
<!-- SELECT2 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select2/select2.min.css" />
<script src="http://malsup.github.com/jquery.form.js"></script> 

<script>//showing comap
    function showUser(str)
    {
        if (str == "")
        {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "<?php echo base_url(); ?>notifications/getuser?q=" + str, true);
        xmlhttp.send();
    }
</script>
</head>
<body>
<?php echo Modules::run('template/dash_head'); ?>
<?php echo Modules::run('template/menu'); ?>

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
                                                                                        <a href="<?php echo base_url();?>">Main</a>
										</li>
										<li><?php echo $this->uri->segment(1);?></li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Dashboard </h3>
										<!-- DATE RANGE PICKER>
										<form action="<?php echo base_url();?>dashboard/filterByDate" method="post" enctype="multipart/form-data">
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
										< /DATE RANGE PICKER -->
									</div>
									<div class="description">Overview, Statistics and more</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- DASHBOARD CONTENT -->
						<div class="row">
						
						
						<div class="col-md-12">
								<!-- BOX -->
								<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i> <span class="hidden-inline-mobile">Sales Summary</span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs">
											<ul class="nav nav-tabs">
												 <li><a href="#box_tab2" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> <span class="hidden-inline-mobile">Total</span></a></li>
												 <li class="active"><a href="#box_tab1" data-toggle="tab"><i class="fa fa-search-plus"></i> <span class="hidden-inline-mobile">From  <font size="2" color="red"><?php $dateFrom = $datepickerFrom;
												echo $dateFrom?></font> To  <font size="2" color="red"><?php $dateTo = $datepickerTo;
												echo $dateTo?></font></span></a></li>
											 </ul>
											 <div class="tab-content">
												 <div class="tab-pane fade in active" id="box_tab1">
													<!-- TAB 1 -->
													<div class="row">
														<ul>
							<div class="col-md-12">
							<div class="col-md-6">
										<div class="box border purple">
											<div class="box-title">
												<h4><i class="fa fa-adjust"></i>Distribution Index</h4>
												<div class="tools">
													<a href="javascript:;" class="reload">
														<i class="fa fa-refresh"></i>
													</a>
													<a href="javascript:;" class="remove">
														<i class="fa fa-times"></i>
													</a>
												</div>
											</div>
											<div class="box-body">									
												  <div class="sparkline-row">
													<span class="title">Revenue distribution</span>
													<span class="value"><i class="fa fa-usd"></i> 25674</span>
													<!---
													<span class="sparklinepie">16,7,23</span>
													-->
												  </div>
												  <div class="sparkline-row">
													<span class="title">Sales</span>
													<span class="value"><i class="fa fa-money"></i> 19 999,99</span>
													<!--
													<span class="sparklinepie">6,3,24,25</span>
													-->
												  </div>
												  <div class="sparkline-row">
													<span class="title">Employee/ Dept</span>
													<span class="value"><i class="fa fa-user"></i> 645783</span>
													<!---
													<span class="sparklinepie">11,19,20</span>
													-->
												  </div>
											</div>
										</div>
								</div>		
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
										<a href="<?php echo base_url();?>salesorders//order_pending"/>
										   <div class="panel-left blue">
												<i class="fa fa-book fa-3x"></i>
										   </div>
										   <div class="panel-right">
												<div class="number"><?php $num_rows_pending = $query_pending->num_rows();
												echo $num_rows_pending?></div>
												<div class="title">Orders Pending </div>
												
										   </div>
										</div>
									 </div>
								  </div>
								
								  <div class="col-lg-4">
									<div class="dashbox panel panel-default">
										    <div class="panel-body">
											<a href="<?php echo base_url();?>salesorders/order_invoiced"/>
										        <div class="panel-left blue">
												     <i class="fa fa-money fa-3x"></i>
										        </div>
										        <div class="panel-right">
                                                     <div class="number"><?php $num_rows_invoiced = $query_invoiced->num_rows();
												echo $num_rows_invoiced?>
                                                     </div>
												     <div class="title">Invoiced</div>
												
										        </div>
										    </div>
									 </div>
								</div>
								  														
								</div>

                                                             
                                <div class="row">
								     <div class="col-lg-4">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										<a href="<?php echo base_url();?>salesorders/order_shipped"/>
											
										   <div class="panel-left red">
												<i class="fa fa-truck fa-3x"></i>
										   </div>
										   <div class="panel-right">
												<div class="number"><?php $num_rows_shipped = $query_shipped->num_rows();
												echo $num_rows_shipped?></div>
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
					                                    </ul>
													</div>
												   <!-- /TAB 1 -->
												   
												   

												 </div>
												 <div class="tab-pane fade" id="box_tab2">
													<div class="row">
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
										<a href="<?php echo base_url();?>dashboard/order_pending"/>
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
											<!---a href="<?php echo base_url();?>salesorders/order_invoiced"/----->
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
										<!---a href="<?php echo base_url();?>salesorders/order_shipped"/----->
											
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
										</div>
									</div>
								</div>
								<!-- /BOX -->
							</div>

						
								
						</div>
					   <!-- /DASHBOARD CONTENT -->
					   
					   
					   <!----hide
					   <!-- HERO GRAPH -->
					
						<!-- /HERO GRAPH -->
						<!-- NEW ORDERS & STATISTICS -->
						
							
						<!-- /NEW ORDERS & STATISTICS -->
							
						<!-- CALENDAR & CHAT -->
						<div class="row">
						<!-- CALENDAR -->
							
								
								
									
							<!-- /CALENDAR -->	
							<!-- CHAT -->
							
							<!-- CHAT -->
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

<!--/PAGE -->
<!-- JAVASCRIPTS -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JQUERY -->
<script src="<?php echo base_url(); ?>assets/js/jquery/jquery-2.0.3.min.js"></script>
<!-- JQUERY UI-->
<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
<!-- BOOTSTRAP -->
<script src="<?php echo base_url(); ?>assets/bootstrap-dist/js/bootstrap.min.js"></script>


<!-- TYPEHEAD -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/typeahead/typeahead.min.js"></script>
<!-- SELECT2 -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2/select2.min.js"></script>

<!-- DATE RANGE PICKER -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
<!-- DATE PICKER -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.date.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.time.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
<!-- SLIMSCROLL -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
<!-- BLOCK UI -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>

<!-- 20141222 viola add-->
<!-- DATA TABLES -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>



<!-- EASY PIE CHART -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/easypiechart/jquery.easypiechart.min.js"></script>
<!-- FLOT CHARTS -->
	<script src="<?php echo base_url(); ?>assets/ js/flot/jquery.flot.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/ js/flot/jquery.flot.time.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ js/flot/jquery.flot.selection.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/ js/flot/jquery.flot.resize.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ js/flot/jquery.flot.pie.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ js/flot/jquery.flot.stack.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ js/flot/jquery.flot.crosshair.min.js"></script>
	
	
	<!--  --20141222 viola add-->	
	
<!-- TYPEHEAD -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/typeahead/typeahead.min.js"></script>
<!-- AUTOSIZE -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/autosize/jquery.autosize.min.js"></script>
<!-- COUNTABLE -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/countable/jquery.simplyCountable.min.js"></script>
<!-- INPUT MASK -->
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<!-- FILE UPLOAD -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<!-- SELECT2 -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2/select2.min.js"></script>
<!-- UNIFORM -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/uniform/jquery.uniform.min.js"></script>
<!-- JQUERY UPLOAD -->
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="<?php echo base_url(); ?>assets/js/blueimp/javascript-template/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="<?php echo base_url(); ?>assets/js/blueimp/javascript-loadimg/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?php echo base_url(); ?>assets/js/blueimp/javascript-canvas-to-blob/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="<?php echo base_url(); ?>assets/js/blueimp/gallery/jquery.blueimp-gallery.min.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/jquery.fileupload.min.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/jquery.fileupload-process.min.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo base_url(); ?>/assets/js/jquery-upload/js/jquery.fileupload-image.min.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/jquery.fileupload-audio.min.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/jquery.fileupload-video.min.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/jquery.fileupload-validate.min.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/jquery.fileupload-ui.min.js"></script>
<!-- The main application script -->
<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/main.js"></script>
<!-- COOKIE -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
<!-- CUSTOM SCRIPT -->

<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script>
// Natural Sorting
    jQuery.fn.dataTableExt.oSort['natural-asc'] = function(a, b) {
        return naturalSort(a, b);
    };
    jQuery.fn.dataTableExt.oSort['natural-desc'] = function(a, b) {
        return naturalSort(a, b) * -1;
    };

    

    jQuery(document).ready(function() {
       // App.setPage("dynamic_table");  //Set current page
		App.setPage("filterByDate"); 
	  // App.setPage("jqgrid_plugin");  //Set current page
        App.init(); //Initialise plugins and elements
    });
/*
    $(document).ready(function() {
        $('#datatable1').dataTable();
		 $('#datatable2').dataTable();
        $('#datepicker').datepicker();
		 $('#datepicker2').datepicker({minDate: -1, maxDate: "+1"});//select date   viola 20141226
		 $('#datepickerFrom').datepicker();
		 $('#datepickerTo').datepicker();//select date   viola 20141226
    });
*/
    $(document).on("click", ".open-AddBookDialog", function() {
        var myBookId = $(this).data('id');
        $(".modal-body #bookId").val(myBookId);
        // As pointed out in comments, 
        // it is superfluous to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });
    dataTable.fnAddData(["<input type='checkbox' id='checkboxID'/>"]);
    jQuery('#checkBoxID').show();
     $(document).ready(function() {

        $('.table-data').each(function(index, table) {

            $(this).dataTable({
                "aoColumns": [{"sType": "natural"}, null, null, null, null]
            });
        });

    });
    $('.checkall').click(function(e) {

        var chk = $(this).prop('checked');

        $('input', oTable.fnGetNodes()).prop('checked', chk);
    });
</script>
 <!-- Javascript Scripts -->
    <script type="text/javascript">
    //<![CDATA[

        function selectAllFiles(c) {
            for (i = 1; i <= 5; i++) {
                document.getElementById('INV-' + i).checked = c;
            }
        }

    //]]>
    </script>	

<!-- /JAVASCRIPTS -->

</body>
</html>

