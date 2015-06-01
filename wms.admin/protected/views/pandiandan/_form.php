<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'pandiandan-form',
    'enableAjaxValidation' => false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->dropDownListRow($model, 'suoshucangku', $this->getCangkuList(), array('empty' => "选择仓库")); ?>

<?php echo $form->dropDownListRow($model, 'suoshukehu', $this->getKehuList(), array('empty' => "选择客户")); ?>

<?php echo $form->textFieldRow($model, 'pandiandanhao', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php //echo $form->textFieldRow($model, 'fenqu_pandiandanhao', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'kuweihao', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php //echo $form->textFieldRow($model, 'gonghuoshang', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php //echo $form->textFieldRow($model, 'shangpinmingcheng', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php //echo $form->textFieldRow($model, 'chuchang_bar', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php //echo $form->textFieldRow($model, 'zhuangtai', array('class' => 'span5', 'maxlength' => 50)); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    )); ?>
</div>

<?php $this->endWidget(); ?>
