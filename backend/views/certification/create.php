<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\Certification */

$this->title = 'Add Certification';
//$this->params['breadcrumbs'][] = ['label' => 'Certifications', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certification-create">

    <?php /* * ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php /* */ ?>

    <?= $this->render('_form', [
        'models' => $models,
    ]) ?>

</div>
