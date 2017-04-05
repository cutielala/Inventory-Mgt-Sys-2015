<?php echo Modules::run('template/dash_head'); ?>
<!-- DATA TABLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/datatables/media/assets/css/datatables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
       <!-- TYPEAHEAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/typeahead/typeahead.css" />
<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />

	<!-- JQGRID -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jqgrid/css/ui.jqgrid.min.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
<!-- SELECT2 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select2/select2.min.css" />
<script src="http://malsup.github.com/jquery.form.js"></script> 
 

   

</head>
</body>


<?php echo Modules::run('template/menu'); ?>
<?php // echo Modules::run('template/menu_admin'); ?>

								 
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
											<a href="<?php echo base_url();?>">Main</a>
										</li>
										<li>
											<a href="<?php echo base_url();?>index.php/warehouse">Warehouse</a>
										</li>
										
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Warehouse</h3>
									</div>
									<div class="description">All Warehouse items</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
                                                
                                                
                                                <!-- customer add-->
					    <div class="row">
				
							<div class="col-md-4 col-md-offset-4">
						       <div class="text-center">
							        <div class="clearfix">
									<a class="btn btn-block btn-purple" data-toggle="modal" data-target="#additem">Add New Item
                                                                
									</a>
									
							        </div>
						        </div>
					            <div class="divide-20"></div>

					        </div>
						</div>
						<!-- /customer add -->
                                                
                                                
                        <div class="separator"></div>
						<!-- DATA TABLES -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border purple">
									<div class="box-title">
										<h4><i class="fa fa-desktop fa-fw"></i>Item List</h4>
										<div class="tools hidden-xs">
											
											<a href="javascript:;" class="collapse">
												<i class="fa fa-chevron-up"></i>
											</a>
											
										</div>
									</div>
									<div class="box-body">
										<table id="datatable" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover red">
											<thead>
												<tr><th>item Code</th>
														
													<th>Category</th>
													<th>Description</th>
													<th>Qty Available</th>
                                                    <th>Price</th>                                                   
                                                    <th>last Vendor</th>   
                                                    <th width="15%"> Change </th>
												</tr>
											</thead>
											<tbody>
                                                                                            
                                            <?php 
                                                            $base_url = base_url();
                                                            foreach ($Ware->result() as $items) {


 
												echo '<tr class="gradeX">';
                                                                                                        
													echo'<td><strong>'.$items->CCL_Item.'</strong></td>';                                                                                                                                                                                                                                                                                                                                                                                                                          
                                                    echo'<td><strong>'.$items->Category.'</strong></td>';
													echo'<td><strong>'.$items->Description.'</strong></td>';
                                                    echo'<td><strong>'.$items->qty.'</strong></td>';
                                                    echo'<td><strong>'.$items->sell_price.'</strong></td>';
													 
                                                   echo'<td><strong>'.$items->vendors_name.'</strong></td>';                                            
													echo'<td><div class="btn-group dropdown" >
											<button class="btn btn-info">Settings</button>
											<button class="btn btn-purple dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
											<li>
											<a href="'.$base_url.'index.php/warehouse/view/'.$items->id.'">View /Edit/Inventory</a>
											</li>
											
											
											<li class="divider"></li>
											<li>
											<a href="'.$base_url.'index.php/warehouse/delete/'.$items->id.'" class="confirmation">Delete</a>
											</li>
                                            <li class="divider"></li>
                                                                                        
											</ul>
											</div></td>';
													
												echo '</tr>';
											
                                            }?>
												
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
                  
       
                <form  action="<?php echo base_url(); ?>warehouse/add" method="post" class="form-horizontal ">							
        
                    <div class="row">
							<div class="col-md-12">
									<div class="box border pink">
										<div class="box-title">
											<h4>New Item Info</h4>
										</div>
										<div class="box-body big">
                                                                                                                                    
											<div class="row">
											   
											<div class="col-md-12">		
												<div class="col-md-6">
													<h4>Product Information</h4>
                                                                                                                                          
													<div class="form-group">
													<label class="col-md-4 control-label">CCL Code</label> 
													    <div class="col-md-8"><input type="text" name="CCL_Item"  required="" class="form-control" value=""></div>
													</div>
													
													
													<div class="form-group">
													<label class="col-md-4 control-label">Category</label> 																   
														<form>
                                                            <div class="col-md-8">
                                                                <select name="Category"  class="col-md-12" required="required">
                                                                 <option></option>
                         
                                 <?php
                                                      //2015/01/19 viola add
                                                     $category=$this->db->select('*') 
                                                       // $data['location']=$this->db->select('*')
			                                                    ->group_by('Category')			  
			                                                    ->get('warehouse');


                                
								                    foreach ( $category->result()as $cat) 
								                    {
                                                        echo '<option  value="' . $cat->Category. '">' .$cat->Category . '</option>  ';
                                                    }
                                ?>

                                                                 </select>	
                            
							                                </div>                                                                                         
                                                        </form>                                                                                       																		
													</div> 
                                                    <div class="form-group">
													<label class="col-md-4 control-label">Description </label> 
                                                        <div class="col-md-8">
														    <textarea  name="Description" class="form-control" >
															</textarea>
														</div>
													</div>
													<div class="form-group">
													<label class="col-md-4 control-label">Vendor Code </label> 
                                                        <div class="col-md-8">
														    <input type="text" name="vendor_code" class="form-control" >
															 
														</div>
													</div>
													<div class="form-group">
													<label class="col-md-4 control-label">Vendor</label> 																   
														<form>
                                                            <div class="col-md-8">
                                                                <select name="vendor" id="ev" class="col-md-12" required="required">
                                                                 <option></option>
                         
                                 <?php
                                                      //2015/01/19 viola add
                                                     $vendor=$this->db->select('*') 
                                                       // $data['location']=$this->db->select('*')
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
													<label class="col-md-4 control-label">Location</label> 																   
														<form>
                                                            <div class="col-md-8">
                                                                <select name="location" id="el" class="col-md-12" required="required" >
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
                            
							                                </div>                                                                                         
                                                        </form>                                                                                       																		
													</div>
 													<!----
												    <div class="form-group">
														<label class="col-md-4 control-label">Stock Qty</label> 
															<div class="col-md-8"><input type="text" name="qty" class="form-control" value=""></div>
													</div>
													--->
												</div>	
												
												<div class="col-md-6">			
													<h4>Measurements</h4>
													
													<div class="form-group">
                                                                            <div class="col-md-12">     
																				<label class="col-md-2 control-label">length</label> 
                                                                                <div class="col-md-4"><input type="text" name="L" class="form-control" value=""> (mm) </div>

                                                                                <label class="col-md-2 control-label">Width</label> 
                                                                                <div class="col-md-4"><input type="text" name="W" class="form-control" value=""> (mm) </div>
                                                                            </div> 
																		    <div class="col-md-12"> 
                                                                                <label class="col-md-2 control-label">Height</label> 
                                                                                <div class="col-md-4"><input type="text" name="H" class="form-control" value=""> (mm) </div>
                                                                                <label class="col-md-2 control-label">Stock QTY</label> 
                                                                                <div class="col-md-4"><input type="text" name="qty" class="form-control" value=""></div>

                                                                             </div>
													</div> 						 
													</br>
													<div class="form-group">
                                                                        <div class="col-md-12">
																		    <label class="col-md-2 control-label">CTN length</label> 
                                                                            <div class="col-md-4"><input type="text" name="CTN_L" class="form-control" value=""> (cm) </div>
                                                                                
                                                                            <label class="col-md-2 control-label">CTN Width</label> 
                                                                            <div class="col-md-4"><input type="text" name="CTN_W" class="form-control" value="">(cm)</div>
                                                                        
																		</div>  
																		<div class="col-md-12">                     
                                                                            <label class="col-md-2 control-label">CTN Height</label> 
                                                                            <div class="col-md-4"><input type="text" name="CTN_H" class="form-control" value="">(cm)</div>
																			<label class="col-md-2 control-label">CTN Qty</label> 
                                                                            <div class="col-md-4"><input type="text" name="QTY_CTN" class="form-control" value=""></div>
                                                                        </div>                          

                                                    </div>
												</div>
											</div>	
											<div class="col-md-12">		
                                                <div class="col-md-6">			
													<h4>Costing Info</h4>                                                                                                
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
												</div>	
                                                <div class="col-md-6">			
													<h4>Sales Info</h4> 						
													<div class="form-group">
														<label class="col-md-4 control-label">Sell Price</label> 
															<div class="col-md-8">
																<div class="input-group">
                                                                    <span class="input-group-addon">&pound;</span>
																	<input type="text" name="sell_price" class="form-control" placeholder="Sell Price" value="">
																</div>																			
															</div>
													</div>
                                                </div>
											</div> 	
                                                    <button id="move" type="submit" class="btn btn-block btn-pink pull-right" onclick="greaterNum()">Add</button>    
                                       
                                                                                                                                                
                                                                                                                                                 
       
												</div>
											</div>
										</div>
									</div>
                    </div>
					
       
    
       
    </form>


                    <!-- /DATE PICKER -->
               
                   <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Close</button>
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
       
                            <td>CCL Code<input type="text" readonly="readonly" name="bookId" id="bookId"class="form-control" value=""/>
							</td>
                            <td>Location <input type="text" readonly="location" name="location" id="location" class="form-control" value=""/>
						    </td>
                            <td> Current Qty <input type="text" readonly="qty" name="qty" id="qty" class="qty  form-control" value=""/>
							</td>
                    </tr>          
                    <tr> <p>TO</p>
                
                            <td> ID <input type="text" readonly="readonly" name="bookId" id="bookId" class="form-control" value=""/>
							</td>
                            <td> New Location  <input type="text"  name="newlocation" id="location"class="form-control"  value=""/>
							</td>
                            <td>Move Qty <input type="text" id="moveqty" name="moveqty"  class="moveqty form-control" value="0"/>
                                Move Qty <input type="text" id="total_amount" name="total_amount"  class="total_amount" value=""/>
								<button id="move" type="submit" class="btn btn-primary" onclick="greaterNum()">Save</button>
							</td>
    
                            <br>
                    </tr>
				</table>
    </form>

</div>
                    <!-- /DATE PICKER -->
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
	
	<script src="<?php echo base_url();?>assets/js/script.js"></script>
	<script>
	// Natural Sorting
    jQuery.fn.dataTableExt.oSort['natural-asc'] = function(a, b) {
        return naturalSort(a, b);
    };
    jQuery.fn.dataTableExt.oSort['natural-desc'] = function(a, b) {
        return naturalSort(a, b) * -1;
    };
	 
	 jQuery(document).ready(function() {
        App.setPage("dynamic_table");
		App.setPage("warehouse");  //Set current page
        App.init(); //Initialise plugins and elements
    });
		
              


         $(document).ready(function(){
		 $('#datatable1').dataTable();
        $('#datatable').dataTable();
});

  $(document).on("click", ".open-AddBookDialog", function () {
     
	 var myBookId = $(this).data('id');
     var myLocation = $(this).data('location');
     var myQty = $(this).data('qty');
     var myItemId = $(this).data('myitemid');
     
     
     $(".modal-body #bookId").val(myBookId);
      $(".modal-body #qty").val(myQty);
       $(".modal-body #location").val(myLocation);
        $(".modal-body #myitemid").val(myItemId);
      App.setPage("forms");  //Set current page
	  App.init(); //Initialise plugins and elements  

});




	</script>
        
         <script src="http://malsup.github.com/jquery.form.js"></script> 
   <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            
            // bind 'myForm' and provide a simple callback function 
     $('#myForm').ajaxForm(function() { 
    
    var value1;
    var value2;
 
    value1 = document.getElementById("qty").value;
    value2 = document.getElementById("moveqty").value;
    
        if (value1 < value2){
        
        alert('this would leave a negative value and move will be void');
        return false;
         }
      
            }); 
        }); 
    </script> 
	<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure to delete it?');
    });
</script>
	<!-- /JAVASCRIPTS -->
<?php echo Modules::run('template/footer'); ?>					