<div class='mainInfo'>
<?php foreach ($users as $user):?>
	<h1>Users Profile </h1>
	<p>here is :<?php echo $user->first_name;?></p>

	<!--div id="infoMessage"---><?php //echo $message;?><!/div--->
	
	<table cellpadding=0 cellspacing=10>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			
			<th>Company</th>
			<th>Email</th>
			<th>Phone</th>
		</tr>
		
		<?php //foreach ($users ->result()as $user):?>
			<tr>
			     
				<td><?php echo $user->first_name;?></td>
				<td><?php echo $user->last_name;?></td>
				<td><?php echo $user->company;?></td>
				<td><?php echo $user->email;?></td>
				<td><?php echo $user->phone?></td>
							</tr>
		<?php endforeach;?>

	<p><a href="<?php echo site_url('auth/index');?>">Back </a></p>
	
</div>
