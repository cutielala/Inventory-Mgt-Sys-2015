<!-- UNIFORM -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/uniform/css/uniform.default.min.css" />



</head>
</body>

<?php echo Modules::run('template/menu'); ?>

<!-- PAGE -->
<section id="page">

    <div id="main-content">
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
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Back Orders</a>
                                    </li>
                                    <li>Orders</li>
                                </ul>
                                <!-- /BREADCRUMBS -->
                                <div class="clearfix">
                                    <h3 class="content-title pull-left">back Orders</h3>
                                </div>
                                <div class="description">Back Order Details</div>
                            </div>
                        </div>
                    </div>
                    <!-- /PAGE HEADER -->
                    <!-- ORDERS -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php foreach ($order_items->result() as $id) {
                                
                            }?>
                            <!-- BOX -->
                            <div class="box border purple">
                                <div class="box-title">
                                    <h4><i class="fa fa-list-ul"></i>Back Order Details for Sales Order -  <?php echo $id->sales_id; ?> rev- <?php echo $id->sales_orders_rev; ?></h4>
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
                                    <!-- ORDERS -->
                                    <div class="row">
                                      
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="pull-left">
                                                        <a href="<?php echo base_url(); ?>salesorders/backorders"><button class="btn btn-default">Cancel</button></a>
                                                        <form action="<?php echo base_url() ?>salesorders/backorders/back_to_so" method="post"><input type="hidden" value="<?php echo $id->sales_id; ?>"/><button type="submit" class="btn btn-default">Process</button></form>

                                                         </div>
                                                    <div class="pull-right hidden-xs">
                                                        
                                                    </div>
                                                   
                                                    <div class="clearfix"></div>
                                                    <hr>
                                                    <!-- TABLE -->
                                                    <table class='table table-hover'>
                                                        <thead>
                                                            <tr>

                                                                <th>Item Code</th>
                                                                <th>
                                                        <div class='text-center'>Description</div>
                                                        </th>

                                                        <th>
                                                        <div class='text-right'>qty</div>
                                                        </th>

                                                        <th>
                                                        <div class='text-right'>Price</div>
                                                        </th>

                                                        <th>
                                                        <div class='text-right'>Location </div>
                                                        </th>
                                                        <th>
                                                        <div class='text-right'>Line Price </div>
                                                        </th>
                                                        <th>
                                                        <div class='text-right'>Remove </div>
                                                        </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php ?>

                                                            <?php
                                                            foreach ($order_items->result() as $items) {

                                                                echo '<tr>
														 
														  <td>' . $items->CCL_Item . '</td>
														  <td>
															<div class="text-center">' . $items->Description . '</div>
														  </td>
                                                                                                                   <td>
															<div class="text-center">' . $items->item_qty . '</div>
														  </td>
                                                                                                                   <td>
															<div class="text-center">' . $items->ItemPrice . '</div>
														  </td>
                                                                                                                  
														   <td>
															<div class="text-center">' . $items->location . '</div>
														  </td>
                                                                                                                  <td>
															<div class="text-center">' . $items->itemlinetotal . '</div>
														  </td>
                                                                                                                   <td>
															<div class="text-center"><form method="POST" action="' . base_url() . 'salesorders/delete_item"><input type="hidden" name="itemID" value="' . $items->item_id . '"/><input type="hidden" name="soid" value="' . $items->sales_id . '"/><button type="submit" class="btn btn-danger">X</button></form></div>
														  </td>';

                                                                $backorder = $items->item_qty - $items->qty;
                                                                $new_qty = $items->item_qty - $backorder;
                                                                if ($items->qty < $items->item_qty) {
                                                                    echo'<td>
                                                                                                                        <form action="' . base_url() . 'backorders/add_items" method="POST">
                                                                                                                             <input type="hidden" name="item_id" value="' . $items->item_id . '"/>
                                                                                                                            <input type="hidden" name="sales_id" value="' . $items->sales_id . '"/>
                                                                                                                            <input type="hidden" name="CCL_Item" value="' . $items->CCL_Item . '"/>
                                                                                                                            <input type="hidden" name="Description" value="' . $items->Description . '"/>
                                                                                                                            <input type="hidden" name="item_qty" value="' . $backorder . '"/>
                                                                                                                            <input type="hidden" name="itemPrice" value="' . $items->ItemPrice . '"/>
                                                                                                                            <input type="hidden" name="new_so_qty" value="' . $new_qty . '"/>
                                                                                                                        <button type="submit" class="btn btn-warning"><i class="fa fa-cross"></i>Backorder' . $backorder . '</button>
                                                                                                                        </form>
                                                                                                                        </td>
                                                                                                                            </tr>';
                                                                } else {
                                                                    echo '<td><button class="btn btn-success"><i class="fa fa-check"></i>Stocks ok</button></td>';
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <!-- /TABLE -->
                                                    <div class="text-right">
                                                        <h3></h3>
                                                    </div>
                                                    <hr>
                                                    <!-- CUSTOMER DETAILS -->
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <h4>
                                                                <i class="fa fa-money"></i>

                                                                &pound; <?php print_r($total); ?>
                                                            </h4>

                                                            <h4><strong>Total</strong></h4>
                                                            <h4><strong> <?php
                                                                    /*

                                                                      Usage:

                                                                      You want to calculate 17.5% VAT on a price of £4.67

                                                                      $price_without_vat = 4.67

                                                                      echo vat($price_without_vat);

                                                                      This would return the new amount with 17.5% added, and would be rounded to 2 decimal places

                                                                     */
                                                                    foreach ($vat_rate->result() as $vat_rate) {
                                                                        
                                                                    }


                                                                    $vat = $vat_rate->vat_rate; // define what % vat is 
                                                                    $vat_amount = $vat * ($total / 100);
                                                                    $price = $total + ($vat * ($total / 100)); // work out the amount of vat 

                                                                    $price_with_vat = round($price, 2); // round to 2 decimal places 
                                                                    echo'£  ';
                                                                    echo $total;
                                                                    echo ' ex vat ';
                                                                    echo '<hr>';


                                                                    echo'£  ';
                                                                    echo $vat_amount;
                                                                    echo '  vat ';

                                                                    echo '<hr>';
                                                                    echo '£  ';
                                                                    echo $price_with_vat;
                                                                    echo '  inc vat';
                                                                    ?>
                                                                </strong></h4><br>
                                                        </div>
                                                        <div class="col-sm-7 col-sm-offset-1">
                                                            <h4>
                                                                <i class="fa fa-envelope"></i>
<?php ?>
                                                            </h4>
                                                            <div class="well">	

                                                                <h5><strong>Shipping Address </strong></h5>
                                                                <?php
                                                                foreach ($addresses->result() as $address) {
                                                                    
                                                                }
                                                                ?> 
                                                                <h5><strong>
                                                                       

                                                                        </div>
                                                                        </div>
                                                                        </div>
                                                                        <!-- PAYMENT STATUS -->
                                                                        <hr> 
                                                                        <?php
                                                                        echo form_open('salesorders/save');
                                                                        echo form_hidden('sales_id', $this->uri->segment(3));
                                                                        echo form_hidden('total', $total);
                                                                        echo form_hidden('inc_vat', $price_with_vat);
                                                                        echo form_hidden('vat_rate', $vat);
                                                                        echo form_hidden('vat_amount', $vat_amount);
                                                                        ?>
                                                                        <button ytpe="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
<? echo form_close();
?>
                                                                        </div>
                                                                        <!-- /PANEL BODY --> 

                                                                        </div>
                                                                        </div>
                                                                        <!-- /ORDER DETAILS -->
                                                                        </div>
                                                                        <!-- ORDERS -->
                                                                        </div>
                                                                        </div>
                                                                        <!-- /BOX -->
                                                                        </div>
                                                                        </div>
                                                                        <!-- /ORDERS -->
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

                                                                        <script src="http://malsup.github.com/jquery.form.js"></script> 


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


                                                                        </script>



                                                                        <!-- /JAVASCRIPTS -->

<?php echo Modules::run('template/footer'); ?>	        