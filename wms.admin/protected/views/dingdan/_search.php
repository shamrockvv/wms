<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pingtai',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'laiyuan',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'partner',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'order_type',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'order_type_explain',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'zhifufangshi',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'sys_dingdanbianhao',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'dingdanbianhao',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'fenjiandanhao',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'suoshukehu',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'kehubianhao',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'suoshucangku',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'dingdanjine',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'shouhuoren',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'youbian',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'sheng',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'shi',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'qu',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'dianhua',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'shouji',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'dizhi',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'fahuoren',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'fahuo_youbian',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'fahuo_sheng',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'fahuo_shi',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'fahuo_qu',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'fahuo_dizhi',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'fahuo_shouji',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'fahuo_dianhua',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'attributes',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'remark',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'order_create_time',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'order_flag',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'order_flag_explain',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'alipay_no',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'fapiao_type',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'fapiao_taitou',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'fapiao_jine',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fapiao_neirong',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'youhuiquan',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'kouyouhuiquan',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'yunfei',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'yishoukuan',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'yingfukuan',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'zongshuliang',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'total_amount',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'payable_amount',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'yingshou_amount',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'shishou_amount',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'daishou_amount',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'service_fee',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'schedule_type',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'schedule_type_explain',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'schedule_start',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'schedule_end',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'buyliuyan',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'saleliuyan',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'peisongshang',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'wuliudanhao',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'zhongliang',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'peisongfei',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'lururen',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'createtime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fapiaohao',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'invoice_info',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'order_remark',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'order_start_time',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'jingdong_chuku',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'bufayuanyin',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'kefu_time',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'chengzhongren',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'chengzhong_time',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'jiaojiedanhao',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'jiaojiedanhao_time',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'jiaojiedanhao_man',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'jiaojieren',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'jiaojietime',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'zuofei',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'zuofei_man',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'zuofei_time',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'huifu_man',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'huifu_time',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'ispost_luodipei',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'ispost_luodipei_time',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'ispost_luodipei_man',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'ispost_luodipei_back',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'ispost_luodipei_time_back',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'zhuangtai',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
