<html>
<head>	
	
	<title>Crown | Send Invoices</title>
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
</head>
<body>
<?php echo Modules::run('template/dash_head'); ?>
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
                                    <a href="<?php echo base_url(); ?>">main</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>/invoices">Invoices </a>
                                </li>

                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left">Un-Sent Invoices from <strong><?php  echo $_POST['datepickerFrom'].'</strong> To <strong>'.$_POST['datepickerTo'];     ?></strong></h3>
                            </div>
                            <div class="description">All Invoices </div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->


                <!-- customer add-->
                <div class="row">
                    <div class="col-sm-8 ">
                        <div >

                            <!-- /BREADCRUMBS -->
							<div class="clearfix">
                                     </div>
							

                        </div>
                    </div>
                </div>
                <!-- /customer add -->
                        <div class="row">
					        <div class="col-sm-8 ">
                                <a href="<?php echo base_url();?>invoices">
							    <button class="btn btn-default" >
						        <i class="fa fa-reply"></i> Back</button>
                       	         </a>
							
                            </div>
			            </div>

                <div class="separator"></div>
                <!-- DATA TABLES -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BOX -->
                        <div class="box border pink">
                            <div class="box-title">
                                <h4><i class="fa fa-gbp fa-fw"></i>Invoices List</h4>
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
							    <div class="clearfix">
                                
								</div>
                                </br>	
								
                                <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
										<!---
										   <th>Invoice #</th>
											<th>SO #</th>
                                            <th>Company							
											</th>
                                            <th> PO No: </th>
                                            <th>Date Raised</th>
                                            <th class="hidden-xs">Total Inc VAT</th>
                                            
                                            <th width="15%"> Status </th>
                                            <th> Change </th>
											<th> Download </th>
                                        </tr>
										-->
										<th>Invoice</th>
										<th>Company</th>
													
													
													<th>Date</th>												
													<th>SO#</th>
                                                    <th>Status</th>
													<!---
													<th  width="15%" >Description</th>
													
													<th>Email Direct</th>
													--->
													<th>Email Invoice</th>
													<th>Email </th>
													<th> Detail </th>
											        <th> PDF </th>
                                                    
                                    </thead>
                                    <tbody>

                                        <?php
                                        $base_url = base_url();
                                        foreach ($inv_date->result() as $table) {


                                           
                                            echo '<tr class="gradeX">';
                                                                                echo'<td><strong>INV-'.$table->invoice_id.'</strong></td>';             
                                                                                echo'<td><strong>'.$table->Company_name.'</strong></td>';
																				
													                            echo'<td><strong>'.$table->dateraised.'</strong></td>';
                                                                                echo'<td><strong>SO-'.$table->salesorder_id.'</strong></td>';
																						   ///////// status begings /////////////////////
                                     
                                                                                if ($table->status === 'invoiced') {
                                                                                    echo'<td><button class="btn btn-xs  btn-success  pop-hover" data-title="Invoiced-Raised " data-content="invoice raised" data-original-title="" title=""><span><i class="fa fa-check"></i></span> <strong>' . $table->status . '</strong></button>';
                                                                                if ($table->sent === 'un-sent') 
                                                                                    {
                                                    
                                                                                         echo ' </br><button class="btn btn-md     btn-danger  pop-hover" data-title="Not Sent " data-content="invoice raised but not emailed " data-original-title="" title=""><span><i class="fa fa-email"></i></span> <strong>unsent</strong></button>
																						 </td> ';
                                                                                    } 
													                            elseif ($table->sent === 'sent') 
                                                                                   {                                                    
                                                                                        echo ' </br><button class="btn btn-sm  btn-success"> sent </button></td>';
                                                                                    }

                                                                                }elseif ($table->status === 'paid') {
                                                                                    echo'<td>
												                                         <button class="btn  btn-success ><span><i class="fa fa-check"></i></span> <strong>' . $in->status . '</strong>
														                                 </button>
													                                    </td>';
                                             
                                                                                    }
                                                                                elseif ($table->status === 'PART PAID'){
                                                                                    echo'<td>
												                                        <button class="btn btn-xs  btn-success  pop-hover" data-title="Invoiced-Raised " data-content="invoice raised" data-original-title="" title=""><span><i class="fa fa-check"></i></span> <strong>' . $table->status . '</strong>
														                                </button>
													                                     </td>';
                                             
                                                                                    }

                                                                               if ($table->status === 'cancelled') {
                                                                                   echo'<td>
												                                             <button class="btn btn-danger pop-hover" data-title="cancelled " data-content="order cancelled" data-original-title="" title=""><span><i class="fa fa-cross"></i></span> <strong>' . $table->status . '</strong>
														                                     </button>
													                                    </td>';
                                                                                    }
                                            ////////////////// status ends////////////////////////////////////
																						      //  echo'<td><strong>'.$table->Description.'</strong></td>';
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
																						echo    '<td>';
																						         //<form action="'.  base_url().'invoices/send_inv" method="post">
																						        
											                    echo    '<a href="'.  base_url().'invoices/send_inv/'. $table->invoice_id .'"> 
																								 <button class="btn btn-info" data-toggle="modal" data-target="#sent_inv_form">
																								 
																								 
																								  <input type="hidden" name="inv_id" value="'.$table->invoice_id.'"/>
																								 <i class="fa fa-pencil-square-o"></i>
																								 
																								 
																								 
																								Write</button>
																								 </form> 
																								 </td>';
																								 echo'<td>
                                                                                                             <div>        
															                                                     <form>                        
											                                                                         <a href="'.  base_url().'invoices/send_inv/'. $table->invoice_id .'"><span class="fa fa-file fa-lg"></span>
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
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
										   
											<th>Invoice</th>
										<th>Company</th>
													
													
													<th>Date</th>												
													<th>SO#</th>
                                                    <th>Status</th>
													<!---
													<th  width="15%" >Description</th>
													
													<th>Email Direct</th>
													--->
													<th>Email Invoice</th>
													<th>Email </th>
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
</div>
</section>


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





<!--add new-->
<div class="modal fade" id="dateinput" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">New Sales Order</h4>
            </div>
            <div class="modal-body">
			        
			
			
			
			
                   <form action="<?php echo base_url();?>invoices/filterByDate" method="post" enctype="multipart/form-data">
                             <div class="box-body">
								    
									<div class="form-group">
                                            <label class="col-md-12 control-label">Date for test (invoice php):</label>
										    <div class="col-md-8 pull-left">
                                                    From<input name="datepickerFrom" id="datepickerFrom" class="form-control datepicker"  size="10" >
					                                To<input name="datepickerTo" id="datepickerTo" class="form-control datepicker"  size="10" >
                                            </div>                
                                                                 
                                    </div>
												
						    </div>                                                           
                    
        
         <!----select name="payment" id="e1" class="col-md-6 form-control" required="required" >
                           
             <option value="PART PAID">PART PAID</option>
             <option value="paid">PAID</option>
         </select><br>
        
        <input type="text" class="form-control" name="amount" id="amount_paid" value=""/><br>
          <select name="method" id="e1" class="col-md-6 form-control" required="required" >
             <option>--Please Select --</option>
              <option>CASH</option>
             <option>Credit/Debit card</option>
             <option>BACS</option>
             <option>CHEQUE</option>
             <option>PAYPAL</option>
             <option>MONEY BOOKERS</option>
             
         </select------->
        <?php 
       // $datestring = " %Y-%m-%d";
//$time = time();

//$dateraised =  mdate($datestring, $time);
        ?>

               
			   <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
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

<!-- /.modal -->


<div class="modal fade" id="addBookDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">to invoice </h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('salesorders/to_invoice');?>
             <p>Convert to Invoice</p>
             <input type="text" name="salesid" readonly="readonly" id="bookId" value=""/>
        <input type="text" name="bookId" readonly="readonly" id="bookId" value=""/>
         <input type="text" name="c" readonly="readonly" id="bookId" value=""/>
            <button type="submit" class="btn btn-primary">Invoice </button>
            </div><div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<!-- /.shipped -->
<div class="modal fade" id="addBookDialog1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"> Shipped </h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('status/pending_to_shipped');?>
             <p>ARE YOU SURE</p>
        <input type="hidden" name="salesid" readonly="readonly" id="bookId" value=""/>
            <button type="submit" class="btn btn-primary">Packed and Dispatched </button>
            </div><div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>




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
        App.setPage("forms");  //Set current page
        App.init(); //Initialise plugins and elements
    });

    jQuery(document).ready(function() {
         App.setPage("dynamic_table");  //Set current page
		 App.setPage("invoices"); 
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

