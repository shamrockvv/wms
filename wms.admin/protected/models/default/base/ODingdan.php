<?php

/**
 * This is the model class for table "dingdan".
 *
 * The followings are the available columns in table 'dingdan':
 * @property integer $id
 * @property string $pingtai
 * @property string $laiyuan
 * @property string $partner
 * @property string $user_id
 * @property string $order_type
 * @property string $order_type_explain
 * @property string $zhifufangshi
 * @property string $sys_dingdanbianhao
 * @property string $dingdanbianhao
 * @property string $fenjiandanhao
 * @property string $suoshukehu
 * @property string $kehubianhao
 * @property string $suoshucangku
 * @property string $dingdanjine
 * @property string $shouhuoren
 * @property string $youbian
 * @property string $sheng
 * @property string $shi
 * @property string $qu
 * @property string $dianhua
 * @property string $shouji
 * @property string $dizhi
 * @property string $fahuoren
 * @property string $fahuo_youbian
 * @property string $fahuo_sheng
 * @property string $fahuo_shi
 * @property string $fahuo_qu
 * @property string $fahuo_dizhi
 * @property string $fahuo_shouji
 * @property string $fahuo_dianhua
 * @property string $attributes
 * @property string $remark
 * @property string $order_create_time
 * @property string $order_flag
 * @property string $order_flag_explain
 * @property string $alipay_no
 * @property string $fapiao_type
 * @property string $fapiao_taitou
 * @property double $fapiao_jine
 * @property string $fapiao_neirong
 * @property double $youhuiquan
 * @property double $kouyouhuiquan
 * @property double $yunfei
 * @property double $yishoukuan
 * @property double $yingfukuan
 * @property integer $zongshuliang
 * @property double $total_amount
 * @property double $payable_amount
 * @property double $yingshou_amount
 * @property double $shishou_amount
 * @property double $daishou_amount
 * @property double $service_fee
 * @property string $schedule_type
 * @property string $schedule_type_explain
 * @property string $schedule_start
 * @property string $schedule_end
 * @property string $buyliuyan
 * @property string $saleliuyan
 * @property string $peisongshang
 * @property string $wuliudanhao
 * @property string $zhongliang
 * @property string $peisongfei
 * @property string $lururen
 * @property string $createtime
 * @property string $fapiaohao
 * @property string $invoice_info
 * @property string $order_remark
 * @property string $order_start_time
 * @property string $jingdong_chuku
 * @property string $bufayuanyin
 * @property string $kefu_time
 * @property string $chengzhongren
 * @property string $chengzhong_time
 * @property string $jiaojiedanhao
 * @property string $jiaojiedanhao_time
 * @property string $jiaojiedanhao_man
 * @property string $jiaojieren
 * @property string $jiaojietime
 * @property string $zuofei
 * @property string $zuofei_man
 * @property string $zuofei_time
 * @property string $huifu_man
 * @property string $huifu_time
 * @property string $ispost_luodipei
 * @property string $ispost_luodipei_time
 * @property string $ispost_luodipei_man
 * @property string $ispost_luodipei_back
 * @property string $ispost_luodipei_time_back
 * @property string $zhuangtai
 */
class ODingdan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dingdan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('createtime', 'required'),
			array('zongshuliang', 'numerical', 'integerOnly'=>true),
			array('fapiao_jine, youhuiquan, kouyouhuiquan, yunfei, yishoukuan, yingfukuan, total_amount, payable_amount, yingshou_amount, shishou_amount, daishou_amount, service_fee', 'numerical'),
			array('pingtai, laiyuan, zhifufangshi, fenjiandanhao, suoshukehu, shouhuoren, dianhua, shouji, fahuo_dizhi, fahuo_shouji, fahuo_dianhua, fapiao_taitou, schedule_type, schedule_start, schedule_end, peisongshang, zhongliang, peisongfei, lururen, fapiaohao, order_start_time, jingdong_chuku, ispost_luodipei, ispost_luodipei_time, ispost_luodipei_man, ispost_luodipei_back, ispost_luodipei_time_back', 'length', 'max'=>50),
			array('partner, order_flag, schedule_type_explain', 'length', 'max'=>100),
			array('user_id, order_type, order_type_explain, sys_dingdanbianhao, dingdanbianhao, suoshucangku, order_create_time, wuliudanhao, chengzhongren, chengzhong_time, jiaojiedanhao, jiaojiedanhao_time, jiaojietime, zuofei_time, huifu_time, zhuangtai', 'length', 'max'=>20),
			array('kehubianhao, dingdanjine, youbian, sheng, shi, qu, fahuo_youbian, fahuo_sheng, fahuo_shi, fahuo_qu, fapiao_type, jiaojiedanhao_man, jiaojieren, zuofei, zuofei_man, huifu_man', 'length', 'max'=>10),
			array('dizhi, fahuoren, attributes, remark, order_flag_explain, buyliuyan, saleliuyan, invoice_info, order_remark', 'length', 'max'=>255),
			array('alipay_no, fapiao_neirong, bufayuanyin', 'length', 'max'=>200),
			array('kefu_time', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pingtai, laiyuan, partner, user_id, order_type, order_type_explain, zhifufangshi, sys_dingdanbianhao, dingdanbianhao, fenjiandanhao, suoshukehu, kehubianhao, suoshucangku, dingdanjine, shouhuoren, youbian, sheng, shi, qu, dianhua, shouji, dizhi, fahuoren, fahuo_youbian, fahuo_sheng, fahuo_shi, fahuo_qu, fahuo_dizhi, fahuo_shouji, fahuo_dianhua, attributes, remark, order_create_time, order_flag, order_flag_explain, alipay_no, fapiao_type, fapiao_taitou, fapiao_jine, fapiao_neirong, youhuiquan, kouyouhuiquan, yunfei, yishoukuan, yingfukuan, zongshuliang, total_amount, payable_amount, yingshou_amount, shishou_amount, daishou_amount, service_fee, schedule_type, schedule_type_explain, schedule_start, schedule_end, buyliuyan, saleliuyan, peisongshang, wuliudanhao, zhongliang, peisongfei, lururen, createtime, fapiaohao, invoice_info, order_remark, order_start_time, jingdong_chuku, bufayuanyin, kefu_time, chengzhongren, chengzhong_time, jiaojiedanhao, jiaojiedanhao_time, jiaojiedanhao_man, jiaojieren, jiaojietime, zuofei, zuofei_man, zuofei_time, huifu_man, huifu_time, ispost_luodipei, ispost_luodipei_time, ispost_luodipei_man, ispost_luodipei_back, ispost_luodipei_time_back, zhuangtai', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pingtai' => 'Pingtai',
			'laiyuan' => 'Laiyuan',
			'partner' => 'Partner',
			'user_id' => 'User',
			'order_type' => 'Order Type',
			'order_type_explain' => 'Order Type Explain',
			'zhifufangshi' => 'Zhifufangshi',
			'sys_dingdanbianhao' => 'Sys Dingdanbianhao',
			'dingdanbianhao' => 'Dingdanbianhao',
			'fenjiandanhao' => 'Fenjiandanhao',
			'suoshukehu' => 'Suoshukehu',
			'kehubianhao' => 'Kehubianhao',
			'suoshucangku' => 'Suoshucangku',
			'dingdanjine' => 'Dingdanjine',
			'shouhuoren' => 'Shouhuoren',
			'youbian' => 'Youbian',
			'sheng' => 'Sheng',
			'shi' => 'Shi',
			'qu' => 'Qu',
			'dianhua' => 'Dianhua',
			'shouji' => 'Shouji',
			'dizhi' => 'Dizhi',
			'fahuoren' => 'Fahuoren',
			'fahuo_youbian' => 'Fahuo Youbian',
			'fahuo_sheng' => 'Fahuo Sheng',
			'fahuo_shi' => 'Fahuo Shi',
			'fahuo_qu' => 'Fahuo Qu',
			'fahuo_dizhi' => 'Fahuo Dizhi',
			'fahuo_shouji' => 'Fahuo Shouji',
			'fahuo_dianhua' => 'Fahuo Dianhua',
			'attributes' => 'Attributes',
			'remark' => 'Remark',
			'order_create_time' => 'Order Create Time',
			'order_flag' => 'Order Flag',
			'order_flag_explain' => 'Order Flag Explain',
			'alipay_no' => 'Alipay No',
			'fapiao_type' => 'Fapiao Type',
			'fapiao_taitou' => 'Fapiao Taitou',
			'fapiao_jine' => 'Fapiao Jine',
			'fapiao_neirong' => 'Fapiao Neirong',
			'youhuiquan' => 'Youhuiquan',
			'kouyouhuiquan' => 'Kouyouhuiquan',
			'yunfei' => 'Yunfei',
			'yishoukuan' => 'Yishoukuan',
			'yingfukuan' => 'Yingfukuan',
			'zongshuliang' => 'Zongshuliang',
			'total_amount' => 'Total Amount',
			'payable_amount' => 'Payable Amount',
			'yingshou_amount' => 'Yingshou Amount',
			'shishou_amount' => 'Shishou Amount',
			'daishou_amount' => 'Daishou Amount',
			'service_fee' => 'Service Fee',
			'schedule_type' => 'Schedule Type',
			'schedule_type_explain' => 'Schedule Type Explain',
			'schedule_start' => 'Schedule Start',
			'schedule_end' => 'Schedule End',
			'buyliuyan' => 'Buyliuyan',
			'saleliuyan' => 'Saleliuyan',
			'peisongshang' => 'Peisongshang',
			'wuliudanhao' => 'Wuliudanhao',
			'zhongliang' => 'Zhongliang',
			'peisongfei' => 'Peisongfei',
			'lururen' => 'Lururen',
			'createtime' => 'Createtime',
			'fapiaohao' => 'Fapiaohao',
			'invoice_info' => 'Invoice Info',
			'order_remark' => 'Order Remark',
			'order_start_time' => 'Order Start Time',
			'jingdong_chuku' => 'Jingdong Chuku',
			'bufayuanyin' => 'Bufayuanyin',
			'kefu_time' => 'Kefu Time',
			'chengzhongren' => 'Chengzhongren',
			'chengzhong_time' => 'Chengzhong Time',
			'jiaojiedanhao' => 'Jiaojiedanhao',
			'jiaojiedanhao_time' => 'Jiaojiedanhao Time',
			'jiaojiedanhao_man' => 'Jiaojiedanhao Man',
			'jiaojieren' => 'Jiaojieren',
			'jiaojietime' => 'Jiaojietime',
			'zuofei' => 'Zuofei',
			'zuofei_man' => 'Zuofei Man',
			'zuofei_time' => 'Zuofei Time',
			'huifu_man' => 'Huifu Man',
			'huifu_time' => 'Huifu Time',
			'ispost_luodipei' => 'Ispost Luodipei',
			'ispost_luodipei_time' => 'Ispost Luodipei Time',
			'ispost_luodipei_man' => 'Ispost Luodipei Man',
			'ispost_luodipei_back' => 'Ispost Luodipei Back',
			'ispost_luodipei_time_back' => 'Ispost Luodipei Time Back',
			'zhuangtai' => 'Zhuangtai',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('pingtai',$this->pingtai,true);
		$criteria->compare('laiyuan',$this->laiyuan,true);
		$criteria->compare('partner',$this->partner,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('order_type',$this->order_type,true);
		$criteria->compare('order_type_explain',$this->order_type_explain,true);
		$criteria->compare('zhifufangshi',$this->zhifufangshi,true);
		$criteria->compare('sys_dingdanbianhao',$this->sys_dingdanbianhao,true);
		$criteria->compare('dingdanbianhao',$this->dingdanbianhao,true);
		$criteria->compare('fenjiandanhao',$this->fenjiandanhao,true);
		$criteria->compare('suoshukehu',$this->suoshukehu,true);
		$criteria->compare('kehubianhao',$this->kehubianhao,true);
		$criteria->compare('suoshucangku',$this->suoshucangku,true);
		$criteria->compare('dingdanjine',$this->dingdanjine,true);
		$criteria->compare('shouhuoren',$this->shouhuoren,true);
		$criteria->compare('youbian',$this->youbian,true);
		$criteria->compare('sheng',$this->sheng,true);
		$criteria->compare('shi',$this->shi,true);
		$criteria->compare('qu',$this->qu,true);
		$criteria->compare('dianhua',$this->dianhua,true);
		$criteria->compare('shouji',$this->shouji,true);
		$criteria->compare('dizhi',$this->dizhi,true);
		$criteria->compare('fahuoren',$this->fahuoren,true);
		$criteria->compare('fahuo_youbian',$this->fahuo_youbian,true);
		$criteria->compare('fahuo_sheng',$this->fahuo_sheng,true);
		$criteria->compare('fahuo_shi',$this->fahuo_shi,true);
		$criteria->compare('fahuo_qu',$this->fahuo_qu,true);
		$criteria->compare('fahuo_dizhi',$this->fahuo_dizhi,true);
		$criteria->compare('fahuo_shouji',$this->fahuo_shouji,true);
		$criteria->compare('fahuo_dianhua',$this->fahuo_dianhua,true);
		$criteria->compare('attributes',$this->attributes,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('order_create_time',$this->order_create_time,true);
		$criteria->compare('order_flag',$this->order_flag,true);
		$criteria->compare('order_flag_explain',$this->order_flag_explain,true);
		$criteria->compare('alipay_no',$this->alipay_no,true);
		$criteria->compare('fapiao_type',$this->fapiao_type,true);
		$criteria->compare('fapiao_taitou',$this->fapiao_taitou,true);
		$criteria->compare('fapiao_jine',$this->fapiao_jine);
		$criteria->compare('fapiao_neirong',$this->fapiao_neirong,true);
		$criteria->compare('youhuiquan',$this->youhuiquan);
		$criteria->compare('kouyouhuiquan',$this->kouyouhuiquan);
		$criteria->compare('yunfei',$this->yunfei);
		$criteria->compare('yishoukuan',$this->yishoukuan);
		$criteria->compare('yingfukuan',$this->yingfukuan);
		$criteria->compare('zongshuliang',$this->zongshuliang);
		$criteria->compare('total_amount',$this->total_amount);
		$criteria->compare('payable_amount',$this->payable_amount);
		$criteria->compare('yingshou_amount',$this->yingshou_amount);
		$criteria->compare('shishou_amount',$this->shishou_amount);
		$criteria->compare('daishou_amount',$this->daishou_amount);
		$criteria->compare('service_fee',$this->service_fee);
		$criteria->compare('schedule_type',$this->schedule_type,true);
		$criteria->compare('schedule_type_explain',$this->schedule_type_explain,true);
		$criteria->compare('schedule_start',$this->schedule_start,true);
		$criteria->compare('schedule_end',$this->schedule_end,true);
		$criteria->compare('buyliuyan',$this->buyliuyan,true);
		$criteria->compare('saleliuyan',$this->saleliuyan,true);
		$criteria->compare('peisongshang',$this->peisongshang,true);
		$criteria->compare('wuliudanhao',$this->wuliudanhao,true);
		$criteria->compare('zhongliang',$this->zhongliang,true);
		$criteria->compare('peisongfei',$this->peisongfei,true);
		$criteria->compare('lururen',$this->lururen,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('fapiaohao',$this->fapiaohao,true);
		$criteria->compare('invoice_info',$this->invoice_info,true);
		$criteria->compare('order_remark',$this->order_remark,true);
		$criteria->compare('order_start_time',$this->order_start_time,true);
		$criteria->compare('jingdong_chuku',$this->jingdong_chuku,true);
		$criteria->compare('bufayuanyin',$this->bufayuanyin,true);
		$criteria->compare('kefu_time',$this->kefu_time,true);
		$criteria->compare('chengzhongren',$this->chengzhongren,true);
		$criteria->compare('chengzhong_time',$this->chengzhong_time,true);
		$criteria->compare('jiaojiedanhao',$this->jiaojiedanhao,true);
		$criteria->compare('jiaojiedanhao_time',$this->jiaojiedanhao_time,true);
		$criteria->compare('jiaojiedanhao_man',$this->jiaojiedanhao_man,true);
		$criteria->compare('jiaojieren',$this->jiaojieren,true);
		$criteria->compare('jiaojietime',$this->jiaojietime,true);
		$criteria->compare('zuofei',$this->zuofei,true);
		$criteria->compare('zuofei_man',$this->zuofei_man,true);
		$criteria->compare('zuofei_time',$this->zuofei_time,true);
		$criteria->compare('huifu_man',$this->huifu_man,true);
		$criteria->compare('huifu_time',$this->huifu_time,true);
		$criteria->compare('ispost_luodipei',$this->ispost_luodipei,true);
		$criteria->compare('ispost_luodipei_time',$this->ispost_luodipei_time,true);
		$criteria->compare('ispost_luodipei_man',$this->ispost_luodipei_man,true);
		$criteria->compare('ispost_luodipei_back',$this->ispost_luodipei_back,true);
		$criteria->compare('ispost_luodipei_time_back',$this->ispost_luodipei_time_back,true);
		$criteria->compare('zhuangtai',$this->zhuangtai,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ODingdan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
