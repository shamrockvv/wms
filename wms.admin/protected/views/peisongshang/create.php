<?php
$this->breadcrumbs=array(
	'Peisongshangs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Peisongshang','url'=>array('index')),
	array('label'=>'Manage Peisongshang','url'=>array('admin')),
);
?>

<h3>Create Peisongshang</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>