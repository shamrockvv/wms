<div class="well view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cangkuid')); ?>:</b>
	<?php echo CHtml::encode($data->cangkuid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cangkuname')); ?>:</b>
	<?php echo CHtml::encode($data->cangkuname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkphone')); ?>:</b>
	<?php echo CHtml::encode($data->linkphone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkman')); ?>:</b>
	<?php echo CHtml::encode($data->linkman); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lock')); ?>:</b>
	<?php echo CHtml::encode($data->lock); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('createtime')); ?>:</b>
	<?php echo CHtml::encode($data->createtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('store_code')); ?>:</b>
	<?php echo CHtml::encode($data->store_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('input_man')); ?>:</b>
	<?php echo CHtml::encode($data->input_man); ?>
	<br />

	*/ ?>

</div>