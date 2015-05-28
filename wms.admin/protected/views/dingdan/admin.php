<?php
$this->breadcrumbs=array(
	'Dingdans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Dingdan','url'=>array('index')),
	array('label'=>'Create Dingdan','url'=>array('create')),
    array('label'=>'Import Dingdan','url'=>array('import')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('dingdan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>订单管理</h3>

<div>

</div>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'dingdan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'pingtai',
		'laiyuan',
		'partner',
		'user_id',
		'order_type',
		/*
		'order_type_explain',
		'zhifufangshi',
		'sys_dingdanbianhao',
		'dingdanbianhao',
		'fenjiandanhao',
		'suoshukehu',
		'kehubianhao',
		'suoshucangku',
		'dingdanjine',
		'shouhuoren',
		'youbian',
		'sheng',
		'shi',
		'qu',
		'dianhua',
		'shouji',
		'dizhi',
		'fahuoren',
		'fahuo_youbian',
		'fahuo_sheng',
		'fahuo_shi',
		'fahuo_qu',
		'fahuo_dizhi',
		'fahuo_shouji',
		'fahuo_dianhua',
		'attributes',
		'remark',
		'order_create_time',
		'order_flag',
		'order_flag_explain',
		'alipay_no',
		'fapiao_type',
		'fapiao_taitou',
		'fapiao_jine',
		'fapiao_neirong',
		'youhuiquan',
		'kouyouhuiquan',
		'yunfei',
		'yishoukuan',
		'yingfukuan',
		'zongshuliang',
		'total_amount',
		'payable_amount',
		'yingshou_amount',
		'shishou_amount',
		'daishou_amount',
		'service_fee',
		'schedule_type',
		'schedule_type_explain',
		'schedule_start',
		'schedule_end',
		'buyliuyan',
		'saleliuyan',
		'peisongshang',
		'wuliudanhao',
		'zhongliang',
		'peisongfei',
		'lururen',
		'createtime',
		'fapiaohao',
		'invoice_info',
		'order_remark',
		'order_start_time',
		'jingdong_chuku',
		'bufayuanyin',
		'kefu_time',
		'chengzhongren',
		'chengzhong_time',
		'jiaojiedanhao',
		'jiaojiedanhao_time',
		'jiaojiedanhao_man',
		'jiaojieren',
		'jiaojietime',
		'zuofei',
		'zuofei_man',
		'zuofei_time',
		'huifu_man',
		'huifu_time',
		'ispost_luodipei',
		'ispost_luodipei_time',
		'ispost_luodipei_man',
		'ispost_luodipei_back',
		'ispost_luodipei_time_back',
		'zhuangtai',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
