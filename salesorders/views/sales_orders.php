<?php echo Modules::run('template/dash_head'); ?>


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
			
					<div class="col-md-12">
						<div class="col-md-3 box-container">
								<!-- BOX COLLAPSED-->
								<div class="box border red">
									<div class="box-title small">
										<h4><i class="fa fa-bars"></i>Toolbar</h4>
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
										<div class="btn-group" style="float: none;">
											
										            <div class="btn-toolbar ">
											            <div class="btn-group dropdown">
														    <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">
													        <span class="fa fa-plus"></span>
												            </button>
												            <div class="dropdown-menu context pull-right" style="text-align: left;">
													       <!---
															<li>
														        <a data-toggle="modal"  data-target="#sales_order">
														             <i class="fa fa-plus-square"></i>
															         Add New Sales Order
														        </a>
											            
													        </li>
															<li>
														        <a data-toggle="modal"  data-target="#sales_order">
														             <i class="fa fa-plus-square"></i>
															         Add Order Onhold
														        </a>
											                </li--->
															
														        <?php echo '<form  action="' . base_url().'index.php/salesorders/add_so" method="POST">';
																      echo'  
																	         <input type="hidden" name="buyer_name" value=" "/>
																			 <input type="hidden" name="company" value="1"/>
                                                                             <input type="hidden" name="status" value="pending"/>                 
																
														           
															        
														                     <button class="btn-block" type="submit" >
																			    <i class="fa fa-plus-square"></i>Add New Sales Order</button> ';
											                   
																 echo '</form>'; ?>
													       
															
														        <?php  
																 
																 echo '<form  action="' . base_url().'index.php/salesorders/add_so" method="POST">';
																      echo'  
																	         <input type="hidden" name="buyer_name" value=" "/>
																			 <input type="hidden" name="company" value="1"/>
                                                                             <input type="hidden" name="status" value="onhold"/>                 
																
														           
															        
														                    <button class="btn-block" type="submit"  > <i class="fa fa-plus-square"></i> Add Order Onhold</button>';
											                   
																 echo '</form>';
																 
																 
																 
																 
																 
																 
																 
																 
																 ?>
												            </div>
												        </div>
														<div class="btn-group dropdown">
											                <button class="btn btn-danger  dropdown-toggle" data-toggle="dropdown">
											                     <span class="fa fa-gear"></span>
											                </button>
											                <ul class="dropdown-menu context pull-right" style="text-align: left;"><li class="divider"></li> 
											                    <li>
											                        <a data-title="Update Corrected VAT AMOUNT! " data-content="Once you change cost, please click it to update" data-original-title="" title="Once you change cost, please click it to update" href="demo_system/update_vat_n_total">
																	<i class="fa fa-wrench"></i>Update All SO </a>
											                    </li>
											                </ul>
										                </div>
                                                         <div class="btn-group dropdown">
											                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
											                   
															        <i class="fa fa-print"></i>
											                     
											                    </button>
											                    <ul class="dropdown-menu context">
											                    <?php echo '
											                            <li><a href="'.  base_url().'index.php/salesorders/packing_slip_today">
																			 Crown Packing Slip</a> </li>';
								
                                                                        echo ' <li class="divider"></li>                      
   
                                                                        <li>
											                                <a href="'.  base_url().'index.php/salesorders/dir_packing_slip_today/">Direct Packing Slip </a>
											                            </li>
																	';?>
											                    </ul>
										                 </div>
												        <div class="btn-group dropdown">
											                    <button class="btn btn-info  dropdown-toggle" data-toggle="dropdown">
											                   
											                     <span class="fa fa-upload"></span>
											                    </button>
											                    <ul class="dropdown-menu context">
											                        <li >
														        <a class="btn btn-block"data-toggle="modal" data-target="#box-import">
														           <i class="fa fa-upload"></i>
															 Import file of C.E distributors</a>
											                 
													                </li>
											                    </ul>
										                </div>
												        <div class="hidden btn-group dropdown">
								                       
								                            <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
									                        Print Today's CE SO
									                        <span class="caret"></span>
								                            </button>
								                            <ul class="dropdown-menu context">
							                                   <form></form>
                                                            <?php echo '
											                    <li><a class="btn btn-default" ><a href="demo_system/packing_slip_today"> Packing Slip with logo </a> </li>';
										
					                                                 
                                                                 echo ' <li class="divider"></li>                      
   
                                                                            <li>
											                                    <a href="demo_system/dir_packing_slip_today/">Direct Packing Slip </a>
											                                </li>
																												
								                            ';?>
					

								                            </ul>
							                             </div>											
						                            </div>	
									           
										</div>
									</div>
								</div>
								<!-- /BOX COLLAPSED-->
					    </div>
					    <div class="col-md-5">
								<div class="btn-group">									
													
									<a class="btn btn-info" href="<?php echo base_url();?>index.php/salesorders/order_onhold">Orders on Hold</a>
									<a class="btn btn-info" href="<?php echo base_url();?>index.php/salesorders/order_pending">Pending Orders</a>
									<a class="btn btn-info" href="<?php echo base_url();?>index.php/salesorders/order_shipped">Shipped Orders</a>
														
								</div>								
												
                        </div> 
					    <div class="col-md-4 box-container">
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
											
                                                 <input type="hidden" name="status" id=""   value="pending">
											</br></br>
											<button type="submit" class="btn btn-block btn-success"><i class="fa fa-search-plus"></i></button>
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

					<div class="hidden btn-group dropdown">
							<button class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
								Print Today's CE SO
								<span class="caret"></span>
							</button>
								<ul class="dropdown-menu context">
											          		<form></form>
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
                                <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th>SO#</th>
                                            <th>Company</th>
                                            <th width=""> PO # </th>
                                            <th>Date Raised</th>
											<th class="hidden-xs">Currency</th>
											<th class="hidden-xs">Subtotal</th>
                                            <th class="hidden-xs">Total Inc VAT</th>
                                            <th width=""> Status </th>
                                            <th width="12%"> Change </th>
											 <th > PDF </th>
											<!--
                                            <th class="sorting_disabled"><input name="checkall" type="checkbox" class="checkall" value="ON" />SelectAll</th>
                                            -->
									   </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $base_url = base_url();
                                      $i=2;
									
                                        foreach ($salesorders->result() as $so) {
                                           // $originalDate = $so->dateraised;
                                           // $newDate = date("y-m-d", strtotime($originalDate));
                                            $id = $so->salesorder_id;
                                               
                                            echo '<tr class="gradeX">';
											if (($so->backorder === 'YES')){  //if split order

											  
											
											    if ($so->sales_orders_rev_num===null) //if first of split order
												{
												    echo'  <td>SO-' . $id . '</td>';
												}
												//else if( ($so->sales_orders_rev_num >1)&&(isset($count_split))){
												elseif ($so->sales_orders_rev_num >1)	   {
													 
                                      
													
													//$sales_orders_rev_num = substr(sprintf('%02d', $s->sales_orders_rev_num),0,2);
													echo'  <td>SO-' . substr(sprintf('%06d', $so->sales_orders_rev),0,6) . '-'. $so->sales_orders_rev_num.' </td>';
												    }//echo'  <td>SO-' . $so->sales_orders_rev . '-'. $i++.' </td>';
                                                        
											   } 
											else{
											  
											    if (($so->sales_orders_rev_num==='1')) //if first of split order
												{   
												  //  &&($count_split>'1')
												    echo'  <td>SO-' . $id . '-'. substr(sprintf('%02d', $so->sales_orders_rev_num),0,2).' </td>';
												}
												else
	                                                echo'<td>SO-' . $id . '</td>';
                                            }  
											
											echo'<td>' . $so->Company_name . '</td>';
                                            echo'<td>PO-' . $so->po_number . '</td>';
                                            echo'<td>' . $so->dateraised . '</td>';
											echo'<td>' . $so->currency . '</td>';
											echo'<td>' . $so->Subtotal_total . '</td>';
                                            echo'<td>' . $so->inc_vat . '</td>';
                                            

                                            ///////// status begings /////////////////////
											 echo'<td>';
                                             if ($so->status === 'onhold') {


                                                echo '<a data-toggle="modal" data-id="' . $so->salesorder_id . '" title="Order on Hold" class="open-AddBookDialog btn btn-info" href="#onholdDialog"><span><i class="fa fa-times-circle"></i></span> On Hold</a> ';
                                                     
                                                //echo'<button class="btn btn-info pop-hover" title=""  data-id="' . $so->salesorder_id . '" data-toggle="modal" data-target="#toinvoice"> <span><i class="fa fa-truck"></i></span> ' . $so->status . '</button></td>';
                                            }
											else  if ($so->status === 'pending') {
                                                echo '<div class="col-md-12">
												         <a data-toggle="modal" data-id="' . $so->salesorder_id . '" data-id2="' . $so->so_notes . '"title="Pending" class="open-AddBookDialog btn btn-danger btn-icon input-block-level" href="#addBookDialog1"><i class="fa fa-exclamation-circle "></i> Pending';
                                                    if ($so->backorder === 'YES') {
                                                        echo' <span class="label label-right label-warning tip-right" title="Not Ready">Backorder</span></a>';
                                                    } 
													else {
													
													
                                                    $query_id=$this->db->where('sales_id', $so->salesorder_id)
													               ->get('sales_orders_items');      
                                                    $num_rows_id = $query_id->num_rows();
													
													$query_id_pick=$this->db->where('sales_id', $so->salesorder_id)
													                        ->where('pick','YES')
													                        ->get('sales_orders_items'); 
													$num_rows_id_pick = $query_id_pick->num_rows();
													   // echo $num_rows_id.'/'.$num_rows_id_pick;
													if (($num_rows_id !='0')&&($num_rows_id_pick !='0')&&( $num_rows_id!=$num_rows_id_pick)) {
														  echo' <span class="label label-left label-warning tip-left" title="Picked:'.$num_rows_id_pick.'/Order:'.$num_rows_id. '">Part-Picked</span></a>';
														 
													    }
													 if (($num_rows_id !='0')&&($num_rows_id === $num_rows_id_pick)) {
														  echo'  <span class="label label-right label-info">Full-Picked</span></a>';
                                              
													    }
													 else{
														 
													    }
                                                    
                                                     }
                                                echo' </div>';
                                                // echo'<td><button class="btn btn-warning pop-hover" data-title="PENDING " data-content="This  order is still to be confirmed " data-original-title="" title="">' . $so->status . '</button></td>';
                                                }
                                             else if ($so->status === 'shipped') {


                                                echo '<a data-toggle="modal" data-id="' . $so->salesorder_id . '" title="Item Shipped" class="open-AddBookDialog btn btn-primary" href="#addBookDialog"><span><i class="fa fa-truck"></i></span> Shipped</a> ';
                                                     
                                                //echo'<button class="btn btn-info pop-hover" title=""  data-id="' . $so->salesorder_id . '" data-toggle="modal" data-target="#toinvoice"> <span><i class="fa fa-truck"></i></span> ' . $so->status . '</button></td>';
                                                }
                                             else if ($so->status === 'invoiced') {
                                                echo'<td><button class="btn btn-inverse pop-hover" data-title="Invoiced " data-content="invoice raised" data-original-title="" title=""><span><i class="fa fa-check"></i></span> ' . $so->status . '</button></td>';
                                               }

                                             else if ($so->status === 'cancelled') {
                                                echo'<td><button class="btn btn-danger pop-hover" data-title="cancelled " data-content="order cancelled" data-original-title="" title=""><span><i class="fa fa-cross"></i></span> ' . $so->status . '</button></td>';
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
											         <a  href="'.  base_url().'index.php/invoices/so_pdf/'. $so->salesorder_id .'"><button class="btn btn-default" > Direct Packing Slip  </button></a>
											</li>
										    <li class="divider"></li>
											    <li>
											        <a target="_blank" class="btn btn-default" href="' . $base_url . 'index.php/salesorders/view/' . $so->salesorder_id . '">View</a>
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
											<button class="btn btn-primary ">Action</button>
											                    <button class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
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
											    <a target="_blank"  class="btn btn-default" href="' . $base_url . 'index.php/salesorders/view/' . $so->salesorder_id . '">View</a>
                                                </li>
												<li class="divider"></li>
												
											    
												<li>
                                                    <a class="btn btn-default confirmation" href="' . base_url().'index.php/salesorders/returnso/' . $so->salesorder_id . '" > Return Order</a>
											    </li>
												<li class="divider"></li>
												<li>
                                                    <a class="btn btn-default confirmation" href="' . base_url().'index.php/salesorders/cancelso/' . $so->salesorder_id . '" > Cancel Order</a>
											    </li>
												<li class="divider"></li>
												<li>
                                                    <a class="btn btn-default confirmation" href="' . base_url().'index.php/salesorders/deleteso/' . $so->salesorder_id . '" > Delete Order</a>
											    </li>
											</ul>
											</div></td>';
										
												//PDF
												echo'<td>
                                                    <div>        
															<form>                        
											                    <a href="'.  base_url().'index.php/salesorders/so_shipped_pdf/'. $so->salesorder_id .'"><span class="fa fa-file fa-lg"></span></a>
											
                                                            </form>
											        </div>
                                                </td>';
													
                    
                                                echo '</form></tr>';
                                                
                                                
                                            }
                                            
                                            
                                         
                                            }
                                     
                                      
                                        ?>

                                    </tbody>
			
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


<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="addcustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New Customer</h4>
                </div>
                <div class="modal-body">


                    <?php echo form_open('salesorders/add_cust', 'class="form-horizontal" id="myForm"'); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box border green">
                                <div class="box-title">
                                    <h4><i class="fa fa-bars"></i>Add Information</h4>
                                </div>
                                <div class="box-body big">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Business Information</h4>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Business Name</label> 
                                                <div class="col-md-8"><input type="text" name="Company_name" class="form-control" value=""></div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Standard Email</label> 
                                                <div class="col-md-8"><input type="text" name="email" class="form-control" value=""></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Accounts Email</label> 
                                                <div class="col-md-8"><input type="text" name="accounts_email" class="form-control" value=""></div>
                                            </div>


                                            <h4>Contact Information</h4>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Main Phone Number</label> 
                                                <div class="col-md-8"><input type="text" name="phone_number" class="form-control" value=""></div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Building Number </label> 
                                                <div class="col-md-8"><input type="text" name="number" class="form-control" value=""></div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Address 1</label> 
                                                <div class="col-md-8"><input type="text" name="address1" class="form-control" value=""></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Address 2</label> 
                                                <div class="col-md-8"><input type="text" name="address2" class="form-control" value=""></div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">County</label> 
                                                <div class="col-md-8"><input type="text" name="County" class="form-control" value=""></div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Post Code</label> 
                                                <div class="col-md-8"><input type="text" name="postcode" class="form-control" value=""></div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Website</label> 
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">http://</span>
                                                        <input type="text" name="website" class="form-control" placeholder="Website" value="">
                                                    </div>																			
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 form-vertical">
                            <div class="box border inverse">
                                <div class="box-title">
                                    <h4><i class="fa fa-bars"></i>Payment  Settings</h4>
                                </div>
                                <div class="box-body big">
                                    <h4>Payment Settings</h4>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">VAT Number</label> 
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-addon">UK VAT Number</span>
                                                <input type="text" class="form-control" name="vat_number" placeholder="VAT" value="">
                                            </div>																			
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">VAT Exempt</label> 
                                        <div class="col-md-8"><select name="vat_exempt" class="form-control">
                                                <option value="no">no</option>
                                                <option value="yes">yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <form class="form-horizontal " action="#">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Payment Terms</label> 
                                            <div class="col-md-8">
                                                <select name="terms" id="e3" class="form-control" >
                                                    <!---
                                                    <option value="POC">Payment On Collection</option>
                                                    <option value="net30">30 days </option>
                                                    <option value="net60">60 days</option>
													-->
													 <?php
                                                                                                                            //2015/01/19 viola add
                                                                                                                               $terms=$this->db->select('*') 
			                                                                                                                                  ->group_by('terms')			  
			                                                                                                                                  ->get('terms');                               
								                                                                                                 foreach ($terms->result()as $terms) 
								                                                                                                          {
                                                                                                                                             echo '<option  value="' . $terms->terms. '">' . $terms->terms . '</option>  ';
                                                                                                                                          }
                                                                                                                    ?> 
                                                </select>												
                                            </div>
                                        </div>



                                </div>
                            </div>
                        </div>
                    </div>

                <div class="form-actions clearfix"> 
					     <div class="col-md-11"
                        <input type="submit" value="Add Customer" class="btn btn-primary pull-right"> 
						</div>
						
						<div class="col-md-1">
						 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button> 
						 </div>
                    
					
                </div>
				<?php echo form_close(); ?>
				<!---
                <div class="modal-footer">
                  

                </div>
				-->
            </div>
        </div>
    </div>
	</div>
</div>
    <!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->

    <div class="modal fade col-md-10" style="overflow:hidden;" id="sales_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                 
<?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

     </div>


<div class="modal fade" id="addBookDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog  basic-alert">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">To Invoice </h4>
            </div>
            <div class="modal-body">
			   <div class="row">
			            <div class="col-sm-6 center">
                                 <?php echo form_open('salesorders/to_invoice'); ?>
                <p>Convert to Invoice</p>
                <input type="hidden" name="salesid" readonly="readonly" id="bookId" value=""/>               
                <input type="hidden" name="bookId" readonly="readonly" id="bookId" value=""/>
                <input type="hidden" name="c" readonly="readonly" id="bookId" value=""/>
                <button type="submit" class="btn btn-primary">Invoice </button>
				                  <?php echo form_close(); ?>
                        </div>
						<div class="col-sm-6 center">
                <p>UNSHIP ORDER</p>

<?php echo form_open('salesorders/unship'); ?>
                <input type="hidden" name="salesid" readonly="readonly" id="bookId" value=""/>
                <input type="hidden" name="bookId" readonly="readonly" id="bookId" value=""/>
                <input type="hidden" name="c" readonly="readonly" id="bookId" value=""/>
                <button type="submit" class="btn btn-warning">UNSHIP </button><?php echo form_close(); ?>
                        </div>
				</div>
            </div>
			
			<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<!-- /.shipped -->
<div class="modal fade " style="overflow:hidden;" id="addBookDialog1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="col-md-8 col-md-offset-2">  
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header alert alert-warning">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"> Shipped </h4>
            </div>
            <div class="modal-body">
			
			      <div class="row">
                        <div class="col-md-12">
                            <div class="box border green">
                                <div class="box-title">
                                    <h4><i class="fa fa-bars"></i>Add Information</h4>
                                </div>
                                <div class="box-body big">
								        
                                         <?php echo form_open('status/pending_to_shipped'); ?>
                                                 <p>    ARE YOU SURE ????</p>
                                                         <input type="hidden" name="salesid" readonly="readonly" id="bookId" value=""/><br>
                
                                                              To be sent via Pallet/Post/Collection
															    <select name="pallet">
                                                                <option value="0">no</option>
                                                                <option value="1">yes</option>
                    
                                                                </select> 

				                                                 Delivery no of packages:
				
				                                                <input size="5"  name="qty" type="text" id="qty" />
				                                                </br>	
				                                                </br>
				                                                Deliver total weight(kg):				
				                                                <input size="5" name="wt" type="text" id="wt"/>
                                                                 </br>	
				                                                </br>			
                
			                                                	Additional info:
				                                               <!---
				                                               <input size="30" maxlength="30"name="add_info" type="text" id="add_info" onfocus="if(this.value=='')this.value=";" onblur="if(this.value==")this.value='Leave next door if no answer';" value="Leave next door if no answer"/>
                                                                -->
																<input size="100" maxlength="100"name="add_info" type="text" id="add_info" value="" />
                                                              
																</br>
				                                                </br>
															
				                                    <button type="submit" class="btn btn-block btn-primary">Packed and Dispatched </button>
             
			                    
			                             <div class="modal-footer">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
   
                                         </div> 
										 <?php echo form_close(); ?>
									</div>	 
                             </div>
                         </div>  
                    </div> 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

	</div>
</div>
<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="box-import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="col-md-4 col-md-offset-4">    
			<div class="modal-dialog ">
                <div class="modal-content">
                         <div class="modal-header alert alert-success">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Import SO:<font color="red">C.E distributors </font></h4>
                         </div>
                         <div class="modal-body">
						    <div class="row">
                         
                            <?php echo form_open_multipart('salesorders/upload_ce_csv');?>
                            <ul>  
                                <div class="col-md-12>
                                 <li class="ui-field"><label for="csvfile">Upload file( *only .csv) :</label></li> 
                                    <input type="file" name="userfile" class="btn btn-default" size="20"  required="required" />
                                    <input type="hidden" name="salesid" value="<?php echo $this->uri->segment(3);?>" />
							    </br>
                            
                              <input type="submit" class="btn btn-default" value="upload" class=" pull-left" />
							    </div>
                            </ul>  
                            <?php echo form_close();?>
						   </div>
                      </div>
                          <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                     
                        </div>
				
				
				
				</div>
                       
                </div>
            
        </div>
	</div>
        <!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->


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
        App.setPage("dynamic_table");  //Set current page      20141209
	    //App.setPage("jqgrid_plugin");
		App.setPage("sales_orders"); 
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
    $('.checkall').click(function(e) {

        var chk = $(this).prop('checked');

        $('input', oTable.fnGetNodes()).prop('checked', chk);
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
