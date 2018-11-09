<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CertificationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Certifications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certification-index">

    <div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Add Certification', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                    'id',
//                    'user_id',
                    'name',
                    'authority',
                    'year',
                    'certificate_no',

                    ['class' => 'yii\grid\ActionColumn','template' => '{view} {update} {delete}'],
                ],
            ]); ?>
        </div>
    </div>


</div>
