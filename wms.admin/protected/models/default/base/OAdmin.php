<?php

/**
 * This is the model class for table "admin".
 *
 * The followings are the available columns in table 'admin':
 * @property integer $id
 * @property string $adminid
 * @property string $adminpwd
 * @property string $adminname
 * @property string $zubie
 * @property string $adminpower
 * @property string $linkphone
 * @property string $lock
 * @property string $createtime
 * @property string $quanxian
 * @property string $lururen
 * @property string $leixing
 * @property string $guanliankehu
 */
class OAdmin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin';
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
			array('adminid, adminpwd, adminname, zubie, linkphone, lock, lururen, leixing', 'length', 'max'=>50),
			array('adminpower, quanxian', 'length', 'max'=>255),
			array('guanliankehu', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, adminid, adminpwd, adminname, zubie, adminpower, linkphone, lock, createtime, quanxian, lururen, leixing, guanliankehu', 'safe', 'on'=>'search'),
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
			'adminid' => 'Adminid',
			'adminpwd' => 'Adminpwd',
			'adminname' => 'Adminname',
			'zubie' => 'Zubie',
			'adminpower' => 'Adminpower',
			'linkphone' => 'Linkphone',
			'lock' => 'Lock',
			'createtime' => 'Createtime',
			'quanxian' => 'Quanxian',
			'lururen' => 'Lururen',
			'leixing' => 'Leixing',
			'guanliankehu' => 'Guanliankehu',
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
		$criteria->compare('adminid',$this->adminid,true);
		$criteria->compare('adminpwd',$this->adminpwd,true);
		$criteria->compare('adminname',$this->adminname,true);
		$criteria->compare('zubie',$this->zubie,true);
		$criteria->compare('adminpower',$this->adminpower,true);
		$criteria->compare('linkphone',$this->linkphone,true);
		$criteria->compare('lock',$this->lock,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('quanxian',$this->quanxian,true);
		$criteria->compare('lururen',$this->lururen,true);
		$criteria->compare('leixing',$this->leixing,true);
		$criteria->compare('guanliankehu',$this->guanliankehu,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OAdmin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
