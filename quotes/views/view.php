<?php echo Modules::run('template/dash_head'); ?>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<!-- UNIFORM -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/uniform/css/uniform.default.min.css" />
<!-- DATA TABLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
<!-- TYPEAHEAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/typeahead/typeahead.css" />
<!-- SELECT2 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select2/select2.min.css" />
<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/animatecss/animate.min.css" />
        <!-- JQUERY UI-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.min.css" />
	 <!-- TODO -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/jquery-todo/css/styles.css" />
		<!-- GRITTER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/gritter/css/jquery.gritter.css" />


</head>
<body>

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
                                        <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Item Code</th>

                                                    <th>Description</th>
                                                    <th>Location</th>
                                                    <th>Qty Available</th>
                                                    <th> Price </th>
                                                    <th> add </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $base_url = base_url();
                                                foreach ($query->result() as $table) {
                                                   // if ($table->qty > 0) {




                                                        echo '<tr class="gradeX">';
                                                        echo '<form id="myForm" action="' . base_url() . 'quotes/item_added" method="post">';

                                                        echo'<td><strong>
                                                            <input type="hidden" class="from control"name="soid" value="' . $this->uri->segment(3) . '"/>
                                                            <input type="hidden" class="from control"name="id" value="' . $table->id . '"/>
                                                                ' . $table->id . '</strong></td>';
                                                        echo'<td><strong>
                                                            <input type="hidden" class="from control"name="CCL_Item" value="' . $table->CCL_Item . '"/>
                                                                ' . $table->CCL_Item . '
                                                                    </strong></td>';
                                                        echo'<td><strong>
                                                            <input type="hidden" class="from control"name="Description" value="' . $table->Description . '"/>
                                                                ' . $table->Description . '
                                                                    </strong></td>';
                                                            echo'<td><strong>
                                                                <input type="hidden" class="from control"name="location" value="' . $table->location . '"/>
                                                            
                                                                    ' . $table->location . '</strong></td>';
                                                        echo'<td><strong><div class="form-group"><div class="col-md-2">
                                                            <input type="text" class="from control"name="qty"  value=""/> Avaiable ' . $table->qty . '</div></div></strong></td>';
                                                        echo'<td><strong><div class="form-group"><div class="col-md-2">
                                                            <input type="text" class="from control"name="itemPrice" value="' . $table->sell_price . '"/>
                                                                ' . $table->sell_price . '</div></div></strong></td>';

                                                        echo'<td><input type="submit" name=" submit" value="Add" class="btn btn-primary"></button></td>';
                                                       
                                                        echo '</tr>';
                                                        echo form_close();
                                                   // }
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
        
             <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="box-import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Box Settings</h4>
                    </div>
                    <div class="modal-body">
                
                        
                        <?php echo form_open_multipart('salesorders/upload_it');?>

                                    <input type="file" name="userfile" size="20" />
                                    <input type="text" name="salesid" value="<?php echo $this->uri->segment(3);?>" />
<br /><br />

                                    <input type="submit" value="upload" />

                                </form>
                     
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              
                  
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
        <div class="container">
            <div class="row">
                <div id="content" class="col-md-12">
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
                                    <li>
                                        <a href="#"> Quotes</a>
                                    </li>
                                    <li></li>
                                </ul>
                                <!-- /BREADCRUMBS -->
                                <div class="clearfix">
                                    <h3 class="content-title pull-left">Quote</h3>
                                </div>
                                <div class="description">Quote Details </div>
                            </div>
                        </div>
                    </div>
                    <!-- /PAGE HEADER -->
                    <!-- ORDERS -->
                    <div class="row">     <!-- ORDER SCROLL -->
                        <div class="col-md-12 ">
                            <div class="col-md-12 list-group-item ">               
                                <div class="">

								<?php foreach ($quotes->result() as $so) {
								    echo form_open('quotes/edit_shipinfo'); ?>
								<div class="list-group">
									<div class="col-md-6 list-group-item profile-details">
										<?php  $base_url = base_url();
                                                           
                                            
										
	                                        echo'<h4 style="color:red;">
											        <strong>Quote- ' . $so->quotes_id . '</strong></h4>';
                                          
											   echo'<h4>Ship Info</h4>';

                                               echo'<input type="hidden" name="quotes_id" readonly="readonly" value="' . $so->quotes_id . '"/>
                
													<table >
														<tr>
															<td >Receiver Name:</td>
															<td ><input type="text" size="30" maxlength="30" name="ShipToCompanyName"   value="'.$so->ShipToCompanyName.'"/></td>
                  
														</tr>
				                                        <tr><td >Contact No:</td>
															<td >			
				                                                <input type="text" size="30" maxlength="30" name="Shipping_Contact_No"   value="'.$so->Shipping_Contact_No.'"/>
                  			                                </td>
														</tr>
														<tr><td >Email:			</td>
															<td >		
				                                                 <input type="text" name="Shipping_Email" size="30" value="'.$so->Shipping_Email.'"/>                  			                                  </td>
															</td>
														</tr>
														<tr>
													</table >
															
													<table >
											
														<tr>
															<td > Shipping Address1:</td>
														    <td >
				                                                <input type="text" size="30" maxlength="30" name="ship_Address_1"  value="'.$so->ship_Address_1.'"/>
				                                            </td>
														</tr>
														<tr><td >Shipping Address2:</td>
															<td >
																<input type="text" size="30" maxlength="30" name="ship_Address_2"  value="'.$so->ship_Address_2.'"/>
                                                            </td>
														</tr>
				                                        <tr><td>Shipping Address3/County:	</td>
															<td>			
				                                                 <input type="text" size="30" maxlength="30" name="ship_County"  value="'.$so->ship_County.'"/>
                  			                                </td>
														</tr>
                                                        <tr><td >Shipping Country:	</td>
															<td >			
				                                                 <input type="text" size="30" maxlength="30" name="ship_Country"  value="'.$so->ship_Country.'"/>
                  			                                </td>
														</tr>
				                                        <tr><td >Shipping Postcode:</td>
															<td ><input type="text" name="ship_Postcode"  size="10" value="'.$so->ship_Postcode.'"/>
                  			                            </tr>        
                                                        <tr><td ></td ><td >
														        <a class="btn btn-success pull-right"  onclick="same_as_billing();">Same As Billing address</a>
			                                                  
																	</td>
														</tr>
																
													</table > ';

														  
														  ?>
									</div>
									<div class="col-md-6 list-group-item profile-details">
										
														  
														  <?php  
														  
											echo'<p><h4>Bill Info</h4></p>';
                                           echo'<table>';

																echo'
																<tr><td >  PO:
				                                                    </td>  
				                                                     <td  > 
																	 <input type="text" name="po_number"  size="30" value="'.$so->po_number.'"/>
                                                                     </td> 
															   
				                                                     </td>
																</tr> 
															    <tr><td>Buyer Name:</td>
																    <td  width="10%"><input type="text" size="30" maxlength="30" name="Company_name"   value="'.$so->Company_name.'"/> 
																	<td  width="10%"><button type="button" class="btn btn-info xs " data-toggle="modal" data-target="#sales_order">Select</button>
												                       
																    </td>   
																</tr>
                                                             	<tr><td>Buyer Phone Number:	</td>	
				                                                    <td> <input type="text" size="30" maxlength="30" name="Buyer_Phone_Numbe"  value="'.$so->Buyer_Phone_Numbe.'"/></td>
                  			                                    </tr>
																<tr><td>Billing Address1:</td>
				
				                                                    <td> <input type="text" size="30" maxlength="30" name="Address_1" value="'.$so->Address_1.'"/></td>
                                                                </tr>
				                                                <tr>
																     <td>Billing  Address2:</td>
																     <td><input type="text" size="30" maxlength="30" name="Address_2"   value="'.$so->Address_2.'"/></td>
																 </tr>
				                                                <tr><td>Billing  Address3/County:</td>				
				                                                    <td><input type="text" size="30" maxlength="30" name="County"   value="'.$so->County.'"/></td>
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
									<div class="col-md-6 col-md-offset-3 "><br/>
									<button type="submit" class="btn btn-info input-block-level pull-right">Save Change</button>
									</div>
								</div> 
													<?php   echo form_close(); 
								}?>
										
												    
							    </div>

                            </div>
                                        
										
										<!-- /ORDER SCROLL -->	 
						  
                            <div class="col-md-12">
                                                            <div class="divide-20"></div>	
							<!-- BOX -->
                            <div class="box border orange">
                                <div class="box-title">
                                    <h4><i class="fa fa-list-ul"></i>Quote Details</h4>
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
								    <div class="panel-body">
												
												
												
                                        <div class="pull-left">
                                            <a href="<?php echo base_url(); ?>quotes/"><button class="btn btn-default">Cancel</button></a>
                                        </div> 
                                        <div class="pull-left visible-xs">
                                                        <div class="btn-group">
                                                            <button class="btn btn-sm btn-default"><i class="fa fa-bars"></i> Fullfill selected</button>
                                                            <button class="btn btn-sm btn-success"><i class="fa fa-check"></i> Mark complete</button>
                                                        </div>
                                        </div>            
                                        <div class="pull-right hidden-xs">
                                            <div class="btn-group">
                                                <button class="btn btn-default" href="#box-config" data-toggle="modal" ><i class="fa fa-bars"></i> Add Item </button>
                                                <div class="btn-group dropdown">
									                
									                <ul class="dropdown-menu context">
											          		
                                                                                <?php 
											                                     echo'<li>
																				        <a class="btn btn-default" href="' . $base_url . 'index.php/quotes/pdf_pro_invoice/' . $this->uri->segment(3) . '">
																						Pro-Forma Invoice
													                                </a>
											                                    </li>
                                                                                                      
                                                                                <li class="divider"></li> ';                      
                                                                            
										                                        				 
																				 
																				 
																				 ?>
									                </ul>
													<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
											
										             <i class="fa fa-print"></i>
									                </button>
								                </div> 
                                            </div>
                                        </div>
                                                    
                                                   
                                    
                                                   
                                    </div>
								
								
								
								
								     <!-- TABLE -->
                                                    <!---table class='table table-hover'-->
													<table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>

                                                                <th>Item Code</th>
                                                                <th>
                                                        <div class='text-center'>Description</div>
                                                        </th>

                                                        <th>
                                                        <div class='text-right'>qty</div>
                                                        </th>

                                                        <th>
                                                        <div class='text-right'>Price</div>
                                                        </th>

                                                        <th>
                                                        <div class='text-right'>Location </div>
                                                        </th>
                                                        <th>
                                                        <div class='text-right'>Line Price </div>
                                                        </th>
                                                        <th>
                                                        <div class='text-right'>Remove </div>
                                                        </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

<?php foreach ($addresses->result() as $address) {}?> 

                                                            <?php
                                                            foreach ($order_items->result() as $items) {

                                                                echo '<tr>
														 
														  <td>' . $items->CCL_Item . '</td>
														  <td>
															<div class="text-center">' . $items->Description . '</div>
														  </td>
                                                                                                                   <td>
															<div class="text-center">' . $items->item_qty . '</div>
														  </td>
                                                                                                                   <td>
															<div class="text-center">' . $items->ItemPrice . '</div>
														  </td>
                                                                                                                  
														   <td>
															<div class="text-center">' . $items->location . '</div>
														  </td>
                                                                                                                  <td>
															<div class="text-center">' . $items->itemlinetotal . '</div>
														  </td>
                                                                                                                   <td>';
															 if($so->status === 'Converted'){	
															    echo 'Converted';
															 }
                                                             else{														 
															    echo'<div class="text-center"><form method="POST" action="' . $base_url . 'quotes/delete_item" class="confirmation">
															        <input type="hidden" name="itemID" value="' . $items->item_id . '"/>
																	<input type="hidden" name="soid" value="' . $items->quote_id . '"/>
																	<button type="submit" class="btn btn-danger">X</button></form></div>';
														  
														  }
														  
														  echo'</td>';

                                                                   }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <!-- /TABLE -->
                                   
                                </div>
                            </div>
                            <!-- /BOX -->
							 <!-- ORDERS -->
                            <div class="row">
                           
                                        <!-- ORDER DETAILS -->
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        
                                                    <!-- DETAILS -->
                                        <div class="row">
                                            <div class="col-sm-4 col-sm-offset-1"><br/><br/>
                                                           
                                                        <?php     echo form_open('quotes/save_note');
                                                                     echo '<input type="hidden" name="quotes_id" value="'. $this->uri->segment(3).'" />
                                                            <textarea  name="q_notes"class="col-md-8" style="height:100px;">'.$so->q_notes.'</textarea>
                                                            <button type="submit" class="btn btn-default">save notes</button>
                                                            </form>';
                                                         ?>
                                             </div>
											<div class="col-sm-4 pull-right">
                                                <h4>
                                                    <i class="fa fa-money"></i>

                                                                &pound; <?php print_r($total); ?>
                                                </h4>
                                                            
                                                <h4><strong>Total</strong></h4>
                                                <h4><strong> <?php
                                                            /*

                                                              Usage:

                                                              You want to calculate 17.5% VAT on a price of £4.67

                                                              $price_without_vat = 4.67

                                                              echo vat($price_without_vat);

                                                              This would return the new amount with 17.5% added, and would be rounded to 2 decimal places

                                                             */
                                                            foreach ($vat_rate->result() as $vat_rate) {
                                                                
                                                            }
                                                            

                                                            $vat = $vat_rate->vat_rate; // define what % vat is 
                                                            $vat_amount = $vat * ($total / 100);
                                                            $price = $total + ($vat * ($total / 100)); // work out the amount of vat 

                                                            $price_with_vat = round($price, 2); // round to 2 decimal places 
                                                            echo'£  ';
                                                            echo number_format($total, 2, '.', '');echo ' ex vat ';
                                                            echo '<hr>';
                                                      
                                                            
                                                            echo'£  ';
                                                            echo number_format($vat_amount, 2, '.', '');echo '  vat ';
                                                            
                                                            echo '<hr>';
                                                            echo '£  ';
                                                            echo number_format($price_with_vat, 2, '.', '');
                                                            echo '  inc vat';
                                                            ?>
                                                                </strong></h4><br>
                                            </div>

                                        </div>
                                                    <!-- DETAILS -->
                                                    <hr> 
<?php
echo form_open('quotes/save');
echo form_hidden('quote_id', $this->uri->segment(3));
echo form_hidden('total', $total);
echo form_hidden('inc_vat', $price_with_vat);
echo form_hidden('vat_rate', $vat);
echo form_hidden('vat_amount', $vat_amount);
?>
<button type="submit" class="btn btn-info input-block-level "><i class="fa fa-check"></i>Save Total Amount to Pro-forma Invoice</button>
<?php echo form_close();?>                                            
                                                     <?php
													 
													 
													  if($so->status === 'Converted'){
													    
														$quotes=$this->db->select('*')->where('quote_id',$so->quotes_id)->get('sales_orders');
														foreach ($quotes->result() as $q) {
													    
														echo'</br><a  class="btn btn-success"  href="' . $base_url . 'index.php/salesorders/view/' . $q->salesorder_id . '">Sent To Sales  </a>';
                                                                             }           
													  
													  }
													 else{
													 
                                                            foreach ($quotes->result() as $quote) {}?>
                                                    <form  action="<?php echo base_url();?>index.php/quotes/to_sales" method="POST">
                                                        <input type="hidden" name="quotes_id" value="<?php  echo $quote->quotes_id; ?>"/>
                                                        <input type="hidden" name="Company_id" value="<?php echo $quote->Company_id; ?>"/>
                                                          <input type="hidden" name="Customer_id" value="<?php echo $quote->Customer_id; ?>"/>
														  <input type="hidden" name="po_number" value="<?php if(isset($quote->po_number)){echo $quote->po_number;} ?>"/>
                                                        
														<input type="hidden" name="Company_name" value="<?php echo $quote->Company_name; ?>"/>
														
														<input type="hidden" name="ShipToCompanyName" value="<?php echo $quote->ShipToCompanyName; ?>"/>
                                                        <input type="hidden" name="Shipping_Contact_No" value="<?php echo $quote->Shipping_Contact_No; ?>"/>
                                                        <input type="hidden" name="ship_Address_1" value="<?php echo $quote->ship_Address_1; ?>"/>
                                                        <input type="hidden" name="ship_Address_2" value="<?php echo $quote->ship_Address_2; ?>"/>
                                                        <input type="hidden" name="ship_County" value="<?php echo $quote->ship_County; ?>"/>
                                                        <input type="hidden" name="ship_Postcode" value="<?php echo $quote->ship_Postcode; ?>"/>
                                                        <input type="hidden" name="Shipping_Email" value="<?php echo $quote->Shipping_Email; ?>"/>
                                                        
														<input type="hidden" name="buyername" value="<?php echo $quote->buyername; ?>"/>
													 	<input type="hidden" name="Buyer_Phone_Numbe" value="<?php echo $quote->Buyer_Phone_Numbe; ?>"/>
														<input type="hidden" name="address1" value="<?php echo $quote->Address_1; ?>"/>
                                                                                         
                                                        <input type="hidden" name="address2" value="<?php echo $quote->Address_2; ?>"/>
                                                        <input type="hidden" name="postcode" value="<?php echo $quote->Postcode; ?>"/>
                                                        <input type="hidden" name="County" value="<?php echo $quote->Town_city; ?>"/>
														
														
														
														
														
														<!----
                                                        <input type="hidden" name="address1" value="<?php echo $quote->Address_1; ?>"/>
                                                        <input type="hidden" name="address2" value="<?php echo $quote->Address_2; ?>"/>
                                                        <input type="hidden" name="postcode" value="<?php echo $quote->Postcode; ?>"/>
                                                         
														 <input type="hidden" name="County" value="<?php echo $quote->County; ?>"/>
														  <input type="hidden" name="Country" value="<?php echo $quote->Country; ?>"/>
														---------------->  
                                                       <input type="hidden" name="Grand_total"  value=" <?php echo $quote->Grand_total; ?>"/>
                                                       <input type="hidden" name="Subtotal_total" value="<?php echo $quote->Grand_total; ?>" />
                                                        <input type="hidden" name="VAT_Rate" value="<?php echo $quote->VAT_Rate; ?>" />
                                                        <input type="hidden" name="VAT_ammount" value="<?php echo $quote->VAT_ammount; ?>"/>
														  <input type="hidden" name="inc_vat" value="<?php echo $quote->inc_vat; ?>" />

			
                                                        
                                                        <br><button class="btn btn-block btn-warning">Convert To Sales order</button>
                                                        </form>
													<?php 
													}	?>
                                           

                                            </div>
                                        </div>
                                        <!-- /ORDER DETAILS -->
                            </div>
                                    <!-- ORDERS -->
							
							
							
							
                            </div>
                        </div>
                    <!-- /ORDERS -->
                        <div class="footer-tools">
                            <span class="go-top">
                                <i class="fa fa-chevron-up"></i> Top
                             </span>
                        </div>
					</div>
                </div><!-- /CONTENT-->
            </div>
        </div>
    </div>
</section>




<!--/PAGE -->
<!-- JAVASCRIPTS -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JAVASCRIPTS -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JQUERY -->
<script src="<?php echo base_url(); ?>assets/js/jquery/jquery-2.0.3.min.js"></script>
<!-- JQUERY UI-->
<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
<!-- BOOTSTRAP -->
<script src="<?php echo base_url(); ?>assets/bootstrap-dist/js/bootstrap.min.js"></script>
<!-- BLOCK UI -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
<!-- DATA TABLES -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
<!-- COOKIE -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
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
        App.setPage("view");  //Set current page
        App.init(); //Initialise plugins and elements
    });

    $(document).ready(function() {
        $('#datatable1').dataTable();
		$('#datatable2').dataTable();
    });
	function same_as_billing(){
		document.getElementsByName("ship_Address_1")[0].value=document.getElementsByName("Address_1")[0].value;
		document.getElementsByName("ship_Address_2")[0].value=document.getElementsByName("Address_2")[0].value;
		document.getElementsByName("ship_County")[0].value=document.getElementsByName("County")[0].value;
		document.getElementsByName("ship_Postcode")[0].value=document.getElementsByName("Postcode")[0].value;

	}

</script>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure to remove it?');
    });
</script>


<!-- /JAVASCRIPTS -->

<?php echo Modules::run('template/footer'); ?>	        