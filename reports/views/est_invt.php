
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
<script type="text/javascript">
    function myfunc () {
        var frm = document.getElementById("foo");
       // frm.submit();
    }
    window.onload = myfunc;
</script>


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


if(obj.value=='30')
{
document.getElementById('datepickerFrom').value='';
document.getElementById('datepickerTo').value='';
//document.getElementById('mytext').style.display='block';
document.getElementById('datepickerFrom').value=showdate(-30);
document.getElementById('datepickerTo').value=date;


}
if(obj.value=='60')
{
document.getElementById('datepickerFrom').value='';
document.getElementById('datepickerTo').value='';
document.getElementById('datepickerFrom').value=showdate(-60);
document.getElementById('datepickerTo').value=date;
//document.getElementById('mytext').style.display='none';
//obj.value='Show';
}
if(obj.value=='90')
{
document.getElementById('datepickerFrom').value='';
document.getElementById('datepickerTo').value='';
document.getElementById('datepickerFrom').value=showdate(-90);
document.getElementById('datepickerTo').value=date;
//document.getElementById('mytext').style.display='none';
//obj.value='Show';
}
else if 
(obj.value=='120')
{
document.getElementById('datepickerFrom').value='';
document.getElementById('datepickerTo').value='';
document.getElementById('datepickerFrom').value=showdate(-120);
document.getElementById('datepickerTo').value=date;
//obj.value='Show';
}
return;
}
 

</script>
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
										<h3 class="content-title pull-left">Estimated Inventory Duration </h3>
										
									</div> 
									<div class="description">Overview, Statistics and more</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- DASHBOARD CONTENT -->
						<div class="row">
							<!-- COLUMN 1 -->
							
							
							<!--
							<div class="col-lg-6">
								<div class="row">
								    <div class="col-lg-12">
									    <div class="dashbox panel panel-default">
									 
										<div class="panel-body">
										    <div class="box border purple">
                                            
							
                                                <div class=" box-title">
                                                    <h4><i class="fa fa-list-ul"></i><strong>Estimated Inventory Duration</strong></h4>
                                    
                                                </div>       
								                <div class="row">  
												    <div class="col-md-10 col-md-offset-1 ">
                                                            <?php echo form_open('reports/est_invt_exe1'); ?>                                            
																					
							<br></br>                                    <div class="col-md-12">
                                                                                    Selling Rate Over Past
                                                                                   
																					<select  name="past" class="js_update btn btn-default" required="required" onclick="showText(this)" >
																					
                                                                                         <option  onclick="showText(this)"  value=""> </option>
																						 <option   value="30">30</option>
																						 <option  value="60">60</option>
																						 <option  value="90">90</option>
																						 <option  value="120">120</option>
													 
													
                                                                                     </select>	Days
                                                                                    <br> 
																					<select name="vendor"  class="col-md-12" required="required">
                                                                                         <option></option>
                                                                                               
                                                                                                  
                                                                                            <?php
                                                                                                   
			                                                   


                                
								                    foreach ($vendor->result()as $ven) 
								                    {
                                                        echo '<option  value="' . $ven->vendors_name. '">' .$ven->vendors_name . '</option>  ';
                                                    }
                                ?>                  

                                                                 </select>	
				
																 
																 
																					<input type="hidden" name="from" id="datepickerFrom" readonly="true"  />
                                                                                     
                                                                                     <input type="hidden" name="to" id="datepickerTo" readonly="true"  />
                                                                                    </BR>
																				<div class="col-sm-4 col-sm-offset-4"></br>
                                                                                     <button type="submit" class="btn btn-primary">Estimated</button>
                                                                               </div>       
																	    </div>		 
																						 <?php form_close();?>
										
										            </div>
												</div>
										
										    </div>
									 
									 </div>
								  </div>
								 
								</div>
                           
							    </div>						
                 
						    </div>--->
					   <!-- /COLUMN 1 -->
							
					        <!-- COLUMN 1 -->
							
								<div class="col-md-12 dashbox panel panel-default"><br/>
							        <div class="col-md-3">
								        <div class="alert alert-block alert-info fade in">
									        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
										<p><h4>How it works <i class="fa fa-arrow-right"></i></h4> </p>
										<p> 1. Select Selling Rate over Past Period of Dates </p>
										<p>2. Select a Vendor</p>
										<p>3. Click on Estimated button.</p>
										<p>4. Estimated Inventory Report will be downloaded .</p>
											<!--	<p>5. Click on a completed item to make it active again.</p>-->
								        </div>
										
							        </div>
								    <div class="col-md-8">
									
										<div class="box border purple">
                                            
							
                                            <div class=" box-title">
                                                <h4><i class="fa fa-stack-overflow"></i>Estimated Inventory Duration</h4>
                                    
                                             </div>       
								             <div class="row">  
											 
											  <?php echo form_open('reports/est_invt_exe1'); ?>    
                                                <div class="col-sm-10 col-sm-offset-1">  
                                                     <br/>
		 <!-- DATE RANGE PICKER -->	                 <div class="col-sm-12 ">
											
											            <h4><span class="label label-bg label-danger input-block-level" >
												    Select Selling Rate period & Vendor </span></h4>
								
											
											        </div>
													<div class="col-sm-10 col-sm-offset-2">																
										                     Selling Rate Over Past
                                                                                   
														<select  name="past" class="js_update btn btn-default" required="required" onclick="" >
																					
                                                                                         <option  onclick="showText(this)"  value=""> </option>
																						 <option   value="30">30</option>
																						 <option  value="60">60</option>
																						 <option  value="90">90</option>
																						 <option  value="120">120</option>
													 
													
                                                        </select>	Days
                                                         <br>   
												    </div>
												    <div class="col-sm-10 col-sm-offset-2">																
										                </BR><h5>Vendor</h5>
													 
													<!--- <select name="company_id" id="e2" class="col-md-12" required="required" onchange="showUser(this.value)">--->
                                                      	 <select name="vendor"  id="e4" class="col-md-12" required="required" placeholder="select vendor">
                                                                                         <option></option>
                                                                                               
                                                                                                  
                                                                                            <?php
                                                                                                   
			                                                   


                                
								                    foreach ($vendor->result()as $ven) 
								                    {
                                                        echo '<option  value="' . $ven->vendors_name. '">' .$ven->vendors_name . '</option>  ';
                                                    }
                                ?>                  

                                                         </select>	
														 </BR></BR>
												    </div >
											      
											
                                    
											        <div class="col-sm-4 pull-right">
											           
                                                        <button type="submit" class="btn btn-purple btn-block">Estimated</button>
                           
											        </div>  
 

											   </div>
											   <?php form_close();?>
										   </div>
										<br/><br/>
					                    </div>
		
										
									 </div>
								 
								</div>   
							<!-- /COLUMN 1 -->
					   
					   
					   
					   
					   
					   
					   
					   
					   
					   
					   
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


		
	<!-- DATE RANGE PICKER -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
<!-- DATE PICKER -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.date.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.time.js"></script>
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
	<!-- AUTOSIZE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/autosize/jquery.autosize.min.js"></script>
	<!-- COUNTABLE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/countable/jquery.simplyCountable.min.js"></script>
	<!-- INPUT MASK -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	
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
				
						 
			App.setPage("est_invt");  //Set current page
			App.setPage("forms"); 
			App.init(); //Initialise plugins and elements
		});
		    $(document).ready(function() {
        $('#datatable1').dataTable();
       // $('#datepicker').datepicker({minDate: -1, maxDate: "+1"});
	  
	     $('#datepickerFrom').datepicker();
		 $('#datepickerTo').datepicker();//select date   viola 20150326
  
    });
	</script>
	<!-- /JAVASCRIPTS -->
<?php echo Modules::run('template/footer'); ?>
