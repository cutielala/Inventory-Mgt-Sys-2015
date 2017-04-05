
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
            <div class="form-group">
                <label class="col-md-4 control-label">Full Name</label>
                <div class="col-md-8">
				    <td><input name="fullName" type="text" id="fullName" />Crown</td>  
                    <input name="dateraised" id="datepicker" class="form-control datepicker"  size="10" required="required">
					<input name="dateraised2" id="datepicker2" class="form-control datepicker"  size="10" required="required">
                </div>
            </div>


            <form class="form-horizontal " action="#">
                    <div class="form-group">

                    <form>





                        <label class="col-md-4 control-label">Company Name</label> 
                        <div class="col-md-8">






                            <select name="company" id="e1" class="col-md-12" required="required" onchange="showUser(this.value)">
                                <option></option>
                                <option>N/A</option>
                                <?php
                                foreach ($businesses->result()as $companys) {

                                    echo '<option  value="' . $companys->Company_id . '">' . $companys->Company_name . '</option>  ';
                                }
                                ?>


                            </select>	
                            <div id="txtHint"><b>Address info will be listed here.</b>
							</div>                                                                                         
                            <?php ?>										 
						</div>
                    </form>
				</div>

            

                    <div class="form-group">
                        <label class="col-md-4 control-label">PO Number:</label>
                        <div class="col-md-8">
                            <input type="text" name="po_number" class="form-control">

                        </div>
                    </div>																			
        </form>
    </div>
                    <!-- /DATE PICKER -->
</div>
                    <script>

                                                                                                                        $('#datepicker').datepicker();
                    </script>