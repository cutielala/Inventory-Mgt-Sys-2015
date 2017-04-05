<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */ foreach ($invoice_info->result() as $info) {
    
}
?>



</head>
</body>
 <?phpecho Modules::run('template/dash_head');?>
<?php echo Modules::run('template/menu'); ?>
<!-- PAGE -->
<section id="page">
 <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="UNPAID" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Has this invoice been Paid? </h4>
                </div>
                <div class="modal-body">
                   
                    <form id="packing"  action="<?php echo base_url();?>invoices/payments" method="post">
                                                                                       
                    
        <input type="hidden" name="invoiceid" readonly="readonly" id="" value="<?php echo $this->uri->segment(3); ?>"/>
         <select name="payment" id="e1" class="col-md-6 form-control" required="required" >
                           
             <option value="PART PAID">PART PAID</option>
             <option value="paid">PAID</option>
         </select><br>
        
        <input type="text" class="form-control" name="amount" id="amount_paid" value=""/><br>
          <select name="method" id="e1" class="col-md-6 form-control" required="required" >
             <option>--Please Select --</option>
              <option>CASH</option>
             <option>Credit/Debit card</option>
             <option>BACS</option>
             <option>CHEQUE</option>
             <option>PAYPAL</option>
             <option>MONEY BOOKERS</option>
             
         </select>
        <?php 
        $datestring = " %Y-%m-%d";
$time = time();

$dateraised =  mdate($datestring, $time);
        ?>
         <input type="hidden" name="date"  value="<?php echo $dateraised; ?>" class="form-control"/>
        	
           
                    
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Payment</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
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
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        
                                    </li>
                                    <li>Invoice</li>
                                </ul>
                                <!-- /BREADCRUMBS -->
                                <div class="clearfix">
                                    <h3 class="content-title pull-left">Invoice</h3>
                                </div>
                                <div class="description">Payment and Invoice</div>
                            </div>
                        </div>
                    </div>
                    <!-- /PAGE HEADER -->
                    <!-- INVOICE -->
                    <div id="printableArea" class="row">
                        <div class="col-md-12">
                            <!-- BOX -->
                            <div class="box">
                                <div class="box-title">
                                    <h4><i class="fa fa-shopping-cart"></i>Invoice</h4>
                                   
                                </div>
                                <div class="box-body">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class='row'>
                                                <div class='col-md-11'>
                                                    <div class="invoice-header clearfix">
                                                        <h3 class='pull-left'>
                                                            <i class='fa fa-money'></i>
                                                            <span>Invoice</span>
                                                            <span class='text-muted'>#<?php echo $info->invoice_id; ?></span>
                                                        </h3>
                                                        <div class='pull-right'>
                                                            <div class='btn-group'>
                                                                <a href="<?php echo base_url();?>invoices/pdf/<?php echo $this->uri->segment(3);?>"><span class="fa fa-5x fa-file"></span></a>
                                                                                       
                                                                <?php 
                                                                foreach ($invoice_info->result() as $payment) {


                                                                }
                                                                if($payment->status === 'paid' ){
                                                                echo '<a class="btn btn-success" href="#"><i class="fa fa-check"></i>
                                                                    Paid
                                                                </a>';}
																  if($payment->status === 'PART PAID' ){
                                                                echo '<a class="btn btn-success" href="#"><i class="fa fa-check"></i>
                                                                    Part Paid
                                                                </a>';}
                                                                else{
                                                                    echo '<a class="btn btn-warning pop-hover" data-title="UNPAID " data-content="Click to Make Payment" data-original-title="" title=""="#" data-toggle="modal" data-target="#UNPAID"><i class="fa fa-cross"></i>
                                                                    UNPAID
                                                                </a>';
                                                                }
                                                                        ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class='row'>
                                                <div class='col-sm-4 seller'>
                                                    <div class='invoice-title'>Billing Address </div>
                                                    <i class='fa fa-truck'></i>
													
                                                    <address>
                                                        
                                                            <?php
                                                                if ($info->Address_1 == TRUE) {
                                                                   
                                                                      echo'<br>';
                                                                    echo '<strong>'.$info->Company_name.'</strong>';
                                                                    echo'<br>';
                                                                    echo $info->Address_1;
                                                                    echo'<br>';
                                                                    echo $info->Address_2;
                                                                    echo'<br>';
                                                                    echo $info->Town_city;
                                                                    echo'<br>';
                                                                    echo $info->Postcode;
                                                                    echo'<br></strong></h5>';
                                                                    }
                                                                else {
                                                                    echo'<br>';
                                                                    echo 'no address';
                                                                }
                                                                ?>
                                                        <small> <?php echo $info->Buyer_Phone_Numbe;     ?> </small>
                                                    </address>
                                                </div>
                                               
                                                <?php 
                                                if( $info->is_ce === '1'){
                                                  echo '<div class="col-sm-4 buyer">
                                                    <div class="invoice-title"></div>
                                                    
                                                    <address>
                                                        
                                                    </address>
                                                </div>';
                                                  
                                                  
                                                }
 else {
     
 
                                                    echo ' <div class="col-sm-4 buyer">
                                                    <div class="invoice-title">Return Address</div>
                                                    
                                                    <address>
                                                       <span style="font-family: arial,helvetica,sans-serif;">Zenith International Ltd<br> T/A Crown Catering Sales and Hire<br>
                        Unit C10<br>
                        Hortonwood 10<br>
                        Telford<br>
                        Shropshire<br>
                        TF1 7ES<br>
                        <br>
                        TEL: <span class="wt">0844 247 5490</span><br>
                        EMAIL: sales@crown-professional.co.uk</span>
                                                    </address>
                                                </div>';
                                                       } ?>
                                                <div class='col-sm-4 payment-info'>
                                                    <div class='invoice-title text-muted'>Payment Details</div>
                                                    <div class="well">
                                                        <strong>Invoice date: </strong>  <?php
                                                        
                                                        $originalDate =$info->dateraised;
                                                        $newDate = date("d-m-Y", strtotime($originalDate));
                                                        echo $newDate;     ?> 
                                                        <br>
                                                        <strong>Billing Date: </strong>  <?php echo $newDate;     ?> 
                                                        <br>
                                                        <strong>Bank Account: 53660420</strong> 

														<br>
                                                        <strong>Sort-Code: 60-21-57 </strong> 
                                                        <br>
                                                        <strong>V.A.T Reg: </strong> 37464-FDRE-AHF65
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- COST TABLE -->
                                        <table class="table table-striped table-hover font-400 font-14">
                                            <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Item/ Description</th>
                                                    <th>
                                            <div class='text-center'>Qty</div>
                                            </th>
                                            <th>
                                            <div class='text-right hidden-xs'>Unit Cost</div>
                                            </th>
                                            <th>
                                            <div class='text-right'>Total Price</div>
                                            </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */ 
                                                foreach ($invoice_info->result() as $info) {
    
                                                        
                                                    echo '<tr>
                                                    <td>'.$info->CCL_Item.'</td>
                                                    <td>'.$info->Description.'</td>
                                                    <td>
                                                        <div class="text-center">'.$info->item_qty.'</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-right hidden-xs"><i class="fa fa-gbp"></i> <strong>'.$info->ItemPrice.'</strong></div>
                                                    </td>
                                                    <td>
                                                        <div class="text-right"><i class="fa fa-gbp"></i> <strong>'.$info->itemlinetotal.'</strong></div>
                                                    </td>
                                                </tr>'; 
                                                    
                                                    
                                                    }
                                                    
                                                    ?>
                                                <tr>
                                                    <td></td>
                                                    <td>Shipping </td>
                                                    <td></td>
                                                     
                                                      <td></td>
                                                      <td><b><div class="text-right"><?php echo $info->shipping_cost; ?></div></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- /COST TABLE -->
                                        <!-- FOOTER -->
                                        <hr>
                                        <div class="panel-body">
                                            <div class='row'>
                                                <div class='col-sm-12'>
                                                    <div class='text-right font-400 font-14'>
                                                         <p><h4 class="amount">Subtotal : <i class="fa fa-gbp"></i> <?php echo $info->Grand_total; ?></h4></p><br>
                                                         <p><h4 class="amount">Shipping/Fraight : <i class="fa fa-gbp"></i> <?php echo $info->shipping_cost; ?></h4></p><br>
                                                      
                                                         <p><h4 class="amount">VAT: <i class="fa fa-gbp"></i> <?php echo $info->VAT_ammount; ?></h4>    </p><br>

                                                         <p><h4 class="amount">Total: <i class="fa fa-gbp"></i> <?php $total_amount=$info->VAT_ammount+$info->shipping_cost+$info->Subtotal_total;
                                                                                                    					echo 	$total_amount;	?></h4>  </p> <br>
                                                       <br/>
													   <?php  $payment=$this->db->where('invoice_id', $info->invoice_id)
                                                                              ->get('payments'); 
																$paid=0;	
																$paid+=$paid;		  
																 foreach ($payment->result() as $paid_amount) {	
																 $paid=$paid_amount->amount;
																 
																 //$amount+=$amount;
																 } 
																 ?>
                                                         <p><h4 class="amount">Paid: <i class="fa fa-gbp"></i> <?php echo $paid;//$info->inc_vat; ?></h4>  </p> <br>
                                                        </br>
                                                         <p><h4 class="amount">Balance: <i class="fa fa-gbp"></i> <?php echo $total_amount-$paid;?>
														                                                          <?php  //echo        $info->inc_vat; ?></h4>  </p> <br>
                                                   
                                                    </div>
                                                        <!-- Button trigger modal -->
<button class="btn btn-default pull-right btn-lg" data-toggle="modal" data-target="#mypayment">
  See Payments made
</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /FOOTER -->
                                        <hr>
                                        <div class="divide-100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /BOX -->
                        </div>
                    </div>
                    <!-- /INVOICE -->
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

<!-- Modal -->
<div class="modal fade" id="mypayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Payment Details</h4>
      </div>
      <div class="modal-body">
    <?php 
    $payment_id = $info->invoice_id;
    echo Modules::run('invoices/payments_made',$payment_id);?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>





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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
<!-- BLOCK UI -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
<!-- COOKIE -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
<!-- CUSTOM SCRIPT -->
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script>
                                                                                                      jQuery(document).ready(function() {
                                                                                                          App.setPage("widgets_box");  //Set current page
                                                                                                          App.init(); //Initialise plugins and elements
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
<!-- /JAVASCRIPTS -->