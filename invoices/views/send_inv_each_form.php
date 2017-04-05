<?php echo Modules::run('template/dash_head'); ?><!-- DATE RANGE PICKER -->
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
 <?php foreach ($invoice_info->result() as $v)
        {
           
        }?>
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
										
										<li> <?php echo'<a href="'.  base_url().'index.php/invoices/view_inv/'. $v->salesorder_id.'">';?>
										<?php  echo $v->Company_name; ?>s Invoice</a>
										</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Invoice To Company: <?php  echo $v->Company_name; ?></h3>
									</div>
                               

                            </div>
                        </div>
                    </div>
              <!-- /PAGE HEADER -->
						<div class="row">
					        <div class="col-sm-8 "><?php echo '<a href="'.  base_url().'index.php/invoices/view_inv/'. $v->Company_id .'">';?>
							<button class="btn btn-sm btn-default" >
						        <i class="fa fa-reply"></i> Back</button>
                       	         </a>
                              
							
                            </div>
			            </div>
			            </br>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BOX -->
                            <div class="box border pink">
                                <div class="box-title">
                                    <h4><i class="fa fa-envelope-o"></i><span class="hidden-inline-mobile">Invoice - SO number :<?php echo substr(sprintf('%06d', $v->salesorder_id),0,6);//invoice_id; ?> </span></h4>
                                </div>
                                <div class="box-body">
                                    <div class="tabbable header-tabs user-profile">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#pro_edit" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile"> Write New Mail</span></a></li>
                                            </ul>
                                        <div class="tab-content">
                                            <div class="btn-group">
											<!--
															    <button class="btn btn-default" href="#box-config" data-toggle="modal" ><i class="fa fa-bars"></i>generate invoice </button>
										    --->			
                                                                                                        
														    </div>

                                            <!-- EDIT ACCOUNT -->
                                            <div class="tab-pane fade active in"  id="pro_edit">
                                                
												
												
												
												
												
												<form action="<?php echo base_url(); ?>index.php/invoices/send_inv_form" method="post" class="form-horizontal" >
												
												     <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="box border green">
                                                                <div class="box-title">
                                                                    <h4><i class="fa fa-magic"></i>Email</h4>
                                                                </div>
                                                                
													
																<div class="box-body big">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h4>New Message</h4>

																			 <div class="separator"></div>																			
																			 <div class="divide-5"></div>
                                                                            <div class="form-group">
					 
					<label class="col-md-4 control-label"><h3>Sender</h3></label> 
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Name</label>
                <div class="col-md-8">
				    <tr>
					    <td><input name="fullName" type="text" id="fullName" size="50" maxlength="50" onfocus="if(this.value=='Crown')this.value=";" onblur="if(this.value==")this.value='Crown';" value="ZENITH INTERNATIONAL TRADING"/></td>  
                        <!-------input name="dateraised" id="datepicker" class="form-control datepicker"  size="10" required="required"--->
					</tr> 
				</div>
			</div>
			 
			<div class="form-group">
			<label class="col-md-4 control-label"><h3>Receiver</h3></label>
			
			</div>
			 
			<div class="form-group">
				<label class="col-md-4 control-label">Company Name</label>
				<div class="col-md-8">	
                    <tr>  
                        <input name="comp_id" type="hidden"  value="<?php  echo $v->Company_id; ?>" required="required"/>
                        <input name="comp_name" type="text" size="50" maxlength="50" id="comp_name" value="<?php  echo $v->Company_name; ?>" required="required"/>
                    </tr>
				</div>
			</div>
			</br>
			<div class="form-group">	             
				<label class="col-md-4 control-label"><td>Receiver Email 1</td></label>
				<div class="col-md-8">	
                    <tr>                           
                        <td><input name="emailTo" type="text" size="50" maxlength="50"id="emailTo"  placeholder="example1@example.com"   value="<?php  echo $v->email; ?>"size="20" required="required"/></td>  
                    </tr>
				</div>
                 				
			</div>
			<div class="form-group">
			<label class="col-md-4 control-label"><td>Receiver Email 2</td></label>
				<div class="col-md-8">	
                    <tr>                           
                        <td><input name="emailTo2" type="text" size="50" maxlength="50"id="emailTo" placeholder="example2@example.com"  /></td>  
                    </tr>
			    </div>
            </div>				
			</br>
			
           
            <!--form class="form-horizontal " action="#"--->
			<div class="form-group">
					 
					<label class="col-md-4 control-label"><h3>Content</h3></label> 
            </div>
			<div class="form-group">
					<label class="col-md-4 control-label"><td>Subject</td></label>
                    <div class="col-md-8">  
					<tr>
                        <?php   $salesorder_id=substr(sprintf('%06d', $v->salesorder_id),0,6);
                                    echo'<td><input name="emailSubject" type="text" id="emailSubject" size="50" value="INVOICE-SO#:'. $salesorder_id.'"required="required" />';?>
						<!---<input name="emailSubject" type="text" id="emailSubject" size="50" placeholder="please input the subject"required="required">Invoice 0000184878-->
						</td>  
                    </tr> 
                    </div>
			</div>
            <div class="form-group">
                    <form>
                        <label class="col-md-4 control-label">Message</label> 
                        <div class="col-md-8">
                             <textarea name="emailMessage" cols="50" rows="4" id="emailMessage" placeholder="please input the content"required="required"></textarea>
	
                           										 
						</div>
                    </form>
		    </div>
			 <div class="form-group">
                        <label class="col-md-4 control-label">SO Number:</label>
                        <div class="col-md-8">
                            <?php  
                                    echo'<input name="inv_id" type="hidden" size="10" maxlength="50" id="inv_id" value="'.$v->invoice_id.'" readonly="readonly" required="required"/>';
									echo'<input name="so_id" type="hidden" id="so_id" value="'. $salesorder_id.'" required="required"/>';
									
									?>
                            <?php  
                                    echo' <span class="fa fa-file fa-lg" " ></span><p>SO-'. $salesorder_id.'</p>'?>

					</div>
           

		     </div>																			
				 <div class="form-actions clearfix"> 
													
												
													<input type="submit" value="Send" class="btn btn-block btn-primary pull-left" > 
													
                                                
												        </div>			
                    
					
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
														
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