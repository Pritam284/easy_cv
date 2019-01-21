<?php

namespace backend\controllers;

use common\helpers\PdfHelper;
use common\models\db\Language;
use frontend\models\TestForm;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $content = "This is a PDF";
        return PdfHelper::test($content);
    }

    public function actionDynamicForm() {

        $childModels = [new Language()];
        return $this->render('dynamic-form', [
            'childModels' => (empty($childModels)) ? [new Language()] : $childModels,
//            'childModels' => $childModels,
        ]);
    }

}
