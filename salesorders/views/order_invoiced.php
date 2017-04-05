
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />


<!-- TYPEAHEAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/typeahead/typeahead.css" />
<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
<script src="http://malsup.github.com/jquery.form.js"></script> 
<!-- UNIFORM -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/uniform/css/uniform.default.min.css" />

<link href="<?php echo base_url()?>/assets/jqueryui-editable/css/jqueryui-editable.css" rel="stylesheet"/>
	<!-- JQGRID -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jqgrid/css/ui.jqgrid.min.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
<!-- SELECT2 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select2/select2.min.css" />
<script src="http://malsup.github.com/jquery.form.js"></script> 


<script>



    // wait for the DOM to be loaded 
    $(document).ready(function() {
        // bind 'myForm' and provide a simple callback function 
        $('#packing').each(function() {
            alert(" processing now!");
        });
    });
</script> 
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
        xmlhttp.open("GET", "<?php echo base_url(); ?>notifications/getuser?q=" + str, true);
        xmlhttp.send();
    }
</script>
<script language="JavaScript" >


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
<!-- PAGE -->
<section id="page">
<div id="main-content">
      <!-- /.shipped -->
   <div class="modal fade" id="addBookDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Credit_Note </h4>
            </div>
                <div class="modal-body">
                    <div class="col-md-12">
				     <input type="text" name="salesid" readonly="readonly" id="bookId" value=""/> 
		
		            
					
					 <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="hours-table datatable table table-striped table-bordered table-hover red">
                                        

										<thead>
                                                <tr>
                                                   
                                                    <th>item Code</th>
                                                    <th>Description</th>                                                   
                                                    <th>Qty  </th>													
                                                    <th>Unit Price </th>
													<th>Total </th>
													
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $base_url = base_url();
												$subtotal=0;
												$return_item=$this->db->select('*')
		                            ->where('sales_id',$bookId)
		                            ->where('so_item_note','return')
		                            ->get('sales_orders_items');
												{
                                                foreach ($return_item->result() as $table) {
              
                                                        echo '<tr class="sum gradeX">';
                                                       
                                                        echo'<td>
                                                            
                                                                ' . $table->CCL_Item . '
                                                                    </td>';
                                                        echo'<td>
                                                            
                                                                ' . $table->Description . '
                                                                    </td>';
                                                           	
                                                        echo'<td> ' . $table->item_qty . '</td>';

														echo'<td>' . $table->ItemPrice . '</td>';
                                                                
                                                                
                                                        echo'<td>' . $table->itemlinetotal . '</td>';
                                                                
                                                       $subtotal+=$table->itemlinetotal;
                                                        echo '</tr>';
	
												}

                                               
                            echo'<tr><td colspan="4" style="text-align:right; padding-right:10px; font-weight:bold;">Subtotal </td>
                        <td style="text-align:right; padding-right:10px; font-weight:bold;">'.$subtotal.'</td></tr>
						<tr><td colspan="4" style="text-align:right; padding-right:10px; font-weight:bold;">Total Credir </td>
                        <td style="text-align:right; padding-right:10px; font-weight:bold;">'.$subtotal.'</td></tr>';
												}                  
                                                ?>
                                            </tbody>

                                        </table>
					
					
					
					
					
					
		
		            </div>
		        </div>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

		    </div>
			
			<div class="modal-footer">
               
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
       <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="credit_not" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                         <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Add Credit_Note </h4>
                         </div>
                         <div class="modal-body">
                                  
			        <div class="row">
				  
                        
					</div> 
           
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
                                    <a href="<?php echo base_url(); ?>/salesorders">Sales Orders</a>
                                </li>
								

                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left">Invoiced Orders</h3>
                            </div>
                            <div class="description">All Invoiced Orders</div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->


                <!-- customer add-->
                <div class="row">
				    <!--
                    <div class="col-sm-8 ">
                        <div >
                            <div class="clearfix">
                                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#sales_order"><i class="fa fa-user"></i> Add New </button>   								
							    </a>

                            </div>

                        </div>
                    </div>
					--->
										<div class="col-md-12">
										    <div class="hidden">
												<div class="text-left">
													<div class="btn-group">
													     
														 
														<div class="btn-group">
															<a class="btn btn-yellow">New Sales Orders</a>
														    <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
											                    <span class="caret"></span>
											                </button>
											                    <ul class="dropdown-menu">
											                        <li>
											                            <a data-toggle="modal" data-toggle="modal" data-target="#sales_order">Add New Sales Orders</a>
											                                </li>
											                                <li>
											                                    <a data-toggle="modal" data-target="#box-import">Import file of C.E distributors</a>
											                                </li>
										
											                    </ul>
														
														
														
														
														
														
														
														
														</div>
														
														<a class="btn btn-default" href="<?php echo base_url();?>salesorders/order_pending">Pending Orders</a>
														
														
														
														<a class="btn btn-default" href="<?php echo base_url();?>salesorders/order_shipped">Shipped Orders</a>
														<a class="btn btn-default" href="<?php echo base_url();?>salesorders/order_invoiced" >Invoiced Orders</a><!--2015/07/03 modift by viola -->
														<a class="btn btn-default" href="<?php echo base_url();?>salesorders/order_canceled">Canceled Orders</a>
														<a class="btn btn-default confirm-dialog" href="<?php echo base_url();?>salesorders/order_returned" class="">Returned Orders</a><!--2015/07/03 modift by viola -->
														<!---
														<a class="btn btn-default" href="<?php echo base_url();?>salesorders/order_paid">Paid Orders-test</a>
														-->
														
														
													</div>
												</div>
											</div>
                                        </div>
 									   <div class="col-md-5 box-container pull-right">
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
										<div class="scroller" data-height="100px" data-rail-visible="1">
								        <form action="<?php echo base_url();?>index.php/salesorders/filterByDate" method="post" enctype="multipart/form-data">
			
											<span class="date-range pull-right">
										        <div class="btn-group">											
													    <input type="button" class="js_update btn btn-info" onclick="showText(this)" value="Today"> 
												        <input type="button" class="js_update btn btn-info" onclick="showText(this)" value="Last 7 Days" > 
												        <input type="button"class="js_update btn btn-info" onclick="showText(this)" value="Last month" >
	                                            </div>
											</br></br>
											From <input type="text" name="datepickerFrom" id="datepickerFrom"   size="10" >
											To <input type="text" name="datepickerTo" id="datepickerTo"   size="10" >
											
                                                 <input type="hidden"  name="status" value="invoiced">
											
											<button type="submit" class="btn btn-success"><i class="fa fa-search-plus"></i></button>
										    </span>
                                          </form>	

										</div>
									</div>
								</div>
								<!-- /BOX COLLAPSED-->
					                    </div>

			
										 
												
												<div class="divide-20"></div>

											
                                    </div>
									
                <!-- /customer add -->


                <div class="separator"></div>
				
				
										
				
				
                <!-- DATA TABLES -->
                <div class="row">
                    <div class="col-md-12">
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
                                <table id="datatable3" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th >SO#</th>
                                            <th>Company</th>
                                            <th> PO # </th>
                                            <th>Date Raised</th>
											<th class="hidden-xs">Currency</th>
											<th class="hidden-xs">Subtotal</th>
											
                                            <th class="hidden-xs">Total Inc VAT</th>
                                            <th> Status </th>
                                            <th width="15%"> Change </th>
											 <th> PDF </th>
									
									   </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $base_url = base_url();
                                      $i=2;
									
                                        foreach ($salesorders->result() as $so) {
                                           
                                            echo '<tr class="gradeX">';
										 	
											echo'  <td>SO-' . substr(sprintf('%06d', $so->salesorder_id),0,6) .' </td>';
												
											echo'<td>' . $so->Company_name . '</td>';
                                            echo'<td>PO-' . $so->po_number . '</td>';
                                            echo'<td>' . $so->dateraised . '</td>';
                                            echo'<td>' . $so->currency . '</td>';
											echo'<td>' . $so->Subtotal_total . '</td>';
											 
											  
											echo'<td>£' . $so->inc_vat . '</td>';
                                            

                                            ///////// status begings /////////////////////
                                          
                                            echo'<td>';
                                            if ($so->status === 'invoiced') {
												
												
												if (isset($so->note)&&$so->note=== 'return') {
		                                         
   												  echo'
											          		<div class="btn-group dropdown">
											         <button class="btn btn-default  pop-hover  dropdown-toggle" data-toggle="dropdown"  data-content="Part-Return" >
											             Part-Return
                                                        
											            <span class="caret"></span>
											         </button>
                                                       <ul class="dropdown-menu context">
											            <li><a class="btn btn-default" >
											                 <form id="packing"  action="' . base_url() . 'index.php/salesorders/credit_note" method="post">
                                                            <input type="hidden" name="sales_id" value="' . $so->salesorder_id . '"/>
                                                                 <input class="btn btn-default"type="submit"   value="Credit Note"/>
                                                             </form>
													        </a>
											            </li>
														
														<ul></div>
														
														
														
														
														
														';
											    }
												else
													 echo'<button class="btn btn-inverse pop-hover" data-title="Invoiced " data-content="invoice raised" data-original-title="" title=""><span><i class="fa fa-check"></i></span> ' . $so->status . '</button>';
                                         
										   }
                                            if ($so->status === 'cancelled') {
                                                echo'<button class="btn btn-inverse pop-hover" data-title="Invoiced " data-content="order cancelled" data-original-title="" title=""><span><i class="fa  fa-pause"></i></span> ' . $so->status . '</button></td>';
                                            }
											
                                            if ($so->status === 'returned') {
                                               
											  // echo'<button class="btn btn-inverse pop-hover" data-title="Invoiced " data-content="order returned" data-original-title="" title=""><span><i class="fa  fa-pause"></i></span> ' . $so->status . '</button>';
                                                echo'<a data-toggle="modal" data-id="' . $so->salesorder_id . '" title="Return" class="open-AddBookDialog btn btn-warning" href="#addBookDialog"><span><i class=""></i></span> ' . $so->status . '</a>
																							 <div class="btn pop-hover  btn-group dropdown pull-left"  >
											                                                      <button class="btn btn-default  pop-hover  dropdown-toggle" data-toggle="dropdown"  data-content="Return" >
											                                                      test' . $so->status . '
                                                        
											                                                      <span class="caret"></span>
											                                                      </button>
                                                                                                        <ul class="dropdown-menu context">
											                                                  
																								   <li>
														                                               <a data-toggle="modal" data-id="' . $so->salesorder_id . '
																	                                                   title="return" class="open-AddEditinfoDialog btn btn-default" href="' . $base_url . '#credit_note"><span><i class=""></i></span> Add Credit Note</a>
																                                    </li>
														                                           <ul></div>';
											 
											}
                                            ////////////////// status ends////////////////////////////////////
                                             
											  
											if (isset($so->refund)&&$so->refund === 'YES') {
													
													echo'<button class="btn btn-danger pop-hover" data-title="Credit Note  Raised" data-content="order returned" data-original-title="" title=""><span></span> Credit Note</button>';
												        
                                             
												
												}

											echo'</td>';

                                            echo'<td><div class="btn-group dropdown">
                                                        <button class="btn btn-inverse">Action</button>
											                    <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">
											            
											                <span class="caret"></span>
											            </button>
											         <ul class="dropdown-menu context">
											          		

											           
                                                                                                      
                                                      
                                                                                        
                                                       
										        <li class="divider"></li>
												<li>
											    <a target="_blank" class="btn btn-default" href="' . $base_url . 'index.php/salesorders/view_invoiced/' . $so->salesorder_id . '">View</a>
                                                </li>
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
										    
											    <li><li class="divider"></li>
												
											    
												<li>
                                                    <a class="btn btn-default confir_return" href="' . base_url() . 'index.php/salesorders/returnso/' . $so->salesorder_id . '" > Return Order</a>
											    </li>
												<li class="divider"></li>
												<li>
                                                    <a class="btn btn-default confir_cancel" href="' . base_url() . 'index.php/salesorders/cancelso/' . $so->salesorder_id . '" > Cancel Order</a>
											    </li>
												<li class="divider"></li>
												<li>
                                                    <a class="btn btn-default confirmation" href="' . base_url() . 'index.php/salesorders/deleteso/' . $so->salesorder_id . '" > Delete Order</a>
											    </li>
											             </ul>
											        </div>
											    </td>';
											
                                   
												//PDF
												echo'<td>
                                                        <div>        
															<form>                        
											                    <a href="'.  base_url().'index.php/salesorders/so_shipped_pdf/'. $so->salesorder_id .'"><span class="fa fa-file fa-lg"></span></a>
											
                                                            </form>
											            </div>
                                                    </td>';
													
                    
                                                echo '
												</tr>';
                                                
                                                
                                           
                                            
                                            
                                         
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



	
	
	
	
</div><!-- /.modal -->
   
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

    $(document).ready(function() {
        $('#datatable3').dataTable();
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
    $('.checkall').click(function(e) {

        var chk = $(this).prop('checked');

        $('input', oTable.fnGetNodes()).prop('checked', chk);
    });

   $(document).on("click", ".open-AddBookDialog", function() {
        var myBookId = $(this).data('id');
        $(".modal-body #bookId").val(myBookId);
        // As pointed out in comments, 
        // it is superfluous to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });

</script>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure to remove it?');
    });
	 $('.confir_return').on('click', function () {
        return confirm('Are you sure to return it?');
    });
	 $('.confir_cancel').on('click', function () {
        return confirm('Are you sure to cancel it?');
    });
</script>


<!-- /JAVASCRIPTS -->

</body>
</html>
