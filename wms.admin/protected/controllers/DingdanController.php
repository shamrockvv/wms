<?php

class DingdanController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'import'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Dingdan;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Dingdan'])) {
            $model->attributes = $_POST['Dingdan'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Dingdan'])) {
            $model->attributes = $_POST['Dingdan'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Dingdan');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Dingdan('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Dingdan']))
            $model->attributes = $_GET['Dingdan'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Dingdan::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'dingdan-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionImport() {
        $model = Dingdan::model();
        $strs = array();
        if (isset($_POST['Dingdan'])) {
            //$model->attributes = $_POST['Dingdan'];
            $file = CUploadedFile::getInstance($model, 'fileField');
            if ($file->getType() == 'application/vnd.ms-excel') {
                $filename = substr(md5($file->getName()), 0, 16);
                $location = date('Ym/d');
                $savePath = Yii::getPathOfAlias("application") . "/upload/dingdan/" . $location . "/";
                if (!is_dir($savePath)) {
                    mkdir($savePath, 0777, true);
                }
                $uploadFile = $savePath . $filename . "." . $file->getExtensionName();
                if ($file->saveAs($uploadFile)) {
                    Yii::$enableIncludePath = false;
                    Yii::import('common.phpExcel.PHPExcel', 1);
                    $objReader = PHPExcel_IOFactory::createReader('Excel5');
                    $objPHPExcel = $objReader->load($uploadFile);
                    $objWorksheet = $objPHPExcel->getActiveSheet();
                    $highestRow = $objWorksheet->getHighestRow();
                    //echo 'highestRow=' . $highestRow;
                    //echo "<br>";
                    $highestColumn = $objWorksheet->getHighestColumn();
                    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);//总列数
                    //echo 'highestColumnIndex=' . $highestColumnIndex;
                    //echo "<br>";
                    //注意$highestRow的行数索引从1开始
                    for ($row = 2; $row <= $highestRow; $row++) {
                        //注意highestColumnIndex的列数索引从0开始
                        for ($col = 0; $col < $highestColumnIndex; $col++) {
                            $cell = $objWorksheet->getCellByColumnAndRow($col, $row);
                            $value = $cell->getValue();

                            if ($cell->getDataType() == PHPExcel_Cell_DataType::TYPE_NUMERIC) {
                                $cellstyleformat = $cell->getWorksheet()->getStyle($cell->getCoordinate())->getNumberFormat();
                                $formatcode = $cellstyleformat->getFormatCode();
                                if (preg_match('/^(\[\$[A-Z]*-[0-9A-F]*\])*[hmsdy]/i', $formatcode)) {
                                    $value = gmdate("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($value));
                                } else {
                                    $value = PHPExcel_Style_NumberFormat::toFormattedString($value, $formatcode);
                                }
                            }
                            if (is_object($value))
                                $value = $value->getPlainText();
                            $strs[$row - 2][$col] = $value;
                        }
                    }
                }
                $rows = array();
                $data = array();
                $rows['laiyuan'] = 'excel导入';
                $rows['order_type'] = '201';
                $rows['zhifufangshi'] = '在线支付';
                $rows['suoshukehu'] = $_POST['Dingdan']['suoshukehu'];
                $rows['kehubianhao'] = Kehu::model()->getIdByName($rows['suoshukehu']);
                $rows['suoshucangku'] = $_POST['Dingdan']['suoshucangku'];
                $fieldName = array(
                    'peisongshang',
                    'pingtai',
                    'chuchangtiaoma',
                    'dingdanbianhao',
                    'shangpinmingcheng',
                    'zhongliang',
                    'shuliang',
                    'order_create_time',
                    'total_amount',
                    'yunfei',
                    'yingshou_amount',
                    'shishou_amount',
                    'daishou_amount',
                    'shouhuoren',
                    'dizhi',
                    'dianhua',
                    'remark',
                    'fapiao_type',
                    'fapiao_taitou',
                    'fapiao_neirong',
                    'fapiao_jine',
                );
                /**插入包裹表*/
                foreach ($strs as $info) {
                    $data = array_combine($fieldName, $info);
                    $rows = array_merge($rows, $data);
                    $mBaoguo = new Baoguo();
                    //$mBaoguo->attributes = $rows;
                    $mBaoguo->zhifufangshi = $rows['zhifufangshi'];
                    $mBaoguo->suoshucangku = $rows['suoshucangku'];
                    $mBaoguo->suoshukehu=$rows['suoshukehu'];
                    $mBaoguo->kehubianhao = $rows['kehubianhao'];
                    $mBaoguo->nei_bar = Chanpinziliao::model()->getNeiBarByChuchangBar($rows['chuchangtiaoma'],$rows['shangpinmingcheng']);
                    $mBaoguo->pingtai = $rows['pingtai'];
                    $mBaoguo->laiyuan = $rows['laiyuan'];
                    $mBaoguo->peisongshang = $rows['peisongshang'];
                    $mBaoguo->order_type = $rows['order_type'];
                    $mBaoguo->chuchang_bar = $rows['chuchangtiaoma'];
                    $mBaoguo->dingdanbianhao = $rows['dingdanbianhao'];
                    $mBaoguo->sys_dingdanbianhao = 'FHD-'.date("Ymdihs");
                    $mBaoguo->shangpinmingcheng = $rows['shangpinmingcheng'];
                    $mBaoguo->shuliang = $rows['shuliang'];
                    $mBaoguo->createtime = $rows['order_create_time'];
                    $mBaoguo->total_amount = $rows['total_amount'];
                    $mBaoguo->danjia = 0;
                    $mBaoguo->yunfei = $rows['yunfei'];
                    $mBaoguo->yingshou_amount = $rows['yingshou_amount'];
                    $mBaoguo->shishou_amount = $rows['shishou_amount'];
                    $mBaoguo->daishou_amount = $rows['daishou_amount'];
                    $mBaoguo->fapiao_type = $rows['fapiao_type'];
                    $mBaoguo->fapiao_jine = $rows['fapiao_jine'];
                    $mBaoguo->fapiao_taitou = $rows['fapiao_taitou'];
                    $mBaoguo->fapiao_neirong = $rows['fapiao_neirong'];
                    $mBaoguo->lururen = Yii::app()->user->id;
                    $mBaoguo->isNewRecord = true;
                    //var_dump($mBaoguo->attributes);die;
                    if ($mBaoguo->save(false)) {
                    } else
                        throw new CHttpException(404, "导入包裹表错误");
                }
                /**插入订单表*/
                $model = array();
                $index = Dingdan::model()->count("createtime>=:time",array(':time'=>date("Y-m-d") . " 00:00:00"));
                if(!$index)
                    $index=1;
                else
                    $index +=1;
                foreach ($strs as $info) {
                    $isNew = true;
                    $data = array_combine($fieldName, $info);
                    $rows = array_merge($rows, $data);

                    $rows['sys_dingdanbianhao'] = 'FHD'.date("ymd") . sprintf('%04d',$index);
                    $rows['lururen'] = Yii::app()->user->id;
                    foreach ($model as $index => $m) {
                        if ($m['dingdanbianhao'] == $rows['dingdanbianhao']) {
                            $model[$index]['zongshuliang'] += intval($rows['shuliang']);
                            $model[$index]['zhongliang'] += floatval($rows['zhongliang']);
                            unset($model[$index]['shuliang']);
                            unset($model[$index]['shangpinmingcheng']);
                            unset($model[$index]['chuchangtiaoma']);
                            ksort($model[$index]);
                            $isNew = false;
                            break;
                        }
                    }
                    if($isNew){
                        $rows['zongshuliang'] = $rows['shuliang'];
                        $model[] = $rows;
                    }
                }
                foreach($model as $m){
                    $mDingdan = new Dingdan();
                    foreach($m as $index=>$val){
                        $mDingdan->$index=$val;
                    };
                    if ($mDingdan->save(false)) {
                        /**更新包裹表中发货单编号*/
                        Baoguo::model()->updateAll(array('sys_dingdanbianhao'=>$m['sys_dingdanbianhao']),"dingdanbianhao=:ddbh",array(":ddbh"=>$m['dingdanbianhao']));
                    }else{
                        //print_r($mDingdan->getErrors());die;
                        throw new CHttpException(404, "导入订单表错误:");
                    }
                }
                $this->redirect(array('admin'));
            }
        }
        $this->render('import', array('model' => $model));
    }

    public function getCangkuList() {
        $model = Cangku::model()->findAll();
        return CHtml::listData($model, "cangkuname", "cangkuname");
    }

    public function getKehuList() {
        $model = Kehu::model()->findAll();
        return CHtml::listData($model, "kehuname", "kehuname");
    }
}
