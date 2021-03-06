<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'kuwei-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->dropDownListRow($model, 'suoshucangku', $this->getCangkuList(), array('empty' => "选择仓库")); ?>

<?php echo $form->dropDownListRow($model, 'suoshukehu', $this->getKehuList(), array('empty' => "选择客户")); ?>

<?php echo $form->textFieldRow($model, 'kuweihao', array('class' => 'span5', 'maxlength' => 20)); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    )); ?>
</div>

<?php $this->endWidget(); ?>
