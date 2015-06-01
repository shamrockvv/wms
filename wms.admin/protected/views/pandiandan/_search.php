<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
)); ?>

<?php //echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

<?php //echo $form->textFieldRow($model,'leixing',array('class'=>'span5','maxlength'=>20)); ?>

<?php //echo $form->textFieldRow($model,'partner',array('class'=>'span5','maxlength'=>50)); ?>

<?php echo $form->dropDownListRow($model, 'suoshucangku', $this->getCangkuList(), array('empty' => "选择仓库")); ?>

<?php echo $form->dropDownListRow($model, 'suoshukehu', $this->getKehuList(), array('empty' => "选择客户")); ?>

<?php echo $form->textFieldRow($model, 'pandiandanhao', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'fenqu_pandiandanhao', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'kuweihao', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'kehubianhao', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'gonghuoshang', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'shangpinmingcheng', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'chuchang_bar', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'nei_bar', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($model, 'total', array('class' => 'span5')); ?>

<?php echo $form->dropDownListRow($model, 'zhengcanleixing', array("" => "请选择", "正品" => "正品", "残品" => "残品")); ?>

<?php echo $form->textFieldRow($model, 'zhuangtai', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'input_man', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'createtime', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'isshenhe', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'shenhe_man', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'shenhe_time', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'isqueren', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'queren_man', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'queren_time', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'iszuofei', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'zuofei_man', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'zuofei_time', array('class' => 'span5', 'maxlength' => 50)); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Search',
    )); ?>
</div>

<?php $this->endWidget(); ?>
