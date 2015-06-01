<?php

/**
 * This is the model class for table "chanpinziliao".
 *
 * The followings are the available columns in table 'chanpinziliao':
 * @property integer $id
 * @property string $beidacang_productid
 * @property string $partner
 * @property string $chuchang_bar
 * @property string $nei_bar
 * @property string $shangpinmingcheng
 * @property string $suoshucangku
 * @property string $suoshukehu
 * @property string $kehubianhao
 * @property string $lock
 * @property string $lururen
 * @property string $createtime
 * @property string $Attributes
 * @property string $sku
 * @property string $yanse
 * @property string $chima
 * @property string $rongji
 * @property double $jiage
 * @property string $qikanhao
 * @property string $fenlei_name1
 * @property string $fenlei_name2
 * @property string $fenlei_name3
 */
class OChanpinziliao extends CActiveRecord {
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'chanpinziliao';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('createtime', 'required'),
            array('suoshucangku,suoshukehu','required'),
            array('id', 'numerical', 'integerOnly' => true),
            array('jiage', 'numerical'),
            array('beidacang_productid', 'length', 'max' => 30),
            array('partner, suoshukehu, rongji', 'length', 'max' => 50),
            array('chuchang_bar, nei_bar, suoshucangku, lururen, sku, yanse, chima, qikanhao, fenlei_name1, fenlei_name2, fenlei_name3', 'length', 'max' => 20),
            array('shangpinmingcheng, Attributes', 'length', 'max' => 100),
            array('kehubianhao, lock', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, beidacang_productid, partner, chuchang_bar, nei_bar, shangpinmingcheng, suoshucangku, suoshukehu, kehubianhao, lock, lururen, createtime, Attributes, sku, yanse, chima, rongji, jiage, qikanhao, fenlei_name1, fenlei_name2, fenlei_name3', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'beidacang_productid' => 'Beidacang Productid',
            'partner' => 'Partner',
            'chuchang_bar' => 'Chuchang Bar',
            'nei_bar' => 'Nei Bar',
            'shangpinmingcheng' => 'Shangpinmingcheng',
            'suoshucangku' => 'Suoshucangku',
            'suoshukehu' => 'Suoshukehu',
            'kehubianhao' => 'Kehubianhao',
            'lock' => 'Lock',
            'lururen' => 'Lururen',
            'createtime' => 'Createtime',
            'Attributes' => 'Attributes',
            'sku' => 'Sku',
            'yanse' => 'Yanse',
            'chima' => 'Chima',
            'rongji' => 'Rongji',
            'jiage' => 'Jiage',
            'qikanhao' => 'Qikanhao',
            'fenlei_name1' => 'Fenlei Name1',
            'fenlei_name2' => 'Fenlei Name2',
            'fenlei_name3' => 'Fenlei Name3',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('beidacang_productid', $this->beidacang_productid, true);
        $criteria->compare('partner', $this->partner, true);
        $criteria->compare('chuchang_bar', $this->chuchang_bar, true);
        $criteria->compare('nei_bar', $this->nei_bar, true);
        $criteria->compare('shangpinmingcheng', $this->shangpinmingcheng, true);
        $criteria->compare('suoshucangku', $this->suoshucangku, true);
        $criteria->compare('suoshukehu', $this->suoshukehu, true);
        $criteria->compare('kehubianhao', $this->kehubianhao, true);
        $criteria->compare('lock', $this->lock, true);
        $criteria->compare('lururen', $this->lururen, true);
        $criteria->compare('createtime', $this->createtime, true);
        $criteria->compare('Attributes', $this->Attributes, true);
        $criteria->compare('sku', $this->sku, true);
        $criteria->compare('yanse', $this->yanse, true);
        $criteria->compare('chima', $this->chima, true);
        $criteria->compare('rongji', $this->rongji, true);
        $criteria->compare('jiage', $this->jiage);
        $criteria->compare('qikanhao', $this->qikanhao, true);
        $criteria->compare('fenlei_name1', $this->fenlei_name1, true);
        $criteria->compare('fenlei_name2', $this->fenlei_name2, true);
        $criteria->compare('fenlei_name3', $this->fenlei_name3, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return OChanpinziliao the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
}
