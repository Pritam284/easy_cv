<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\db\Experience */

$this->title = 'Update Experience';
//$this->params['breadcrumbs'][] = ['label' => 'Experiences', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="experience-update">

    <?php /* * ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php /* */ ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
