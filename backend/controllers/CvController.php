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
//        echo '<pre>';
//        print_r($user->personalDatas[0]->contact_no);
//        die();
        return $this->render('view', ['user' => $user]);
    }

}
