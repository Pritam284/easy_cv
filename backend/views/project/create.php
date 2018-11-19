<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\Project */

$this->title = 'Add Project';
//$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-create">

    <?php /* * ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php /* */ ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
