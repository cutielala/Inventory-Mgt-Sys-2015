<script src="http://malsup.github.com/jquery.form.js"></script> 
<!-- UNIFORM -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/uniform/css/uniform.default.min.css" />

<link href="<?php echo base_url()?>/assets/jqueryui-editable/css/jqueryui-editable.css" rel="stylesheet"/>

</head>
</body>

<?php echo Modules::run('template/menu'); ?>

<!-- PAGE -->
<section id="page">

    <div id="main-content">
          <div class="modal fade" id="credit_note" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Credit_Note</h4>
                    </div>
                    <div class="modal-body">


                        <!-- DATA TABLES -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BOX -->
                                <div class="box border red">
                                    <div class="box-title">
                                        <h4><i class="fa fa-paste"></i>Return Item List</h4>

                                    </div>
									
                                    <div class="box-body">
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
												{
                                                foreach ($return_item->result() as $table) {
              
                                                        echo '<tr class="sum gradeX">';
                                                       
                                                        echo'<td><strong>
                                                            
                                                                ' . $table->CCL_Item . '
                                                                    </strong></td>';
                                                        echo'<td><strong>
                                                            
                                                                ' . $table->Description . '
                                                                    </strong></td>';
                                                           	
                                                        echo'<td><strong> ' . $table->item_qty . '</strong></td>';

														echo'<td><strong>' . $table->ItemPrice . '</strong></td>';
                                                                
                                                                
                                                        echo'<td><strong>' . $table->itemlinetotal . '</strong></td>';
                                                                
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
										<hr>
										
										<form id="myForm" action="<?php echo base_url(); ?>salesorders/add_cn" method="post">';
                                            <table cellpadding="0" cellspacing="0" border="0" class="hours-table datatable table table-striped table-bordered table-hover red">
                                        
                                         <h3>Make A Credit Refund</h3> 
										<thead>
                                                <tr>
                                                     
                                                    <th>SO#</th>         													
                                                    <th>Amount</th>
                                                    <th>Ship</th>                                                   
                                                    												
                                                    
													
													<th>Notes </th>
													<th>Add </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                               
                                                
              
                                                        echo '<tr class="sum gradeX">';
                                                       
                                                        echo'<td><strong>
														         <input type="text"  name="so_id" readonly="readonly" value="' . $table->sales_id . '"/>
                                                         
                                                                    </strong></td>';
                                                        echo'<td><strong>
                                                            
                                                                 <input type="text"  name="cn_amount" value="' . $subtotal . '"/>
                                                         
                                                                    </strong></td>';
                                                           	
                                                        echo'<td><strong> <input type="text"  name="cn_ship"  value="0"/>
                                                         </strong></td>';

														           
                                                        echo'<td><strong><input type="text"  name="cn_note" value=""/></strong></td>';
                                                         echo'<td><strong><button type="submit" class="btn btn-primary center">Save </button>	</td>';
                                                             
                         
                                                        echo '</tr>';
	
												

                                               
                           
												               
                                                ?>
                                            </tbody>

                                        </table>            
														
													
										</form>
										
										
										
										
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
        <div class="modal fade" id="return_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                         <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Item Return </h4>
                         </div>
                         <div class="modal-body">
                                  
			      <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="box border green">
                                <div class="box-title">
                                    <h4><i class="fa fa-bars"></i>Item info</h4>
                                </div>
                                <div class="box-body big"> 
								        
                                         <?php echo form_open_multipart('salesorders/return_item');?>
                                                
                                                         <input type="hidden"  name="soid" readonly="readonly" id="bookId" value=""/><br>
                                                         <input type="hidden" name="itemID"   id="bookId2" value=""/><br>
                                                         <input type="hidden" name="wh_item_ID"   id="bookId3" value=""/><br>
                
				                                                </br>
				                                               Item:				
				                                                 <input type="text" size="20" readonly="readonly" name="CCL_Item"   id="bookId4" value=""/>
																 Description
																 <input  type="text" size="40" readonly="readonly" name="Description"   id="bookId7" value=""/>
                                                                 Return QTY:
				
				                                               <input  type="number" size="30" maxlength="30" name="return_qty" min="0" max="" id="bookId5" value=""/>                                              
				                                               <input  type="hidden" name="item_qty"   id="bookId5" value=""/>
															   <input type="hidden"  name="ItemPrice"  id="bookId6" value=""/>
                                                                <input type="hidden"   name="location" readonly="readonly" id="bookId8" value=""/>
                                                                 
															
				                                                   
                
			                                                	
																</br></br>
				                                    <button type="submit" class="btn btn-primary pull-right">Save </button>
              <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                                                 <?php echo form_close(); ?>

			                    
			                           
                                            

                                        </br></br>
									</div>	 
                             </div>
                         </div>  
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
                                    <a href="<?php echo base_url(); ?>">main</a>
                                    </li>
                                    <li>
                                    <a href="<?php echo base_url(); ?>/salesorders">Sales Orders</a>
                                    </li>
                                    <li>Refund</li>
                                </ul>
                                <!-- /BREADCRUMBS -->
                                <div class="clearfix">
                                    <h3 class="content-title pull-left">Refund</h3>
                                </div>
                                <div class="description">Refund Details and Credit Note</div>
                            </div>
                        </div>
                    </div>
                    <!-- /PAGE HEADER -->
                    <!-- ORDERS -->
                    <div class="row">
                        <div class="col-md-12">
                            
							
							 <!-- ORDER SCROLL -->
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-body orders">
												
												<div class="">
              
                                                    
												     <?php echo form_open('salesorders/edit_shipinfo'); ?>
												     <div class="list-group">
														  <div class="col-md-6 list-group-item profile-details">
															<?php  $base_url = base_url();

                                                            foreach ($salesorders->result() as $so) {
														            if ($so->backorder === 'YES') //if split order
											                        {
                                                                     echo'  <h4 style="color:red;"><strong>SO- ' . $so->sales_orders_rev . '-'. $so->sales_orders_rev_num.' </strong></h4>';
                                                                    } 
											                        else 
											                       {   
											                            if ($so->sales_orders_rev_num==='1') //if first of split order
												                          {
												                               echo'  <h4 style="color:red;"><strong>SO- ' . $so->salesorder_id . '-'. $so->sales_orders_rev_num.'</strong></h4>';
												                           }
												                        else
	                                                                           echo'<h4 style="color:red;"><strong>SO- ' . $so->salesorder_id . '</strong></h4>';
                                                                    }
														  
														  
														  }
														  
														    echo'   <input type="hidden" name="path"   value="view_refund"/>
              															<p><i class="fa fa-circle text-green"></i> Status: '.$so->status.'</p>
															             <input type="hidden" name="status"   value="'.$so->status.'"/>';
														    echo' <h4>Ship Info</h4>
														  
														   
                                                            
                                                            <table >
																<tr>
																    <td >Receiver Name:</td>
																    <td >
																    <input type="text" size="30" maxlength="30" disabled="disabled" name="ShipToCompanyName"   value="'.$so->ShipToCompanyName.'"/>
                
				                                                    </td>
																</tr>
				                                                <tr><td >Contact No:	</td>
																    <td >			
				                                                    <input type="text" size="30" maxlength="30" disabled="disabled"name="Shipping_Contact_No"   value="'.$so->Shipping_Contact_No.'"/>
                  			                                       </td>
																</tr>
																<tr>
																    <td >
																    Shipping Address1:</td>
																    <td >
				
				                                                     <input type="text" size="30" maxlength="30" disabled="disabled"name="ship_Address_1"  value="'.$so->ship_Address_1.'"/>
                
				                                                     </td>
																</tr>
																<tr><td >Shipping Address2:</td>
																    <td >
																    <input type="text" size="30" maxlength="30" disabled="disabled"name="ship_Address_2"  value="'.$so->ship_Address_2.'"/>
                
				                                                    </td>
																</tr>
				                                                <tr><td >Shipping Address3/County:	</td>
																    <td >			
				                                                 <input type="text" size="30" maxlength="30" disabled="disabled"name="ship_County"  value="'.$so->ship_County.'"/>
                  			                                    </td></tr>
                                                                
				                                                <tr><td >Shipping Postcode:			</td>
																    <td >	
				                                                 <input type="text" name="ship_Postcode"  disabled="disabled" value="'.$so->ship_Postcode.'"/>
                  			                                    
                                                                <tr><td >Email:			</td>
																    <td >		
				                                                 <input type="text" name="Shipping_Email" disabled="disabled" size="40" value="'.$so->Shipping_Email.'"/>                  			                                  </td>
																</td></tr>
																
																
															</table ><br> ';
                                         
			                                                     
														  
														  
														  
														  ?>
														  </div>
														  <div class="col-md-6 list-group-item profile-details">
														  
														  
														  <?php  
														  
														  		
																
																
																
																
																

																
																echo'<p><h4>Bill Info</h4></p>';
																
																
                                                                echo'<table>
														   
											                                
				                                                <tr class="hidden" ><td >Vat exempt&nbsp; </td>
																    <td ><select name="vat_exempt" >
                                                                           <option value="'. $so->vat_exempt.'">'. $so->vat_exempt.'</option>
																	
                                                                             <option value="NO">NO</option>
                                                                             <option value="YES">YES</option>
																	
                                                                              </select>
																    </td>
																</tr>';
																
																 echo'
																<tr class="hidden" ><td >Currency</td>
																    <td ><select name="currency" >
                                                                            <option value="'.$so->currency.'">'.$so->currency.'</option>
                                                                            <option value="GBP">GBP</option>
                                                                            <option value="EUR">EUR</option>
                                                                            </select></td>
																</tr>
																<tr><td >  PO:
				                                                    </td>  
				                                                     <td  > 
																	 <input type="text" name="po_number"  disabled="disabled"size="30" value="'.$so->po_number.'"/>
                                                                     </td> 
															   
				                                                     </td>
																</tr> 
															    <tr><td>Buyer Name:</td>
																    <td  width="10%"><input type="text" disabled="disabled"size="30" maxlength="30" name="Company_name"   value="'.$so->Company_name.'"/> 
																	<td  width="10%"><button type="button" disabled="disabled"class="btn btn-info xs " data-toggle="modal" data-target="#sales_order">Select</button>
												                       
																    </td>   
																</tr>
                                                             	<tr><td>Buyer Phone Number:	</td>	
				                                                    <td> <input type="text" size="30" maxlength="30" disabled="disabled"name="Buyer_Phone_Numbe"  value="'.$so->Buyer_Phone_Numbe.'"/></td>
                  			                                    </tr>
																<tr><td>Billing Address1:</td>
				
				                                                    <td> <input type="text" size="30" maxlength="30" disabled="disabled"name="Address_1" value="'.$so->Address_1.'"/></td>
                                                                </tr>
				                                                <tr>
																     <td>Billing  Address2:</td>
																     <td><input type="text" size="30" maxlength="30" disabled="disabled"name="Address_2"   value="'.$so->Address_2.'"/></td>
																 </tr>
				                                                <tr><td>Billing  Address3/County:</td>				
				                                                    <td><input type="text" size="30" maxlength="30" disabled="disabled"name="County"   value="'.$so->County.'"/></td>
																</tr>
                  			                                   
				                                               
				                                                <tr><td>Billing  Country:	</td>			
				                                                    <td> <input type="text" name="Country" value="'.$so->Country.'"/></td>
																</tr>
                  			                                    <tr><td>Billing  Postcode:	</td>			
				                                                    <td><input type="text" name="Postcode" value="'.$so->Postcode.'"/></td>
																</tr>';
                                         
			                                                   
																echo'</table>';
                                         
			                                                   
																
																
													
																?>
														 </div>
														 <button type="submit" class="btn btn-primary pull-right">Save Change</button>
														
													</div> 
													<?php   echo form_close(); ?>
												    </div>
                                                
												
												
												
												</div>

                                            </div>
											        <div class="panel panel-default">
														<div class="panel-body orders">
															 <div class="col-md-12 pull-right">
														        <?php  $base_url = base_url();

                                                            
															            foreach ($salesorders->result() as $so) {}
															
                                                                                    echo'<div class="col-md-12 ">';
                                                                                        
																						
																						if ($so->status === 'invoiced') {
                                                                                             $invoice = $this->db->select('*')->where('salesorder_id',$so->salesorder_id )->get('invoices');

                                                                                                                foreach ($invoice->result() as $payment) { }
                                                                                                                        
																								
																							 echo'<div class="col-md-2  pull-right">
																							        <div class="btn-group dropdown">
											                                                            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
											
											                                                              <i class="fa fa-print"></i>
											                                                            </button>
											                                                            <ul class="dropdown-menu context">';
											          		
                                                                                                 echo'<form ></form>';
											                                                     echo'<li>
																								        <a class="btn btn-default" >
											                                      
																				                            <form id="packing"  action="' . base_url() . 'salesorders/packing_slip" method="post">
                                                                                                            <input type="hidden" name="sales_id" value="' . $so->salesorder_id . '"/>
                                                                                                            <input class="btn btn-default"    type="submit"   value="Crown Packing Slip "/>
                                                                                                             </form>
													                                                    </a>
											                                                        </li>
                                                                                                      
                                                                                                 <li class="divider"></li>                       
                                                                                                 <li>
											                                                             <a href="'.  base_url().'invoices/so_pdf/'. $so->salesorder_id .'"><span > Direct Packing Slip  </span></a>
											                                                     </li>
																								 <li class="divider"></li>                       
                                                                                                 <li>
										                                        				 
																				                     <a href="'.  base_url().'invoices/pdf/'. $payment->invoice_id .'"><span > &nbsp;Invoice</span></a>
											                                                     </li>
																				 
																				
											                                                </ul>
											                                                </div></div>';
																			                echo' <div class="col-md-3 pull-right">
																								        <button class="btn btn-inverse dropdown-toggle"  title="Click to check payment status" data-toggle="dropdown">' . $so->status . '</button>
																										     <ul class="dropdown-menu context">';
                                                                                       
                                                                                                      
											
                                                                                                            echo'<li>';
                                                                                                                     if($payment->status === 'paid' ){
                                                                                                                            echo '<a class="btn btn-success" href="#"><i class="fa fa-check"></i>
                                                                                                                                     Paid </a>';}
                                                               
																                                                            else if($payment->status === 'PART PAID' ){
                                                                                                                            echo '<a class="btn btn-success" href="#"><i class="fa fa-check"></i>
                                                                                                                                     Part Paid
                                                                                                                                     </a>';}
                                                                                                                            else{
                                                                                                                           echo '<a class="btn btn-warning pop-hover" data-title="UNPAID " data-content="Click to Make Payment" data-original-title="" title=""="#" data-toggle="modal" data-target="#UNPAID">
																														            <i class="fa fa-cross"></i>UNPAID </a>';
                                                                    
                                                                                                                                     }
                                                                        
                                                                                                            echo'</li>';
                                                                                                   echo '</ul></div>';
																		                                          		   
																						   
																						   }
															
															                          // if ((isset($so->so_item_note)&&$so->so_item_note=== 'return')) 
																					       {
																						   
																						    if(($so->refund)=== 'YES') {
																								
																								echo'  <div  class="col-md-6"><i class="fa fa-check"></i> <strong>Credit Note  Raised</strong></div >';
																							}
																							  else{
															                                
																							echo'<div class="col-md-6  btn-group dropdown pull-left">
											                                                      <button class="btn btn-default  pop-hover  dropdown-toggle" data-toggle="dropdown"  data-content="Return" >
											                                                      <strong>Return</strong>
                                                        
											                                                      <span class="caret"></span>
											                                                      </button>
                                                                                                     <ul class="dropdown-menu context">
											                                                  
																								   <li>
														                                               <a data-toggle="modal" data-id="' . $so->sales_id . '
																	                                                   title="return" class="open-AddEditinfoDialog btn btn-default" href="#credit_note"><span><i class=""></i></span> <strong>Add Credit Note</strong></a>
																                                    </li>
														                                           <ul></div>';
																								   }
																							
																						    }
																						                         
															                
																					      	
														               
                                                                                        ?>

                                                                                        </div>
                                                             </div>
													    
														</div>
												    </div>
                                        </div>
                                        <!-- /ORDER SCROLL -->
							
							
							<!-- BOX -->
                            <div class="box border purple">
                                <div class="box-title">
                                    <h4><i class="fa fa-list-ul"></i>Refund Details</h4>
                                   <div class="hidden tools">
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
                                                    <!-- TABLE -->
                                            <table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                                     <thead>
                                                            <tr>
                                                                <th>Return</th>
                                                                <th>Item Code</th>
                                                                <th>
                                                                   Description
                                                                </th>

                                                                
                                                                <th><div class='text-center '>
                                                                    Detail</div>
                                                                </th>
																
                                                                <th>
                                                                   Subtotal
                                                                </th>

                                                                <th>
                                                                   Location 
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
																     
																	 
																	    if ( $items->so_item_note =='return'){

                                                                echo '<tr>';
														   echo ' <td>
															      <form >
																 </form>';
																 if ( $items->so_item_note =='return'){
																
															
															echo '<h7 style="color:red">return</h7>'; 
															 
															 
															 }
															 else{
															echo '	 <a data-toggle="modal" data-id="' . $items->sales_id . '" data-id2="' . $items->item_id . '"
																	 data-id3="' . $items->wh_item_id . '" data-id4="' . $items->CCL_Item. '" data-id5="' . $items->item_qty. '"data-id6="' .$items->ItemPrice  . '" data-id7="' . $items->Description. '"data-id8="' .$items->location  . '
																	                                                   title="return" class="open-AddEditinfoDialog btn btn-default" href="#return_item"><span><i class=""></i></span> <strong>X</strong></a>';
																 
																 }
																 
																 
																 
															
																
														    echo '</td>';
											            
														  echo '<td>' . $items->CCL_Item . '</td>';
														  echo '<td class="col-sm-2 " >'. $items->Description . '
															
														 </td>';
														  
														 
																   {
                                                                    echo '<td>';
																	            echo '<div class="text-center">Order QTY: <br>'  . $items->item_qty . '</div>';
																				
																				echo '<div class="text-center">Unit Price:  <br>'  . $items->ItemPrice . '</div>';
																	
															 echo '</td>';
                                                                    }
														  
                                                            
														
														  
                                                            echo '<td>
															<div class="text-center">' . $items->itemlinetotal . '</div>
														  </td>';                                                      
														   echo '<td>
															<div class="text-center">' . $items->location . '</div>
														  </td>';
                                                           
															
                                                       
																                                                   
                                                            
                                                           echo' </tr>';
                                                            }
                                                            
															}   
                                                            ?>
                                                        </tbody>
                                                    </table>
													
							    </div>
							 </div>
                            <!-- /BOX -->					
                                                 
                                                    <hr>
                                                    <!-- CUSTOMER DETAILS -->
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            	 <div class="col-sm-4 col-sm-offset-4">
                                                            <div class="col-sm-12"><h4><strong>Cost Detail</strong></h4>
														
                                                   <?php 
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
                                                           

												   $p=1;
												        {
															//  if ($currency->status === 'Pending') 
															    
															        
														                        $p++; 
								                                { 
                                                                        
																		echo '<div class="panel panel-default  ">
																		            <div class="panel-heading    ">
												                                        <h3 class="panel-title "> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse4_'. $p.'">
																			              Subtotal &nbsp  '.number_format($total, 2, '.', '') .'&nbsp;'.$address->currency.'<hr>
																						  
                                                                                          Shipping &nbsp '.$address->shipping_cost.'&nbsp;'.$address->currency.'<BR/>
																				          Vat &nbsp  '.number_format($vat_amount, 2, '.', '') .'&nbsp;'.$address->currency.'
                                                                                           <hr>
                                                                                            Total&nbsp'. number_format($price_with_vat, 2, '.', '') .'&nbsp;'.$address->currency.'&nbsp;inc vat
                                                                                           

																						   <hr>
																						   
                                                                                            </strong><br>
																						</a> 
																			            </h3>
											                                        </div>';
											                                    
																				if ($so->status === 'pending'){
																   
																				
																				echo'
																				<div id="collapse4_'.$p.'" class="panel-collapse collapse ">
												                                    <div class="panel-body col-md-12"> ';


 

																			    echo form_open('salesorders/save');
                                                                                echo'   <input type="hidden" class="form-control"  name="sales_id" value="' . $this->uri->segment(3) . '">
																				        <input type="hidden" class="form-control"  name="total" value="' . $total . '">
																	                     freight&nbsp <input type="text" class="form-control"   name="shipping_cost" value="' .$address->shipping_cost. '">
															                                  <input type="hidden" size="10"  name="vat" value=" '.$vat.'" >
																	
																	
                                                                                                                                                        
                                                                                <br>    
															                    <button type="submit" class="btn btn-danger"> Save </button> ';
															                    echo '</form>';
																				
													                          echo '</div>
											           			
															               </div>';
																				}
															 
															  echo '</div>';
															  }
														
															  }
															 
															
													?>
													        </div>
														</div>
														
														
														
														 <div class="col-sm-4 ">
                                                
															<div class="col-sm-12"><h4><strong>Refund Detail</strong></h4>
														
                                                   <?php 
								
                                                                        
															     foreach ($refund->result() as $refund) {
                                                                
                                                            }
															            echo '<div class="panel panel-default  ">
																		            <div class="panel-heading    ">
												                                        <h3 class="panel-title "> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse4_'. $p.'">
																			              Subtotal &nbsp  '.number_format($refund->rf_amount, 2, '.', '') .'&nbsp;'.$address->currency.'<hr>
																						  
                                                                                          Shipping &nbsp '.$refund->rf_ship.'&nbsp;'.$address->currency.'<BR/>
																				       
                                                                                           <hr>
                                                                                            Total&nbsp'. number_format($refund->rf_total, 2, '.', '') .'&nbsp;'.$address->currency.'&nbsp;inc vat
                                                                                           

																						   <hr>
																						   
                                                                                            </strong><br>
																						</a> 
																			            </h3>
											                                        </div>';
											                                    
			
															 
															  echo '</div>';
												
															 
															
													?>
													        </div>
															
												
														</div>
														
														
														
                                                        </div>
														<!--------
                                                        <div class="col-sm-7 col-sm-offset-1">
                                                            <h4>
                                                                <i class="fa fa-envelope"></i>
<?php ?>
                                                            </h4>
                                                            <div class="well">	

                                                                <h5><strong>Shipping Address </strong></h5>
                                                                
                                                                <h5><strong>
                                                                <?php
                                                                if ($address->Address_1 == TRUE) {
                                                                   
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
                                                                ?>

                                                            </div>
                                                        </div>
														
														--->
														
														
                                                    </div>
                                                    <!-- PAYMENT STATUS -->
                                                    <hr> 

                                                
                               
                          
                       
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


<!-- /.shipped -->
<div class="modal fade" id="addBookDialog2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"> Update Backorder Item Status and QTY </h4>
            </div>
            <div class="modal-body">
			
			      <div class="row">
                        <div class="col-md-12">
                            <div class="box border green">
                                <div class="box-title">
                                    <h4><i class="fa fa-bars"></i>Information Review</h4>
                                </div>
                                <div class="box-body big">
								        
                                         <?php echo form_open('salesorders/update_bkorder_to_regular'); ?>
                                                
                                                         <input type="hidden" name="" readonly="readonly" id="bookId" value=""/><br>
             
				                                                         <input type="hidden" name="CCL_item" readonly="readonly" id="bookId2" value=""/><br>
                                         <?php $so_id=$this->uri->segment(3);
?>
				
                                                              
                                    <div class="box-body">
									    <form id="myForm" action="' . base_url() . 'salesorders/update_bkorder_to_regular" method="post">
									     <p> Backorder Item info</p>
										 
										 
										 
										 
										 
										 <?php
                                                $base_url = base_url();
										       
											   $this->db->select('*');
                                                    $this->db->where('sales_id',$so_id);
													  
                                                    $this->db->from('sales_orders_items');
                                                    $bk_item=$this->db->get(); 
												
                                                    
                                                foreach ($bk_item->result() as $bk) {
													
													if($bk->item_qty> 0) {
													?>
									     <table id="datatable" cellpadding="0" cellspacing="0" border="0" class="hours-table datatable table table-striped table-bordered table-hover red">
                                        

										<thead>
                                                <tr>
                                                   <!--- <th>SO item id</th>--->
                                                    <th>item Code</th>
                                                    <th>Description</th>
                                                    <th>Location</th>
                                                    <th>Backorder Qty  </th>
													<th>Unit Price </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                              /*  $base_url = base_url();
										       
											   $this->db->select('*');
                                                    $this->db->where('sales_id',$so_id);
                                                    $this->db->from('sales_orders_items');
                                                    $bk_item=$this->db->get(); 
												
                                                    
                                                foreach ($bk_item->result() as $bk) {
                                                     
												*/	 
													 
													 
													 
													 
													 echo '  <input type="hidden" class="from control"name="so_id" value="' . $so_id . '"/>';
													
													    echo '<tr class="sum gradeX">';
                                                  
                                                           
														echo '	<input type="hidden" class="from control"name="bk_item_id" value="' . $bk->item_id . '"/>';
								
                                                            echo'<td><strong>
                                                            <input type="hidden" class="from control" name="" value="' . $bk->CCL_Item . '"/>
                                                                ' . $bk->CCL_Item . '
                                                                    </strong></td>';
                                                            echo'<td><strong>
                                                            <input type="hidden" class="from control" name="Description" value="' . $bk->Description . '"/>
                                                                ' . $bk->Description . '
                                                                    </strong></td>';
                                                            echo'<td><strong>
                                                                <input type="hidden" class="from control"name="bk_location" value="' . $bk->location . '"/>
                                                            
                                                                    ' . $bk->location . '</strong></td>';
															
                                                            echo'<td><strong>
                                                            
                                                            <input type="hidden" class="from control" name="bk_qty"  value="' . $bk->item_qty . '"/>
															' . $bk->item_qty . '</strong></td>';
                                                            echo'<td><strong>
														
                                                            <input type="hidden" class="from control" name="itemPrice" value="' . $table->sell_price . '" />
                                                                ' . $table->sell_price . '</strong></td>';
														
                                                        echo '</tr>';
                                                       
													
												
															
												$CCL_Item=$bk->CCL_Item;
												$bk_qty=$bk->item_qty;
												
                                                ?>
											

												

                                            </tbody>

                                        </table>
										<p> In-stock Item info</p> 
                                        <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="hours-table datatable table table-striped table-bordered table-hover red">
                                        

										<thead>
                                                <tr> 
												    
                                                    <th>Warehouse id</th>
                                                    <th>item Code</th>
                                                    <th>Description</th>
                                                    <th>Location</th>
                                                    
													<th>Qty Available</th>
													<th>New SO  Qty </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
												 
												
												//echo $bk->item_qty;
												
                                                $base_url = base_url();
												
												 $this->db->select('*');
$this->db->where('CCL_Item',$CCL_Item);
//$this->db->from('sales_orders_items');
$this->db->from('warehouse');
//$this->db->join('warehouse', 'sales_orders_items.CCL_Item = warehouse.CCL_Item');
//$this->db->join('sales_orders', 'sales_orders_items.sales_id = sales_orders.salesorder_id');
$this->db->order_by('qty');
$item_instock=$this->db->get(); 

													
												     $i=0;   
                                                foreach ($item_instock->result() as $table) {
                                                     $i++;
													 
													 
													 //echo '  <input type="text" class="from control"name="item_id' . $i. '" value="' . $table->item_id . '"/>';
													
													 
                                                       
													
													
													
												
													if ($table->qty > 0) {




                                                        echo '<tr class="sum gradeX">';
                                                  
                                                        echo'<td><strong>
                                                           
                                                            <input type="hidden" class="from control"name="wh_item_id' . $i. '" value="' . $table->id . '"/>
                                                          
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
                                                                <input type="hidden" class="from control"name="location' . $i. '" value="' . $table->location . '"/>
                                                            
                                                                    ' . $table->location . '</strong></td>';
														/*echo'<td><strong><div class="form-group"><div class="col-md-2">
                                                            
                                                            <input type="text" class="qty from control" name="qty"  value=""/> Avaiable ' . $table->qty . '<input type="hidden" class="av from control" name="available"  value="' . $table->qty . '"/> backorder <div class="backorder"></div><input type="text" class="bo from control" name="bo"  value=""/> </div></div></strong></td>';
                                                       	*/	
														echo'<td><strong><div class="form-group">'
                                                            
                                                             .$table->qty . '<input type="hidden" class="from control" name="available_qty' . $i. '"  readonly="true" value="' . $table->qty . '"/></div>
															</strong></td>';
                                                        
														
													
                                                        if ($bk_qty>=$table->qty){
															
													        echo'<td><strong>
                                                           
                                                                 <input type="hidden" name="qty'.$i.'"  value="'.$table->qty.'"/><font color="red">'.$table->qty.'</font></strong></td>';
                                                       			$bk_qty=$bk_qty-$table->qty;
																//echo $bk_qty;
													   }
													   else{
														   
														   $bk_qty=$bk_qty;
														    echo'<td><strong>
                                                             
                                                                 <input type="hidden"  name="qty'.$i.'"  value="'.$bk_qty.'"/><font color="red"> '.$bk_qty.'</font></strong></td>';
                                                       		
																//echo $bk_qty;
														   
													   }
														
													
                                                       
                                                        echo '</tr>';
                                                       
//echo'<td><input type="submit" value="Add" class="btn btn-primary"></button></td>';
													 
                                                    }
													//  echo form_close();
                                                }
												
													$j=$i;	
												  echo'<input type="hidden"  name="count" value="' . $j . '" />';
                                                          
                                                ?>
											

												

                                            </tbody>

                                        </table>
										
										<input type="submit" value="Submit" class="btn btn-primary pull-right"></br>
										<?php  }
													}
                                                ?>	
										</form>
                                    </div>
									
				                                 
             
			                    
			                             <div class="modal-footer">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                           


                                         </div>
									</div>	 
                             </div>
                         </div>  
                    </div> 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

 

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
          App.setPage("dynamic_table");  //Set current page      20141209
	    //App.setPage("jqgrid_plugin");
		App.setPage("view_refund"); 
        App.init(); //Initialise plugins and elements
    });
//loads datatables
  $(document).ready(function() {
        $('#datatable1').dataTable();
       $('#datatable2').dataTable();
	   $('#datepicker').datepicker({minDate: -1, maxDate: "+1"});
	    $('#datepickerFrom').datepicker();
		 $('#datepickerTo').datepicker();//select date   viola 20150326
  
    });


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
    
    $(document).on("click", ".open-AddBookDialog", function() {
        var myBookId = $(this).data('id');
        $(".modal-body #bookId").val(myBookId);
        // As pointed out in comments, 
        // it is superfluous to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });
 $(document).on("click", ".open-AddEditinfoDialog", function() {
        var myBookId = $(this).data('id');
        $(".modal-body #bookId").val(myBookId);
		
		 var myBookId2 = $(this).data('id2');
		$(".modal-body #bookId2").val(myBookId2);
		
		 var myBookId3 = $(this).data('id3');
		$(".modal-body #bookId3").val(myBookId3);
		
		 var myBookId4 = $(this).data('id4');
		$(".modal-body #bookId4").val(myBookId4);
         
		      var myBookId5 = $(this).data('id5');
        $(".modal-body #bookId5").val(myBookId5);
		var myBookId6 = $(this).data('id6');
        $(".modal-body #bookId6").val(myBookId6);
		var myBookId7 = $(this).data('id7');
        $(".modal-body #bookId7").val(myBookId7);
		var myBookId8 = $(this).data('id8');
        $(".modal-body #bookId8").val(myBookId8);
		
		
    });
</script>
	
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure to remove it?');
    });
/*
window.addEventListener("beforeunload", function (e) {
    //var confirmationMessage = 'It looks like you have been editing something.';
	var confirmationMessage = 'Notice:Please saveing changes If you have been editing something.';
    confirmationMessage += 'If you leave before saving, your changes will be lost.';

    (e || window.event).returnValue = confirmationMessage; //Gecko + IE
    return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
});
*/
</script>
<!-- /JAVASCRIPTS -->

<?php echo Modules::run('template/footer'); ?>	        