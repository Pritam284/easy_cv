<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '';
?>
<div class="site-index">

        <div class="jumbotron" style="">

            <h1>WELCOME TO EASY CV MAKER!</h1>

            <p class="lead">Please click the button below to create a new CV.</p>

            <span></span>

            <br>

            <p>
                <a class="btn btn-lg btn-primary" href="cv/view" target="_blank">View CV</a>
                <?= Html::a("Create/Update CV", ["personal-data/create"], ["class" => "btn btn-lg btn-primary"]) ?>
            </p>

            <p></p>

        </div>

</div>
