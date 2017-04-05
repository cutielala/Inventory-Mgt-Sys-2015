
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
            <?php foreach ($orders->result() as $details): ?>

            <?php endforeach; ?>
             <div class="row-fluid">    
                <div class="span6">

                    <h3>
                    </h3>
                    <?php echo $details->buyername; ?> <br /><?php echo $details->Address_1; ?>,<br /><?php echo $details->Address_2; ?>
                    <br /><?php echo $details->Town_city; ?><br /><?php echo $details->Postcode; ?><br /><?php echo $details->Buyer_Phone_Numbe; ?><p></p>    
                </div>

                <div class="span6">
                    <span style="font-family: arial,helvetica,sans-serif;"></span>

                </div> 
            </div>
            <div style="clear: both;"></div>
            <p>&nbsp;</p>
            <div class="row-fluid"> 
                <div class="span6">    	
                    <h3 class="inv"> Order No. <?php echo $details->salesorder_id; ?></h3>
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

                        <th style="text-align:center; vertical-align:middle;">Item Code.</th> 
                        <th style="vertical-align:middle;">Description</th> 

<!--<th style="text-align:center; vertical-align:middle;">Tax</th>-->

                        <th style="text-align:center; vertical-align:middle;">Quantity</th>
                        <th style="padding-right:20px; text-align:center; vertical-align:middle;"></th> 
                        <th style="text-align:center; vertical-align:middle;"></th>	<th style="padding-right:20px; text-align:center; vertical-align:middle;"></th>	<th style="padding-right:20px; text-align:center; vertical-align:middle;"></th> 
                    </tr> 

                </thead> 

                <tbody> 


                    <?php
                    foreach ($order_items->result() as $table) {
                        echo "<tr>
            	<td style=\"text-align:center; width:40px; vertical-align:middle;\">$table->CCL_Item</td>
                <td style=\"vertical-align:middle;\">$table->Description<div><p>

</p></div></td>
                
                <td style=\"width: 70px; text-align:center; vertical-align:middle;\">$table->item_qty</td>
                <td style=\"width: 80px; text-align:right; padding-right:10px; vertical-align:middle;\"></td>
                
                   <td style=\"width: 70px; text-align:center; vertical-align:middle;\"></td>
                <td style=\"width: 70px; text-align:center; vertical-align:middle;\"></td>                      
                <td style=\"width: 100px; text-align:right; padding-right:10px; vertical-align:middle;\"></td> 
		

</tr>";
                    }
                    ?>


                    <?php foreach ($orders->result() as $value): ?>

                    <?php endforeach; ?>


                    <tr><td colspan="6" style="text-align:right; padding-right:10px;;"></td>
                        <td style="text-align:right; padding-right:10px;"></td>
                    </tr><tr><td colspan="6" style="text-align:right; padding-right:10px;;"></td>
                        <td style="text-align:right; padding-right:10px;"></td></tr>
                    <tr><td colspan="6" style="text-align:right; padding-right:10px;;"> </td>
                        <td style="text-align:right; padding-right:10px;"></td></tr>
                    <tr><td colspan="6" style="text-align:right; padding-right:10px; font-weight:bold;"></td>
                        <td style="text-align:right; padding-right:10px; font-weight:bold;"></td></tr>

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