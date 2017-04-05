<!-- DATA TABLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />


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
                                    <a href="<?php echo base_url(); ?>index.php/warehouse">Warehouse</a>
                                </li>
                                <li>
                                    Low Stock
                                </li>
                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left">Low Stock</h3>
                            </div>
                            <div class="description">All low stock items</div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->


               
                <!-- DATA TABLES -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BOX -->
                        <div class="box border purple">
                            <div class="box-title">
                                <h4><i class="fa fa-paste"></i>Item List</h4>
                                <div class="tools hidden-xs">

                                    <a href="javascript:;" class="collapse">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>

                                </div>
                            </div>
                            <div class="box-body">
                                <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover red">
                                    <thead>
                                        <tr>

                                            <th>Item Code</th>
											<th>Vendor</th>
                                            <th>Description</th>
                                            <th>Qty Available</th>
                                            <th>Price</th>

                                            <th width="15%"> Edit </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $base_url = base_url();
                                        foreach ($low->result() as $items) {



                                            echo '<tr class="gradeX">';

                                            echo'<td><strong>' . $items->CCL_Item . '</strong></td>';
                                            echo'<td><strong>' . $items->vendors_name . '</strong></td>';



                                            echo'<td><strong>' . $items->Description . '</strong></td>';
                                            echo'<td><strong>' . $items->qty . '</strong></td>';
                                            echo'<td><strong>' . $items->sell_price . '</strong></td>';
                                            //echo'<td><strong>'.$items->location.'</strong></td>';

                                            echo'<td><div class="btn-group dropdown" >
											<button class="btn btn-pink">Action</button>
											            <button class="btn btn-purple dropdown-toggle" data-toggle="dropdown">
											                <span class="caret"></span>
											            </button>
											<ul class="dropdown-menu">
											<li>
											<a href="' . $base_url . 'index.php/warehouse/view/' . $items->id . '">View / Edit</a>
											</li>
											
											<li>
											
											</li>
											<li class="divider"></li>
											<li>
											<a href="' . $base_url . 'index.php/warehouse/delete/' . $items->id . '">Delete</a>
											</li>
                                                                                        <li class="divider"></li>
                                                                                        
											</ul>
											</div></td>';

                                            echo '</tr>';
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
<!-- CUSTOM SCRIPT -->

<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script>
       jQuery(document).ready(function() {
           App.setPage("customers");  //Set current page
           App.init(); //Initialise plugins and elements
       });


       $(document).ready(function() {
           $('#datatable1').dataTable();

       });

       $(document).ready(function() {
           $('#datatable').dataTable();
       });

       $(document).on("click", ".open-AddBookDialog", function() {
           var myBookId = $(this).data('id');
           var myLocation = $(this).data('location');
           var myQty = $(this).data('qty');
           var myItemId = $(this).data('myitemid');


           $(".modal-body #bookId").val(myBookId);
           $(".modal-body #qty").val(myQty);
           $(".modal-body #location").val(myLocation);
           $(".modal-body #myitemid").val(myItemId);


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

                    if (value1 < value2) {

                        alert('this would leave a negative value and move will be void');
                        return false;
                    }

                });
            });
</script> 
<!-- /JAVASCRIPTS -->
<?php echo Modules::run('template/footer'); ?>	