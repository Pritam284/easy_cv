<?php
/* *
if(!empty(Yii::$app->request->post())) {
$models = MultiModel::createMultiple(MailingListRecipient::className());
MultiModel::loadMultiple($models, Yii::$app->request->post());

array_walk($models, function ($s_model) use ($id){
$s_model->mailing_list_id = $id;
$s_model->is_deleted = 0;
$s_model->is_active = 1;
});


$valid = MultiModel::validateMultiple($models);

if(!$valid){
$errors = [];

foreach ($models as $model){
$errors[] = $model->getErrors();
}

LogHelper::save($errors, $models, 'mailing_list_recipient_create', false);

} else {
$transaction = Yii::$app->db->beginTransaction();

    try {
        $flag = false;

        foreach ($models as $model) {
            if (!($flag = $model->save(false))) {
                $LogFile = LogHelper::save($model->getErrors(), $model, 'mailing_list_recipient_creation');
                Yii::$app->session->setFlash('error', "Error Creating Mailing List Recipient. [ERR_{$LogFile}]");
                $transaction->rollBack();
                break;
            }
        }

        if ($flag) {
            $transaction->commit();
            Yii::$app->session->setFlash('success', 'Successfully added.');
            return $this->redirect(['mailing-list/view', 'id' => $id]);
        }

    } catch (Exception $e) {
        $transaction->rollBack();
        $LogFile = LogHelper::save($e->getMessage(), $e, 'mailing_list_recipient_create_exception');
//                    ErrorHelper::throwE(500);
        Yii::$app->session->setFlash('error', "Error Creating Mailing List Recipient. [ERR_{$LogFile}]");
    }
}

//            die('asd');
//            return $this->redirect(['view', 'id' => $model->id]);
}
/**/
?>

<?php

use dosamigos\datepicker\DateRangePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\MailingListRecipient */
/* @var $form yii\widgets\ActiveForm */
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
                                <?= $form->field($modelEducation, "[{$index}]year_from")->textInput() ?>
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


        <?php /* * ?>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th><?= $models[0]->getAttributeLabel('institute'); ?></th>
                <th> </th>

            </tr>
            </thead>

            <tbody class="container-items">
            <?php foreach ($models as $i => $model): ?>
                <tr class="item">
                    <td>

                        <?= $form->field($model, "[{$i}]institute")->textInput(['maxlength' => true])->label(false) ?>
                        <?php if(!$model->isNewRecord){ ?>
                            <?= $form->field($model, "[{$i}]id")->hiddenInput()->label(false) ?>
                        <?php } ?>
                    </td>

                    <td class="text-center">
                        <div class="remove_button" style="display: <?= $model->isNewRecord ? 'block' : 'none' ?>;">
                            <button type="button" class="remove-item btn btn-danger"><i class="fa fa-minus"></i></button>
                        </div>
                    </td>

                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>


        <span class="btn btn-success add-item form-control2">
            <i class="glyphicon glyphicon-plus"></i> Add Row
        </span>
        <?php /* */ ?>

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
    });
    
    jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
//    alert(2);
        jQuery(".dynamicform_wrapper .item .panel-title").each(function(index) {
            jQuery(this).html("Education: " + (index + 1))
        });
    });
    ';

$this->registerJs($js);

?>
