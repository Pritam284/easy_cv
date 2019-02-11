<?php

use backend\widgets\cvCreateWidget\StepsWidget;
use wbraganca\dynamicform\DynamicFormWidget;
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

<?php /* * ?>
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
                'company_name',
                'designation',
                'department',
                'year_from',
                'year_to',
                'responsibilities',
                'currently_working',
//            'is_active',
            ],
        ]);

        ?>
        <?php /* */ ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-envelope"></i> Experiences
                <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Experience</button>
                <div class="clearfix"></div>
            </div>

            <div class="panel-body container-items"><!-- widgetContainer -->
                <?php foreach ($models as $index => $modelExperience): ?>
                    <?php $currently_working_class = ($modelExperience->currently_working) ? 'uncheck' :'check'; ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <span class="panel-title">Experience: <?= ($index + 1) ?></span>
                            <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                            <div class="clearfix"></div>
                        </div>

                        <?php if(!$modelExperience->isNewRecord){ ?>
                            <?= $form->field($modelExperience, "[{$index}]id")->hiddenInput()->label(false) ?>
                        <?php } ?>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelExperience, "[{$index}]company_name")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($modelExperience, "[{$index}]designation")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelExperience, "[{$index}]department")->textInput() ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($modelExperience, "[{$index}]year_from")->textInput(['class' => 'form-control datepicker']) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelExperience, "[{$index}]year_to")->textInput(['class' => 'form-control datepicker year-to']) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($modelExperience, "[{$index}]responsibilities")->textInput() ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($modelExperience, "[{$index}]currently_working")->checkbox([
                                            'class' => "currently_working  {$currently_working_class}",
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

    <?php ActiveForm::end(); ?>

</div>



<?php

$js = '


//    
//    alert(2);
    
    jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
        jQuery(".dynamicform_wrapper .item .panel-title").each(function(index) {
                
            jQuery(this).html("Experience: " + (index + 1))
            jQuery(".dynamicform_wrapper .item:last-child .currently-working").prop(\'checked\', false);
        });
        
        
        
       
        
        $(".dynamicform_wrapper .item:last-child input, .dynamicform_wrapper .item:last-child textarea .dynamicform_wrapper .item:last-child select").val("");
        $(".dynamicform_wrapper .item:last-child .currently_working").removeAttr(\'checked\');
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
            jQuery(this).html("Experience: " + (index + 1))
        });
    });
    
//    $(".currently_working").click(function() {
//        alert(1);
//    });
    
//    $(\'body\').on(\'click\',".currently_working",function() {
    
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

$this->registerJsFile('@web/js/experience.js', [
    'depends' => [
        JqueryAsset::className()
        ]
    ])
?>
