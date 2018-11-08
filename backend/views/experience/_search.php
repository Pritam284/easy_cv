<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ExperienceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="experience-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'designation') ?>

    <?= $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'year_from') ?>

    <?php // echo $form->field($model, 'year_to') ?>

    <?php // echo $form->field($model, 'responsibilities') ?>

    <?php // echo $form->field($model, 'currently_working') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
