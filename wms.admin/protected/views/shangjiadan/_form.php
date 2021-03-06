<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'shangjiadan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'partner',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'laiyuan',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'shangjiadanhao',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'order_code',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'suoshukehu',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'kehubianhao',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'suoshucangku',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'order_type_explain',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'xiaoshouleixing',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'rukucangku',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'gonghuoshang',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'zhengcanleixing',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'remark',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'shangpinmingcheng',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'chuchang_bar',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'nei_bar',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'chengbenjia',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'caigoujia',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'wangluodanjia',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'yuyueshuliang',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'shangjiashuliang',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'shangpinyouxiaoqi',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'baozhiqi',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'shengchanriqi',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'youxiaoqitianshu',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'kuweihao',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'caozuoren',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'createtime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isshangjia',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'querenren',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'queren_time',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
