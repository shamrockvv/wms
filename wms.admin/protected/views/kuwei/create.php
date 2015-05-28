<?php
$this->breadcrumbs=array(
	'Kuweis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kuwei','url'=>array('index')),
	array('label'=>'Manage Kuwei','url'=>array('admin')),
);
?>

<h3>Create Kuwei</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>