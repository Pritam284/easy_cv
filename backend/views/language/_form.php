<?php

use backend\widgets\cvCreateWidget\StepsWidget;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap\Progress;
use yii\helpers\Html;
use yii\widgets\ActiveForm;



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

<div class="language-form">
    <?php echo StepsWidget::widget(['currentStep' => 7]); ?>

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $model,
        'formId' => 'dynamic-form',
        'formFields' => [
            'name',
            'level',
        ],
    ]); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-fas fa-language"></i> Language
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Language</button>
            <div class="clearfix"></div>
        </div>
        <?php foreach ($model as $index => $modelLanguage): ?>
            <div class="panel-body container-items">
                    <div class="item panel panel-default">
                        <div class="panel-heading">
                            <span class="panel-title-address">Language: <?= ($index + 1) ?></span>
                            <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
            </div>
        <?php endforeach; ?>

    </div>

</div>


<?php
$js = '

jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});
';

$this->registerJs($js);

?>