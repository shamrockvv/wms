<?php
@ob_end_clean();
@ob_start();

class ChanpinziliaoController extends Controller {
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
                'actions' => array('index', 'view', 'import', 'count'),
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
        $model = new Chanpinziliao;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Chanpinziliao'])) {
            $model->attributes = $_POST['Chanpinziliao'];
            $model->lururen = Yii::app()->user->id;
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

        if (isset($_POST['Chanpinziliao'])) {
            $model->attributes = $_POST['Chanpinziliao'];
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

        $dataProvider = new CActiveDataProvider('Chanpinziliao');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Chanpinziliao('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Chanpinziliao'])) {
            $model->attributes = $_GET['Chanpinziliao'];
        }
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
        $model = Chanpinziliao::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'chanpinziliao-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function getCangkuList() {
        $model = Cangku::model()->findAll();
        return CHtml::listData($model, "cangkuname", "cangkuname");
    }

    public function getKehuList() {
        $model = Kehu::model()->findAll();
        return CHtml::listData($model, "kehuname", "kehuname");
    }

    public function actionImport() {
        $model = Chanpinziliao::model();
        $strs = array();
        if (isset($_POST['Chanpinziliao'])) {
            $model->attributes = $_POST['Chanpinziliao'];
            $file = CUploadedFile::getInstance($model, 'fileField');
            if ($file->getType() == 'application/vnd.ms-excel') {
                $filename = substr(md5($file->getName()), 0, 16);
                $location = date('Ym/d');
                $savePath = Yii::getPathOfAlias("application") . "/upload/chanpin/" . $location . "/";
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
                $filedName = array(
                    'chuchang_bar',
                    'shangpinmingcheng',
                    'sku',
                    'chima',
                    'yanse',
                    'rongji',
                    'jiage'
                );
                $index = Chanpinziliao::model()->count("kehubianhao=:bianhao", array(":bianhao" => Yii::app()->user->id));
                if (!$index) {
                    $index = 0;
                }
                foreach ($strs as $info) {
                    $rows = array_combine($filedName, $info);
                    $model = new Chanpinziliao;
                    $data = $model->find('chuchang_bar=:bar', array(":bar" => $rows['chuchang_bar']));
                    if ($data)
                        $model->isNewRecord = false;
                    else
                        $model->isNewRecord = true;
                    $model->attributes = $rows;
                    $model->suoshucangku = $_POST['Chanpinziliao']['suoshucangku'];
                    $model->suoshukehu = $_POST['Chanpinziliao']['suoshukehu'];
                    $model->kehubianhao = Kehu::model()->getIdByName($model->suoshukehu);
                    $model->nei_bar = $model->kehubianhao . sprintf("%04d", $index);
                    $model->lock = '否';
                    $model->lururen = Yii::app()->user->id;
                    $model->lock = "否";
                    if ($model->save()) {
                    } else
                        throw new CHttpException(404, "导入错误");
                    $index += 1;
                }
                $this->redirect(array('admin'));
            }
        }
        $this->render('import', array('model' => $model));
    }

    public function actionCount() {
        $suoshucangku = Yii::app()->request->getParam('ck', '选择仓库');
        $kehushu = Kuwei::model()->getKehuNumber($suoshucangku);
        $pinzhongshu = Kuwei::model()->getPinzhongNumber($suoshucangku);
        $zongkucun = Kuwei::model()->getZongkucunNumber($suoshucangku);
        var_dump($kehushu, $pinzhongshu, $zongkucun);
    }
}
