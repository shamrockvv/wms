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
    <?php echo $form->dropDownListRow($model,'suoshucangku',$this->getCangkuList(),array('empty'=>"选择仓库"));?>
    <?php echo $form->dropDownListRow($model,'suoshukehu',$this->getKehuList(),array('empty'=>"选择客户"));?>
    <?php echo $form->fileFieldRow($model, 'fileField'); ?>
</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => "开始导入",
        'htmlOptions'=>array(
            'onClick'=>'javascript:return check();',
        ),
    )); ?>
</div>

<?php $this->endWidget(); ?>
<script>
    function check(){
        if($('#Dingdan_suoshucangku').val()=='' || $('#Dingdan_suoshukehu').val()=='' || $('#Dingdan_fileField').val()=='')
            return false;
        return true;
    }
</script>
