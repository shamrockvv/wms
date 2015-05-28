<?php

/**
 * This is the model class for table "baoguo".
 *
 * The followings are the available columns in table 'baoguo':
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
 * @property string $baoguohao
 * @property string $shangpinmingcheng
 * @property string $suoshucangku
 * @property string $suoshukehu
 * @property string $kehubianhao
 * @property string $kuweihao
 * @property string $chuchang_bar
 * @property string $nei_bar
 * @property integer $kuanghao
 * @property integer $shuliang
 * @property integer $ercifenjian_saomiao_shuliang
 * @property integer $yisaomiao_shuliang
 * @property integer $jushousaomiao_shuliang
 * @property double $danjia
 * @property string $attributes
 * @property string $baoguozhuangtai
 * @property string $lururen
 * @property string $createtime
 * @property string $sku
 * @property string $chima
 * @property string $yanse
 * @property string $rongji
 * @property string $qikanhao
 * @property string $peisongshang
 * @property string $wuliudanhao
 * @property string $fapiao_type
 * @property string $fapiao_taitou
 * @property double $fapiao_jine
 * @property string $fapiao_neirong
 * @property string $fapiaohao
 * @property double $youhuiquan
 * @property double $kouyouhuiquan
 * @property double $yunfei
 * @property double $yishoukuan
 * @property double $yingfukuan
 * @property double $total_amount
 * @property double $payable_amount
 * @property double $yingshou_amount
 * @property double $shishou_amount
 * @property double $daishou_amount
 * @property string $kefu_check
 * @property string $kefu_man
 * @property string $kefu_time
 * @property string $print_already
 * @property string $print_time
 * @property string $print_man
 * @property string $fenjiandanhao
 * @property string $fenjiandanhao_2
 * @property string $fenjianyuan
 * @property string $fenpeifenjianyuan_time
 * @property string $yidabao
 * @property string $dabaoren
 * @property string $dabaotime
 * @property string $cuoloujian
 * @property string $cuoloujian_time
 * @property string $cuoloujian_man
 * @property string $chengzhong
 * @property string $chengzhongren
 * @property string $chengzhong_time
 * @property string $daifa
 * @property string $daifaren
 * @property string $daifa_time
 * @property string $jiaojiedanhao
 * @property string $jiaojiedanhao_time
 * @property string $jiaojiedanhao_man
 * @property string $jiaojie
 * @property string $jiaojieren
 * @property string $jiaojietime
 * @property string $disong
 * @property string $disongren
 * @property string $disongtime
 * @property string $zuofei
 * @property string $zuofei_man
 * @property string $zuofei_time
 * @property string $huifu_man
 * @property string $huifu_time
 * @property string $zhuangtai
 */
class OBaoguo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'baoguo';
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
			array('id, kuanghao, shuliang, ercifenjian_saomiao_shuliang, yisaomiao_shuliang, jushousaomiao_shuliang', 'numerical', 'integerOnly'=>true),
			array('danjia, fapiao_jine, youhuiquan, kouyouhuiquan, yunfei, yishoukuan, yingfukuan, total_amount, payable_amount, yingshou_amount, shishou_amount, daishou_amount', 'numerical'),
			array('pingtai, laiyuan, user_id, order_type, order_type_explain, sys_dingdanbianhao, dingdanbianhao, baoguohao, kuweihao, chuchang_bar, nei_bar, baoguozhuangtai, sku, wuliudanhao, kefu_time, print_time, fenjiandanhao, fenjiandanhao_2, fenpeifenjianyuan_time, dabaotime, cuoloujian, cuoloujian_time, chengzhong_time, daifa_time, jiaojiedanhao, jiaojiedanhao_time, jiaojietime, disongtime, zuofei_time, huifu_time', 'length', 'max'=>20),
			array('partner, zhifufangshi, suoshukehu, fapiao_taitou, fapiaohao', 'length', 'max'=>50),
			array('shangpinmingcheng, attributes', 'length', 'max'=>100),
			array('suoshucangku, kehubianhao, lururen, chima, yanse, rongji, qikanhao, peisongshang, fapiao_type, kefu_check, kefu_man, print_already, print_man, fenjianyuan, yidabao, dabaoren, cuoloujian_man, chengzhong, chengzhongren, daifa, daifaren, jiaojiedanhao_man, jiaojie, jiaojieren, disong, disongren, zuofei, zuofei_man, huifu_man, zhuangtai', 'length', 'max'=>10),
			array('fapiao_neirong', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pingtai, laiyuan, partner, user_id, order_type, order_type_explain, zhifufangshi, sys_dingdanbianhao, dingdanbianhao, baoguohao, shangpinmingcheng, suoshucangku, suoshukehu, kehubianhao, kuweihao, chuchang_bar, nei_bar, kuanghao, shuliang, ercifenjian_saomiao_shuliang, yisaomiao_shuliang, jushousaomiao_shuliang, danjia, attributes, baoguozhuangtai, lururen, createtime, sku, chima, yanse, rongji, qikanhao, peisongshang, wuliudanhao, fapiao_type, fapiao_taitou, fapiao_jine, fapiao_neirong, fapiaohao, youhuiquan, kouyouhuiquan, yunfei, yishoukuan, yingfukuan, total_amount, payable_amount, yingshou_amount, shishou_amount, daishou_amount, kefu_check, kefu_man, kefu_time, print_already, print_time, print_man, fenjiandanhao, fenjiandanhao_2, fenjianyuan, fenpeifenjianyuan_time, yidabao, dabaoren, dabaotime, cuoloujian, cuoloujian_time, cuoloujian_man, chengzhong, chengzhongren, chengzhong_time, daifa, daifaren, daifa_time, jiaojiedanhao, jiaojiedanhao_time, jiaojiedanhao_man, jiaojie, jiaojieren, jiaojietime, disong, disongren, disongtime, zuofei, zuofei_man, zuofei_time, huifu_man, huifu_time, zhuangtai', 'safe', 'on'=>'search'),
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
			'baoguohao' => 'Baoguohao',
			'shangpinmingcheng' => 'Shangpinmingcheng',
			'suoshucangku' => 'Suoshucangku',
			'suoshukehu' => 'Suoshukehu',
			'kehubianhao' => 'Kehubianhao',
			'kuweihao' => 'Kuweihao',
			'chuchang_bar' => 'Chuchang Bar',
			'nei_bar' => 'Nei Bar',
			'kuanghao' => 'Kuanghao',
			'shuliang' => 'Shuliang',
			'ercifenjian_saomiao_shuliang' => 'Ercifenjian Saomiao Shuliang',
			'yisaomiao_shuliang' => 'Yisaomiao Shuliang',
			'jushousaomiao_shuliang' => 'Jushousaomiao Shuliang',
			'danjia' => 'Danjia',
			'attributes' => 'Attributes',
			'baoguozhuangtai' => 'Baoguozhuangtai',
			'lururen' => 'Lururen',
			'createtime' => 'Createtime',
			'sku' => 'Sku',
			'chima' => 'Chima',
			'yanse' => 'Yanse',
			'rongji' => 'Rongji',
			'qikanhao' => 'Qikanhao',
			'peisongshang' => 'Peisongshang',
			'wuliudanhao' => 'Wuliudanhao',
			'fapiao_type' => 'Fapiao Type',
			'fapiao_taitou' => 'Fapiao Taitou',
			'fapiao_jine' => 'Fapiao Jine',
			'fapiao_neirong' => 'Fapiao Neirong',
			'fapiaohao' => 'Fapiaohao',
			'youhuiquan' => 'Youhuiquan',
			'kouyouhuiquan' => 'Kouyouhuiquan',
			'yunfei' => 'Yunfei',
			'yishoukuan' => 'Yishoukuan',
			'yingfukuan' => 'Yingfukuan',
			'total_amount' => 'Total Amount',
			'payable_amount' => 'Payable Amount',
			'yingshou_amount' => 'Yingshou Amount',
			'shishou_amount' => 'Shishou Amount',
			'daishou_amount' => 'Daishou Amount',
			'kefu_check' => 'Kefu Check',
			'kefu_man' => 'Kefu Man',
			'kefu_time' => 'Kefu Time',
			'print_already' => 'Print Already',
			'print_time' => 'Print Time',
			'print_man' => 'Print Man',
			'fenjiandanhao' => 'Fenjiandanhao',
			'fenjiandanhao_2' => 'Fenjiandanhao 2',
			'fenjianyuan' => 'Fenjianyuan',
			'fenpeifenjianyuan_time' => 'Fenpeifenjianyuan Time',
			'yidabao' => 'Yidabao',
			'dabaoren' => 'Dabaoren',
			'dabaotime' => 'Dabaotime',
			'cuoloujian' => 'Cuoloujian',
			'cuoloujian_time' => 'Cuoloujian Time',
			'cuoloujian_man' => 'Cuoloujian Man',
			'chengzhong' => 'Chengzhong',
			'chengzhongren' => 'Chengzhongren',
			'chengzhong_time' => 'Chengzhong Time',
			'daifa' => 'Daifa',
			'daifaren' => 'Daifaren',
			'daifa_time' => 'Daifa Time',
			'jiaojiedanhao' => 'Jiaojiedanhao',
			'jiaojiedanhao_time' => 'Jiaojiedanhao Time',
			'jiaojiedanhao_man' => 'Jiaojiedanhao Man',
			'jiaojie' => 'Jiaojie',
			'jiaojieren' => 'Jiaojieren',
			'jiaojietime' => 'Jiaojietime',
			'disong' => 'Disong',
			'disongren' => 'Disongren',
			'disongtime' => 'Disongtime',
			'zuofei' => 'Zuofei',
			'zuofei_man' => 'Zuofei Man',
			'zuofei_time' => 'Zuofei Time',
			'huifu_man' => 'Huifu Man',
			'huifu_time' => 'Huifu Time',
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
		$criteria->compare('baoguohao',$this->baoguohao,true);
		$criteria->compare('shangpinmingcheng',$this->shangpinmingcheng,true);
		$criteria->compare('suoshucangku',$this->suoshucangku,true);
		$criteria->compare('suoshukehu',$this->suoshukehu,true);
		$criteria->compare('kehubianhao',$this->kehubianhao,true);
		$criteria->compare('kuweihao',$this->kuweihao,true);
		$criteria->compare('chuchang_bar',$this->chuchang_bar,true);
		$criteria->compare('nei_bar',$this->nei_bar,true);
		$criteria->compare('kuanghao',$this->kuanghao);
		$criteria->compare('shuliang',$this->shuliang);
		$criteria->compare('ercifenjian_saomiao_shuliang',$this->ercifenjian_saomiao_shuliang);
		$criteria->compare('yisaomiao_shuliang',$this->yisaomiao_shuliang);
		$criteria->compare('jushousaomiao_shuliang',$this->jushousaomiao_shuliang);
		$criteria->compare('danjia',$this->danjia);
		$criteria->compare('attributes',$this->attributes,true);
		$criteria->compare('baoguozhuangtai',$this->baoguozhuangtai,true);
		$criteria->compare('lururen',$this->lururen,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('sku',$this->sku,true);
		$criteria->compare('chima',$this->chima,true);
		$criteria->compare('yanse',$this->yanse,true);
		$criteria->compare('rongji',$this->rongji,true);
		$criteria->compare('qikanhao',$this->qikanhao,true);
		$criteria->compare('peisongshang',$this->peisongshang,true);
		$criteria->compare('wuliudanhao',$this->wuliudanhao,true);
		$criteria->compare('fapiao_type',$this->fapiao_type,true);
		$criteria->compare('fapiao_taitou',$this->fapiao_taitou,true);
		$criteria->compare('fapiao_jine',$this->fapiao_jine);
		$criteria->compare('fapiao_neirong',$this->fapiao_neirong,true);
		$criteria->compare('fapiaohao',$this->fapiaohao,true);
		$criteria->compare('youhuiquan',$this->youhuiquan);
		$criteria->compare('kouyouhuiquan',$this->kouyouhuiquan);
		$criteria->compare('yunfei',$this->yunfei);
		$criteria->compare('yishoukuan',$this->yishoukuan);
		$criteria->compare('yingfukuan',$this->yingfukuan);
		$criteria->compare('total_amount',$this->total_amount);
		$criteria->compare('payable_amount',$this->payable_amount);
		$criteria->compare('yingshou_amount',$this->yingshou_amount);
		$criteria->compare('shishou_amount',$this->shishou_amount);
		$criteria->compare('daishou_amount',$this->daishou_amount);
		$criteria->compare('kefu_check',$this->kefu_check,true);
		$criteria->compare('kefu_man',$this->kefu_man,true);
		$criteria->compare('kefu_time',$this->kefu_time,true);
		$criteria->compare('print_already',$this->print_already,true);
		$criteria->compare('print_time',$this->print_time,true);
		$criteria->compare('print_man',$this->print_man,true);
		$criteria->compare('fenjiandanhao',$this->fenjiandanhao,true);
		$criteria->compare('fenjiandanhao_2',$this->fenjiandanhao_2,true);
		$criteria->compare('fenjianyuan',$this->fenjianyuan,true);
		$criteria->compare('fenpeifenjianyuan_time',$this->fenpeifenjianyuan_time,true);
		$criteria->compare('yidabao',$this->yidabao,true);
		$criteria->compare('dabaoren',$this->dabaoren,true);
		$criteria->compare('dabaotime',$this->dabaotime,true);
		$criteria->compare('cuoloujian',$this->cuoloujian,true);
		$criteria->compare('cuoloujian_time',$this->cuoloujian_time,true);
		$criteria->compare('cuoloujian_man',$this->cuoloujian_man,true);
		$criteria->compare('chengzhong',$this->chengzhong,true);
		$criteria->compare('chengzhongren',$this->chengzhongren,true);
		$criteria->compare('chengzhong_time',$this->chengzhong_time,true);
		$criteria->compare('daifa',$this->daifa,true);
		$criteria->compare('daifaren',$this->daifaren,true);
		$criteria->compare('daifa_time',$this->daifa_time,true);
		$criteria->compare('jiaojiedanhao',$this->jiaojiedanhao,true);
		$criteria->compare('jiaojiedanhao_time',$this->jiaojiedanhao_time,true);
		$criteria->compare('jiaojiedanhao_man',$this->jiaojiedanhao_man,true);
		$criteria->compare('jiaojie',$this->jiaojie,true);
		$criteria->compare('jiaojieren',$this->jiaojieren,true);
		$criteria->compare('jiaojietime',$this->jiaojietime,true);
		$criteria->compare('disong',$this->disong,true);
		$criteria->compare('disongren',$this->disongren,true);
		$criteria->compare('disongtime',$this->disongtime,true);
		$criteria->compare('zuofei',$this->zuofei,true);
		$criteria->compare('zuofei_man',$this->zuofei_man,true);
		$criteria->compare('zuofei_time',$this->zuofei_time,true);
		$criteria->compare('huifu_man',$this->huifu_man,true);
		$criteria->compare('huifu_time',$this->huifu_time,true);
		$criteria->compare('zhuangtai',$this->zhuangtai,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OBaoguo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
