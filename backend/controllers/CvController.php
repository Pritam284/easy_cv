<?php

namespace backend\controllers;

use common\models\db\User;
use Yii;

class CvController extends \yii\web\Controller
{
    public function actionView()
    {
        /* @var $user \common\models\db\User */
        $user = User::find()->where(['id' => Yii::$app->user->id])->one();


        return $this->render('view', ['user' => $user]);
    }

}
