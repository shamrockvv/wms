<?php

/**
 * This is the model class for table "chanpinfenlei".
 *
 * The followings are the available columns in table 'chanpinfenlei':
 * @property integer $id
 * @property string $name1
 * @property string $no1
 * @property string $name2
 * @property string $no2
 * @property string $name3
 * @property string $no3
 * @property string $createtime
 */
class OChanpinfenlei extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'chanpinfenlei';
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
			array('name1, no1, name2, no2, name3, no3', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name1, no1, name2, no2, name3, no3, createtime', 'safe', 'on'=>'search'),
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
			'name1' => 'Name1',
			'no1' => 'No1',
			'name2' => 'Name2',
			'no2' => 'No2',
			'name3' => 'Name3',
			'no3' => 'No3',
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
		$criteria->compare('name1',$this->name1,true);
		$criteria->compare('no1',$this->no1,true);
		$criteria->compare('name2',$this->name2,true);
		$criteria->compare('no2',$this->no2,true);
		$criteria->compare('name3',$this->name3,true);
		$criteria->compare('no3',$this->no3,true);
		$criteria->compare('createtime',$this->createtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OChanpinfenlei the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
