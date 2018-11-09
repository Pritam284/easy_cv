<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\Achievement */

$this->title = 'Add Achievement';
$this->params['breadcrumbs'][] = ['label' => 'Achievements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>