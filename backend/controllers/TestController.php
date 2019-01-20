<?php

namespace backend\controllers;

use common\helpers\PdfHelper;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $content = "This is a PDF";
        return PdfHelper::test($content);
    }

}
