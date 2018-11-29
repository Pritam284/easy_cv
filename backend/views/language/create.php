<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\Language */

$this->title = 'Add Language';
//$this->params['breadcrumbs'][] = ['label' => 'Languages', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-create">

    <?php /* * ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php /* */ ?>

    <?php
    print_r($model);
    die();
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
