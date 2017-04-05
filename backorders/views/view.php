<script src="http://malsup.github.com/jquery.form.js"></script> 
 <!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/uniform/css/uniform.default.min.css" />
	
  

</head>
        </body>

<?php echo Modules::run('template/menu'); ?>

        <!-- PAGE -->
	<section id="page">
        
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
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover red">
											<thead>
												<tr>
													<th>id</th>
													<th>item Code</th>
													
													<th>Description</th>
													<th>Qty Available</th>
                                                                                                        <th> Price </th>
                                                                                                        <th> add </th>
												</tr>
											</thead>
											<tbody>
                                                                                            
                                                                                            <?php 
                                                                                            $base_url = base_url();
                                                                                             foreach ($query->result() as $table) {
                                                                                                 if($table->qty > 0){
                                     


 
												echo '<tr class="gradeX">';
                                                                                                echo '<form id="myForm" action="'.base_url().'salesorders/item_added" method="post">';
                                                                                                
                                                                                                        echo'<td><strong><input type="hidden" class="from control"name="soid" value="'.$this->uri->segment(3).'"/><input type="hidden" class="from control"name="id" value="'.$table->id.'"/>'.$table->id.'</strong></td>';
													echo'<td><strong><input type="hidden" class="from control"name="CCL_Item" value="'.$table->CCL_Item.'"/>'.$table->CCL_Item.'</strong></td>';
                                                                                                        echo'<td><strong><input type="hidden" class="from control"name="Description" value="'.$table->Description.'"/>'.$table->Description.'</strong></td>';
                                                                                                        echo'<td><strong><div class="form-group"><div class="col-md-2"><input type="text" class="from control"name="qty"  value=""/> Avaiable '.$table->qty.'</div></div></strong></td>';
                                                                                                        echo'<td><strong><div class="form-group"><div class="col-md-2"><input type="text" class="from control"name="itemPrice" value="'.$table->sell_price.'"/>'.$table->sell_price.'</div></div></strong></td>';
                                                                                                       
													echo'<td><input type="submit" name="submit" class="btn btn-primary">add</button></td>';
													 echo form_close();
												echo '</tr>';
                                                                                                 
                                                                                                 }
                                                                                            }?>
												
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
											<a href="#">Home</a>
										</li>
										<li>
											<a href="#">Sales Orders</a>
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
											<div class="col-md-4">
												<div class="panel panel-default">
												  <div class="panel-body orders">
													<div class="scroller" data-height="650px" data-always-visible="1" data-rail-visible="1">
													<ul class="list-unstyled">  
                                                                                                            
                                                                                                            <?php foreach ($orders->result() as $order) 
                                                                                                                {
														echo'<li class="clearfix">
                                                                                                                    
                                                                                                                  


 
															<div class="pull-left">
																<p>
																	<h5><strong>'.$order->itemCode.'</strong></h5>
																</p>
																	<p>'.$order->itemDesc.'</p>															
															</div>
                                                                                                                                
                                                                                                                                
															<div class="text-right pull-right">
																<h4 class="cost">&pound;'.$order->Price.'</h4>
																<p>
																	<span class="label label-success arrow-in-right"><i class="fa fa-check"></i> &pound;'.$order->Price.'</span>
																</p>
															</div>
															<div class="clearfix"></div>
															
														</li>';
                                                                                                                                
                                                                                                                }
                                                                                                                                
                                                                                                                                ?>
														
														
													</ul>
													</div>
												  </div>
												 
												</div>
											</div>
											<!-- /ORDER SCROLL -->
											<!-- ORDER DETAILS -->
											<div class="col-md-8">
												<div class="panel panel-default">
												  <div class="panel-body">
													<div class="pull-left">
														<button class="btn btn-default">Cancel</button>
													</div>
													<div class="pull-right hidden-xs">
														<div class="btn-group">
															<button class="btn btn-default" href="#box-config" data-toggle="modal" ><i class="fa fa-bars"></i> Add Item </button>
															<button class="btn btn-success"><i class="fa fa-check"></i> Status</button>
														</div>
													</div>
													<div class="pull-left visible-xs">
														<div class="btn-group">
															<button class="btn btn-sm btn-default"><i class="fa fa-bars"></i> Fullfill selected</button>
															<button class="btn btn-sm btn-success"><i class="fa fa-check"></i> Mark complete</button>
														</div>
													</div>
													<div class="clearfix"></div>
													<hr>
													<!-- TABLE -->
													<table class='table table-hover'>
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
															<div class='text-right'>Discount </div>
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
                                                                                                              
                                                                                                              <?php 
                                                                                                               ?>
                                                                                                              
                                                                                                              <?php foreach ($order_items->result() as $items) {

														echo '<tr>
														 
														  <td>'.$items->CCL_Item.'</td>
														  <td>
															<div class="text-center">'.$items->Description.'</div>
														  </td>
                                                                                                                   <td>
															<div class="text-center">'.$items->item_qty.'</div>
														  </td>
                                                                                                                   <td>
															<div class="text-center">'.$items->ItemPrice.'</div>
														  </td>
                                                                                                                  
														   <td>
															<div class="text-center">'.$items->Discount.'</div>
														  </td>
                                                                                                                  <td>
															<div class="text-center">'.$items->itemlinetotal.'</div>
														  </td>
                                                                                                                   <td>
															<div class="text-center"><form method="POST" action="'.$base_url.'salesorders/delete_item"><input type="hidden" name="itemID" value="'.$items->item_id.'"/><input type="hidden" name="soid" value="'.$items->sales_id.'"/><button type="submit" class="btn btn-danger">X</button></form></div>
														  </td>';
                                                                                                                
                                                                                                                  $backorder = $items->item_qty - $items->qty;
                                                                                                                  $new_qty = $items->item_qty - $backorder;
                                                                                                                  if($items->qty < $items->item_qty){
                                                                                                                    echo'<td>
                                                                                                                        <form action="'.  base_url().'backorders/add_items">
                                                                                                                            <input type="hidden" name="sales_id" value="'.$items->sales_id.'"/>
                                                                                                                            <input type="hidden" name="CCL_Item" value="'.$items->CCL_Item.'"/>
                                                                                                                            <input type="hidden" name="Description" value="'.$items->Description.'"/>
                                                                                                                            <input type="hidden" name="item_qty" value="'.$backorder.'"/>
                                                                                                                            <input type="hidden" name="itemPrice" value="'.$items->ItemPrice.'"/>
                                                                                                                            <input type="hidden" name="new_so_qty" value="'.$new_qty.'"/>
                                                                                                                        <button type="submit" class="btn btn-warning"><i class="fa fa-cross"></i>Backorder'.$backorder.'</button>
                                                                                                                        </form>
                                                                                                                        </td>
                                                                                                                            </tr>';
                                                                                                               
                                                                                                                    }
                                                                                                                else {
                                                                                                                    echo '<td><button class="btn btn-success"><i class="fa fa-check"></i>Stocks ok</button></td>';
                                                                                                                }
                                                                                                               
														}
                                                                                                               
                                                                                                                ?>
													  </tbody>
													</table>
													<!-- /TABLE -->
													<div class="text-right">
														<h3></h3>
													</div>
													<hr>
													<!-- CUSTOMER DETAILS -->
													<div class="row">
														<div class="col-sm-4">
															<h4>
																<i class="fa fa-money"></i>
                                                                                                                                          
                                                                                                                                &pound; <?php print_r ($total);?>
															</h4>
															<h4>
																<i>VAT</i>
																20%
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

    
    $vat = 20; // define what % vat is 
     $vat_amount = $vat*($total/100);
    $price = $total + ($vat*($total/100)); // work out the amount of vat 
     
    $price_with_vat = round($price, 2); // round to 2 decimal places 
     echo 'VAT £';echo $vat_amount;
    echo '<br>';
    echo '£';echo $price_with_vat; echo 'inc vat';
        

?>
</strong></h4><br>
														</div>
														<div class="col-sm-7 col-sm-offset-1">
															<h4>
																<i class="fa fa-envelope"></i>
																<?php  
                                                                                                                ?>
															</h4>
															<div class="well">	
                                                                                                                         
																<h5><strong>Shipping Address </strong></h5>
                                                                                                                                <?php   foreach ($addresses->result() as $address) {}
                                                                                                                                    ?> 
                                                                                                                                
                                                                                                                                <?php if($address->address1  == TRUE  ){
                                                                                                                                    echo'<br>';
                                                                                                                                    echo $address->number;    
                                                                                                                                    echo'<br>';
                                                                                                                                    echo $address->address1; 
                                                                                                                                    echo'<br>';
                                                                                                                                    echo $address->address2;
                                                                                                                                    echo'<br>';
                                                                                                                                    echo $address->postcode;
                                                                                                                                    echo'<br>';
                                                                                                                                    }
                                                                                                                                    else{
                                                                                                                               echo 'no address';
                                                                                                                                }
                                                                                                                                
                                                                                                                                ?>
																
															</div>
														</div>
													</div>
													<!-- PAYMENT STATUS -->
													<hr> 
                                                                                                        <?php
                                                                                                       echo form_open('salesorders/save');
                                                                                                       echo form_hidden('sales_id',$this->uri->segment(3));
                                                                                                       echo form_hidden('total',$total);
                                                                                                        echo form_hidden('inc_vat',$price_with_vat);
                                                                                                       echo form_hidden('vat_rate',$vat);
                                                                                                       echo form_hidden('vat_amount',$vat_amount); 
                                                                                                        ?>
                                                                                                        <button ytpe="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                                                                                                      <? echo form_close();
                                                                                                        ?>
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
        
        
        
        
        	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?php echo base_url();?>assets/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url();?>assets/bootstrap-dist/js/bootstrap.min.js"></script>
	
		
	<!-- DATE RANGE PICKER -->
        
	
	
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- DATA TABLES -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
        
        <!-- TYPEHEAD -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/typeahead/typeahead.min.js"></script>
	<!-- AUTOSIZE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/autosize/jquery.autosize.min.js"></script>
	<!-- COUNTABLE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/countable/jquery.simplyCountable.min.js"></script>
	<!-- INPUT MASK -->
	<script type="text/javascript" src="<?php echo base_url();?>/assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	<!-- FILE UPLOAD -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
	<!-- SELECT2 -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/select2/select2.min.js"></script>
	<!-- UNIFORM -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/uniform/jquery.uniform.min.js"></script>
	
        <script src="http://malsup.github.com/jquery.form.js"></script> 
        
        
	<!-- CUSTOM SCRIPT -->
	
	<script src="<?php echo base_url();?>assets/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("forms");  //Set current page
			App.init(); //Initialise plugins and elements
		});
                
                $(document).ready(function(){
	$('#datatable1').dataTable();
});


	</script>
        
        

	<!-- /JAVASCRIPTS -->
      
<?php echo Modules::run('template/footer'); ?>	        