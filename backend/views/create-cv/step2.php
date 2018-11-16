<?php
/* @var $this yii\web\View */

use yii\bootstrap\Progress;

$this->title='Create CV - Step 2';

echo Progress::widget([
    'percent' => 20,
    'options' => ['class' => 'progress-danger active progress-striped'],
]);

?>
