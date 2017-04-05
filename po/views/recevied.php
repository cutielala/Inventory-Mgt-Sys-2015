<?php
//foreach ($po_orders_items->result() as $row) 
{
    
}
 foreach ($po_items->result() as $row) {
 }
?>
	<div class="col-md-6">
										<!-- BASIC -->
										<div class="box border orange">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Basic form elements</h4>
												<div class="tools hidden-xs">
													
												</div>
											</div>
											<div class="box-body big">
												
												<div class="separator"></div>
												<h3 class="form-title">Received Items</h3>
												<form class="form-inline" role="form">
												  <div class="form-group">
													<label class="sr-only" for="exampleInputEmail2">Items Qty Ordered</label>
													<input type="number" class="form-control" id="qty_recevied" value="<?php echo $row->item_qty; ?>">
												  </div>
												  <div class="form-group">
													<label class="sr-only" for="">Items Delivered</label>
													<input type="number" class="form-control" name="recevied" value="">
												  </div>
												  <button type="submit" class="btn btn-primary"> Save</button>
												</form>
												
												

											</div>
										</div>
        </div><!-- /BASIC -->
									