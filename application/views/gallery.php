<?php if(isset($errors_upload)): ?>
<p><?php echo $errors_upload ?></p>
<?php endif;?>

<?php if(isset($errors_thumb)): ?>
<p><?php echo $errors_thumb ?></p>
<?php endif;?>

<div id="gallery">
<?php foreach($images as $image): ?>
	<a href="<?php echo base_url().'uploads/'.$image->image_name; ?>" class="gallery" title="<?php echo $image->image_name; ?>">
		<img src="<?php echo base_url().'uploads/thumbs/'.$image->image_name ?> "/></a>
	<?php if($this->session->userdata('admin')): ?>
		<?php echo anchor('gallery/delete/'.$image->image_name, 'Delete'); ?>
	<?php endif; ?>
<?php endforeach; ?>
</div>

<?php if($this->session->userdata('admin')): ?>
<?php echo form_open_multipart('gallery/upload');?>
<?php echo form_upload('userfile'); ?>
<?php echo form_submit('upload', 'Upload'); ?>
<?php echo form_close(); ?>
<?php endif; ?>