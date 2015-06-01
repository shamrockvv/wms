<?php

/**
 * This is the model class for table "pandiandan".
 *
 * The followings are the available columns in table 'pandiandan':
 * @property integer $id
 * @property string $leixing
 * @property string $partner
 * @property string $pandiandanhao
 * @property string $fenqu_pandiandanhao
 * @property string $kuweihao
 * @property string $kehubianhao
 * @property string $gonghuoshang
 * @property string $suoshucangku
 * @property string $shangpinmingcheng
 * @property string $suoshukehu
 * @property string $chuchang_bar
 * @property string $nei_bar
 * @property integer $total
 * @property string $zhengcanleixing
 * @property string $zhuangtai
 * @property string $input_man
 * @property string $createtime
 * @property string $isshenhe
 * @property string $shenhe_man
 * @property string $shenhe_time
 * @property string $isqueren
 * @property string $queren_man
 * @property string $queren_time
 * @property string $iszuofei
 * @property string $zuofei_man
 * @property string $zuofei_time
 */
class OPandiandan extends CActiveRecord {
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pandiandan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('suoshucangku,suoshukehu','required'),
            array('total', 'numerical', 'integerOnly' => true),
            array('leixing, pandiandanhao, kuweihao, suoshucangku, chuchang_bar, nei_bar', 'length', 'max' => 20),
            array('partner, fenqu_pandiandanhao, gonghuoshang, zhengcanleixing, zhuangtai, input_man, createtime, isshenhe, shenhe_man, shenhe_time, isqueren, queren_man, queren_time, iszuofei, zuofei_man, zuofei_time', 'length', 'max' => 50),
            array('kehubianhao', 'length', 'max' => 10),
            array('shangpinmingcheng', 'length', 'max' => 100),
            array('suoshukehu', 'length', 'max' => 60),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, leixing, partner, pandiandanhao, fenqu_pandiandanhao, kuweihao, kehubianhao, gonghuoshang, suoshucangku, shangpinmingcheng, suoshukehu, chuchang_bar, nei_bar, total, zhengcanleixing, zhuangtai, input_man, createtime, isshenhe, shenhe_man, shenhe_time, isqueren, queren_man, queren_time, iszuofei, zuofei_man, zuofei_time', 'safe', 'on' => 'search'),
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
            'leixing' => 'Leixing',
            'partner' => 'Partner',
            'pandiandanhao' => 'Pandiandanhao',
            'fenqu_pandiandanhao' => 'Fenqu Pandiandanhao',
            'kuweihao' => 'Kuweihao',
            'kehubianhao' => 'Kehubianhao',
            'gonghuoshang' => 'Gonghuoshang',
            'suoshucangku' => 'Suoshucangku',
            'shangpinmingcheng' => 'Shangpinmingcheng',
            'suoshukehu' => 'Suoshukehu',
            'chuchang_bar' => 'Chuchang Bar',
            'nei_bar' => 'Nei Bar',
            'total' => 'Total',
            'zhengcanleixing' => 'Zhengcanleixing',
            'zhuangtai' => 'Zhuangtai',
            'input_man' => 'Input Man',
            'createtime' => 'Createtime',
            'isshenhe' => 'Isshenhe',
            'shenhe_man' => 'Shenhe Man',
            'shenhe_time' => 'Shenhe Time',
            'isqueren' => 'Isqueren',
            'queren_man' => 'Queren Man',
            'queren_time' => 'Queren Time',
            'iszuofei' => 'Iszuofei',
            'zuofei_man' => 'Zuofei Man',
            'zuofei_time' => 'Zuofei Time',
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
        $criteria->compare('leixing', $this->leixing, true);
        $criteria->compare('partner', $this->partner, true);
        $criteria->compare('pandiandanhao', $this->pandiandanhao, true);
        $criteria->compare('fenqu_pandiandanhao', $this->fenqu_pandiandanhao, true);
        $criteria->compare('kuweihao', $this->kuweihao, true);
        $criteria->compare('kehubianhao', $this->kehubianhao, true);
        $criteria->compare('gonghuoshang', $this->gonghuoshang, true);
        $criteria->compare('suoshucangku', $this->suoshucangku, true);
        $criteria->compare('shangpinmingcheng', $this->shangpinmingcheng, true);
        $criteria->compare('suoshukehu', $this->suoshukehu, true);
        $criteria->compare('chuchang_bar', $this->chuchang_bar, true);
        $criteria->compare('nei_bar', $this->nei_bar, true);
        $criteria->compare('total', $this->total);
        $criteria->compare('zhengcanleixing', $this->zhengcanleixing, true);
        $criteria->compare('zhuangtai', $this->zhuangtai, true);
        $criteria->compare('input_man', $this->input_man, true);
        $criteria->compare('createtime', $this->createtime, true);
        $criteria->compare('isshenhe', $this->isshenhe, true);
        $criteria->compare('shenhe_man', $this->shenhe_man, true);
        $criteria->compare('shenhe_time', $this->shenhe_time, true);
        $criteria->compare('isqueren', $this->isqueren, true);
        $criteria->compare('queren_man', $this->queren_man, true);
        $criteria->compare('queren_time', $this->queren_time, true);
        $criteria->compare('iszuofei', $this->iszuofei, true);
        $criteria->compare('zuofei_man', $this->zuofei_man, true);
        $criteria->compare('zuofei_time', $this->zuofei_time, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return OPandiandan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
}
