

<?php echo Modules::run('template/dash_head'); ?>

    <?php 
                                                                        
                                                                        echo validation_errors('<div class="alert alert-block alert-danger fade in">
											<a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
											<h4><i class="fa fa-times"></i> Oh no! You got an error!</h4>
												<p>Change this and that and try again.</p>
											
										</div>'); ?>

											   <!-- add customer -->
											   
                                               <?php echo form_open('businesses/add','class="form-horizontal" id="myForm"');?>
												  
												<div class="row">
												    <div class="col-md-12">
													    <div class="box border green">
																<div class="box-title">
																	<h4><i class="fa fa-bars"></i>Add Information</h4>
																</div>
														    <div class="box-body big">
                                                                                                                                    
															    <div class="row">
																    <div class="col-md-12">
																	<div class="col-md-6">
																		<h4>Business Information</h4>
                                                                                                                                          
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Business Name</label> 
																		   <div class="col-md-8"><input type="text" name="Company_name" class="form-control" value=""></div>
																		</div>
                                                                                                                                                
                                                                        
															        </div>
																	<div class="col-md-6">
																	    <h4>Billing Address</h4>
																	    <div class="form-group">
																		   <label class="col-md-4 control-label">Building Number </label> 
																		   <div class="col-md-8"><input type="text" name="number" class="form-control" value=""></div>
																		</div>
																		
                                                                                                                                                <div class="form-group">
																		   <label class="col-md-4 control-label">Address 1</label> 
																		   <div class="col-md-8"><input type="text" name="address1" class="form-control" value=""></div>
																		</div>
                                                                                                                                                  <div class="form-group">
																		   <label class="col-md-4 control-label">Address 2</label> 
																		   <div class="col-md-8"><input type="text" name="address2" class="form-control" value=""></div>
																		</div>
                                                                                                                                                
                                                                                                                                                 <div class="form-group">
																		<label class="col-md-4 control-label">County</label> 
																		   <div class="col-md-8"><input type="text" name="County"  class="form-control" value=""></div>
																		</div>
                                                                                                                                                
                                                                                                                                                
																	        <div class="form-group">
																		    <label class="col-md-2 control-label">Post Code</label> 
																		        <div class="col-md-4"><input type="text" name="postcode" class="form-control" value=""></div>
																		       
																	        <label class="col-md-2 control-label">Country</label> 
																		    <div class="col-md-4"><input type="text" name="Country" placeholder="UK" class="form-control" value=""></div>
																		    </div>
																	
																	</br></br></br>
																	</div>
																	</div>  
																	</br>
																
																	<div class="col-md-12">
																	
																	    <div class="col-md-6">	
																		    <h4>Contact Information</h4>   
																				<div class="form-group">
																		            <label class="col-md-4 control-label">Name</label> 
																		            <div class="col-md-8"><input type="text" name="first_name" class="form-control" value=""></div>
																		        </div>
																		        <div class="form-group">
																		            <label class="col-md-4 control-label">Main Phone Number</label> 
																		            <div class="col-md-8"><input type="text" name="phone_number" class="form-control" placeholder="07123 456 789"value=""></div>
																			    </div>
																				<div class="form-group">
																		            <label class="col-md-4 control-label">Mobile Number</label> 
																		            <div class="col-md-8"><input type="text" name="mobile_number" class="form-control" placeholder="07123 456 789"value=""></div>
																				
																				</div>                                                                
                                                                                <div class="form-group">
																		             <label class="col-md-4 control-label">Standard Email</label> 
																		                <div class="col-md-8"><input type="text" name="email" class="form-control" placeholder="example@email.com" value=""></div>
																		        </div>
                                                                                <div class="form-group">
																		            <label class="col-md-4 control-label">Accounts Email</label> 
																		                <div class="col-md-8"><input type="text" name="accounts_email" class="form-control" placeholder="account@email.com" value=""></div>
																		        </div> 
																		
																		        <div class="form-group">
																		            <label class="col-md-4 control-label">Website</label> 
																		            <div class="col-md-8">
																				        <div class="input-group">
																				            <span class="input-group-addon">http://</span>
																				            <input type="text" name="website" class="form-control" placeholder="Website" value="">
																				        </div>																			
																		            </div>
																		        </div>
																		</div>
																		
																			<div class="col-md-6">
																	    <h4>Shipping Address</h4>
																	    <div class="form-group">
																		   <label class="col-md-4 control-label">Building Number </label> 
																		   <div class="col-md-8"><input type="text" name="ship_number" class="form-control" value=""></div>
																		</div>
																		
                                                                                                                                                <div class="form-group">
																		   <label class="col-md-4 control-label">Address 1</label> 
																		   <div class="col-md-8"><input type="text" name="ship_address1" class="form-control" value=""></div>
																		</div>
                                                                                                                                                  <div class="form-group">
																		   <label class="col-md-4 control-label">Address 2</label> 
																		   <div class="col-md-8"><input type="text" name="ship_address2" class="form-control" value=""></div>
																		</div>
                                                                                                                                                
                                                                                                                                                 <div class="form-group">
																		<label class="col-md-4 control-label">County</label> 
																		   <div class="col-md-8"><input type="text" name="ship_County"  class="form-control" value=""></div>
																		</div>
                                                                                                                                                
                                                                                                                                                
																	        <div class="form-group">
																		    <label class="col-md-2 control-label">Post Code</label> 
																		        <div class="col-md-4"><input type="text" name="ship_postcode" class="form-control" value=""></div>
																		       
																	        <label class="col-md-2 control-label">Country</label> 
																		    <div class="col-md-4"><input type="text" name="ship_Country" placeholder="UK" class="form-control" value=""></div>
																		    </div>
																	</div>
																    </div>
																</div>
														    </div>
													    </div>
													</div>
												    <div class="col-md-12 form-vertical">
															<div class="box border inverse">
																<div class="box-title">
																	<h4><i class="fa fa-bars"></i>Payment  Settings</h4>
																</div>
																 	
																<div class="box-body big">
																	
                                                                    
																	                                                               
                                                                        <div class="col-md-6">
																		    <h4>Payment Settings</h4>
																		    <div class="form-group">
																		        <label class="col-md-4 control-label">VAT Number</label> 
																		        <div class="col-md-8">
																				    <div class="input-group">
																				        <span class="input-group-addon">UK VAT Number</span>
																				            <input type="text" class="form-control" name="vat_number" placeholder="VAT" value="">
																				    </div>																			
																		        </div>
																			</div>
																		    <div class="form-group">
																		      <label class="col-md-4 control-label">VAT Exempt</label> 
                                                                                   <div class="col-md-8">
																				       <select name="vat_exempt" class="form-control">
                                                                                              <option value="no">no</option>
                                                                                              <option value="yes">yes</option>
                                                                                       </select>
                                                                                    </div>
																		    </div>
																		    <div class="form-group">
                                                                                <label class="col-md-4 control-label">Payment Terms</label> 
                                                                              <!--  <div class="col-md-4"><input type="text" name="Location" class="form-control" value="<?php echo $item->location; ?>"></div>
                                                                            -->
																			        <div class="col-md-8">
														                                <select   name="terms" id="e3" class="form-control"  >
                                
                                                                                                                 
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
																	
																         <div class="form-group">
																		     
                                                                             <div class="col-md-6"><h4>Notes</h4>
																			 </br>
																	    ​        <textarea name="notes" id="notes" rows="5" cols="70"></textarea>
																            </div>
																			
																	    </div>	                                                                          
                                                                                                                                      
															    </div>	
																 
																
																
																
																
															</div>
														 </div>
												</div>
												 
												  <div class="form-actions clearfix"> 
												              <div class="col-md-11">
															   <input type="submit" value="Add Customer" class="btn btn-primary pull-right"> 
												            
															 </div>
															 <div class="col-md-1">
                                                           <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
												            </div>
												      
												  </div>
											    <?php echo form_close();?>
                                                                                           
                                                                                           