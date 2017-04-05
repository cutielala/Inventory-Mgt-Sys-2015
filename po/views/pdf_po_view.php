
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
            <?php foreach ($po->result() as $details): ?>

            <?php endforeach; ?>
            <img src="<?php echo base_url(); ?>/assets/images/logo-pdf.jpg" alt="" width="270px" />
            <div class="row-fluid">    
                <div class="span6">

                    <h3>
                    </h3>
                    <?php echo $details->Vendor_name; ?> <br /></div>

                <div class="span6">
                    <span style="font-family: arial,helvetica,sans-serif;">Zenith International Ltd<br> T/A Crown Catering Sales and Hire<br>
                        Unit C10<br>
                        Hortonwood 10<br>
                        Telford<br>
                        Shropshire<br>
                        TF1 7ES<br>
                        <br>
                        TEL: <span class="wt">0844 247 5490</span><br>
                        EMAIL: sales@crown-professional.co.uk</span>

                </div> 
            </div>
            <div style="clear: both;"></div>
            <p>&nbsp;</p>
            <div class="row-fluid"> 
                <div class="span6">    	
                    <h3 class="inv">PO No. <?php echo $details->PO_id; ?></h3>
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

            <table class="table table-bordered table-hover table-striped" style="margin-bottom: 5px;">

                <thead> 

                    <tr> 

                        <th style="text-align:center; vertical-align:middle;">ITEM</th> 
                        <th style="70px;vertical-align:middle;text-align:center;">DESTCRIPTION</th> 
                        <th style="text-align:center; vertical-align:middle;">VENDOR PRODUCT</th> 
<!--<th style="text-align:center; vertical-align:middle;">Tax</th>-->

                        <th style="text-align:center; vertical-align:middle;">Quantity</th>
                        <th style="padding-right:20px; text-align:center; vertical-align:middle;">UNIT PRICE</th> 
                        	<th style="padding-right:20px; text-align:center; vertical-align:middle;"></th>	<th style="padding-right:20px; text-align:center; vertical-align:middle;">SUB-TOTAL</th> 
                    </tr> 

                </thead> 

                <tbody> 


                    <?php
                    foreach ($po_items->result() as $table) {
                        echo "<tr>
            	<td style=\"text-align:center; width:40px; vertical-align:middle;\">$table->CCL_Item&nbsp;</td>
                <td style=\"vertical-align:middle;\">&nbsp;$table->Description&nbsp;<div><p>

</p></div></td>
                <td style=\"text-align:center; width:40px; vertical-align:middle;\">&nbsp; $table->vendor_code &nbsp;</td>
                <td style=\"width: 70px; text-align:center; vertical-align:middle;\">&nbsp; $table->item_qty &nbsp;</td>
                <td style=\"width: 80px; text-align:right; padding-right:10px; vertical-align:middle;\">&nbsp;$table->ItemPrice&nbsp;</td>
                
                   <td style=\"width: 70px; text-align:center; vertical-align:middle;\"></td>
                                    
                <td style=\"width: 100px; text-align:right; padding-right:10px; vertical-align:middle;\">$table->itemlinetotal</td> 
		

</tr>";
                    }
                    ?>


                    <?php foreach ($po->result() as $value): ?>

                    <?php endforeach; ?>


                    <tr><td colspan="6" style="text-align:right; padding-right:10px;vertical-align:middle;">SUB-TOTAL (<?php echo $value->currency; ?>)</td>
                        <td style="text-align:right; padding-right:10px;"><h5><?php echo $value->Grand_total;
						                                                        //$value->Grand_total; ?></h5></td>
                    </tr>
					 <tr><td colspan="6" style="text-align:right; padding-right:10px;vertical-align:middle;">VAT(<?php echo $value->currency; ?>)</td>
                        <td style="text-align:right; padding-right:10px;"><h5><?php echo $value->VAT_ammount;?></h5></td>
                    </tr>
						                                                     
					<tr><td colspan="6" style="text-align:right; padding-right:10px;vertical-align:middle;">TOTAL(<?php echo $value->currency; ?>)</td>
                        <td style="text-align:right; padding-right:10px;"><h4><?php echo $value->inc_vat;?></h4></td>
						                                                        
                    </tr>
					
                    <tr><td colspan="6" style="text-align:right; padding-right:10px;vertical-align:middle;">Total CBM </td>
                        <td style="text-align:right; padding-right:10px;"> <?php echo $value->total_cbm; ?></td>
                    
                    
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

                <div class="span5 offset2"> 
               
                </div>
            </div>

        </div>
    </body>
</html>