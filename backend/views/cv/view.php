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
            <?php foreach ($user->personalDatas as $personalData){ ?>
                <p>
                    <?= $personalData->career_objective ?>
                </p>

            <?php } ?>
        </div>


    <!--BIO-->

    <!--end bio-->

    <div class="clear"></div>
    <h2 id="learn" class="sectionHead">Education</h2>
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
    <h2 id="clock" class="sectionHead">Experience</h2>
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
    <h2 id="ribbon" class="sectionHead">Language</h2>
    <!--HONORS / AWARDS-->
    <div class="row">
        <ul class="language">
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

    <!--end honorsAwards-->
    <div class="clear"></div>
    <!--AS SEEN ON TITLE-->
    <h2 id="eye" class="sectionHead">As Seen On</h2>
    <!--AS SEEN ON-->

    <!--end seenOn-->
    <div class="clear"></div>
    <!--RECOMMENDATIONS TITLE-->
    <h2 id="chat" class="sectionHead">Recommendations</h2>
    <!--RECOMMENDATIONS-->
    <ul id="recommends">
        <li>
            <h3>Current Company</h3>
        </li>
        <li>
            <div class="details">
                <h3>Tina Smith</h3>
                <h4>Professional Position</h4>
            </div>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo nibh, mattis sit amet consequat a, varius vitae metus. Proin pharetra sodales pellentesque."</p>
        </li>
        <li>
            <div class="details">
                <h3>Uncle Smith</h3>
                <h4>Professional Position</h4>
            </div>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo nibh, mattis sit amet consequat a, varius vitae metus. Proin pharetra sodales pellentesque."</p>
        </li>
        <li>
            <h3>Some Other Company</h3>
        </li>
        <li>
            <div class="details">
                <h3>Justin Smith</h3>
                <h4>Professional Position</h4>
            </div>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo nibh, mattis sit amet consequat a, varius vitae metus. Proin pharetra sodales pellentesque."</p>
        </li>
        <li>
            <div class="details">
                <h3>Shawn Smith</h3>
                <h4>Professional Position</h4>
            </div>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo nibh, mattis sit amet consequat a, varius vitae metus. Proin pharetra sodales pellentesque."</p>
        </li>
        <li>
            <h3>Another Company</h3>
        </li>
        <li>
            <div class="details">
                <h3>Matthew Smith</h3>
                <h4>Professional Position</h4>
            </div>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo nibh, mattis sit amet consequat a, varius vitae metus. Proin pharetra sodales pellentesque."</p>
        </li>
        <li>
            <div class="details">
                <h3>Rob Smith</h3>
                <h4>Professional Position</h4>
            </div>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo nibh, mattis sit amet consequat a, varius vitae metus. Proin pharetra sodales pellentesque."</p>
        </li>
    </ul>
    <!--end recommends-->
    <div class="clear"></div>
    <!--CONTACT TITLE-->
    <h2 id="contact" class="sectionHead">Contact Me</h2>
    <!--CONTACT FORM-->
    <div id="contactform" class="contact">
        <form action="http://themolitor.com/applicant/send.php" method="post">
            <div id="contactInfo">
                <p> <label class="smallInput" for="name">Name <span class="required">*</span></label><br> <input type="text" name="name" id="name" value="" class="input round3"> </p>
                <p> <label class="smallInput" for="email">Email <span class="required">*</span></label><br> <input type="text" name="email" id="email" value="" class="input round3"> </p>
                <p> <label class="smallInput" for="phone">Phone</label><br> <input type="text" name="phone" id="phone" value="" class="input round3"> </p>
            </div>
            <p id="emailMessage"> <label class="smallInput" for="message">Message <span class="required">*</span></label><br> <textarea name="message" id="message" class="input round3"></textarea> </p>
            <!-- EMAIL SUBJECT --> <input name="subject" id="subject" type="hidden" value="Resume Email Message"> <!-- YOUR EMAIL ADDRESS --> <input name="repemail" id="repemail" type="hidden" value="you@yourdomain.com"> <!-- ENTER YOUR URL BELOW: MUST CONTAIN #contact AT THE END OF THE URL--> <input name="pagelink" id="pagelink" type="hidden" value="http://www.themolitor.com/applicant#contact"> <input name="send" id="submit_btn" type="submit" class="round3 clearRight" value="Send Message"> <!--THE QUIZ-->
            <div id="the-quiz" data-answer="103">100 + 3 = <span class="required">*</span> <input name="quiz" id="quiz" type="text" value=""></div>
            <p id="required"><span class="required">*</span> <em>= Required field</em></p>
        </form>
    </div>
    <!--end contact form-->
    <p id="messageSent">Message sent. Thank you!</p>
    <div class="clear"></div>
</div>
<?php /**  * ?>
<!--end wrapper--><!--COPYRIGHT-->
<div id="copyright">© 2012 - Designed and developed by THE MOLITOR</div>
<!--SCRIPTS-->
<?php /**  */ ?>

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
