<?php
$this->breadcrumbs=array(
	'Shangjiadans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Shangjiadan','url'=>array('index')),
	array('label'=>'Manage Shangjiadan','url'=>array('admin')),
);
?>

<h3>Create Shangjiadan</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>