<?php
$this->breadcrumbs=array(
	'基本资料',
);

$this->menu=array(
	array('label'=>'创建客户资料','url'=>array('create')),
	array('label'=>'客户资料管理','url'=>array('admin')),
);
?>

<h3>客户资料</h3>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
