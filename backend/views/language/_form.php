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

<div class="language-form">

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
        'model' => $models[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'name',
            'level',

        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-envelope"></i> Language
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Language</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items dynamicform_wrapper"><!-- widgetContainer -->
            <?php foreach ($models as $index => $modelLanguage): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-address">Language: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                        // necessary for update action.
                        if (!$modelLanguage->isNewRecord) {
                            echo Html::activeHiddenInput($modelLanguage, "[{$index}]id");
                        }
                        ?>


                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelLanguage, "[{$index}]name")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelLanguage, "[{$index}]level")->dropDownList([ 'native' => 'Native', 'intermediate' => 'Intermediate', 'expert' => 'Expert', ], ['prompt' => '']) ?>
                            </div>
                        </div><!-- end:row -->


                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton($modelLanguage->isNewRecord ? 'Add' : 'Update', ['class' => 'btn btn-primary']) ?>
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
            jQuery(this).html("Language: " + (index + 1))
        });
        $(".dynamicform_wrapper .item:last-child input, .dynamicform_wrapper .item:last-child textarea, .dynamicform_wrapper .item:last-child select").val("");
//        $(".dynamicform_wrapper .item:last-child .form-group").css("background", "#f00");
        sleep(500);
        $(".dynamicform_wrapper .item:last-child .form-group").removeClass("has-error");
        $(".dynamicform_wrapper .item:last-child .form-group .help-block").html("");
        
    });
    
    jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
//    alert(2);
        jQuery(".dynamicform_wrapper .item .panel-title").each(function(index) {
            jQuery(this).html("Education: " + (index + 1))
        });
    });
    ';

//    $this->registerJs($js);

?>

