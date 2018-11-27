<?php

use backend\widgets\cvCreateWidget\StepsWidget;
use dosamigos\datepicker\DateRangePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap\Progress;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\Education */
/* @var $form yii\widgets\ActiveForm */

echo StepsWidget::widget(['currentStep' => 2]);

?>

<div class="education-form">

    <?php /* */ ?>
    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'institute')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'degree')->textInput() ?>

            <?= $form->field($model, 'subject')->textInput() ?>

            <?= $form->field($model, 'year_from')->textInput()->widget(DateRangePicker::className(), [
                'attributeTo' => 'year_to',
                'form' => $form, // best for correct client validation
                'language' => 'en',
                'size' => 'lg',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ])->label('Duration'); ?>

            <?= $form->field($model, 'result')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <?php /* */ ?>





</div>
