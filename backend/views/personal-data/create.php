<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\PersonalData */

$this->title = 'Add Personal Informations';
$this->params['breadcrumbs'][] = ['label' => 'Personal Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
