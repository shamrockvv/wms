<?php
$this->breadcrumbs=array(
	'Kuweis'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Kuwei','url'=>array('index')),
	array('label'=>'Create Kuwei','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('kuwei-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Manage Kuweis</h3>

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
	'id'=>'kuwei-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'partner',
		'kuweihao',
		'suoshucangku',
		'gonghuoshang',
		'suoshukehu',
		/*
		'kehubianhao',
		'zhengcanleixing',
		'total',
		'frozen',
		'fanchang_frozen',
		'dingdan_frozen',
		'yishi_frozen',
		'chayishuliang',
		'shangpinyouxiaoqi',
		'baozhiqi',
		'shengchanriqi',
		'youxiaoqitianshu',
		'shangpinmingcheng',
		'chuchang_bar',
		'nei_bar',
		'input_man',
		'createtime',
		'leixing',
		'lock',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
