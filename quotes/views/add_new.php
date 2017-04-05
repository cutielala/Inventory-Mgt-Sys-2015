
<div class="box border blue">
    <div class="box-title">
        <h4><i class="fa fa-calendar"></i>Please insert, Date & Company  </h4>
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
			    <div class="col-md-6">
			        <div class="form-group">
                        <label class="col-md-4 control-label">Date:</label>
                            <div class="col-md-8">
                            <input name="dateraised" id="datepicker" class="form-control datepicker"   datesize="10" required="required">
                            </div>
                    </div>
                </div>
                <div class="col-md-6">
				    <div class="form-group">
			            <label class="col-md-4 control-label">PO Number:</label>
                                <div class="col-md-8">
                                    <input type="text" name="po_number" class="form-control" required="required" >
                                </div>
				    </div>
				</div>
				</br>
				<div class="col-md-12">
				    <form class="form-horizontal " action="#">
                    <div class="form-group">

                        <form>
                            <label class="col-md-2 control-label">Company Name</label> 
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

            

 
                    				
                    </form>
                 </div>
			</div>    

        </div>
        </form>                <!-- /DATE PICKER -->
    