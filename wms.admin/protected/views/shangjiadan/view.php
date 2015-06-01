<?php
$this->breadcrumbs=array(
	'Shangjiadans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Shangjiadan','url'=>array('index')),
	array('label'=>'Create Shangjiadan','url'=>array('create')),
	array('label'=>'Update Shangjiadan','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Shangjiadan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Shangjiadan','url'=>array('admin')),
);
?>

<h3>View Shangjiadan #<?php echo $model->id; ?></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'partner',
		'laiyuan',
		'shangjiadanhao',
		'order_code',
		'suoshukehu',
		'kehubianhao',
		'suoshucangku',
		'order_type_explain',
		'xiaoshouleixing',
		'rukucangku',
		'gonghuoshang',
		'zhengcanleixing',
		'remark',
		'shangpinmingcheng',
		'chuchang_bar',
		'nei_bar',
		'chengbenjia',
		'caigoujia',
		'wangluodanjia',
		'yuyueshuliang',
		'shangjiashuliang',
		'shangpinyouxiaoqi',
		'baozhiqi',
		'shengchanriqi',
		'youxiaoqitianshu',
		'kuweihao',
		'caozuoren',
		'createtime',
		'isshangjia',
		'querenren',
		'queren_time',
	),
)); ?>
