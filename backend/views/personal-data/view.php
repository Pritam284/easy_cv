<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\PersonalData */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Personal Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-data-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'father_name',
            'mother_name',
            'dob',
            'gender',
            'religion',
            'country',
            'marital_status',
            'blood_group',
            'photo',
            'email:email',
            'contact_no',
        ],
    ]) ?>

</div>
