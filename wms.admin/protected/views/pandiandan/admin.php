<?php
$this->breadcrumbs = array(
    'Pandiandans' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Pandiandan', 'url' => array('index')),
    array('label' => 'Create Pandiandan', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pandiandan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Manage Pandiandans</h3>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'pandiandan-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
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
        /*
    'total',
    'zhengcanleixing',
    'zhuangtai',
    'input_man',
    'createtime',
    'isshenhe',
    'shenhe_man',
    'shenhe_time',
    'isqueren',
    'queren_man',
    'queren_time',
    'iszuofei',
    'zuofei_man',
    'zuofei_time',
    */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>
