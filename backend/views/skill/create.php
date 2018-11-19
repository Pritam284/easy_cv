<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\Skill */

$this->title = 'Add Skill';
//$this->params['breadcrumbs'][] = ['label' => 'Skills', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-create">

    <?php /* * ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php /* */ ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
