<?php $this->beginContent('//layouts/main');?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	<!-- content -->
</div>
<div class="span-4 right" style="margin-top: 50px">
	<div id="myslidemenu" class="jqueryslidemenu.ul" style="background-color:#f8f8ff;">
		<?php
		$this->widget('zii.widgets.CMenu', array(
		                                        'items' => $this->menu,
		                                   ));
		?>
</div>
<?php $this->endContent(); ?>