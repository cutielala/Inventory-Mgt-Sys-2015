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
                        height: 1000px;
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
 <?php foreach ($orders->result() as $info) {

     }?><body onload="window.print();">

	<div id="wrapper">
    <br><br><br>
    <table class="heading" style="width:100%; ">
    	<tr>
    		<td style="width:80mm;"><h2>
					<?php if($info->CE < 1){
                                            echo '<p style="text-align:center; font-weight:bold; padding-top:5mm;"><img border="0" src="'.base_url().'assets/images/invoice/logo.png" alt="">
                                        </p>'; }

                                        else{
                                            echo '<p style="text-align:center; font-weight:bold; padding-top:5mm;"><img border="0" src="<?php echo base_url(); ?>assets/images/invoice/CElogo.png" alt="">CE
                                        </p>';
                                        }
?>
				</h2>
			</td><?php foreach ($orders->result() as $info) {
			                                echo'<td><table><tr><td>SO: </td>';
			
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
 echo'</table></td>'; 
			}?>
			
			
			<td rowspan="4" valign="top" align="right" style="padding:3mm;">

                            <table>
                                <?php foreach ($orders->result() as $info) {

 }?>

                                <tr><td>Buyers Name : </td><td><?php if(isset($info->buyername)){echo $info->buyername;} ?></td></tr>
					<tr><td>Address 1: </td><td><?php echo $info->Address_1 ;?></td></tr>
                                        <tr><td>Address 2: </td><td><?php echo $info->Address_2;?></td></tr>
                                        <tr><td>Town Ctiy : </td><td><?php echo $info->County; ?></td></tr>
					<tr><td>Postcode : </td><td><?php  echo $info->Postcode; ?></td></tr>
                                        <tr><td>Phone Number : </td><td><?php  echo $info->Buyer_Phone_Numbe; ?></td></tr>


    </table>

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
				<td><b>Product</b></td>
				<td style="width:15%;"><b>Quantity</b></td>
				<td style="width:15%;"><b>Location</b></td>

			</tr>
			</thead>
<tbody>
			

                             <?php
                foreach ($query->result() as $infoo) {


                                                    echo '<tr>
                                                    <td style="width:10%;">'.$infoo->CCL_Item.'</td>
                                                    <td style="text-align:left; padding-left:10px;">'.$infoo->Description.'</td>
                                                    <td class="mono" style="width:15%;"> '.$infoo->item_qty.' </td>
                                                   <td style="width:15%;class="mono"" >'.$infoo->location.'</td></tr>
                                                        ';
                                                    }
                                                    ?>


</tbody>
		</table>
		
                </div>

<!--
        </div>
        -->

	</div>
	<div class="footer">
	
     <p style="text-align:center; font-weight:bold; ">zenith international Trading Ltd Bank Details: Sort Code 60-21-57 Account number: 53660420</p>
    </div>
 </body>
</html>
