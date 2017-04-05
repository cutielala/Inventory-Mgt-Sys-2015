<h1>Forgot Your Password? Change the Password</h1>

<div id="infoMessage"><?php echo 'test'.$message;?></div>

<?php echo form_open('auth/reset_password/' . $code);?>
      
      <p>New Password (at least <?php echo $min_password_length;?> characters long):<br />
      <?php echo form_input($new_password);?>
      </p>
      
      <p>Confirm New Password:<br />
      <?php echo form_input($new_password_confirm);?>
      </p>
      
      <?php echo form_input($user_id);?>
      <?php echo form_hidden($csrf); ?>
      <p><?php echo form_submit('submit', 'Change');?></p>
      
<?php //echo form_close();?>
<?php echo $user_id.$new_password;?>
