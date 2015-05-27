<?php
$this->breadcrumbs=array(
	'Cangkus'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cangku','url'=>array('index')),
	array('label'=>'Create Cangku','url'=>array('create')),
	array('label'=>'View Cangku','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Cangku','url'=>array('admin')),
);
?>

<h3>Update Cangku <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>