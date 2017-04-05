       <!-- DATA TABLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
<!-- DATE RANGE PICKER -->
       <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
         	<!-- TYPEAHEAD -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/typeahead/typeahead.css" />
	<!-- FILE UPLOAD -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-fileupload/bootstrap-fileupload.min.css" />
	<!-- SELECT2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/select2/select2.min.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/uniform/css/uniform.default.min.css" />
	<!-- JQUERY UPLOAD -->
	<!-- blueimp Gallery styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/js/blueimp/gallery/blueimp-gallery.min.css">
	<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-upload/css/jquery.fileupload.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-upload/css/jquery.fileupload-ui.css">

 <script language="JavaScript" type="text/javascript">
function showText(obj)
{

//previousweek= new Date(firstDay.getTime() - 7 * 24 * 60 * 60 * 1000);

date = new Date().toLocaleDateString().split("/")
date[0].length == 1 ? "0" + date[0] : date[0]//date
date[1].length == 1 ? "0" + date[1] : date[1]//month
date = date[1] + "/" + date[0] + "/" + date[2];



//last = new Date(date.getTime() - (7 * 24 * 60 * 60 * 1000));

//var day =last.getDate();
//var month=last.getMonth()+1;
//var year=last.getFullYear();
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

if(obj.value=='Show')
{
document.getElementById('mytext').style.display='block';
document.getElementById('mytext').value='xxx';
obj.value='Hide';
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
</head>
        <body>

<?php echo Modules::run('template/menu'); ?>

        <?php foreach ($company->result() as $company)
        {
           
        }?>
        <!-- PAGE -->

				
		<div id="main-content">
		    
			<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
		<div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  <h4 class="modal-title">Email All Invoices</h4>
				</div>
				<div class="modal-body">
                                    
                                    
                                    <!-- DATA TABLES -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border red">
									<div class="box-title">
										<h4><i class="fa fa-paste"></i>Item List</h4>
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
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover red">
											<thead>
												<tr>
													
													<th>item Code</th>
													<th>Description</th>
                                                    <th> Price </th>
                                                    <th> add </th>
												</tr>
											</thead>
									        <tbody>
                                                                                            
                                                <?php 
												/*
                                                    $base_url = base_url();
                                                        foreach ($query->result() as $table) {
                                                            //if($table->qty > 0){
                                     


                                                 echo 'no nead';
												 echo '<tr class="gradeX">';
                                                    echo '<form id="additem"  action="'.base_url().'businesses/item_added" method="post">';
                                                                                               
                                                        echo'<input type="hidden" class="from control" name="id" value="'.$this->uri->segment(3).'"/>';
													        echo'<td><strong><input type="hidden" class="from control"name="CCL_Item" value="'.$table->CCL_Item.'"/>'.$table->CCL_Item.'</strong></td>';
                                                                echo'<td><strong><input type="hidden" class="from control"name="Description" value="'.$table->Description.'"/>'.$table->Description.'</strong></td>';
                                                                    echo'<td><strong><div class="form-group"><div class="col-md-2"><input type="text" class="from control"name="itemPrice" value="'.$table->sell_price.'"/>'.$table->sell_price.'</div></div></strong></td>';
                                                                                                       
													echo'<td><input type="submit"  class="btn btn-primary" value="ADD"></button></td>';
													 echo '</form>';echo '</tr>';
												
                                                                                                 
                                                                                                // }
                                                }*/
												echo 'query line';
												?>
												
									        </tbody>
											
										</table>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /DATA TABLES -->
				
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
				</div>
			  </div>
			</div>
		  </div>
		<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
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
											<a href="#">Home</a>
										</li>
										
										<li>Company Invoice</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Invoice To Company: <?php  echo $company->Company_name; ?></h3>
									</div>
									<div class="description"></div>
                                                                        <div id="results"></div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<div class="row">
					        <div class="col-sm-7 ">
                                <a href="<?php echo base_url();?>invoices/search_email">
							    <button class="btn btn-default" >
						        <i class="fa fa-reply"></i> Back</button>
                       	         </a>
							
                            </div>
							<div class="col-md-5 pull-right">
										
												<span class="date-range pull-right">
												<form action="<?php echo base_url();?>invoices/search_comp_Date" method="post" enctype="multipart/form-data">
			
										            <div class="btn-group">											
													    <input type="button" class="js_update btn btn-default" onclick="showText(this)" value="Today"> 
												        <input type="button" class="js_update btn btn-default" onclick="showText(this)" value="Last 7 Days" > 
												        <input type="button"class="js_update btn btn-default" onclick="showText(this)" value="Last month" >
	                                                     <a class="btn btn-danger center" href="<?php echo base_url();?>invoices/view_inv/<?php echo$company->Company_id;?>"> See All</a>
											        </br></br>  
											From <input type="text" name="datepickerFrom" id="datepickerFrom"  required="required size="8" >
											To <input type="text" name="datepickerTo" id="datepickerTo"  required="required size="8" >
											<input type="hidden" name="company"  required="required" value="<?php echo $company->Company_id?>" >
<button type="submit" class="btn btn-primary pull-right">Search</button>

											</div>
											
											
											</form>
										
											
										</span>
                                       
                                             									
										</div>	
			            </div>
			            </br>
						
						
						
						<!-- USER PROFILE --><?php if ($this->session->flashdata('message')) 
                                                    { echo $this->session->flashdata('message'); }?>
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border">
									<div class="box-title">
										<h4><i class="fa fa-user"></i><span class="hidden-inline-mobile"><?php  echo $company->Company_name; ?></span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs user-profile">
											<ul class="nav nav-tabs">
											    <!----
											   <li><a href="#pro_edit" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile"> Email Invoice</span></a></li>
											   ------------------>
											   
											   <li class="active"><a href="#pro_overview" data-toggle="tab"><i class="fa fa-dot-circle-o"></i> <span class="hidden-inline-mobile">Invoice Overview</span></a></li>
											</ul>
											<div class="tab-content">
											   <!-- OVERVIEW -->
											<div class="tab-pane fade in active" id="pro_overview">
												<div class="row">
													    <!-- PROFILE PIC -->
														<div class="col-md-3">
													        <div class="col-md-12">
														        <div class="list-group">
														            <li class="list-group-item zero-padding">
															
														            </li>
														            <div class="list-group-item profile-details">
																        <h2><?php  echo $company->Company_name; ?></h2>
																            <p><i class="fa fa-circle text-green"></i> OK TO ORDER</p>
                                                                            <p>Notes :</p>
																            <p><?php  echo $company->notes; ?></p>
																            <p>Email: <?php  echo $company->email; ?></p>
																            <ul class="list">
                                                                                <li><i class="fa fa-phone"></i>  </iPhone <h4><?php  echo $company->Phone_number; ?></h4></li>
																   
																            </ul>
														            </div>
														        </div>														
													        </div>
															<div class="co112 profile-details">																
																<h3>Address </h3>
																<div class="row">
																	<div class="col-md-8 text-left">
																		<ul class="list">
                                                                                <li><i class="fa fa-home"></i>  </iPhone <h4><?php  echo $company->address1; ?></h4></li>
																                    <li><i class=""></i>  </iPhone <h4><?php  echo $company->address2; ?></h4></li>                                                 
                                                                                        <li><i class=""></i>  </iPhone <h4><?php  echo $company->County; ?></h4></li>
                                                                                <li><i class=""></i>  </iPhone <h4><?php  echo $company->postcode; ?></h4></li>
																        </ul>
																	
																    </div>
                                                                </div>
																
															</div>
														</div>	
													    <!-- /PROFILE PIC -->
													
														<!-- /ROW 1 -->
													<!-- PROFILE DETAILS -->
													<div class="col-md-8">
														<!-- ROW 1 -->
														<div class="row">
														
														<!-- /ROW 1 -->
														<div class="divide-40"></div>
														<!-- ROW 2 -->
														<div class="row">
															<div class="col-md-12">
															<div class="box border blue">
															<div class="box-title">
																<h4><i class="fa fa-columns"></i> </h4>	
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
																<div class="tabbable">
																	<ul class="nav nav-tabs">
																	   <li class="active"><a href="#sales" data-toggle="tab"><i class="fa fa-signal"></i> <span class="hidden-inline-mobile">Invoices</span></a></li>
																	  </ul>
																	<div class="tab-content">
																	   <div class="tab-pane active" id="sales">
                                                                            <div class="hidden pull-right hidden-xs">
														     <div class="btn-group">
															    <button class="btn btn-default" href="#box-config" data-toggle="modal" ><i class="fa fa-bars"></i> Email All </button>
															
                                                                                                        
														    </div>
												    	                    </div>
                                                                                                                                               
							                    <table id="datatable" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                               
											<thead>
												<tr>											
													<th>SO#</th>
													<th>Company</th>
													<th>Date</th>	
													<th>Due Date</th>	
                                                    <th>Status</th>
													<th>Email Invoice</th>
													<th> Detail </th>
											        <th> PDF </th>
                                                    <!---<th>Remove</th>--->
												</tr>
											</thead>
											    <tbody>
                                                                                            
                                                            <?php 
                                                                    $base_url = base_url();
                                                                        foreach ($company_items->result() as $table) {
                                                                                               {
 
												                            echo '<tr class="gradeX">';
                                                                                echo'<td><strong>SO-'.substr(sprintf('%06d', $table->salesorder_id),0,6).'</strong></td>';
																			             
                                                                                echo'<td><strong>'.$table->Company_name.'</strong></td>';
																				//echo'<td><strong>INV-'.substr(sprintf('%06d', $table->invoice_id),0,6).'</strong></td>';
													                            echo'<td><strong>'.$table->dateraised.'</strong></td>';
																				  echo'<td><strong>'.$table->due_date.'</strong></td>';
                                                                              			    //echo'<td><strong>'.$table->status.'</strong></td>';
																				echo'<td><button class="btn btn-xs  btn-success  pop-hover" data-title="Invoiced-Raised " data-content="invoice raised" data-original-title="" title=""><span><i class="fa fa-check"></i></span> <strong>' . $table->status . '</strong></button>';
                                                                                if ($table->sent === 'un-sent') { 
                                                   
                                                                                      echo ' </br><button class="btn btn-md     btn-danger  pop-hover" data-title="Not Sent " data-content="invoice raised but not emailed " data-original-title="" title=""><span><i class="fa fa-email"></i></span> <strong>unsent</strong></button></td> ';
                                                                                    } 
													                            elseif ($table->sent === 'sent') {              
                                                    
                                                                                     echo ' </br><button class="btn btn-sm  btn-success"> sent </button></td>';
													                                }
																						       // echo'<td><strong>'.$table->Description.'</strong></td>';
																					/*	echo'<td>
                                                                                        
											                                                
																							  <form action="'.  base_url().'invoices/send_pdf" method="post" enctype="multipart/form-data">
																								
                                                                                                     <input type="hidden" name="inv_id" value="'.$table->invoice_id.'"/>
                                                                                                         <input type="hidden" name="comp_id" value="'.$table->Company_id.'"/>
																										 <input type="hidden" name="comp_name" value="'.$table->Company_name.'"/> 
																										 <input type="hidden" name="date" value="'.$table->dateraised.'"/> ';
																										 
																						echo'				 
                                                                                                         <input type="hidden" name="emailTo" value="'.$company->email.'"/>
																										 <input type="submit" name="submit" value="Send Invoice" class="btn btn-yellow ">
                                                                                                            <!---button type="submit" class="btn btn-danger">Email</button-->
                                                                                                                </form>
											
                                                                                      

                                                                                                </td>';*/
																								echo'<form></form>';
																						/*echo    '<td>';
																						         //<form action="'.  base_url().'invoices/send_inv" method="post">
																						        
											                    echo    '<a href="'.  base_url().'invoices/send_inv/'. $table->invoice_id .'"> 
																								 <button class="btn btn-info" data-toggle="modal" data-target="#sent_inv_form">
																								 
																								 
																								  <input type="hidden" name="inv_id" value="'.$table->invoice_id.'"/>
																								 <i class="fa fa-pencil-square-o"></i>
																								 
																								 
																								 
																								Write</button>
																								 </form> 
																								 </td>';*/
																								 echo'<td>
                                                                                                             <div>        
															                                                     <form>                        
											                                                                         <a class="btn btn-danger"   href="'.  base_url().'invoices/send_inv/'. $table->invoice_id . '"><span class="fa fa-file fa-lg"></span>
																                                                    Click to Write</a>
											
                                                                                                                 </form>
                                                                                                             </div>
                                                                                                    </td>';
                                                                                            
																							
																							
																							    echo'<td>
												                                                        <div class="btn-group dropdown" style="margin-bottom:5px">
											                                                                 <a href="' . $base_url . 'invoices/view/' . $table->invoice_id . '"><button class="btn btn-primary">View Invoice</button></a>
											
											                                                            </div>
											                                                        </td>';
                                                                                                 //downdload PDF file       
                                                                                                echo'<td>
                                                                                                        <div>        
															                                                 <form>                        
											                                                                        <a href="'.  base_url().'invoices/pdf/'. $table->invoice_id .'"><span class="fa fa-file fa-lg"></span></a>
											
                                                                                                             </form>
											                                                             </div>
                                                                                                    </td>';
																							
																							
																							
																							
																							
                                                                                            //echo'<td><strong><div class="form-group"><div class="col-md-2">'.$table->Price.'</div></div></strong></td>';
                                                                                             													                                           
																							 /*  echo'<td>
																								        <form action="'.  base_url().'businesses/remove_item" method="post">
																								
                                                                                                            <input type="hidden" name="item_id" value="'.$table->invoice_id.'"/>
                                                                                                            <input type="hidden" name="comp_id" value="'.$table->Company_id.'"/>
                                                                                                         
                                                                                                            <button type="submit" class="btn btn-danger confirmation">Delete</button>
                                                                                                                </form></td>';*/
													
												                            echo '</tr>';
                                                                                                 
                                                                                                 }
                                                                }?>
												
											</tbody>
											
										</table>
																	   
																	   </div>
																	   <div class="tab-pane" id="feed">
																		
																	   </div>
																	</div>
																 </div>
															</div>
															</div>
															</div>
														</div>
														<!-- /ROW 2 -->
													</div>
													<!-- /PROFILE DETAILS -->
												  </div>
												  
												  
												  
												  
											   </div>
											</div>
											   <!-- /OVERVIEW -->
											   
											  
                                   
											</div><!----tab-content--->
										</div>
										
									</div>
								</div>
							</div>
						</div>
						
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
			</div>
		</div>
	
<div class="hidden" >
<!--add new-->
<div class="modal fade" id="sent_inv_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Email Invoice </h4>
            </div>
            <div class="modal-body">
                <?php
				  echo'<input type="text" name="inv_id" value="'.$table->invoice_id.'"/>';
               // echo form_open('invoices/send_pdf_input', 'class="form-horizontal "');
			     echo form_open('invoices/send_inv_form', 'class="form-horizontal "');
                 echo Modules::run('invoices/send_inv' );
				
                ?>
				
			
				

	
            
                 
<?php echo form_close(); ?>
            
               
        </div>
		
		
		
		
		
		<!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>
<!--add new-->
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
	<!-- DATA TABLES -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
		
	<!-- DATE RANGE PICKER -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- EASY PIE CHART -->
	<script src="<?php echo base_url();?>assets/js/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/easypiechart/jquery.easypiechart.min.js"></script>
	<!-- SPARKLINES -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/sparklines/jquery.sparkline.min.js"></script>
	<!-- UNIFORM -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/uniform/jquery.uniform.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo base_url();?>assets/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("dynamic_table");  //Set current page
		 App.setPage("invoices");
			App.init(); //Initialise plugins and elements
		});
	</script>
	<script>
		
                
                $(document).ready(function(){
	$('#datatable').dataTable();
        $('#datatable2').dataTable();
		  $('#datepickerFrom').datepicker();
		 $('#datepickerTo').datepicker();//select date   viola 20141226
});
	</script>
        <!-- this is for account update form -->
      <script type="text/javascript">
    var frm = $('#Accountform');
    frm.submit(function (ev) {
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                alert('Changes Have been Saved');
            }
        });

        ev.preventDefault();
    });
</script>




	<!-- /JAVASCRIPTS -->
        
         <script type="text/javascript"> 
             
    $( ".sorting_1" ).bind( "submit", function(ev) {

    var frm1 = $('#additem');
    frm1.submit(function (ev) {
       
        $.ajax({
            type: frm1.attr('method'),
            url: frm1.attr('action'),
            data: frm1.serialize(),
            success: function (data) {
                alert('Item  added');
            }
        });
});
        ev.preventDefault();
    });
</script>
	<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure to delete it?');
    });
</script>
</body>
</html>      
