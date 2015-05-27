<?php
$this->breadcrumbs=array(
	'Peisongshangs',
);

$this->menu=array(
	array('label'=>'Create Peisongshang','url'=>array('create')),
	array('label'=>'Manage Peisongshang','url'=>array('admin')),
);
?>

<h3>Peisongshangs</h3>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
