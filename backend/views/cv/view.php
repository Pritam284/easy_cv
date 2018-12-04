<?php

use yii\helpers\Html;
use common\helpers\DateHelper;
use yii\helpers\Url;
use yii\web\JqueryAsset;

$this->title = 'Curriculum Vitae';

$this->registerCssFile("@web/css/prettyPhoto.css");
$this->registerCssFile("@web/css/print.css");
$this->registerCssFile("@web/css/style.css");

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>

</head>
<body cz-shortcut-listen="true">
<?php /**  *?>
<div class="center-block">
    <?php
    foreach ($user->personalDatas as $personalData){
        $image = Url::base().'/'. $personalData->photo;
    }
    ?>
    <img src="<?= $image  ?>" height="230px" width="200px"; style=" display: block; margin-left: auto; margin-right: auto; filter: grayscale(100%)">
</div>
<?php /**  */ ?>


<div id="wrapper" class="cv-scroll">

    <div style="float: right">
        <?php
        foreach ($user->personalDatas as $personalData){
            $image = Url::base().'/'. $personalData->photo;
        }
        ?>
        <img src="<?= $image  ?>" height="200px" width="200px"; style=" display: block; margin-left: auto; margin-right: auto; filter: grayscale(100%)">
    </div>
    <!--BIO TITLE-->
    <h2 id="titleName" class="sectionHead"><?php echo $user->first_name . ' ' . $user->last_name ?></h2>
        <div id="bio">
            <?php foreach ($user->experiences as $experience) {
                if ($experience->currently_working == true) {
                    ?>
                    <h2><?= $experience->designation ?></h2>
                    <?php
                } else {
                    ?>
                    <h2><?= ' ' ?></h2>
                    <?php
                }
            }
            ?>

            <h2>Email: <?= $personalData->email ?></h2>
            <h2>Mobile: <?= $personalData->contact_no ?></h2>

            <?php foreach ($user->personalDatas as $personalData){ ?>
                <p>
                    <?= $personalData->career_objective ?>
                </p>

            <?php } ?>
        </div>


    <!--BIO-->

    <!--end bio-->

    <div class="clear"></div>
    <h2 id="learn" class="sectionHead">Educations</h2>
    <!--EDUCATION-->
    <ul id="schools">
        <?php foreach ($user->educations as $education) { ?>
            <li>
                <div class="details">
                    <h3><?= $education->institute; ?></h3>
                    <h4><?php echo $education->degree . ' in ' . $education->subject; ?></h4>
                    <h5><?php echo DateHelper::dateFormat($education->year_from, 'Y') . ' - ' . DateHelper::dateFormat($education->year_to, 'Y') ?></h5>
                    <p><?php echo 'Result- ' . $education->result ?></p>
                </div>

            </li>
        <?php } ?>

    </ul>

    <div class="clear"></div>
    <!--EXPERIENCE TITLE-->
    <h2 id="clock" class="sectionHead">Experiences</h2>
    <!--EXPERIENCE-->
    <ul id="jobs">
        <?php foreach ($user->experiences as $experience) { ?>
        <li>
            <div class="details">
                <h3><?= $experience->company_name ?></h3>
                <h4><?php echo $experience->designation . ', ' . $experience->department; ?></h4>
                <h5><?php if ($experience->currently_working == false){
                        echo DateHelper::dateFormat($experience->year_from,'M Y') . ' - ' . DateHelper::dateFormat($experience->year_to,'M Y');
                    } else{
                        echo DateHelper::dateFormat($experience->year_from,'M Y') . ' - Present';
                    }
                    ?></h5>
            </div>
            <p><?= $experience->responsibilities; ?></p>
        </li>
        <?php } ?>
    </ul>

    <div class="clear"></div>
    <!--SKILLS TITLE-->
    <h2 id="tools" class="sectionHead">Skills</h2>
    <!--SKILLS-->
    <ul id="skills" class="ready">
        <!--////////////////////////////////////////////////////////////////////////////////////--><!--Notice the class names indicate the % of your skills. i.e. s70 = 70%, s40 = 40% etc. --><!--////////////////////////////////////////////////////////////////////////////////////-->
        <li id="skill1" class="s90" style="right: 0%;"><span style="display: inline;">WordPress Development</span></li>
        <li id="skill2" class="s70" style="right: 0%;"><span style="display: inline;">PHP</span></li>
        <li id="skill3" class="s100" style="right: 0%;"><span style="display: inline;">HTML + CSS</span></li>
        <li id="skill4" class="s100" style="right: 0%;"><span style="display: inline;">jQuery</span></li>
        <li id="skill5" class="s100" style="right: 0%;"><span style="display: inline;">Photoshop</span></li>
        <li id="skill6" class="s90" style="right: 0%;"><span style="display: inline;">SEO</span></li>
        <li id="skill7" class="s90" style="right: 0%;"><span style="display: inline;">User Interface Design</span></li>
        <li id="skill8" class="s80" style="right: 0%;"><span style="display: inline;">Marketing</span></li>
        <li id="skill9" class="s40" style="right: 0%;"><span style="display: inline;"><del>Underwater Basket Weaving</del></span></li>
    </ul>

    <!--end schooling-->
    <div class="clear"></div>
    <!--HONORS / AWARDS TITLE-->
    <h2 id="ribbon" class="sectionHead">Languages</h2>
    <!--HONORS / AWARDS-->
    <div class="row">
        <ul class="cv-data-table">
            <table>
                <tr>
                    <th> Name </th>
                    <th> Level </th>
                </tr>

                <?php foreach ($user->languages as $language) { ?>
                    <tr>
                        <td>
                            <?= $language->name ?>
                        </td>

                        <td>
                            <?= $language->level ?>
                        </td>
                    </tr>

                <?php } ?>

            </table>
        </ul>
    </div>



    <?php if (!empty($user->certifications)) { ?>
        <div class="clear"></div>
        <!--HONORS / AWARDS TITLE-->
        <h2 id="ribbon" class="sectionHead">Certifications</h2>
        <!--HONORS / AWARDS-->
        <div class="row">
            <ul class="cv-data-table">
                <table>
                    <tr>
                        <th> name </th>
                        <th> authority </th>
                        <th> year </th>
                        <th> certificate No.</th>
                    </tr>

                    <?php foreach ($user->certifications as $certification) { ?>
                        <th> <?= $certification->name ?></th>
                        <th> <?= $certification->authority ?></th>
                        <th> <?= $certification->year ?></th>
                        <th> <?= $certification->certificate_no ?></th>
                    <?php } ?>
                </table>
            </ul>
        </div>

    <?php } ?>

    <?php if (!empty($user->trainings)) { ?>
        <div class="clear"></div>
        <!--EXPERIENCE TITLE-->
        <h2 id="clock" class="sectionHead">Trainings</h2>

        <div class="row">
            <ul id="jobs">
                <?php foreach ($user->trainings as $training) { ?>
                    <li>
                        <div class="details">
                            <h3><?= $training->institute ?></h3>
                            <h4><?= $training->name ?></h4>
                            <h5><?php if ($training->on_training == false){
                                    echo DateHelper::dateFormat($training->year_from,'M Y') . ' - ' . DateHelper::dateFormat($training->year_to,'M Y');
                                } else{
                                    echo DateHelper::dateFormat($training->year_from,'M Y') . ' - Present';
                                }
                                ?></h5>
                        </div>
                        <p><?= $training->description; ?></p>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>

    <?php if (!empty($user->achievements)) { ?>
        <div class="clear"></div>
        <!--EXPERIENCE TITLE-->
        <h2 id="clock" class="sectionHead">Achievements</h2>

        <div class="row">
            <ul id="jobs">
                <?php foreach ($user->achievements as $achievement) { ?>
                    <li>
                        <div class="details">
                            <h3><?= $achievement->authority ?></h3>
                            <h4><?= $achievement->name ?></h4>
                            <h5><?= DateHelper::dateFormat($achievement->year,'M Y') ?></h5>
                        </div>
                        <p><?= $achievement->description; ?></p>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>

    <?php  ?>
    <div class="clear"></div>
    <h2 id="clock" class="sectionHead">Personal Information</h2>
    <div class="row">
        <div class="personal-data-table">
            <table class="personal-data" style="width: 100%">
                <tr>
                    <th> Father's Name </th>
                    <td> : </td>
                    <td> <?= $personalData->father_name?></td>
                </tr>

                <tr>
                    <th> Mother's Name </th>
                    <td> : </td>
                    <td> <?= $personalData->mother_name?></td>
                </tr>

                <tr>
                    <th> Date of Birth </th>
                    <td> : </td>
                    <td> <?= DateHelper::dateFormat($personalData->dob, 'd M Y')?></td>
                </tr>

                <tr>
                    <th> Gender </th>
                    <td> : </td>
                    <td> <?= $personalData->gender?></td>
                </tr>

                <tr>
                    <th> Religion </th>
                    <td> : </td>
                    <td> <?= $personalData->religion?></td>
                </tr>

                <tr>
                    <th> Country </th>
                    <td> : </td>
                    <td> <?= $personalData->country?></td>
                </tr>

                <tr>
                    <th> Marital Status </th>
                    <td> : </td>
                    <td> <?= $personalData->marital_status ?></td>
                </tr>

                <tr>
                    <th> Blood Group </th>
                    <td> : </td>
                    <td> <?= $personalData->blood_group ?></td>
                </tr>

            </table>
        </div>
    </div>

    <?php if (!empty($user->projects)) { ?>
        <div class="clear"></div>
        <!--EXPERIENCE TITLE-->
        <h2 id="clock" class="sectionHead">Projects</h2>

        <div class="row">
            <div class="personal-data-table">
                <?php foreach ($user->projects as $project) { ?>
                    <table class="personal-data">
                        <tr>
                            <th style="width: 50%"> project name</th>
                            <td> <b><?= $project->name ?></b></td>
                        </tr>
                        <tr>
                            <th style="width: 50%"> </th>
                            <td>  <p> <?= $project->description ?></p></td>
                        </tr>
                    </table>
                <?php } ?>
            </div>
        </div>
    <?php } ?>


    <div class="clear"></div>
    <h2 id="chat" class="sectionHead">References</h2>
        <div class="row">
            <?php foreach ($user->references as $reference) { ?>
                <h4><?= $reference->name ?></h4>
                <h5><?= $reference->designation ?></h5>
                <p><?= $reference->email ?></p>
                <p><?= $reference->contact_no ?></p>
                <p><?= $reference->address ?></p>
            <?php } ?>
        </div>
    <div class="clear"></div>

</div>
</body>
</html>


<?php

$this->registerJsFile('@web/js/prettyPhoto.js',[

    'depends' => [
        JqueryAsset::className()
    ]
]);

$this->registerJsFile('@web/js/backPosition.js',[

    'depends' => [
        JqueryAsset::className()
    ]
]);

$this->registerJsFile('@web/js/jquery.js',[

    'depends' => [
        JqueryAsset::className()
    ]
])

?>
