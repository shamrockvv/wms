<?php
$this->breadcrumbs=array(
	'Cangkus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cangku','url'=>array('index')),
	array('label'=>'Manage Cangku','url'=>array('admin')),
);
?>

<h3>Create Cangku</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>