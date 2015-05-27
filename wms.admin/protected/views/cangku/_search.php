<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cangkuid',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'cangkuname',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'linkphone',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'linkman',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'lock',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'createtime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'store_code',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'input_man',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
