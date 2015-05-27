<?php
$this->breadcrumbs=array(
	'Cangkus'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cangku','url'=>array('index')),
	array('label'=>'Create Cangku','url'=>array('create')),
	array('label'=>'Update Cangku','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Cangku','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cangku','url'=>array('admin')),
);
?>

<h3>View Cangku #<?php echo $model->id; ?></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cangkuid',
		'cangkuname',
		'linkphone',
		'linkman',
		'address',
		'lock',
		'createtime',
		'store_code',
		'input_man',
	),
)); ?>
