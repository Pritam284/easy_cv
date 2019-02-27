<?php

use backend\widgets\cvCreateWidget\StepsWidget;
use dosamigos\datepicker\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap\Progress;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCssFile('@web/lib/bootstrap-datepicker/css/bootstrap-datepicker.min.css');

echo StepsWidget::widget(['currentStep' => 6]);

/* @var $this yii\web\View */
/* @var $model common\models\db\Achievement */
/* @var $form yii\widgets\ActiveForm */
?>
<?php /* * ?>
<div class="achievement-form">

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

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php /* */ ?>


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
                'name',
                'authority',
                'year',
                'description',
//            'is_active',
            ],
        ]);

        ?>
        <?php /* */ ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-envelope"></i> Achievements
                <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Achievement</button>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body container-items"><!-- widgetContainer -->
                <?php foreach ($models as $index => $modelAchievement): ?>



                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <span class="panel-title">Achievement: <?= ($index + 1) ?></span>
                            <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                            <div class="clearfix"></div>
                        </div>

                        <?php if(!$modelAchievement->isNewRecord){ ?>
                            <?= $form->field($modelAchievement, "[{$index}]id")->hiddenInput()->label(false) ?>
                        <?php } ?>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelAchievement, "[{$index}]name")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelAchievement, "[{$index}]authority")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelAchievement, "[{$index}]year")->textInput(['class' => 'form-control datepicker year-to']) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelAchievement, "[{$index}]description")->textarea(['rows' => 6]) ?>
                                </div>
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
            jQuery(this).html("Achievement: " + (index + 1))
        });
        $(".dynamicform_wrapper .item:last-child input, .dynamicform_wrapper .item:last-child textarea, .dynamicform_wrapper .item:last-child select").val("");
//        $(".dynamicform_wrapper .item:last-child .form-group").css("background", "#f00");
          $(\'.datepicker\').each(function() {
            $(this).datepicker();
        });  
        sleep(500);
        $(".dynamicform_wrapper .item:last-child .form-group").removeClass("has-error");
        $(".dynamicform_wrapper .item:last-child .form-group .help-block").html("");
        console.log($(\'.datepicker\').length);
        
    });
    
    jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
//    alert(2);
        jQuery(".dynamicform_wrapper .item .panel-title").each(function(index) {
            jQuery(this).html("Achievement: " + (index + 1))
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
