<?php

/**
 * This is the model class for table "kuweibiandongjilu".
 *
 * The followings are the available columns in table 'kuweibiandongjilu':
 * @property string $id
 * @property string $suoshucangku
 * @property string $kehubianhao
 * @property string $suoshukehu
 * @property string $kuweihao
 * @property string $shuliang
 * @property string $danhao
 * @property string $shangpinmingcheng
 * @property string $chuchang_bar
 * @property string $nei_bar
 * @property string $leixing
 * @property string $input_man
 * @property string $createtime
 */
class OKuweibiandongjilu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kuweibiandongjilu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, suoshucangku, kuweihao, nei_bar', 'length', 'max'=>20),
			array('kehubianhao, danhao, chuchang_bar, leixing, input_man, createtime', 'length', 'max'=>50),
			array('suoshukehu', 'length', 'max'=>60),
			array('shuliang', 'length', 'max'=>10),
			array('shangpinmingcheng', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, suoshucangku, kehubianhao, suoshukehu, kuweihao, shuliang, danhao, shangpinmingcheng, chuchang_bar, nei_bar, leixing, input_man, createtime', 'safe', 'on'=>'search'),
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
			'suoshukehu' => 'Suoshukehu',
			'kuweihao' => 'Kuweihao',
			'shuliang' => 'Shuliang',
			'danhao' => 'Danhao',
			'shangpinmingcheng' => 'Shangpinmingcheng',
			'chuchang_bar' => 'Chuchang Bar',
			'nei_bar' => 'Nei Bar',
			'leixing' => 'Leixing',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('suoshucangku',$this->suoshucangku,true);
		$criteria->compare('kehubianhao',$this->kehubianhao,true);
		$criteria->compare('suoshukehu',$this->suoshukehu,true);
		$criteria->compare('kuweihao',$this->kuweihao,true);
		$criteria->compare('shuliang',$this->shuliang,true);
		$criteria->compare('danhao',$this->danhao,true);
		$criteria->compare('shangpinmingcheng',$this->shangpinmingcheng,true);
		$criteria->compare('chuchang_bar',$this->chuchang_bar,true);
		$criteria->compare('nei_bar',$this->nei_bar,true);
		$criteria->compare('leixing',$this->leixing,true);
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
	 * @return OKuweibiandongjilu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
