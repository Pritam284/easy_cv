<?php

use dosamigos\datepicker\DateRangePicker;
use yii\bootstrap\Progress;
use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;

echo Progress::widget([
    'percent' => 50,
    'options' => ['class' => 'progress-danger active progress-striped'],
]);

/* @var $this yii\web\View */
/* @var $model common\models\db\Training */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="training-form">

    <div class="row">
        <div class="col-md-6">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'institute')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'on_training')->checkbox(['class' => 'on_training']) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>

<?php

$this->registerJsFile('@web/js/training.js',[

        'depends' => [
            JqueryAsset::className()
        ]
])

?>
