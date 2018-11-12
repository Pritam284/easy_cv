<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\Training */

$this->title = 'Add Training';
$this->params['breadcrumbs'][] = ['label' => 'Trainings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
