<?php
$this->breadcrumbs=array(
	'Dingdans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dingdan','url'=>array('index')),
	array('label'=>'Manage Dingdan','url'=>array('admin')),
);
?>

<h3>Create Dingdan</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>