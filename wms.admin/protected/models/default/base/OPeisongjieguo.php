<?php

/**
 * This is the model class for table "peisongjieguo".
 *
 * The followings are the available columns in table 'peisongjieguo':
 * @property integer $id
 * @property string $baoguohao
 * @property string $toudizhuangtai
 * @property string $qianshoutuihuoriqi
 * @property string $beizhu
 * @property string $fahuoriqi
 * @property string $shifouyichang
 * @property string $lururen
 * @property string $createtime
 */
class OPeisongjieguo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'peisongjieguo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('createtime', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('baoguohao, toudizhuangtai, qianshoutuihuoriqi, fahuoriqi, shifouyichang, lururen', 'length', 'max'=>50),
			array('beizhu', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, baoguohao, toudizhuangtai, qianshoutuihuoriqi, beizhu, fahuoriqi, shifouyichang, lururen, createtime', 'safe', 'on'=>'search'),
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
			'baoguohao' => 'Baoguohao',
			'toudizhuangtai' => 'Toudizhuangtai',
			'qianshoutuihuoriqi' => 'Qianshoutuihuoriqi',
			'beizhu' => 'Beizhu',
			'fahuoriqi' => 'Fahuoriqi',
			'shifouyichang' => 'Shifouyichang',
			'lururen' => 'Lururen',
			'createtime' => 'Createtime',
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
		$criteria->compare('baoguohao',$this->baoguohao,true);
		$criteria->compare('toudizhuangtai',$this->toudizhuangtai,true);
		$criteria->compare('qianshoutuihuoriqi',$this->qianshoutuihuoriqi,true);
		$criteria->compare('beizhu',$this->beizhu,true);
		$criteria->compare('fahuoriqi',$this->fahuoriqi,true);
		$criteria->compare('shifouyichang',$this->shifouyichang,true);
		$criteria->compare('lururen',$this->lururen,true);
		$criteria->compare('createtime',$this->createtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OPeisongjieguo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
