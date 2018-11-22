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
                'name' => 'Flight Info',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#'
            ],
            [
                'no' => 2,
                'name' => 'Crew/PAX Info',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#'
            ],
            [
                'no' => 3,
                'name' => 'Documents',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#step-3'
            ],
            [
                'no' => 4,
                'name' => 'Payment',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#'
            ],
            [
                'no' => 5,
                'name' => 'Complete',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#'
            ],

            [
                'no' => 6,
                'name' => 'Flight Info',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#'
            ],
            [
                'no' => 7,
                'name' => 'Crew/PAX Info',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#'
            ],
            [
                'no' => 8,
                'name' => 'Documents',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#step-3'
            ],
            [
                'no' => 9,
                'name' => 'Payment',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => '#'
            ],
            [
                'no' => 10,
                'name' => 'Complete',
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
