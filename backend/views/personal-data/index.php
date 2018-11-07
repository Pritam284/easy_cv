<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonalDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personal Data';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-data-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Personal Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'user_id',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
