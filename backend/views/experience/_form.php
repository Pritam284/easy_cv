<?php

use backend\widgets\cvCreateWidget\StepsWidget;
use yii\bootstrap\Progress;
use yii\helpers\Html;
use dosamigos\datepicker\DateRangePicker;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;

echo StepsWidget::widget(['currentStep' => 3]);

/* @var $this yii\web\View */
/* @var $model common\models\db\Experience */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="experience-form">

    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'designation')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

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

            <?= $form->field($model, 'responsibilities')->textarea(['rows' => 6]) ?>

            <?php $currently_working_class = ($model->currently_working) ? 'uncheck' :'check'?>

            <?= $form->field($model, 'currently_working')->checkbox(['class' => "currently_working {$currently_working_class}"]); ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>

<?php $this->registerJsFile('@web/js/experience.js', [
    'depends' => [
        JqueryAsset::className()
        ]
    ])?>
