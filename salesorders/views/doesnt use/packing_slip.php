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
                        height: 842px;
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
 <?php foreach ($orders->result() as $info) {

     }?><body onload="window.print();">

	<div id="wrapper">

    <table class="heading" style="width:100%;">
    	<tr>
    		<td style="width:80mm;">
					<?php if($info->CE < 1){
                                            echo '<p style="text-align:center; font-weight:bold; padding-top:5mm;"><img border="0" src="'.base_url().'assets/images/invoice/logo.png" alt="">
                                        </p>'; }

                                        else{
                                            echo '<p style="text-align:center; font-weight:bold; padding-top:5mm;"><img border="0" src="<?php echo base_url(); ?>assets/images/invoice/CElogo.png" alt="">CE
                                        </p>';
                                        }
?>
				</h2>
			</td>
			<td rowspan="2" valign="top" align="right" style="padding:3mm;">

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


	<div id="content">

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

			

                             <?php
                foreach ($query->result() as $info) {


                                                    echo '<tr>
                                                    <td style="width:8%;">'.$info->CCL_Item.'</td>
                                                    <td style="text-align:left; padding-left:10px;">'.$info->Description.'</td>
                                                    <td class="mono" style="width:15%;"> '.$info->item_qty.' </td>
                                                   <td style="width:15%;" class="mono">'.$info->location.'</td>
                                                        </tr>';
                                                    }
                                                    ?>



		</table>
		
                </div>


        </div>
        </div>

 </body>
</html>

