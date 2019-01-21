<?php

namespace backend\controllers;

use common\models\MultiModel;
use Yii;
use common\models\db\Language;
use backend\models\search\LanguageSearch;
use yii\base\Model;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LanguageController implements the CRUD actions for Language model.
 */
class LanguageController extends Controller
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
     * Lists all Language models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LanguageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Language model.
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
     * Creates a new Language model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $language = Language::find()->where(['user_id' => Yii::$app->user->id])->one();

        if($language != null){
            return $this->redirect(['update']);
        }

        $model = [new Language];
//        $model->user_id = Yii::$app->user->id;

//        if($model->load(Yii::$app->request->post())){
//            $model =Language::createMultiple(Language::className());
//            Language::loadMultiple($model, Yii::$app->request->post());
//
//            $valid = Language::validateMultiple($model);
//
//            if($valid){
//                $transaction = Yii::$app->db->beginTransaction();
//
//                try {
//                    if($flag = $model->save(false)){
//                        foreach ($model as $language){
//                            if(! ($flag = $language->save(false))){
//                                $transaction->rollBack();
//                                break;
//                            }
//                        }
//                    }
//
//                    if($flag){
//                        $transaction->commit();
//                        return $this->redirect(['certification/create']);
//                    }
//                } catch (Exception $e) {
//                    $transaction->rollBack();
//                }
//            }
//        }
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//
//        }

        if(!empty(Yii::$app->request->post())) {
            $models = MultiModel::createMultiple(Language::className());

        }

        return $this->render('create', [
            'model' => (empty($model)) ? [new Language] : $model,
//            'model' => (empty($model)) ? [new Language] : $model,
//            'model' => [new Language],
        ]);
    }

    /**
     * Updates an existing Language model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        $model = $this->findModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['certification/create']);
        }

        return $this->render('update', [
            'model' => (empty($model)) ? [new Language] : [$model],
        ]);
    }

    /**
     * Deletes an existing Language model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        $this->findModel()->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Language model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Language the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel()
    {
        if (($model = Language::findOne(['user_id' => Yii::$app->user->id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
