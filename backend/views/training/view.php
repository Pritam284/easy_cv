<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Training */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Trainings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-view">

    <div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
//                    'id',
//                    'user_id',
                    'institute',
                    'name',
                    'year_from',
                    'year_to',
                    'description:ntext',
                    [
                        'format' => 'boolean',
                        'attribute' => 'on_training',
                        'filter' => [0 => 'No', 1 => 'Yes']
                    ],
//                    'on_training',
                ],
            ]) ?>
        </div>
    </div>



</div>
