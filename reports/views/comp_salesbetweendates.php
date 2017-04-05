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
										<li>
											
                                                                                        <a href="<?php echo base_url();?>index.php/reports">Reports</a>
										</li>
										<li><?php echo $this->uri->segment(1);?></li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Reports</h3>
										<!-- DATE RANGE PICKER -->
										
										<!-- /DATE RANGE PICKER -->
									</div>
									<div class="description">Overview, Statistics and more</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- DASHBOARD CONTENT -->
						<div class="row">
							<!-- COLUMN 1 -->
							<div class="col-md-12">
								<div class="row">
								  							<!-- /COLUMN 1 -->
									<div class="col-md-12">
								<div class="row">
								    <div class="col-md-12 dashbox panel panel-default"><br/>
							        <div class="col-md-3">
								        <div class="alert alert-block alert-info fade in">
									        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
										<p><h4>How it works <i class="fa fa-arrow-right"></i></h4> </p>
										<p>   1. Select a Customer </p>
										<p>2. Select Start Date & End  Date</p>
										<p>3. Click on Submit button.</p>
										<p>4. Invoice Report will be downloaded.</p>
											<!--	<p>5. Click on a completed item to make it active again.</p>-->
								        </div>
										
							        </div>
								    <div class="col-md-8">
									
										<div class="box border green">
                                            
							
                                            <div class=" box-title">
                                                <h4><i class="fa fa-vcard-o "></i>Customer Sales Details</h4>
                                    
                                             </div>       
								             <div class="row">  
											 <?php echo form_open('reports/comp_betweendates'); ?> 
										
                                                <div class="col-sm-10 col-sm-offset-1">  
                                                  <br/>
		 <!-- DATE RANGE PICKER -->	                 <div class="col-sm-12 ">
											
											    <h4><span class="label label-bg label-danger input-block-level " title="">
												    Select Customer & Sales Dates Between</span></h4>
								
											
											        </div>
												<div class="col-sm-10 col-sm-offset-2">																
										             </BR><h5><strong>Customer</strong>
													 </h5>
													 <select name="company_id" id="e1" class="col-md-12" required="required" onchange="">
                                
								
								
								                        <option  value="all" >ALL</option>
								
                                <?php
								
                                $this->db->group_by('Company_id');
                                $businesses = $this->db->get('invoices');
								
                                foreach ($businesses->result()as $companys) {
                                    echo ' <option  value="' . $companys->Company_id . '"  required="required"">' . $companys->Company_name . '</option>  ';
                                   
                                }
						
                                ?>

                                                         </select>
														 </BR></BR></div >
											<span class="date-range ">
										
											<div class="col-sm-4 pull-right">
											<div class="btn-group pull-right">Start date
												 <input type="text" name="from" id="datepickerFrom" class="form-control" />
                                                                                    <br>
                                                                                    End date
                                                                                     <input type="text" name="to"  id="datepickerTo"class="form-control" />
                                                                                    <BR/>
                                                                                     <button type="submit" class="btn btn-success btn-block">Search</button>
                           
                                    
                                         
											</div>  
											</div>
										</span>

											   </div> <?php form_close();?>
										
										   </div>
										<br/><br/>
					                 </div>
		
										
									 </div>
								 
								    </div>   
								
							    </div>
							<!-- /COLUMN 1 -->
								  
								  
								  
                                                            
                                                           
                                                         
								
							</div>
							<!-- /COLUMN 1 -->
							
                                                        
                                                        
								
						</div>
					   <!-- /DASHBOARD CONTENT -->
					   <!-- HERO GRAPH -->
					
						<!-- /HERO GRAPH -->
						<!-- NEW ORDERS & STATISTICS -->
						<div class="row">
							
							<!-- STATISTICS -->
							
							
						<!-- CALENDAR & CHAT -->
						<div class="row">
							
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
	<!-- AUTOSIZE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/autosize/jquery.autosize.min.js"></script>
	<!-- COUNTABLE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/countable/jquery.simplyCountable.min.js"></script>
	<!-- INPUT MASK -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

		
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
			 
			App.setPage("comp_salesbetweendates");
			App.setPage("forms");
			App.init(); //Initialise plugins and elements
		});	
		$(document).ready(function() {
         
       
		 $('#datepickerFrom').datepicker();
		 $('#datepickerTo').datepicker();//select date   viola 20141226
		
    });
	</script>
	<!-- /JAVASCRIPTS -->
<?php //echo Modules::run('template/footer'); ?>
<body>
<html>