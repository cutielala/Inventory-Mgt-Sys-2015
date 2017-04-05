

<script>
    function add_vendor(str)
    {
        if (str == "")
        {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "<?php echo base_url(); ?>po/add_vendor?q=" + str, true);
        xmlhttp.send();
    }
</script>


<body>
<div class="box border orange">
    <div class="box-title">
        <h4><i class="fa fa-file-o"></i>New PO</h4>
     
    </div>
    <div class="box-body">
        <form class="form-horizontal " action="#">
          


            <form class="form-horizontal " action="#">
                <div class="form-group">

                    <form>





                        <label class="col-md-4 control-label">Vendor Name</label> 
                        <div class="col-md-8">


                            <select name="factory" id="e1" class="col-md-8" required="required" >
                                <option></option>
                                <option>N/A</option>
                                <?php
                              
								
								 foreach($vendors->result()as $vendor) {

                                    echo '<option  value="'. $vendor->vendor_name .'">'. $vendor->vendor_name .'</option>  ';
                                }
                                ?>


                            </select>	
                            
							
						     </div>
                </div>

            

                    <div class="form-group">
                        <label class="col-md-4 control-label">PO Notes :</label>
                        <div class="col-md-8">
                            <!--
							input type="text" name="po_notes" class="form-control">
							--->
							<textarea  name="po_notes"class="col-md-8" style="height:100px;"></textarea>

                        </div>
                    </div>	
                
                 <div class="form-group">
                        <label class="col-md-4 control-label">currency  :</label>
                        <div class="col-md-2">
                            <select type="text" name="currency" required="required" >
							
							
                              
                              <option>USD</option>
							  <option>GBP</option>
                              <option>EURO</option>
                            </select>	
                        </div>
                    </div>

                    </div>
                    <!-- /DATE PICKER -->
                    </div>
   
</body>