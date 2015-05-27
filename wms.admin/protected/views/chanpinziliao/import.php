<?php
$this->breadcrumbs=array(
    '产品资料导入',
);

$this->menu=array(
    array('label'=>'产品资料列表','url'=>array('index')),
    array('label'=>'产品资料管理','url'=>array('admin')),
);
?>

<h3>批量导入产品列表</h3>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'type' => 'horizontal',
    'id' => 'chanpinziliao-form',
    'enableAjaxValidation' => false,
    'stateful' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>
<fieldset>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->fileFieldRow($model, 'fileField'); ?>
</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => "开始导入",
    )); ?>
</div>

<?php $this->endWidget(); ?>

