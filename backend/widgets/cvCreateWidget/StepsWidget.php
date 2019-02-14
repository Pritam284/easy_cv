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
use yii\helpers\Url;

class StepsWidget extends Widget {
    public $currentStep;



//    public $stepClasses = [
//        'progress-bar',
//        'progress-bar progress-bar-danger',
//        'progress-bar progress-bar-info',
//        'progress-bar progress-bar-warning',
//        'progress-bar progress-bar-success',
//    ];

    public function run() {
        $steps = [
            [
                'no' => 1,
                'name' => 'Personal Info',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => Url::to(['personal-data/create']),
            ],
            [
                'no' => 2,
                'name' => 'Education',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => Url::to(['education/create']),
            ],
            [
                'no' => 3,
                'name' => 'Experience',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => Url::to(['experience/create'])
            ],
            [
                'no' => 4,
                'name' => 'Skill',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => Url::to(['skill/create'])
            ],
            [
                'no' => 5,
                'name' => 'Training',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => Url::to(['training/create'])
            ],

            [
                'no' => 6,
                'name' => 'Achievement',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => Url::to(['achievement/create'])
            ],
            [
                'no' => 7,
                'name' => 'Language',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => Url::to(['language/create'])
            ],
            [
                'no' => 8,
                'name' => 'Certification',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => Url::to(['certification/create'])
            ],
            [
                'no' => 9,
                'name' => 'Reference',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => Url::to(['reference/create'])
            ],
            [
                'no' => 10,
                'name' => 'Project',
                'icon' => '<i class="fa fa-check"></i>',
                'url' => Url::to(['project/create'])
            ],

        ];
        return $this->render('steps-widget', [
            'currentStep' => $this->currentStep,
            'steps' => $steps,
//            'stepClasses' => $this->stepClasses,
        ]);
    }
}
