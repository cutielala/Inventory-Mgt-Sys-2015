<?php echo Modules::run('template/dash_head'); ?>

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
<script type="text/javascript">
    function myfunc () {
        var frm = document.getElementById("foo");
        frm.submit();
    }
    window.onload = myfunc;
</script>

<script>



    // wait for the DOM to be loaded 
    $(document).ready(function() {
        // bind 'myForm' and provide a simple callback function 
        $('#packing').each(function() {
            alert(" processing now!");
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
<script language="JavaScript" type="text/javascript">
function showText(obj)
{

//previousweek= new Date(firstDay.getTime() - 7 * 24 * 60 * 60 * 1000);

date = new Date().toLocaleDateString().split("/")
date[0].length == 1 ? "0" + date[0] : date[0]//date
date[1].length == 1 ? "0" + date[1] : date[1]//month
date = date[1] + "/" + date[0] + "/" + date[2];


var showdate = function(n){
   var d = new Date();
   d.setDate(d.getDate()+n);
   //或者 d = d.getFullYear() + "-" +  (d.getMonth()+1) + "-" + d.getDate();
    d = d.toLocaleDateString().replace(/[\u4e00-\u9fa5]/g,'-').replace(/-$/,'')    
    
	d = d.split("/")
d[0].length == 1 ? "0" + d[0] : d[0]//date
d[1].length == 1 ? "0" + d[1] : d[1]//month
d = d[1] + "/" + d[0] + "/" + d[2];
	
	
	return d;
}


if(obj.value=='Today')
{
document.getElementById('datepickerFrom').value='';
document.getElementById('datepickerTo').value='';
//document.getElementById('mytext').style.display='block';
document.getElementById('datepickerFrom').value=date;
document.getElementById('datepickerTo').value=date;

obj.value='Today';
}
if(obj.value=='Last 7 Days')
{
document.getElementById('datepickerFrom').value='';
document.getElementById('datepickerTo').value='';
document.getElementById('datepickerFrom').value=showdate(-7);
document.getElementById('datepickerTo').value=date;
//document.getElementById('mytext').style.display='none';
//obj.value='Show';
}
else if 
(obj.value=='Last month')
{
document.getElementById('datepickerFrom').value='';
document.getElementById('datepickerTo').value='';
document.getElementById('datepickerFrom').value=showdate(-30);
document.getElementById('datepickerTo').value=date;
//obj.value='Show';
}
return;
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
                                    <a href="<?php echo base_url(); ?>">Main</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/salesorders/order_returned">Return Orders</a>
                                </li>
								 <li>
                                    <a href="<?php echo base_url(); ?>index.php/salesorders/order_refund">Credit Note</a>
                                </li>

                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left">Refund</h3>
                            </div>
                            <div class="description">All Credit Note</div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->


                <!-- customer add-->
                <div class="hidden row">
				   
										
					<div class=" col-md-5 pull-right">
						<form action="<?php echo base_url();?>index.php/salesorders/filterByDate" method="post" enctype="multipart/form-data">
			
							<span class="date-range pull-right">
								<div class="btn-group">											
									<input type="button" class="js_update btn btn-default" onclick="showText(this)" value="Today"> 
												        <input type="button" class="js_update btn btn-default" onclick="showText(this)" value="Last 7 Days" > 
												        <input type="button"class="js_update btn btn-default" onclick="showText(this)" value="Last month" >
	                                        
											</br></br>
											From <input type="text" name="datepickerFrom" id="datepickerFrom"   size="10" >
											To <input type="text" name="datepickerTo" id="datepickerTo"   size="10" >
											

											</div>
								<button type="submit" class="btn btn-primary">Search</button>
							</span>
                        </form>										
					</div>	
								
                       
									
                <!-- /customer add -->
                </div>

                          
                <div class="col-md-12">
					<div class="pull-left hidden-xs">
						<div class="box-body big ">
										            
							<div class="btn-group dropdown">
								<button class="btn btn-pink dropdown-toggle" data-toggle="dropdown">
									<span class="fa fa-plus"></span>
								</button>
								<ul class="dropdown-menu context pull-right" style="text-align: left;">
																										   
									<li>
										<a data-toggle="modal" data-target="#box-blankcn">
											<i class="fa fa-upload"></i>
											Blank Credit Note</a>
											                 
									</li>													     
								</ul>
							 </div>
														  

                        </div>
                    </div>	<br>		<br>							
				</div>
                                                    
                                                  
				
										
				 
				<br>
                <!-- DATA TABLES -->
                <div class="row">
                    <div class="">
                        <!-- BOX -->
                        <div class="box border pink">
                            <div class="box-title">
                                <h4><i class="fa fa-pencil-square-o fa-fw"></i>Refund Orders List</h4>
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
                                <table id="datatable3" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th width="10%">SO#</th>
                                           
											<th>Company</th>
                                            <th style="width:10%"> PO Number </th>
                                            <th>Date Raised</th>
											<th style="width:5%" class="hidden-xs">Currency</th>
											<th class="hidden-xs">Credit Note Amount</th>
											
											
                                            <th width="10%">Total </th>
                                             <th>Type</th>
                                            <th style="width:15%">  Change  &nbsp;  &nbsp; </th>
											 <th style="width:2%">PDF </th>
											<!--
                                            <th class="sorting_disabled"><input name="checkall" type="checkbox" class="checkall" value="ON" />SelectAll</th>
                                            -->
									   </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $base_url = base_url();
                                      $i=2;
									
                                        foreach ($salesorders->result() as $so) {
                                           // $originalDate = $so->dateraised;
                                           // $newDate = date("y-m-d", strtotime($originalDate));
                                           // $id = $so->salesorder_id;
                                             /*  $id = substr(sprintf('%06d', $so->salesorder_id),0,6);
											   
											   
											   $this->db->where('sales_orders_rev', $so->salesorder_id);
                                                $query=$this->db->get('sales_orders');      
                                                 $num_rows = $query->num_rows();*/
                                            echo '<tr class="gradeX">';
										 	
											echo'  <td>SO-' . substr(sprintf('%06d', $so->salesorder_id),0,6) .' </td>';
												
											echo'<td>' . $so->Company_name . '</td>';
                                            echo'<td>PO-' . $so->po_number . '</td>';
                                            echo'<td>' . $so->rf_dateraised . '</td>';
                                            echo'<td>' . $so->currency . '</td>';
											echo'<td>£' . $so->rf_amount . '</td>';
										
											 
											  
											echo'<td>£' . $so->rf_total . '</td>';
                                            

                                            echo'<td>Credit Note</td>';
                                        

                                           

                                            echo'<td><div class="btn-group dropdown">
											        	 <button class="btn btn-info">Action</button>
											            <button class="btn btn-pink dropdown-toggle" data-toggle="dropdown">
											            <span class="caret"></span>
											         </button>
											         <ul class="dropdown-menu context">
											          	
                                                                     
                                                    
												<li>
											    <a target="_blank" class="btn btn-default" href="' . $base_url . 'index.php/salesorders/view_refund/' . $so->salesorder_id . '">View SO</a>
                                                </li>
												<li class="divider"></li>
												
										
											
												<li>
                                                    <a class="btn btn-default confirmation" href="' . base_url() . 'index.php/salesorders/deletecn/' . $so->rf_id . '" > Delete Credit Note</a>
											    </li>
											             </ul>
											        </div>
											    </td>';
											
                          
												//PDF
												echo'<td>
                                                        <div>        
															<form>                        
											                    <a href="'.  base_url().'index.php/salesorders/cn_pdf/'. $so->rf_id .'"><span class="fa fa-file fa-lg"></span></a>
											
                                                            </form>
											            </div>
                                                    </td>';
													
                    
                                                echo '</form>
												</tr>';
                                                
                                                
                                           
                                            
                                            
                                         
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


      
    </div><!-- /.modal -->

<!-- /.shipped --begin---->
<div class="modal fade col-md-10"  style="overflow:hidden;" id="box-blankcn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"> Blank Credit Note</h4>
            </div>
            <div class="modal-body">
			
			      <div class="row">
                        <div class="col-md-12">
                            <div class="box border green">
                                <div class="box-title">
                                    <h4><i class="fa fa-bars"></i>Add Information</h4>
                                </div>
                                <div class="box-body big">
								        
                                         <?php echo form_open('salesorders/add_blankcn'); ?>
                                              
				                        <table id="datatable" cellpadding="0" cellspacing="0" border="0" class="hours-table datatable table table-striped table-bordered table-hover red">
                                       

										<thead>
                                                <tr>
                                                   <!--- <th>SO item id</th>--->
                                                    <th>SO#</th>
													<th>item Code</th>
                                                    <th>Description</th>
                                                    <th></th>
                                                   
													<th>Credit Note Amount </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                              /*  $base_url = base_url();
										       
											   $this->db->select('*');
                                                    $this->db->where('sales_id',$so_id);
                                                    $this->db->from('sales_orders_items');
                                                    $bk_item=$this->db->get(); 
												
                                                    
                                                foreach ($bk_item->result() as $bk) {
                                                     
												*/	 
													 
													 
													 
													 
													
													
													    echo '<tr class="sum gradeX">';
                                                  echo '	 <td><input type="text" name="sales_id" size="10"  required="required"/></td>';
                                                      
                                                            
														echo '	 <td><input type="text" size="15"  name="CCL_Item" /></td>';
                                                            echo'<td><input type="text" size="50" name="Description" /></td>';
                                                             
                                                            echo'<td></td>';
															
                                                            echo'<td>
                                                            
                                                            <input type="text" class="20" name="itemlinetotal"/></td>';
                                                           
                                                        echo '</tr>';
                                                       
													
												
									
                                                ?>
											

												

                                            </tbody>

                                        </table>
										<button type="submit" class="btn btn-primary pull-right">Add</button>
                                            
			                        </div>
			                             <div class="modal-footer">
                                                 <?php echo form_close(); ?>

  <button type="button" class="btn btn-default   pull-right" data-dismiss="modal">Cancel</button>
                                      
                                         </div>
										 
                             </div>
                         </div>  
                    </div> 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<!-- /.shipped --end---->





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


    jQuery(document).ready(function() {
        App.setPage("dynamic_table");  //Set current page      20141209
	    //App.setPage("jqgrid_plugin");
		App.setPage("order_refund"); 
        App.init(); //Initialise plugins and elements
    });

    $(document).ready(function() {
        $('#datatable3').dataTable();
       // $('#datepicker').datepicker({minDate: -1, maxDate: "+1"});
	   $('#datepicker').datepicker({minDate: -1, maxDate: "+1"});
	    $('#datepickerFrom').datepicker();
		 $('#datepickerTo').datepicker();//select date   viola 20150326
  
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
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure to remove it?');
    });
	 $('.confir_return').on('click', function () {
        return confirm('Are you sure to return it?');
    });
	 $('.confir_cancel').on('click', function () {
        return confirm('Are you sure to cancel it?');
    });
</script>


<!-- /JAVASCRIPTS -->

</body>
</html>
