<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 1/21/19
 * Time: 12:11 PM
 */
use wbraganca\dynamicform\DynamicFormWidget;
//use rohitiuc\dynamicform\DynamicFormWidget;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => , // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $childModels[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'name',
        ],
    ]); ?>

<button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add </button>

        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($childModels as $index => $childModel): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <?= $form->field($childModel, "[{$index}]name")->textInput(['maxlength' => true]) ?>
                    <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                </div>
            <?php endforeach; ?>
        </div>

    <?php DynamicFormWidget::end(); ?>

<?php ActiveForm::end(); ?>




