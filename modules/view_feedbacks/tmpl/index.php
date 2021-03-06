<?php
	defined('AUTH') or die;
	$feedbacks = API::execute('raven/get_all_feedbacks',array());
?>
<div id="feebacks_div" class="module">
	<div class="input-append pull-right">
		<button class="btn" onclick="showFeedbackForm();">Add Feedback</button>
		<span class="add-on"><i class="icon-plus"></i></span>
	</div>
	<h3>Feedbacks</h3>
	<?php
	$i=0;
	foreach($feedbacks['data'] as $f){?>
		<div class="well feedback-well">
			<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){?>
				<a class="feedbackToggleButton" id="ftb<?php echo $f['id']?>" title="Approve" onclick="toggleFeedback(<?php echo $f['id']?>);"><i class="icon-eye-<?php echo ($f['status']=="1")?"open":"close";?>"></i></a>
			<?php }?>
			<blockquote class="pull-<?php echo ($i%2==0)?'right':'left'?> justifyed" style="width: 95%;">
				<i class="icon-quote-<?php echo ($i%2==0)?'left':'right'?> icon-4x icon-muted pull-<?php echo (++$i%2==0)?'right':'left'?>"></i>
				<?php echo $f['content']; ?><br />
				<small class="pull-<?php echo ($i%2==0)?'left':'right'?>"><?php echo $f['fullName']; ?></small>
				<div class="clearfix"></div>
			</blockquote>
			<div class="clearfix"></div>
		</div>
	<?php }?>
</div>

<div id="feedbackFormDiv" class="none">	
	<form class="form" action="<?php echo RConfig::ajax_url;?>add_feedback" method="POST" onsubmit="return addFeedback(this);" id="feedbackForm">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-th-list"></i></span>
			<textarea name="content" max="2000" placeholder="Type your feedback here" class="span5" rows="7" required="required"></textarea>
		</div>
		<br />
		<button type="submit" id="addFeedbackButton" class="btn btn-large btn-primary" data-loading-text="Adding ..." data-default-text="ADD!">ADD!</button>
	</form>
</div>