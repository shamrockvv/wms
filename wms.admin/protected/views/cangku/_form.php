<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cangku-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'cangkuid',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'cangkuname',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'linkphone',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'linkman',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->radioButtonListRow($model,'lock',array('否'=>'否','是'=>'是'),array('class'=>'')); ?>

	<?php //echo $form->textFieldRow($model,'createtime',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'store_code',array('class'=>'span5','maxlength'=>50)); ?>

	<?php //echo $form->textFieldRow($model,'input_man',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
