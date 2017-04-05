<head>

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
        frm.submit();
    }
    window.onload = myfunc;
</script>
</head>
<body>

<?php //echo Modules::run('template/menu'); ?>

<div id="">
    
    <div class="container">
        <div class="row">
            <div id="content-" class="col-sm-10 col-md-offset-1">
                <!-- PAGE HEADER-->
                <div class="hidden row">
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
                                    <a href="<?php echo base_url(); ?>/salesorders">Sales Orders</a>
                                </li>
								

                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left">Sales Orders</h3>
                            </div>
                            <div class="description">All Sales Orders</div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->


                <!-- customer add-->
                <div class="row">
			
								<div class="hidden col-md-12">
										   
										<div class="col-md-4">
											<div class="text-left">
												<div class="btn-group">
													    <div class="col-md-12">
								<!-- BOX-->
								<div class="box border lite">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>Toolbar</h4>
										
									</div>
									<div class="box-body center">
											<div class="btn-group" style="float: none;">
											    <div class="box-body big ">
										            <div class="btn-toolbar ">
											            <div class="btn-group dropdown">
														    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
													        <span class="fa fa-plus"></span>
												            </button>
												            <ul class="dropdown-menu context pull-right" style="text-align: left;">
													        <!--
															<li>
														        <a data-toggle="modal"  data-target="#sales_order">
														             <i class="fa fa-plus-square"></i>
															        Add New Sales Order
														        </a>
											            
													        </li>
															-->
													          <li>
														        <?php echo '<form  action="' . base_url().'salesorders/add_so" method="POST">';
																      echo'  
																	         <input type="hidden" name="buyer_name" value=" "/>
																			 <input type="hidden" name="company" value="1"/>
                                                                             <input type="hidden" name="status" value="pending"/>                 
																
														           
															        
														            <button type="submit" > <i class="fa fa-plus-square"></i> Add New Sales Order </button> ';
											                   
																 echo '</form>'; ?>
													        </li>
													        <li>
														       <a data-toggle="modal" data-target="#box-import">
														           <i class="fa fa-upload"></i>
															 Import file of C.E distributors</a>
											                 
													        </li>
													     
												            </ul>
												        </div>
												        <div class="btn-group dropdown">
											                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
											                   
															        <i class="fa fa-print"></i>
											                     
											                    </button>
											                    <ul class="dropdown-menu context">
											                    <?php echo '
											                                                              <li><a class="btn btn-default" ><a href="'.  base_url().'salesorders/packing_slip_today"><button class="btn btn-default" > 
																										                                  Crown Packing Slip  </button></a> </li>';
											                                                             
											                                                                    /*<form  action="' . base_url() . 'salesorders/packing_slip_today" method="post">
                                                                                                                        <input type="hidden" name="sales_id" value="' . $so->salesorder_id . '"/>
                                                                                                                        <input class="btn btn-default"type="submit"   value="Crown Packing Slip "/>
                                                                                                                 </form>*/
													                                                            
											                                                               
                                                                                                     
                                                                                                           echo ' <li class="divider"></li>                      
   
                                                                                                                <li>
											                                                                        <a href="'.  base_url().'salesorders/dir_packing_slip_today/"><button class="btn btn-default" > Direct Packing Slip  </button></a>
											                                                                    </li>
																												
																												';?>
											                    </ul>
										                 </div>
												        <div class="btn-group dropdown">
											                    <button class="btn btn-info  dropdown-toggle" data-toggle="dropdown">
											                   
											                     <span class="fa fa-gear"></span>
											                    </button>
											                    <ul class="dropdown-menu context">
											                    <li>
											                        <a class="btn-lg btn-danger pop-hover" data-title="Update Corrected VAT AMOUNT! " data-content="Once you change cost, please click it to update" data-original-title="" title="" href="<?php echo base_url();?>salesorders/update_vat_n_total">Update All SO </a>
											
											                    </li>
											                    
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
											</div>
											
											
											
											
											

                                        </div>
 										
											    <div class="col-md-6">
											        <div class="btn-group">	
													
														</br>
														<a class="btn btn-default" href="<?php echo base_url();?>salesorders/order_onhold">Orders on Hold</a>
														<a class="btn btn-default" href="<?php echo base_url();?>salesorders/order_pending">Pending Orders</a>
														
														
														
														<a class="btn btn-default" href="<?php echo base_url();?>salesorders/order_shipped">Shipped Orders</a>
														
													</div>	
												</div>
										<div class="col-md-4 pull-right">
										<form action="<?php echo base_url();?>salesorders/filterByDate" method="post" enctype="multipart/form-data">
			
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
										</div>	
										 
												
										<div class="divide-20"></div>

											
                                    </div>
									
                <!-- /customer add -->


                <div class="separator"></div>
				
				
					
                <!-- DATA TABLES -->
                <div class="row">
                    <div class="">
                        <!-- BOX -->
                        <div class="box border blue">
                            <div class="box-title">
                                <h4><i class="fa fa-pencil-square-o fa-fw"></i>Sales Orders List</h4>
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
                                <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th>SO#</th>
                                            <th>Company</th>
                                            <th> PO Number </th>
                                            <th>Billing Address1</th>
                                            <th>Billing Postcode</th>
                                            <th>Date Raised</th>
											<th>Receiver</th>
											<th> Shipping  Address1 </th>
                                            <th>Shipping Postcode</th>
                                            <th> Status </th>
                                            <th> Change </th>
											 <th> PDF </th>
										
									   </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $base_url = base_url();
                                      $i=2;
									
                                        foreach ($salesorders->result() as $so) {
                                           // $originalDate = $so->dateraised;
                                           // $newDate = date("y-m-d", strtotime($originalDate));
                                           // $id = $so->salesorder_id;
                                               $id = substr(sprintf('%06d', $so->salesorder_id),0,6);
											   
											   
											   $this->db->where('sales_orders_rev', $so->salesorder_id);
                                                $query=$this->db->get('sales_orders');      
                                                 $num_rows = $query->num_rows();
                                            echo '<tr class="gradeX">';
											if ($so->backorder === 'YES'){ //if split order

											   
											
											    if ($so->sales_orders_rev_num===null){ //if first of split order
												
												    echo'  <td>SO-' . $id . '</td>';
												}
												else{
													$sales_orders_rev_num = substr(sprintf('%02d', $so->sales_orders_rev_num),0,2);
                                                    echo'  <td>SO-' . substr(sprintf('%06d', $so->sales_orders_rev),0,6) . '-'. $sales_orders_rev_num.' </td>';
												    }//echo'  <td>SO-' . $so->sales_orders_rev . '-'. $i++.' </td>';

											   } 
											else { 
											 
											    if (($so->sales_orders_rev_num==='1')&&($num_rows>'1')) //if first of split order
												{   
												    
												    echo'  <td>SO-' . $id . '-'. substr(sprintf('%02d', $so->sales_orders_rev_num),0,2).' </td>';
												}
												else
	                                                echo'<td>SO-' . $id . '</td>';
                                            }  
											  
											
											echo'<td>' . $so->Company_name . '</td>';
                                            echo'<td>PO-' . $so->po_number . '</td>';
                                            echo'<td>' . $so->Address_1 . '</td>';
											echo'<td>' . $so->Postcode . '</td>';

											
											 echo'<td>' . $so->dateraised . '</td>';
											  echo'<td>' . $so->ShipToCompanyName . '</td>';
											 echo'<td>' . $so->ship_Address_1 . '</td>';
											 
											 echo'<td>' . $so->ship_Postcode . '</td>';
                                        
                                           
										/*	 
											echo'<td>£' . $so->Subtotal_total . '</td>';
                                            echo'<td>£' . $so->inc_vat . '</td>';
                                            
										*/	 
											 echo'<td>';
                                            ///////// status begings /////////////////////
                                             if ($so->status === 'onhold') {


                                                echo '<a data-toggle="modal" data-id="' . $so->salesorder_id . '" title="Order on Hold" class="open-AddBookDialog btn btn-info" href="#onholdDialog"><span><i class="fa fa-times-circle"></i></span> On Hold</a>
                                                      ';
                                                //echo'<button class="btn btn-info pop-hover" title=""  data-id="' . $so->salesorder_id . '" data-toggle="modal" data-target="#toinvoice"> <span><i class="fa fa-truck"></i></span> ' . $so->status . '</button>';
                                            }
											 if ($so->status === 'pending') {
                                                echo '<a data-toggle="modal" data-id="' . $so->salesorder_id . '" data-id2="' . $so->so_notes . '"title="Pending" class="open-AddBookDialog btn btn-default" href="#addBookDialog1"><span><i class=""></i></span> Pending</a>';
                                  
                                                // echo'<td><button class="btn btn-warning pop-hover" data-title="PENDING " data-content="This  order is still to be confirmed " data-original-title="" title="">' . $so->status . '</button></td>';
                                            }
                                             if ($so->status === 'shipped') {


                                                echo '<a data-toggle="modal" data-id="' . $so->salesorder_id . '" title="Item Shipped" class="open-AddBookDialog btn btn-primary" href="#addBookDialog"><span><i class="fa fa-truck"></i></span> Shipped</a>';
                                                     
                                                }
                                             if ($so->status === 'invoiced') {
                                                echo'<button class="btn btn-inverse pop-hover" data-title="Invoiced " data-content="invoice raised" data-original-title="" title=""><span><i class="fa fa-check"></i></span> ' . $so->status . '</button>';
                                              }

                                             else  if ($so->status === 'cancelled') {
                                                echo'<button class="btn btn-danger pop-hover" data-title="cancelled " data-content="order cancelled" data-original-title="" title=""><span><i class="fa fa-cross"></i></span> ' . $so->status . '</button>';
                                            }
                                            echo'</td>';
											////////////////// status ends////////////////////////////////////
                                            // action button 
                                            
											
											if ($so->status === 'invoiced') {
                                                    echo'<td><div class="btn-group dropdown">
											            <button class="btn btn-inverse dropdown-toggle" data-toggle="dropdown">
											            Action
											                <span class="caret"></span>
											            </button>
											            <ul class="dropdown-menu context">
											                
                                             
											 <li class="divider"></li>
											    <li><a class="btn btn-default" >
											        <form id="packing"  action="' . base_url() . 'index.php/salesorders/packing_slip" method="post">
                                                                <input type="hidden" name="sales_id" value="' . $so->salesorder_id . '"/>
                                                                <input class="btn btn-default"type="submit"   value="Crown Packing Slip "/>
                                                    </form>
													</a>
											    </li>
                                                                                                      
                                            <li class="divider"></li>                                                                     
                                                <li>
											         <a href="'.  base_url().'index.php/invoices/so_pdf/'. $so->salesorder_id .'"><button class="btn btn-default" > Direct Packing Slip  </button></a>
											</li>
										    <li class="divider"></li>
											    <li>
											        <a target="_blank" class="btn btn-default" href="' . $base_url . 'index.php/salesorders/view_invoiced/' . $so->salesorder_id . '">View</a>
                                                 </li>
											</ul>
											</div></td>';
											
											//20150131 disable by Viola  coz this is same as ce_pdf
                                           /*     echo'<td><a href="'.  base_url().'salesorders/pdf/'. $so->salesorder_id .'">
											        <span class="fa fa-file fa-lg"></span></a> <form id="shipping" action="pdf_shipping">
													    <input type="hidden" name="id[]" value="' . $so->salesorder_id . '"/></form></td>';
														*/
                                             echo'<td>
                                                    <div>        
															<form>                        
											                    <a href="'.  base_url().'index.php/invoices/so_shipped_pdf/'. $so->salesorder_id .'"><span class="fa fa-file fa-lg"></span></a>
											
                                                            </form>
											        </div>
                                                </td>';
                                               
                                            } 
											
											
											else {

                                           

                                            echo'<td><div class="btn-group dropdown">
											<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
											Action
											<span class="caret"></span>
											</button>
											<ul class="dropdown-menu context">
											          		

											    <li><a class="btn btn-default" >
											        <form id="packing"  action="' . base_url() . 'index.php/salesorders/packing_slip" method="post">
                                                            <input type="hidden" name="sales_id" value="' . $so->salesorder_id . '"/>
                                                                 <input class="btn btn-default"type="submit"   value="Crown Packing Slip "/>
                                                    </form>
													</a>
											    </li>
                                                                                                      
                                                <li class="divider"></li>                      
													

                                                                                        
                                                <li>
											         <a href="'.  base_url().'index.php/invoices/so_pdf/'. $so->salesorder_id .'"><button class="btn btn-default" > Direct Packing Slip  </button></a>
											    </li>
										        <li class="divider"></li>
												<li>
											    <a target="_blank" class="btn btn-default" href="' . $base_url . 'index.php/salesorders/view/' . $so->salesorder_id . '">View</a>
                                                </li>
												<li class="divider"></li>
												
											    
												<li>
                                                    <a class="btn btn-default confirmation" href="' . base_url() . 'index.php/salesorders/returnso/' . $so->salesorder_id . '" > Return Order</a>
											    </li>
												<li class="divider"></li>
												<li>
                                                    <a class="btn btn-default confirmation" href="' . base_url() . 'index.php/salesorders/cancelso/' . $so->salesorder_id . '" > Cancel Order</a>
											    </li>
												<li class="divider"></li>
												<li>
                                                    <a class="btn btn-default confirmation" href="' . base_url() . 'index.php/salesorders/deleteso/' . $so->salesorder_id . '" > Delete Order</a>
											    </li>
											</ul>
											</div></td>';
											
                                            /*20150131 disable by Viola  coz this is same as ce_pdf
											    echo'<th class="checkers">
											            <input type="checkbox" name="selected[] value="' . $so->salesorder_id . '"/> 
														    <a href="'.  base_url().'salesorders/pdf/'. $so->salesorder_id .'">
															    <span class="fa fa-file fa-lg"></span>
													        </a>
													</th>';*/
												//PDF
												echo'<td>
                                                    <div>        
															<form>                        
											                    <a href="'.  base_url().'index.php/invoices/so_shipped_pdf/'. $so->salesorder_id .'"><span class="fa fa-file fa-lg"></span></a>
											
                                                            </form>
											        </div>
                                                </td>';
													
                    
                                                echo '</form></tr>';
                                                
                                                
                                            }
                                            
                                            
                                         
                                            }
                                     
                                      
                                        ?>

                                    </tbody>
									<!---//20141209   viola
                                    <tfoot >
                                        <tr>
                                            <th class="sorting_disabled">select </th>
                                            <th>Sales ID</th>
                                            <th>Company</th>
                                            <th> PO Number </th>
                                            <th>Date Raised</th>
                                            <th class="hidden-xs">Total Inc VAT</th>
                                            <th> status </th>
                                            <th> Change </th>
										
                                        </tr>
                                    </tfoot>
									---->
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
<!-- JQGRID -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqgrid/js/jquery.jqGrid.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqgrid/js/grid.locale-en.min.js"></script>

<script>
// Natural Sorting
    jQuery.fn.dataTableExt.oSort['natural-asc'] = function(a, b) {
        return naturalSort(a, b);
    };
    jQuery.fn.dataTableExt.oSort['natural-desc'] = function(a, b) {
        return naturalSort(a, b) * -1;
    };

/*this make page coulnd shrink
    jQuery(document).ready(function() {
        App.setPage("forms");  //Set current page
        App.init(); //Initialise plugins and elements
    });
*/
    jQuery(document).ready(function() {
        //App.setPage("dynamic_table");  //Set current page      20141209
	    //App.setPage("jqgrid_plugin");
		 App.setPage("forms");App.setPage("search"); 
        App.init(); //Initialise plugins and elements
    });

    $(document).ready(function() {
        $('#datatable1').dataTable();
       // $('#datepicker').datepicker({minDate: -1, maxDate: "+1"});
	   $('#datepicker').datepicker({minDate: -1, maxDate: "+1"});
	    $('#datepickerFrom').datepicker();
		 $('#datepickerTo').datepicker();//select date   viola 20150326
  
    });

    $(document).on("click", ".open-AddBookDialog", function() {
        var myBookId = $(this).data('id');
        $(".modal-body #bookId").val(myBookId);
		 var myadd_info = $(this).data('id2');add_info
        $(".modal-body #add_info").val(myadd_info);
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



</script>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure to remove it?');
    });
</script>


<!-- /JAVASCRIPTS -->

</body>
</html>
