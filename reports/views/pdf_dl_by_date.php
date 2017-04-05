<head><title>Crown | Download Invoices to C.E distributors Dropbox</title>
<!-- DATA TABLES -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />


<!-- TYPEAHEAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/typeahead/typeahead.css" />
<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />

	<!-- JQGRID -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jqgrid/css/ui.jqgrid.min.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
<!-- SELECT2 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select2/select2.min.css" />
<script src="http://malsup.github.com/jquery.form.js"></script> 
</head>
<body>
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
                                                                                        <a href="<?php echo base_url();?>">Reports</a>
										</li>
										<li><?php echo $this->uri->segment(1);?></li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Reports</h3>
										<!-- DATE RANGE PICKER -->
										<!---
										<span class="date-range pull-right">
											<div class="btn-group">
												<a class="js_update btn btn-default" href="#">Today</a>
												<a class="js_update btn btn-default" href="#">Last 7 Days</a>
												<a class="js_update btn btn-default hidden-xs" href="#">Last month</a>
												
												<a id="reportrange" class="btn reportrange">
													<i class="fa fa-calendar"></i>
													<span></span>
													<i class="fa fa-angle-down"></i>
												</a>
											</div>
										</span>
										-->
										<!-- /DATE RANGE PICKER -->
									</div>
									<div class="description">Download Invoices to Dropbox</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- DASHBOARD CONTENT -->
						<div class="row">
							<!-- COLUMN 1 -->
							<div class="col-md-8">
								<div class="row">
								  <div class="col-lg-6">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
                                                                                    <h1>Invoice between dates</h1>
										<?php echo form_open('reports/pdf_dl_by_date1'); ?>
                                                                                    
                                                                                    Start Date
                                                                                    <input type="date" name="from" class="form-control" />
																					
                                                                                    <br>
                                                                                    End date
                                                                                     <input type="date" name="to"  class="form-control" />
                                                                                    
                                                                                     <button type="submit" class="btn btn-primary">Search</button>
                                                                                         <?php form_close();?>
										</div>
									 </div>
								  </div>
								 
								</div>
                                                            
                                                           
                                                         
								
							</div>
							<!-- /COLUMN 1 -->
							<div class="dashbox panel panel-default col-lg-8">
							     <form></form>
										<div class="panel-body"><div class="description"><h4> <?php  
									
                                                                              echo 'From <font size="12" color="red"><strong>'.$date[0].'</strong></font>To<font size="12" color="red"><strong>'.$date[1].'</strong></font>';  
										
											
                                                                                    
                                                                                   
                                                                                    ?>
																			 </div>
							        <!-- BOX -->
                        <div class="box border orange">
									<div class="box-title">
                                <h4><i class="fa fa-pencil-square-o fa-fw"></i>Invoices List</h4>
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
									<table id="datatable1"cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
										     <th>Company</th>							
											
											<th>Date Raised</th>
											<th>SO#</th>
                                            
                                            <th> PO No: </th>
                                            
                                           <th> PDF download</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $base_url = base_url();
										$i=1;
                                        foreach ($company->result() as $in) {

                                             $invoice_id=substr(sprintf('%05d', $in->invoice_id),0,5);
                                             $salesorder_id=substr(sprintf('%05d', $in->salesorder_id),0,5);
                                            
                                            echo '<tr class="gradeX">';
											//echo'<td><font size="2" color="blue"><strong>' . $i++ . '</strong></font></td>';
											
											echo'<td><strong>' . $in->Company_name . '</strong></td>';
											echo'<td><strong>' . $in->dateraised . '</strong></td>';
											echo'<td><strong>SO-' . $salesorder_id . '</strong></td>';
                                           
                                            echo'<td><strong>' . $in->po_number . '</strong></td>';
                                           
											
										
                                        
                                            //downdload PDF file       
                                                echo'<td>
                                                     <div>';        
															//<form action="'.  base_url().'reports/pdf_dl_by_date2/"  method="POST"> ';                       
											                   echo' <a href="'.  base_url().'reports/pdf_dl_by_date2/'. $in->invoice_id .'"><span class="fa fa-file fa-lg"></span></a>
											 
															
															</form>
											        </div>
                                                </td>';


												   }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
										   
											<th>Company							
											</th>
											<th>Date Raised</th>
											<th>SO#</th>
                                            
                                            <th> PO No: </th>
                                            
                                           <th> PDF download</th>
											
                                        </tr>
                                    </tfoot>
									
                                </table>
								 </div> 
							</div>
                        <!-- /BOX -->
                             </div>   </div>                        
                             </div>                            
								
						</div>
					   <!-- /DASHBOARD CONTENT -->
					   <!-- HERO GRAPH -->
					
						<!-- /HERO GRAPH -->
						
							
							
						
						<!-- /CALENDAR & CHAT -->
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
		</div>
	<?php echo Modules::run('template/footer'); ?>	
	

























<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?php echo base_url();?>assets/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url();?>assets/bootstrap-dist/js/bootstrap.min.js"></script>
	
<!-- TYPEHEAD -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/typeahead/typeahead.min.js"></script>
<!-- SELECT2 -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2/select2.min.js"></script>



<!-- DATE RANGE PICKER -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
<!-- DATE PICKER -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.date.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.time.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
<!-- SLIMSCROLL -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
<!-- BLOCK UI -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
<!-- DATA TABLES -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
<!-- TYPEHEAD -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/typeahead/typeahead.min.js"></script>
<!-- AUTOSIZE -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/autosize/jquery.autosize.min.js"></script>
<!-- COUNTABLE -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/countable/jquery.simplyCountable.min.js"></script>

		
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
			App.setPage("pdf_dl_by_date");  //Set current page
			
      
			App.init(); //Initialise plugins and elements
		});
		// Natural Sorting
    jQuery.fn.dataTableExt.oSort['natural-asc'] = function(a, b) {
        return naturalSort(a, b);
    };
    jQuery.fn.dataTableExt.oSort['natural-desc'] = function(a, b) {
        return naturalSort(a, b) * -1;
    };
     $(document).ready(function() {
        $('#datatable1').dataTable();
       $('#from').datepicker();
		 $('#to').datepicker();//select date   viola 20150326
  
    });
	</script>
	<!-- /JAVASCRIPTS -->


<!-- /JAVASCRIPTS -->

</body>
</html>