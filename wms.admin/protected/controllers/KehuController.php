<?php

class KehuController extends Controller {
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
                'actions' => array('index', 'view'),
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
        $model = new Kehu;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Kehu'])) {
            $model->attributes = $_POST['Kehu'];
            $model->input_man = Yii::app()->user->id;
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $criteria = new CDbCriteria();
        $criteria->order = "id desc";
        $criteria->limit = 1;
        $data = Kehu::model()->find($criteria);
        if ($data) {
            $id = $data->id;
            $model->kehubianhao = sprintf("%04d", $id+1);
            /**暂存库位*/
            $tmpZancunkuwei = $data->zancunkuwei;
            $arrTmp = explode("-", $tmpZancunkuwei);
            if ($arrTmp[2] < 99) {
                $model->zancunkuwei = "999-" . sprintf("%02d", $arrTmp[1]) . "-" . sprintf("%02d", $arrTmp[2] + 1);
            } else {
                if($arrTmp[1]>=99) {
                    throw new CHttpException("暂存库位号超出范围");
                }
                $model->zancunkuwei = "999-" . sprintf("%02d", $arrTmp[1] + 1) . "-01";
            }
            /**订单暂存库位*/
            $tmpDingdan_zancunkuwei = $data->dingdan_zancunkuwei;
            $arrTmp = explode("-", $tmpDingdan_zancunkuwei);
            if ($arrTmp[2] < 99) {
                $model->dingdan_zancunkuwei = "888-" . sprintf("%02d", $arrTmp[1]) . "-" . sprintf("%02d", $arrTmp[2] + 1);
            } else {
                if($arrTmp[1]>99) {
                    throw new CHttpException("订单暂存库位号超出范围");
                }
                $model->dingdan_zancunkuwei = "888-" . sprintf("%02d", $arrTmp[1] + 1) . "-01";
            }
            /**库存返厂暂存库位*/
            $arrTmp = array();
            $tmpKucunfanchang_zancunkuwei = $data->kucunfanchang_zancunkuwei;
            $arrTmp = explode("-", $tmpKucunfanchang_zancunkuwei);
            if ($arrTmp[2] < 99) {
                $model->kucunfanchang_zancunkuwei = "777-" . sprintf("%02d", $arrTmp[1]) . "-" . sprintf("%02d", $arrTmp[2] + 1);
            } else {
                if($arrTmp[1]>99) {
                    throw new CHttpException("库存返厂暂存库位号超出范围");
                }
                $model->kucunfanchang_zancunkuwei = "777-" . sprintf("%02d", $arrTmp[1] + 1) . "-01";
            }
        }else{
            $model->kehubianhao = sprintf("%04d", 1);
            $model->zancunkuwei = "999-00-" . sprintf("%02d", 1);
            $model->dingdan_zancunkuwei = "888-00-" . sprintf("%02d", 1);
            $model->kucunfanchang_zancunkuwei = "777-00-" . sprintf("%02d", 1);
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

        if (isset($_POST['Kehu'])) {
            $model->attributes = $_POST['Kehu'];
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
        $dataProvider = new CActiveDataProvider('Kehu');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Kehu('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Kehu']))
            $model->attributes = $_GET['Kehu'];

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
        $model = Kehu::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'kehu-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
