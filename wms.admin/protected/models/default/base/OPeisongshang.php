<?php

/**
 * This is the model class for table "peisongshang".
 *
 * The followings are the available columns in table 'peisongshang':
 * @property integer $id
 * @property string $peisongshangname
 * @property string $linkphone
 * @property string $linkman
 * @property string $address
 * @property string $qq
 * @property string $netaddress
 * @property string $remark
 * @property string $createtime
 */
class OPeisongshang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'peisongshang';
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
			array('peisongshangname, linkphone, linkman, qq', 'length', 'max'=>50),
			array('address, netaddress, remark', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, peisongshangname, linkphone, linkman, address, qq, netaddress, remark, createtime', 'safe', 'on'=>'search'),
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
			'peisongshangname' => 'Peisongshangname',
			'linkphone' => 'Linkphone',
			'linkman' => 'Linkman',
			'address' => 'Address',
			'qq' => 'Qq',
			'netaddress' => 'Netaddress',
			'remark' => 'Remark',
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
		$criteria->compare('peisongshangname',$this->peisongshangname,true);
		$criteria->compare('linkphone',$this->linkphone,true);
		$criteria->compare('linkman',$this->linkman,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('netaddress',$this->netaddress,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('createtime',$this->createtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OPeisongshang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
