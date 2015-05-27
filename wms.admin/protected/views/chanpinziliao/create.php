<?php
$this->breadcrumbs=array(
	'产品资料'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'产品资料列表','url'=>array('index')),
	array('label'=>'产品资料管理','url'=>array('admin')),
);
?>

<h3>创建产品资料</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>