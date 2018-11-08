<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\Education */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-form">

    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'institute')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'degree')->textInput() ?>

            <?= $form->field($model, 'subject')->textInput() ?>

            <?= $form->field($model, 'year_from')->textInput() ?>

            <?= $form->field($model, 'year_to')->textInput() ?>

            <?= $form->field($model, 'result')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>



</div>
