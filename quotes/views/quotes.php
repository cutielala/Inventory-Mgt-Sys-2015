

<?php echo Modules::run('template/dash_head'); ?>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<!-- UNIFORM -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/uniform/css/uniform.default.min.css" />
<!-- DATA TABLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
<!-- TYPEAHEAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/typeahead/typeahead.css" />
<!-- SELECT2 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select2/select2.min.css" />
<!-- ANIMATE -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/animatecss/animate.min.css" />
<!-- JQUERY UI-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.min.css" />
<!-- TODO -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/jquery-todo/css/styles.css" />
<!-- GRITTER -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/gritter/css/jquery.gritter.css" />
<script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","<?php echo base_url(); ?>notifications/getuser?q="+str,true);
xmlhttp.send();
}
</script>
</head>
</body>

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
                                    <a href="<?php echo base_url(); ?>">Main</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php//Quotes">Quotes </a>
                                </li>

                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left">Quotes </h3>
                            </div>
                            <div class="description">All Quotes </div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->


                <!-- customer add-->
                <div class="row">
                    
						
					<div class="col-md-4 col-md-offset-4">
						<div class="text-center">
							<div class="clearfix">
								<a class="btn btn-block btn-warning" data-toggle="modal" data-target="#new_quote" href="<?php echo base_url();?>/businesses/add_company"><i class="fa fa-plus-circle"></i>New Quote</a>
							
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
                        <div class="box border orange">
                            <div class="box-title">
                                <h4><i class="fa fa-table fa-fw"></i> Quotes List</h4>
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
                                            <th>Quotes ID</th>
                                            <th>Company</th>
                                            <th> PO Number </th>
                                            <th>Date Raised</th>
                                            <th class="hidden-xs">Total Inc VAT</th>
                                            <th> Status </th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                   
                                       
                                        $base_url = base_url();
                                        foreach ($quotes->result() as $so) {
                                         $originalDate =$so->dateraised;
                                        $newDate = date("d-m-Y", strtotime($originalDate));
                                            $id = $so->quotes_id;
                                        
                                            echo '<tr class="gradeX">';
                                            echo'<td><strong>'. substr(sprintf('%06d', $so->quotes_id),0,6) .'</strong></td>';
                                            echo'<td><strong>' . $so->Company_name . '</strong></td>';
                                            echo'<td><strong>' . $so->po_number . '</strong></td>';
                                            echo'<td><strong>' . $newDate. '</strong></td>';
                                            echo'<td><strong>£' . $so->inc_vat . '</strong></td>';
                                            echo'<td>
											        <div class="btn-group dropdown" style="margin-bottom:5px">';
                                            if($so->status === 'Converted'){
                                              
												echo'	
												<button class="btn btn-success">Sent To Sales</button>
											                <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
											                <span class="caret"></span>
											    </button>
											<ul class="dropdown-menu">
											<li>
											   <a href="'.$base_url.'index.php/quotes/view/' . $so->quotes_id . '">View/Edit</a>
                                        	</li>
                                                                                       
											<li class="divider"></li>
											<li>
								                <a href="'.$base_url.'index.php/quotes/delete/' . $so->quotes_id . '" class="confirmation">Delete </a>
                                            </li>
											</ul>';	
                                                 }
											else{
                                                
                                            
                                                
										    echo'	
										    <button class="btn btn-info">Action</button>
											    <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
											    <span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
										    <li> 
											<a target="_blank" href="'.$base_url.'index.php/quotes/view/' . $so->quotes_id . '"  >View/Edit</a>
                                            </li>                                            
											<li class="divider"></li>
										    <li>
								                <a href="'.$base_url.'index.php/quotes/delete/' . $so->quotes_id . '" class="confirmation">Delete</a>
                                            </li>  
											</ul>';
											}
                                         echo'   </div></td>';

                                                echo '</tr>';
                                            
                                        }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Quotes ID</th>
                                            <th>Company</th>
                                            <th> PO Number </th>
                                            <th>Date Raised</th>
                                            <th class="hidden-xs">Total Inc VAT</th>
                                            <th> status </th>
                                            
                                        </tr>
                                    </tfoot>
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



<div class="modal fade" id="new_quote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">New Quote</h4>
            </div>
            <div class="modal-body">


                <?php
                echo form_open('quotes/add_so', 'class="form-horizontal "');
                echo Modules::run('quotes/add_new');
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
                <?php echo form_open('salesorders/to_invoice');?>
             <p>Convert to Invoice</p>
             <input type="text" name="salesid" readonly="readonly" id="bookId" value=""/>
        <input type="text" name="bookId" readonly="readonly" id="bookId" value=""/>
         <input type="text" name="c" readonly="readonly" id="bookId" value=""/>
            <button type="submit" class="btn btn-primary">Invoice </button>
            </div><div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <?php echo form_close(); ?>
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
                <?php echo form_open('status/pending_to_shipped');?>
             <p>ARE YOU SURE</p>
        <input type="hidden" name="salesid" readonly="readonly" id="bookId" value=""/>
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
<!-- BLOCK UI -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
<!-- DATA TABLES -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
<!-- COOKIE -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
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
<script src="http://malsup.github.com/jquery.form.js"></script> 
<!-- COOKIE -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
<!-- GRITTER -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/gritter/js/jquery.gritter.min.js"></script>
<!-- CUSTOM SCRIPT -->
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>


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

<script>


/*   ////this make page coulnd shrink
    jQuery(document).ready(function() {
        App.setPage("forms");  //Set current page
        App.init(); //Initialise plugins and elements
    });
*/
    jQuery(document).ready(function() {
        App.setPage("dynamic_table");  //Set current page
		App.setPage("quotes");
        App.init(); //Initialise plugins and elements
    });

    $(document).ready(function() {
        $('#datatable1').dataTable();
        $('#datepicker').datepicker({ minDate: -1, maxDate: "+1" });
    });

    $(document).on("click", ".open-AddBookDialog", function() {
        var myBookId = $(this).data('id');
        $(".modal-body #bookId").val(myBookId);
        // As pointed out in comments, 
        // it is superfluous to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });
    
    dataTable.fnAddData( ["<input type='checkbox' id='checkboxID'/>"]);
jQuery('#checkBoxID').show();
</script>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure to remove it?');
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
</script>
<script>
		jQuery(document).ready(function() {		
			  App.setPage("quotes");  //Set current page
			  App.init(); //Initialise plugins and elements
		});
              
});
	</script>
<!-- /JAVASCRIPTS -->

</body>
</html>
