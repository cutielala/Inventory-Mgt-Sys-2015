<script src="http://malsup.github.com/jquery.form.js"></script> 
<!-- UNIFORM -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/uniform/css/uniform.default.min.css" />

<link href="<?php echo base_url()?>/assets/jqueryui-editable/css/jqueryui-editable.css" rel="stylesheet"/>
<script type="text/javascript">
function showText(obj)
{
if(obj.value=='Show')
{
document.getElementById('mytext').style.display='block';
document.getElementById('mytext').value='xxx';
obj.value='Hide';
}
else
{
document.getElementById('mytext').value='000';
document.getElementById('mytext').style.display='none';
obj.value='Show';
}
return;
}
</script>
</head>
</body>

<?php echo Modules::run('template/menu'); ?>

<!-- PAGE -->
<section id="page">

    <div id="main-content">
        <!-- SAMPLE BOX add item FORM-->
        <div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Item</h4>
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
                                        <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="hours-table datatable table table-striped table-bordered table-hover red">
                                        

										<thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>item Code</th>
                                                    <th>Description</th>
                                                    <th>Location</th>
                                                    <th>Qty  </th>
													<th>Qty Available</th>
													<th>Qty Backorder</th>
                                                    <th>Unit Price </th>
                                                    <th> add </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $base_url = base_url();
												 echo '<form id="myForm" action="' . base_url() . 'salesorders/item_added" method="post">';

                                                foreach ($query->result() as $table) {
                                                    if ($table->qty > 0) {




                                                        echo '<tr class="sum gradeX">';
                                                     //   echo '<form id="myForm" action="' . base_url() . 'salesorders/item_added" method="post">';

                                                        echo'<td><strong>
                                                            <input type="hidden" class="from control"name="soid" value="' . $this->uri->segment(3) . '"/>
                                                            <input type="hidden" class="from control"name="id" value="' . $table->id . '"/>
                                                            
                                                                ' . $table->id . '</strong></td>';
                                                        echo'<td><strong>
                                                            <input type="hidden" class="from control" name="CCL_Item" value="' . $table->CCL_Item . '"/>
                                                                ' . $table->CCL_Item . '
                                                                    </strong></td>';
                                                        echo'<td><strong>
                                                            <input type="hidden" class="from control" name="Description" value="' . $table->Description . '"/>
                                                                ' . $table->Description . '
                                                                    </strong></td>';
                                                            echo'<td><strong>
                                                                <input type="hidden" class="from control"name="location" value="' . $table->location . '"/>
                                                            
                                                                    ' . $table->location . '</strong></td>';
														/*echo'<td><strong><div class="form-group"><div class="col-md-2">
                                                            
                                                            <input type="text" class="qty from control" name="qty"  value=""/> Avaiable ' . $table->qty . '<input type="hidden" class="av from control" name="available"  value="' . $table->qty . '"/> backorder <div class="backorder"></div><input type="text" class="bo from control" name="bo"  value=""/> </div></div></strong></td>';
                                                       	*/		
                                                        echo'<td><strong><div class="form-group">
                                                            
                                                            <input type="text" class="qty from control" name="qty"  value=""/> </div></strong></td>';
                                                       			
														
														echo'<td><strong><div class="form-group">'
                                                            
                                                             .$table->qty . '<input type="hidden" class="av from control" name="available"  readonly="true" value="' . $table->qty . '"/></div>
															</strong></td>';
                                                        
														
														echo'<td><strong>
                                                            
                                                            <div class="backorder"></div><input type="text" class="bo from control" name="bo"  readonly="readonly"  value=""/>
															</strong></td>';
                                                       
														
														echo'<td><strong><div class="form-group">
														
                                                            <input type="text" class="from control" name="itemPrice" value="' . $table->sell_price . '" />
                                                                ' . $table->sell_price . '</div></strong></td>';
                                                                
                                                        echo'<td><input type="submit" value="Add" class="btn btn-primary"></button></td>';
                                                       
                                                        echo '</tr>';
                                                       
//echo'<td><input type="submit" value="Add" class="btn btn-primary"></button></td>';
													 
                                                    }
													
													  echo form_close();
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

                    </div>
					
                    <div class="modal-footer">
					<!----
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
						-->

                    </div>
                </div>
            </div>
        </div>
        <!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
        
             <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="box-import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                         <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Box Settings</h4>
                         </div>
                         <div class="modal-body">
                         <form>
                        
                           </form>  
<?php //echo form_open_multipart('salesorders/upload_it');?>
<?php echo form_open_multipart('salesorders/upload_ce_csv');?>
                             <input type="file" name="userfile" size="20" />
                             <input type="text" name="salesid" value="<?php echo $this->uri->segment(3);?>" />
                             <br /><br />

                             <input type="submit" value="upload" />
<?php echo form_close();?>
    <form name="bulk_dealer" action="<?= base_url() ?>salesorders/add_bulk_user" method="post" accept-charset="utf-8"  enctype="multipart/form-data">  
    <ul>  
        <ul>
            <li class="ui-field"><label for="csvfile">Upload dealer id file( *only .csv) :</label></li> 
            <li class="ui-input"><input type="file" name="csvfile" value="" placeholder="" required=""></li>  
            <li><input type="submit" value="Upload" name="Upload" class="ui-submit"></li>  
        </ul>
    </ul>  
</form>                    
       
                        </div>
                        <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                     
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
                                    <a href="<?php echo base_url(); ?>/salesorders">Sales Orders</a>
                                    </li>
                                    <li>Orders</li>
                                </ul>
                                <!-- /BREADCRUMBS -->
                                <div class="clearfix">
                                    <h3 class="content-title pull-left">Orders</h3>
                                </div>
                                <div class="description">Order Details and Payments</div>
                            </div>
                        </div>
                    </div>
                    <!-- /PAGE HEADER -->
					<div class="row">

							<div class="col-md-2">
						        <div class="text-center">
							        <div class="btn-group">
									    <a class="btn btn-default" href="<?php echo base_url();?>salesorders"> <i class="fa fa-reply"></i>   Back
                                                                
									    </a>
									
							        </div>
						        </div>
							</div>	
					        <div class="divide-20"></div>

					
			            </div>
                    <!-- ORDERS -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BOX -->
                            <div class="box border purple">
                                <div class="box-title">
                                    <h4><i class="fa fa-list-ul"></i>Order Details</h4>
                                    <div class="tools">
                                        <a href="#box-config" data-toggle="modal" class="config">
                                            <i class="fa fa-cog"></i>
                                        </a>
                                        <a href="javascript:;" class="reload">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                        <a href="javascript:;" class="collapse">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a href="javascript:;" class="remove">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <!-- ORDERS -->
									
                                    <div class="row">
									
                                        <!-- ORDER SCROLL -->
                                        <div class="col-md-3">
                                            <div class="panel panel-default">
                                                <div class="panel-body orders">
                                                    <div class="scroller" data-height="500px" data-always-visible="1" data-rail-visible="1">
                                                        <ul class="list-unstyled">  

                                                            <?php

                                                                foreach ($order_items->result() as $order) {
                                                                    echo'<li class="clearfix">
                                                                        <div class="pull-left">
										                                     <p><h5><strong>';
                                                                                if(isset($order->CCL_Item)){echo $order->CCL_Item;}
                                                                                    echo '</strong></h5></p>';
									                                        //	if(isset( $order->itemDesc)){echo  $order->itemDesc;}
                                                                                         echo'</p>														
															                        </div>
                                                                                                                                
                                                                                                                                
															                        <div class="text-right pull-right">
																                         <h4 class="cost">&pound;';
                                                                                             //if(isset( $order->Price)){echo  $order->Price;}
																			                if(isset( $order->itemlinetotal)){echo  $order->itemlinetotal;}
                                                                                                 echo'</h4>
																                                           <p>';
																	                                            //<span class="label label-success arrow-in-right"><i class="fa fa-check"></i> &pound;' . //$order->Price . '</span>
																                                       echo'</p>
															                        </div>
															                        <div class="clearfix"></div>
															
														                </li>';
                                                            }
                                                            ?>
															
                                                        </ul>
                                                    
												
												     <div class="list-group">
														  <li class="list-group-item zero-padding">
															
														  </li>
														  <div class="list-group-item profile-details">
														  
														  <?php  $base_url = base_url();

                                                            foreach ($salesorders->result() as $so) {
														            if ($so->backorder === 'YES') //if split order
											                        {
                                                                     echo'  <h3><p>SO- ' . $so->sales_orders_rev . '-'. $so->sales_orders_rev_num.' </p></h3>';
                                                                    } 
											                        else 
											                       {   
											                            if ($so->sales_orders_rev_num==='1') //if first of split order
												                          {
												                               echo'  <h3><p>SO- ' . $so->salesorder_id . '-'. $so->sales_orders_rev_num.'</p></h3>';
												                           }
												                        else
	                                                                           echo'<h3><p>SO- ' . $so->salesorder_id . '</p></h3>';
                                                                    }
														  
														  
														  }
														  
														  ?>
														  <?php  foreach ($orders->result() as $order) {
														  
																
															    echo'';
																echo'
																<p><i class="fa fa-circle text-green"></i> Status: '.$order->status.'</p>
																<p><h4>Bill Info </h4></p>
                                                                <h6><p>Buyer Name: '.$order->Company_name.'</p>
																<p>
																<p>Contact: '.$order->buyername.'
																<ul class="list">
                                                                        <li><i class="fa fa-phone"></i>  </iPhone <h4>'.$order->Buyer_Phone_Numbe.'</h6></li>
																   
																</ul></p>
																<p>Notes : '.$order->so_notes.'</p><br>';
																echo'
																
																<p><h4>Ship Info</h4></p>
                                                                <h6><p>Ship To Company : '.$order->ShipToCompanyName.'</p>
																<p>
																
																<ul class="list">
                                                                        <li><i class="fa fa-phone"></i>  </iPhone <h4>'.$order->Shipping_Contact_No.'</h6></li>
																   
																</ul></p>
																<p>Address : '.$order->ship_Address_1.','.$order->ship_Address_2.','.$order->ship_County.','.$order->ship_Country.'</p>
																<p>Postcode : '.$order->ship_Postcode.'</p></h6>';
																
																}
																?>
														 </div>
													</div>
												    </div>
                                                
												
												
												
												
												</div>

                                            </div>
                                        </div>
                                        <!-- /ORDER SCROLL -->
                                        <!-- ORDER DETAILS -->
                                        <div class="col-md-9">
										    <div class="row">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
												  <form>
												  <!---
                                                    <div class="pull-left">
                                                        <a href="<?php echo base_url(); ?>salesorders/"><button class="btn btn-default">Cancel</button></a>
                                                        <button class="btn btn-default" href="#box-config" data-toggle="modal" ><i class="fa fa-bars"></i> Add Item </button>
                                                         
                                                    </div>
													--->
                                                    <div class="pull-right hidden-xs">
                                                        <div class="btn-group">
														<?php  $base_url = base_url();

                                                            foreach ($salesorders->result() as $so) {}
														            if (($so->backorder === 'NO')&& ($so->status === 'pending'))
											                        {
                                                                     echo'  <button class="btn btn-default" href="#box-config" data-toggle="modal" >
																	 <i class="fa fa-bars"></i> Add Item </button>
																	 
																	 <!--
																	 <a href="#box-import" class="btn btn-default" data-toggle="modal" class="config">Import Items</a>
																	--->
																	 ';
                                                                    } 
											           
														  
														 
														  
														  ?>
														



                                                        </div>
                                                    </div>
                                                    <div class="pull-left visible-xs">
                                                        <div class="btn-group">
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
													<div class="row">
                                                    <hr>
                                                    <!-- TABLE -->
                                                    <table class='table table-hover'>
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Remove 
                                                                </th>
                                                                <th>Item Code</th>
                                                                <th>
                                                                   Description
                                                                </th>

                                                                
                                                                <th><div class='text-center '>
                                                                    Detail</div>
                                                                </th>
																

                                                                <th>
                                                                   Location 
                                                                </th>
																	 
																<!---
                                                                <th>
                                                                    <div class='text-right'>Line Price </div>
                                                                </th>
																--->
																
																<!----
                                                                <th>
                                                                    <div class='text-right'>Remove </div>
                                                                </th>
																-->
                                                                <th>
                                                                    QTY avaliable
                                                                </th> 
																
															    <th>
                                                                    Pick 
                                                                </th> 
															    
															</tr>
                                                        </thead>
                                                        <tbody>
														

                                                             <?php ?><?php foreach ($addresses->result() as $address) {
                                                                    
                                                                }
                                                                ?> 

                                                            <?php
															
															$i=0;
                                                            foreach ($order_items->result() as $items) {

                                                                echo '<tr>
														   
											                <td>
															      <form >
																 </form>
															    <form  action="' . $base_url . 'salesorders/delete_item" method="POST">
																    <input type="hidden" name="itemqty" value="' . $items->item_qty . '"/>
																    <input type="hidden" name="soi" value="' . $items->item_id . '"/>
																	<input type="hidden" name="itemID" value="' . $items->wh_item_id . '"/>
																	<input type="hidden" name="soid" value="' . $items->sales_id . '"/>
																	
																	<button type="submit" class="btn btn-danger pull-left  confirmation" value="submit" >X</button>
																</form>
																
														    </td>';
														  echo '<td>' . $items->CCL_Item . '</td>';
														  echo '<td class="col-sm-2 " >'. $items->Description . '
															
														 </td>';
														  
														  if ($items->qty>0) 
																   {
                                                                   echo '<td>  ';
														   $i++; 
															  { 
                                                                 echo '<div class="panel panel-default  ">
											                             <div class="panel-heading    ">
																		 
												                            <h5 class="panel-title "> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1_'.$i.'">
																			        Order QTY :  '  . $items->item_qty . '<br>    Unit Price:   '  . $items->ItemPrice .'
																			    </a> 
																			</h5>
											 </div>
											        <div id="collapse1_'.$i.'" class="panel-collapse collapse ">
												        <div class="panel-body"> ';
														
														   // echo $i;
															     echo '<form  action="' . $base_url . 'salesorders/update_item_qty_price" method="POST">';
															//echo '<div class="text-center">' . $items->item_qty . '</div>';
															                    echo 'QTY <input type="number" name="new_order_qty" value="' . $items->item_qty . '"/>
																				           <input type="hidden" name="org_order_qty" value="' . $items->item_qty . '"/>';
																				echo 'Unit Price<input type="text"  name="ItemPrice" value="' . $items->ItemPrice . '"/>';
																				echo '     <input type="hidden" name="item_id" value="' . $items->item_id . '"/>
																				           <input type="hidden" name="onhand_qty" value="' . $items->qty . '"/>
																	                       <input type="hidden" name="wh_item_id" value="' . $items->wh_item_id . '"/>
																						   <input type="hidden" name="sales_orders_rev" value="' . $items->sales_orders_rev . '"/>
																	                       <input type="hidden" name="sales_id" value="' . $items->sales_id . '"/>
																						    <input type="hidden" name="Description" value="' . $items->Description . '"/>
																	                       <input type="hidden" name="CCL_Item" value="' . $items->CCL_Item . '"/>
																						   <input type="hidden" name="location" value="' . $items->location. '"/>
																						   
																						   
																						   ';
																						   
														 ////echo ' </td>';
                                                          
														 // echo'<td>';
														  //echo'<div class="text-center">' . $items->ItemPrice . '</div>
															                    
															                echo '<button type="submit" class="btn btn-danger pull-left  " value="submit" >Save</button>';
															            echo '</form>';
													
													
													
													
													
													 echo '</div>
											 </div>
										  </div>';
                         										 
																 }
																 echo '</div></td>';
                                                                   }
																    else
																   {
                                                                    echo '<td>';
																	            echo '<div class="text-center">Order QTY: <br>'  . $items->item_qty . '</div>';
																				echo '<div class="text-center">Unit Price:  <br>'  . $items->ItemPrice . '</div>';
																	
															 echo '</td>';
                                                                    }
														  
                                                            
														
														  
                                                                                                                  
														   echo '<td>
															<div class="text-center">' . $items->location . '</div>
														  </td>';
                                                            /*
															<td>
															<div class="text-center">' . $items->itemlinetotal . '</div>
														    </td>*/
															
                                                            /*                                                       
														   echo ' 
											                <td>
															     <form >
																 </form>
															    <form  action="' . $base_url . 'salesorders/delete_item" method="POST">
																    <input type="hidden" name="itemqty" value="' . $items->item_qty . '"/>
																    <input type="hidden" name="soi" value="' . $items->item_id . '"/>
																    
																	
																	
																	<input type="hidden" name="itemID" value="' . $items->wh_item_id . '"/>
																	<input type="hidden" name="soid" value="' . $items->sales_id . '"/>
																	<button type="submit" class="btn btn-danger confirmation" value="submit" >X</button>
																</form>
															</td>';	
															*/
                                                            /*
                                                                $backorder =  $items->qty -   $items->item_qty ;
                                                                $new_qty = $items->item_qty - $backorder;
                                                                $newlinetotal = $new_qty * $items->ItemPrice;
                                                                
                                                                if ($items->qty < $items->item_qty) {} //no enough stock
																else{//enough stock
                                                                    echo'<td>
                                                                                                                        <form action="' . base_url() . 'salesorders/backorders/add_items" method="POST">
                                                                                                                             <input type="hidden" name="wh_item_id" value="' . $items->id . '"/>
                                                                                                                            <input type="hidden" name="item_id" value="' . $items->item_id . '"/>
                                                                                                                            <input type="hidden" name="sales_id" value="' . $items->sales_id . '"/>
                                                                                                                            <input type="hidden" name="CCL_Item" value="' . $items->CCL_Item . '"/>
                                                                                                                            <input type="hidden" name="Description" value="' . $items->Description . '"/>
                                                                                                                            <input type="hidden" name="item_qty" value="' . $backorder . '"/>
                                                                                                                            <input type="hidden" name="itemPrice" value="' . $items->ItemPrice . '"/>
                                                                                                                            <input type="hidden" name="new_so_qty" value="' . $new_qty . '"/>
                                                                                                                                 <input type="hidden" name="Company_name" value="' . $address->Company_name . '"/>
                                                                                                                                  <input type="hidden" name="buyername" value="' . $address->buyername . '"/>
                                                                                                                                <input type="hidden" name="Address_1" value="' . $address->Address_1 . '"/>
                                                                                                                                     <input type="hidden" name="Address_2" value="' . $address->Address_2 . '"/>
                                                                                                                                          <input type="hidden" name="Town_city" value="' . $address->Town_city . '"/>
                                                                                                                                              <input type="hidden" name="po_number" value="' . $address->po_number . '"/>
                                                                                                                                               <input type="hidden" name="County" value="' . $address->County . '"/>
                                                                                                                                                   <input type="hidden" name="Postcode" value="' . $address->Postcode . '"/>
                                                                                                                                                   <input type="hidden" name="newlinetotal" value="' . $newlinetotal . '"/>
                                                                                                                        <button type="submit" class="btn btn-warning"><i class="fa fa-cross"></i>' . $backorder . '</button>
                                                                                                                        </form>
                                                                                                                                                                                               </td>
                                                                                                                            ';
                                                                } */
																//else 
																{																
																//else 
																    if ($items->backorderitem === 'NO') 
																   {
                                                                    echo '<td><button class="btn btn-inverse"><i class="fa fa-check"></i>Stocks Ok</button></td>';
                                                                   }
																    else
																   {
                                                                    echo '<td><button class="btn btn-danger">Backorder</br>Stocks Not Ok</button></td>';
                                                                    }
																}
																if ($items->pick === 'NO')
																{
																
																echo'<td><form action="' . base_url() . 'salesorders/pick" method="POST">
																          <input type="hidden" name="so_item_id" value="' . $items->item_id . '"/>
                                                                        <input type="hidden" name="sales_id" value="' . $items->sales_id . '"/>
																		<button type="submit" class="btn btn-pink">No</button>
                                                                                                                       </form></td>';
																 }													   
															    else {
																    echo '<td><button class="btn btn-success"><i class="fa fa-check">Yes</i></button></td>';
															
                                                                }                                                     
                                                            
                                                           echo' </tr>';
                                                            }
                                                            
                                                           
                                                            ?>
                                                        </tbody>
                                                    </table>
													</div>
                                                    <!-- /TABLE -->
                                                    <div class="text-right">
                                                        <h3></h3>
                                                    </div>
                                                    <hr>
                                                    <!-- CUSTOMER DETAILS -->
													<div class="box border purple">
                                                    <div class="row">
                                                        
														 <div class="col-sm-3 col-sm-offset-1">
                                                            <h4>
                                                                <i class="fa fa-money"></i>

                                                                 <?php //print_r($total); ?>
                                                            </h4>
                                                            
                                                            <h4><strong>Totals</strong></h4>
                                                            <h4><strong> <?php
                                                            $shipping = $address->shipping_cost;
                                                            $incship = $total + $shipping;
                                                            /*

                                                              Usage:

                                                              You want to calculate 17.5% VAT on a price of £4.67

                                                              $price_without_vat = 4.67

                                                              echo vat($price_without_vat);

                                                              This would return the new amount with 17.5% added, and would be rounded to 2 decimal places

                                                             */
                                                            foreach ($vat_rate->result() as $vat_rate) {
                                                                
                                                            }
                                                            
                                                            if( $address->vat_exempt === 'YES'){
                                                            $vat = 0;  // define what % vat is 
                                                            }
                                                            else{
                                                                $vat = $vat_rate->vat_rate;
                                                            }
                                                           
                                                            $vat_amount = $vat * ($incship / 100);
                                                            $price = $incship + ($vat * ($incship / 100)); // work out the amount of vat 

                                                            $price_with_vat = round($price, 2); // round to 2 decimal places 
                                                            echo'£  ';
                                                            echo number_format($total, 2, '.', '');echo ' ex vat and shipping ';
                                                            echo '<hr>';
                                                      
                                                            
                                                            
                                                            if( $address->vat_exempt === 'YES'){
                                                            // define what % vat is Zero Vat
                                                            }else {
                                                                echo 'Shipping &pound;';  echo '<div class="edit " id="'.$address->salesorder_id.'" style="display: inline">'.$address->shipping_cost.'</div>';
                                                             echo'<br><br>';
                                                               echo'£  '; echo number_format($vat_amount, 2, '.', '');echo '  vat '; 
                                                            }
                                                           
                                                            if( $address->vat_exempt === 'YES'){
                                                           echo 'VAT exempt';  // define what % vat is 
                                                            }
                                                            
                                                            echo '<hr>';
                                                            echo '£  ';
                                                            echo number_format($price_with_vat, 2, '.', '');
                                                            
                                                            echo '  inc vat';
                                                            ?>
                                                                </strong></h4><br>
                                                        
																	<?php
echo form_open('salesorders/save');
echo form_hidden('sales_id', $this->uri->segment(3));
echo form_hidden('total', $total);
echo form_hidden('inc_vat', $price_with_vat);
echo form_hidden('vat_rate', $vat);
echo form_hidden('vat_amount', $vat_amount);
?>
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
														
														
														
														
														
														
														
														
														</div>
														
                                                        <div class="col-sm-6 col-sm-offset-1">
                                                            <h4>
                                                                <i class="fa fa-envelope"></i>
<?php ?>
                                                            </h4>
                                                            <div class="well">	

                                                                <h5><strong>Shipping Address </strong></h5>
                                                                
                                                                <h5><strong>
																
																
                                                                
																 <?php
                                                                if ($address->ship_Address_1 === TRUE) 
																{
                                                                   
                                                                      echo'<br>';
                                                                    echo $address->ShipToCompanyName;
                                                                    echo'<br>';
                                                                    echo $address->ship_Address_1;
                                                                    echo'<br>';
                                                                    echo $address->ship_Address_2;
                                                                    echo'<br>';
                                                                    echo $address->ship_County;
                                                                    echo'<br>';
																	 echo $address->ship_Country;
                                                                    echo'<br>';
                                                                    echo $address->ship_Postcode;
                                                                    echo'<br></strong></h5>';
                                                                    if ($address->so_notes == TRUE) {
                                                                        
                                                                         echo'<br>';
                                                                         
                                                                         echo'<br>';
                                                                         echo'<br>';
                                                                         echo'<br>';
                                                                         
                                                                       
                                                                                echo $address->	so_notes;
                                                                    echo'<br>';
                                                                }}
                                                                else {
                                                                    echo'<br>';
                                                                    echo 'no address';
                                                                }
                                                                ?>
																
																
																
																	
																
																<?php
																/*
                                                                if ($address->Address_1 === TRUE) 
																{
                                                                   
                                                                      echo'<br>';
                                                                    echo $address->buyername;
                                                                    echo'<br>';
                                                                    echo $address->Address_1;
                                                                    echo'<br>';
                                                                    echo $address->Address_2;
                                                                    echo'<br>';
                                                                    echo $address->Town_city;
                                                                    echo'<br>';
																	 echo $address->County;
                                                                    echo'<br>';
                                                                    echo $address->Postcode;
                                                                    echo'<br></strong></h5>';
                                                                    if ($address->notes == TRUE) {
                                                                        
                                                                         echo'<br>';
                                                                         
                                                                         echo'<br>';
                                                                         echo'<br>';
                                                                         echo'<br>';
                                                                         
                                                                       
                                                                                echo $address->notes;
                                                                    echo'<br>';
                                                                }}
                                                                else {
                                                                    echo'<br>';
                                                                    echo 'no address';
                                                                }
																*/
                                                                ?>

                                                            </div>
                                                        </div>
														
														
														
														
                                                    </div>
													   
													<p>                  </p>
										
													    
													</div>
                                                    <!-- PAYMENT STATUS -->
                                                    <hr> 

                                                    
                                                </form>
                                                    
                                                    <br><br>
                                                    <?php
echo form_open('salesorders/saveandexit');
echo form_hidden('sales_id', $this->uri->segment(3));
echo form_hidden('total', $total);
echo form_hidden('inc_vat', $price_with_vat);
echo form_hidden('vat_rate', $vat);
echo form_hidden('vat_amount', $vat_amount);
?>
                                                    <!--
													<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save and exit</button>
                                                     --->
													 
													 </form>
                                                </div>
                                                <!-- /PANEL BODY --> 

                                            </div>
                                        </div>
                                        <!-- /ORDER DETAILS -->
										</div>
                                    </div>
                                    <!-- ORDERS -->
                                </div>
                            </div>
                            <!-- /BOX -->
                        </div>
                    </div>
                    <!-- /ORDERS -->
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
<script src="<?php echo base_url(); ?>assets/js/jquery/jquery-2.0.3.min.js"></script>
<!-- JQUERY UI-->
<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
<!-- BOOTSTRAP -->
<script src="<?php echo base_url(); ?>assets/bootstrap-dist/js/bootstrap.min.js"></script>

<script src="<?php echo base_url()?>/assets/js/jquery.jeditable.js"></script>

<!-- DATE RANGE PICKER -->



<script src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>

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
<!-- COOKIE -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>

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
 
  


<script src="http://malsup.github.com/jquery.form.js"></script> 


<!-- CUSTOM SCRIPT -->

<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script>
    jQuery(document).ready(function() {
        App.setPage("forms");  //Set current page
        App.init(); //Initialise plugins and elements
    });
//loads datatables
$(document).ready(function() {
     $('#datatable1').dataTable({
         "fnDrawCallback": function( oSettings ) {
      $('.qty').on('keyup', function() {
        $('.hours-table tr').each(function() {
            var hours = $(this).find('input.qty').val();
            var rate = $(this).find('input.av').val();
            var dateTotal = (rate - hours);
			var backord = $(this).find('.backorder').val();
			
			
            if(hours < rate ){
                $(this).find('input.bo').val('0').hide('input.bo');}
            else{
			
                $(this).find('input.bo').val(dateTotal).show('input.bo');
				
                }
        }); //END .each
        return false;
    }); // END click 
      
    }
 }
             
                );
       } );


    //this works on the frist 10 rows of the table 
    
    
     $(document).ready(function() {
     $('.edit').editable('<?php echo base_url();?>salesorders/shippingupdate', {
        cssclass : 'form-control ',
        type      : 'textarea',
		cols:'7',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : 'Saving.....',
         tooltip   : 'Click to edit...',
          id   : 'elementid',
         name : 'newvalue',
        
         
     });
     $('.edit_area').editable('http://', { 
         type      : 'textarea',
         cancel    : 'Cancel',
         submit    : 'OK',
         indicator : '<img src="img/indicator.gif">',
         tooltip   : 'Click to edit...'
     });
 });
    



</script>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure to remove it?');
    });
</script>
														    </td>';


<!-- /JAVASCRIPTS -->

<?php echo Modules::run('template/footer'); ?>	        