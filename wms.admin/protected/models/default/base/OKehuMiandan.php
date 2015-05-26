<?php

/**
 * This is the model class for table "kehu_miandan".
 *
 * The followings are the available columns in table 'kehu_miandan':
 * @property integer $id
 * @property string $suoshucangku
 * @property string $kehubianhao
 * @property string $kehuname
 * @property string $linkphone
 * @property string $linkman
 * @property string $address
 * @property string $neijianpinming
 * @property string $netaddress
 * @property string $input_man
 * @property string $createtime
 */
class OKehuMiandan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kehu_miandan';
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
			array('suoshucangku, kehuname, linkphone, neijianpinming', 'length', 'max'=>50),
			array('kehubianhao, linkman, input_man', 'length', 'max'=>10),
			array('address, netaddress', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, suoshucangku, kehubianhao, kehuname, linkphone, linkman, address, neijianpinming, netaddress, input_man, createtime', 'safe', 'on'=>'search'),
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
			'suoshucangku' => 'Suoshucangku',
			'kehubianhao' => 'Kehubianhao',
			'kehuname' => 'Kehuname',
			'linkphone' => 'Linkphone',
			'linkman' => 'Linkman',
			'address' => 'Address',
			'neijianpinming' => 'Neijianpinming',
			'netaddress' => 'Netaddress',
			'input_man' => 'Input Man',
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
		$criteria->compare('suoshucangku',$this->suoshucangku,true);
		$criteria->compare('kehubianhao',$this->kehubianhao,true);
		$criteria->compare('kehuname',$this->kehuname,true);
		$criteria->compare('linkphone',$this->linkphone,true);
		$criteria->compare('linkman',$this->linkman,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('neijianpinming',$this->neijianpinming,true);
		$criteria->compare('netaddress',$this->netaddress,true);
		$criteria->compare('input_man',$this->input_man,true);
		$criteria->compare('createtime',$this->createtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OKehuMiandan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
