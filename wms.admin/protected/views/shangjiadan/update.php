<?php
$this->breadcrumbs=array(
	'Shangjiadans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Shangjiadan','url'=>array('index')),
	array('label'=>'Create Shangjiadan','url'=>array('create')),
	array('label'=>'View Shangjiadan','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Shangjiadan','url'=>array('admin')),
);
?>

<h3>Update Shangjiadan <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>