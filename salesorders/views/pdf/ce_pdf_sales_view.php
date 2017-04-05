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
			width:180mm;
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
 <?php foreach ($orders->result() as $details) {

     }?><body >

	<div id="wrapper">
    <br><br><br>
    <table class="heading" style="width:100%; ">
    	<tr>
    		<td style="width:80mm;"><div class="span6">

                    <h3>
                    </h3>
					<?php if($details->Company_id==='14'){?>
					<?php echo $details->Address_1.',C E Distributors'; ?>
						<br /><?php echo $details->Address_2.',Yate'; ?>
                        <br /><?php echo 'Bristol'; ?>
						<br /> 
					    <br /><?php echo $details->Postcode; ?>
					    <br />email:sales@cedistributors.co.uk<p></p> 
						

					
					<?php }else{ ?>
					
						
                    <?php echo $details->Company_name; ?> <br /><?php echo $details->Address_1; ?>,<br /><?php echo $details->Address_2; ?>
                    <br /><?php echo $details->County; ?><br /> <?php echo $details->Country; ?>
					<br /><?php echo $details->Postcode; ?>
					<br /><?php echo $details->Buyer_Phone_Numbe; ?><p></p> 
					<?php }?>	
									
                </div>
			</td>
			
			<?php foreach ($orders->result() as $info) {
			                                echo'<td  ><table><tr><td>SO: </td>';
			
			                                   $id = substr(sprintf('%04d', $info->salesorder_id),0,4);
											   
											   
											   $this->db->where('sales_orders_rev', $info->salesorder_id);
                                                $query_so=$this->db->get('sales_orders');      
                                                 $num_rows = $query_so->num_rows();
			                                if ($info->backorder === 'YES') //if split order

											{   
											
											    if ($info->sales_orders_rev_num===null) //if first of split order
												{
												    echo'  <td><strong>' . $id . '</strong></td>';
												}
												else{
                                                    echo'  <td><strong>' . substr(sprintf('%04d',$info->sales_orders_rev),0,4) . '-'. $info->sales_orders_rev_num.' </strong></td>';
                                               //echo'  <td><strong>SO-' . $so->sales_orders_rev . '-'. $i++.' </strong></td>';
												}
											   } 
											else 
											{  
											    if (($info->sales_orders_rev_num==='1')&&($num_rows>'1')) //if first of split order
												{
												    echo'  <td><strong>' . $id . '-'. $info->sales_orders_rev_num.' </strong></td>';
												}
												else
	                                                echo'<td><strong>' . $id . '</strong></td>';
                                            } echo'</tr>';
 echo'<tr><td>PO: </td><td>'.$info->po_number. '</td></tr> ';
 echo'<td style="width:10mm;">Order Date: </td><td style="width:25mm;">'.$info->dateraised. '</td></tr> ';
 echo'</table></td>'; 
			}?>
			
			
			<td style="width:80mm;">
<div class="span12">
                    <span style="font-family: arial,helvetica,sans-serif;"></span>
 <?php echo $details->ShipToCompanyName; ?> <br /><?php echo $details->ship_Address_1; ?>,<br /><?php echo $details->ship_Address_2; ?>
                    <br /><?php echo $details->ship_County; ?><br /> <?php echo 	$details->ship_Country; ?>
					<br /><?php echo $details->ship_Postcode; ?>
					<br /><?php echo $details->Shipping_Contact_No; ?><p></p> 
                </div> 
                             

                

			</td>
		</tr>

    </table>

    <!---
	<div id="content">
    --->
		<div id="invoice_body">
			<table>
                            <thead>
			<tr>
				<td style="width:10%;"><b>Item Code.</b></td>
				<td><b>Description</b></td>
				<td style="width:15%;"><b></b></td>
				<td style="width:15%;"><b>Quantity</b></td>

			</tr>
			</thead>
<tbody>
			

                             <?php
                foreach ($order_items->result() as $table) {


                                                    echo '<tr>
                                                    <td style="width:10%;">'.$table->CCL_Item.'</td>
                                                    <td style="text-align:left; padding-left:10px;">'.$table->Description.'</td>
                                                    <td class="mono" style="width:15%;">  </td>
                                                   <td style="width:15%;class="mono"" >'.$table->item_qty.'</td></tr>
                                                        ';
                                                    }
                                                    ?>


</tbody>
		</table>
		<?php 
		
		
		if($details->Company_id==='14'){ echo '</br>PLEASE OPEN AND EXAMINE YOUR GOODS ON ARRIVAL AND REPORT ANY DAMAGE OR SHORTAGE TO US BY EMAIL WITHIN 24 HOURS OF DELIVERY';} ?>
                </div>

<!--
        </div>
        -->

	</div>
	<div class="footer">
	
     <p style="text-align:center; font-weight:bold; ">Direct Packing Slip </p>
    </div>
 </body>
</html>
