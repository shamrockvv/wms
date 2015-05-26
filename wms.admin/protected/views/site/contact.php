<?php
$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
	'Contact',
);
?>

<h3>Contact Us</h3>

<?php if (Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
	If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>


<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                          'type' => 'horizontal',
                                                                          'id' => 'contact-form',
                                                                          'enableClientValidation' => true,
                                                                          'clientOptions' => array(
	                                                                          'validateOnSubmit' => true,
                                                                          ),
                                                                     )); ?>
<fieldset>
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model, 'name'); ?>


	<?php echo $form->textFieldRow($model, 'email'); ?>


	<?php echo $form->textFieldRow($model, 'subject', array('size' => 60, 'maxlength' => 128)); ?>


	<?php echo $form->textAreaRow($model, 'body', array('rows' => 6, 'cols' => 50)); ?>


	<?php if (CCaptcha::checkRequirements()): ?>
	<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textFieldRow($model, 'verifyCode'); ?>
	</div>
	<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.
	</div>

	<?php endif; ?>
</fieldset>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
	                                                         'buttonType' => 'submit',
	                                                         'type' => 'primary',
	                                                         'label' => 'Submit'
	                                                    )); ?>
</div>

<?php $this->endWidget(); ?>

<?php endif; ?>