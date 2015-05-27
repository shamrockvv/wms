<?php
$this->breadcrumbs=array(
	'Peisongshangs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Peisongshang','url'=>array('index')),
	array('label'=>'Create Peisongshang','url'=>array('create')),
	array('label'=>'Update Peisongshang','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Peisongshang','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Peisongshang','url'=>array('admin')),
);
?>

<h3>View Peisongshang #<?php echo $model->id; ?></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'peisongshangname',
		'linkphone',
		'linkman',
		'address',
		'qq',
		'netaddress',
		'remark',
		//'createtime',
	),
)); ?>
