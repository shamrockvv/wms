<div class="well view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peisongshangname')); ?>:</b>
	<?php echo CHtml::encode($data->peisongshangname); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('qq')); ?>:</b>
	<?php echo CHtml::encode($data->qq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('netaddress')); ?>:</b>
	<?php echo CHtml::encode($data->netaddress); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
	<?php echo CHtml::encode($data->remark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createtime')); ?>:</b>
	<?php echo CHtml::encode($data->createtime); ?>
	<br />

	*/ ?>

</div>