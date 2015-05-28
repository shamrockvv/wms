<div class="well view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pingtai')); ?>:</b>
	<?php echo CHtml::encode($data->pingtai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('laiyuan')); ?>:</b>
	<?php echo CHtml::encode($data->laiyuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('partner')); ?>:</b>
	<?php echo CHtml::encode($data->partner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_type')); ?>:</b>
	<?php echo CHtml::encode($data->order_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_type_explain')); ?>:</b>
	<?php echo CHtml::encode($data->order_type_explain); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('zhifufangshi')); ?>:</b>
	<?php echo CHtml::encode($data->zhifufangshi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sys_dingdanbianhao')); ?>:</b>
	<?php echo CHtml::encode($data->sys_dingdanbianhao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dingdanbianhao')); ?>:</b>
	<?php echo CHtml::encode($data->dingdanbianhao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fenjiandanhao')); ?>:</b>
	<?php echo CHtml::encode($data->fenjiandanhao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suoshukehu')); ?>:</b>
	<?php echo CHtml::encode($data->suoshukehu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kehubianhao')); ?>:</b>
	<?php echo CHtml::encode($data->kehubianhao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suoshucangku')); ?>:</b>
	<?php echo CHtml::encode($data->suoshucangku); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dingdanjine')); ?>:</b>
	<?php echo CHtml::encode($data->dingdanjine); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shouhuoren')); ?>:</b>
	<?php echo CHtml::encode($data->shouhuoren); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('youbian')); ?>:</b>
	<?php echo CHtml::encode($data->youbian); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sheng')); ?>:</b>
	<?php echo CHtml::encode($data->sheng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shi')); ?>:</b>
	<?php echo CHtml::encode($data->shi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qu')); ?>:</b>
	<?php echo CHtml::encode($data->qu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dianhua')); ?>:</b>
	<?php echo CHtml::encode($data->dianhua); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shouji')); ?>:</b>
	<?php echo CHtml::encode($data->shouji); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dizhi')); ?>:</b>
	<?php echo CHtml::encode($data->dizhi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fahuoren')); ?>:</b>
	<?php echo CHtml::encode($data->fahuoren); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fahuo_youbian')); ?>:</b>
	<?php echo CHtml::encode($data->fahuo_youbian); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fahuo_sheng')); ?>:</b>
	<?php echo CHtml::encode($data->fahuo_sheng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fahuo_shi')); ?>:</b>
	<?php echo CHtml::encode($data->fahuo_shi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fahuo_qu')); ?>:</b>
	<?php echo CHtml::encode($data->fahuo_qu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fahuo_dizhi')); ?>:</b>
	<?php echo CHtml::encode($data->fahuo_dizhi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fahuo_shouji')); ?>:</b>
	<?php echo CHtml::encode($data->fahuo_shouji); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fahuo_dianhua')); ?>:</b>
	<?php echo CHtml::encode($data->fahuo_dianhua); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attributes')); ?>:</b>
	<?php echo CHtml::encode($data->attributes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
	<?php echo CHtml::encode($data->remark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_create_time')); ?>:</b>
	<?php echo CHtml::encode($data->order_create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_flag')); ?>:</b>
	<?php echo CHtml::encode($data->order_flag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_flag_explain')); ?>:</b>
	<?php echo CHtml::encode($data->order_flag_explain); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alipay_no')); ?>:</b>
	<?php echo CHtml::encode($data->alipay_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fapiao_type')); ?>:</b>
	<?php echo CHtml::encode($data->fapiao_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fapiao_taitou')); ?>:</b>
	<?php echo CHtml::encode($data->fapiao_taitou); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fapiao_jine')); ?>:</b>
	<?php echo CHtml::encode($data->fapiao_jine); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fapiao_neirong')); ?>:</b>
	<?php echo CHtml::encode($data->fapiao_neirong); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('youhuiquan')); ?>:</b>
	<?php echo CHtml::encode($data->youhuiquan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kouyouhuiquan')); ?>:</b>
	<?php echo CHtml::encode($data->kouyouhuiquan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('yunfei')); ?>:</b>
	<?php echo CHtml::encode($data->yunfei); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('yishoukuan')); ?>:</b>
	<?php echo CHtml::encode($data->yishoukuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('yingfukuan')); ?>:</b>
	<?php echo CHtml::encode($data->yingfukuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zongshuliang')); ?>:</b>
	<?php echo CHtml::encode($data->zongshuliang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_amount')); ?>:</b>
	<?php echo CHtml::encode($data->total_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payable_amount')); ?>:</b>
	<?php echo CHtml::encode($data->payable_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('yingshou_amount')); ?>:</b>
	<?php echo CHtml::encode($data->yingshou_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shishou_amount')); ?>:</b>
	<?php echo CHtml::encode($data->shishou_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('daishou_amount')); ?>:</b>
	<?php echo CHtml::encode($data->daishou_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_fee')); ?>:</b>
	<?php echo CHtml::encode($data->service_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schedule_type')); ?>:</b>
	<?php echo CHtml::encode($data->schedule_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schedule_type_explain')); ?>:</b>
	<?php echo CHtml::encode($data->schedule_type_explain); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schedule_start')); ?>:</b>
	<?php echo CHtml::encode($data->schedule_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schedule_end')); ?>:</b>
	<?php echo CHtml::encode($data->schedule_end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buyliuyan')); ?>:</b>
	<?php echo CHtml::encode($data->buyliuyan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saleliuyan')); ?>:</b>
	<?php echo CHtml::encode($data->saleliuyan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peisongshang')); ?>:</b>
	<?php echo CHtml::encode($data->peisongshang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wuliudanhao')); ?>:</b>
	<?php echo CHtml::encode($data->wuliudanhao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zhongliang')); ?>:</b>
	<?php echo CHtml::encode($data->zhongliang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peisongfei')); ?>:</b>
	<?php echo CHtml::encode($data->peisongfei); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lururen')); ?>:</b>
	<?php echo CHtml::encode($data->lururen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createtime')); ?>:</b>
	<?php echo CHtml::encode($data->createtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fapiaohao')); ?>:</b>
	<?php echo CHtml::encode($data->fapiaohao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_info')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_remark')); ?>:</b>
	<?php echo CHtml::encode($data->order_remark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_start_time')); ?>:</b>
	<?php echo CHtml::encode($data->order_start_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jingdong_chuku')); ?>:</b>
	<?php echo CHtml::encode($data->jingdong_chuku); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bufayuanyin')); ?>:</b>
	<?php echo CHtml::encode($data->bufayuanyin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kefu_time')); ?>:</b>
	<?php echo CHtml::encode($data->kefu_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chengzhongren')); ?>:</b>
	<?php echo CHtml::encode($data->chengzhongren); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chengzhong_time')); ?>:</b>
	<?php echo CHtml::encode($data->chengzhong_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jiaojiedanhao')); ?>:</b>
	<?php echo CHtml::encode($data->jiaojiedanhao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jiaojiedanhao_time')); ?>:</b>
	<?php echo CHtml::encode($data->jiaojiedanhao_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jiaojiedanhao_man')); ?>:</b>
	<?php echo CHtml::encode($data->jiaojiedanhao_man); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jiaojieren')); ?>:</b>
	<?php echo CHtml::encode($data->jiaojieren); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jiaojietime')); ?>:</b>
	<?php echo CHtml::encode($data->jiaojietime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zuofei')); ?>:</b>
	<?php echo CHtml::encode($data->zuofei); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zuofei_man')); ?>:</b>
	<?php echo CHtml::encode($data->zuofei_man); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zuofei_time')); ?>:</b>
	<?php echo CHtml::encode($data->zuofei_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('huifu_man')); ?>:</b>
	<?php echo CHtml::encode($data->huifu_man); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('huifu_time')); ?>:</b>
	<?php echo CHtml::encode($data->huifu_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ispost_luodipei')); ?>:</b>
	<?php echo CHtml::encode($data->ispost_luodipei); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ispost_luodipei_time')); ?>:</b>
	<?php echo CHtml::encode($data->ispost_luodipei_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ispost_luodipei_man')); ?>:</b>
	<?php echo CHtml::encode($data->ispost_luodipei_man); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ispost_luodipei_back')); ?>:</b>
	<?php echo CHtml::encode($data->ispost_luodipei_back); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ispost_luodipei_time_back')); ?>:</b>
	<?php echo CHtml::encode($data->ispost_luodipei_time_back); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zhuangtai')); ?>:</b>
	<?php echo CHtml::encode($data->zhuangtai); ?>
	<br />

	*/ ?>

</div>