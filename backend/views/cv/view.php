<?php

use yii\helpers\Html;
use common\helpers\DateHelper;
use yii\helpers\Url;
use yii\web\JqueryAsset;

$this->title = '';

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

<div class="center-block">
    <?php
    foreach ($user->personalDatas as $personalData){
        $image = Url::base().'/'. $personalData->photo;
    }
    ?>
    <img src="<?= $image  ?>" height="230px" width="200px"; style=" display: block; margin-left: auto; margin-right: auto; filter: grayscale(100%)">
</div>

<div id="wrapper">
    <!--BIO TITLE-->
    <h2 id="titleName" class="sectionHead"><?php echo $user->first_name . ' ' . $user->last_name ?></h2>
    <!--BIO-->
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
        <!--SOCIAL LINKS-->
        <div id="socialIcons">
            <a class="socialIcon" target="_blank" id="facebookIcon" href="http://themolitor.com/facebook"></a><a class="socialIcon" target="_blank" id="twitterIcon" href="http://themolitor.com/twitter"></a><a class="socialIcon" target="_blank" id="youTubeIcon" href="http://youtube.com/themolitor"></a><a class="socialIcon" target="_blank" id="gplusIcon" href="http://themolitor.com/gplus"></a><a class="socialIcon" target="_blank" id="dribbbleIcon" href="http://dribbble.com/themolitor"></a><!--MORE ICON OPTIOPS...<a class="socialIcon" target="_blank" id="flickrIcon" href="#>"></a><a class="socialIcon" target="_blank" id="vimeoIcon" href="#"></a><a class="socialIcon" target="_blank" id="mySpaceIcon" href="#"></a><a class="socialIcon" target="_blank" id="rssIcon" href="#"></a>-->
        </div>
        <!--end socialIcons--><!--BIO PARAGRAPH-->
        <?php foreach ($user->personalDatas as $personalData){ ?>
        <p>
            <?= $personalData->career_objective ?>
        </p>

        <?php } ?>
    </div>
    <!--end bio-->
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
    <!--end skills-->
    <div class="clear"></div>
    <!--EXPERIENCE TITLE-->
    <h2 id="clock" class="sectionHead">Experience</h2>
    <!--EXPERIENCE-->
    <ul id="jobs">
        <li>
            <div class="details">
                <h3><?= $experience->company_name ?></h3>
                <h4><?php echo $experience->designation . ', ' . $experience->department; ?></h4>
                <h5>Jul 2008 - Present</h5>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo nibh, mattis sit amet consequat a, varius vitae metus. Proin pharetra sodales pellentesque.</p>
        </li>
    </ul>
    <!--end jobs--><!--EDUCATION TITLE-->
    <div class="clear"></div>
    <h2 id="learn" class="sectionHead">Education</h2>
    <!--EDUCATION-->
    <ul id="schools">
        <li>
            <div class="details">
                <h3>University of State</h3>
                <h4>Degree Title - Concentration</h4>
                <h5>2005 - 2007</h5>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo nibh, mattis sit amet consequat a, varius vitae metus. Proin pharetra sodales pellentesque.</p>
        </li>
        <li>
            <div class="details">
                <h3>State University</h3>
                <h4>Degree Title - Concentration</h4>
                <h5>2001 - 2004</h5>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut justo nibh, mattis sit amet consequat a, varius vitae metus. Proin pharetra sodales pellentesque.</p>
        </li>
    </ul>
    <!--end schooling-->
    <div class="clear"></div>
    <!--HONORS / AWARDS TITLE-->
    <h2 id="ribbon" class="sectionHead">Honors &amp; Awards</h2>
    <!--HONORS / AWARDS-->
    <ul id="honorsAwards">
        <li>Academy Award for Best Sound Design in a Bathroom</li>
        <li>Emmy Award for Most Used Extra in a Drama</li>
        <li>Grammy Award for Best Use of a Goat in a Soundtrack</li>
        <li>S.A.G. Award for Touching the Ground</li>
        <li>Presented with the Honor of Throwing Pies at Donald Trump</li>
        <li>Featured in Dog &amp; Country Monthly (issue 298, pg. 20)</li>
    </ul>
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
<!--end wrapper--><!--COPYRIGHT-->
<div id="copyright">© 2012 - Designed and developed by THE MOLITOR</div>
<!--SCRIPTS-->

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
