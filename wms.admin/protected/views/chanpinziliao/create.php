<?php
$this->breadcrumbs=array(
	'Chanpinziliaos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Chanpinziliao','url'=>array('index')),
	array('label'=>'Manage Chanpinziliao','url'=>array('admin')),
);
?>

<h3>Create Chanpinziliao</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>