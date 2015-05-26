<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'partner',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'laiyuan',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'kehubianhao',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'kehuname',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'linkphone',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'linkmobile',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'linkman',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'qq',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'netaddress',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'remark',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'wuliu',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'input_man',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'createtime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'zancunkuwei',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'dingdan_zancunkuwei',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'kucunfanchang_zancunkuwei',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
