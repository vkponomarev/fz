<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $js = [
       // 'js/bootstrap.min.js',
        //'/assets/e00d61fc/js/bootstrap.js',
       // '/js/html2canvas.js',

    ];

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/bootstrap-rtl.css',
        'css/site.css',
        'css/extended.css',
        'css/calendars.css',
        'css/forms.css',


    ];

    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
        //'yii\bootstrap\BootstrapAsset',
        'frontend\assets\FontAwesomeAsset',
        'frontend\assets\MyAssets',
    ];

    public $cssOptions = [
        'position' => \yii\web\View::POS_END
    ];



    public $publishOptions = [
        'forceCopy' => true
    ];



    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

}
