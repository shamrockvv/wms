<?php
$this->breadcrumbs=array(
	'Peisongshangs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Peisongshang','url'=>array('index')),
	array('label'=>'Create Peisongshang','url'=>array('create')),
	array('label'=>'View Peisongshang','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Peisongshang','url'=>array('admin')),
);
?>

<h3>Update Peisongshang <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>