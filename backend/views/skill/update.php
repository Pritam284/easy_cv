<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\db\Skill */

$this->title = 'Update Skill';
//$this->params['breadcrumbs'][] = ['label' => 'Skills', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="skill-update">

    <?php /* * ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php /* */ ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
