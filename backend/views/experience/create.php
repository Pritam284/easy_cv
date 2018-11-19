<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\Experience */

$this->title = 'Add Experience';
//$this->params['breadcrumbs'][] = ['label' => 'Experiences', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experience-create">

    <?php /* * ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php /* */ ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
