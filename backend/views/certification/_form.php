<?php

use backend\widgets\cvCreateWidget\StepsWidget;
use dosamigos\datepicker\DatePicker;
use yii\bootstrap\Progress;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo StepsWidget::widget(['currentStep' => 8]);

/* @var $this yii\web\View */
/* @var $model common\models\db\Certification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="certification-form">

    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'authority')->textInput(['maxlength' => true]) ?>

            <label>Year</label>
            <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'year',
//                'label' => 'Year',
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?> <br>

            <?= $form->field($model, 'certificate_no')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>



</div>
