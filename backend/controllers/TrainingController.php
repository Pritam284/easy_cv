<?php

namespace backend\controllers;

use common\models\MultiModel;
use Yii;
use common\models\db\Training;
use backend\models\searchTrainingSearch;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TrainingController implements the CRUD actions for Training model.
 */
class TrainingController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'view', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Training models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new searchTrainingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Training model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        return $this->render('view', [
            'model' => $this->findModel(),
        ]);
    }

    /**
     * Creates a new Training model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $training = Training::find()->where(['user_id' => Yii::$app->user->id])->one();

        if ($training != null){
            return $this->redirect(['update']);
        }

        $models = [new Training];
        $user_id = Yii::$app->user->id;

        if(!empty(Yii::$app->request->post())){
            $models = MultiModel::createMultiple(Training::className());
            MultiModel::loadMultiple($models, Yii::$app->request->post());

            array_walk($models, function ($s_model) use ($user_id){
               $s_model->user_id = $user_id;
            });

            $valid = MultiModel::validateMultiple($models);

            if(!$valid){
                $error = [];

                foreach ($models as $model){
                    $error[] = $model->getErrors();
                }
            } else {
                $transaction = Yii::$app->db->beginTransaction();

                try {
                    $flag = false;

                    foreach ($models as $model){
                        if (!($flag = $model->save(false))){
                            echo "<pre>";
                            print_r($model->getErrors());
                            die();

                            $transaction->rollBack();
                            break;
                        }
                    }

                    if($flag) {
                        $transaction->commit();
                        return $this->redirect(['achievement/create']);
                    }
                } catch (Exception $e){
                    $transaction->rollBack();
                    echo "<pre>";
                    print_r($e);
                    die();
                }
            }

        }

        return $this->render('create', [
            'models' => (empty($models)) ? [new Training] : $models,
        ]);
    }

    /**
     * Updates an existing Training model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        $models = $this->findModels();
        $user_id = Yii::$app->user->id;

        if (!empty(Yii::$app->request->post())) {
            $oldIDs = ArrayHelper::map($models, 'id', 'id');
            $models = MultiModel::createMultiple(Training::className(), $models);
            MultiModel::loadMultiple($models, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($models, 'id', 'id')));

            array_walk($models, function ($s_model) use ($user_id) {
                $s_model->user_id = $user_id;
            });

            $valid = MultiModel::validateMultiple($models);

            if (!$valid) {
                $errors = [];

                foreach ($models as $model) {
                    $errors[] = $model->getErrors();
                }

                echo "<pre>";
                print_r($errors);
                die();
            } else {
                $transaction = Yii::$app->db->beginTransaction();

                try {
                    $flag = false;

                    if (!empty($deletedIDs)) {
                        Training::deleteAll(['id' => $deletedIDs]);
                    }

                    foreach ($models as $model) {
                        if (!($flag = $model->save(false))) {
                            echo "<pre>";
                            print_r($model->getErrors());
                            die();
//                            $LogFile = LogHelper::save($model->getErrors(), $model, 'mailing_list_recipient_creation');
//                            Yii::$app->session->setFlash('error', "Error Creating Mailing List Recipient. [ERR_{$LogFile}]");
                            $transaction->rollBack();
                            break;
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
//                        Yii::$app->session->setFlash('success', 'Successfully added.');
                        return $this->redirect(['achievement/create']);
                    }

                } catch (Exception $e) {
                    $transaction->rollBack();
                    echo "<pre>";
                    print_r($e);
                    die();
//                    $LogFile = LogHelper::save($e->getMessage(), $e, 'mailing_list_recipient_create_exception');
//                    ErrorHelper::throwE(500);
//                    Yii::$app->session->setFlash('error', "Error Creating Mailing List Recipient. [ERR_{$LogFile}]");
                }
            }

            return $this->redirect(['achievement/create']);
        }

        return $this->render('update', [
            'models' => $models,
        ]);
    }

    /**
     * Deletes an existing Training model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        $this->findModels()->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Training model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Training the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModels()
    {
        if (($models = Training::findAll(['user_id' => Yii::$app->user->id])) !== null) {
            return $models;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
