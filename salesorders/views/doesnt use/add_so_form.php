<head>
<title>Crown | Sales Order</title>
<!-- DATA TABLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />


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
<script>



    // wait for the DOM to be loaded 
    $(document).ready(function() {
        // bind 'myForm' and provide a simple callback function 
        $('#packing').each(function() {
            alert("Thank you for your comment!");
        });
    });
</script> 
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
                                    <a href="<?php echo base_url(); ?>">main</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>/customers">Sales Orders</a>
                                </li>

                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left">Sales Orders</h3>
                            </div>
                            <div class="description">All Sales Orders</div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->





                <div class="separator"></div>
                <!-- DATA TABLES -->
                <div class="row">
                    <div class="col-md-12">
											   <!-- add customer -->
											   
                                               <?php echo form_open('salesorders/add_so','class="form-horizontal" id="myForm"');?>
						<!-- BOX -->
                        <div class="box border orange">
                            <div class="box-title">
                                <h4><i class="fa fa-users"></i>Sales Orders List</h4>
                                
                            </div>
                            <div class="box-body">
							
							                    <!-- customer add-->
                                            <div class="row">
				    
					
					
												<div class="col-md-12">
												    <div class="col-md-4">
												        
														<div class="form-group">
                                                            <label class="col-md-4 control-label">Date:</label>
                                                            <div class="col-md-8">
                                                                <input name="dateraised" id="datepicker" class="form-control datepicker"  size="10" required="required">
                                                             </div>
														</div>
														<div class="form-group">
														    <label class="col-md-4 control-label">SO Number:</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="salesorder_id" class="form-control" required="required" >
                                                             </div>
													    </div>
														<div class="form-group">
														    <label class="col-md-4 control-label">PO Number:</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="po_number" class="form-control" required="required" >
                                                             </div>
													    </div>
                                                    </div>
												    <div class="col-md-8">
												
												    <div class="form-group">
                                                         <label class="col-md-4 control-label">Company Name</label> 
                                                            <div class="col-md-8">
                                                                <select name="company" id="e1" class="col-md-12" required="required" onchange="showUser(this.value)">
                                                                <option></option>
                                                                    <option>N/A</option>
                                                                        <?php
                                                                            foreach ($businesses->result()as $companys) {

                                                                                echo '<option  value="' . $companys->Company_id . '">' . $companys->Company_name . '</option>  ';
                                                                            }
                                                                        ?>
                                                                </select>	
                                                        <div id="txtHint"><b>Address info will be listed here.</b></div>                                                                                         
                                                            <?php ?>										 
						                                </div>
                                                    </div>
												
												    </div>
												
												
												<div class="divide-20"></div>

											</div>
                                        </div>
                <!-- /customer add -->
							
                                <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th>SO#</th>
                                            <th>Company</th>
                                            <th> PO Number </th>
                                            <th>Date Raised</th>
                                            <th class="hidden-xs">Total Inc VAT</th>
                                            <th> Status </th>
                                            <th> Change </th>
											<th>  </th>
											<!--
                                            <th class="sorting_disabled"><input name="checkall" type="checkbox" class="checkall" value="ON" />SelectAll</th>
                                            -->
									   </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $base_url = base_url();

                                        foreach ($salesorders->result() as $so) {
                                           // $originalDate = $so->dateraised;
                                           // $newDate = date("y-m-d", strtotime($originalDate));
                                            $id = $so->salesorder_id;

                                            echo '<tr class="gradeX">';
                                            echo'<td><strong>' . $so->salesorder_id . '</strong></td>';
                                            echo'<td><strong>' . $so->Company_name . '</strong></td>';
                                            echo'<td><strong>' . $so->po_number . '</strong></td>';
                                            echo'<td><strong>' . $so->dateraised . '</strong></td>';
                                            echo'<td><strong>£' . $so->inc_vat . '</strong></td>';



                                            ///////// status begings /////////////////////
                                            if ($so->status === 'pending') {
                                                echo '<td><a data-toggle="modal" data-id="' . $so->salesorder_id . '" title="Pending" class="open-AddBookDialog btn btn-warning" href="#addBookDialog1"><span><i class=""></i></span> <strong>Pending</strong></a>';
                                                if ($so->backorder === 'YES') {
                                                    echo'  <button class="btn btn-danger">Backorder</button></td>';
                                                } else {
                                                    echo'</td>';
                                                }

                                                // echo'<td><button class="btn btn-warning pop-hover" data-title="PENDING " data-content="This  order is still to be confirmed " data-original-title="" title="">' . $so->status . '</button></td>';
                                            }
                                            if ($so->status === 'shipped') {


                                                echo '<td><a data-toggle="modal" data-id="' . $so->salesorder_id . '" title="Item Shipped" class="open-AddBookDialog btn btn-primary" href="#addBookDialog"><span><i class="fa fa-truck"></i></span> <strong>Shipped</strong></a>
</td>';
                                                //echo'<button class="btn btn-info pop-hover" title=""  data-id="' . $so->salesorder_id . '" data-toggle="modal" data-target="#toinvoice"> <span><i class="fa fa-truck"></i></span> <strong>' . $so->status . '</strong></button></td>';
                                            }
                                            if ($so->status === 'invoiced') {
                                                echo'<td><button class="btn btn-success pop-hover" data-title="Invoiced " data-content="invoice raised" data-original-title="" title=""><span><i class="fa fa-check"></i></span> <strong>' . $so->status . '</strong></button></td>';
                                            }

                                            if ($so->status === 'cancelled') {
                                                echo'<td><button class="btn btn-danger pop-hover" data-title="cancelled " data-content="order cancelled" data-original-title="" title=""><span><i class="fa fa-cross"></i></span> <strong>' . $so->status . '</strong></button></td>';
                                            }
                                            ////////////////// status ends////////////////////////////////////
                                            // action button 
                                            elseif ($so->status === 'shipped') {
                                                     echo'<td><div class="btn-group dropdown" style="margin-bottom:5px">
											                        <button class="btn btn-primary">Action</button>
											                            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
											                        <span class="caret"></span>
											                        </button>
											                    <ul class="dropdown-menu">
											                <li>
											                    <a href="' . $base_url . 'salesorders/view/' . $so->salesorder_id . '">
                                                                <button type="submit" class="btn btn-info" >View</button> </a>
											                </li>
                                                                                        
											<li>
											<form id="packing"  action="' . base_url() . 'salesorders/packing_slip" method="post">
                                                                                        <input type="hidden" name="sales_id" value="' . $so->salesorder_id . '"/>
                                                                                        <input type="submit" class="btn btn-primary"  value="Crown Packing Slip"/>
                                                                                        </form>
											</li>
                                                                                        
<li class="divider"></li>                                                                   <br>
											<li>
                                                                                        
<li>
											
                                                                                        <a href="'.  base_url().'salesorders/ce_pdf/'. $so->salesorder_id .'"><button class="btn btn-primary" >Direct Packing Slip</button></a>
                                                                                        
											</li>
										
											</ul>
											</div></td>';
                                                echo'<td><a href="'.  base_url().'salesorders/pdf/'. $so->salesorder_id .'"><span class="fa fa-file fa-lg"></span></a> <form id="shipping" action="pdf_shipping"><input type="checkbox" name="id[]" value="' . $so->salesorder_id . '"/></form></td>';
                                            
                                                
                                            } else {


                                                echo'<td><div class="btn-group dropdown" style="margin-bottom:5px">
											<button class="btn btn-primary">Action</button>
											<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
											    <li>
											        <a href="' . $base_url . 'salesorders/view/' . $so->salesorder_id . '">
                                                            <button type="submit" class="btn btn-info" >View</button> </a>
											    </li>
                                                                                        
											    <li>
											        <form id="packing"  action="' . base_url() . 'salesorders/packing_slip" method="post">
                                                            <input type="hidden" name="sales_id" value="' . $so->salesorder_id . '"/>
                                                                 <input type="submit" class="btn btn-primary"  value="Crown Packing Slip"/>
                                                    </form>
											    </li>
                                                                                                      
                                                    <li class="divider"></li>                      
													<br>
											    <li>
                                                                                        
                                                <li>
											         <a href="'.  base_url().'salesorders/ce_pdf/'. $so->salesorder_id .'"><button class="btn btn-primary" >Direct Packing Slip</button></a>
											      </li>
										
											      <li class="divider"></li>
                                                                                            <a href="' . base_url() . 'salesorders/deleteso/' . $so->salesorder_id . '" class="btn btn-danger"> Delete Order</a>
											</ul>
											</div></td>';
                                                echo'<th class="checkers"><input type="checkbox" name="selected[] value="' . $so->salesorder_id . '"/> <a href="'.  base_url().'salesorders/pdf/'. $so->salesorder_id .'"><span class="fa fa-file fa-lg"></span></a></th>';

                                                echo '</form></tr>';
                                                
                                                
                                            }
                                            
                                            
                                         
                                            }
                                     
                                      
                                        ?>

                                    </tbody>
									<!---//20141209   viola
                                    <tfoot >
                                        <tr>
                                            <th class="sorting_disabled">select </th>
                                            <th>Sales ID</th>
                                            <th>Company</th>
                                            <th> PO Number </th>
                                            <th>Date Raised</th>
                                            <th class="hidden-xs">Total Inc VAT</th>
                                            <th> status </th>
                                            <th> Change </th>
										
                                        </tr>
                                    </tfoot>
									---->
                                </table>
                                <form id="shipping" method="post" action="<?php echo base_url();?>salesorders/shipping_pdf">
                                     <?php foreach ($shipped->result() as $ship) {
                                         echo'<input type="text" name="shipped[]" value="'.$ship->salesorder_id.'">';
                                     }?>
                                     <button type="submit">shipped </button>
                                     </form>
                                
                                
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
		
		
		<!-- jqGrid Plugin -->
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
											<a href="index.html">Home</a>
										</li>
										<li>
											<a href="#">Tables</a>
										</li>
										<li>jqGrid Plugin</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">jqGrid Plugin</h3>
									</div>
									<div class="description">jqGrid Plugin Table</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- SAMPLE -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>jqGird Example</h4>
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
										<table id="rowed4"></table>
										<div id="prowed3"></div>
									</div>

								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /SAMPLE -->
						<!-- SAMPLE -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>jqGird Example2</h4>
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
										<table id="rowed3">table </table>
										<div id="prowed3">div id=prowed3</div>
									</div>

								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /SAMPLE -->
						<!-- SAMPLE -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i>jqGird Example3</h4>
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
										<table id="43rowed3"></table>
										
										<div id="p43rowed3"></div>
										
										
										
										
										
										<script src="rowedex3.js" type="text/javascript"> </script>
										
									</div>

								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /SAMPLE -->
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
		

        <!-- jqGrid Plugin -->
		
    </div>
<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title">Box Settings</h4>
					</div>
					<div class="modal-body">
					  Here goes box setting content.
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary">Save changes</button>
					</div>
				  </div>
				</div>
			  </div>
			<!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
	
	
	</div>


<!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="addcustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New Customer</h4>
                </div>
                <div class="modal-body">


                    <?php echo form_open('salesorders/add_cust', 'class="form-horizontal" id="myForm"'); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box border green">
                                <div class="box-title">
                                    <h4><i class="fa fa-bars"></i>Add Information</h4>
                                </div>
                                <div class="box-body big">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Business Information</h4>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Business Name</label> 
                                                <div class="col-md-8"><input type="text" name="Company_name" class="form-control" value=""></div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Standard Email</label> 
                                                <div class="col-md-8"><input type="text" name="email" class="form-control" value=""></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Accounts Email</label> 
                                                <div class="col-md-8"><input type="text" name="accounts_email" class="form-control" value=""></div>
                                            </div>


                                            <h4>Contact Information</h4>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Main Phone Number</label> 
                                                <div class="col-md-8"><input type="text" name="phone_number" class="form-control" value=""></div>
                                            </div>

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
                                                <div class="col-md-8"><input type="text" name="County" class="form-control" value=""></div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Post Code</label> 
                                                <div class="col-md-8"><input type="text" name="postcode" class="form-control" value=""></div>
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
                                        <div class="col-md-8"><select name="vat_exempt" class="form-control">
                                                <option value="no">no</option>
                                                <option value="yes">yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <form class="form-horizontal " action="#">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Payment Terms</label> 
                                            <div class="col-md-8">
                                                <select name="terms" id="e3" class="form-control" >
                                                    <!---
                                                    <option value="POC">Payment On Collection</option>
                                                    <option value="net30">30 days </option>
                                                    <option value="net60">60 days</option>
													-->
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

                    <div class="form-actions clearfix"> 
					     <div class="col-md-11"
                        <input type="submit" value="Add Customer" class="btn btn-primary pull-right"> 
						</div>
						
						<div class="col-md-1">
						 <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button> 
						 </div>
                    
					
                </div>
				<?php echo form_close(); ?>
				<!---
                <div class="modal-footer">
                  

                </div>
				-->
            </div>
        </div>
    </div>
	</div>
</div>
    <!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->

<div class="modal fade" id="sales_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">New Sales Order</h4>
            </div>
            <div class="modal-body">

<?php
echo form_open('salesorders/add_so', 'class="form-horizontal "');
echo Modules::run('salesorders/add_new');
?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
<?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>


<div class="modal fade" id="addBookDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">to invoice </h4>
            </div>
            <div class="modal-body">
<?php echo form_open('salesorders/to_invoice'); ?>
                <p>Convert to Invoice</p>
                <input type="hidden" name="salesid" readonly="readonly" id="bookId" value=""/>               
                <input type="hidden" name="bookId" readonly="readonly" id="bookId" value=""/>
                <input type="hidden" name="c" readonly="readonly" id="bookId" value=""/>
                <button type="submit" class="btn btn-primary">Invoice </button><?php echo form_close(); ?>

                <p>UNSHIP ORDER</p>

<?php echo form_open('salesorders/unship'); ?>
                <input type="hidden" name="salesid" readonly="readonly" id="bookId" value=""/>
                <input type="hidden" name="bookId" readonly="readonly" id="bookId" value=""/>
                <input type="hidden" name="c" readonly="readonly" id="bookId" value=""/>
                <button type="submit" class="btn btn-warning">UNSHIP </button><?php echo form_close(); ?>

            </div><div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<!-- /.shipped -->
<div class="modal fade" id="addBookDialog1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"> Shipped </h4>
            </div>
            <div class="modal-body">
<?php echo form_open('status/pending_to_shipped'); ?>
                <p>ARE YOU SURE ????</p>
                <input type="hidden" name="salesid" readonly="readonly" id="bookId" value=""/><br>
                
                To be sent via Pallet   <select name="pallet">
                    <option value="0">no</option>
                    <option value="1">yes</option>
                    
                </select> 
				</br>			
                </br>
				Delivery no of packages:
				
				<input size="5"  name="qty" type="text" id="qty" />
				</br>	
				</br>
				Deliver total weight(kg):				
				<input size="5" name="wt" type="text" id="wt"/>
                </br>
				</br>
                </br>			
                </br>
				Additional info:
				
				<input size="30" maxlength="30"name="add_info" type="text" id="add_info" onfocus="if(this.value=='Leave next door if no answer')this.value=";" onblur="if(this.value==")this.value='Leave next door if no answer';" value="Leave next door if no answer"/>
                </br>
				</br>
				<button type="submit" class="btn btn-primary">Packed and Dispatched </button>
            </div><div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>




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

<script>
// Natural Sorting
    jQuery.fn.dataTableExt.oSort['natural-asc'] = function(a, b) {
        return naturalSort(a, b);
    };
    jQuery.fn.dataTableExt.oSort['natural-desc'] = function(a, b) {
        return naturalSort(a, b) * -1;
    };

/*this make page coulnd shrink
    jQuery(document).ready(function() {
        App.setPage("forms");  //Set current page
        App.init(); //Initialise plugins and elements
    });
*/
    jQuery(document).ready(function() {
        //App.setPage("dynamic_table");  //Set current page      20141209
	    App.setPage("jqgrid_plugin");
		//App.setPage("sales_orders"); 
        App.init(); //Initialise plugins and elements
    });

    $(document).ready(function() {
        $('#datatable1').dataTable();
        $('#datepicker').datepicker({minDate: -1, maxDate: "+1"});
    });

    $(document).on("click", ".open-AddBookDialog", function() {
        var myBookId = $(this).data('id');
        $(".modal-body #bookId").val(myBookId);
        // As pointed out in comments, 
        // it is superfluous to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });

    dataTable.fnAddData(["<input type='checkbox' id='checkboxID'/>"]);
    jQuery('#checkBoxID').show();

    $(document).ready(function() {

        $('.table-data').each(function(index, table) {

            $(this).dataTable({
                "aoColumns": [{"sType": "natural"}, null, null, null, null]
            });
        });

    });
    $('.checkall').click(function(e) {

        var chk = $(this).prop('checked');

        $('input', oTable.fnGetNodes()).prop('checked', chk);
    });




</script>

<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }


//$("#myDiv").click(function() {
    //$("#check").submit();
//});

jQuery("#43rowed3").jqGrid({
   	url:'server.php?q=2',
	datatype: "json",
   	colNames:['Inv No','Date', 'Client', 'Amount','Tax','Total','Notes'],
   	colModel:[
   		{name:'id',index:'id', width:55},
   		{name:'invdate',index:'invdate', width:90, editable:true},
   		{name:'name',index:'name', width:100,editable:true},
   		{name:'amount',index:'amount', width:80, align:"right",editable:true},
   		{name:'tax',index:'tax', width:80, align:"right",editable:true},		
   		{name:'total',index:'total', width:80,align:"right",editable:true},		
   		{name:'note',index:'note', width:150, sortable:false,editable:true}		
   	],
   	rowNum:10,
   	rowList:[10,20,30],
   	pager: '#p43rowed3',
   	sortname: 'id',
    viewrecords: true,
    sortorder: "desc",
	editurl: "server.php",
	caption: "Using navigator"
});
true
//jQuery("#43rowed3").jqGrid('navGrid',"#p43rowed3",{edit:false,add:false,del:false});
jQuery("#43rowed3").jqGrid('navGrid',"#p43rowed3",{edit:true,add:true,del:true});
jQuery("#43rowed3").jqGrid('inlineNav',"#p43rowed3");

</script>
<!-- /JAVASCRIPTS -->

</body>
</html>
