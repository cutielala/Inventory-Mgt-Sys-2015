<?php echo Modules::run('template/dash_head'); ?>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<!-- UNIFORM -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/uniform/css/uniform.default.min.css" />

<link href="<?php echo base_url();?>assets/jqueryui-editable/css/jqueryui-editable.css" rel="stylesheet"/>


<!-- TYPEAHEAD -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/typeahead/typeahead.css" />
	<!-- FILE UPLOAD -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-fileupload/bootstrap-fileupload.min.css" />
	<!-- SELECT2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/select2/select2.min.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/uniform/css/uniform.default.min.css" />
	<!-- JQUERY UPLOAD -->
	<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-upload/css/jquery.fileupload.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-upload/css/jquery.fileupload-ui.css">
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>


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
    </head>
<body>

<?php echo Modules::run('template/menu'); ?>


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
                                <div class="box-body">
							        
                                    <div class="tabbable header-tabs user-profile">
							
							
							            <ul class="nav nav-tabs">
										    <li class="active"><a href="#instock" data-toggle="tab"><i class="fa fa-dot-circle-o"></i> <span class="hidden-inline-mobile">Item in Stock</span></a></li>
                                     
                                            <li class=""><a href="#nostock" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile">Item Out of Stock </span></a></li>
                                            
											
									    </ul>
										
							            <div class="tab-content">
									
								            <div class="tab-pane fade active in" id="instock">
							
								     
								<!-- BOX -->
                                <div class="box border green">
                                    <div class="box-title">
                                        <h4><i class="fa fa-paste"></i>Item in Stock</h4>
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
                                                    <!------th>id</th--------->
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
                                                foreach ($query->result() as $table) {
                                                    if ($table->qty > 0) {




                                                        echo '<tr class="sum gradeX">';
                                                        echo '<form id="myForm" action="' . base_url() . 'salesorders/item_added" method="post">';
                                                   
                                                        echo'
                                                                 <input type="hidden" class="from control"name="soid" value="' . $this->uri->segment(3) . '"/>
                                                                 <input type="hidden" class="from control"name="id" value="' . $table->id . '"/>
                                                            
                                                               ';
                                                        echo'<td>
                                                            <input type="hidden" class="from control" name="CCL_Item" value="' . $table->CCL_Item . '"/>
                                                                ' . $table->CCL_Item . '
                                                                    </td>';
                                                        echo'<td>';
														
														if (substr_count($table->CCL_Item, 'Mis') > 0) {
															
															  echo' <input type="text"  class="from control" name="Description" value="' . $table->Description . '"/>';
                                                               
														
															
														}
														
														else{
                                                          echo'   <input type="hidden" class="from control" name="Description" value="' . $table->Description . '"/>' . $table->Description.'';
                                                                
																}
                                                            echo'         </td>';
                                                            echo'<td>
                                                                <input type="hidden" class="from control"name="location" value="' . $table->location . '"/>
                                                            
                                                                    ' . $table->location . '</td>';
																
                                                        echo'<td><div class="form-group">
                                                            
                                                            <input type="text" class="qty from control" name="qty"  value=""/> </div></td>';
                                                       			
														
														echo'<td><div class="form-group">
                                                            
                                                             <input type="text" class="av from control" name="available"  readonly="true" value="' . $table->qty . '"/></div>
															</td>';
                                                        
														
														echo'<td>
                                                            
                                                            <div class="backorder"></div><input type="text" class="bo from control" name="bo"  readonly="readonly"  value=""/>
															</td>';
                                                       
														
														echo'<td><div class="form-group">
														
                                                            <input type="text" class="from control" name="itemPrice" value="' . $table->sell_price . '" />
                                                                ' . $table->sell_price . '</div></td>';
                                                                
                                                        echo'<td><input type="submit" value="Add" class="btn btn-primary"></button></td>';
                                                       
                                                        echo '</tr>';
                                                        echo form_close();
                                                    }
                                                }
                                                ?>
											

												

                                            </tbody>

                                        </table>
                                    </div>
									
                                </div>
                                
								
								<!-- /BOX -->
								            </div>
                                        
										
								        <div class="tab-pane fade " id="nostock">
							
								     
								    <!-- BOX -->
                                    <div class=" hidden box border red">
                                        <div class="box-title">
                                        <h4><i class="fa fa-paste"></i>Item Out of Stock</h4>
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
                                        <table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="hours-table datatable table table-striped table-bordered table-hover red">
                                        

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
                                                foreach ($query->result() as $table) {
                                                    if ($table->qty <= 0) {




                                                        echo '<tr class="sum gradeX">';
                                                        echo '<form id="myForm" action="' . base_url() . 'salesorders/item_added" method="post">';

                                                        echo'<td>
                                                                 <input type="hidden" class="from control"name="soid" value="' . $this->uri->segment(3) . '"/>
                                                                 <input type="hidden" class="from control"name="id" value="' . $table->id . '"/>
                                                            
                                                                ' . $table->id . '</td>';
                                                        echo'<td>
                                                            <input type="hidden" class="from control" name="CCL_Item" value="' . $table->CCL_Item . '"/>
                                                                ' . $table->CCL_Item . '
                                                                    </td>';
                                                        echo'<td>
                                                            <input type="hidden" class="from control" name="Description" value="' . $table->Description . '"/>
                                                                ' . $table->Description . '
                                                                    </td>';
                                                            echo'<td>
                                                                <input type="hidden" class="from control"name="location" value="' . $table->location . '"/>
                                                            
                                                                    ' . $table->location . '</td>';
														/*echo'<td><div class="form-group"><div class="col-md-2">
                                                            
                                                            <input type="text" class="qty from control" name="qty"  value=""/> Avaiable ' . $table->qty . '<input type="hidden" class="av from control" name="available"  value="' . $table->qty . '"/> backorder <div class="backorder"></div><input type="text" class="bo from control" name="bo"  value=""/> </div></div></td>';
                                                       	*/		
                                                        echo'<td><div class="form-group">
                                                            
                                                            <input type="text" class="qty from control" name="qty"  value=""/> </div></td>';
                                                       			
														
														echo'<td><div class="form-group">'
                                                            
                                                             .$table->qty . '<input type="hidden" class="av from control" name="available"  readonly="true" value="' . $table->qty . '"/></div>
															</td>';
                                                        
														
														echo'<td>
                                                            
                                                            <div class="backorder"></div><input type="text" class="bo from control" name="bo"  readonly="readonly"  value=""/>
															</td>';
                                                       
														
														echo'<td><div class="form-group">
														
                                                            <input type="text" class="from control" name="itemPrice" value="' . $table->sell_price . '" />
                                                                ' . $table->sell_price . '</div></td>';
                                                                
                                                        echo'<td><input type="submit" value="Add" class="btn btn-primary"></button></td>';
                                                       
                                                        echo '</tr>';
                                                        echo form_close();
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
								
                                    </div>    
                                </div>



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
        	 <!-- SAMPLE BOX add item FORM-->
        <div class="modal fade" id="box-splitorder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Split Order List</h4>
                    </div>
                    <div class="modal-body">


                        <!-- DATA TABLES -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box-body">
							        
                                    <div class="tabbable header-tabs user-profile">
							
							
							            <ul class="nav nav-tabs">
										    <li class="active"><a href="#instock" data-toggle="tab"><i class="fa fa-dot-circle-o"></i> <span class="hidden-inline-mobile">Split Order</span></a></li>
                                     
                                            <li class="hidden"><a href="#nostock" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile">Item Out of Stock </span></a></li>
                                            
											
									    </ul>
										
							            <div class="tab-content">
									
								            <div class="tab-pane fade active in" id="instock">
							
								     
								<!-- BOX -->
                                <div class="box border green">
                                    <div class="box-title">
                                        <h4><i class="fa fa-paste"></i>Split Order List</h4>
                                        
                                    </div>
									
                                    <div class="box-body">
                                        <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="hours-table datatable table table-striped table-bordered table-hover red">
                                        

										<thead>
                                                <tr>
                                                    <th>SO#</th>
                                                  
                                                    <th>item Code</th>
                                                    <th>QTY</th>
                                                    <th>Unit Price</th>
                                                    <th> Subtotal </th>
													<th>Backorder</th>
													
                                                    
                                                    <th>Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $base_url = base_url();
                                               
                                                     if(isset($split)){


                                                         foreach ($split->result() as $items) {

                                                            if($items->sales_orders_rev_num >0 ){
																 
																echo '<tr>';
														   
											                                
															                     $sales_orders_rev_num = substr(sprintf('%02d', $items->sales_orders_rev_num),0,2);
                                                                      echo'  <td>SO-' . substr(sprintf('%06d', $items->sales_orders_rev),0,6) . '-'. $sales_orders_rev_num.' </td>';
												 
																
														              echo'</td>';
														              echo '<td>' . $items->CCL_Item . '</td>';
														              echo '<td>' . $items->item_qty. '</td>';
															          echo '<td>'. $items->ItemPrice .'</td>';
														                         
                                                           
                                                     echo '<td>
															                        <div class="text-center">' . $items->itemlinetotal . '</div>
														                          </td>';
															          echo '<td>'. $items->backorder .'</td>';
                                                                      echo '<td> <a target="_blank"  class="btn btn-primary" href="' . $base_url . 'salesorders/view/' . $items->salesorder_id . '">View</a>
                                              </td>';
                                                           echo' </tr>';
															}
															
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
								
                                    </div>    
                                </div>



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
        
	
		<!-- SAMPLE BOX add item FORM-->
        <div class="modal fade" id="box-nostock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add nostock items or hold items temporarily before moving from Warehouse</h4>
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
                                        
										  
										
										
										
										
										<table id="datatable3" cellpadding="0" cellspacing="0" border="0" class="hours-table datatable table table-striped table-bordered table-hover red">
                                        

										    <thead>
                                                <tr>
                                                    
                                                    <th>item Code</th>
                                                    <th>Description</th>
                                                    <!-----<th>Location</th>--->
                                                    <th>Qty  </th>
													<!-----
													<th>Qty Available</th>
													<th>Qty Backorder</th>----->
                                                    <th>Unit Price </th>
                                                    <th> add </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $base_url = base_url();
                                                foreach ($nostock->result() as $table) {
                                                    //if ($table->qty > 0) 
													{




                                                        echo '<tr class="sum gradeX">';
                                                        echo '<form id="myForm" action="' . base_url() . 'salesorders/item_added_onhold" method="post">';

                                                        
                                                        echo '    <input type="hidden" class="from control"name="soid" value="' . $this->uri->segment(3) . '"/>
                                                            <input type="hidden" class="from control"name="wh_item_id" value="' . $table->id . '"/>';
                                                            
                                                         
                                                        echo'<td>
                                                            <input type="hidden" class="from control" name="CCL_Item" value="' . $table->CCL_Item . '"/>
                                                                ' . $table->CCL_Item . '
                                                                    </td>';
                                                        echo'<td>
                                                            <input type="hidden" class="from control" name="Description" value="' . $table->Description . '"/>
                                                                ' . $table->Description . '
                                                                    </td>';
                                                        /*    echo'<td>
                                                                <input type="hidden" class="from control"name="location" value="' . $table->location . '"/>
                                                            
                                                                    ' . $table->location . '</td>';/*
														/*echo'<td><div class="form-group"><div class="col-md-2">
                                                            
                                                            <input type="text" class="qty from control" name="qty"  value=""/> Avaiable ' . $table->qty . '<input type="hidden" class="av from control" name="available"  value="' . $table->qty . '"/> backorder <div class="backorder"></div><input type="text" class="bo from control" name="bo"  value=""/> </div></div></td>';
                                                       	*/		
                                                        echo'<td><div class="form-group">
                                                            
                                                            <input type="text" class="qty from control" name="qty"  value=""/> </div></td>';
                                                       			
														/*
														echo'<td><div class="form-group">'
                                                            
                                                             .$table->qty . '<input type="hidden" class="av from control" name="available"  readonly="true" value="' . $table->qty . '"/></div>
															</td>';
                                                        
														
														echo'<td>
                                                            
                                                            <div class="backorder"></div><input type="text" class="bo from control" name="bo"  readonly="readonly"  value=""/>
															</td>';
                                                       
														*/
														echo'<td><div class="form-group">
														
                                                            <input type="text" class="from control" name="itemPrice" value="' . $table->sell_price . '" />
                                                                ' . $table->sell_price . '</div></td>';
                                                                
                                                        echo'<td><input type="submit" value="Add" class="btn btn-primary"></button></td>';
                                                       
                                                        echo '</tr>';
                                                        echo form_close();
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
                                    <a href="<?php echo base_url(); ?>">Main</a>
                                    </li>
                                    <li>
                                    <a href="<?php echo base_url(); ?>index.php/salesorders">Sales Orders</a>
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
					 <?php  foreach ($salesorders->result() as $so) {}
											   
									 echo' <h4 style="color:red;">Order Date:'.$so->dateraised.'</h4>'; ?>
	
                    <!-- ORDERS -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- ORDER SCROLL -->
                            <div class="col-md-12 ">
                                <div class="col-md-12 list-group-item">

									<?php echo form_open('salesorders/edit_shipinfo'); ?>
									    <div class="list-group">
											<div class="col-md-6 list-group-item profile-details">
                                               
											<?php  $base_url = base_url().'index.php';
                                             echo  '<table >
													    <tr>
															<td >';
                                                            if(isset($so->sales_orders_rev_num)){ 
														   
														   
														        echo'  <h4 style="color:red;">SO- ' . $so->sales_orders_rev . '-'. $so->sales_orders_rev_num.' </h4>';
                                                                   
														           /* if ($so->backorder === 'YES')   { //if split order
											                     
                                                                     } 
											                        else 
											                       {   
											                            if ($so->sales_orders_rev_num==='1') //if first of split order
												                          {
												                               echo'  <h4 style="color:red;">SO- '. $so->salesorder_id.'-'. $so->sales_orders_rev_num.'</h4>';
												                           }
												                        else
	                                                                           echo'<h4 style="color:red;">SO- ' . $so->salesorder_id . '</h4>';
                                                                    }
														  */
														  
														        }
														  else{
															  echo'<h4 style="color:red;">SO- ' . $so->salesorder_id . '</h4>';
														  }
														    echo'           </td>
															                <td></td>
																	    </tr>';	
														    echo'   
																        <tr>
																            <td >  <input type="hidden"  name="status"   value="'.$so->status.'"/>
																		    <p><i class="fa fa-circle text-green"></i> Status: '.$so->status.'</p> 
															                </td>
                                                                            <td></td>
																	     </tr>';	
									    

														    echo  '</table >';
														    echo' <h4>Ship Info</h4>';
														  
														   
                                                            
                                                            echo'<input type="hidden" name="salesorder_id" readonly="readonly" value="' . $so->salesorder_id . '"/>
													       
														    <table >
																<tr>
																    <td >☆Receiver Name:</td>
																    <td >
																    <input type="text" size="30" maxlength="30" name="ShipToCompanyName"   value="'.$so->ShipToCompanyName.'"/>
                
				                                                    </td>
																</tr>
				                                                <tr><td >Contact No:	</td>
																    <td >			
				                                                    <input type="text" size="30" maxlength="30" name="Shipping_Contact_No"   value="'.$so->Shipping_Contact_No.'"/>
                  			                                       </td>
																</tr>
																 <tr><td >Email:			</td>
																    <td >		
				                                                 <input type="text" name="Shipping_Email" size="30" value="'.$so->Shipping_Email.'"/>                  			                                  </td>
																</td></tr>
																<tr>
															</table >
															
															<table >
															    <tr><td ></td >
																   
																</tr>
																<tr>
																    <td >
																   ☆Shipping Address1(property/street):</td>
																    <td >
				                                                      
				                                                     <input type="text" size="20" maxlength="30" name="ship_Address_1"  value="'.$so->ship_Address_1.'"/>
                
				                                                     </td>
																</tr>
																<tr><td >Shipping Address2(locality):</td>
																    <td >
																    <input type="text" size="20" maxlength="30" name="ship_Address_2"  value="'.$so->ship_Address_2.'"/>
                
				                                                    </td>
																</tr>
				                                                <tr><td >☆Shipping Address3/County:	</td>
																    <td >			
				                                                 <input type="text" size="20" maxlength="30" name="ship_County"  value="'.$so->ship_County.'"/>
                  			                                    </td></tr>
                                                                
				                                                <tr><td >☆Shipping Postcode:			</td>
																    <td >	
				                                                 <input type="text" name="ship_Postcode"  size="10" value="'.$so->ship_Postcode.'"/>
                  			                                    
                                                                <tr><td > <p  style="color:red;">☆ Mandatory for DPD</p></td >
																    <!---<td ><a class="btn btn-primary pull-right"  href="'.base_url(),'salesorders/same_as_billing/' . $so->salesorder_id . '">Same As Billing address</a>-->
			                                                             </td>
																	<td ><a class="btn btn-success pull-right"  onclick="same_as_billing();">Same As Billing address</a><br/></td>
																</tr>
																
															</table > ';

														  
														
														  ?> 
											</div>
											<div class="col-md-6 list-group-item profile-details ">
												
														  <?php  
														  
																echo'<p><h4>Bill Info</h4></p>';
																
                                                                echo'<table>
														   
											                                
				                                                <tr><td >Vat exempt&nbsp; </td>
																    <td ><select name="vat_exempt"  disabled="disabled">
                                                                           <option value="'. $so->vat_exempt.'">'. $so->vat_exempt.'</option>
																	
                                                                             <option value="NO">NO</option>
                                                                             <option value="YES">YES</option>
																	
                                                                              </select>
																    </td>
																</tr>';
																
																 echo'
																<tr>
																    <td >Currency</td>
																    <td ><select name="currency" >
                                                                            <option value="'.$so->currency.'">'.$so->currency.'</option>
                                                                            <option value="GBP">GBP</option>
                                                                            <option value="EUR">EUR</option>
                                                                            </select></td>
																</tr>
																<tr><td >  PO:
				                                                    </td>  
				                                                     <td  > 
																	 <input type="text" name="po_number"  size="30" value="'.$so->po_number.'"/>
                                                                     </td> 
															   
				                                                     </td>
																</tr> 
															    <tr><td>Buyer Name:</td>
																         
																    </td>   <td  width="10%"><input type="text" size="20" maxlength="30" name="Company_name" required=" required " value="'.$so->Company_name.'"/> 
																	        <button type="button" class="btn btn-success xs " data-toggle="modal" data-target="#sales_order">Select</button>
												                       
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
															    echo'<br/>';
													
																?>
														     
											</div>
										
										    <div class="col-md-6  col-md-offset-3"><br/>
											<button type="submit" class="btn btn-info input-block-level pull-right">Save Change</button>
											</div>
										</div>		
								    <?php   echo form_close(); ?>
												
							    
								</div>       
                            
							    <div class="divide-20"></div>	  
							</div>
                                 
										
										<!-- /ORDER SCROLL -->	
										
							<div class="col-md-12">
                                <div class="divide-20"></div>	  
					    
							<!-- BOX -->
                                <div class="box border blue">
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
									 <div class="col-md-6  pull-right box-container">  <!-- BOX COLLAPSED-->	
										<div class="col-md-11 ">
											<?php  $base_url = base_url();		 
												foreach ($salesorders->result() as $so) {}	 
														echo'<form ></form>'; 
													if ($so->status === 'onhold') {

														 echo' <div class="col-md-4">';
                                                              echo'<form action="' . $base_url() . 'index.php/salesorders/to_pending" method="POST">
                                                                        <input type="hidden" name="salesorder_id" value="' . $so->salesorder_id . '"/>
																		<button type="submit" class="btn btn-default" title="click to be pending "    >On Hold</button>
																	</form>';
														  echo'</div>';
																							        
																									//if (($so->backorder !='NO')OR ($so->backorder === 'YES')) 
																{
											                                                       
                                                              echo' <div class="col-md-4">
																	    <button class="btn btn-default" href="#box-nostock" data-toggle="modal" >
																	        <i class="fa fa-bars"></i> Add Temporarily holding items</button></br>';								
															  echo'</div>';
                                                            }  
																							
													   }
													 else if ($so->status === 'pending') {
																							 
																							
														      echo' <div class="btn-toolbar col-md-10 col-md-offset-2">
															           <div class="col-md-4 pull-right">';
                                                                        echo '<a data-toggle="modal" data-id="' . $so->salesorder_id . '" title="Pending" class="open-AddBookDialog btn btn-danger" href="#addBookDialog1"> <i class="fa fa-exclamation-circle"></i>Pending</a>';
																   echo'</div>';
																  
																	if (($so->backorder === 'NO')OR ($so->backorder !== 'YES')){
											                                                        
                                                                   echo'<div class="col-sm-3 pull-right">';                            
																	    echo'<button class="btn btn-default" href="#box-config" data-toggle="modal" >
																	                                                  <i class="fa fa-bars"></i> Add</button>
																	        </div>';                        
																	}
																	echo'<div class="col-sm-3 pull-right">
																		    <form action="' .base_url() . 'index.php/salesorders/pick_all" method="POST">
                                                                                                                 <input type="hidden" name="sales_id" value="' . $so->salesorder_id .'"/>
																		                                        <button type="submit" class="btn btn-success">Pick All</button>
                                                                            </form>
																	  </div>
                                                                </div>';
																							
																							
														}
													 else if ($so->status === 'shipped') {
                                                             echo '<a data-toggle="modal" data-id="' . $so->salesorder_id . '" title="Item Shipped" class="open-AddBookDialog btn btn-warning pull-right" href="#addBookDialog"><span><i class="fa fa-truck"></i></span> <strong>Shipped</strong></a>';

                                                         }                          
                                                      else if ($so->status === 'invoiced') {
                                                             echo'<button class="btn btn-inverse pull-right pop-hover" data-title="Invoiced " data-content="invoice raised" data-original-title="" title=""><i class="fa fa-check"></i><strong>' . $so->status . '</strong></button>';
                                                        } 
													?>						   
																						   
																						   
																						   
										</div>
										<div class="col-md-1 pull-right"> 
											<div class="btn-group dropdown pull-right">
											    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
											
											                                    <i class="fa fa-print"></i>
											    </button>
											    <ul class="dropdown-menu context">
											          		
                                                                                <?php 
											                                     
																									
																				echo'<li><a class="btn btn-default" >
											                                      
																				   <form id="packing"  action="' .base_url() . 'index.php/salesorders/packing_slip" method="post">
                                                                                        <input type="hidden" name="sales_id" value="' . $so->salesorder_id . '"/>
                                                                                         <input class="btn btn-default"type="submit"   value="Crown Packing Slip "/>
                                                                                    </form>
													                                </a>
											                                    </li>
                                                                                                      
                                                                                <li class="divider"></li>                       
                                                                                     <li>
											                                            <a href="'.base_url().'index.php/invoices/so_pdf/'. $so->salesorder_id .'"><button class="btn btn-default" > Direct Packing Slip  </button></a>
											                                         </li>';
										                                        				 
																				 
																				 
																				 ?>
											     </ul>
											</div>
										</div>
															
									
									
									
									            <!-- /BOX -->
							                                            </div>  
									
									    <br/> <br/>
                                        <!-- ORDER DETAILS -->
                                                    <!-- TABLE -->
                                                    <table id="datatable4" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                               
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Remove
                                                                </th>
                                                                <th tyle="width:10%; ">Item Code</th>
                                                                <th style="width:15%; ">
                                                                   Description
                                                                </th>                                                                
                                                                <th><div class='text-center '>
                                                                    Detail</div>
                                                                </th>
                                                                <th>
                                                                   Location 
                                                                </th>
																<th>
                                                                   Subtotal
                                                                </th>																
                                                                <th>
                                                                    QTY available
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
															
															
															if ($so->status === 'onhold') {
																
                                                                foreach ($bk_items->result() as $items) {

                                                                echo '<tr>
														   
											                                <td>
															                     <form >
																                 </form>
															                     <form  action="' . $base_url . 'index.php/salesorders/delete_onhlod_item" method="POST">
																                 <input type="hidden" name="itemqty" value="' . $items->item_qty . '"/>
																                 <input type="hidden" name="item_id" value="' . $items->item_id . '"/>
																	             <input type="hidden" name="CCL_Item" value="' . $items->CCL_Item . '"/>
																	             <input type="hidden" name="location" value="' . $items->location . '"/>
																	             <input type="hidden" name="wh_item_id" value="' . $items->wh_item_id . '"/>
																	             <input type="hidden" name="soid" value="' . $items->sales_id . '"/>
																	
																	                 <button type="submit" class="btn btn-danger pull-left  confirmation" value="submit" >X</button>
																                </form>
																
														                    </td>';
														              echo '<td>' . $items->CCL_Item . '</td>';
														              echo '<td>'. $items->Description . '</td>';
															
														                    
														              echo '<td>';
																	            echo '<div class="text-center">Order QTY: <br>'  . $items->item_qty . '</div>';
																				
																				echo '<div class="text-center">Unit Price:  <br>'  . $items->ItemPrice . '</div>';
																	
															          echo '</td>';
														    if (($so->status === 'pending')&&($items->backorderitem==='NO')) {
																   

																  
                                                                       echo '<td>  ';
														               $i++; 
															               { 
                                                                                echo '<div class="panel panel-default  ">
											                                            <div class="panel-heading    ">
																		 
												                                            <h5 class="panel-title "> 
																							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1_'.$i.'">
																			                     Order QTY :  '  . $items->item_qty . '<br>    Unit Price:   '  . $items->ItemPrice .'
																			                </a> 
																			                </h5>
											                                            </div>
											                                            <div id="collapse1_'.$i.'" class="panel-collapse collapse ">
												                                        <div class="panel-body"> ';
														
														                   
															                    echo '<form  action="' . $base_url . 'index.php/salesorders/update_item_qty_price" method="POST">';
	                                                                            
																				
																				
																				$ccl= $this->db->select('*')
                                                                                 ->where('CCL_Item', $items->CCL_Item)
								                                                 ->where('location', $items->location)
																				 ->get('warehouse');
																				foreach ($ccl->result() as $c) {}
																				
																				
																				
																				if(isset($c->qty)&&$c->qty>0){
																				
																				echo 'QTY <input type="number" name="new_order_qty" value="' . $items->item_qty . '"/>
																				           <input type="hidden" name="org_order_qty" value="' . $items->item_qty . '"/> <br/>';
																				
																		        }
																				else{
																				
																				echo 'QTY <input type="hidden" readonly="true" name="new_order_qty" value="' . $items->item_qty . '"/>' . $items->item_qty . '
																				           <br/>
																						   <input type="hidden" name="org_order_qty" value="' . $items->item_qty . '"/>';
																				}		   
																				echo 'Unit Price<input type="text"  name="ItemPrice" value="' . $items->ItemPrice . '"/>';
																				echo '          <input type="hidden" name="item_id" value="' . $items->item_id . '"/>
																				                <input type="hidden" name="onhand_qty" value="' . $c->qty . '"/>
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
															                    
															                    echo ' <br/><button type="submit" class="btn btn-danger center  " value="submit" >Save</button>';
															                    echo '</form>';
													
													
													
													
													
													                            echo '</div>
											                                    </div>
										                                    </div>';
                         										 
																            }
																                echo '</td>';
                                                                   }
																    else{
																   
                                                                            echo '<td>';
																	            echo '<div class="text-center">Order QTY: <br>'  . $items->item_qty . '</div>';
																				
																				echo '<div class="text-center">Unit Price:  <br>'  . $items->ItemPrice . '</div>';
																	
															                echo '</td>';
                                                                    }
														  
                                                            
														
														  
                                                                                                                  
														                    echo '<td>
															                        <div class="text-center">' . $items->location . '</div>
														                          </td>';
                                                           
                                                    
																           
																			 echo '<td>
															                        <div class="text-center">' . $items->itemlinetotal . '</div>
														                          </td>';
                                                           
                                                    
																            echo '<td>';													
																
																   
																   if ($items->backorderitem === 'YES') {
																     //not move from wh yet /info on bk_item
															   
															           echo '<span class="btn btn-default">Item on Hold</span></br></br>';
															   
															           $this->db->select('qty,location,SUM(qty) as total_qty');
                                                                       $this->db->where('CCL_Item',$items->CCL_Item);
                                                                       $q=$this->db->get('warehouse');
                                                                       $row=$q->row();
                                                                       $total_qty=$row->total_qty;
																	   $bk= $items->item_qty;
															            if ($total_qty < $bk){
																			
											                                 echo '<span class="btn btn-danger">Stocks Not Ok</span>';
																	
											 
																		}
																		else 
                                                                            echo '
																		            <p>   <a data-toggle="modal" data-id="' . $items->item_id . '" data-id2="' . $items->CCL_Item . '"title="Have Available Qty" class="open-AddBookDialog btn btn-info  pop-hover" data-title="Have Stock " data-content="' . $total_qty . 'in stock now, not onhold? click to update"" href="#addBookDialog2"><span><i class="">
																					   </i></span> <strong>Stocks Ok</strong></a></p>';
                                                                       
																	}
																	else {//moved from wh already/info on so_item
																		if(isset($c->qty)&&$c->qty>0){
																		
																		echo $c->qty.'<br>@'. $c->location;
																		}
																		else
																			echo ' ';
																	}      
																            echo '</td>';
																
																
																 
																    echo '<td></td>';
															
                                                                
                                                           echo' </tr>';
                                                            }
                                                            
															
															
															
															
															
															
														    }
														    else{
															
															$i=0;
                                                            foreach ($order_items->result() as $items) {

                                                                echo '<tr>
														   
											                                <td>
															                     <form >
																                 </form>
															                     <form  action="' . $base_url . 'index.php/salesorders/delete_item" method="POST">
																                 <input type="hidden" name="itemqty" value="' . $items->item_qty . '"/>
																                 <input type="hidden" name="item_id" value="' . $items->item_id . '"/>
																	             <input type="hidden" name="CCL_Item" value="' . $items->CCL_Item . '"/>
																	             <input type="hidden" name="location" value="' . $items->location . '"/>
																	             <input type="hidden" name="wh_item_id" value="' . $items->wh_item_id . '"/>
																	             <input type="hidden" name="soid" value="' . $items->sales_id . '"/>
																	            <input type="hidden" name="backorderitem" value="' . $items->backorderitem . '"/>
																	                 <button type="submit" class="btn btn-danger pull-left  confirmation" value="submit" >X</button>
																                </form>
																
														                    </td>';
														              echo '<td>' . $items->CCL_Item . '</td>';
														              echo '<td class="col-sm-2 " >'. $items->Description . '
															
														                    </td>';
														  
														    if (($so->status === 'pending')&&($items->backorderitem==='NO')) {
																   

																  
                                                                       echo '<td>  ';
														               $i++; 
															               { 
                                                                                echo '<div class="panel panel-default  ">
											                                            <div class="panel-heading    ">
																		 
												                                            <h5 class="panel-title "> 
																							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1_'.$i.'">
																			                     Order QTY :  '  . $items->item_qty . '<br>    Unit Price:   '  . $items->ItemPrice .'
																			                </a> 
																			                </h5>
											                                            </div>
											                                            <div id="collapse1_'.$i.'" class="panel-collapse collapse ">
												                                        <div class="panel-body"> ';
														
														                   
															                    echo '<form  action="' . $base_url . 'index.php/salesorders/update_item_qty_price" method="POST">';
	                                                                            
																				
																				
																				$ccl= $this->db->select('*')
                                                                                 ->where('CCL_Item', $items->CCL_Item)
								                                                 ->where('location', $items->location)
																				 ->get('warehouse');
																				 $qty=0;
																				foreach ($ccl->result() as $c) {
																					$qty= $c->qty; }
																				
																				
																				
																				if(isset($qty)&&$qty>0){
																				
																				echo 'QTY <input type="number" name="new_order_qty" value="' . $items->item_qty . '"/>
																				           <input type="hidden" name="org_order_qty" value="' . $items->item_qty . '"/> <br/>';
																				
																		        }
																				else{
																				
																				echo 'QTY <input type="hidden" readonly="true" name="new_order_qty" value="' . $items->item_qty . '"/>' . $items->item_qty . '
																				           <br/>
																						   <input type="hidden" name="org_order_qty" value="' . $items->item_qty . '"/>';
																				}		   
																				echo 'Unit Price<input type="text"  name="ItemPrice" value="' . $items->ItemPrice . '"/>';
																				echo '          <input type="hidden" name="item_id" value="' . $items->item_id . '"/>
																				                <input type="hidden" name="onhand_qty" value="' . $qty . '"/>
																	                            <input type="hidden" name="wh_item_id" value="' . $items->wh_item_id . '"/>
																						        <input type="hidden" name="sales_orders_rev" value="' . $items->sales_orders_rev . '"/>
																	                            <input type="hidden" name="sales_id" value="' . $items->sales_id . '"/>
																						        <input type="hidden" name="Description" value="' . $items->Description . '"/>
																	                            <input type="hidden" name="CCL_Item" value="' . $items->CCL_Item . '"/>
																						        <input type="hidden" name="location" value="' . $items->location. '"/>
																						   
																						   
																						   ';
																						   
														
                                          							                    echo ' <br/><button type="submit" class="btn btn-danger center  " value="submit" >Save</button>';
															                    echo '</form>';
													
													
													
													
													
													                            echo '</div>
											                                    </div>
										                                    </div>';
                         										 
																            }
																                echo '</td>';
                                                                   }
																    else{
																   
                                                                            echo '<td>';
																	            echo '<div class="text-center">Order QTY: <br>'  . $items->item_qty . '</div>';
																				
																				echo '<div class="text-center">Unit Price:  <br>'  . $items->ItemPrice . '</div>';
																	
															                echo '</td>';
                                                                    }
														  
                                                            
														
														  
                                                                                                                  
														                    echo '<td>
															                        <div class="text-center">' . $items->location . '</div>
														                          </td>';
                                                           
                                                     echo '<td>
															                        <div class="text-center">' . $items->itemlinetotal . '</div>
														                          </td>';
																    
																	
																	echo '<td>';

																   if ($items->backorderitem === 'YES'){
																      
															   
															                     echo '<span class="btn btn-default">Backordered Item</span></br></br>';
															                 
																			  $this->db->select('id,qty,location');
																			  $this->db->where('CCL_Item',$items->CCL_Item);
                                                                             $this->db->from('warehouse');
                                                                             $this->db->order_by('qty');
                                                                             $wh=$this->db->get(); 
																			 
																			 
																			 $this->db->select('qty,location,SUM(qty) as total_qty');
                                                                             $this->db->where('CCL_Item',$items->CCL_Item);
                                                                             $q=$this->db->get('warehouse');
                                                                             $row=$q->row();
                                                                       $total_qty=$row->total_qty;
																	   $bk= $items->item_qty;
															        
															                    if ($total_qty < $bk){
																			
											                                        echo '<span class="btn btn-danger">Stocks Not Ok</span>';

																		        }
																		        else { 
                                                                                     
																					/* echo '
																		              <a data-toggle="modal" data-id="' . $items->item_id . '" data-id2="' . $items->CCL_Item . '"title="Have Available Qty" class="open-AddBookDialog btn btn-info  pop-hover" data-title="Have Stock " data-content="' . $total_qty . 'in stock now, not backorder? click to update"" href="#addBookDialog2"><span><i class="">
																					   </i></span> <strong>Stock Update</strong></a>';
																					 */
																					
														//	echo form_open('salesorders/bk_to_update');
																					    echo '<form  action="' . $base_url . 'index.php/salesorders/bk_to_update" method="POST">';	
																				//  echo '<form  action="' . $base_url . 'salesorders/update_item_qty_price" method="POST">
																				         echo '        <input type="hidden" name="so_id" value="' . $this->uri->segment(3) . '"/>
																								<input type="hidden" name="bk_item_id" value="' . $items->item_id . '"/>
																						                <input type="hidden" name="CCL_Item" value="' .$items->CCL_Item. '"/>
																				                        <input type="hidden" name="itemPrice" value="' . $items->ItemPrice . '"/>
																					                    <input type="hidden" name="order_qty" value="' . $items->item_qty . '"/>';   
															                    
															                    echo ' <br/><button type="submit" value="submit"  title="Have Available Qty" 
																				                         class="btn btn-info  pop-hover" data-title="Have Stock " data-content="' . $total_qty . 'in stock now, not backorder? click to update""><strong>Stock Update</strong></button>';
															                   echo '</form>';
																				
                                                                                
	   
																			  $i++; 
															                       {
																	            echo '<a data-toggle="collapse" data-parent="#accordion" title="Have Available Qty" class="hidden accordion-toggle btn btn-info  pop-hover" data-title="Have Stock " data-content="' . $total_qty . 'in stock now, not backorder? click to update"" href="#collapse1_'.$i.'"><span><i class="">
																				            </i></span> <strong>test dont click Stock Update</strong></a>';
	
																						
																						
											                                        echo'<div id="collapse1_'.$i.'" class="panel-collapse collapse ">
												                                            <div class="panel-body"> ';
                                                                                      
																				
									
																					  
																											
													
													
													                            echo '</div>
											                                    </div>';	
																				
																		            }
										                                  
																                 }
																       		   
                                                                       
																	}
																	else {
																		if(isset($c->qty)&&$c->qty>0){
																		
																		echo $c->qty.'<br>@'. $c->location;
																		}
																		else
																			echo 'No Stock <br>@'. $items->location;
																	}      
																            echo '</td>';
																 echo '	<td>';		
																			
																if (($items->pick === 'NO')&&($items->backorderitem === 'NO'))
																{
																
																echo'<form action="' . base_url() . 'index.php/salesorders/pick" method="POST">
																          <input type="hidden" name="so_item_id" value="' . $items->item_id . '"/>
                                                                        <input type="hidden" name="sales_id" value="' . $items->sales_id . '"/>
																		<button type="submit" class="btn btn-pink">No</button>
                                                                                                                       </form>';
																 }
																 else  if (($items->pick === 'YES')&&($items->backorderitem   === 'NO')){
															
																    echo '<button class="btn btn-success"><i class="fa fa-check-square-o"></i></button>';
															
                                                                } 
																else 'n/a';
																	
																
																
																echo'</td>';
																	
																   
															                                                         
                                                            
                                                           echo' </tr>';
                                                            }
                                                            
															 }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <!-- /TABLE -->
										<!-- /ORDER DETAILS -->		
								</div>	
 
                            </div>
                    
                            <!-- /BOX -->
								
                                                 
													
													
                                                    <hr>
								<div class="col-md-12">
                                    <div class="panel panel-default">
                                        	
                                                    <!-- CUSTOMER DETAILS -->
                                        <div class="row">
                                                         <div class="col-sm-4 col-sm-offset-1">
                                                            <h4>
                                                               

                                                            </h4>
                                                        <?php     echo form_open('salesorders/save_note');
                                                                     echo '<input type="hidden" name="so_id" value="'. $this->uri->segment(3).'" />
                                                            <textarea  name="so_notes"class="col-md-8" style="height:100px;">'.$so->so_notes.'</textarea>
                                                            <button type="submit" class="btn btn-default">save notes</button>
                                                            </form>';
                                                         ?>
                                                        </div>
														<!-- CUSTOMER DETAILS -->
														 <div class="col-sm-4 pull-right">
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
															                    <button type="submit" class="btn btn-block btn-success"> Save </button> ';
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

                                                    
                                                    <br><br>
                                                  
                                            
                                                <!-- /PANEL BODY --> 

                                     
										
                                       
								
                                     </div>
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
            </div><!-- /CONTENT-->
        </div>
        </div>
    </div>
</section>



    <div class="modal fade col-md-10" style="overflow:hidden;"id="sales_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Select Buyer From the Customer List</h4>
            </div>
            <div class="modal-body">

<?php
echo form_open('salesorders/select_buyer/'.$this->uri->segment(3).'', 'class="form-horizontal "');
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
                                                
                                                         <input type="hidden" name="item_id" readonly="readonly" id="bookId" value=""/><br>
             
				                                         <input type="hidden" name="CCL_item" readonly="readonly" id="bookId2" value=""/><br>
                                         <?php $so_id=$this->uri->segment(3);
?>
				
                                                              
                                    <div class="box-body">
									    <form id="myForm" action="' . base_url() . 'salesorders/update_bkorder_to_regular" method="post">
									     <p> Backorder Item info</p>
										 
										 
										 
										 
										 
										 <?php
                                                $base_url = base_url();
										       
											        $this->db->select('*');
                                                    $this->db->where('sales_id',$this->uri->segment(3));
												 	$this->db->where('CCL_Item',$items->CCL_Item);  
                                                    $this->db->from('sales_orders_items');
													///  $this->db->from('backorders_items');
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




                                                       
                                                  
                                                     
                                                           
                                                        echo '    <input type="hidden" class="from control"name="wh_item_id' . $i. '" value="' . $table->id . '"/>';
                                                          
                                                             
                                                         echo '<tr class="sum gradeX">';
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
														
													 echo'<td><input type="submit" value="Submit" class="btn btn-primary pull-right"></br>';
                                                       
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

<!-- /.shipped --begin---->
<div class="modal fade"  style="overflow:hidden;" id="addBookDialog1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
								        
                                         <?php echo form_open('status/pending_to_shipped_viewpage'); ?>
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
				                                              
																<input size="100" maxlength="100"name="add_info" type="text" id="add_info"  />
                                                              
																</br>
				                                                </br>
																
				                                    <button type="submit" class="btn btn-block btn-primary">Packed and Dispatched </button>
             
			                    
			                             <div class="modal-footer">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                 <?php echo form_close(); ?>


                                         </div>
									</div>	 
                             </div>
                         </div>  
                    </div> 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

	</div>
</div>
<!-- /.shipped --end---->

<!---invoice---begin---->
<div class="modal fade" id="addBookDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="col-md-4 col-md-offset-4">  
    <div class="modal-dialog  basic-alert">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">To Invoice </h4>
            </div>
            <div class="modal-body">
			   <div class="row">
			            <div class="col-sm-6 center">
                                
                <p>Convert to Invoice</p>
               
                <!------
			   <?php echo form_open('salesorders/to_invoice_viewpage'); ?>
				 <input type="hidden" name="salesid" readonly="readonly" id="bookId" value=""/>               
               
                <button type="submit" class="btn btn-primary">Invoice </button>
				                  
               <?php echo form_close(); ?>
			   
			   ---->
                <a data-toggle="modal" data-id="<?php $so->salesorder_id ?>" class="open-AddBookDialog btn btn-primary" href="#add_inv"><span><i class=""></i></span> <strong>Invoice </strong></a>
																				               

				</div>	
						<div class="col-sm-6 center">
                <p>UNSHIP ORDER</p>

<?php echo form_open('salesorders/unship_viewpage '); ?>
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
 </div>
<!---invoice---end--->
<div class="modal fade" id="add_inv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="col-md-6 col-md-offset-3">  
	<div class="modal-dialog  basic-alert">
        <div class="modal-content">
            <div class="modal-header alert alert-danger">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Invoice</h4>
            </div>
            <div class="modal-body">
			   <div class="row">
			             
                            <?php echo form_open('salesorders/to_invoice_viewpage'); ?>
                        
						 <input type="hidden" name="salesid"  readonly="readonly"value="<?php echo $so->salesorder_id  ?>"/>               
               
						<div class="col-sm-6 center">
                            <button type="submit" name="where" value="invoices" class="btn btn-block btn-danger">Going to Invoice to Make Payment</button>
				        </div>
						<div class="col-sm-6 center">
							  <button type="submit" name="where" value="salesorders" class="btn btn-block  btn-inverse">No Pay</button>
							

                        </div>
						<?php echo form_close(); ?>
				</div>
            </div>
			
			<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div>
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

<script src="<?php echo base_url()?>assets/js/jquery.jeditable.js"></script>

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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<!-- FILE UPLOAD -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<!-- SELECT2 -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2/select2.min.js"></script>
<!-- UNIFORM -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/uniform/jquery.uniform.min.js"></script>
 
  


<script src="http://malsup.github.com/jquery.form.js"></script> 
<!-- The main application script -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-upload/js/main.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo base_url(); ?>assets/js/script.js"></script>

<!-- CUSTOM SCRIPT -->

<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script>
    jQuery(document).ready(function() {
        App.setPage("view");  //Set current page
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
				
		 $('#datatable3').dataTable();
		 $('#datatable4').dataTable();
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
    
    $(document).on("click", ".open-AddBookDialog", function() {
        var myBookId = $(this).data('id');
        $(".modal-body #bookId").val(myBookId);
        // As pointed out in comments, 
        // it is superfluous to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });
 $(document).on("click", ".open-AddEditinfoDialog", function() {
        //SHIPPING INFO
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
		 
		 var myBookId8 = $(this).data('id9');
		$(".modal-body #bookId9").val(myBookId9);
	      
		  
		  var mybId0 = $(this).data('bid0');
        $(".modal-body #bId0").val(mybId0);
		//BILLING INFO
		       var myBookId11 = $(this).data('id11');
        $(".modal-body #bookId11").val(myBookId11);
		
		 var myBookId12 = $(this).data('id12');
		$(".modal-body #billId2").val(myBookId12);
		
		 var myBookId13 = $(this).data('id13');
		$(".modal-body #bookId13").val(myBookId13);
		
		 var myBookId14 = $(this).data('id14');
		$(".modal-body #bookId14").val(myBookId14);
         
		      var myBookId15 = $(this).data('id15');
        $(".modal-body #bookId15").val(myBookId15);
		
    });

</script>
<script>
$('#my_modal').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var bookId = $(e.relatedTarget).data('book-id');

    //populate the textbox
    $(e.currentTarget).find('input[name="salesorder_id"]').val(bookId);
	
	
	
	

    var bookId2 = $(e.relatedTarget).data('book-id2');
    $(e.currentTarget).find('input[name="po_number"]').val(bookId2);
	
	
	 var bookId3 = $(e.relatedTarget).data('book-id3');
    $(e.currentTarget).find('input[name="ShipToCompanyName"]').val(bookId3);
	
	 var bookId4 = $(e.relatedTarget).data('book-id4');
    $(e.currentTarget).find('input[name="Shipping_Contact_No"]').val(bookId4);
	
	 var bookId5 = $(e.relatedTarget).data('book-id5');
    $(e.currentTarget).find('input[name="ship_Address_1"]').val(bookId5);
	
	 
	 var bookId6 = $(e.relatedTarget).data('book-id6');
    $(e.currentTarget).find('input[name="ship_Address_2"]').val(bookId6);
	
	 var bookId7 = $(e.relatedTarget).data('book-id7');
    $(e.currentTarget).find('input[name="ship_County"]').val(bookId7);
	
	 var bookId8 = $(e.relatedTarget).data('book-id8');
    $(e.currentTarget).find('input[name="ship_Postcode"]').val(bookId8);
	
	 var bookId9 = $(e.relatedTarget).data('book-id9');
    $(e.currentTarget).find('input[name="CompanyName"]').val(bookId9);
	
     var bookId10 = $(e.relatedTarget).data('book-id10');
    $(e.currentTarget).find('input[name="Shipping_Email"]').val(bookId10);
	
	
	  var bookId11 = $(e.relatedTarget).data('book-id11');
    $(e.currentTarget).find('input[name="Buyer_Phone_Numbe"]').val(bookId11);
	
	var bookId12 = $(e.relatedTarget).data('book-id12');
    $(e.currentTarget).find('input[name="Address_1"]').val(bookId12);
	
	 var bookId13 = $(e.relatedTarget).data('book-id13');
    $(e.currentTarget).find('input[name="Address_2"]').val(bookId13);
	
	 var bookId14 = $(e.relatedTarget).data('book-id14');
    $(e.currentTarget).find('input[name="County"]').val(bookId14);
	
	 var bookId15 = $(e.relatedTarget).data('book-id15');
    $(e.currentTarget).find('input[name="Postcode"]').val(bookId15);
	
	
	
	
	
	
	
	
	
	
});
</script>
<script>

  $(document).ready(function() {
  $(".js-example-placeholder-onhold").select2({
  placeholder: "Select Item Code,
  allowClear: true
});
});
</script>

<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure to remove it?');
    });
		function same_as_billing(){
		document.getElementsByName("ship_Address_1")[0].value=document.getElementsByName("Address_1")[0].value;
		document.getElementsByName("ship_Address_2")[0].value=document.getElementsByName("Address_2")[0].value;
		document.getElementsByName("ship_County")[0].value=document.getElementsByName("County")[0].value;
		document.getElementsByName("ship_Postcode")[0].value=document.getElementsByName("Postcode")[0].value;

	}
	function pick_all(){
         for(var x=0; x < document.getElementsByName("pick_no").length; x++){   // comparison should be "<" not "<="

     document.getElementsByName("pick_no")[x].innerHTML ='<button name="pick_yes" class="btn btn-success"><i class="fa fa-check-square-o"></i></button>' ;

              }
      	}
	function pick(data){

       document.getElementsByName("pick_no")[data].innerHTML ='<button name="pick_yes" class="btn btn-success"><i class="fa fa-check-square-o"></i></button>' ;
	}
	
	

</script>
<!-- /JAVASCRIPTS -->

<?php //echo Modules::run('template/footer'); ?>	        
</body>
</html>