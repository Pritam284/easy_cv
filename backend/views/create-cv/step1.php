<?php
/* @var $this yii\web\View */

use yii\bootstrap\Progress;
use  yii\bootstrap\Widget;

$this->title = 'Create CV - Step 1';

echo Progress::widget([
    'percent' => 10,
    'options' => ['class' => 'progress-danger active progress-striped'],
]);


?>


