<?php

use dosamigos\datepicker\DateRangePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\MailingListRecipient */
/* @var $form yii\widgets\ActiveForm */

$this->registerCssFile('@web/lib/bootstrap-datepicker/css/bootstrap-datepicker.min.css');
?>

<?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>


<div class="mailing-list-recipient-form">

    <div id="sortableTable" class="white-even-td">

        <?php /* */ ?>

        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // required: css class selector
            'widgetItem' => '.item', // required: css class
//                'limit' => 4, // the maximum times, an element can be cloned (default 999)
            'min' => 1, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $models[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'institute',
                'degree',
                'subject',
                'year_from',
                'result',
//            'is_active',
            ],
        ]);

        ?>
        <?php /* */ ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-envelope"></i> Education
                <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Education</button>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body container-items"><!-- widgetContainer -->
                <?php foreach ($models as $index => $modelEducation): ?>

                    <?php if(!$modelEducation->isNewRecord){ ?>
                        <?= $form->field($modelEducation, "[{$index}]id")->hiddenInput()->label(false) ?>
                    <?php } ?>

                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <span class="panel-title">Education: <?= ($index + 1) ?></span>
                            <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                            <div class="clearfix"></div>
                        </div>

                        <div class="panel-body">
                            <div class="col-sm-6">
                                <?= $form->field($modelEducation, "[{$index}]institute")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelEducation, "[{$index}]degree")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelEducation, "[{$index}]subject")->textInput() ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelEducation, "[{$index}]year_from")->textInput(['class' => 'form-control datepicker']) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelEducation, "[{$index}]year_to")->textInput() ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelEducation, "[{$index}]result")->textInput() ?>
                            </div>




                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


        </div>

        <?php DynamicFormWidget::end(); ?>
    </div>

    <hr>

    <div class="form-group">
        <?= Html::submitButton($models[0]->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = '
    jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
//    alert(1);
           console.log(item);
           console.log(jQuery(".dynamicform_wrapper .item").length);
        jQuery(".dynamicform_wrapper .item .panel-title").each(function(index) {
        console.log(index + 1);
            jQuery(this).html("Education: " + (index + 1))
        });
        $(".dynamicform_wrapper .item:last-child input, .dynamicform_wrapper .item:last-child textarea, .dynamicform_wrapper .item:last-child select").val("");
//        $(".dynamicform_wrapper .item:last-child .form-group").css("background", "#f00");
        sleep(500);
        $(".dynamicform_wrapper .item:last-child .form-group").removeClass("has-error");
        $(".dynamicform_wrapper .item:last-child .form-group .help-block").html("");
        $(\'.datepicker\').datepicker({});
    });
    
    jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
//    alert(2);
        jQuery(".dynamicform_wrapper .item .panel-title").each(function(index) {
            jQuery(this).html("Education: " + (index + 1))
        });
    });
    ';

$this->registerJs($js);

$script ='
    $(\'.datepicker\').datepicker({});
' ;

$this->registerJs($script);

$this->registerJsFile('@web/lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
    [
            'depends' => [\yii\web\JqueryAsset::className()]
    ]);


$this->registerJs("
    console.log($('#dynamic-form').data('yiiActiveForm').attributes);
", yii\web\View::POS_LOAD);

?>

