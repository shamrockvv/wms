<?php

/**
 * This is the model class for table "shangjiadan".
 *
 * The followings are the available columns in table 'shangjiadan':
 * @property integer $id
 * @property string $partner
 * @property string $laiyuan
 * @property string $shangjiadanhao
 * @property string $order_code
 * @property string $suoshukehu
 * @property string $kehubianhao
 * @property string $suoshucangku
 * @property string $order_type_explain
 * @property string $xiaoshouleixing
 * @property string $rukucangku
 * @property string $gonghuoshang
 * @property string $zhengcanleixing
 * @property string $remark
 * @property string $shangpinmingcheng
 * @property string $chuchang_bar
 * @property string $nei_bar
 * @property double $chengbenjia
 * @property double $caigoujia
 * @property double $wangluodanjia
 * @property integer $yuyueshuliang
 * @property integer $shangjiashuliang
 * @property string $shangpinyouxiaoqi
 * @property integer $baozhiqi
 * @property string $shengchanriqi
 * @property integer $youxiaoqitianshu
 * @property string $kuweihao
 * @property string $caozuoren
 * @property string $createtime
 * @property string $isshangjia
 * @property string $querenren
 * @property string $queren_time
 */
class OShangjiadan extends CActiveRecord {
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'shangjiadan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('createtime', 'required'),
            array('suoshukehu, suoshucangku', 'required'),
            array('yuyueshuliang, shangjiashuliang, baozhiqi, youxiaoqitianshu', 'numerical', 'integerOnly' => true),
            array('chengbenjia, caigoujia, wangluodanjia', 'numerical'),
            array('partner, laiyuan, order_code, gonghuoshang, remark', 'length', 'max' => 50),
            array('shangjiadanhao, suoshukehu, suoshucangku, order_type_explain, xiaoshouleixing, rukucangku, chuchang_bar, nei_bar, shangpinyouxiaoqi, shengchanriqi, kuweihao, queren_time', 'length', 'max' => 20),
            array('kehubianhao, zhengcanleixing, caozuoren, isshangjia, querenren', 'length', 'max' => 10),
            array('shangpinmingcheng', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, partner, laiyuan, shangjiadanhao, order_code, suoshukehu, kehubianhao, suoshucangku, order_type_explain, xiaoshouleixing, rukucangku, gonghuoshang, zhengcanleixing, remark, shangpinmingcheng, chuchang_bar, nei_bar, chengbenjia, caigoujia, wangluodanjia, yuyueshuliang, shangjiashuliang, shangpinyouxiaoqi, baozhiqi, shengchanriqi, youxiaoqitianshu, kuweihao, caozuoren, createtime, isshangjia, querenren, queren_time', 'safe', 'on' => 'search'),
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
            'partner' => 'Partner',
            'laiyuan' => 'Laiyuan',
            'shangjiadanhao' => 'Shangjiadanhao',
            'order_code' => 'Order Code',
            'suoshukehu' => 'Suoshukehu',
            'kehubianhao' => 'Kehubianhao',
            'suoshucangku' => 'Suoshucangku',
            'order_type_explain' => 'Order Type Explain',
            'xiaoshouleixing' => 'Xiaoshouleixing',
            'rukucangku' => 'Rukucangku',
            'gonghuoshang' => 'Gonghuoshang',
            'zhengcanleixing' => 'Zhengcanleixing',
            'remark' => 'Remark',
            'shangpinmingcheng' => 'Shangpinmingcheng',
            'chuchang_bar' => 'Chuchang Bar',
            'nei_bar' => 'Nei Bar',
            'chengbenjia' => 'Chengbenjia',
            'caigoujia' => 'Caigoujia',
            'wangluodanjia' => 'Wangluodanjia',
            'yuyueshuliang' => 'Yuyueshuliang',
            'shangjiashuliang' => 'Shangjiashuliang',
            'shangpinyouxiaoqi' => 'Shangpinyouxiaoqi',
            'baozhiqi' => 'Baozhiqi',
            'shengchanriqi' => 'Shengchanriqi',
            'youxiaoqitianshu' => 'Youxiaoqitianshu',
            'kuweihao' => 'Kuweihao',
            'caozuoren' => 'Caozuoren',
            'createtime' => 'Createtime',
            'isshangjia' => 'Isshangjia',
            'querenren' => 'Querenren',
            'queren_time' => 'Queren Time',
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
        $criteria->compare('laiyuan', $this->laiyuan, true);
        $criteria->compare('shangjiadanhao', $this->shangjiadanhao, true);
        $criteria->compare('order_code', $this->order_code, true);
        $criteria->compare('suoshukehu', $this->suoshukehu, true);
        $criteria->compare('kehubianhao', $this->kehubianhao, true);
        $criteria->compare('suoshucangku', $this->suoshucangku, true);
        $criteria->compare('order_type_explain', $this->order_type_explain, true);
        $criteria->compare('xiaoshouleixing', $this->xiaoshouleixing, true);
        $criteria->compare('rukucangku', $this->rukucangku, true);
        $criteria->compare('gonghuoshang', $this->gonghuoshang, true);
        $criteria->compare('zhengcanleixing', $this->zhengcanleixing, true);
        $criteria->compare('remark', $this->remark, true);
        $criteria->compare('shangpinmingcheng', $this->shangpinmingcheng, true);
        $criteria->compare('chuchang_bar', $this->chuchang_bar, true);
        $criteria->compare('nei_bar', $this->nei_bar, true);
        $criteria->compare('chengbenjia', $this->chengbenjia);
        $criteria->compare('caigoujia', $this->caigoujia);
        $criteria->compare('wangluodanjia', $this->wangluodanjia);
        $criteria->compare('yuyueshuliang', $this->yuyueshuliang);
        $criteria->compare('shangjiashuliang', $this->shangjiashuliang);
        $criteria->compare('shangpinyouxiaoqi', $this->shangpinyouxiaoqi, true);
        $criteria->compare('baozhiqi', $this->baozhiqi);
        $criteria->compare('shengchanriqi', $this->shengchanriqi, true);
        $criteria->compare('youxiaoqitianshu', $this->youxiaoqitianshu);
        $criteria->compare('kuweihao', $this->kuweihao, true);
        $criteria->compare('caozuoren', $this->caozuoren, true);
        $criteria->compare('createtime', $this->createtime, true);
        $criteria->compare('isshangjia', $this->isshangjia, true);
        $criteria->compare('querenren', $this->querenren, true);
        $criteria->compare('queren_time', $this->queren_time, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return OShangjiadan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
}
