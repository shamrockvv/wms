<?php
$this->breadcrumbs=array(
	'产品资料',
);

$this->menu=array(
	array('label'=>'创建产品资料','url'=>array('create')),
	array('label'=>'产品资料管理','url'=>array('admin')),
);
?>

<h3>产品资料列表</h3>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
