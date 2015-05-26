<?php
$this->breadcrumbs=array(
	'Chanpinziliaos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Chanpinziliao','url'=>array('index')),
	array('label'=>'Create Chanpinziliao','url'=>array('create')),
	array('label'=>'Update Chanpinziliao','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Chanpinziliao','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Chanpinziliao','url'=>array('admin')),
);
?>

<h3>View Chanpinziliao #<?php echo $model->id; ?></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'beidacang_productid',
		'partner',
		'chuchang_bar',
		'nei_bar',
		'shangpinmingcheng',
		'suoshucangku',
		'suoshukehu',
		'kehubianhao',
		'lock',
		'lururen',
		'createtime',
		'Attributes',
		'sku',
		'yanse',
		'chima',
		'rongji',
		'jiage',
		'qikanhao',
		'fenlei_name1',
		'fenlei_name2',
		'fenlei_name3',
	),
)); ?>
