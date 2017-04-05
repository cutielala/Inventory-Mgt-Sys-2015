       <!-- DATA TABLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
<!-- DATE RANGE PICKER -->
       <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
         	<!-- TYPEAHEAD -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/typeahead/typeahead.css" />
	<!-- FILE UPLOAD -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-fileupload/bootstrap-fileupload.min.css" />
	<!-- SELECT2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/select2/select2.min.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/uniform/css/uniform.default.min.css" />
	<!-- JQUERY UPLOAD -->
	<!-- blueimp Gallery styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/js/blueimp/gallery/blueimp-gallery.min.css">
	<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-upload/css/jquery.fileupload.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-upload/css/jquery.fileupload-ui.css">

    
</head>
        </body>

<?php echo Modules::run('template/menu'); ?>

        <?php foreach ($company->result() as $company)
        {
           
        }?>
        <!-- PAGE -->
	<section id="page">
				
		<div id="main-content">
		    
			<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
		    <div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog">
			        <div class="modal-content">
						<div class="modal-header">
				 	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  		    <h4 class="modal-title">Customer Settings</h4>
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
													
													<th>item Code</th>
													<th>Description</th>
                                                    <th> Price </th>
                                                    <th> add </th>
												</tr>
											</thead>
									        <tbody>
                                                                                            
                                                <?php 
                                                    $base_url = base_url();
                                                        foreach ($query->result() as $table) {
                                                            //if($table->qty > 0){
                                     


 
												 echo '<tr class="gradeX">';
                                                    echo '<form id="additem"  action="'.base_url().'index.php/businesses/item_added" method="post">';
                                                                                               
                                                        echo'<input type="hidden" class="from control" name="id" value="'.$this->uri->segment(3).'"/>';
														 echo'<input name="Company_name" type="hidden"  value="'. $company->Company_name.'" required="required"/>';
													        echo'<td><strong><input type="hidden" class="from control"name="CCL_Item" value="'.$table->CCL_Item.'"/>'.$table->CCL_Item.'</strong></td>';
                                                                echo'<td><strong><input type="hidden" class="from control"name="Description" value="'.$table->Description.'"/>'.$table->Description.'</strong></td>';
                                                                    echo'<td><strong><div class="form-group"><div class="col-md-2"><input type="text" class="from control"name="itemPrice" value="'.$table->sell_price.'"/>'.$table->sell_price.'</div></div></strong></td>';
                                                                                                       
													echo'<td><input type="submit"  class="btn btn-primary" value="ADD"></button></td>';
													 echo '</form>';echo '</tr>';
												
                                                                                                 
                                                                                                // }
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
				        </div>
			        </div>
			    </div>
		    </div>
		<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="container">
				<div class="row">
				    <!----CONTENT--->
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
											<a href="<?php echo base_url();?>index.php/Company">Company</a>
										</li>	
										
										<li>Company Profile</li>
										
									</ul>
									<!-- /BREADCRUMBS -->
								
									<div class="clearfix">
										<h3 class="content-title pull-left">Company Profile : <?php  echo $company->Company_name; ?></h3>
									</div>
									<div class="description"></div>
                                    <div id="results"></div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<div class="row">

							<div class="col-md-2">
						        <div class="text-center">
							        <div class="btn-group">
									    <a class="btn btn-info" href="<?php echo base_url();?>index.php/businesses"> <i class="fa fa-reply"></i>   Back
                                                                
									    </a>
									
							        </div>
						        </div>
							</div>	
					        <div class="divide-20"></div>

					
			            </div>
			            </br>
						
						
						
						<!-- USER PROFILE --><?php if ($this->session->flashdata('message')) 
                                                    { echo $this->session->flashdata('message'); }?>
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border red">
									<div class="box-title">
										<h4><i class="fa fa-user"></i><span class="hidden-inline-mobile"><?php  echo $company->Company_name; ?></span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs user-profile">
											<ul class="nav nav-tabs">
											   <li><a href="#pro_edit" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile"> Edit Account</span></a></li>
											   <li class="active"><a href="#pro_overview" data-toggle="tab"><i class="fa fa-dot-circle-o"></i> <span class="hidden-inline-mobile">Overview</span></a></li>
											</ul>
											<div class="tab-content">
											   <!-- OVERVIEW -->
											   <div class="tab-pane fade in active" id="pro_overview">
												  <div class="row">
													<!-- PROFILE PIC -->
													<div class="col-md-4">
														<div class="list-group">
														  <li class="list-group-item zero-padding">
															
														  </li>
														  <div class="list-group-item profile-details">
																<h2><?php  echo $company->Company_name; ?></h2>
																<p><i class="fa fa-circle text-green"></i> OK TO ORDER</p>
                                                                <p>Notes :</p>
																<p><?php  echo $company->notes; ?></p>
																<p>Email: <?php  echo $company->email; ?></p>
																<ul class="list">
                                                                        <li><i class="fa fa-phone"></i>  </iPhone <h4><?php  echo $company->Phone_number; ?></h4></li>
																   
																</ul>
														 </div>
														</div>														
													</div>
													<!-- /PROFILE PIC -->
													<!-- PROFILE DETAILS -->
													<div class="col-md-8">
														<!-- ROW 1 -->
														<div class="row">
															<div class="col-md-7 profile-details">																

															   
																<div class="row">
																	<div class="col-md-6 text-left">
																	    <h3>Business Address </h3>
																		       <li><i class="fa fa-home"></i>  </iPhone <h4><?php  echo $company->address1.' '.$company->address2.''
																			   .$company->County.' '.$company->Country.' '.$company->postcode; 
																			   ?></h4></li>
					
																    </div>
																	<div class="col-md-6 text-left">
																	    <h3>Shipping Address </h3>
																		       <li><i class="fa fa-home"></i>  </iPhone <h4><?php  echo $company->ship_address1.' '.$company->ship_address2.''
																			   .$company->ShippingCity.' '.$company->ship_Country.' '.$company->ship_postcode; 
																			   ?></h4></li>
																       
																    </div>
																
                                                                </div>
																
																
																<div class="divide-20"></div>
														
															</div>
						
														</div>
														</br>
														<!-- /ROW 1 -->
														<div class="divide-40"></div>
														<!-- ROW 2 -->
														<div class="row">
															<div class="col-md-12">
															    <div class="box border pink">
															        <div class="box-title">
																         <h4><i class="fa fa-columns"></i> <span class="hidden-inline-mobile">Item Prices </span></h4>																
															        </div>
															        <div class="box-body">
																    <div class="tabbable">
																	    <ul class="nav nav-tabs">
																	         <li class="active"><a href="#sales" data-toggle="tab"><i class="fa fa-signal"></i> <span class="hidden-inline-mobile">Item Prices</span></a></li>
																	    </ul>
																	<div class="tab-content">
																	    <div class="tab-pane active" id="sales">
                                                            
															                
														                    <div class="">
															                    <form action="<?php echo base_url(); ?>index.php/businesses/update_so_price" method="post" class="form-horizontal" >
												                                    <?php echo'<input name="Company_id" type="hidden" id="so_id" value="'. $company->Company_id.'" required="required"/>';
																			              echo'<input name="Company_name" type="hidden" id="so_id" value="'. $company->Company_name.'" required="required"/>';
																			          ?>
														                                <input type="submit" value="Update All"class="btn btn-sm btn-info pull-left pop-hover" data-title="Update" data-content="Update All Pending SO" data-original-title="" title="" > 
														                        </form>
																				<button class="btn btn-success btn-sm pull-right" href="#box-config" data-toggle="modal" ><i class="fa fa-bars"></i> Add Item </button>
															    
														                    </div>
													       
                                                                            <br></br>                                                                                
										                                    <table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover red">
											                                    <thead>
												                                    <tr>
													                                    <!--<th>id</th>-->
													                                    <th>item Code</th>
																	                    <th>Description</th>
                                                    				                    <th>Price</th>
																	                    <th>SO Price</th>
                                                    				                    <th>Change</th>
												                                     </tr>
											                                    </thead>
											                                    <tbody>
                                                                                            
                                                    <?php 
                                                        $base_url = base_url();
                                                        foreach ($company_items->result() as $table) {
                                                                                               {
 
												        echo '<tr class="gradeX">';
                                                                                             
                                                            //echo'<td><strong>'.$table->id.'</strong></td>';
													        echo'<td><strong>'.$table->itemCode.'</strong></td>';
                                                            echo'<td><strong>'.$table->itemDesc.'</strong></td>';
                                                            echo'<td><strong><div class="form-group"><div class="col-md-2">'.$table->Price.'</div></div></strong></td>';
			                     
															echo'<td><form action="'.base_url().'businesses/update_so_each_price" method="post" class="form-horizontal" >
												                        <input name="Company_id" type="hidden" value="'. $company->Company_id.'" required="required"/>
																			                          
																		<input name="Company_name" type="hidden"  value="'. $company->Company_name.'" required="required"/>';
																   echo'<input name="Price" type="hidden"  value="'. $table->Price.'" required="required"/>
																		<input name="CCL_Item" type="hidden" value="'. $table->itemCode.'" required="required"/> 
																		<input type="submit" value="Update" class="btn btn-sm btn-info pull-left" > 
														            </form>
																</td>';
																			
																			
														                    
														    echo'<td><div class="btn-group  dropdown">
											                         <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
											                            Action
											                            <span class="caret"></span>
											                        </button>
											                            <div class="dropdown-menu context">
											          		

											                                <a class="col-sm-12 btn btn-info btn-block" >
											                                   <form action="'.  base_url().'index.php/businesses/edit_item" method="post"   >
                                                                                    <input type="hidden" name="item_id" value="'.$table->id.'"/>
																					<input type="hidden" name="itemCode" value="'.$table->itemCode.'"/>
                                                                                    <input type="hidden" name="companyid" value="'.$this->uri->segment(3).'"/>
                                                                                    £<input type="text" name="itemPrice" size="4" value="'.$table->Price.'"/>  
																					<div style="margin-left:15%;width:70%;"><input type="submit" class="btn-block btn btn-sm pull-right btn-default "  value="Submit"/></div>     
                                                                                   
                                                                                </form><br/>
													                        </a>
											                                <li class="divider"></li>
                                                                                        
                                               
											                                <form action=z"'.  base_url().'businesses/remove_item" method="post"  class="confirmation"   >
                                                                                <input type="hidden" name="item_id" value="'.$table->id.'"/>
                                                                                <input type="hidden" name="comp_id" value="'.$table->Company_id.'"/>
                                                                                                                
                                                                                <button type="submit" class="btn btn-sm btn-danger btn-block">Remove</button>
                                                                            </form>

											                            </div>
											                        </div>
																</td>';
															
								                      echo '</tr>';
                                                                                                 
                                                                                                 }
                                                                }?>
												
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
											   
											     <!--2-- EDIT ACCOUNT -->
											    <div class="tab-pane fade" id="pro_edit">
                                                    <form id="Accountform" name="myForm" class="form-horizontal" action="<?php echo base_url();?>index.php/businesses/update" method="post">
                                                         <input type="hidden" name="id" class="form-control" value="<?php  echo $company->Company_id; ?>">
                                                       
															<div class="row">
										                        <div class="col-md-12">
											                         <div class="panel panel-default">
											                            </br></br></br>
												                            <div class="panel-body">
													                            <div class="tabbable tabs-left">
														                            <ul class="nav nav-tabs">
														                                 <li><a href="#tab_3_3" data-toggle="tab">Purchasing info</a></li>
														                                 <li><a href="#tab_3_2" data-toggle="tab">Addresses Info</a></li>
														                                 <li class="active"><a href="#tab_3_1" data-toggle="tab">Business info</a></li>
														                            </ul>
														                            <div class="tab-content">
														                                <div class="tab-pane fade in active" id="tab_3_1">
															                            

																		                <div class="col-md-12">
																						        <div class="form-group">
																		                                <label class="col-md-4 control-label">Company Name</label> 
																		                                <div class="col-md-8"><input type="text" name="Company_name" class="form-control" value="<?php  echo $company->Company_name; ?>"></div>
																		                        </div>
																		                         <h4>Contact Information</h4>
																		                        <div class="form-group">
																		                            <label class="col-md-4 control-label">Contact</label> 
																		                            <div class="col-md-8"><input type="text" name="first_name"  class="form-control" placeholder="ContactName" value="<?php  echo $company->first_name; ?>"></div>
																		                        </div>
																		
																		                        <div class="form-group">
																		                            <label class="col-md-4 control-label">Phone</label> 
																		                            <div class="col-md-8"><input type="text" name="Phone_number" placeholder="07012 345 678" class="form-control" value="<?php  echo $company->Phone_number; ?>"></div>
																		                        </div>
																								<div class="form-group">
																		                            <label class="col-md-4 control-label">Mobile Phone</label> 
																		                            <div class="col-md-8"><input type="text" name="mobile_number" placeholder="07012 345 678" class="form-control" value="<?php  echo $company->mobile_number; ?>"></div>
																		                        </div>
																		        
																		                    <div class="form-group">
																		                        <label class="col-md-4 control-label">Email</label> 
																		                         <div class="col-md-8">
																				                    <div class="input-group">
																				                     <span class="input-group-addon">Email</span>
																				                        <input type="text" name="email" class="form-control" placeholder="email@example.com" value="<?php  echo $company->email; ?>">
																				                    </div>																			
																		                         </div>
																		                    </div>
                                                                                             <div class="form-group">
																		                        <label class="col-md-4 control-label">Accounts Email</label> 
																		                        <div class="col-md-8">
																				                    <div class="input-group">
																				                        <span class="input-group-addon">Accounts Email</span>
																				                        <input type="text" name="accounts_email" class="form-control" placeholder="accountemail@example.com" value="<?php  echo $company->accounts_email; ?>">
																				                    </div>																			
																		                        </div>
																		                    </div>
																							<div class="form-group">
																		                        <label class="col-md-4 control-label">Website</label> 
																		                        <div class="col-md-8">
							 
																								<input type="text" name="website" class="form-control" placeholder="www.example.com" value="<?php  echo $company->website; ?>">	 
																									 
																								</div>
																		                     </div>
																	                        <div class="form-group">
																		                        <label class="col-md-4 control-label">Notes</label> 
																		                        <div class="col-md-8">
																								 
																									 
																									 
																								<textarea name="notes" placeholder="Notes" style="width:250px;height:150px;"><?php  echo $company->notes; ?></textarea>	 
																									 
																								</div>
																		                     </div>
																					    
																						</div> 
																					    
																						</div>
							
																					 
														                            <div class="tab-pane fade" id="tab_3_2">
															                         
																					    <div class="col-md-12">
																		                     <h4> Business Address</h4>
																		                        
																		                        <div class="form-group">
																		                                <label class="col-md-4 control-label">Address 1</label> 
																		                                <div class="col-md-8"><input  class="form-control " name="address1"placeholder="Notes" type="text" placeholder=" business address1" value="<?php  echo $company->address1; ?>" size="10"></div>
																		                        </div>
                                                                                                <div class="form-group">
																		                        <label class="col-md-4 control-label">Address 2</label> 
																		                            <div class="col-md-8"><input  class="form-control "  name="address2" type="text" placeholder=" business address2"value="<?php  echo $company->address2; ?>" size="10"></div>
																		                        </div>
                                                                                                <div class="form-group">
																		                        <label class="col-md-4 control-label"> Town / City</label> 
																		                            <div class="col-md-8"><input  class="form-control "  name="City" type="text" placeholder=" business city"value="<?php  echo $company->City; ?>" size="10"></div>
																		                        </div>
																								<div class="form-group">
																								 <label class="col-md-4 control-label"> County</label> 
																		                            <div class="col-md-8"><input  class="form-control "  name="County" type="text" placeholder=" business county"value="<?php  echo $company->County; ?>" size="10"></div>
																		                        </div>
																								<div class="form-group">
																								 <label class="col-md-4 control-label"> Country</label> 
																		                            <div class="col-md-8"><input  class="form-control "  name="County" type="text" placeholder=" business country"value="<?php  echo $company->Country; ?>" size="10"></div>
																		                        </div>
                                                                                                <div class="form-group">
																		                        <label class="col-md-4 control-label">Postcode</label> 
																		                            <div class="col-md-8"><input  class="form-control "  type="text" name="postcode" placeholder=" business postcode"value="<?php  echo $company->postcode; ?>" size="10"></div>
																		                        </div>
																					
																					
																					
																					    </div>
																						 
                                                                                         <div class="col-md-12">
																		                     <h4> Shipping Address</h4>
																		                        
																		                        <div class="form-group">
																		                                <label class="col-md-4 control-label">Address 1</label> 
																		                                <div class="col-md-8"><input  class="form-control " name="ship_address1" type="text" value="<?php  echo $company->ship_address1; ?>" size="10"></div>
																		                        </div>
                                                                                                <div class="form-group">
																		                        <label class="col-md-4 control-label">Address 2</label> 
																		                            <div class="col-md-8"><input  class="form-control "  name="ship_address2" type="text" value="<?php  echo $company->ship_address2; ?>" size="10"></div>
																		                        </div>
																								
                                                                                                <div class="form-group">
																		                        <label class="col-md-4 control-label"> County</label> 
																		                            <div class="col-md-8"><input  class="form-control "  name="ship_County" type="text" value="<?php  echo $company->ship_County; ?>" size="10"></div>
																		                        </div>
																								<div class="form-group">
																								<label class="col-md-4 control-label"> Country</label> 
																		                            <div class="col-md-8"><input  class="form-control "  name="ship_County" type="text" value="<?php  echo $company->ship_Country; ?>" size="10"></div>
																		                        </div>
                                                                                                <div class="form-group">
																		                        <label class="col-md-4 control-label">Postcode</label> 
																		                            <div class="col-md-8"><input  class="form-control "  type="text" name="ship_postcode" value="<?php  echo $company->ship_postcode; ?>" size="10"></div>
																		                        </div>
																					     </div>
																					
																					
																					</div>
																						 
																					
														                            <div class="tab-pane fade" id="tab_3_3">
															                           
																					    <div class="col-md-12">	

																								<h4>Account  Settings</h4>
																		
                                                                                                                                        
                                                                                            <div class="form-group">
																		                        <label class="col-md-4 control-label">VAT No:</label> 
																		                            <div class="col-md-8">
																				                        <div class="input-group">
																				                             <span class="input-group-addon">VAT No:</span>
																				                            <input type="text" name="VAT_Number" class="form-control" value="<?php echo $company->VAT_Number; ?>"placeholder="VAT">
																				                        </div>																			
																		                            </div>
																		                    </div>
                                                                                                                                        
                                                                                            <div class="form-group">
																		                        <label class="col-md-4 control-label">PLACE ON HOLD</label> 
																		                        <div class="col-md-8">
																				                    <div class="input-group">
																				                        <span class="input-group-addon">On Hold:</span>
                                                                                                            <select name="on_hold" class="form-control">
                                                                                                                <option value="0">ALL OK</option>
                                                                                                                <option value="1">ON HOLD</option>
                                                                                                            </select>
																				                    </div>																			
																		                        </div>
																		                    </div>
                                                                                                                                        
                                                                                            <div class="form-group">
																		                        <label class="col-md-4 control-label">VAT Exempt</label> 
																		                            <div class="col-md-8">
																				                        <div class="input-group">
																				                            <span class="input-group-addon">EXEMPT</span>
                                                                                                                    <select name="vat_exempt" class="form-control">
                                                                                                                        <option value="<?php echo $company->vat_exempt; ?>"><?php echo $company->vat_exempt; ?></option>
                                                                                                                        <option value="NO">NO</option>
                                                                                                                        <option value="YES">YES</option>
                                                                                                                    </select>
																				                        </div>																			
																		                             </div>
																		                    </div>
																							
																							<div class="form-group">
                                                                                                <label class="col-md-4 control-label">Payment Terms</label> 
                                                                              <!--  <div class="col-md-4"><input type="text" name="Location" class="form-control" value="<?php echo $item->location; ?>"></div>
                                                                            -->
																			                    <div class="col-md-8">
														                                            <select   name="terms" id="e3" class="form-control"  >
                                                                                                        <option  value="<?php echo $company->terms; ?>"><?php echo $company->terms; ?></option>
                                                                                                        <option  value="      "></option>     
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
													                        </div>
												                    </div>
												                </div>
										                    </div>

							  
												        <div class="form-actions clearfix"> <input type="submit" name="submit" value="Update Account" class="btn btn-primary pull-right btn-block"> </div>
											        </form>
												</div>
											   <!-- /EDIT ACCOUNT -->
											   
											   <!-- HELP -->
											 
											   <!-- /HELP -->
											</div>
										</div>
										<!-- /USER PROFILE -->
									</div>
								</div>
								<!---BOX---->
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
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?php echo base_url();?>assets/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url();?>assets/bootstrap-dist/js/bootstrap.min.js"></script>
	<!-- DATA TABLES -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
		
	<!-- DATE RANGE PICKER -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- EASY PIE CHART -->
	<script src="<?php echo base_url();?>assets/js/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/easypiechart/jquery.easypiechart.min.js"></script>
	<!-- SPARKLINES -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/sparklines/jquery.sparkline.min.js"></script>
	<!-- UNIFORM -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/uniform/jquery.uniform.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo base_url();?>assets/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("user_profile");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<script>
		
                
                $(document).ready(function(){
	$('#datatable1').dataTable();
        $('#datatable2').dataTable();
});
	</script>
        <!-- this is for account update form -->
      <script type="text/javascript">
    var frm = $('#Accountform');
    frm.submit(function (ev) {
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                alert('Changes Have been Saved');
            }
        });

        ev.preventDefault();
    });
</script>




	<!-- /JAVASCRIPTS -->
        
         <script type="text/javascript"> 
             
    $( ".sorting_1" ).bind( "submit", function(ev) {

    var frm1 = $('#additem');
    frm1.submit(function (ev) {
       
        $.ajax({
            type: frm1.attr('method'),
            url: frm1.attr('action'),
            data: frm1.serialize(),
            success: function (data) {
                alert('Item  added');
            }
        });
});
        ev.preventDefault();
    });
</script>
	<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure to delete it?');
    });
</script>
</body>
</html>      
