<!-- PAGE -->
<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
<head>
<style>
@media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }
}
</style>
	<style>
		*
		{
			margin:0;
			padding:0;
			font-family:Arial;
			font-size:10pt;
			color:#000;
		}
		body
		{
			width:100%;
			font-family:Arial;
			font-size:10pt;
			margin:0;
			padding:0;
		}

		p
		{
			margin:0;
			padding:0;
		}

		#wrapper
		{
			width:170mm;
			margin:0 15mm;
                        height: 1020px;
		}

		.page
		{
		
		}

		table
		{
			border-left: 1px solid #ccc;
			border-top: 1px solid #ccc;

			border-spacing:0;
			border-collapse: collapse;

		}

		table td
		{
			border-right: 1px solid #ccc;
			border-bottom: 1px solid #ccc;
			padding: 2mm;
		}

		table.heading
		{
			height:50mm;
			color:white;
		}

		
		hr
		{
			color:#ccc;
			background:#ccc;
		}

		#invoice_body
		{

		}

		#invoice_body , #invoice_total
		{
			width:100%;
			height:50mm;
		}
		#invoice_body table , #invoice_total table
		{
			width:100%;
			border-left: 1px solid #ccc;
			border-top: 1px solid #ccc;

			border-spacing:0;
			border-collapse: collapse;

			margin-top:5mm;
		}

		#invoice_body table td , #invoice_total table td
		{
			text-align:center;
			font-size:9pt;
			border-right: 1px solid #ccc;
			border-bottom: 1px solid #ccc;
			padding:2mm 0;
		}

		#invoice_body table td.mono  , #invoice_total table td.mono
		{
			font-family:monospace;
			text-align:right;
			padding-right:3mm;
			font-size:10pt;
		}
	#footer
		{
			width:180mm;
			margin:0 mm;
			padding-bottom:5mm;
		}
		#footer table
		{
			width:100%;
			border-left: 1px solid #ccc;
			border-top: 1px solid #ccc;

			background:#eee;

			border-spacing:0;
			border-collapse: collapse;
		}
		#footer table td
		{
			width:25%;
			text-align:center;
			font-size:9pt;
			border-right: 1px solid #ccc;
			border-bottom: 1px solid #ccc;
		}
	</style>
</head>


    <body>
    <!--<img src="http://localhost/zen/assets/img/.png" alt="" style="float: right; position: absolute; top:0; right: 0;"/>-->
        <div id="wrapper">
            <?php foreach ($invoice_info->result() as $details): ?>

            <?php endforeach; ?>
            <img src="<?php echo base_url(); ?>/assets/images/logo-pdf.jpg" alt="" width="270px" />
            <div class="row-fluid"> 
                <div class="span6">    	
                    <h3 class="inv">SO No. <?php echo substr(sprintf('%06d', $details->salesorder_id),0,6); ?></h3>
                </div>
                <div class="span6">

                    <p style="font-weight:bold;"></p>

                    <p style="font-weight:bold;">Date Raised: <?php
                        $originalDate = $details->dateraised;
                        $newDate = date("d-m-Y", strtotime($originalDate));
                        echo $newDate;
                        ?></p>
                    <p>&nbsp;</p>    
                </div>
                <div style="clear: both;"></div>	
            </div>
			<div >  

                 <table class="heading" style="width:100%; ">
    	            <tr>
    		            <td style="width:80mm;">
			
                            <div class="span6">

                                <h4>Billing Address
                                     </h4><strong>
                                     <?php echo $details->Company_name; ?> </strong> <br /><?php echo $details->Address_1; ?>,<br /><?php echo $details->Address_2; ?>
                                     <br /><?php echo $details->Town_city; ?><br /><?php echo $details->Postcode; ?><br /> TEL:<?php echo $details->Buyer_Phone_Numbe; ?><p></p>    
                                <br /><h4>Shipping Detail
                                </h4>
                                     <?php 
					                    $ship= $this->db->where('salesorder_id', $details->salesorder_id)
					                                    ->get('sales_orders');
					                    foreach ($ship->result() as $s) 
		                                { // loop over results
					                        }
					
					
					                     echo '<strong>'.$s->ShipToCompanyName.'</strong>'; ?> <br />Address:<?php echo $s->ship_Address_1; ?>,<br /><?php if($s->ship_Address_2!='--') {echo $s->ship_Address_2; }?>
                                         <br /><?php echo $s->ship_County; ?><br /><?php echo $s->ship_Postcode; ?><br /> TEL:<?php echo $s->Shipping_Contact_No; ?><p></p>    
              
				
				            </div>
                         </td>
                <td style="width:80mm;">
				    <div style="span6; " >
                    <span style="font-family: arial,helvetica,sans-serif;">Zenith International Ltd<br> T/A Crown Catering Sales and Hire<br>
                        Unit C10<br>
                        Hortonwood 10<br>
                        Telford<br>
                        Shropshire<br>
                        TF1 7ES<br>
                        <br>
                        TEL: <span class="wt">0844 247 5490</span><br>
                        EMAIL: sales@crown-professional.co.uk</span><br>
						Co.Reg No 3708505<br>
                        V.A.T Reg 720993328
					</div>
				</td>	
                     </tr>
				
				 
				</table>
            </div>
            <div style="clear: both;"></div>
            <p>&nbsp;</p>
            
<div id="invoice_body">
            <table class="table table-bordered table-hover table-striped" style="margin-bottom: 5px;">

                <thead> 

                    <tr> 
                        <td style="text-align:center; vertical-align:middle;">PO</td> 
                        <td style="text-align:center; vertical-align:middle;">Item Code.</td> 
                        <td style="vertical-align:middle;">Description</td> 

<!--<th style="text-align:center; vertical-align:middle;">Tax</th>-->

                        <td style="text-align:center; vertical-align:middle;">Quantity</td>
                        <td style="padding-right:20px; text-align:center; vertical-align:middle;">Unit Price</td> 
                        <td style="text-align:center; vertical-align:middle;"></td>
<!---						
						<th style="padding-right:20px; text-align:center; vertical-align:middle;"></th>

--->						
						<td style="padding-right:20px; text-align:center; vertical-align:middle;">Subtotal</td> 
                    </tr> 

                </thead> 

                <tbody> 


                    <?php
                    foreach ($invoice_info->result() as $table) {
                        echo "<tr>
            	<td style=\"text-align:center; width:40px; vertical-align:middle;\">$table->po_number</td>
				<td style=\"vertical-align:middle;\">$table->CCL_Item<div><p></p></div></td>
                <td style=\"vertical-align:middle;\">$table->Description<div><p></p></div></td>
                
                <td style=\"width: 70px; text-align:center; vertical-align:middle;\">$table->item_qty</td>
                <td style=\"width: 80px; text-align:right; padding-right:10px; vertical-align:middle;\">$table->ItemPrice</td>
                
                   <td style=\"width: 70px; text-align:center; vertical-align:middle;\"></td>";
                //<td style=\"width: 70px; text-align:center; vertical-align:middle;\"></td>                      
                echo "<td style=\"width: 100px; text-align:right; padding-right:10px; vertical-align:middle;\">$table->itemlinetotal</td> 
		

</tr>";
                    }
                    ?>


                    <?php foreach ($invoice_info->result() as $value): ?>

                    <?php endforeach; ?>


                    <tr><td colspan="6" style="text-align:right; padding-right:10px;;">Total (GBP)</td>
                        <td style="text-align:right; padding-right:10px;"><?php echo $value->Grand_total; ?></td>
                    </tr><tr><td colspan="6" style="text-align:right; padding-right:10px;;">Shipping</td>
                        <td style="text-align:right; padding-right:10px;"><?php echo $value->shipping_cost; ?></td></tr>
                    <tr><td colspan="6" style="text-align:right; padding-right:10px;;"> VAT (GBP)</td>
                        <td style="text-align:right; padding-right:10px;"><?php echo $value->VAT_ammount; ?></td></tr>
                    <tr><td colspan="6" style="text-align:right; padding-right:10px; font-weight:bold;">Total Amount (GBP)</td>
                        <td style="text-align:right; padding-right:10px; font-weight:bold;"><?php echo $value->Grand_total+$value->shipping_cost+$value->VAT_ammount; ?></td></tr>

                </tbody> 

            </table> 
			 </div>
            <div style="clear: both;"></div>
            <div class="row-fluid"> 
                <div class="span12">    	
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="row-fluid">
                <div class="span5"> 
                   
                </div>

                <div class="span5 offset2"> 
               
                </div>
            </div>

        </div>
<div class="footer">
	
     <p style="text-align:center; font-weight:bold; ">zenith international Trading Ltd Bank Details: Sort Code 60-21-57 Account number: 53660420 </p>
    </div>
 </body>
</html>