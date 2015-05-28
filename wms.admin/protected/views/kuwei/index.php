<?php
$this->breadcrumbs=array(
	'Kuweis',
);

$this->menu=array(
	array('label'=>'Create Kuwei','url'=>array('create')),
	array('label'=>'Manage Kuwei','url'=>array('admin')),
);
?>

<h3>Kuweis</h3>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
