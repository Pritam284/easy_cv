<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\Reference */

$this->title = 'Add Reference';
//$this->params['breadcrumbs'][] = ['label' => 'References', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reference-create">

    <?php /* * ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php /* */ ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
