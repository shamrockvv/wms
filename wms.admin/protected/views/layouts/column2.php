<?php $this->beginContent('//layouts/main'); ?>
	<div id="content">
		<?php echo $content; ?>
	</div>
	<!-- content -->

<?php
if (!empty($this->menu)) {
	echo '<div class="subnav well">';
	array_unshift($this->menu, array('label' => 'Operations'));
	$this->widget('bootstrap.widgets.TbMenu', array(
		'type' => 'list',
		'items' => $this->menu,
	    'htmlOptions'=>array('class'=>'nav-list')
	));
	echo '</div>';
}
?>

<?php $this->endContent(); ?>