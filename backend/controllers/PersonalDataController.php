<?php

//namespace app\controllers;
namespace backend\controllers;

use Yii;
use common\models\db\PersonalData;
use backend\models\search\PersonalDataSearch;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PersonalDataController implements the CRUD actions for PersonalData model.
 */
class PersonalDataController extends Controller
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
     * Lists all PersonalData models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $searchModel = new PersonalDataSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
        $personalData = PersonalData::find()->where(['user_id' => Yii::$app->user->id])->one();
        if ($personalData != null) {
            return $this->redirect(['view']);
        }else{
            return $this->redirect(['create']);
        }

    }

    /**
     * Displays a single PersonalData model.
     * @param string $id
     * @param integer $user_id
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
     * Creates a new PersonalData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $personalData = PersonalData::find()->where(['user_id' => Yii::$app->user->id])->one();
        if ($personalData != null) {
            return $this->redirect(['update']);
        }
        $model = new PersonalData();
        $model->user_id = Yii::$app->user->id;


        if ($model->load(Yii::$app->request->post())) {

            Yii::$app->session->getFlash('Personal Data Saved Successfully');
            $model->photo = UploadedFile::getInstance($model, 'photo');

            if ($model->validate()) {

                $path = 'uploads/' . str_replace(' ','_', $model->photo->baseName) . time() . '.' . $model->photo->extension;
                $isSave= $model->photo->saveAs($path);
                if($isSave){
                    $model->photo = $path;
                }
                $model->save(false);
                return $this->redirect(['education/create']);

            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpload(){
        $model = new PersonalData();

        if (Yii::$app->request->isPost) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }
        return $this->render('view', [
                'model' => $model,
            ]);
    }

    /**
     * Updates an existing PersonalData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        $model = $this->findModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['education/create']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PersonalData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $user_id)
    {
        $this->findModel($id, $user_id)->delete();

        return $this->redirect(['index']);
    }



    /**
     * Finds the PersonalData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @param integer $user_id
     * @return PersonalData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel()
    {
        if (($model = PersonalData::findOne(['user_id' => Yii::$app->user->id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
