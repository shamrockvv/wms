<?php
$this->breadcrumbs=array(
	'Pandiandans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pandiandan','url'=>array('index')),
	array('label'=>'Create Pandiandan','url'=>array('create')),
	array('label'=>'View Pandiandan','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Pandiandan','url'=>array('admin')),
);
?>

<h3>Update Pandiandan <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>