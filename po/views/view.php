<script src="http://malsup.github.com/jquery.form.js"></script> 
<!-- UNIFORM -->
<title>Crown | Purchase Orders</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/uniform/css/uniform.default.min.css" />

<link href="<?php echo base_url()?>/assets/jqueryui-editable/css/jqueryui-editable.css" rel="stylesheet"/>

<head>
<body>

<?php echo Modules::run('template/menu'); ?>
<?php
foreach ($po->result()as $currency) {
    
}

?>


<!-- PAGE -->

    <div id="main-content">
        <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Re-order Item</h4>
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
                                                    <th>Vendor Code</th>
                                                    <th>Vendor Name </th>
                                                    <th>item Code</th>
                                                    <th>Description</th>
                                                    <th>Per Carton Qty</th>
                                                    <th>Carton Order Qty = Amount of Items</th>
                                                    <th> Buy Price </th>
                                                    <th>CBM </th>
                                                    <th> add </th>
                                                </tr>
                                            </thead>
                                            <tbody >

                                                <?php
												
													   
	   	
												
												
                                                $base_url = base_url();
                                                foreach ($query->result() as $table) {
                                                       




                                                    echo '<tr>';
                                                    echo '<form id="itemlist" class="form-inline" action="' . base_url() . 'po/item_added" method="post">';
                                                    echo'<div class="form-group">
                                                        <td>' . $table->vendor_code . '</td> 
                                                        <td>' . $table->vendors_name . '</td> 
                                                        <td>' . $table->CCL_Item . '</td> 
                                                        <td>' . $table->Description . '</td>
                                                            
                                                        <td><div class="col-sm-10">
														         <input type="text"  readonly="readonly" class="form-control"  name="CTN_QTY" value="' . $table->QTY_CTN . '"></div></td>
                                                          <td><div class="">
														         <input type="text" class="form-control"  name="carton_ordered" value=""></div>  
																 <div class=""><input type="text" readonly="readonly" class="amount form-control" name="qty" value="">
															    </div>
														    </td>';
                                                           if( $currency->currency === 'EUR'){
                                                            echo'<td><input type="text"  class="form-control" name="itemprice"   value="' . $table->EUR_Px . '"/></div></td>';
                                                        }
                                                        elseif( $currency->currency === 'USD'){
                                                            echo'<td><input type="text"  class="form-control" name="itemprice"   value="' . $table->DDU_Px . '"/></div></td>';
                                                        }
 
                                                        else {
                                                            echo'<td><input type="text"  class="form-control" name="itemprice"   value="' . $table->buy_price . '"/></div></td>';
                                                }
                                                        

    
                                                    
                                                    echo '<td>
                                                        <input type="hidden" class="Valone"   value="' . $table->CTN_W . '"/>
                                                        <input type="hidden" class="Valtwo"  value="' . $table->CTN_L . '"/>
                                                        <input type="hidden" class="Valthree" value="' . $table->CTN_H . '"/> 
                                                         
                    <input type="text" class="cbm form-control"  name="cbm" value="0">
                    <input type="hidden" name="product_id"  value="' . $table->id . '"/>
                    <input type="hidden" name="Description" class="Valthree" value="' . $table->Description . '"/>
                    <input type="hidden" name="CCL_Item" class="Valthree" value="' . $table->CCL_Item . '"/> 
                    <input type="hidden" name="vendor_code" class="Valthree" value="' . $table->vendor_code . '"/>
                    <input type="hidden" name="poid" class="Valthree" value="' . $this->uri->segment(3) . '"/>
                   <input type="hidden" name="CTN_W"  value="' . $table->CTN_W . '"/>
                    <input type="hidden" name="CTN_L"  value="' . $table->CTN_L . '"/>
                    <input type="hidden" name="CTN_H"  value="' . $table->CTN_H . '"/>
                    <input type="hidden" name="vendor_name"  value="' . $table->vendors_name . '"/>
                  </td>
                        
                    <td><input type="submit" name=" submit"  value="ADD" class="btn btn-primary"></button></td> ';
                                                    echo '</form></tr>';


                                               
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
                                        <a href="<?php echo base_url(); ?>index.php/po">Purchase Orders</a>
                                    </li>
                                    <li>Po</li>
                                </ul>
                                <!-- /BREADCRUMBS -->
                                <div class="clearfix">
                                    <h3 class="content-title pull-left">Purchase Orders</h3>
                                </div>
                                <div class="description">Purchase Orders Order Details </div>
                            </div>
                        </div>
                    </div>
                    <!-- /PAGE HEADER -->
					<!-- invoice add-->
                        <div class="row">
                    
					        <div class="col-md-2">
						        <div class="text-center">
							        <div class="btn-group">
									<a class="btn btn-sm btn-info" href="<?php echo base_url();?>po"> <i class="fa fa-reply"></i>   Back
                                                                
									</a>
									
							    </div>
						    </div>
					    

					        </div>
                        </div>
                <!-- /invoice add -->
                    <!-- ORDERS -->
					<div class="separator"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BOX -->
                            <div class="box border orange">
                                <div class="box-title">
                                    <h4><i class="fa fa-list-ul"></i>Purchase Orders Details: <?php echo 'PO-' . substr(sprintf('%06d', $this->uri->segment(3)),0,6); ?>&nbsp; to &nbsp;
									                             <?php echo 'Vendor-' .$currency->Vendor_name; ?></h4>
                                    <div class="tools">

                                    </div>
                                </div>
                                <div class="box-body">
                                    <!-- ORDERS -->
                                    <div class="row">

                                        <!-- ORDER DETAILS -->
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="col-md-2 pull-left">

                                                        <?php
                                                        echo form_open('po/save');
                                                        echo form_hidden('total', $total);
                                                        echo form_hidden('cbm', $totalCBM);
                                                        ?>
                                                        <input type="hidden" name="id" class="Valthree" value="<?php echo $this->uri->segment(3); ?>"/>
                                                        <button type="submit" class="btn btn-block btn-sm btn-success"><i class="fa fa-check"></i> Save</button>
                                                    </form>
                                                        
                                                         
                                                    <form action="<?php echo base_url();?>po/saveandexit" method="post">
                                                       <?php echo form_hidden('total', $total);
                                                        echo form_hidden('cbm', $totalCBM);
                                                        ?>
                                                        <input type="hidden" name="id" class="Valthree" value="<?php echo $this->uri->segment(3); ?>"/><br>
                                                        <button type="submit" class="btn btn-block btn-sm btn-success"><i class="fa fa-check"></i> Save and Exit</button>
                                                    </form>


                                                    </div>
                                                    <div class="col-md-5 col-md-offset-5 pull-right hidden-xs">
                                                             <i class="fa fa-truck fa-2x"> Total CBM = <?php print_r($totalCBM); ?>
                                                                </i>
																</br></br>
                                                        <div class="btn-group pull-right">
                                                       
														   <button class="btn btn-warning" href="#box-config" data-toggle="modal" ><i class="fa fa-bars"></i> Order Item </button>
                                                            <button class="btn btn-warning" href="#addnewitem" data-toggle="modal" ><i class="fa fa-bars"></i> New  Item </button>
                                                            <!--
															<button class="btn  btn-default"href="#part-received" data-toggle="modal"  ><i class="fa fa-bars"></i> Part Received </button>
                                                            -->
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="clearfix"></div>
                                                    <hr>
                                                    <table class='table table-hover'>
                                                        <thead>
                                                            <tr>
															  <?php 
															if ($currency->status === 'Pending') {
															
															echo'<td class="text-left" >Remove</td>';
															}
														    else  
															{
															   echo'<td  class="text-left" >Location</td>';
																}
															
															?>
															    <td class=" col-md-1" >Zenith Code</td>
                                                                <td>Description</td>
																<td class=" col-md-1 hidden-xs" >Vendor Code</td>
                                                                
                                                               
                                                                <td class=" col-md-2">Detail</td> 
                                                                <td class=" hidden-xs">QTY/per CTN</td>
																<td class=" hidden-xs">QTY</td>
																<td class=" hidden-xs">Unit Price</td>
																<td>Subtotal</td>
                                                                
                                                                
                                                                <td class="text-center  col-md-3 ">Order/Receive</td>
																<td>CBM</td>
														
															
                                                            </tr>
                                                        </thead>
														<tbody>
                                                        <?php
														 $base_url = base_url();
														$i=0; 
														$q=0; 
														$c=0;
                                                        //echo'<tr>';
                                                            foreach ($po_items->result() as $item) {
                                                                                      
																			
                                                          
															echo '<tr class="sum gradeX">';
															//echo'<td>';
															if ($item->received === 'NO')
															//  if ($currency->status === 'Pending') 
															  {
                                                            echo'<td><form method="POST" action="'. $base_url .'po/delete_item">
                                                                        <input type="hidden" name="itemID" value="'. $item->item_id . '"/>
                                                                        <input type="hidden" name="poid" value="' . $item->po_id . '"/>
                                                                        <button type="submit" class="confirmation btn-danger">X</button>
                                                            </form></td>';
															}
															else{
																														
															 
																   //echo'<td> test loc</td> ';
																   echo '<td><strong><font color="blue">Received</font><strong></td>';
																  
															}
       
															//echo'</td>'; 
															
															
														
													
															
															 echo'<td>' . $item->CCL_Item . '</td>';
															 echo'<td class="col-md-3">' . $item->Description . '</td>';
															 echo'<td>' . $item->vendor_code . '</td> ';
                                                          
															    if ($item->received === 'NO'){
															//  if ($currency->status === 'Pending') 
															    
															        echo '<td>  ';
														                        $q++; 
															        { 
                                                                        echo '<div class="panel panel-info  ">
																		            <div class="panel-heading    ">
												                                        <h5 class="panel-title "> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse3_'. $q.'">
																			             '  . $item->carton_ordered . '   Ctns<br> ' . $item->ItemPrice . '/pc
																			            </a> 
																			            </h5>
											                                        </div>
											                                    <div id="collapse3_'.$q.'" class="panel-collapse collapse ">
												                                <div class="panel-body col-md-12"> ';
														                        echo '<form  action="' . $base_url . 'index.php/po/update_po/'.$item->po_id.'" method="POST">';
													
      															//echo' <td><div class="box border red">' . form_open('po/received_'.$currency->currency.'') . '
                                                                        echo'   <input type="hidden" class="form-control"  name="item_id" value="' . $item->item_id . '">
                                                                                <input type="hidden" class="form-control"  name="wh_id" value="' . $item->wh_item_id . '">
																	            <input type="hidden" class="form-control"  name="po_refer" value="' . $currency->po_refer . '">
																				<input type="hidden" class="form-control"  name="CTN_QTY" value="' . $item->CTN_QTY . '">
                                                                                <input type="hidden" class="form-control"  name="CBM" value="' . $item->CTN_W * $item->CTN_H * $item->CTN_L/1000000 . '">
																	                qty<input type="number" class="form-control"  name="carton_ordered" value="' . $item->carton_ordered . '">
															                    unit price<input type="text" class="form-control"  name="ItemPrice" value="' . $item->ItemPrice . '">
																	            
																	
                                                                                                                                                        
                                                                                <br>    
															                    <button type="submit" class="btn btn-danger"> Save </button> ';
															                    echo '</form>';
													                     echo '</div>';
											           			
															 echo '</div></div>';
															  }
															   echo'  </td>';
															  }
															  else{
																  echo '<td><h6 class="panel-title "> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse3_'. $q.'">
																			       '  . $item->carton_ordered . '   Ctns<br>  ' . $item->ItemPrice . '/pc
																			    </a> 
																			</h6> 
																		</td>';
															  }
															
															

															echo'<td class="text-center ">' . $item->CTN_QTY . ' </td>';
															echo'<td class="text-center ">' . $item->item_qty . ' </td>';
															echo'<td class="text-center ">' . $item->ItemPrice . ' </td>';
															echo'<td class="text-center">' . $item->item_qty . 'x' . $item->ItemPrice . '</br>=' . $item->itemlinetotal . '</td> ';                                                           
                                                           
                                                            
														        if(  ($currency->status != 'Completed')){
															 
																    if ($item->received === 'NO'){
                                                                
                                                                     echo '<td>  ';
														             $i++; 
															        { 
                                                                         echo '<div class="panel panel-primary  ">											                            
																		             <div class="panel-heading    ">
																		 
												                                        <h6 class="panel-title "> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1_'.$i.'">
																			                Order QTY :  '  . $item->item_qty  . '<br>Location:   
																			                </a> 
																			            </h6>
											                                         </div>
											                                    <div id="collapse1_'.$i.'" class="panel-collapse collapse ">
												                                    <div class="panel-body col-md-6"> ';
														                          echo '<form  action="' . $base_url . 'index.php/po/received_" method="POST">';
													
      															
                                                                                  echo'    <input type="hidden" class="form-control"  name="id" value="' . $item->item_id . '">
																				          
                                                                                            <input type="hidden" class="form-control"  name="wh_id" value="' . $item->wh_item_id . '">
																	                        <input type="hidden" class="form-control"  name="po_refer" value="' . $currency->po_refer . '">
                                                                                                 <div class="form-group">QTY order
																                                	<input type="number"  size="10"    readonly="readonly" name="itemQty" value="' . $item->item_qty . '">
															                                     </div> 
																	                             <div class="form-group">QTY recevied
													                    
													                                                 <input type="number"   size="10"  name="recevied" value="' . $item->item_qty . '">
												                                                 </div>
																	
                                                                                            <div class="form-group">Location
																					    
                                                                                                 <select name="location" id="el"  required="required" >
                                                                                             <option></option>';                         
                                
                                                                                                $location=$this->db->select('*') ->group_by('location')  ->get('warehouse_location'); 

								                                                                 foreach ($location->result()as $loc){ 
								                                                                
                                                                                                    echo '<option  value="' . $loc->location. '">' . $loc->location . '</option>  ';
                                                                                                 }
                                
                                                                                                echo'             
													                                            </select>	
							                                                                 </div>                                                                                         
                                                                <br>    
															  <button type="submit" class="btn btn-danger"> Received </button>
															  
															  ';
															  
															         echo '</form>';
														echo '</div>';
																echo '</div>';		
																	echo '</div>';	
														
										  
										  
										  
                         										 
																 }
																
																
															   echo'  </td>';
															 
															   
															   
															   
															   

														   } 
										
															elseif ($item->received === 'YES') {
															$po_item_id=$this->db->select('*')->where('po_item_id',$item->item_id)->get('warehouse');
                             
                            
															echo'<td class="text-center col-md-1 ">Qty Received:' . $item->item_qty . '</br>Stock Location:';
															 foreach ($po_item_id->result() as $p) { 
															echo  $p->location . '</td> ';
															 }
								
															}	
															
																}
															if ($currency->status === 'Shipped') 
															{
															
															

                                                                echo'  <td>' . form_open('po/received_') . '
																<input type="hidden" class="form-control"  name="currency" value="'.$currency->currency.'">
                                                                <input type="hidden" class="cbm form-control"  name="id" value="' . $item->item_id . '">
                                                                <input type="hidden" class="cbm form-control"  name="wh_id" value="' . $item->wh_item_id . '">
                                                                <input type="hidden" class="cbm form-control"  name="qtyrecevied" value="' . $item->item_qty . '">';
                                                                  if($item->booked_in === 'No'){
                                                                      
                                                                 
                                                      
                                                           } 
                                                           else 
                                                               {
                                                             echo' <a class="btn btn-success" href="">Booked In</a></td>';
                                                        
                                                           }
                                                           
                                                           
                                                                  }
                                                            echo'<td>';
															     if (isset($item->CBM)&&$item->CBM>=0){
 																	 echo  ''.number_format($item->CBM, 4, '.', '').'';
																	 
																	 }
                                                        }
                                                            
															  echo '</tr>';
                                                        
                                                        ?>


                                                        </tbody>
                                                    </table>
                                                    <!-- TABLE -->

                                                    <!-- /TABLE -->
                                                    <div class="text-right">
                                                        <h3></h3>
                                                    </div>
                                                    <hr>
                                                    <!-- CUSTOMER DETAILS -->
                                                    <div class="row">
                                                        <div class="col-sm-4 pull-left hidden-xs">
                                                            <h4>
                                                               

                                                            </h4>
                                                            <form id="po_notes" >
                                                                <input type="hidden" name="poid" value="<?php echo $this->uri->segment(3);?>" />
                                                                <textarea  name="po_notes"class="col-md-8" style="height:100px;"><?php echo $currency->po_notes;?></textarea>
                                                                <button type="submit" class="btn btn-success">save notes</button>
                                                            </form>
                                                        
                                                        </div>
														 <!-- CUSTOMER DETAILS -->
														 <div class="col-sm-4">
                                                            <div class="col-sm-12"><h4><strong>Value Detail</strong></h4>
														 
                                                   <?php 
												            $freight_cost = $currency->freight_cost;
                                                            $Grand_total =$currency->Grand_total;
												            $duty = $currency->duty;
                                                            $vat_amount = $currency->VAT_ammount;
															$price_with_vat= $currency->inc_vat;
															$vat_percent=$currency->vat_percent;
												   $p=1;
												        {
															//  if ($currency->status === 'Pending') 
															    
															        
														                        $p++; 
															        { 
                                                                        
																		echo '<div class="panel panel-info  ">
																		            <div class="panel-heading    ">
												                                        <h4 class="panel-title "> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse4_'. $p.'">
																			              Subtotal &nbsp  '.number_format($Grand_total, 2, '.', '') .'&nbsp;'.$currency->currency. '<hr>
																						  Vat &nbsp  '.number_format($vat_amount, 2, '.', '') .'&nbsp;'.$currency->currency. '
                                                            
																				 
                                                                                           <hr>
                                                                                            Total&nbsp'. number_format($price_with_vat, 2, '.', '') .'&nbsp;'.$currency->currency.'inc vat
                                                                                           

																						   <hr>
																						   <table><tr><td>Freight&nbsp </td><td>'.$freight_cost .'&nbsp;'.$currency->currency.'<td></tr> 
																			            
																						  <tr><td>Duty &nbsp</td><td>' .number_format($duty, 2, '.', '') .'&nbsp;'.$currency->currency.'<td></tr>  
															                              
																						  </table> 
																						   
                                                                                            </strong><br>
																						</a> 
																			            </h4>
											                                        </div>
											                                    <div id="collapse4_'.$p.'" class="panel-collapse collapse ">
												                                <div class="panel-body col-md-12"> ';
														                        echo '<form  action="' . $base_url . 'index.php/po/update_total/'.$this->uri->segment(3).'" method="POST">';
                                                                                echo'   <input type="hidden" class="form-control"  name="Grand_total" value="' . $Grand_total . '">
																	                     freight&nbsp <input type="text" class="form-control"   name="freight_cost" value="' . $freight_cost. '">
															                             duty &nbsp <input type="text"class="form-control"   name="duty" value="' . $duty . '">
																	                     vat&nbsp <input type="text" size="10"  name="vat_percent" value=" '.$vat_percent.'" >%
																	
                                                                                                                                                        
                                                                                <br>    
															                    <button type="submit" class="btn btn-block btn-danger"> Save </button> ';
															                    echo '</form>';
													                     echo '</div>';
											           			
															 echo '</div></div>';
															  }
														
															  }
															 
															
													?>
													        </div>
														</div>
													
													

												   <!-- PAYMENT STATUS -->
													 <div class="col-sm-3 pull-right">
                                                            <h4>
                                                                <i class="fa fa-money"></i>
                                                                  <strong>Payment Status</strong>
                                                            </h4>

                                                            <h4><strong>Total Value</strong>
                                                                <div class="price1"><?php echo $currency->currency; ?> <?php print_r($price_with_vat); ?></span></div></h4>
                                                            </h4> 
                                                            <?php
                                                            if ($currency->currency !== 'GBP') {
                                                                //echo '</h2><button class="btn btn-default"  href="#convert" data-toggle="modal">Convert</button>';
                                                            }
                                                            ?>

                                                            <h4><strong> <?php
                                                                    /*

                                                                      Usage:

                                                                      You want to calculate 17.5% VAT on a price of £4.67

                                                                      $price_without_vat = 4.67

                                                                      echo vat($price_without_vat);

                                                                      This would return the new amount with 17.5% added, and would be rounded to 2 decimal places

                                                                     */
                                                            
                                                            
                                                            $q=$this->db->select('SUM(amount) as paid')->where('po_id',$this->uri->segment(3))->get('po_payments');
                                                            
                ;
                                                           $row=$q->row();
                                                           $paid=$row-> paid ;?>
															<h4><strong>Paid</strong>
                                                                <div class="price1"><?php echo $currency->currency; ?> <?php print_r($paid); ?></span></div></h4>
                                                            </h4>
															<h4><strong>Balance</strong>
                                                                <div class="price1"><?php echo $currency->currency; ?> <?php print_r($price_with_vat-$paid); ?></span></div></h4>
                                                            </h4>
															
															
															
															<button class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#mypayment">
  See Payments made
</button>
                                                                </strong></h4><br>
                                                        </div>
                                                       
                                                    </div>
                                                    <!-- PAYMENT STATUS -->
                                                    <hr> 


                                                </div>
                                                <!-- /PANEL BODY --> 

                                            </div>
                                        </div>
                                        <!-- /ORDER DETAILS -->
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
<!-- Modal -->
<div class="modal fade" id="mypayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 <h4 class="modal-title" id="myModalLabel">Payment Details</h4>
            </div>
            <div class="modal-body">
           <?php 
               $payment_id = $this->uri->segment(3);
               echo Modules::run('po/payments_made',$payment_id);?>
            </div>
           <div class="modal-footer">
        <button type="button" class="btn btn-block btn-primary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div> 
   
  <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="addnewitem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New item </h4>
                </div>
                <div class="modal-body">
                  
       
    <form  action="<?php echo base_url(); ?>po/addtowarehouse" method="post" class="form-horizontal ">							
        
                           <div class="row">
														 <div class="col-md-12">
															<div class="box border green">
																<div class="box-title">
																	<h4><i class="fa fa-bars"></i>Add Information / Update Warehouse Item List</h4>
																</div>
																<div class="box-body big">
                                                                                                                                    
																	<div class="row">
																	 <div class="col-md-12">
																		<h4>New Item Information</h4>
                                                                                                                                          
																		<div class="form-group">
																		   <label class="col-md-4 control-label">CCL Code (optional)</label> 
																		   <div class="col-md-8"><input type="text" name="CCL_Item"  required="" class="form-control" value=""></div>
																		</div>
                                                                                                                                                
                                                                                                                                                <div class="form-group">
																		   <label class="col-md-4 control-label">Description </label> 
                                                                                                                                                   <div class="col-md-8"><textarea  name="Description" class="form-control" ></textarea></div>
																		</div>
                                                                                                                                                <div class="form-group">
																		   <label class="col-md-4 control-label">Stock Qty</label> 
																		   <div class="col-md-8"><input type="text" name="qty" class="form-control" value=""></div>
																		</div>
															
																		
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Length</label> 
																		   <div class="col-md-8"><input type="text" name="L" class="form-control" value=""></div>
																		</div>
                                                                                                                                                
                                                                                                                                                <div class="form-group">
																		   <label class="col-md-4 control-label">Width </label> 
																		   <div class="col-md-8"><input type="text" name="W" class="form-control" value=""></div>
																		</div>
																		
                                                                                                                                                <div class="form-group">
																		   <label class="col-md-4 control-label">Height</label> 
																		   <div class="col-md-8"><input type="text" name="H" class="form-control" value=""></div>
																		</div>
                                                                                                                                                  <div class="form-group">
																		   <label class="col-md-4 control-label"> Items Per Carton</label> 
																		   <div class="col-md-8"><input type="text" name="QTY_CTN" class="form-control" value=""></div>
																		</div>
                                                                                                                                                
                                                                                                                                                
                                                                                                                                                
                                                                                                                                                
                                                                                                                                                
                                                                                                                                                 <div class="form-group">
																		   <label class="col-md-4 control-label">USD  Buy Price</label> 
																		   <div class="col-md-8"><input type="text" name="DDU_Px" class="form-control" value=""></div>
																		</div>
                                                                                                                                                
                                                                                                                                                 <div class="form-group">
																		   <label class="col-md-4 control-label">EURO Buy Price</label> 
																		   <div class="col-md-8"><input type="text" name="postcode" class="form-control" value=""></div>
																		</div>
                                                                                                                                                
                                                                                                                                                  <div class="form-group">
																		   <label class="col-md-4 control-label">GB Buy Price</label> 
																		   <div class="col-md-8"><input type="text" name="buy_price" class="form-control" value=""></div>
																		</div>
																		
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Sell Price</label> 
																		   <div class="col-md-8">
																				<div class="input-group">
                                                                                                                                                                    <span class="input-group-addon">&pound;</span>
																				  <input type="text" name="sell_price" class="form-control" placeholder="Sell Price" value="">
																				</div>																			
																		   </div>
																		</div>
                                                                                                                                                <div class="form-group">
																		   <label class="col-md-4 control-label"></label> 
																		   <div class="col-md-8">
																				<div class="input-group">
                                                                                                                                                                    <input type="hidden" value="<?php echo $currency->Vendor_name;?>" name="vendor">
                                                                                                                                                                     <input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="id">
                                                                                                                                                                 <button id="move" type="submit" class="btn btn-primary" onclick="greaterNum()">Save</button>    
                                                                                                                                                                </div>																			
																		   </div>
																		</div>
                                                                                                                                                
                                                                                                                                                 
       
																	 </div>
																  </div>
																</div>
															</div>
                                                                                                                 </div></div>
       
    
       
                        </form>


                    <!-- /DATE PICKER -->
               
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="part-received" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Part-Received</h4>
                    </div>
                    <div class="modal-body">
                         
                            <div class="box-body">
                                    <!-- ORDERS -->
                                    <div class="row">

                                        <!-- ORDER DETAILS -->
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    
                                                    <div class="clearfix"></div>
                                                    <hr>
                                                    <table class='table table-hover'>
                                                        <thead>
                                                            <tr>
                                                                <td>Vendor Code</td>
                                                                <td>CCL Code</td>
                                                                <td>Description</td>
																<!------
                                                                <td>Items Ordered</td>
                                                                <td>Cost</td>
                                                                <td>CBM</td>
																---->
                                                                <td>Cartons Ordered</td>
																<td>Cartons Received</td>
                                                                <td>Change</td>
                                                            </tr>
                                                        </thead>
                                                        <form action="<?php echo base_url(); ?>po/split_po" method="post">
                   
                                                        <?php
                                                        echo'<tr>';
                                                        foreach ($po_items->result() as $item) {

                                                            echo'<td>' . $item->vendor_code . '</td> ';
                                                            
                                                            echo'<td>' . $item->CCL_Item . '</td>';
                                                            echo'<td class="col-md-3">' . $item->Description . '</td>';
                                                           // echo'<td class="text-center">' . $item->item_qty . '</td> ';
                                                           // echo'<td class="text-center">' . $item->itemlinetotal . '</td> ';
                                                           // echo'<td>' . $item->CBM . '</td> ';
                                                            
                                                            
															
															echo'<td class="text-center">' . $item->carton_ordered . ' Ctns</td>';
															echo'<td><input type="text" name="receive_qty"  value="" placeholder=" "/></td> ';
                                                            if ($currency->status === 'Pending') {
                                                            /*    echo' 
                                                            <td>
                                                            <form method="POST" action="'. $base_url .'po/delete_item">
                                                                        <input type="hidden" name="itemID" value="' . $item->item_id . '"/>
                                                                        <input type="hidden" name="poid" value="' . $item->po_id . '"/>
                                                                        <button type="submit" class="btn btn-danger">X</button>
                                                            </form>
                                                            
															
															
															</div></td>'; */
                                                             echo'  <td>' . form_open('po/received_'.$currency->currency.'') . '
                                                             <input type="hidden" class="cbm form-control"  name="id" value="' . $item->item_id . '">
                                                             <input type="hidden" class="cbm form-control"  name="wh_id" value="' . $item->wh_item_id . '">
                                                              <input type="hidden" class="cbm form-control"  name="qtyrecevied" value="' . $item->item_qty . '">
															  
															  
															<div class="form-group">
													                <label class="sr-only" for="exampleInputEmail2">Items Qty Ordered</label>
													                <input type="number" class="form-control" id="qty_recevied" value="' . $item->item_qty . '>
												            </div>
												            <div class="form-group">
													                <label class="sr-only" for="">Items Delivered</label>
													                <input type="number" class="form-control" name="recevied" value="">
												            </div>
															  
															  
															  
															  
															  <button type="submit" class="btn btn-danger">R</button>
															  
															  ';
															  
															   echo  form_close().'
															   
															   </div></td>';    
                                                                
                                                            } elseif ($currency->status === 'Shipped') {

                                                                echo'  <td>' . form_open('po/received_'.$currency->currency.'') . '
                                                      <input type="hidden" class="cbm form-control"  name="id" value="' . $item->item_id . '">
                                                          <input type="hidden" class="cbm form-control"  name="wh_id" value="' . $item->wh_item_id . '">
                                                              <input type="hidden" class="cbm form-control"  name="qtyrecevied" value="' . $item->item_qty . '">';
															  
															   echo form_close(); 
															  
                                                                  if($item->booked_in === 'No'){
                                                                      
                                                                 
                                                      
                                                           } 
                                                           else 
                                                               {
                                                             echo' <a class="btn btn-success" href="">Booked In</a></td>';
                                                        
                                                           }
                                                           
                                                           
                                                                  }


                                                            echo '</tr>';
                                                        }
                                                        ?>
                   


                                                        </tbody>
                                                    </table>
                  						   
												   
                                                    <input type="hidden" name="bookId" id="bookId" value="" placeholder=""/>
                                                    <input type="number" name="Amount"  value="" placeholder="0.00"/>
                                                    <input type="text" name="method"  value="" placeholder="Payment Type"/>
                                                    <input type="date" name="date_paid"  value="" placeholder=" date"/>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                            
                                                    <!-- PAYMENT STATUS -->
                                                    <hr> 


                                                </div>
                                                <!-- /PANEL BODY --> 

                                    </div>
									
									 <!-- ORDERS -->
                                    <div class="row">

									
									<?php
echo form_open('po/received_'.$currency->currency.'', 'class="form-horizontal "');
echo Modules::run('po/received');

foreach ($po_items->result() as $row) {
 




?>
<!-- BASIC -->
										<div class="box border orange">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Basic form elements</h4>
												<div class="tools hidden-xs">
													
												</div>
											</div>
											<div class="box-body big">
												
												<div class="separator"></div>
												<h3 class="form-title">Received Items</h3>
												<form class="form-inline" role="form">
												  <div class="form-group">
													<label class="sr-only" for="exampleInputEmail2">Items Qty Ordered</label>Items Qty Ordered
													<input type="number" class="form-control" id="qty_recevied" value="<?php echo $row->item_qty; ?>">
												  </div>
												  <div class="form-group">
													<label class="sr-only" for="">Items Delivered</label>Items Delivered
													<input type="number" class="form-control" name="recevied" value="">
												  </div>
												  <button type="submit" class="btn btn-primary"> Save</button>
												</form>
												
												

											</div>
										</div>
<?php										}?>
	
<?php echo form_close(); ?>	
	
									</div>
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
                            </div>
                                        <!-- /ORDER DETAILS -->
                      

                    </div>
                   
















				   <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
       </div>
        <!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->

    <?php echo Modules::run('template/footer'); ?>	
  
 
 

<!--/PAGE -->
<!-- JAVASCRIPTS -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JQUERY -->
<script src="<?php echo base_url(); ?>assets/js/jquery/jquery-2.0.3.min.js"></script>
<!-- JQUERY UI-->
<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
<!-- BOOTSTRAP -->
<script src="<?php echo base_url(); ?>assets/bootstrap-dist/js/bootstrap.min.js"></script>
<!-- JQUERY -->


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




<!--<script src="http://malsup.github.com/jquery.form.js"></script> -->


<script src="http://malsup.github.com/jquery.form.js"></script> 


<!-- CUSTOM SCRIPT -->

<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script>
    jQuery(document).ready(function() {
        App.setPage("forms");  //Set current page	  
        App.init(); //Initialise plugins and elements
    });

    $(document).ready(function() {
        $('#datatable1').dataTable();
		
  
    });
	$(document).ready(function() {
      
		$('.edit').editable('<?php echo base_url();?>po/shippingupdate', {
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
        // var myBookId2 = $(this).data('id2');
		//$(".modal-body #bookId2").val(myBookId2);// As pointed out in comments, 
        // it is superfluous to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });

    function doCalc() {
        var total = 0;
        var CBM = 1000000;
        $('tr').each(function() {
            $(this).find('input.amount').val($('input:eq(0)', this).val() * $('input:eq(1)', this).val());
        });

        $('tr').each(function() {
            $(this).find('input.cbm').val($('input:eq(4)', this).val() * $('input:eq(5)', this).val() * $('input:eq(6)', this).val() / (CBM) * $('input:eq(1)', this).val());
        });

        $('.amount').each(function() {
            total += parseInt($(this).text(), 10);
        });

        $('.cbm').each(function() {
            total += parseInt($(this).text(), 10);
        });
        $('div.total_amount').html(total);
    }
    $('input').keyup(doCalc);



// this is the id of the form
$("#po_notes").submit(function() {

    var url = "<?php echo base_url();?>po/save_notes/"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#po_notes").serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert('saved notes'); // show response from the php script.
           }
         });

    return false; // avoid to execute the actual submit of the form.
});
  $(document).ready(function() {
   
 });
    
</script>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure to delete it?');
    });
	
</script>
<script type="text/javascript">
    $('.refresh').on('click', function () {
        return confirm('Save Changed');
    });
	
</script>



<!-- /JAVASCRIPTS -->

</body>
</html>        