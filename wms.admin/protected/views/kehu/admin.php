<?php
$this->breadcrumbs=array(
	'基本资料'=>array('index'),
	'客户资料',
);

$this->menu=array(
	array('label'=>'客户资料列表','url'=>array('index')),
	array('label'=>'创建客户资料','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('kehu-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>客户资料管理</h3>

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
	'id'=>'kehu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'partner',
		'laiyuan',
		'kehubianhao',
		'user_id',
		'kehuname',
		/*
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
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
