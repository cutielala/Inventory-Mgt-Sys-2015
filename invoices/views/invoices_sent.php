<html>
<head>	
	
	<title>Crown | Sent Invoices</title>
<!--20141222 viola -->
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
<!-- DATE RANGE PICKER -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
<!-- JQGRID
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jqgrid/css/ui.jqgrid.min.css" />
 -->	
<!--20121222 viola -->	
<!-- FULL CALENDAR -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/fullcalendar/fullcalendar.min.css" />	
<!-- TYPEAHEAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/typeahead/typeahead.css" />
<!-- SELECT2 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select2/select2.min.css" />
<script src="http://malsup.github.com/jquery.form.js"></script> 
<script language="JavaScript" type="text/javascript">


<script>//showing comap
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
<?php echo Modules::run('template/dash_head'); ?>
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
                                    <a href="<?php echo base_url(); ?>/invoices">Invoices</a>
                                </li>
								

                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left">Invoices Sent </h3>
                            </div>
                            <div class="description">All Sent Invoices</div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->


                <!-- invoice add-->
                 <div class="row">
					                <div class="col-md-12">
									            <div class="col-md-2">
						                            <div class="text-center">
							                            <div class="btn-group">
									                        <a class="btn btn-default" href="<?php echo base_url();?>invoices"> <i class="fa fa-reply"></i>   Back
                                                                
									                        </a>
									
							                            </div>
						                            </div>
					                            
					                            </div>
												<div class="text-center">
													<div class="btn-group">
													    
														<a class="btn btn-default" href="<?php echo base_url();?>invoices/invoices_sent">Sent Invoices</a>
														<a class="btn btn-default" href="<?php echo base_url();?>invoices/invoices_unsent">Un-sent Invoices</a>
														<a class="btn btn-default" href="<?php echo base_url();?>invoices/invoices_part_paid">Part Paid Invoices</a>
													<!----	
														<a class="btn btn-default confirm-dialog" href="<?php echo base_url();?>salesorders/order_invoiced">Paid Invoices</a>
														<a class="btn btn-default" href="<?php echo base_url();?>salesorders/order_paid">Cancel Invoices</a>
													-->
													</div>
												</div>
												<div class="divide-20"></div>

									</div>
								</div>
                <!-- /invoice add -->


                <div class="separator"></div>
                <!-- DATA TABLES -->
                <div class="row">
                    <div class="col-sm-12">
                        <!-- BOX -->
                        <div class="box border blue">
                            <div class="box-title">
                                <h4><i class="fa fa-code"></i>Sent Invoice List</h4>
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
							    <h6>
                                <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
									    <h5>
                                        <tr>

                                            <th>Invoice #</th>
											<th>SO #</th>
                                            <th>Company							
											</th>
                                            <th> PO No: </th>
                                            <th>Date Raised</th>
                                            <th class="hidden-xs">Total Inc VAT </th>
                                            
                                            <th width="10%"> Status </th>
                                            <th> Detail  </th>
											<th> PDF </th>
									   </tr>
									    </h5>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $base_url = base_url();
                                        foreach ($invoices_sent->result() as $in) {


                                           
                                            echo '<tr class="gradeX">';
											//echo '<td><div><input id="INV-' . $in->invoice_id . '"type="checkbox" ></div></td>';
                                            echo'<td><strong>INV-' . $in->invoice_id . '</strong></td>';
											echo'<td><strong>' . $in->salesorder_id . '</strong></td>';
                                            echo'<td><strong>' . $in->Company_name . '</strong></td>';
                                            echo'<td><strong>PO-' . $in->po_number . '</strong></td>';
                                            echo'<td><strong>' . $in->dateraised . '</strong></td>';
                                             echo'<td><strong> £' . $in->inc_vat . '</strong></td>';
                                           
                                           
                                            ///////// status begings /////////////////////
                                     if ($in->status === 'invoiced') {
                                                echo'<td><button class="btn btn-xs  btn-success  pop-hover" data-title="Invoiced-Raised " data-content="invoice raised" data-original-title="" title=""><span><i class="fa fa-check"></i></span> <strong>' . $in->status . '</strong></button>';
                                                if ($in->sent === 'un-sent') 
                                                    {
                                                    
                                                    echo ' </br></br><button class="btn btn-xs     btn-dandger  pop-hover" data-title="Not Sent " data-content="invoice raised but not emailed " data-original-title="" title=""><span><i class="fa fa-email"></i></span> <strong>unsent</strong></button></td> ';
                                                    } 
													elseif ($in->sent === 'sent') 
                                                    {
                                                    
                                                    echo ' </br></br><button class="btn btn-md  btn-success"> sent </button></td>';
                                                }
                                                
                                                
                                                
                                            }elseif ($in->status === 'paid') {
                                                echo'<td>
												        <button class="btn  btn-success ><span><i class="fa fa-check"></i></span> <strong>' . $in->status . '</strong>
														</button>
													</td>';
                                             
                                            }
                                            elseif ($in->status === 'PART PAID'){
                                                echo'<td>
												        <button class="btn btn-xs  btn-success  pop-hover" data-title="Invoiced-Raised " data-content="invoice raised" data-original-title="" title=""><span><i class="fa fa-check"></i></span> <strong>' . $in->status . '</strong>
														</button>
													</td>';
                                             
                                                     }

                                            if ($in->status === 'cancelled') {
                                                echo'<td>
												        <button class="btn btn-danger pop-hover" data-title="cancelled " data-content="order cancelled" data-original-title="" title=""><span><i class="fa fa-cross"></i></span> <strong>' . $in->status . '</strong>
														</button>
													</td>';
                                            }
											echo'<td>
												        <div class="btn-group dropdown" style="margin-bottom:5px">
											
										
											<a target="_blank" href="' . $base_url . 'invoices/view/' . $in->invoice_id . '"><button class="btn btn-primary">View Invoice</button></a>
											
											            </div>
											        </td>';
                                            //downdload PDF file       
                                                echo'<td>
                                                    <div>        
															<form>                        
											                    <a href="'.  base_url().'salesorders/invoice_pdf/'. $in->invoice_id .'"><span class="fa fa-file fa-lg"></span></a>
											
                                                            </form>
											        </div>
                                                </td>';
									   
									   
									   }

                                        ?>

                                     </tbody>
                                    <tfoot>
                                        <tr>
										    
											<th>Invoice #</th>
											<th>SO #</th>
                                            <th>Company							
											</th>
                                            <th> PO No: </th>
                                            <th>Date Raised</th>
                                            <th class="hidden-xs">Total Inc VAT</th>                                           
                                            <th width="15%"> Status </th>
                                            <th> Detail  </th>
											<th> PDF </th>
                                        </tr>
                                    </tfoot>
                                </table>
								</h6>
								
                                
                                
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



// Natural Sorting
    jQuery.fn.dataTableExt.oSort['natural-asc'] = function(a, b) {
        return naturalSort(a, b);
    };
    jQuery.fn.dataTableExt.oSort['natural-desc'] = function(a, b) {
        return naturalSort(a, b) * -1;
    };

/*
    jQuery(document).ready(function() {
        App.setPage("forms");  //Set current page
        App.init(); //Initialise plugins and elements
    });
*/
    jQuery(document).ready(function() {
        App.setPage("dynamic_table");  //Set current page      20141209
	    App.setPage("invoices_sent"); 
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
</script>
<!-- /JAVASCRIPTS -->

</body>
</html>
