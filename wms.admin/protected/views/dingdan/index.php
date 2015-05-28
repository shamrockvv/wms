<?php
$this->breadcrumbs=array(
	'Dingdans',
);

$this->menu=array(
	array('label'=>'Create Dingdan','url'=>array('create')),
	array('label'=>'Manage Dingdan','url'=>array('admin')),
);
?>

<h3>Dingdans</h3>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
