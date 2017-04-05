
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
                                                                                        <a href="<?php echo base_url();?>">Main</a>
										</li>
										<li><?php echo $this->uri->segment(1);?></li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Merging Invoices </h3>
										
									</div>
									<div class="description">Overview, Statistics and more</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- DASHBOARD CONTENT -->
						<div class="row">
							<!-- /COLUMN 1 -->
									<div class="col-md-12">
								<div class="row">
								    							<!-- COLUMN 1 -->
							<div class="hidden">
								<div class="row">
								  <div class="col-lg-6">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
                                                                                    <h1>Merging Invoices between dates</h1>
										<?php echo form_open('reports/invoice_merg_2'); ?>
                                                                                     Start Date
                                                                                    <input type="date" name="from" class="form-control" />
																					
                                                                                    <br>
                                                                                    End date
                                                                                     <input type="date" name="to"  class="form-control" />
                                                                                    <!---
																					Start Date
                                                                                    <input type="date" id="from"name="from" class="form-control" />
																					
                                                                                    <br>
                                                                                    end date
                                                                                     <input type="date" id="to" name="to"  class="form-control" />
																					 ---></br>
                                                                                    <select name="Company"  class="col-md-12" required="required">
                                                                                          
                                                                                                <option  >select company</option>
                                                                                                  
                                                                                                  <?php
                                                                                                    $Company=$this->db->select('*') 
                                                                                                            ->group_by('Company_name')			  
			                                                                                                ->get('invoices');
			                                                   


                                
								                    foreach ($Company->result()as $c) 
								                    {
                                                        echo '<option  value="' . $c->Company_id. '">' .$c->Company_name . '</option>  ';
                                                    }
                                ?>

                                                                 </select>	
																 </br></br></br>
                                                                                     <button type="submit" class="btn btn-primary">Search</button>
                                                                                         <?php form_close();?>
										</div>
									 </div>
								  </div>
								 
								</div>
                                                            
                                                           
                                                         
								
							</div>
							<!-- COLUMN 1 -->
							
								<div class="col-md-12 dashbox panel panel-default"><br/>
							        <div class="col-md-3">
								        <div class="alert alert-block alert-info fade in">
									        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
										<p><h4>How it works <i class="fa fa-arrow-right"></i></h4> 
										<p> 1. Select a Customer </p>
										<p>2. Select Start Date & End  Date</p>
										<p>3. Click on Submit button.</p>
										<p>4. Invoices will be downloaded in 1 PDF file.</p>
											<!--	<p>5. Click on a completed item to make it active again.</p>-->
								        </div>
										
							        </div>
								    <div class="col-md-8">
									
										<div class="box border pink">
                                            
							
                                            <div class=" box-title">
                                                <h4><i class="fa fa-clipboard"></i>Merging Invoices between dates</h4>
                                    
                                             </div>       
								             <div class="row">  
											 
											 <?php echo form_open('reports/invoice_merg_2'); ?>
                                                <div class="col-sm-10 col-sm-offset-1">  
                                                     <br/>
		 <!-- DATE RANGE PICKER -->	                 <div class="col-sm-12 ">
											
											    <h4><span class="label label-bg label-danger input-block-level tip-right" title="click button to select dates">
												    Select Invoice Dates Between</span></h4>
								
											
											        </div>
														<div class="col-sm-10 col-sm-offset-2">																
										             </BR><h5><strong>Customer</strong>
													 </h5>
													<!--- <select name="company_id" id="e2" class="col-md-12" required="required" onchange="showUser(this.value)">--->
                                                     <select name="company_id"  id="e3" class="col-md-12" required="required" onchange="showUser(this.value)"  placeholder="select a customer">
												        <option></option>
								
								
								                        <option  value="all" >ALL</option>
								
                                <?php
								
                                                                             $Company=$this->db->select('*') 
                                                                                           ->group_by('Company_id')			  
			                                                                               ->get('invoices');
			                                                   


                                
								                    foreach ($Company->result()as $c) 
								                    {
														if ($c->Company_id==1){
															echo '<option  value="' . $c->Company_id. '">Ebey</option>  ';
														}
														else
                                                        echo '<option  value="' . $c->Company_id. '">' .$c->Company_name . '</option>  ';
                                                    }
						
                                ?>

                                                         </select>
														 
														 
														 
														 </BR></BR>
														 </div >
											<span class="date-range ">
											
                                    
											    <div class="col-sm-4 pull-right">
											        <div class="btn-group pull-right">Start date
												        <input type="date" name="from" id="datepickerFrom" class="form-control" />
                                                                                    <br>
                                                                                    End date
                                                                                     <input type="date" name="to"  id="datepickerTo"class="form-control" />
                                                                                    <BR/>
                                                                                     <button type="submit" class="btn btn-pink btn-block">Merge</button>
                           
                                    
                                         
											        </div>  
											     </div>  
										    </span>

											   </div>
											   <?php form_close();?>
										   </div>
										<br/><br/>
					                    </div>
		
										
									 </div>
								 
								</div>   
							<!-- /COLUMN 1 -->	
							    </div>                    
								
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

	
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- TYPEHEAD -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/typeahead/typeahead.min.js"></script>
	<!-- AUTOSIZE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/autosize/jquery.autosize.min.js"></script>
	<!-- COUNTABLE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/countable/jquery.simplyCountable.min.js"></script>
	<!-- INPUT MASK -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	<!-- FILE UPLOAD -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
	
	<!-- UNIFORM -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/uniform/jquery.uniform.min.js"></script>
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
			App.setPage("invoice_merg");  //Set current page
			App.setPage("forms");  //Set current page
      
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