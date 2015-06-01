<?php
$this->breadcrumbs=array(
	'Shangjiadans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Shangjiadan','url'=>array('index')),
	array('label'=>'Create Shangjiadan','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('shangjiadan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Manage Shangjiadans</h3>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'shangjiadan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'partner',
		'laiyuan',
		'shangjiadanhao',
		'order_code',
		'suoshukehu',
		/*
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
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
