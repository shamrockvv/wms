<?php
$this->breadcrumbs=array(
	'Pandiandans',
);

$this->menu=array(
	array('label'=>'Create Pandiandan','url'=>array('create')),
	array('label'=>'Manage Pandiandan','url'=>array('admin')),
);
?>

<h3>Pandiandans</h3>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
