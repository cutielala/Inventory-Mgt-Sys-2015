
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */ foreach ($invoice_info->result() as $info) {
    
}
?>


<!-- PAGE -->
<!DOCTYPE html>
<html>
<head>
	
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
		}
		
		.page
		{
			height:297mm;
			width:210mm;
			page-break-after:always;
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
		
		h1.heading
		{
			font-size:14pt;
			color:#000;
			font-weight:normal;
		}
		
		h2.heading
		{
			font-size:9pt;
			color:#000;
			font-weight:normal;
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
			margin:0 15mm;
			padding-bottom:3mm;
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
	<div id="wrapper">
    
            <p style="text-align:center; font-weight:bold; padding-top:5mm;"><img border="0" src="<?php echo base_url(); ?>assets/images/invoice/logo.png" alt="">
 </p>
    <br />
    <table class="heading" style="width:100%;">
    	<tr>
    		<td style="width:80mm;">
    			<h1 class="heading">Zenith International Trading Ltd</h1>
				<h2 class="heading">Trading As Crown Catering</h2>							
UNIT C10, <br>
Hortonwood 10, <br>
Hortonwood, <br>
Telford, Shropshire <br> 
TF1 7ES<br>								
www.crown-professional.co.uk<br>			
Email	sales@crown-professional.co.uk	<br>					
Tel	01952 670777	<br>												
Fax	01952 670703<br>											
							
							

				</h2>
			</td>
			<td rowspan="2" valign="top" align="right" style="padding:3mm;">
				 <h1 class="heading">Shipping Address</h1>
											
<?php echo $info->Company_name;  ?> <br>
<?php echo $info->Address_1 ;?> <br>
<?php echo $info->Address_2;?> <br>
<?php echo $info->Town_city ; ?><br> 
<?php  echo $info->Postcode; ?><br>								
											
							
							
                          
			</td>
                            
                        
		</tr>
    	
    </table>
		
		
	<div id="content">
		
		<div id="invoice_body">
			<table>
			<tr style="background:#eee;">
				<td style="width:8%;"><b>Item Code.</b></td>
				<td><b>Item/Description</b></td>
				<td style="width:15%;"><b>Quantity</b></td>
				<td style="width:15%;"><b>Unit Price</b></td>
				<td style="width:15%;"><b>Line Total</b></td>
			</tr>
			</table>
			
			<table>
                            
                             <?php
                foreach ($invoice_info->result() as $info) {
    
                                                        
                                                    echo '<tr>
                                                    <td style="width:8%;">'.$info->CCL_Item.'</td>
                                                    <td style="text-align:left; padding-left:10px;">'.$info->Description.'</td>
                                                    <td class="mono" style="width:15%;"> '.$info->item_qty.' </td>
                                                    <td style="width:15%;" class="mono">'.$info->ItemPrice.' </td>
                                                    <td style="width:15%;" class="mono">'.$info->itemlinetotal.'</td>
                                                        </tr>'; 
                                                    }
                                                    ?>
                                                    <tr>
                                                    <td style="width:8%;"></td>
                                                    <td style="text-align:left; padding-left:10px;">Shipping Costs</td>
                                                    <td class="mono" style="width:15%;">  </td>
                                                    <td style="width:15%;" class="mono"> </td>
                                                    <td style="width:15%;" class="mono"><?php echo $info->shipping_cost;?></td>
                                                        </tr> 
			
			<tr>
				<td colspan="3"></td>
				<td>Sub Total :</td>
				<td class="mono"><?php echo $info->Grand_total; ?></td>
			</tr>
		</table>
		</div>
            <br>
		<div id="invoice_total">
			
			<table>
				<tr>
					<td style="text-align:left; padding-left:10px;"></td>
					<td style="width:15%;">exc VAT &pound;</td>
					<td style="width:15%;" class="mono"><?php echo $info->Grand_total; ?></td>
                                   
                                         
				</tr>
                                <tr>
					<td style="text-align:left; padding-left:10px;">VAT Charged at <?php echo $info->VAT_Rate; ?> %</td>
					<td style="width:15%;">VAT</td>
					<td style="width:15%;" class="mono"><?php echo $info->VAT_ammount; ?></td>
                                       
				</tr>
                                  <tr>
					<td style="text-align:left; padding-left:10px;"></td>
					<td style="width:15%;">Inc VAT</td>
                                        <td style="width:15%;" class="mono"><?php echo $info->inc_vat; ?></td>
                                         
				</tr>
			</table>
		</div>
		<br />
		<hr />
		<br />
		
		<table style="width:100%; height:35mm;">
			<tr>
				<td style="width:65%;" valign="top">
					Payment Information :<br />
					Please make cheque payments payable to : <br />
					<b>Zenith International Trading Ltd</b>
					<br /><br />
					The Invoice is payable within 7 days of issue.<br /><br />
				</td>
				<td>
				<div id="box">
					<table>
                                    <?php 
                                    $originalDate =$info->dateraised;
                                                        $newDate = date("d-m-Y", strtotime($originalDate));
                                                        
                                    ?>
					<tr><td>Invoice No : </td><td>INV-<?php echo $info->invoice_id; ?></td></tr>
					<tr><td>Dated : </td><td><?php  echo $newDate;?></td></tr>
					<tr><td>Currency : </td><td>GBP</td></tr>
				</table>
				</div>
				</td>
			</tr>
		</table>
	</div>
	
	<br />
	
	</div>
	
	<htmlpagefooter name="footer">
		<hr />
		<div id="footer">	
			<table>
				<tr><td>"Co. Reg No 3708505<br></td><td>V.A.T Reg 720993328</td><td></td></tr>
			</table>
		</div>
	</htmlpagefooter>
	<sethtmlpagefooter name="footer" value="on" />
	

                                                       
                                 </body>
</html>            