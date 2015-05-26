<?php $this->pageTitle = Yii::app()->name; ?>

<?php
$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'type' => 'horizontal',
    'id' => 'activity_form',
    'enableAjaxValidation' => true,
    'stateful' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
));?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => 'Hello, world!',
)); ?>
<?php $str = "淫荡的一天又开始了！";
//echo CHtml::image("http://chart.apis.google.com/chart?chs=150x150&cht=qr&chld=L|0&chl=" . urlencode($str));
?>
<?php $this->endWidget(); ?>

<?php $this->endWidget(); ?>