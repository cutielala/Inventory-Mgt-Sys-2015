<script>
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
        xmlhttp.open("GET", "<?php echo base_url(); ?>reports/get_bk_product?q=" + str, true);
        xmlhttp.send();
    }
</script>



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
								  <div class="col-md-6">
									 <div class="dashbox panel panel-default">
										<div class="box border purple">
                                            
							
                                <div class=" box-title">
                                    <h4><i class="fa fa-list-ul"></i>Back Order Report</h4>
                                    
                                </div>       
								<div class="row">                                    
										<?php echo form_open('reports/bk_rpt'); ?>
                                                                                    
                                             <div class="col-md-10 col-md-offset-1 ">
<br/>											 
						                            <label class="col-md-5 pull-left "><h4><strong>Vendor</strong></h4></label>  
							
						                        <div class="col-md-12">
							
                                             <select name="vendor"  class="col-md-8" required="required" onchange="showUser(this.value)">
                                
							
								                 <option >Select Vendor</option>
                               
                                <?php
								
                                foreach ($vendor->result()as $v) {

                                    echo '<option  value="'.$v->vendor_id.'">' . $v->vendors_name . '</option>  ';
                                }
						
                                ?>

                                                </select>
							 <!----
							<a class="btn btn-default" data-toggle="modal" data-target="#myModal" href="<?php echo base_url();?>/businesses/add_company">Add Customer</a>
							
							------>
							                     </div>
							<div class="col-md-12"><br></br>
                                <div id="txtHint">
							        <b><h4><strong>Product info will be listed here.</strong></h4></b><div class="separator"></div>
							    </div>                                                                                         
                            <?php ?>	
                            <br></br><br></br></div>							
						</div>
                                                                                    
                              <?php //echo form_close(); ?>                                                      

                              
							        <div class="col-sm-4 col-sm-offset-4"></br> 
									    
							             <button type="submit" class="btn btn-primary"  >Search</button>
                                                                                         <?php form_close();?>
								    <br></br></div>		
										
										
										
									</div>	
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										</div>
										
					
										
										
										
										
										
										
										
										
										
										
										
										
									 </div>
								  </div>
								 
								</div>
                                                            
                                                           
                                                         
								
							</div>
							<!-- /COLUMN 1 -->
							
                                                        
                                                        
								
						</div>
					   <!-- /DASHBOARD CONTENT -->
					   <!-- HERO GRAPH -->
					
						<!-- /HERO GRAPH -->
						<!-- NEW ORDERS & STATISTICS -->
						<div class="row">
							
							<!-- STATISTICS -->
							
							
						
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
			App.setPage("bk_order_rpt");
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
<?php echo Modules::run('template/footer'); ?>