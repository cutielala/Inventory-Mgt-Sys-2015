<!DOCTYPE html>
<html lang="en">
<body>

<section id="page">
<div class="col-md-9">
												<div id='calendar'></div>
											</div>
</section>








<!-- DATE RANGE PICKER -->
	
<!-- DATE RANGE PICKER -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	
        <!-- DATE PICKER -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/datepicker/picker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/datepicker/picker.date.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/datepicker/picker.time.js"></script>
        <!-- RATY -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-raty/jquery.raty.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/fullcalendar/fullcalendar.min.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("elements");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
</body>
</html>
