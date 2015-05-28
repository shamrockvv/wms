<?php
$this->breadcrumbs=array(
	'Dingdans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dingdan','url'=>array('index')),
	array('label'=>'Create Dingdan','url'=>array('create')),
	array('label'=>'View Dingdan','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Dingdan','url'=>array('admin')),
);
?>

<h3>Update Dingdan <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>