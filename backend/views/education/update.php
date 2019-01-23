<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\db\Education */

$this->title = 'Update Education';
//$this->params['breadcrumbs'][] = ['label' => 'Educations', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="education-update">

    <?php /* * ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php /* */ ?>

    <?= $this->render('_form', [
        'models' => $models,
    ]) ?>

</div>
