<?php
$this->breadcrumbs=array(
	'Chanpinziliaos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Chanpinziliao','url'=>array('index')),
	array('label'=>'Create Chanpinziliao','url'=>array('create')),
	array('label'=>'View Chanpinziliao','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Chanpinziliao','url'=>array('admin')),
);
?>

<h3>Update Chanpinziliao <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>