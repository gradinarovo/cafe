<?php
if(!$this->session->userdata('admin'))
{
	redirect('site/index');
}
?>

<h2>Click on a title to delete a feedback</h2>
<?php foreach($feedbacks as $feedback): ?>
	<?php echo $feedback->id; ?>
	<?php echo anchor("contact/delete_feedback/$feedback->id", "$feedback->name"); ?><br/>
	<?php echo $feedback->email; ?><br/>
	<?php echo $feedback->message; ?><br/><br/>
<?php endforeach; ?>
<?php echo $links; ?>