<?php

use yii\bootstrap\Progress;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo Progress::widget([
    'percent' => 70,
    'options' => ['class' => 'progress-danger active progress-striped'],
]);

/* @var $this yii\web\View */
/* @var $model common\models\db\Language */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="language-form">

    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'level')->dropDownList([ 'native' => 'Native', 'intermediate' => 'Intermediate', 'expert' => 'Expert', ], ['prompt' => '']) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>



</div>
