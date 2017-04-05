	<!-- JQGRID -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jqgrid/css/ui.jqgrid.min.css" />
<div class="box border blue">
    <div class="box-title">
        <h4><i class="fa fa-calendar"></i>Please  Entering the Details for the New Sales Order</h4>
        <div class="tools">
            <a href="#box-config" data-toggle="modal" class="config">
                <i class="fa fa-cog"></i>
            </a>
            <a href="javascript:;" class="reload">
                <i class="fa fa-refresh"></i>
            </a>
            <a href="javascript:;" class="collapse">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a href="javascript:;" class="remove">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="box-body">
        <form class="form-horizontal " action="#">
		 <div class="row">
				    
            <div class="col-md-12">
			    <!----
			    <div class="col-md-6">
			        <div class="form-group">
                        <label class="col-md-4 control-label">Date:</label>
                            <div class="col-md-8">
                            <input name="dateraised" id="datepicker" class="form-control datepicker"   datesize="10" required="required">
                            </div>
                    </div>
                </div>
				--->
			<div class="col-md-12">
                <div class="col-md-4">
				        <div class="form-group">
						        <input type="hidden" name="dateraised" id="datepicker" class="form-control datepicker" >
					
			            <label class="col-md-4 control-label">PO# :</label>
                                <div class="col-md-8">
								
                                    <input type="text" name="po_number" class="form-control" required="required" >
                                </div>
				        </div>
				
				        <div class="form-group">
			            <label class="col-md-4 control-label">Ship To CompanyName:</label>
                                <div class="col-md-8">
								
                                    <input type="text" name="ShipToCompanyName" class="form-control"  >
                                </div>
				        </div>
						<div class="form-group">
			            <label class="col-md-6 control-label">Order is on Hold?</label>
                                <div class="col-md-6">
								
                                    <select name="onhold" class="col-md-12" >
                                
								
								<option value="pending">NO</option>
                                <option value="onhold">YES</option>
                               
                                    </select>
                                </div>
				        </div>
				</div>
				<div class="col-md-8">
							<div class="form-group"><label class="col-md-4 control-label">SO Notes:</label>
							        <div class="col-md-8">
									<textarea name="so_notes" id="notes" rows="5" cols="50"></textarea>
																          </div>  
			                </div>
				</div>
			</div>
				
				<div class="col-md-12">
				<div class="separator"></div>
				    <form class="form-horizontal " action="#">
                    <div class="form-group">

                        <form>
                            <label class="col-md-1 control-label">Company Name</label> 
                        <div class="col-md-11">
						    <div class="col-md-12">
							 
                            <select name="company" id="e2" class="col-md-8" required="required" onchange="showUser(this.value)">
                                
								
								 <option value="1" >N/A</option>
                               
                                <?php
								
                                foreach ($businesses->result()as $companys) {

                                    echo '<option  value="' . $companys->Company_id . 'required="required"">' . $companys->Company_name . '</option>  ';
                                }
						
                                ?>

                            </select>
							 <!----
							<a class="btn btn-default" data-toggle="modal" data-target="#myModal" href="<?php echo base_url();?>/businesses/add_company">Add Customer</a>
							<?php echo form_close(); ?>
							------>
							</div>
							<div class="col-md-12">
                            <div id="txtHint"><b>Business info will be listed here.</b></div>                                                                                         
                            <?php ?>	
                            </div>							
						</div>
						<div class="col-md-8">
						</div>
					    </form>
                    </div>

            

                    				
                    </form>
                 </div>
			</div>
            <!----			
			<div class="col-md-4">

                <form class="form-horizontal " action="#">
                <div class="form-group">

                    <form>
                        <label class="col-md-2 control-label">Shipping Info:</label> 
                        <div class="col-md-10">
                            <select name="company" id="e1" class="col-md-12" required="required" onchange="showUser(this.value)">
                                <option></option>
                                <option>N/A</option>
                                <?php
                                foreach ($businesses->result()as $companys) {

                                    echo '<option  value="' . $companys->Company_id . '">' . $companys->Company_name . '</option>  ';
                                }
                                ?>

                            </select>	
                            <div id="txtHint"><b>Billing Address info will be listed here.</b></div>                                                                                         
                            <?php ?>										 
						</div>
						<div class="col-md-8">
						</div>
					</form>
                </div>

            

                    <div class="form-group">
                        <table id="rowed3"></table>
										
										<div id="prowed3"></div>
						<table id="43rowed3"></table>
										
										<div id="p43rowed3"></div>
										
										
										
										
										
					<script src="rowedex3.js" type="text/javascript"> </script>
                    </div>
                    				
                </form>
			</div>
			--->
        </div>
		<button type="submit" class="btn btn-primary pull-right">Add</button>
        </br></br>
		</form>                <!-- /DATE PICKER -->
    </div>
</div>

	




<!-- JQGRID -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqgrid/js/jquery.jqGrid.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqgrid/js/grid.locale-en.min.js"></script>
 <script>
                         jQuery(document).ready(function() {
        //App.setPage("dynamic_table");  //Set current page      20141209
	    App.setPage("jqgrid_plugin");
		//App.setPage("sales_orders"); 
        App.init(); //Initialise plugins and elements
    });
                        $
        $('#datepicker').datepicker({minDate: -1, maxDate: "+1"});
    });
</script>
<script type="text/javascript">					
jQuery("#43rowed3").jqGrid({
   	url:'server.php?q=2',
	datatype: "json",
   	colNames:['Inv No','Date', 'Client', 'Amount','Tax','Total','Notes'],
   	colModel:[
   		{name:'id',index:'id', width:55},
   		{name:'invdate',index:'invdate', width:90, editable:true},
   		{name:'name',index:'name', width:100,editable:true},
   		{name:'amount',index:'amount', width:80, align:"right",editable:true},
   		{name:'tax',index:'tax', width:80, align:"right",editable:true},		
   		{name:'total',index:'total', width:80,align:"right",editable:true},		
   		{name:'note',index:'note', width:150, sortable:false,editable:true}		
   	],
   	rowNum:10,
   	rowList:[10,20,30],
   	pager: '#p43rowed3',
   	sortname: 'id',
    viewrecords: true,
    sortorder: "desc",
	editurl: "server.php",
	caption: "Using navigator"
});
true
//jQuery("#43rowed3").jqGrid('navGrid',"#p43rowed3",{edit:false,add:false,del:false});
jQuery("#43rowed3").jqGrid('navGrid',"#p43rowed3",{edit:true,add:true,del:true});
jQuery("#43rowed3").jqGrid('inlineNav',"#p43rowed3");

</script>					