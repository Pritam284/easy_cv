<?php

use backend\widgets\cvCreateWidget\StepsWidget;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap\Progress;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

echo StepsWidget::widget(['currentStep' => 7]);

/* @var $this yii\web\View */
/* @var $model common\models\db\Language */
/* @var $form yii\widgets\ActiveForm */
?>
<?php /* *?>

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

<?php /* */?>


<?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.container-items', // required: css class selector
    'widgetItem' => '.item', // required: css class
    'limit' => 4, // the maximum times, an element can be cloned (default 999)
    'min' => 0, // 0 or 1 (default 1)
    'insertButton' => '.add-item', // css class
    'deleteButton' => '.remove-item', // css class
    'model' => $model[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'level',
        'name',
    ],
]); ?>

<button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add address</button>

<div class="panel-body container-items"><!-- widgetContainer -->
    <?php foreach ($model as $index => $modelLanguage): ?>
        <div class="item">
        <?= $form->field($modelLanguage, "[{$index}]level")->textInput(['maxlength' => true]) ?>

        <?= $form->field($modelLanguage, "[{$index}]name")->textInput(['maxlength' => true]) ?>
        </div>
    <?php endforeach; ?>
</div>

<?php DynamicFormWidget::end(); ?>



<?php ActiveForm::end(); ?>
