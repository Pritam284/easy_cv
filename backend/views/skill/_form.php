<?php

use backend\widgets\cvCreateWidget\StepsWidget;
use yii\bootstrap\Progress;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo StepsWidget::widget(['currentStep' => 4]);

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
            <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>



</div>
