
<!-- DATA TABLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
<!-- TYPEAHEAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/typeahead/typeahead.css" />
<!-- SELECT2 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select2/select2.min.css" />


</head>
<body>

<?php echo Modules::run('template/menu'); ?>

<div id="main-content">
    
    <!-- Modal -->
<div class="modal fade" id="Pending" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="col-md-4 col-md-offset-4">
	    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header alert alert-danger">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Pending to Placed</h4>
                 </div>
                 <div class="modal-body">
       Your are about to change this item from Pending to Placed.
       Are you sure ??<br/><br/><br/>
       
        
		<?php echo form_open('po/pending_to_placed'); ?>
           <input type="hidden"  name="po_id" readonly="readonly" id="bookId" value=""/>
		   <button type="submit" class="btn btn-block btn-primary">Yes </button><br/>
		   <button type="button" class="btn btn-block  btn-default" data-dismiss="modal">Cancel</button>
		   
         <?php echo form_close(); ?>
      </div>
    
             </div>
		</div>
    </div>
</div>
    <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
     <!-- Modal -->
<div class="modal fade" id="Placed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="col-md-4 col-md-offset-4">
	    <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header alert alert-warning">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"> Placed to Received</h4>
                 </div>
      <div class="modal-body">
       Your are about to change this item from Placed to Received.
       Are you sure ??<br/><br/><br/>
       
        
		<?php echo form_open('po/placed_to_received'); ?>
		 <input type="hidden"  name="po_id" readonly="readonly" id="bookId" value=""/>
		     <button type="submit" class="btn btn-block btn-primary">Yes </button><br/>
           <button type="button" class="btn btn-block btn-default" data-dismiss="modal">NO</button>
		  
         <?php echo form_close(); ?>
      </div>
   
            </div>
        </div> 
	</div>
</div>
    <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
    <!-- Modal -->
<div class="modal fade" id="Received" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="col-md-4 col-md-offset-4">
	    <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header  alert alert-success">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title" id="myModalLabel">Received to Completed</h4>
                 </div>
                 <div class="modal-body">
                     Your are about to change this item from Received to Completed.
                     Are you sure ??<br/><br/><br/>
       
        
		            <?php echo form_open('po/received_to_completed'); ?>
		            <input type="hidden"  name="po_id" readonly="readonly" id="bookId" value=""/>
                    <button type="submit" class="btn  btn-block btn-primary">Yes </button>
					<button type="button" class="btn  btn-block  btn-default" data-dismiss="modal">Cancel</button>
		  
                     <?php echo form_close(); ?>
                 </div>
            </div>
        </div>
    </div>
</div>
    <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->	
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
                                    <a href="<?php echo base_url(); ?>">Main</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/po">Purchase Orders </a>
                                </li>

                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left">Purchase Orders</h3>
                            </div>
                            <div class="description">All Purchase Orders </div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->

                <!-- PO add-->
                <div class="row">
                    
					<div class="col-md-4 col-md-offset-4">
						<div class="text-center">
							<div class="clearfix">
									<a class="btn btn-block btn-warning" data-toggle="modal" data-target="#sales_order">  Add New PO
                                                                
									</a>							
							</div>
						</div>
						<div class="divider-20"></div>
					</div>
                </div>
                <!-- /POadd -->

                                         
                <div class="separator"></div>
                <!-- DATA TABLES -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BOX -->
                        <div class="box border orange">
                            <div class="box-title">
                                <h4><i class="fa fa-th-large fa-fw"></i>Purchase Order List</h4>
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
                                            <th>PO#</th>
                                            <th>Vendor</th>
                                            <th> Date Orders </th>
                                            <th>Value</th>
                                            <th width="10%">Status</th>
										    <th class="hidden-xs">ETD</th>
										    <th class="hidden-xs">ETA</th>
										    <th width="15%">Change</th>
										    <th>PDF</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
										$i=2;
                                        $base_url = base_url();
										
                                        foreach ($po_orders->result() as $in) {

                                         

                                            echo '<tr class="gradeX">';
											//if ($in->split_po === 'YES') //if split order

											{
                                                    //echo'  <td>PO-' . $in->po_refer . '-'. $i++.' </td>';
													//echo'  <td>PO-' .substr(sprintf('%06d', $in->po_refer ),0,6). '-'.  $in->po_refer_num .' </td>';
                                                } 
											//else 
											{   
											    if ($in->po_refer_num==='1') //if first of split order
												{
												    echo'  <td>PO-'.substr(sprintf('%06d', $in->PO_id),0,6). '-1 </td>';
												}
												else{
	                                                echo'<td>PO-' .substr(sprintf('%06d', $in->PO_id),0,6). '</td>';
												}
											}
                                           // echo'<td>PO-' . $in->PO_id . '</td>';
                                            echo'<td>' . $in->Vendor_name . '</td>';
                                           
                                            echo'<td>' . $in->dateraised . '</td>';
                                            echo'<td>'.$in->currency.'   '.$in->Grand_total . '</td>';
                                           
                                            
                                          		
                                           
										    echo'<td>';
                                               if($in->status ==='Pending'){
                                                     echo'<a  class="open-AddStatusDialog" data-toggle="modal" data-target="#Pending" data-id="'.$in->PO_id.'"><button class="btn btn-sm btn-danger">Pending</button></a>';

                                                }
                                               elseif ($in->status ==='Placed'){
                                                     echo'<a  class="open-AddStatusDialog "  data-toggle="modal" data-target="#Placed" data-id="'.$in->PO_id.'"><button class="btn  btn-sm btn-warning">Placed</button></a>';
                                                }
											   elseif ($in->status ==='Received'){
                                                     echo'<a  class="open-AddStatusDialog "  data-toggle="modal" data-target="#Received" data-id="'.$in->PO_id.'"><button class="btn  btn-sm btn-success">Received</button></a>';
                                                }  
                                           
                                                
											{
													
													
                                                    $query_id=$this->db->where('PO_id', $in->PO_id)
													               ->get('po_orders_items');      
                                                    $num_rows_id = $query_id->num_rows();
													
													$query_id_pick=$this->db->where('PO_id', $in->PO_id)
													                        ->where('received','YES')
													                        ->get('po_orders_items'); 
													$num_rows_id_pick = $query_id_pick->num_rows();
													   // echo $num_rows_id.'/'.$num_rows_id_pick;
													if (($num_rows_id !='0')&&($num_rows_id_pick !='0')&&( $num_rows_id!=$num_rows_id_pick)) {
														  echo'  <button class="btn btn-purple btn-sm  pop-hover" data-title="Part-Received " data-content="Order:'.$num_rows_id.'/Received:'.$num_rows_id_pick. '">Part-Received</button>';
                                          
													 }
													 if (($num_rows_id !='0')&&($num_rows_id === $num_rows_id_pick)) {
														  echo'  <span class="btn btn-info btn-sm  pop-hover" disabled="" data-title="Full-Received" data-content=" "><i class="fa fa-check"></i>Full-Received</span>';
                                              
													 }
													 else{}
                                                    echo'';
                                                }


												
												$remaining =  $in->Grand_total - $in->amount;
                                           if($in->amount < $in->Grand_total  ){
                                                echo'<a data-toggle="modal" data-id="'. $in->PO_id .'" data-title="Unpaid " title="unpaid" data-content="'.$in->currency.' '. $in->amount.' '. $in->method.' '
                                                        . ' Balance '.$in->currency.' '.$remaining.'" class="open-AddBookDialog btn btn-sm  btn-pink pop-hover" href="#addBookDialog"><i class="fa fa-frown-o fa-x2 "></i>unpaid</a>'
                                               . '  </td>';
                                            }
                                            elseif( $in->Grand_total === '0.00') {
                                                 echo'<a data-toggle="modal" data-id="'. $in->PO_id .'" data-title="Unpaid " data-content="'.$in->currency.' '. $in->amount.' '. $in->method.'" title="unpaid" class="open-AddBookDialog btn btn-sm  btn-pink pop-hover" href="#addBookDialog"><i class="fa fa-frown-o fa-x2 "></i>unpaid</a>'
                                               . '  </td>';
                                                }
                                            elseif($in->amount  >= $in->Grand_total) {
                                                 echo'<span class="btn btn-sm btn-yellow pop-hover" disabled="" data-title="Paid '.$in->date_paid.'" data-content="Paid '.$in->currency.' '. $in->amount.' '. $in->method.'"><i class="fa fa-check fa-x2 "></i>Paid</span></td>';
                                            }
                                            
                                            echo'</td>';
											
                                            echo'<td>' . $in->ETD . '</td>';
											echo'<td>' . $in->ETA . '</td>';
											echo'<td><div class="btn-group dropdown">
											<button class="btn btn-info">Action</button>
											<button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											</button>
											<ul class="dropdown-menu context">
											          		
                                                <li class="divider"></li>
												<li><a class="open_eta btn btn-pink pop-hover"  href="'.  base_url().'index.php/po/view/'.$in->PO_id.'"> View
												</a></li>
											 
											
											    
										        <li class="divider"></li>
												<li>
											        <a  data-toggle="modal"      data-id2="' . $in->PO_id . '" data-id3="' . $in->ETA . '" data-id4="' . $in->ETD . '" class="open_eta btn btn-pink pop-hover"  href="#po_eta"> ETA/ETD</a>                                                                									
                                                </li>
												
												
												<li class="divider"></li>
												<li>
                                                   <a class="open_eta btn btn-pink pop-hover"  href="'.  base_url().'index.php/po/delete/'.$in->PO_id.'" class=".interactive">   Delete   </a>
											    </li>
											</ul>
											</div></td>';
											//echo'<td><a href="'.  base_url().'po/delete/'.$in->PO_id.'" class=".interactive"><button class="btn btn-danger">delete</button></a></td> ';
                                            echo'<td><a href="'.  base_url().'index.php/po/pdf/'. $in->PO_id.'"><span class="fa fa-file fa-lg"></span></a> </td>';    
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



<div class="modal fade" id="sales_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="col-sm-8 col-sm-offset-2 ">
	    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title" id="myModalLabel">New Purchase Order</h4>
                </div>
			 <?php
                echo form_open('po/add_po', 'class="form-horizontal "'); ?>
                <div class="modal-body">

                <?php
              
                echo Modules::run('po/add_new');
                ?>
            
                 </div>
                <div class="modal-footer">
			        <div class="col-sm-6">
					        <button type="submit" class="btn btn-block btn-info">Add</button>
                    </div>
				    <div class="col-sm-6">
					  
                             <button type="button" class="btn  btn-block  btn-default" data-dismiss="modal">Cancel</button>
				    </div>              
                 </div><!-- /.modal-content -->
			 <?php echo form_close(); ?>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>


<div class="modal fade" id="addBookDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="col-sm-8 col-sm-offset-2 ">
         <div class="modal-dialog">
   
		    <div class="modal-content">
                <div class="modal-header alert alert-success">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Purchase Order Payment</h4>
                </div>
                <form action="<?php echo base_url(); ?>index.php/po/payment" method="post">
                   
				    <div class="modal-body ">
       
                         <input type="text" name="bookId" id="bookId" value="" placeholder=""/>
                         <input type="number" name="Amount"  value="" placeholder="0.00"/>
                         <input type="text" name="method"  value="" placeholder="Payment Type"/>
                         <input  type="text" name="date_paid"  id="datepickerTo" value="" placeholder=" date"/>
                        
                    </div>
					
                    <div class="modal-footer ">
					    <div class="col-sm-6">
					        <button type="submit" class="btn btn-block btn-info">Save</button>
                        </div>
						<div class="col-sm-6">
					  
                             <button type="button" class="btn  btn-block  btn-default" data-dismiss="modal">Cancel</button>
					    </div>
                    </div><!-- /.modal-content -->
				</form> 	
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>



<div class="modal fade" id="po_eta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="col-sm-6 col-sm-offset-3 ">
   
	    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header alert alert-danger">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title" id="myModalLabel"> ETA/ETD Information </h4>
                 </div>
				 <form action="<?php echo base_url(); ?>index.php/po/po_eta" method="post">
               
                 <div class="modal-body">
       
                    <input type="hidden" name="po_Id" id="po"  value="" placeholder=""/>
					ETD Date<input type="text" name="ETD" id="ETD"  value="" placeholder="date"/>
					ETA Date<input  type="text"  name="ETA" id="ETA"  value="" placeholder="date" />  
                 </div>
                <div class="modal-footer">
                       <div class="col-sm-6">
					        <button type="submit" class="btn btn-block btn-info">Save</button>
                        </div>
						<div class="col-sm-6">
					  
                             <button type="button" class="btn  btn-block  btn-default" data-dismiss="modal">Cancel</button>
					    </div>
                </div> </form>
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
<script>


/*this make page coulnd shrink
    jQuery(document).ready(function() {
        App.setPage("forms");  //Set current page
        App.init(); //Initialise plugins and elements
    });
*/
    jQuery(document).ready(function() {
        App.setPage("dynamic_table");  //Set current page
        App.init(); //Initialise plugins and elements
    });

    $(document).ready(function() {
        //$('#datatable1').dataTable();
        $('#datepicker').datepicker();
    });

   $(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
});
     $(document).on("click", ".open-AddStatusDialog", function() {
        var myBookId = $(this).data('id');
        $(".modal-body #bookId").val(myBookId);
       
    });
     $(document).on("click", ".open_eta", function() {
        var mypo = $(this).data('id2');
        $(".modal-body #po").val(mypo);
		  var myETA = $(this).data('id3');
        $(".modal-body #ETA").val(myETA);
		  var myETD = $(this).data('id4');
        $(".modal-body #ETD").val(myETD);
		
    });



//Interactive
		$(".interactive").click(function(){
			var mytheme = $('input[name=theme]:checked').val();
			var mypos = $('input[name=position]:checked').val();
			//Set theme
			Messenger.options = {
				extraClasses: 'messenger-fixed '+mypos,
				theme: mytheme
			}
			var msg;
			msg = Messenger().post({
			  message: 'Launching thermonuclear war...',
			  type: 'info',
			  actions: {
				cancel: {
				  label: 'cancel Delete',
				  action: function() {
					return msg.update({
					  message: 'Disaster averted',
					  type: 'success',
					  showCloseButton: true,
					  actions: false
					});
				  }
				}
			  }
			});
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
                alert('PO Have been Added');
            }
        });

        ev.preventDefault();
    });
	
	    $(document).ready(function() {
 
	   $('#ETD').datepicker();
	    $('#ETA').datepicker();
		 $('#datepickerTo').datepicker();//select date   viola 20150326
  
    });
	
	
</script>

<!-- /JAVASCRIPTS -->
	<script type="text/javascript">
    $('.addpo').on('click', function () {
        return confirm('PO Have been Added');
    });
</script>
</body>
</head>

