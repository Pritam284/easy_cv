<?php
/**
 * Created by PhpStorm.
 * User: aviationsupportlimited
 * Date: 14/12/2017
 * Time: 16:02
 */

namespace backend\widgets\cvCreateWidget;

use Yii;
use yii\base\Widget;

class StepsWidget extends Widget {
    public $currentStep;

    public $steps = [
            [
                'no' => 1,
                'name' => 'Personal Info',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => 'personal-data/_form'
            ],
            [
                'no' => 2,
                'name' => 'Education',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#'
            ],
            [
                'no' => 3,
                'name' => 'Experience',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#step-3'
            ],
            [
                'no' => 4,
                'name' => 'Skill',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#'
            ],
            [
                'no' => 5,
                'name' => 'Training',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#'
            ],

            [
                'no' => 6,
                'name' => 'Achievement',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#'
            ],
            [
                'no' => 7,
                'name' => 'Language',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#'
            ],
            [
                'no' => 8,
                'name' => 'Certification',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#step-3'
            ],
            [
                'no' => 9,
                'name' => 'Reference',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#'
            ],
            [
                'no' => 10,
                'name' => 'Project',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#'
            ],

    ];

//    public $stepClasses = [
//        'progress-bar',
//        'progress-bar progress-bar-danger',
//        'progress-bar progress-bar-info',
//        'progress-bar progress-bar-warning',
//        'progress-bar progress-bar-success',
//    ];

    public function run() {
        return $this->render('steps-widget', [
            'currentStep' => $this->currentStep,
            'steps' => $this->steps,
//            'stepClasses' => $this->stepClasses,
        ]);
    }
}
