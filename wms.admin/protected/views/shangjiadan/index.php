<?php
$this->breadcrumbs=array(
	'Shangjiadans',
);

$this->menu=array(
	array('label'=>'Create Shangjiadan','url'=>array('create')),
	array('label'=>'Manage Shangjiadan','url'=>array('admin')),
);
?>

<h3>Shangjiadans</h3>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
