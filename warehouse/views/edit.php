<!-- DATE RANGE PICKER -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
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
</body>

<?php echo Modules::run('template/menu'); ?>

<!-- PAGE -->
<section id="page">

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
                                        <a href="#">main</a>
                                    </li>
                                    <li>
                                        <a href="#">Warehouse</a>
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
                   <?php foreach ($item->result() as $item) {
                        
                    } ?>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- BOX -->
                            <div class="box border">
                                <div class="box-title">
                                    <h4><i class="fa fa-user"></i><span class="hidden-inline-mobile">Item :<?php echo $item->CCL_Item; ?> </span></h4>
                                </div>
                                <div class="box-body">
                                    <div class="tabbable header-tabs user-profile">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#pro_edit" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile"> Edit Inventory Info</span></a></li>
                                            </ul>
                                        <div class="tab-content">
                                            <!-- OVERVIEW -->
                                           
                                            <!-- /OVERVIEW -->

                                            <!-- EDIT ACCOUNT -->
                                            <div class="tab-pane fade active in"  id="pro_edit">
                                                <form action="<?php echo base_url(); ?>warehouse/inventoryupdate" method="post" class="form-horizontal" >
												
												     <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="box border green">
                                                                <div class="box-title">
                                                                    <h4><i class="fa fa-bars"></i>Edit item Information</h4>
                                                                </div>
                                                                
													
																<div class="box-body big">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h4>Inventory Information</h4>
                                                                            <div class="form-group">
																			<input type="hidden" name="id" class="form-control" value="<?php echo $item->id; ?>">
                                                                                <label class="col-md-4 control-label">CCL Item Code</label> 
                                                                                <div class="col-md-8"><input type="text" name="CCL_Item" class="form-control" value="<?php echo $item->CCL_Item; ?>"  readonly="readonly"></div>
                                                                            </div>
                                                                            <!-----
                                                                            <div class="form-group">
                                                                                <label class="col-md-4 control-label">Vendor Code</label> 
                                                                                <div class="col-md-8"><input type="text" name="vendor_code" class="form-control" value="<?php echo $item->vendor_code; ?>"></div>
                                                                            </div>

                                                                            
                                                                                      
                                                                            
                                                                                <div class="form-group">
													                                <label class="col-md-4 control-label">Vendor</label> 																   
														                                <form>
                                                                                            <div class="col-md-8">
                                                                                                <select name="vendors_name" id="e1" class="col-md-12" required="required">
                                                                                                 
																								 <option><?php echo $item->vendors_name; ?></option>
                                                                                                  
                                                                                <?php
                                                      
                                                                                                 $vendor=$this->db->select('*') 
                                                        
			                                                                                                ->group_by('vendor_id')			  
			                                                                                                ->get('vendors');

								                                                                foreach ($vendor->result()as $ven) 
								                                                                {
                                                                                                    echo '<option  value="' . $ven->vendor_id. '">' .$ven->vendor_name . '</option>  ';
                                                                                                }
                                                                                ?>

                                                                                                </select>	
                            
							                                                                </div>                                                                                         
                                                                                        </form>                                                                                       																		
													                            </div>  
                                                                            <div class="form-group">
                                                                                <label class="col-md-2 control-label">length</label> 
                                                                                <div class="col-md-4"><input type="text" name="L" readonly="readonly"class="form-control" value="<?php echo $item->L; ?>"> (cm) </div>

                                                                                <label class="col-md-2 control-label">Width</label> 
                                                                                <div class="col-md-4"><input type="text" name="W" readonly="readonly"class="form-control" value="<?php echo $item->W; ?>"> (cm) </div>
                                                                            </div>  
																		    <div class="col-md-12"> 
                                                                                <label class="col-md-2 control-label">Height</label> 
                                                                                <div class="col-md-4"><input type="text" name="H" readonly="readonly"class="form-control" value="<?php echo $item->H; ?>"> (cm) </div>
                                                                            
                                                                            <---
                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label">Description</label> 
                                                                                <div class="col-md-9"><textarea name="Description" readonly="readonly" class="form-control"><?php echo $item->Description; ?></textarea></div>
                                                                            </div>
                                                                           -->
																			
                                                                               
                                                                            </div>   
                                                                            <div class="form-group">																			
                                                                             <label class="col-md-4 control-label">Storage Qty</label> 
                                                                            <div class="col-md-4"><input type="text" name="qty" class="form-control" value="<?php echo $item->qty; ?>"></div>
</div >

                                                                           

                                                                            <div class="form-group">
													                            <label class="col-md-4 control-label">Location</label> 																   
														                              
                                                                                         <div class="col-md-8">
                                                                                             <select name="location" id="e2" class="col-md-12" required="required" >
                                                                                    <option><?php echo $item->location; ?></option> 
																					                         
                                                                            <?php
                                                                                    //2015/01/19 viola add
                                                                                    $location=$this->db->select('*') 
			                                                                                        ->group_by('location')			  
			                                                                                        ->get('warehouse_location');
								                                                    foreach ($location->result()as $loc) 
								                                                    {
                                                                                        echo '<option  value="' . $loc->location. '">' . $loc->location . '</option>  ';
                                                                                    }
                                                                            ?>
                                                                                             </select>	
							                                                            </div>                                                                                         
                                                                                       <form>                                                                                    																		
													                        </div>  



                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
														<!-----
                                                        <div class="col-md-6 form-vertical">
                                                            <div class="box border inverse">
                                                                <div class="box-title">
                                                                    <h4><i class="fa fa-bars"></i>Item Settings</h4>
                                                                </div>
                                                                <div class="box-body big">
                                                                    <h4>Admin Information</h4>
                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Buy Price USD</label> 
                                                                        <div class="col-md-8"><input type="text" name="buy_price_usd" readonly="readonly" class="form-control" value="<?php echo $item->DDU_Px; ?>"></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Buy Price EURO</label> 
                                                                        <div class="col-md-8"><input type="text" name="buy_price_euro" readonly="readonly" class="form-control" value="<?php echo $item->EUR_Px; ?>"></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Buy Price GBP</label> 
                                                                        <div class="col-md-8"><input type="text" name="buy_price_gbp" readonly="readonly" class="form-control" value="<?php echo $item->buy_price; ?>"></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Sell Price</label> 
                                                                        <div class="col-md-8"><input type="text" name="sell_price" class="form-control" value="<?php echo $item->sell_price; ?>"></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">PO_No</label> 
                                                                        <div class="col-md-8"><input type="text" name="po_no" class="form-control" value="<?php echo $item->PO; ?>"></div>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
																		    <label class="col-md-2 control-label">CTN length</label> 
                                                                            <div class="col-md-4"><input type="text" name="CTN_L" readonly="readonly" class="form-control" value="<?php echo $item->CTN_L; ?>"> (cm) </div>
                                                                                
                                                                            <label class="col-md-2 control-label">CTN Width</label> 
                                                                            <div class="col-md-4"><input type="text" name="CTN_W" readonly="readonly" class="form-control" value="<?php echo $item->CTN_W; ?>">(cm)</div>
                                                                        
																		</div>  
																		<div class="col-md-12">                     
                                                                            <label class="col-md-2 control-label">CTN Height</label> 
                                                                            <div class="col-md-4"><input type="text" readonly="readonly" name="CTN_H" class="form-control" value="<?php echo $item->CTN_H; ?>">(cm)</div>
																			<label class="col-md-2 control-label">CTN Qty</label> 
                                                                            <div class="col-md-4"><input type="text" name="QTY_CTN" class="form-control" value="<?php echo $item->QTY_CTN; ?>"></div>
                                                                        </div>                          

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
														---->
														
                                                    </div>
												
												
												
												
												
												
												
												
												
												

												
												
												
												
												
												
												
												
												<!----from Andy
                                                    <div class="row">
													
                                                        <div class="col-md-6">
                                                            <div class="box border green">
                                                                <div class="box-title">
                                                                    <h4><i class="fa fa-bars"></i>Edit item Information</h4>
                                                                </div>
                                                                <div class="box-body big">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h4>Basic Information</h4>
                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label">CCL Item Code</label> 
                                                                                <div class="col-md-9">
                                                                                    <input type="text" name="CCL_Item" class="form-control" value="<?php echo $item->CCL_Item; ?>"></div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label">Vendor Code</label> 
                                                                                <div class="col-md-9"><input type="text" name="vendor_code" class="form-control" value="<?php echo $item->vendor_code; ?>"></div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label">Vendor Name</label> 
                                                                                <div class="col-md-9"><input type="text" readonly="readonly" name="vendor_name" class="form-control" value="<?php echo $item->vendors_name; ?>"></div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-md-2 control-label">length</label> 
                                                                                <div class="col-md-4"><input type="text" name="L" class="form-control" value="<?php echo $item->L; ?>"></div>

                                                                                <label class="col-md-2 control-label">Width</label> 
                                                                                <div class="col-md-4"><input type="text" name="W" class="form-control" value="<?php echo $item->W; ?>"></div>

                                                                                

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-2 control-label">Height</label> 
                                                                                <div class="col-md-4"><input type="text" name="H" class="form-control" value="<?php echo $item->H; ?>"></div>
     
                                                                                <label class="col-md-2 control-label">QTY</label> 
                                                                                <div class="col-md-4"><input type="text" name="qty" class="form-control" value="<?php echo $item->qty; ?>"></div>

                                                                                </div>

                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label">Description</label> 
                                                                                <div class="col-md-9"><textarea name="Description" class="form-control"><?php echo $item->Description; ?></textarea></div>
                                                                            </div>


                                                                            <div class="form-group">
																			
                                                                                <label class="col-md-3 control-label">Location</label> 
                                                                               <div class="col-md-4"><input type="text" name="Location" class="form-control" value="<?php echo $item->location; ?>"></div>
                                                                            
																			<div class="col-md-8">
														                                         <select   name="location" id="location" class="col-md-12" required="required" onchange="showUser(this.value)">
                                
                                                                                                                   <option  value="<?php echo $item->location; ?>"><?php echo$item->location ; ?></option>
                                                                                                                   <?php
                                                                                                                            //2015/01/19 viola add
                                                                                                                               $location=$this->db->select('*') 
			                                                                                                                                  ->group_by('location')			  
			                                                                                                                                  ->get('warehouse_location');


                                
								                                                                                                 foreach ($location->result()as $loc) 
								                                                                                                          {
                                                                                                                                             echo '<option  value="' . $loc->location. '">' . $loc->location . '</option>  ';
                                                                                                                                          }
                                                                                                                    ?> 

                                                                                                </select>	                            		                                                                                     														
														
														                    </div>
																			
																			
																			
																			</div>



                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
														
                                                        <div class="col-md-6 form-vertical">
                                                            <div class="box border inverse">
                                                                <div class="box-title">
                                                                    <h4><i class="fa fa-bars"></i>Item Settings</h4>
                                                                </div>
                                                                <div class="box-body big">
                                                                    <h4>Admin Information</h4>
                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Buy Price USD</label> 
                                                                        <div class="col-md-8"><input type="text" name="DDU_Px" class="form-control" value="<?php echo $item->DDU_Px; ?>"></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Buy Price EURO</label> 
                                                                        <div class="col-md-8"><input type="text" name="EUR_Px" class="form-control" value="<?php echo $item->EUR_Px; ?>"></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Buy Price GBP</label> 
                                                                        <div class="col-md-8"><input type="text" name="buy_price" class="form-control" value="<?php echo $item->buy_price; ?>"></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Sell Price</label> 
                                                                        <div class="col-md-8"><input type="text" name="sell_price" class="form-control" value="<?php echo $item->sell_price; ?>"></div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">PO_No</label> 
                                                                        <div class="col-md-8"><input type="text" name="po_no" class="form-control" value="<?php echo $item->PO; ?>"></div>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">CTN length</label> 
                                                                        <div class="col-md-4"><input type="text" name="CTN_L" class="form-control" value="<?php echo $item->CTN_L; ?>"></div>

                                                                        <label class="col-md-2 control-label">CTN Width</label> 
                                                                        <div class="col-md-4"><input type="text" name="CTN_W" class="form-control" value="<?php echo $item->CTN_W; ?>"></div>

                                                                       
                                                                    </div><div class="form-group"> 
                                                                         <label class="col-md-2 control-label">CTN Height</label> 
                                                                        <div class="col-md-4"><input type="text" name="CTN_H" class="form-control" value="<?php echo $item->CTN_H; ?>"></div>
                                                                        <label class="col-md-2 control-label">CTN QTY</label> 
                                                                        <div class="col-md-4"><input type="text" name="QTY_CTN" class="form-control" value="<?php echo $item->QTY_CTN; ?>"></div>
                                                                    </div>   
																		
                                                                        <input type="hidden" name="itemid" class="form-control" value="<?php echo $item->id; ?>">
                                                                   

                                                                </div>
                                                            </div>
                                                        </div>
                                                    
													</div>

												-----from Andy----->	
													
                                                    <div class="form-actions clearfix"> 
													
												
													<input type="submit" value="Update" class="btn btn-primary pull-left" > 
													
                                                
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
                                            App.setPage("forms");  //Set current page
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
<!-- /JAVASCRIPTS -->
<?php echo Modules::run('template/footer'); ?>	