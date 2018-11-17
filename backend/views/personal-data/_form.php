<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\db\PersonalData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-data-form">




    <div class="row">
        <div class="col-md-6">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'mother_name')->textInput(['maxlength' => true]) ?>

            <label>D.O.B</label>
            <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'dob',
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?> <br>


            <?= $form->field($model, 'gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', 'Others' => 'Others', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'religion')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'marital_status')->dropDownList([ 'Single' => 'Single', 'Married' => 'Married', 'Divorced' => 'Divorced', 'Widowed' => 'Widowed', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'blood_group')->dropDownList([ 'A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'O+' => 'O+', 'O-' => 'O-', 'AB+' => 'AB+', 'AB-' => 'AB-', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'photo')->fileInput() ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'contact_no')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'career_objective')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>





</div>
