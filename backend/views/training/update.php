<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\db\Training */

$this->title = 'Update Training';
//$this->params['breadcrumbs'][] = ['label' => 'Trainings', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="training-update">

    <?php /* * ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php /* */ ?>

    <?= $this->render('_form', [
        'models' => $models,
    ]) ?>

</div>
