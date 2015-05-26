<?php
$this->breadcrumbs=array(
	'基本资料'=>array('index'),
	'产品资料管理',
);

$this->menu=array(
	array('label'=>'产品资料列表','url'=>array('index')),
	array('label'=>'创建产品资料','url'=>array('create')),
    array('label'=>'批量导入产品资料','url'=>array('import')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('chanpinziliao-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>产品资料管理</h3>

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
	'id'=>'chanpinziliao-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'beidacang_productid',
		//'partner',
		'chuchang_bar',
		//'nei_bar',
		'shangpinmingcheng',

		'suoshucangku',
		'suoshukehu',
        /*
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
    */
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
