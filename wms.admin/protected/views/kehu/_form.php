<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'kehu-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'partner',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'laiyuan',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'kehubianhao',array('class'=>'span5','readonly'=>true,'maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'kehuname',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'linkphone',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'linkmobile',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'linkman',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'qq',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'netaddress',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'remark',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->hiddenField($model,'wuliu',array('class'=>'span5','maxlength'=>100)); ?>

	<?php //echo $form->hiddenFieldRow($model,'input_man',array('class'=>'span5','maxlength'=>10)); ?>
    <!---->
	<?php //echo $form->hiddenFieldRow($model,'createtime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'zancunkuwei',array('class'=>'span5','readonly'=>true,'maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'dingdan_zancunkuwei',array('class'=>'span5','readonly'=>true,'maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'kucunfanchang_zancunkuwei',array('class'=>'span5','readonly'=>true,'maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
