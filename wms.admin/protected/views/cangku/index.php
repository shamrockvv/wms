<?php
$this->breadcrumbs=array(
	'Cangkus',
);

$this->menu=array(
	array('label'=>'Create Cangku','url'=>array('create')),
	array('label'=>'Manage Cangku','url'=>array('admin')),
);
?>

<h3>Cangkus</h3>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
