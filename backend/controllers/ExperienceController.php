<?php

namespace backend\controllers;

use common\models\MultiModel;
use Yii;
use common\models\db\Experience;
use backend\models\search\ExperienceSearch;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExperienceController implements the CRUD actions for Experience model.
 */
class ExperienceController extends Controller
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
     * Lists all Experience models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExperienceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Experience model.
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
     * Creates a new Experience model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $experience = Experience::find()->where(['user_id' => Yii::$app->user->id])->one();

        if($experience != null){
            return $this->redirect(['update']);
        }

        $models = [new Experience];
        $user_id = Yii::$app->user->id;

        if(!empty(Yii::$app->request->post())){
            $models = MultiModel::createMultiple(Experience::className());
            MultiModel::loadMultiple($models, Yii::$app->request->post());

//            echo "<pre>";
//            print_r($models);
//            die();

            array_walk($models, function ($s_model) use ($user_id){
               $s_model->user_id = $user_id;
            });

            $valid = MultiModel::validateMultiple($models);

            if(!$valid){
                $error = [];

                foreach ($models as $model){
                    $error[] = $model->getErrors();
                }

//                echo "<pre>";
//                print_r($errors);
//                die();
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

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['skill/create']);
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
            'models' => (empty($models)) ? [new Experience] : $models,
        ]);
    }

    /**
     * Updates an existing Experience model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        $models = $this->findModels();
        $user_id = Yii::$app->user->id;

        if(!empty(Yii::$app->request->post())) {
            $oldIDs = ArrayHelper::map($models, 'id', 'id');
            $models = MultiModel::createMultiple(Experience::className(), $models);
            MultiModel::loadMultiple($models, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($models, 'id', 'id')));


            array_walk($models, function ($s_model) use ($user_id){
                $s_model->user_id = $user_id;
            });

            $valid = MultiModel::validateMultiple($models);

            if(!$valid){
                $errors = [];

                foreach ($models as $model){
                    $errors[] = $model->getErrors();
                }

                echo "<pre>";
                print_r($errors);
                die();

            } else {
                $transaction = Yii::$app->db->beginTransaction();

                try {
                    $flag = false;

                    if(!empty($deletedIDs)){
                        Experience::deleteAll(['id' => $deletedIDs]);
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
                        return $this->redirect(['skill/create']);
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

            return $this->redirect(['skill/create']);
        }

        return $this->render('update', [
            'models' => $models,
        ]);
    }

    /**
     * Deletes an existing Experience model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Experience model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Experience the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModels()
    {
        if (($models = Experience::findAll(['user_id' => Yii::$app->user->id])) !== null) {
            return $models;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
