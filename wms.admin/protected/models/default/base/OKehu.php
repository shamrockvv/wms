<?php

/**
 * This is the model class for table "kehu".
 *
 * The followings are the available columns in table 'kehu':
 * @property integer $id
 * @property string $partner
 * @property string $laiyuan
 * @property string $kehubianhao
 * @property string $user_id
 * @property string $kehuname
 * @property string $linkphone
 * @property string $linkmobile
 * @property string $linkman
 * @property string $address
 * @property string $qq
 * @property string $netaddress
 * @property string $remark
 * @property string $wuliu
 * @property string $input_man
 * @property string $createtime
 * @property string $zancunkuwei
 * @property string $dingdan_zancunkuwei
 * @property string $kucunfanchang_zancunkuwei
 */
class OKehu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kehu';
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
			array('id', 'numerical', 'integerOnly'=>true),
			array('partner, laiyuan, netaddress, wuliu', 'length', 'max'=>100),
			array('kehubianhao, linkman, input_man', 'length', 'max'=>10),
			array('user_id, qq, zancunkuwei, dingdan_zancunkuwei, kucunfanchang_zancunkuwei', 'length', 'max'=>20),
			array('kehuname, linkphone, linkmobile', 'length', 'max'=>50),
			array('address, remark', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, partner, laiyuan, kehubianhao, user_id, kehuname, linkphone, linkmobile, linkman, address, qq, netaddress, remark, wuliu, input_man, createtime, zancunkuwei, dingdan_zancunkuwei, kucunfanchang_zancunkuwei', 'safe', 'on'=>'search'),
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
			'partner' => 'Partner',
			'laiyuan' => 'Laiyuan',
			'kehubianhao' => 'Kehubianhao',
			'user_id' => 'User',
			'kehuname' => 'Kehuname',
			'linkphone' => 'Linkphone',
			'linkmobile' => 'Linkmobile',
			'linkman' => 'Linkman',
			'address' => 'Address',
			'qq' => 'Qq',
			'netaddress' => 'Netaddress',
			'remark' => 'Remark',
			'wuliu' => 'Wuliu',
			'input_man' => 'Input Man',
			'createtime' => 'Createtime',
			'zancunkuwei' => 'Zancunkuwei',
			'dingdan_zancunkuwei' => 'Dingdan Zancunkuwei',
			'kucunfanchang_zancunkuwei' => 'Kucunfanchang Zancunkuwei',
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
		$criteria->compare('partner',$this->partner,true);
		$criteria->compare('laiyuan',$this->laiyuan,true);
		$criteria->compare('kehubianhao',$this->kehubianhao,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('kehuname',$this->kehuname,true);
		$criteria->compare('linkphone',$this->linkphone,true);
		$criteria->compare('linkmobile',$this->linkmobile,true);
		$criteria->compare('linkman',$this->linkman,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('netaddress',$this->netaddress,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('wuliu',$this->wuliu,true);
		$criteria->compare('input_man',$this->input_man,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('zancunkuwei',$this->zancunkuwei,true);
		$criteria->compare('dingdan_zancunkuwei',$this->dingdan_zancunkuwei,true);
		$criteria->compare('kucunfanchang_zancunkuwei',$this->kucunfanchang_zancunkuwei,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OKehu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
