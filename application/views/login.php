<h2>Admin login</h2>
<div id="login">
<?php echo form_open('login/validate'); ?>
<label><?php echo form_input('username', 'Username'); ?></label>
<label><?php echo form_password('password', 'Password'); ?></label>
<label><?php echo form_submit('submit', 'Login'); ?></label>
<?php echo form_close(); ?>
</div>