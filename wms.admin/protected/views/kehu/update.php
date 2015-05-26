<?php
$this->breadcrumbs=array(
	'客户资料'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'更新',
);

$this->menu=array(
	array('label'=>'客户资料列表','url'=>array('index')),
	array('label'=>'创建客户资料','url'=>array('create')),
	array('label'=>'查看客户资料','url'=>array('view','id'=>$model->id)),
	array('label'=>'客户资料管理','url'=>array('admin')),
);
?>

<h3>更新客户资料 <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>