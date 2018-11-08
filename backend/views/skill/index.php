<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SkillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Skills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-index">

    <div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Add Skill', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'user_id',
                    'name',
                    'level',
                    'description:ntext',

                    ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update} {delete}'],
                ],
            ]); ?>
        </div>
    </div>


</div>
