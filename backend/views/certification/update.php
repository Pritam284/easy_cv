<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\db\Certification */

$this->title = 'Update Certification';
//$this->params['breadcrumbs'][] = ['label' => 'Certifications', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="certification-update">

    <?php /* * ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php /* */ ?>

    <?= $this->render('_form', [
        'models' => $models,
    ]) ?>

</div>
