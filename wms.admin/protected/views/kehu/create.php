<?php
$this->breadcrumbs=array(
	'客户资料'=>array('index'),
	'创建客户资料',
);

$this->menu=array(
	array('label'=>'客户资料列表','url'=>array('index')),
	array('label'=>'客户资料管理','url'=>array('admin')),
);
?>

<h3>创建客户资料</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>