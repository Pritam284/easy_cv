<?php
/**
 * Created by PhpStorm.
 * User: aviationsupportlimited
 * Date: 14/12/2017
 * Time: 16:02
 */

?>

<style>
    .cv-steps {
        display: flex;
        flex-wrap: wrap;
    }

    .cv-steps li {
        white-space: nowrap;
        flex-basis: 0;
        flex-grow: 1;
    }
</style>

<ul class="nav nav-pills nav-justified steps cv-steps">
    <?php foreach($steps as $step) { ?>

        <?php
        $liClass = $aClass = '';
//        $liClass = $aClass = 'inactive';
        $url = $step['url'];
        if($step['no'] == $currentStep) {
            $liClass .= 'active';
            $aClass .= 'active';
//        } else if($type == 'create' || $step['no'] > $currentStep) {
//            $liClass .= 'inactive';
//            $aClass .= 'inactive';
//            $url = '';
        } else {
            $liClass .= 'inactive';
            $aClass .= 'inactive';
        }
        ?>

        <?php
//            var_dump($step['no']);
//            var_dump($currentStep);
//            var_dump($liClass);
//            var_dump($aClass);
        ?>

        <li class="<?= $liClass ?>" style="max-width: 10%; background-color: #ffffff;">
            <a class="step <?= $aClass ?>" style="cursor: default; " href="<?= $step['url'] ?>">
                <span class="number"> <?= $step['no'] ?> </span>
                <span class="desc">
                    <?= $step['icon'] ?> <?= $step['name'] ?>
                </span>
            </a>
        </li>
    <?php } ?>

</ul>
<br>

<div id="bar" class="progress progress-striped active" role="progressbar">

   <?php /* */ ?>
        <div class="progress-bar progress-bar-warning" style="width:<?= intval(($currentStep/sizeof($steps))*100) ?>%"> </div>
   <?php /* */ ?>

    <?php /* for($i = 0; $i < $currentStep; $i++) { ?>
        <div class="<?= $stepClasses[$i] ?>" style="width: <?= intval(100/sizeof($steps)) ?>%;"></div>
    <?php } */ ?>

 </div>

