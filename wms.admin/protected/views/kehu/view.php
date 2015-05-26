<?php
$this->breadcrumbs=array(
	'客户资料'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'客户资料列表','url'=>array('index')),
	array('label'=>'创建客户资料','url'=>array('create')),
	array('label'=>'修改客户资料','url'=>array('update','id'=>$model->id)),
	array('label'=>'删除客户资料','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理客户资料','url'=>array('admin')),
);
?>

<h3>查看客户资料 #<?php echo $model->id; ?></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'partner',
		'laiyuan',
		'kehubianhao',
		'user_id',
		'kehuname',
		'linkphone',
		'linkmobile',
		'linkman',
		'address',
		'qq',
		'netaddress',
		'remark',
		'wuliu',
		'input_man',
		'createtime',
		'zancunkuwei',
		'dingdan_zancunkuwei',
		'kucunfanchang_zancunkuwei',
	),
)); ?>
