<?php

/**
 * This is the model class for table "kuwei".
 *
 * The followings are the available columns in table 'kuwei':
 * @property integer $id
 * @property string $partner
 * @property string $kuweihao
 * @property string $suoshucangku
 * @property string $gonghuoshang
 * @property string $suoshukehu
 * @property string $kehubianhao
 * @property string $zhengcanleixing
 * @property integer $total
 * @property integer $frozen
 * @property integer $fanchang_frozen
 * @property integer $dingdan_frozen
 * @property integer $yishi_frozen
 * @property integer $chayishuliang
 * @property string $shangpinyouxiaoqi
 * @property integer $baozhiqi
 * @property string $shengchanriqi
 * @property integer $youxiaoqitianshu
 * @property string $shangpinmingcheng
 * @property string $chuchang_bar
 * @property string $nei_bar
 * @property string $input_man
 * @property string $createtime
 * @property string $leixing
 * @property string $lock
 */
class OKuwei extends CActiveRecord {
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'kuwei';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('kuweihao,suoshucangku,suoshukehu', 'required'),
            array('kuweihao', 'checkOnly'),
            array('id, total, frozen, fanchang_frozen, dingdan_frozen, yishi_frozen, chayishuliang, baozhiqi, youxiaoqitianshu', 'numerical', 'integerOnly' => true),
            array('partner, gonghuoshang, suoshukehu', 'length', 'max' => 50),
            array('kuweihao, suoshucangku, shangpinyouxiaoqi, shengchanriqi, chuchang_bar, nei_bar', 'length', 'max' => 20),
            array('kehubianhao, zhengcanleixing, input_man, leixing, lock', 'length', 'max' => 10),
            array('shangpinmingcheng', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, partner, kuweihao, suoshucangku, gonghuoshang, suoshukehu, kehubianhao, zhengcanleixing, total, frozen, fanchang_frozen, dingdan_frozen, yishi_frozen, chayishuliang, shangpinyouxiaoqi, baozhiqi, shengchanriqi, youxiaoqitianshu, shangpinmingcheng, chuchang_bar, nei_bar, input_man, createtime, leixing, lock', 'safe', 'on' => 'search'),
        );
    }

    public function checkOnly($attribute, $params) {
        $model = $this->count("suoshucangku=:ck and kuweihao=:kh", array(":ck" => $this->suoshucangku, ":kh" => $this->kuweihao));
        if($model>0){
            $msg = "库位号已存在";
            $this->addError("kuweihao", $msg);
        }
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
            'partner' => 'Partner',
            'kuweihao' => 'Kuweihao',
            'suoshucangku' => 'Suoshucangku',
            'gonghuoshang' => 'Gonghuoshang',
            'suoshukehu' => 'Suoshukehu',
            'kehubianhao' => 'Kehubianhao',
            'zhengcanleixing' => 'Zhengcanleixing',
            'total' => 'Total',
            'frozen' => 'Frozen',
            'fanchang_frozen' => 'Fanchang Frozen',
            'dingdan_frozen' => 'Dingdan Frozen',
            'yishi_frozen' => 'Yishi Frozen',
            'chayishuliang' => 'Chayishuliang',
            'shangpinyouxiaoqi' => 'Shangpinyouxiaoqi',
            'baozhiqi' => 'Baozhiqi',
            'shengchanriqi' => 'Shengchanriqi',
            'youxiaoqitianshu' => 'Youxiaoqitianshu',
            'shangpinmingcheng' => 'Shangpinmingcheng',
            'chuchang_bar' => 'Chuchang Bar',
            'nei_bar' => 'Nei Bar',
            'input_man' => 'Input Man',
            'createtime' => 'Createtime',
            'leixing' => 'Leixing',
            'lock' => 'Lock',
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
        $criteria->compare('partner', $this->partner, true);
        $criteria->compare('kuweihao', $this->kuweihao, true);
        $criteria->compare('suoshucangku', $this->suoshucangku, true);
        $criteria->compare('gonghuoshang', $this->gonghuoshang, true);
        $criteria->compare('suoshukehu', $this->suoshukehu, true);
        $criteria->compare('kehubianhao', $this->kehubianhao, true);
        $criteria->compare('zhengcanleixing', $this->zhengcanleixing, true);
        $criteria->compare('total', $this->total);
        $criteria->compare('frozen', $this->frozen);
        $criteria->compare('fanchang_frozen', $this->fanchang_frozen);
        $criteria->compare('dingdan_frozen', $this->dingdan_frozen);
        $criteria->compare('yishi_frozen', $this->yishi_frozen);
        $criteria->compare('chayishuliang', $this->chayishuliang);
        $criteria->compare('shangpinyouxiaoqi', $this->shangpinyouxiaoqi, true);
        $criteria->compare('baozhiqi', $this->baozhiqi);
        $criteria->compare('shengchanriqi', $this->shengchanriqi, true);
        $criteria->compare('youxiaoqitianshu', $this->youxiaoqitianshu);
        $criteria->compare('shangpinmingcheng', $this->shangpinmingcheng, true);
        $criteria->compare('chuchang_bar', $this->chuchang_bar, true);
        $criteria->compare('nei_bar', $this->nei_bar, true);
        $criteria->compare('input_man', $this->input_man, true);
        $criteria->compare('createtime', $this->createtime, true);
        $criteria->compare('leixing', $this->leixing, true);
        $criteria->compare('lock', $this->lock, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return OKuwei the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
}
