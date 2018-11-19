<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\db\PersonalData */

$this->title = 'Update Personal Information';
//$this->params['breadcrumbs'][] = ['label' => 'Personal Datas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'user_id' => $model->user_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personal-data-update">

    <?php /* * ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php /* */ ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
