<?php

/**
 * This is the model class for table "cangku".
 *
 * The followings are the available columns in table 'cangku':
 * @property integer $id
 * @property string $cangkuid
 * @property string $cangkuname
 * @property string $linkphone
 * @property string $linkman
 * @property string $address
 * @property string $lock
 * @property string $createtime
 * @property string $store_code
 * @property string $input_man
 */
class OCangku extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cangku';
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
			array('cangkuid, cangkuname', 'length', 'max'=>20),
			array('linkphone, linkman, address, lock, store_code, input_man', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cangkuid, cangkuname, linkphone, linkman, address, lock, createtime, store_code, input_man', 'safe', 'on'=>'search'),
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
			'cangkuid' => 'Cangkuid',
			'cangkuname' => 'Cangkuname',
			'linkphone' => 'Linkphone',
			'linkman' => 'Linkman',
			'address' => 'Address',
			'lock' => 'Lock',
			'createtime' => 'Createtime',
			'store_code' => 'Store Code',
			'input_man' => 'Input Man',
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
		$criteria->compare('cangkuid',$this->cangkuid,true);
		$criteria->compare('cangkuname',$this->cangkuname,true);
		$criteria->compare('linkphone',$this->linkphone,true);
		$criteria->compare('linkman',$this->linkman,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('lock',$this->lock,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('store_code',$this->store_code,true);
		$criteria->compare('input_man',$this->input_man,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OCangku the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
