<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */ 
foreach ($company_inv->result() as $company) {
 //foreach ($businesses->result() as $company) {   
}

?>
<div class="box border blue">
    <div class="box-title">
        <h4><i class="fa fa-calendar"></i>Please Fill out the Form  </h4>
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
        <form class="form-horizontal " action="#" method="post" enctype="multipart/form-data" >
		    <div class="form-group">
					 
					<label class="col-md-4 control-label"><h3>Sender</h3></label> 
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Name</label>
                <div class="col-md-8"><?php  echo $company->Company_name; ?>
				    <tr>
					    <td><input name="fullName" type="text" id="fullName" onfocus="if(this.value=='Crown')this.value=";" onblur="if(this.value==")this.value='Crown';" value="Crown"/></td>  
                        <!-------input name="dateraised" id="datepicker" class="form-control datepicker"  size="10" required="required"--->
					</tr> 
				</div>
			</div>
			 
			<div class="form-group">
			<label class="col-md-4 control-label"><h3>Receiver</h3></label>
			
			</div>
			 
			<div class="form-group">
				<label class="col-md-4 control-label">Company Name</label>
				<div class="col-md-8">	
                    <tr>  
                        
                        <input name="comp_name" type="text" size="50" maxlength="50" id="comp_name" value="<?php  echo $company->Company_name; ?>" required="required"/>
                    </tr>
				</div>
			</div>
			</br>
			<div class="form-group">	             
				<label class="col-md-4 control-label"><td>Receiver Email 1</td></label>
				<div class="col-md-8">	
                    <tr>                           
                        <td><input name="emailTo" type="text" size="50" maxlength="50"id="emailTo" value="<?php  echo $company->email; ?>"size="20" required="required"/></td>  
                    </tr>
				</div>
                 				
			</div>
			<div class="form-group">
			<label class="col-md-4 control-label"><td>Receiver Email 2</td></label>
				<div class="col-md-8">	
                    <tr>                           
                        <td><input name="emailTo2" type="text" size="50" maxlength="50"id="emailTo" placeholder="example@example.com"  /></td>  
                    </tr>
			    </div>
            </div>				
			</br>
			
           
            <!--form class="form-horizontal " action="#"--->
			<div class="form-group">
					 
					<label class="col-md-4 control-label"><h3>Content</h3></label> 
            </div>
			<div class="form-group">
					<label class="col-md-4 control-label"><td>Subject</td></label>
                    <div class="col-md-8">  
					<tr>
                        <td><!---input name="emailSubject" type="text" id="emailSubject" size="50" onfocus="if(this.value=='Invoice')this.value=";" onblur="if(this.value==")this.value='Invoice';" value="Invoicexxx" /-->
						<input name="emailSubject" type="text" id="emailSubject" size="50" placeholder="please input the subject"required="required">
						</td>  
                    </tr> 
                    </div>
			</div>
            <div class="form-group">
                    <form>
                        <label class="col-md-4 control-label">Message</label> 
                        <div class="col-md-8">
                             <textarea name="emailMessage" cols="50" rows="4" id="emailMessage" placeholder="please input the content"required="required"></textarea>
	
                           										 
						</div>
                    </form>
		    </div>
                    
					

                    <div class="form-group">
                        <label class="col-md-4 control-label">Inv Number:</label>
                        <div class="col-md-8">
                            
<input name="inv_id" type="text" size="50" maxlength="50" id="inv_id" value="<?php  echo $company->invoice_id; ?>" required="required"/>
                        </div>
                    </div>																			
        </form>
    
	
	</div>
      <button type="submit" name="submit" class="btn btn-primary">Send</button>              <!-- /DATE PICKER -->
</div>
                    <script>

                                                                                                                        $('#datepicker').datepicker();
                    </script>