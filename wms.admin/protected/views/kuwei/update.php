<?php
$this->breadcrumbs=array(
	'Kuweis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kuwei','url'=>array('index')),
	array('label'=>'Create Kuwei','url'=>array('create')),
	array('label'=>'View Kuwei','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Kuwei','url'=>array('admin')),
);
?>

<h3>Update Kuwei <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>