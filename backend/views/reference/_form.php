<?php

use yii\bootstrap\Progress;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo Progress::widget([
    'percent' => 90,
    'options' => ['class' => 'progress-danger active progress-striped'],
]);

/* @var $this yii\web\View */
/* @var $model common\models\db\Reference */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reference-form">

    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'designation')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'contact_no')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
