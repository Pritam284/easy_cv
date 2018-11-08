<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Skill */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Skills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-view">

    <div class="row">
        <div class="col-md-6">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                <?php /* * ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>

                <?php * */ ?>
            </p>


            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
//            'id',
//            'user_id',
                    'name',
                    'level',
                    'description:ntext',
                ],
            ]) ?>

        </div>
    </div>



</div>
