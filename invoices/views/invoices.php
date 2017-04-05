<?php  //echo Modules::run('template/dash_head'); ?>
<!--20121222 viola -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
<!-- DATE RANGE PICKER -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
<!-- JQGRID
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jqgrid/css/ui.jqgrid.min.css" />
 -->	
<!--20121222 viola -->	
<!-- FULL CALENDAR -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/fullcalendar/fullcalendar.min.css" />	
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

<script language="JavaScript" type="text/javascript">
function showText(obj)
{

//previousweek= new Date(firstDay.getTime() - 7 * 24 * 60 * 60 * 1000);

date = new Date().toLocaleDateString().split("/")
date[0].length == 1 ? "0" + date[0] : date[0]//date
date[1].length == 1 ? "0" + date[1] : date[1]//month
//date = date[1] + "/" + date[0] + "/" + date[2];
date = date[0] + "/" + date[1] + "/" + date[2];


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
//d = d[1] + "/" + d[0] + "/" + d[2];
d = d[0] + "/" + d[1] + "/" + d[2];	
	
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
document.getElementById('datepickerFrom').value=date;
document.getElementById('datepickerTo').value=date;
//document.getElementById('mytext').style.display='block';
document.getElementById('datepickerFrom2').value=date;
document.getElementById('datepickerTo2').value=date;

obj.value='Today';
}
if(obj.value=='Last 7 Days')
{
document.getElementById('datepickerFrom').value=showdate(-7);
document.getElementById('datepickerTo').value=date;
document.getElementById('datepickerFrom2').value=showdate(-7);
document.getElementById('datepickerTo2').value=date;
//document.getElementById('mytext').style.display='none';
//obj.value='Show';
}
else if 
(obj.value=='Last month')
{
document.getElementById('datepickerFrom').value=showdate(-30);
document.getElementById('datepickerTo').value=date;
document.getElementById('datepickerFrom2').value=showdate(-30);
document.getElementById('datepickerTo2').value=date;
//obj.value='Show';
}
return;
}
 

</script>





</head>
<body>
<?php //echo Modules::run('template/dash_head'); ?>
<?php echo Modules::run('template/menu'); ?>

<div id="main-content">
    <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Box Settings</h4>
                </div>
                <div class="modal-body">
                    Here goes box setting content.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
                                    <a href="<?php echo base_url(); ?>">Main</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/invoices">Invoices </a>
                                </li>

                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left">Invoices</h3>
                            </div>
                            <div class="description">All Invoices </div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->

<!-- DATE RANGE PICKER -->
                		
                               

                    <!--tool------->
                                <div class="row">
					                <div class="col-md-12">
									<!---
									        <div class="col-md-2">
											<a class="btn-lg btn-danger pop-hover" data-title="Update Corrected VAT AMOUNT! " data-content="Once you change cost, please click it to update" data-original-title="" title="" href="<?php echo base_url();?>invoices/update_vat_n_total">Update All SO </a>
														
											</div>
											--->
									        <div class="col-md-6 ">
												<div class="text-left">
													<div class="btn-group">
											            
														<a class="btn  btn-pink" href="<?php echo base_url();?>index.php/invoices/invoices_sent">Sent Invoices</a>
														
														<a class="btn btn-pink" href="<?php echo base_url();?>index.php/invoices/invoices_unsent">Un-sent Invoices</a>
													    
													</div>
												</div>
											</div>
		                                    <form></form>									
											<div class="col-sm-4 pull-right">
										
												<span class="hidden date-range pull-right">
											        <form action="<?php echo base_url();?>invoices/search" method="post" enctype="multipart/form-data">
			
										            <div class="btn-group">
	                                                     </br></br>
											            From <input type="date" name="datepickerFrom" id="datepickerFrom2"  required="required size="8" >
											            To   <input type="date" name="datepickerTo" id="datepickerTo2"  required="required size="8" >
											               <input type="hidden"  readonly="readonly"  name="status" value="invoiced"  >
                                                        <button type="submit" class="btn btn-primary pull-right">Search</button>

											           
											        </div>
											        </form>
										        </span>
                                        		<div class="">
										
														
								<!-- BOX COLLAPSED-->
								<div class="box border green">
									<div class="box-title ">
										<h4><i class="fa fa-search-plus"></i>Search</h4>
										<div class="tools">
											<a href="#box-config" data-toggle="modal" class="config">
												<i class="fa fa-cog"></i>
											</a>
											<a href="javascript:;" class="reload">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="javascript:;" class="expand">
												<i class="fa fa-chevron-down"></i>
											</a>
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									<div class="box-body" style="display:none">
										<div class="scroller" data-height="150px" data-width="100px" data-rail-visible="1">
								        <form action="<?php echo base_url();?>index.php/invoices/search" method="post" enctype="multipart/form-data">
			
											<span class="date-range pull-right">
										        <div class="btn-group">											
													    <input type="button" class="js_update btn btn-info" onclick="showText(this)" value="Today"> 
												        <input type="button" class="js_update btn btn-info" onclick="showText(this)" value="Last 7 Days" > 
												        <input type="button"class="js_update btn btn-info" onclick="showText(this)" value="Last month" >
	                                            </div>
											</br></br>
											From <input type="text" name="datepickerFrom" id="datepickerFrom"   size="10" >
											To <input type="text" name="datepickerTo" id="datepickerTo"   size="10" >
											
                                                     <input type="hidden"  readonly="readonly"  name="status" value="invoiced"  >
                                                    
											</br></br>
											<button type="submit" class="btn btn-block btn-success"><i class="fa fa-search-plus"></i></button>
										    </span>
                                          </form>	

										</div>
									</div>
								</div>
								<!-- /BOX COLLAPSED-->
					   
                                        
                                             									
										        </div>	
									
                                             									
										</div>	
												<div class="divide-20"></div>

									</div>
								
								</div>
									
									
                     <!--tool---end---->




                <div class="separator"></div>
                <!-- DATA TABLES -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BOX -->
                        <div class="box border pink">
                            <div class="box-title">
                                <h4><i class="fa fa-gbp fa-fw"></i> Invoices List :
								    <?php if (!empty($date) && (is_array($date))){
									echo ' From  <font color="yellow">'.$date[0].'</font> To <font color="yellow">'.$date[1].'</font>';}
									?>  
								</h4> 		
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
							     <!-- /BREADCRUMBS -->
								 
								 
								 <!---
							    <div class="clearfix">
                                <button class="btn btn-info" data-toggle="modal" data-target="#sales_order"><i class="fa fa-pencil-square-o"></i> Select All </button>
			                    								</div>
								-->
                                </br>	
								
                                <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
										     <!-----
										    <th>Select</br><input id="chkAllFiles" type="checkbox" title="All Files" onchange="selectAllFiles(this.checked);" /></th>
                                            
											<th>Invoice #</th>-->
											<th width="10%">SO#</th>
                                            <th>Company							
											</th>
                                            <th> PO No: </th>
                                            <th width="10%">Date Raised</th>
                                           
											<th >Total Inc VAT</th>
                                            
                                            <th> Status </th>
                                            <th width="15%"> Detail </th>
											<th> PDF </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $base_url = base_url();
                                        foreach ($invoices->result() as $in) {
	                                        

/*for duedate update											$due_day= date('Y-m-d', strtotime('+30days', strtotime( $in->dateraised)));
                                             $so_status = array('due_date' => $due_day,);
											 
											 $this->db->where('salesorder_id', $in->salesorder_id)
                                                      ->update('invoices', $so_status);
													  
	*/												  
													  
                                             $invoice_id=substr(sprintf('%05d', $in->invoice_id),0,5);
                                           $salesorder_id=substr(sprintf('%05d', $in->salesorder_id),0,5);
                                           
                                            echo '<tr class="gradeX">';
											//echo '<td><div><input id="INV-' . $in->invoice_id . '"type="checkbox" ></div></td>';
                                            // echo'<td>INV-' . $invoice_id . '</td>';
											echo'<td>SO-' . $salesorder_id . '</td>';
                                            echo'<td>' . $in->Company_name . '</td>';
                                            echo'<td>' . $in->po_number . '</td>';
                                            echo'<td>' . $in->dateraised . '</td>';
										
										
											echo'<td>£' . $in->inc_vat . '</td>';
                                            
                                           
                                            ///////// status begings /////////////////////
                                     
                                            if ($in->status === 'invoiced') {
                                                echo'<td><div class="col-md-12">
												        <a class="btn btn-md  btn-success btn-icon pop-hover"  data-title="Invoiced-Raised " data-content="invoice raised" data-original-title="" title=""><span><i class="fa fa-check"></i></span> ' . $in->status . '';
                                                if ($in->sent === 'un-sent') 
                                                    {
                                                    
                                                    echo ' <span class="label label-right label-danger tip-left"  title="Not Sent " title-content="invoice raised but not emailed "  ><i class="fa fa-email"></i>unsent</span> ';
                                                    } 
													elseif ($in->sent === 'sent') 
                                                    {
                                                    
                                                    echo ' <span class="label label-right label-success tip-right" title="Not Ready">sent </span>';
													 }
													 echo '    </a></div>
													</td>';
                                               
                                                
                                                
                                                
                                            }elseif ($in->status === 'paid') {
                                                echo'<td>
												        <button class="btn  btn-sm btn-block btn-info" ><span><i class="fa fa-check"></i></span> ' . $in->status . '
														</button>
													</td>';
                                             
                                            }
                                            elseif ($in->status === 'PART PAID'){
                                                echo'<td>
												        <button class="btn btn-sm btn-block btn-warning  pop-left" data-title="Invoiced-Raised " data-content="invoice raised" data-original-title="" title=""><span><i class="fa fa-check"></i></span> ' . $in->status . '
														</button>
													</td>';
                                             
                                                     }

                                            if ($in->status === 'cancelled') {
                                                echo'<td>
												        <button class="btn btn-sm btn-block btn-danger pop-left" data-title="cancelled " data-content="order cancelled" data-original-title="" title=""><span><i class="fa fa-cross"></i></span> ' . $in->status . '
														</button>
													</td>';
                                            }
                                            ////////////////// status ends////////////////////////////////////
                                            // action button 
                                           
                                                echo'<td>
												         <div class="btn-group dropdown" style="margin-bottom:5px">
											                   <button class="btn btn-info ">Action</button>
											                    <button class="btn btn-pink dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
											                    </button>
											
											                        <ul class="dropdown-menu">
											                            <li class="divider"></li>
																		<li>
											                                <a target="_blank" class="btn btn-danger"  href="' . $base_url . 'index.php/invoices/view/' . $in->salesorder_id . '">View </a>
											                            </li>
																		<li class="divider"></li>
																		<li>                        
											                                <a target="_blank" class="btn btn-danger"   href="'.  base_url().'index.php/invoices/send_inv/'.  $in->invoice_id . '"   target="_blank"   >Email </a>
																                                                    
											                            </li>
																						
											                            <li class="divider"></li>
											                            
											                        </ul>
											                </div>
														 
														 
														 
														 
														
											        </td>';
                                            //downdload PDF file       
                                                echo'<td>
                                                    <div>        
															<form>                        
											          		<a target="_blank" href="'.base_url().'index.php/salesorders/invoice_pdf/'. $in->invoice_id .'"><span class="fa fa-file fa-lg"></span></a>
											
                                                            </form>
											        </div>
                                                </td>';


												   }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
										    
											<th>SO#</th>
                                            <th>Company							
											</th>
                                            <th> PO No: </th>
                                            <th>Date Raised</th>
                                            <th class="hidden-xs">Total Inc VAT</th>
                                            
                                            <th > Status </th>
                                            <th> Detail </th>
											<th> PDF </th>
											
                                        </tr>
                                    </tfoot>
									
                                </table>
								

                            </div>
                        </div>
                        <!-- /BOX -->
                    </div>
                </div>
                <!-- /DATA TABLES -->



                <div class="separator"></div>

                <div class="footer-tools">
                    <span class="go-top">
                        <i class="fa fa-chevron-up"></i> Top
                    </span>
                </div>
            </div><!-- /CONTENT-->
        </div>
    </div>

	<!--search by date-->
<div class="modal fade" id="filter_date" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
		
            <form action="<?php echo base_url();?>invoices/filterByDate" method="post" enctype="multipart/form-data">
			            <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Email Un-Sent Invoices</h4>
                        </div>
			                
						    
                    <div class="modal-body">
					        <div class="box border pink">
					            <div class="row"> 
                                      
								    <div class="col-md-12 center ">
								    
									    <div class="form-group">

		-
										    <!-- /DATE RANGE PICKER -->
										   
										        <div class="col-sm-12 ">
 <label class="col-md-1 control-label col-sm-offset-2"><h4>Date:</h4></label></br>
											            <div class="btn-group col-md-4">
													         From <input type="text"name="datepickerFrom" id="datepickerFrom"   size="15"required="required"  >
													
					                                         To <input name="datepickerTo" id="datepickerTo"  size="15"required="required"  >
                                                             </br></br>
															<div class="btn-group col-md-10 col-md-offset-2">
													        <input type="button" class="js_update btn btn-default" onclick="showText(this)" value="Today"> 
												            <input type="button" class="js_update btn btn-default" onclick="showText(this)" value="Last 7 Days" > 
												            <input type="button" class="js_update btn btn-default" onclick="showText(this)" value="Last month" >												       
												            </div>  </br></br> 
											            </div>
													
													<br><br>
											    </div>                
                                                              
                                        </div>
									</div>
									
									
									<div class="col-md-12 center"><div class="separator"></div>
								<label class="col-md-1 control-label col-sm-offset-2"><h4>Company:</h4></label><br>
								
                                    <select name="company" id="e3" class="col-md-5 col-md-offset-1 " >
                                        <option></option>
                                            <option>N/A</option>
                                <?php
								
								$this->db->select('*');
								$this->db-> where('sent','un-sent');
                                        $this->db-> group_by('Company_id');
                                        $this->db->from('invoices');
                                        $query=$this->db->get();
								$num_rows = $query->num_rows();
								
								

										//echo form_open('invoices/filterByDate', 'class="form-horizontal "');
                                          $base_url = base_url();
										  
                                            foreach ($query->result() as $company) {
								
								
                              

                                    echo '<option  value="' . $company->Company_id . '">' . $company->Company_name . '</option>  ';
                                }
                                ?>

                                    </select>	
									 <br><br>
						         </div>
									
									
								
								 </div>
                            </div>
						    
                    </div>   
			       
						<div class="modal-footer">
			   
			                    <div class="form-group">
					                <div class="col-md-8 pull-left">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
					            </div>
				        </div>
					</div>
            </form>
			
           
            <!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<!--search by date-->
	
	


<!--add new-->
<div class="modal fade" id="sales_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">New Sales Order</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('salesorders/add_so', 'class="form-horizontal "');
                echo Modules::run('salesorders/add_new');
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<!--add new-->

<!--viola tes------------->
<div class="modal fade" id="inv_by_date" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">New Sales Order</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('invoices/get_inv_date', 'class="form-horizontal "');
                echo Modules::run('invoices/filter_dateForm0111');
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<!--add new-->



<div class="modal fade" id="send_inv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">email </h4>
            </div>
			    <div class="modal-body">
				     
				         <?php
                echo form_open('invoices/filterByDate', 'class="form-horizontal "');
                echo Modules::run('invoices/filter_dateForm');
                ?>
                          <form>

                                    <label class="col-md-4 control-label">Company Name</label> 
                                        <div class="col-md-8">

                                            <select name="company" id="e1" class="col-md-12" required="required" onchange="showUser(this.value)">
                                                <option></option>
                                                    <option>test</option>
					
					
					
					
                                                     <?php
                           // echo form_open('salesorders/send_inv', 'class="form-horizontal "');
                           // echo Modules::run('salesorders/add_inv');
						   					
								                  foreach ($invoices->result()as $inv) {
  							                    //foreach ($company->result()as $company) {
                                                    
													
                                                     echo '<option  value="' . $inv->Company_id . '">' . $inv->Company_name . '</option>  ';
													//echo '<option  value="' . $company->Company_id . '">' . $company->Company_name . '</option>  ';
													
													 echo'<a href="'.$base_url.'invoices/com_inv_view/'.$inv->Company_id.'"  ></a>';
                                        
										
										}
			            ?>                           
						                   </select>
										   
										  
						
						
								
													
                                             <div id="txtHint"><b>Address info will be listed here.</b></div>
											 <?php ?>
                                        </div>
                                       
                               
                            
				
				
				
				
				
				
                <?php
               /// echo form_open('salesorders/add_so', 'class="form-horizontal "');
                //echo Modules::run('salesorders/add_new');
                ?>
            </div>
            
			<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
		
			    <!-- /.modal-content --
                <div class="modal-body">
                    <?php echo form_open('invoices/emailxx'); ?>
                        <p>please input the id</p>
                            <input type="text" name="id"  id="bookId" value=""/><br>
                
                
                        <br>
                        <button type="submit"form_close class="btn btn-primary">Email Invoice </button>
                </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                         <?php //echo (); ?>
                 
                </div>
				-- /.modal-content -->
				</form>
				
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>



<!-- /.modal -->



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


<!-- JQGRID 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqgrid/js/grid.locale-en.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqgrid/js/jquery.jqGrid.min.js"></script>
-->	
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
         App.setPage("dynamic_table");  //Set current page
		 App.setPage("invoices"); 
	  // App.setPage("jqgrid_plugin");  //Set current page
        App.init(); //Initialise plugins and elements
    });

    $(document).ready(function() {
        $('#datatable1').dataTable();
		 $('#datatable2').dataTable();
        $('#datepicker').datepicker();
		 $('#datepicker2').datepicker({minDate: -1, maxDate: "+1"});//select date   viola 20141226
		 $('#datepickerFrom').datepicker();
		 $('#datepickerTo').datepicker();//select date   viola 20141226
		  $('#datepickerFrom2').datepicker();
		 $('#datepickerTo2').datepicker();
    });

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

