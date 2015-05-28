<?php

/**
 * This is the model class for table "dingdan_log".
 *
 * The followings are the available columns in table 'dingdan_log':
 * @property double $id
 * @property string $suoshukehu
 * @property string $kehubianhao
 * @property string $suoshucangku
 * @property string $dingdanbianhao
 * @property string $sys_dingdanbianhao
 * @property string $dangqianzhuangtai
 * @property string $zhiqianzhuangtai
 * @property string $caozuoshuoming
 * @property string $caozuoren
 * @property string $caozuoyuanbianhao
 * @property string $createtime
 */
class ODingdanLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dingdan_log';
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
			array('id', 'numerical'),
			array('suoshukehu, caozuoshuoming', 'length', 'max'=>50),
			array('kehubianhao, dangqianzhuangtai, zhiqianzhuangtai', 'length', 'max'=>10),
			array('suoshucangku, dingdanbianhao, sys_dingdanbianhao, caozuoren, caozuoyuanbianhao', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, suoshukehu, kehubianhao, suoshucangku, dingdanbianhao, sys_dingdanbianhao, dangqianzhuangtai, zhiqianzhuangtai, caozuoshuoming, caozuoren, caozuoyuanbianhao, createtime', 'safe', 'on'=>'search'),
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
			'suoshukehu' => 'Suoshukehu',
			'kehubianhao' => 'Kehubianhao',
			'suoshucangku' => 'Suoshucangku',
			'dingdanbianhao' => 'Dingdanbianhao',
			'sys_dingdanbianhao' => 'Sys Dingdanbianhao',
			'dangqianzhuangtai' => 'Dangqianzhuangtai',
			'zhiqianzhuangtai' => 'Zhiqianzhuangtai',
			'caozuoshuoming' => 'Caozuoshuoming',
			'caozuoren' => 'Caozuoren',
			'caozuoyuanbianhao' => 'Caozuoyuanbianhao',
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
		$criteria->compare('suoshukehu',$this->suoshukehu,true);
		$criteria->compare('kehubianhao',$this->kehubianhao,true);
		$criteria->compare('suoshucangku',$this->suoshucangku,true);
		$criteria->compare('dingdanbianhao',$this->dingdanbianhao,true);
		$criteria->compare('sys_dingdanbianhao',$this->sys_dingdanbianhao,true);
		$criteria->compare('dangqianzhuangtai',$this->dangqianzhuangtai,true);
		$criteria->compare('zhiqianzhuangtai',$this->zhiqianzhuangtai,true);
		$criteria->compare('caozuoshuoming',$this->caozuoshuoming,true);
		$criteria->compare('caozuoren',$this->caozuoren,true);
		$criteria->compare('caozuoyuanbianhao',$this->caozuoyuanbianhao,true);
		$criteria->compare('createtime',$this->createtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ODingdanLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
