<html>
<head>	
	
	<title>Crown | Invoices</title>
<!--20121222 viola -->

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


<script>//showing comap
    function showUser(str)
    {    alert("test");
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
       xmlhttp.open("GET", "<?php echo base_url(); ?>invoices/getuser?q=" + str, true);
		
        xmlhttp.send();
    }
</script>







</head>
<body>
<?php //echo Modules::run('template/dash_head'); ?>
<?php echo Modules::run('template/menu'); ?>

<div id="main-content">


	

    <!---search by company name----->
<div class="modal fade" id="filter_company" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            </div>
			    <div class="modal-body">
				         <?php
                //echo form_open('invoices/filterByDate', 'class="form-horizontal "');
                //echo Modules::run('invoices/filter_dateForm');
                ?>
					    <div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-users"></i>Check Un-Sent Invoices by Company ID:  </h4>
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
											<a href="javascript:;" class="remove">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
								 
										<form class="form-horizontal " action="#">
 										
									        <div class="box-body">
									             </br>
									             </br>
										<table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											
											
											<thead>
												<tr>
												     
													<th>Company ID</th>																									
													<th>Company</th>													
                                                    <th> View </th>
												</tr>
											</thead>
											<tbody>
									  
                                        <?php 
										


										
                                        $this->db->select('*');
										 $this->db-> where('sent','un-sent');
                                        $this->db-> group_by('Company_id');
                                        $this->db->from('invoices');
                                        $query=$this->db->get();
							         	$num_rows = $query->num_rows();
								
								

										//echo form_open('invoices/filterByDate', 'class="form-horizontal "');
                                          $base_url = base_url();
										  
                                            foreach ($query->result() as $company) {


												echo '<tr class="gradeX">';
												  //  echo'<td><strong>'.$company->num_rows()'</strong></td>';
												    echo'<td><strong>'.$company->Company_id.'</strong></td>';
													echo'<td><strong>'.$company->Company_name.'</strong></td>';
                                                    //echo'<td><strong>'.$company->salesorder_id.'</strong></td>';                                                    
                                                                                       
                                                                                                        
													echo'<td><div class="btn-group dropdown" style="margin-bottom:5px">
											                    <button class="btn btn-primary">Action</button>
											                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
											                            <span class="caret"></span>
											                        </button>
											                        <ul class="dropdown-menu">
											                            <li>
											                                <a href="'.$base_url.'invoices/view_inv/'.$company->Company_id.'">Check/Sent </a>
											                            </li>
																						
											                            <li class="divider"></li>
											                            <li>
											                            <a href="'.$base_url.'businesses/delete/'.$company->Company_id.'">Delete</a>
											                             </li>
											                        </ul>
											                </div></td>';
													
												echo '</tr>';
											
                                                                                            }?>
												
											</tbody>
											
										</table>
									</div>
						</div>		
               

                </div--->
				<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                         <?php //echo (); ?>                
                </div>
				
				
			    </div>	
		</div><!-- /.modal-content -->
    </div>
		
	<!-- /.modal-dialog -->	
</div>
	  
	<!---search by company name----->
	
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
                                    <a href="<?php echo base_url(); ?>index.php/invoices">Invoices </a>
                                </li>

                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left">Invoices</h3>
                            </div>
                            <div class="description">All Invoices </div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->

<!-- DATE RANGE PICKER -->
                		
                               

                    <!--tool------->
                                <div class="row">
					                <div class="col-md-12">
									         <div class="modal-content">
		
            <form action="<?php echo base_url();?>invoices/filterByDate" method="post" enctype="multipart/form-data">
			            <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><i class="fa  fa-money"></i>Make Payment</h4>
                        </div>
			             <div class="well example-modal">
													<div class="modal">
													  <div class="modal-dialog">
														<div class="modal-content">
														  <div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 class="modal-title">Select Client and Dates</h4>
														  </div>
														  <div class="modal-body">
															<form></form>
															<?php echo form_open('invoices/pay_full'); ?>                                            
																					
										                    </BR>Customer</BR>
															<select name="company_id" id="e2" class="col-md-6" required="required" onchange="showUser(this.value,0)">
                                
								
								                            <option></option>

								                            <option>N/A</option>
								
                                                                 <?php
								
                                                                $this->db->select('*');
                                                                $this->db-> group_by('Company_id');
                                                                $this->db->from('invoices');
                                                                $query=$this->db->get();
								                                $num_rows = $query->num_rows();
								
								

										                    //echo form_open('invoices/filterByDate', 'class="form-horizontal "');
                                                                $base_url = base_url();
										  
                                                                     foreach ($query->result() as $company) {
								                                     echo '<option  value="' . $company->Company_id . '">' . $company->Company_name . '</option>  ';


                                                                    }
                                                                 ?>
                               

                                                             </select><br></br> <div id="txtHint"><b>Last 120 days invoices info will be listed here.</b> <div class="divide-20"></div></div> 
                                                                                   
                                                                                    </br>
																					<h4 >Pay between Invoice Dates</h4> 
																					<br>Start Date
                                                                                    <input type="date" name="from" class="form-control" />
                                                                                    <br>
                                                                                    end date
                                                                                     <input type="date" name="to"  class="form-control" />
                                                                                    </BR>
																					
																					<br>
		                                                                            <br>
                                                                                    <select name="method" id="e1" class="col-md-6 form-control" required="required" >
                                                                                         <option>--Please Select --</option>
                                                                                         <option>CASH</option>
                                                                                         <option>Credit/Debit card</option>
                                                                                         <option>BACS</option>
                                                                                         <option>CHEQUE</option>
                                                                                         <option>PAYPAL</option>
                                                                                         <option>MONEY BOOKERS</option>
             
                                                                                    </select>
                                                                                     <br><br><button type="submit" class="btn btn-primary">Make Full Payment</button>
                                                                                         <?php form_close();?>
															
															
													
					                                       
                                                                            </div>  
														  <div class="modal-footer">
															
														  </div>
														</div><!-- /.modal-content -->
													  </div><!-- /.modal-dialog -->
													</div><!-- /.modal -->
						    </div>   
						    
                    
			       
				
						
						
					
					</div>
            </form>
			
         

									</div>
								
								</div>
									
									
                     <!--tool---end---->




                <div class="separator"></div>
               


                <div class="separator"></div>

                <div class="footer-tools">
                    <span class="go-top">
                        <i class="fa fa-chevron-up"></i> Top
                    </span>
                </div>
            </div><!-- /CONTENT-->
        </div>
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
<script src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
<!-- DATE PICKER -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.date.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/picker.time.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
<!-- SLIMSCROLL -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
<!-- BLOCK UI -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>

<!-- 20141222 viola add-->
<!-- DATA TABLES -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>


<!-- JQGRID 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqgrid/js/grid.locale-en.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqgrid/js/jquery.jqGrid.min.js"></script>
-->	
<!--  --20141222 viola add-->	
	
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


    jQuery(document).ready(function() {
         App.setPage("dynamic_table");  //Set current page
		 App.setPage("pay_at_a_time"); 
	  // App.setPage("jqgrid_plugin");  //Set current page
        App.init(); //Initialise plugins and elements
    });

    $(document).ready(function() {
        $('#datatable1').dataTable();
		 $('#datatable2').dataTable();
        $('#datepicker').datepicker();
		 $('#datepicker2').datepicker({minDate: -1, maxDate: "+1"});//select date   viola 20141226
		 $('#datepickerFrom').datepicker();
		 $('#datepickerTo').datepicker();//select date   viola 20141226
		  $('#datepickerFrom2').datepicker();
		 $('#datepickerTo2').datepicker();
    });

     $(document).on("click", ".open-AddBookDialog", function() {
        var myBookId = $(this).data('id');
        $(".modal-body #bookId").val(myBookId);
		 var myadd_info = $(this).data('id2');add_info
        $(".modal-body #add_info").val(myadd_info);
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

 <!-- Javascript Scripts -->
    <script type="text/javascript">
    //<![CDATA[

        function selectAllFiles(c) {
            for (i = 1; i <= 5; i++) {
                document.getElementById('INV-' + i).checked = c;
            }
        }

    //]]>
    </script>	

<!-- /JAVASCRIPTS -->

</body>
</html>

