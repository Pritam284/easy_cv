<?php

//namespace app\controllers;
namespace backend\controllers;

use Yii;
use common\models\db\PersonalData;
use backend\models\search\PersonalDataSearch;
use yii\filters\AccessControl;
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
        $searchModel = new PersonalDataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PersonalData model.
     * @param string $id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $user_id),
        ]);
    }

    /**
     * Creates a new PersonalData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PersonalData();
        $model->user_id = Yii::$app->user->id;


        if ($model->load(Yii::$app->request->post())) {

            Yii::$app->session->getFlash('Personal Data Saved Successfully');
            $model->photo = UploadedFile::getInstance($model, 'photo');

            if ($model->validate()) {

                $isSave= $model->photo->saveAs('uploads/' . $model->photo->baseName . time() . '.' . $model->photo->extension);
                if($isSave){
                    $model->photo = 'uploads/' . $model->photo->baseName . time() . '.' . $model->photo->extension;
                }
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id]);

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
    public function actionUpdate($id, $user_id)
    {
        $model = $this->findModel($id, $user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id]);
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
    protected function findModel($id, $user_id)
    {
        if (($model = PersonalData::findOne(['id' => $id, 'user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
