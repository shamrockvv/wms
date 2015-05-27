<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'chanpinziliao-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'beidacang_productid',array('class'=>'span5','maxlength'=>30)); ?>

	<?php //echo $form->textFieldRow($model,'partner',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'chuchang_bar',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'nei_bar',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'shangpinmingcheng',array('class'=>'span5','maxlength'=>100)); ?>

    <?php echo $form->dropDownListRow($model,'suoshucangku',$this->getCangkuList(),array('empty'=>"选择仓库"));?>

    <?php echo $form->dropDownListRow($model,'suoshukehu',$this->getKehuList(),array('empty'=>"选择客户"));?>

	<?php //echo $form->textFieldRow($model,'kehubianhao',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldRow($model,'lock',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldRow($model,'lururen',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'createtime',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Attributes',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'sku',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'yanse',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'chima',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'rongji',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'jiage',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'qikanhao',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'fenlei_name1',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'fenlei_name2',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'fenlei_name3',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
