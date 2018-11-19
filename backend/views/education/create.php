<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\Education */

$this->title = 'Add Education';
//$this->params['breadcrumbs'][] = ['label' => 'Educations', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-create">

    <?php /* * ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?php /* */ ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
