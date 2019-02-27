<?php

use backend\widgets\cvCreateWidget\StepsWidget;
use dosamigos\datepicker\DateRangePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap\Progress;
use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;

echo StepsWidget::widget(['currentStep' => 5]);

/* @var $this yii\web\View */
/* @var $model common\models\db\Training */
/* @var $form yii\widgets\ActiveForm */
?>

<?php /* * ?>

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
                'institute',
                'name',
                'year_from',
                'year_to',
                'description',
                'on_training',
//            'is_active',
            ],
        ]);

        ?>
        <?php /* */ ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-envelope"></i> Trainings
                <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Training</button>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body container-items"><!-- widgetContainer -->
                <?php foreach ($models as $index => $modelTraining): ?>
                    <?php $on_training_class = ($modelTraining->on_training) ? 'uncheck' :'check'; ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <span class="panel-title">Training: <?= ($index + 1) ?></span>
                            <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                            <div class="clearfix"></div>
                        </div>

                        <?php if(!$modelTraining->isNewRecord){ ?>
                            <?= $form->field($modelTraining, "[{$index}]id")->hiddenInput()->label(false) ?>
                        <?php } ?>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelTraining, "[{$index}]institute")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($modelTraining, "[{$index}]name")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelTraining, "[{$index}]year_from")->textInput(['class' => 'form-control datepicker']) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($modelTraining, "[{$index}]year_to")->textInput(['class' => 'form-control datepicker year-to']) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelTraining, "[{$index}]description")->textarea(['rows' => 6]) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($modelTraining, "[{$index}]on_training")->checkbox([
                                        'class' => "on_training  {$on_training_class}",
                                        'data-id' => ($index+1),
                                    ]); ?>
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

</div>

<?php ActiveForm::end(); ?>



<?php

$js = '


//    
//    alert(2);
    
    jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
        jQuery(".dynamicform_wrapper .item .panel-title").each(function(index) {
                
            jQuery(this).html("Training: " + (index + 1))
            jQuery(".dynamicform_wrapper .item:last-child .on-training").prop(\'checked\', false);
        });
        
        
        
       
        
        $(".dynamicform_wrapper .item:last-child input, .dynamicform_wrapper .item:last-child textarea .dynamicform_wrapper .item:last-child select").val("");
        $(".dynamicform_wrapper .item:last-child .on_training").removeAttr(\'checked\');
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
            jQuery(this).html("Training: " + (index + 1))
        });
    });
    
//    $(".on_training").click(function() {
//        alert(1);
//    });
    
//    $(\'body\').on(\'click\',".on_training",function() {
    
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

$this->registerJsFile('@web/js/training.js', [
    'depends' => [
        JqueryAsset::className()
    ]
])
?>
