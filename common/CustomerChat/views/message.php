<?php
/**
 * Created by JetBrains PhpStorm.
 * User: peipei
 * Date: 13-3-22
 * Time: 下午5:44
 * To change this template use File | Settings | File Templates.
 */?>
<body>
<link rel="stylesheet"
      type="text/css"
      href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/chatbox.css"/>
<div id="guest">
    <div id="guest_top">
        <div class="logo">WeLive在线客服系统</div>
        <div id="guestinfo">$welcome_info</div>
    </div>

    <div class="comment">
        <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'message-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions' => array(
        'onSubmit' => 'return chkForm(this)',
    ),
));
 ?>
            <input type="hidden" name="username" value="<?php echo $kfname?>"/>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="100"><b>留言给</b>&nbsp;&nbsp;</td>
                    <td><?php echo $kfname?>&nbsp;</td>
                    <?php echo $form->hiddenField($model,'to_id',array('value'=>$kfid));?>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'contact');?>&nbsp;&nbsp;</td>
                    <td><?php echo $form->textField($model,'contact',array('class'=>"input-text"));?><?php echo $form->error($model, 'contact'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'mobile');?>&nbsp;&nbsp;</td>
                    <td><?php echo $form->textField($model,'mobile',array('class'=>"input-text"));?><?php echo $form->error($model, 'mobile'); ?></td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'qq');?>&nbsp;&nbsp;</td>
                    <td><?php echo $form->textField($model,'qq',array('class'=>"input-text"));?><?php echo $form->error($model, 'qq'); ?></td>
                    <div class="errorMessage" id="MessageForm_qq_em" class="errorMessage" style="display:none"></div>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'content');?>&nbsp;&nbsp;</td>
                    <td><?php echo $form->textArea($model,'content',array('class'=>"content"));?><?php echo $form->error($model, 'content'); ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><BR><?php echo CHtml::submitButton('保存');?></td>
                </tr>

            </table>
       <?php $this->endWidget();?>
    </div>

    <div id="guest_bottom">
        <div class="sysinfo_div"></div>
        <div id="loading"></div>
        <div class="copyright" id="copyright">© 2013 在线客服系统(v3.2.0)</div>
    </div>
</div>
</body>
<script type="text/javascript">
    function chkForm(obj){
        if($("#MessageForm_mobile").val()=='' && $("#MessageForm_qq").val()==''){
            $("#MessageForm_qq_em").html('请手机和QQ任填一项！');
            $("#MessageForm_qq_em").css('display','');
            return false;
        }else{
            $("#MessageForm_qq_em").css('display','none');
            return true;
        }

    }
</script>