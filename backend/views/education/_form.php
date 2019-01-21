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

<?php /* * ?>
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

<div class="education-form">

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
        'model' => $model[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'institute',
            'degree',
            'subject',
            'year_from',
            'result',


        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-envelope"></i> Education
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Education</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($model as $index => $modelEducation): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-address">Education: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                        // necessary for update action.
                        if (!$modelEducation->isNewRecord) {
                            echo Html::activeHiddenInput($modelEducation, "[{$index}]id");
                        }
                        ?>


                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelEducation, "[{$index}]institute")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelEducation, "[{$index}]degree")->textInput() ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelEducation, "[{$index}]subject")->textInput() ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelEducation, "[{$index}]year_from")->textInput()->widget(DateRangePicker::className(), [
                                    'attributeTo' => 'year_to',
                                    'form' => $form, // best for correct client validation
                                    'language' => 'en',
                                    'size' => 'lg',
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd'
                                    ]
                                ])->label('Duration'); ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelEducation, "[{$index}]result")->textInput() ?>
                            </div>
                        </div><!-- end:row -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton($modelEducation->isNewRecord ? 'Add' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = '
    jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
           console.log(item);
        jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
            jQuery(this).html("Education: " + (index + 1))
        });
    });
    
    jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
        jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
            jQuery(this).html("Education: " + (index + 1))
        });
    });
    ';

$this->registerJs($js);

?>
