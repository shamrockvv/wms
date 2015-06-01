<?php
$this->breadcrumbs=array(
	'Kuweis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Kuwei','url'=>array('index')),
	array('label'=>'Create Kuwei','url'=>array('create')),
	array('label'=>'Update Kuwei','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Kuwei','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kuwei','url'=>array('admin')),
);
?>

<h3>View Kuwei #<?php echo $model->id; ?></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'partner',
		'kuweihao',
		'suoshucangku',
		//'gonghuoshang',
		'suoshukehu',
		'kehubianhao',
		//'zhengcanleixing',
		//'total',
		//'frozen',
		//'fanchang_frozen',
		//'dingdan_frozen',
		//'yishi_frozen',
		//'chayishuliang',
		//'shangpinyouxiaoqi',
		//'baozhiqi',
		//'shengchanriqi',
		//'youxiaoqitianshu',
		//'shangpinmingcheng',
		//'chuchang_bar',
		//'nei_bar',
		'input_man',
		'createtime',
		//'leixing',
		//'lock',
	),
)); ?>
