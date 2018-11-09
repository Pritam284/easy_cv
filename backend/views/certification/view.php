<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\db\Certification */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Certifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certification-view">


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
                    'name',
                    'authority',
                    'year',
                    'certificate_no',
                ],
            ]) ?>
        </div>
    </div>



</div>
