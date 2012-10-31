<div id="contact">
<h2>Contact us</h2>
<?php if(isset($msg)): ?>
	<?php echo $msg; ?>
<?php endif; ?>

<?php echo form_open('contact/validate'); ?>
<label><?php echo form_input('name', 'Name'); ?></label>
<label><?php echo form_input('email', 'Email'); ?></label>
<label><?php echo form_textarea('message', 'Message'); ?></label>
<label><?php echo form_submit('submit', 'Send'); ?></label>
<?php echo form_close(); ?>
</div>