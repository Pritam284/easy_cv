<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 11/8/18
 * Time: 4:17 PM
 */

namespace backend\assets;


use yii\web\AssetBundle;

class MyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/custom.css',
//        'css/cv.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}