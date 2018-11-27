<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 11/27/18
 * Time: 3:24 PM
 */

namespace common\helpers;


use common\models\db\PersonalData;
use common\models\db\User;
use Yii;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class UserHelper
{
    public static function getLoggedInUserPhoto(){
        $model = PersonalData::find()->where([
            'user_id' => Yii::$app->user->id,
        ])->one();

        if(empty($model)){
            throw new NotFoundHttpException('Page Not Found');

        }

        return Yii::$app->urlManager->createUrl($model->photo);
    }


    public static function getLoggedInUserFullName(){
        $model = User::find()->where([
            'id' => Yii::$app->user->id,
        ])->one();

        if(empty($model)){
            throw new NotFoundHttpException('Page Not Found');
        }

        return $model->first_name . ' ' . $model->last_name;
    }

}