<!-- DATE RANGE PICKER -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/responsive.css" >
	
<!-- TYPEAHEAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/typeahead/typeahead.css" />
<!-- FILE UPLOAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap-fileupload/bootstrap-fileupload.min.css" />
<!-- SELECT2 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select2/select2.min.css" />
<!-- UNIFORM -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/uniform/css/uniform.default.min.css" />
<!-- JQUERY UPLOAD -->
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/blueimp/gallery/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-upload/css/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-upload/css/jquery.fileupload-ui.css">



</head>
<body>

<?php echo Modules::run('template/menu'); ?>
<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
<div class="modal fade" id="EditBookDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit </h4>
            </div>
            <div class="modal-body">
                <div class="box border blue">
                    <div class="box-title">
                        <h4><i class="fa fa-book"></i>  </h4>
                      
                    </div>
                    <div class="box-body">
                        <form  action="<?php echo base_url(); ?>index.php/warehouse/edit" method="post" class="form-horizontal ">							
                            <input type="hidden" readonly="readonly" name="myitemid" id="myitemid"  class="form-control" value=""/>
                             <input type="hidden" readonly="qty" name="qty" id="qty" class="qty  form-control" value=""/>
                               
                        </form>

                    </div>
                    <!-- /DATE PICKER -->
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               
            </div>
        </div>
    </div>
</div>
<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
<div class="modal fade" id="addBookDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Move item </h4>
            </div>
            <div class="modal-body">
                <div class="box border blue">
                    <div class="box-title">
                        <h4><i class="fa fa-book"></i>  </h4>
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


                        <form  action="<?php echo base_url(); ?>warehouse/move_location" method="post" class="form-horizontal ">							

                            <p>Move from</p>
                            <table>
                                <tr>
                                <input type="hidden" readonly="readonly" name="myitemid" id="myitemid"  class="form-control" value=""/>
                                <!---
                                <td>CCL Code<input type="text" readonly="readonly" name="bookId" id="bookId"class="form-control" value=""/></td>
                                <td>Location <input type="text" readonly="location" name="location" id="location" class="form-control" value=""/></td>
                                <td> Current Qty <input type="text" readonly="qty" name="qty" id="qty" class="qty  form-control" value=""/></td>
                                </tr> 
                                -->
                                <div class="form-group"><div class="col-md-4">CCL Code<input type="text" readonly="readonly" name="bookId" id="bookId"class="form-control" value=""/></div>
                                                        <div class="col-md-4">Location <input type="text" readonly="location" name="location" id="location" class="form-control" value=""/></div>
                                                        <div class="col-md-4">Current Qty <input type="text" readonly="qty" name="qty" id="qty" class="qty  form-control" value=""/></div></div>



								
                                <tr> <p>TO</p>
                                <div class="form-group"><div class="col-md-4">CCL Code <input type="text" readonly="readonly" name="bookId" id="bookId" class="form-control" value=""/></div>
                                                        <div class="col-md-4">New Location 
														<form>

                            <select  name="newlocation" id="location" class="col-md-12" required="required" >
                                <option></option>
                         
                                 <?php
                                                      //2015/01/19 viola add
                                                     $location=$this->db->select('*') 
                                                       // $data['location']=$this->db->select('*')
			                                                    ->group_by('location')			  
			                                                    ->get('warehouse_location');


                                
								                    foreach ($location->result()as $loc) 
								                    {
                                                        echo '<option  value="' . $loc->location. '">' . $loc->location . '</option>  ';
                                                    }
                                ?>

                            </select>	                            		                                                                                     
                                                        </form>
								                        </div>
                                                        <div class="col-md-4">Move Qty <input type="number" id="moveqty" name="moveqty" min="0" class="moveqty form-control" value="0"/></div></div>

														
														
														
								<!---						
                                <td> CCL Code <input type="text" readonly="readonly" name="bookId" id="bookId" class="form-control" value=""/></td>
                                <td> New Location  <input type="text"  name="newlocation" id="location"class="form-control"  value=""/></td>
			                    <td>Move Qty <input type="text" id="moveqty" name="moveqty"  class="moveqty form-control" value="0"/>
                                 -->                                
								<button id="move" type="submit" class="btn btn-primary " onclick="greaterNum()"style="float: right;">Save changes</button></td>
                                
								<br>
								</br>
                              
                                </tr></table>
                        </form>

                    </div>
                    <!-- /DATE PICKER -->
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">   Close   </button>
                <!---
				<button type="button" class="btn btn-primary">Save changes</button>
				-->
            </div>
        </div>
    </div>
</div>
<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->

<!-- PAGE -->

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
                                        <a href="<?php echo base_url(); ?>">Main</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/warehouse">Warehouse</a>
                                    </li>
                                 
                                    <li>View / Edit Item </li>
                                </ul>
                                <!-- /BREADCRUMBS -->
                                <div class="clearfix">
                                    <h3 class="content-title pull-left">Warehouse item  Profile</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /PAGE HEADER -->
                    <!-- USER PROFILE -->
                    <?php /* echo validation_errors('<div class="alert alert-block alert-danger fade in">
											<a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
											<h4><i class="fa fa-times"></i> Oh no! You got an error!</h4>
												<p>Change this and that and try again.</p>
											
										</div>'); */?>
                    <div class="row">

							<div class="col-sm-2">
						        <div class="text-center">
							        <div class="btn-group">
									    <a class="btn btn-info btn-sm" href="<?php echo base_url();?>index.php/warehouse"> <i class="fa fa-reply"></i>   Back
                                                                
									    </a>
									
							        </div>
						        </div>
							</div>	
					        <div class="divide-20"></div>

					
			        </div>
					
					
					<br>
					<?php
foreach ($items->result() as $item) {
    
}
?>
					
					
					
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BOX -->
                            <div class="box border purple">
                                <div class="box-title">
                                    <h4><i class="fa fa-paste"></i><span class="hidden-inline-mobile">Item information</span></h4>
                                </div>
                                <div class="box-body">
                                    <div class="tabbable header-tabs user-profile">
                                        <ul class="nav nav-tabs">
										    
                                            <li class=""><a href="#pro_edit" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile"> Edit Main Item Info</span></a></li>
                                            
											
											<li class="active"><a href="#pro_overview" data-toggle="tab"><i class="fa fa-dot-circle-o"></i> <span class="hidden-inline-mobile">Overview</span></a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <!-- OVERVIEW -->
                                            <div class="tab-pane fade active in" id="pro_overview">
                                                <div class="row">
                                                    <!-- PROFILE PIC -->
                                                    <div class="col-md-3">
													       <div class="alert alert-success">
										                        <h2>Item :<?php echo $item->CCL_Item;?> </h2>
										                        <p><i class="fa fa-male fa-fw"></i>  Vendor:<?php echo $item->vendors_name; ?></p> 
										                        <p><i class="fa fa-paperclip fa-fw"></i>  Vendor Code: <?php echo $item->vendor_code; ?></p>
										                    </div>								
                                                    </div>
                                                    <!-- /PROFILE PIC -->
                                                    <!-- PROFILE DETAILS -->
                                                    <div class="col-md-9">
                                                        <!-- ROW 1 -->
                                                        <div class="row">
                                                            <div class="col-md-7 profile-details">																
                                                                <h3>Description</h3>
                                                                <?php echo $item->Description; ?>
                                                                <div class="divide-20"></div>

                                                            </div>
                                                            <div class="col-md-5">
                                                                <!-- BOX -->
                                                                <div class="box border green">
                                                                    <div class="box-title">
                                                                        <h4><i class="fa  fa-arrows-h"></i>Statistics</h4>
                                                                        <div class="tools">


                                                                        </div>
                                                                    </div>
                                                                    <div class="box-body big sparkline-stats">
                                                                        <div class="list-group">
                                                                            <li class="list-group-item zero-padding">
                                                                            </li>


                                                                            <a href="#" class="list-group-item"><i class="fa fa-info fa-fw"></i>  Item Length: <?php echo $item->L; ?>(mm) </a>
                                                                            <a href="#" class="list-group-item"><i class="fa fa-info fa-fw"></i>  Item Width : <?php echo $item->W; ?>(mm) </a>
                                                                            <a href="#" class="list-group-item"><i class="fa fa-info fa-fw"></i> Item Height: <?php echo $item->H; ?>(mm) </a>
                                                                            <a href="#" class="list-group-item"><i class="fa fa-location-arrow fa-fw"></i> Items Per Carton: <?php echo $item->QTY_CTN; ?></a>
                                                                        </div>	
                                                                    </div>
                                                                </div>
                                                                <!-- /BOX -->
                                                                <!-- /SAMPLE -->
                                                            </div>
                                                        </div>
                                                        <!-- /ROW 1 -->
                                                        <div class="divide-20"></div>
                                                        <!-- ROW 2 -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="box border blue">
                                                                    <div class="box-title">
                                                                        <h4><i class="fa fa-columns"></i> <span class="hidden-inline-mobile">Item Inventory </span></h4>																
                                                                    </div>
                                                                    <div class="box-body">
                                                                        <div class="tabbable">
                                                                            <ul class="nav nav-tabs">
                                                                                <li class="active"><a href="#sales" data-toggle="tab"><i class="fa fa-signal"></i> <span class="hidden-inline-mobile">Inventory</span></a></li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <div class="tab-pane active" id="sales">
                                                                                    <div class="pull-right hidden-xs">
                                                                                        <div class="btn-group"> 
									                                                         <a class="btn btn-default" data-toggle="modal" data-target="#additem">Add New Inventory
                                                                
									                                                         </a>
																							 
                                                                                        </div>
																						</br>
                                                                                    </div>
                                                                                    </br>
                                                                                    <table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover red">
                                                                                        <thead>
                                                                                            <tr>
																							    
                                                                                                <th>id</th>
																								
                                                                                                <th>item Code</th>
                                                                                                <th>Description</th>
                                                                                                <th>Price</th>
                                                                                                <th>location</th>
                                                                                                <th>QTY</th>
                                                                                                <th>Delete</th>
                                                                                                <th>Move</th>
																								<th>last update</th>
																							</tr>	
                                                                                        </thead>
                                                                                        <tbody>

                                                                                            <?php
                                                                                            $base_url = base_url();
                                                                                            $url = $this->uri->segment(3);
                                                                                            foreach ($get_all->result() as $table){  {




                                                                                                    echo '<tr class="gradeX">';
                                                                                                 
                                                                                                   echo'<td>' . $table->id . '</td>';
                                                                                                    echo'<td>' . $table->CCL_Item . '</td>';
                                                                                                    echo'<td>' . $table->Description . '</td>';
                                                                                                    echo'<td>' . $table->sell_price . '</td>';
                                                                                                    echo'<td>' . $table->location . '</td>';
                                                                                                    echo'<td>' . $table->qty . '</td>';
                                                                                                      //if ($table->id === $url) {
                                                                                                        // echo'  <td> Main item</td>';
                                                                                                         //} 
																								        //else 
																								        {
                                                                                                        echo'<td><form action="' . base_url() . 'warehouse/remove_item" method="post" class="confirmation">
                                                                                                                <input type="hidden" name="item_id" value="' . $this->uri->segment(3) . '"/>
                                                                                                            <input type="hidden" name="remove_id" value="' . $table->id . '"/>
                                                                                                            
                                                                                                               
                                                                                                                
                                                                                                                <button type="submit" class="btn btn-danger   confirmation">Remove</button>
                                                                                                         </form></td>';
                                                                                                    }
                                                                                                
                                                                                                    echo' <td>
                                                                                       
                                                                                                        <a data-toggle="modal" data-id="' . $table->CCL_Item . '" data-qty="' . $table->qty . '" data-location="' . $table->location . '" data-myitemid="' . $table->id . '"title="Add this item" class="btn btn-primary open-AddBookDialog btn btn-primary" href="#addBookDialog">Move Item</a>';
                                                                                                    echo'        <form  action="'.base_url().'warehouse/edit" method="post" class="form-horizontal ">							
                                                                                                                  <input type="hidden" readonly="readonly" name="myitemid" id="myitemid"  class="form-control" value="' . $table->id . '"/>
                                                                                                                  <input type="hidden" readonly="qty" name="qty" id="qty" class="qty  form-control" value=""/> 
																												
																												
																												
																												<input type="submit" class="btn btn-info" value="Edit Inventory Info" />';
                                                                                                               
                                                                                                    echo'        </td></form>
                                                                                       
                                                                                                        </td>';
																										 echo'        <td>'. $table->date_update.'</td>';
                                                                                                
                                                                                                    echo '</tr>';
                                                                                                }
                                                                                            }
                                                                                            ?>

                                                                                        </tbody>

                                                                                    </table>
                                                                                </div>
                                                                                <div class="tab-pane" id="feed">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /ROW 2 -->
                                                    </div>
                                                    <!-- /PROFILE DETAILS -->
                                                </div>
                                            </div>
                                            <!-- /OVERVIEW -->

                                            <!-- EDIT ACCOUNT -->
                                            <div class="tab-pane fade" id="pro_edit">

												
												<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/warehouse/itemupdate"method="post">
                                                    <div class="row">
													   
														<div class="col-md-12">
									                          <div class="divide-40"></div> 
										<div class="row">
										  <div class="col-md-6">
											 <div class="panel panel-default">
												<div class="panel-body">
													 <div class="tabbable">
														<ul class="nav nav-tabs">
														   <li class="active"><a href="#tab_1_1" data-toggle="tab"><i class="fa fa-home"></i>Item Information</a></li>

														</ul>
														<div class="tab-content">
														   <div class="tab-pane fade in active" id="tab_1_1">
															  <div class="divide-10"></div>
															  
															  
															            <div class="col-md-12">
                                                                            <h4>Basic Information</h4>
                                                                            <div class="form-group">
																			<input type="hidden" name="id" class="form-control" value="<?php echo $item->id; ?>">
                                                                                <label class="col-md-4 control-label">CCL Item Code</label> 
                                                                                <div class="col-md-8"><input type="hidden" name="CCL_Item" class="form-control" value="<?php echo $item->CCL_Item; ?>"><?php echo $item->CCL_Item; ?></div>
                                                                            </div>
                                                                            <div class="form-group">
													                                <label class="col-md-4 control-label">Category</label> 																   
														                                
                                                                                            <div class="col-md-8">
                                                                                                <select name="Category"  class="col-md-12">
                                                                                                 
																								 <option><?php echo $item->Category; ?></option>
                                                                                                  
                                                                                <?php
                                                      
                                                                                                 $Category=$this->db->select('*') 
                                                        
			                                                                                                ->group_by('Category')			  
			                                                                                                ->get('Warehouse');

								                                                                foreach ($Category->result()as $c) 
								                                                                {
                                                                                                    echo '<option  value="' . $c->Category. '">' .$c->Category . '</option>  ';
                                                                                                }
                                                                                ?>

                                                                                                </select>	
                            
							                                                                </div>                                                                                         
                                                                                                                                                                           																		
													                        </div>  
                                                                            <div class="form-group">
                                                                                <label class="col-md-4 control-label">Vendor Code</label> 
                                                                                <div class="col-md-8"><input type="text" name="vendor_code" class="form-control" value="<?php echo $item->vendor_code; ?>"></div>
                                                                            </div>

                                                                            
                                                                                      
                                                                            
                                                                                <div class="form-group">
													                                <label class="col-md-4 control-label">Vendor</label> 																   
														                                <form>
                                                                                            <div class="col-md-8">
                                                                                                <select name="vendors_name" class="col-md-12" required="required">
                                                                                                 
																								 <option><?php echo $item->vendors_name; ?></option>
                                                                                                  
                                                                                <?php
                                                      
                                                                                                 $vendor=$this->db->select('*') 
                                                        
			                                                                                                ->group_by('vendor_id')			  
			                                                                                                ->get('vendors');

								                                                                foreach ($vendor->result()as $ven) 
								                                                                {
                                                                                                    echo '<option  value="' . $ven->vendor_name. '">' .$ven->vendor_name . '</option>  ';
                                                                                                }
                                                                                ?>

                                                                                                </select>	
                            
							                                                                </div>                                                                                         
                                                                                        </form>                                                                                       																		
													                            </div>  
                                                                            <div class="form-group">
                                                                                <label class="col-md-2 control-label">length</label> 
                                                                                <div class="col-md-4"><input type="text" name="L" class="form-control" value="<?php echo $item->L; ?>"> (mm) </div>

                                                                                <label class="col-md-2 control-label">Width</label> 
                                                                                <div class="col-md-4"><input type="text" name="W" class="form-control" value="<?php echo $item->W; ?>"> (mm) </div>
                                                                            </div>  
																		    <div class="col-md-12"> 
                                                                                <label class="col-md-2 control-label">Height</label> 
                                                                                <div class="col-md-4"><input type="text" name="H" class="form-control" value="<?php echo $item->H; ?>"> (mm) </div>
                                                                            
                                                                            
																			<label class="col-md-2 control-label">Weight</label> 
                                                                            <div class="col-md-4"><input type="text" name="Weight" class="form-control" value="<?php echo $item->Product_Weight; ?>"></div>
                                                                            
                                                                            </div>                       




                                                                            <div class="form-group">
                                                                                <label class="col-md-4 control-label">Description</label> 
                                                                                     <div class="col-md-6">
																					     <textarea name="Description" class="form-control"><?php echo $item->Description; ?></textarea>
																					</div>
                                                                            </div>

                                                                        </div>
														   
														   
														   
														   </div>
														   
														</div>
													 </div>
												 </div>
											 </div>
										  </div>
										 <div class="col-md-6">
											 <div class="panel panel-default">
												<div class="panel-body">
													 <div class="tabbable">
														<ul class="nav nav-tabs">
														   <li class="active"><a href="#tab_1_1" data-toggle="tab"><i class="fa fa-home"></i>Item Setting</a></li>

														</ul>
														<div class="tab-content">
														   <div class="tab-pane fade in active" id="tab_1_1">
															  <div class="divide-10"></div>
															  
															    <div class="col-md-12">
                                                                    <h4>Admin Information</h4>
                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Buy Price USD</label> 
                                                                        <div class="col-md-8"><input type="text" name="buy_price_usd" class="form-control" value="<?php echo $item->DDU_Px; ?>"></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Buy Price EURO</label> 
                                                                        <div class="col-md-8"><input type="text" name="buy_price_euro" class="form-control" value="<?php echo $item->EUR_Px; ?>"></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Landed Price GBP</label> 
                                                                        <div class="col-md-8"><input type="text" name="buy_price_gbp"  value="<?php echo $item->buy_price; ?>"></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Sell Price</label> 
                                                                        <div class="col-md-8"><input type="text" name="sell_price" class="form-control" value="<?php echo $item->sell_price; ?>"></div>
                                                                    </div>
                                                              

                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
																		    <label class="col-md-2 control-label">CTN length</label> 
                                                                            <div class="col-md-4"><input type="text" name="CTN_L" class="form-control" value="<?php echo $item->CTN_L; ?>"> (cm) </div>
                                                                                
                                                                            <label class="col-md-2 control-label">CTN Width</label> 
                                                                            <div class="col-md-4"><input type="text" name="CTN_W" class="form-control" value="<?php echo $item->CTN_W; ?>">(cm)</div>
                                                                        
																		</div>  
																		<div class="col-md-12">                     
                                                                            <label class="col-md-2 control-label">CTN Height</label> 
                                                                            <div class="col-md-4"><input type="text" name="CTN_H" class="form-control" value="<?php echo $item->CTN_H; ?>">(cm)</div>
																			<label class="col-md-2 control-label">CTN Qty</label> 
                                                                            <div class="col-md-4"><input type="text" name="QTY_CTN" class="form-control" value="<?php echo $item->QTY_CTN; ?>"></div>
                                                                        </div>                          

                                                                    </div>

                                                                </div>
                                                         
														   
														   
														   </div>
														   
														</div>
													 </div>
												 </div>
											 </div>
										  </div>
									
										  </div>
									                         <input type="submit" value="Update Account" class="btn btn-block btn-info pull-right">
                                               
														</div> 

														
												    </div>

                                                </form>
											</div>
                                            <!-- /EDIT ACCOUNT -->


                                        </div>
                                    </div>
                                    <!-- /USER PROFILE -->
                                </div>
                            </div>
                        </div>
                    </div>









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

             <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add item </h4>
                </div>
                <div class="modal-body">
                  
       
                   <form  action="<?php echo base_url(); ?>warehouse/add_inv" method="post" class="form-horizontal ">							
        
                       <div class="row">
							<div class="col-md-12">
							    <div class="box border pink">
								   <div class="box-title">
										<h4>New Item Info</h4>
									</div>
									<div class="box-body big">
                                                                                                                                    
										<div class="row">
											   
											<div class="col-md-12">		
												<div class="col-md-11">
													<h4>Product Information</h4>
													 <table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover red">
                                                                                    
													<thead>
                                                        <tr>
                                                                                                
                                                            <th>item Code</th>
                                                            <th>Description</th>
																								<!---
																								<th>Vendor Code</th>
                                                                                                <th>Vendors</th>
                                                                                                ---->
                                                        <th>QTY</th>
														<th>location</th>
                                                                                                
                                                        </tr>    
                                                    </thead>
                                                                                        <tbody>
																						<?php
                                                                                            $base_url = base_url();
                                                                                                foreach ($items->result() as $items) {


 
												                                                echo '<tr class="gradeX">';
																								
                                                                                                // echo'<td><input type="text" name="CCL_Item"   class="form-control" value="' .$items->CCL_Item. '"/></td>';          
													                                            echo'<td>'.$items->CCL_Item.'</td>';                                                                                                                                                                                                                                                                                                                                                                                                                          
                                                                                                echo'<td>'.$items->Description.'</td>';
																						
																								echo'<td><input type="number" name="qty" min="0" class="form-control" value=" "></td>';	 
																									 
																									 
																								echo'<td> 	 
																								         <select name="location" id="ev" class="col-md-12" required="required">
                                                                                                    <option></option>';
                         
                                 
                                                                                                    $location=$this->db->select('*')                  
			                                                                                                           ->group_by('location')			  
			                                                                                                           ->get('warehouse_location');


                                
								                                                                    foreach ($location->result()as $loc)  {
								                                                                   
                                                                                                         echo '<option  value="' . $loc->location. '">' . $loc->location . '</option>  ';
                                                                                                     }
                                                                                                echo' </select>
																								
																	                                 </td>';  
                                                                                               // echo'<td>'.$items->qty.'</td>';
																								
                                                                                               // echo'<td>'.$items->sell_price.'</td>';												 
                                                                                                 


                                                                                                  
                                                                                                    echo'        						
                                                                                                                  <input type="text" name="id"   class="form-control" value="' .$items->id. '"/>';
																							
																										

                                                                                                    echo '</tr>';
                                                                                                }
                                                                                            
                                                                                            ?>
																						

																						
                                                                                        </tbody>
																					</table	>
													 
													
                                                   
 													
												</div>	
												
				 																		
												    
											
                                                </div>
												
												<button id="move" type="submit" class="btn btn-primary pull-right" onclick="greaterNum()">Add</button> 
													
                                                
												
												 
											</div> 	
                                                   

                                                                                                                                                 
       
												</div>
												                                                      <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>                                                                                           
							</div>
					</div>
				</form>
			</div>
            </div>
                    <!-- /DATE PICKER -->
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




<!-- CUSTOM SCRIPT -->

<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script>
                                        jQuery(document).ready(function() {
                                            App.setPage("view");  //Set current page
                                            App.init(); //Initialise plugins and elements
                                        });

                                        $(document).ready(function() {
                                            $('#datatable1').dataTable();
                                        });


                                        $(document).on("click", ".open-AddBookDialog", function() {
                                            var myBookId = $(this).data('id');
                                            var myLocation = $(this).data('location');
                                            var myQty = $(this).data('qty');
                                            var myItemId = $(this).data('myitemid');
                                            var myDescription = $(this).data('Description');


                                            $(".modal-body #bookId").val(myBookId);
                                            $(".modal-body #qty").val(myQty);
                                            $(".modal-body #location").val(myLocation);
                                            $(".modal-body #myitemid").val(myItemId);
                                             $(".modal-body #Description").val(myDescription);


                                        });

</script>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure to remove it?');
    });
</script>
<!-- /JAVASCRIPTS -->
<?php echo Modules::run('template/footer'); ?>	