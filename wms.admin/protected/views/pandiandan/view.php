<?php
$this->breadcrumbs=array(
	'Pandiandans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pandiandan','url'=>array('index')),
	array('label'=>'Create Pandiandan','url'=>array('create')),
	array('label'=>'Update Pandiandan','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Pandiandan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pandiandan','url'=>array('admin')),
);
?>

<h3>View Pandiandan #<?php echo $model->id; ?></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'leixing',
		//'partner',
		'pandiandanhao',
		'fenqu_pandiandanhao',
		'kuweihao',
		'kehubianhao',
		'gonghuoshang',
		'suoshucangku',
		'shangpinmingcheng',
		'suoshukehu',
		'chuchang_bar',
		'nei_bar',
		//'total',
		'zhengcanleixing',
		'zhuangtai',
		//'input_man',
		//'createtime',
		//'isshenhe',
		//'shenhe_man',
		//'shenhe_time',
		//'isqueren',
		//'queren_man',
		//'queren_time',
		//'iszuofei',
		//'zuofei_man',
		//'zuofei_time',
	),
)); ?>
