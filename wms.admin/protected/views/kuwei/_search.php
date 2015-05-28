<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'partner',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'kuweihao',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'suoshucangku',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'gonghuoshang',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'suoshukehu',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'kehubianhao',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'zhengcanleixing',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'total',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'frozen',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fanchang_frozen',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'dingdan_frozen',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'yishi_frozen',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'chayishuliang',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'shangpinyouxiaoqi',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'baozhiqi',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'shengchanriqi',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'youxiaoqitianshu',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'shangpinmingcheng',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'chuchang_bar',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'nei_bar',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'input_man',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'createtime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'leixing',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'lock',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
