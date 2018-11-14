

<div id="doc2" class="yui-t7">
    <div id="inner">

        <div id="hd">
            <div class="yui-gc">
                <div class="yui-u first">
                    <h1><?php echo $user->first_name. ' ' .$user->last_name ?></h1>
                    <?php foreach ($user->personalDatas as $personalData){ ?>
                        <h3><?= $personalData->email ?></h3>
                        <h3><?= $personalData->contact_no ?></h3>
                    <?php } ?>
                </div>

                <div class="yui-u">
                    <div class="contact-info">
                        <h3><a id="pdf" href="#">Download PDF</a></h3>
                    </div><!--// .contact-info -->
                </div>
            </div><!--// .yui-gc -->
        </div><!--// hd -->

        <div id="bd">
            <div id="yui-main">
                <div class="yui-b">

                    <div class="yui-gf">
                        <div class="yui-u first">
                            <h2>Profile</h2>
                        </div>
                        <div class="yui-u">
                            <p class="enlarge">
                                Progressively evolve cross-platform ideas before impactful infomediaries. Energistically visualize tactical initiatives before cross-media catalysts for change.
                            </p>
                        </div>
                    </div><!--// .yui-gf -->

                    <div class="yui-gf">
                        <div class="yui-u first">
                            <h2>Skills</h2>
                        </div>
                        <div class="yui-u">

                            <?php foreach ($user->skills as $skill) { ?>

                            <div class="talent">
                                <h2><?= $skill->name ?></h2>
                                <p><b><?= $skill->level ?></b></p>
                                <p><?= $skill->description ?></p>
                            </div>
                            <?php } ?>
                        </div>
                    </div><!--// .yui-gf -->

                    <div class="yui-gf">
                        <div class="yui-u first">
                            <h2>Technical</h2>
                        </div>
                        <div class="yui-u">
                            <ul class="talent">
                                <li>XHTML</li>
                                <li>CSS</li>
                                <li class="last">Javascript</li>
                            </ul>

                            <ul class="talent">
                                <li>Jquery</li>
                                <li>PHP</li>
                                <li class="last">CVS / Subversion</li>
                            </ul>

                            <ul class="talent">
                                <li>OS X</li>
                                <li>Windows XP/Vista</li>
                                <li class="last">Linux</li>
                            </ul>
                        </div>
                    </div><!--// .yui-gf-->

                    <div class="yui-gf">

                        <div class="yui-u first">
                            <h2>Experience</h2>
                        </div><!--// .yui-u -->

                        <div class="yui-u">

                            <?php foreach ($user->experiences as $experience) { ?>

                            <div class="job">
                                <h2><?= $experience->company_name ?></h2>
                                <h3><?php echo $experience->designation . ',' . $experience->department ?></h3>
                                <h4><?php if ($experience->currently_working == false){
                                        echo $experience->year_from . ' to ' . $experience->year_to;
                                    } else{
                                        echo $experience->year_from . ' to Present';
                                    } ?></h4>
                                <p><?= $experience->responsibilities ?></p>
                            </div>

                            <?php } ?>

                        </div><!--// .yui-u -->
                    </div><!--// .yui-gf -->


                    <div class="yui-gf last">
                        <div class="yui-u first">
                            <h2>Education</h2>
                        </div>
                        <?php foreach ($user->educations as $education) { ?>
                        <div class="yui-u">
                            <h2><?= $education->institute ?></h2>
                            <h3><?php echo $education->year_from . ' to ' . $education->year_to; ?></h3>
                            <h3><?php echo $education->degree . ' in ' . $education->subject; ?> &mdash; <strong><?= $education->result ?> GPA</strong> </h3>
                        </div>

                        <?php } ?>
                    </div><!--// .yui-gf -->


                </div><!--// .yui-b -->
            </div><!--// yui-main -->
        </div><!--// bd -->

        <div id="ft">
            <p><?php echo $user->first_name . ' ' . $user->last_name ?> &mdash; <a href="mailto:<?= $personalData->email ?>"><?= $personalData->email ?></a> &mdash; <?= $personalData->contact_no ?></p>
        </div><!--// footer -->

    </div><!-- // inner -->


</div><!--// doc -->




<?php

$this->registerCssFile("@web/css/cv.css");

?>
