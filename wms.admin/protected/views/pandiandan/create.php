<?php
$this->breadcrumbs=array(
	'Pandiandans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pandiandan','url'=>array('index')),
	array('label'=>'Manage Pandiandan','url'=>array('admin')),
);
?>

<h3>Create Pandiandan</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>