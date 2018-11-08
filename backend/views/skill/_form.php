<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\Skill */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="skill-form">

    <div class="col-md-6">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'level')->dropDownList([ 'Beginner' => 'Beginner', 'Intermediate' => 'Intermediate', 'Expert' => 'Expert', ], ['prompt' => '']) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>



</div>
