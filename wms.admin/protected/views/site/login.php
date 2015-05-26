<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'type' => 'horizontal',
    'id' => 'login-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>
    <legend>
        <h3>登录</h3>
    </legend>

    <fieldset>
        <?php echo $form->textFieldRow($model, 'username'); ?>
        <?php echo $form->passwordFieldRow($model, 'password'); ?>
        <?php echo $form->checkboxRow($model, 'rememberMe'); ?>
    </fieldset>


    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => '登陆'
        )); ?>
    </div>

<?php $this->endWidget(); ?>