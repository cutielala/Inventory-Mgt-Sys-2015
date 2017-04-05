
<html>
    <head>

        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/pdfcss/css/bootstrap.css" />

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/pdfcss/js/bootstrap.js"></script>
        <link href="<?php echo base_url(); ?>/assets/pdfcss/css/blue.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    </head>


    <body>
    <!--<img src="http://localhost/zen/assets/img/.png" alt="" style="float: right; position: absolute; top:0; right: 0;"/>-->
        <div id="wrap">
            <?php foreach ($cn->result() as $details): ?>

            <?php endforeach; ?>
                <div class="row-fluid">    
                    <div class="span6">
				        <div class="span12"> 
			        <img src="<?php echo base_url(); ?>/assets/images/logo-pdf.jpg" alt="" width="270px" />
                        </div>
					   <div class="span12">  
                    <span  style="font-family: arial,helvetica,sans-serif;">Zenith International Ltd<br> T/A Crown Catering Sales and Hire<br>
                        Unit C10<br>
                        Hortonwood 10<br>
                        Telford<br>
                        Shropshire<br>
                        TF1 7ES<br>
                        Co Reg: 3708505<br> 
						V.A.T Reg: 7209 933 28<br><br>
                        TEL: <span class="wt">0844 247 5490</span><br>
                        EMAIL: sales@crown-professional.co.uk</span>

                        </div>
			        </div>
				    <div class="span6"    style="text-align:right">    	
                        <h3 class="inv">Credit Note</h3>
					<br><br> <p style="font-weight:bold;">Credit Note#:<?php echo substr(sprintf('%06d', $details->rf_id),0,6); ?></p>
                   
                  
                    </br></br>
                    <p style="font-weight:bold;">SO No. <?php echo substr(sprintf('%06d', $details->salesorder_id),0,6); ?></p>

                    <p style="font-weight:bold;">Date Raised: <?php
                        $originalDate = $details->dateraised;
                       // $newDate = date("d-m-Y", strtotime($originalDate));
					   $datestring = " %Y-%m-%d";
        $time = time();
		
		

        $dateraised = mdate($datestring, $time);
					   $newDate = date("d-m-Y", strtotime( $dateraised ));
                        echo $newDate;
                        ?></p>
						
						
                    <p>&nbsp;</p>
					   
                    </div>
                </div> 
        
               

               
            
            
			<div class="row-fluid">    
                <div class="span6">

                    <h4>Billing Address
                    </h4><strong>
                    <?php $ship= $this->db->where('salesorder_id', $details->salesorder_id)
					                ->get('sales_orders');
					foreach ($ship->result() as $s) 
		            { // loop over results
					}
					echo $s->Company_name; ?> </strong> <br /><?php echo $s->Address_1; ?>,<br /><?php echo $s->Address_2; ?>
                    <br /><?php echo $s->Town_city; ?><br /><?php echo $s->Postcode; ?><br /> TEL:<?php echo $s->Buyer_Phone_Numbe; ?><p></p>    
                    
				
				</div>

                <div class="span6">
                    <h4>Shipping Detail
                    </h4>
                    <?php 
					
					
					
					echo '<strong>'.$s->ShipToCompanyName.'</strong>'; ?> <br />Address:<?php echo $s->ship_Address_1; ?>,<br /><?php if($s->ship_Address_2!='--') {echo $s->ship_Address_2; }?>
                    <br /><?php echo $s->ship_County; ?><br /><?php echo $s->ship_Postcode; ?><br /> TEL:<?php echo $s->Shipping_Contact_No; ?><p></p>    
              
                </div> 
            </div>
			
            

            <table class="table table-bordered table-hover table-striped" style="margin-bottom: 5px;">

                <thead> 

                    <tr> 
                        
                        <th style="text-align:center; vertical-align:middle;">Item Code.</th> 
                        <th style="vertical-align:middle;">Description</th> 

<!--<th style="text-align:center; vertical-align:middle;">Tax</th>-->

                        <th style="text-align:center; vertical-align:middle;">QTY</th>
                         <th style="text-align:center; vertical-align:middle;"></th>	<th style="padding-right:20px; text-align:center; vertical-align:middle;"></th>	<th style="padding-right:20px; text-align:center; vertical-align:middle;">Subtotal</th> 
                    </tr> 

                </thead> 

                <tbody> 


                    <?php
                   foreach ($cn_items->result() as $table) {
                        echo "<tr>
					
					
            	<td style=\"text-align:center; width:100px; vertical-align:middle;\">$table->CCL_Item</td>
                <td style=\"vertical-align:middle;\">$table->Description<div><p>

</p></div></td>
                
                <td style=\"width: 70px; text-align:center; vertical-align:middle;\">$table->item_qty</td>
                 
                   <td style=\"width: 70px; text-align:center; vertical-align:middle;\"></td>
                <td style=\"width: 70px; text-align:center; vertical-align:middle;\"></td>                      
                <td style=\"width: 100px; text-align:right; padding-right:10px; vertical-align:middle;\">$table->itemlinetotal</td> 
		

</tr>";
				   }
                /*    
                echo "
				<tr><td style=\"text-align:center; width:100px; vertical-align:middle;\">MIS</td>
                <td style=\"vertical-align:middle;\">DEMAGED GOODS<div><p>

</p></div></td>
                
                <td style=\"width: 70px; text-align:center; vertical-align:middle;\"></td>
                 
                   <td style=\"width: 70px; text-align:center; vertical-align:middle;\"></td>
                <td style=\"width: 70px; text-align:center; vertical-align:middle;\"></td>                      
                <td style=\"width: 100px; text-align:right; padding-right:10px; vertical-align:middle;\">36.28</td></tr>"; 

*/






                    
					   
     
					
					
					
					
					
					?>


                    <?php foreach ($cn->result() as $value): ?>

                    <?php endforeach; ?>


                    <tr><td colspan="5" style="text-align:right; padding-right:10px;;">Credit Note Total (GBP)</td>
                        <td style="text-align:right; padding-right:10px;"><?php echo $value->rf_amount; ?></td>
                   

  				    </tr><tr><td colspan="5" style="text-align:right; padding-right:10px;;">Shipping( Return )</td>
                        <td style="text-align:right; padding-right:10px;"><?php echo $value->rf_ship; ?></td></tr>
                 
                    <tr><td colspan="5" style="text-align:right; padding-right:10px; font-weight:bold;">Credit Note Total Amount (GBP)</td>
                        <td style="text-align:right; padding-right:10px; font-weight:bold;"><?php echo $value->rf_total; ?></td></tr>

                </tbody> 

            </table> 
            <div style="clear: both;"></div>
            <div class="row-fluid"> 
                <div class="span12">    	
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="row-fluid">
                <div class="span5"> 
                   
                </div>

                
            </div>

        </div>
    </body>
</html>