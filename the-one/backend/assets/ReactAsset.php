<?php

namespace backend\assets;

use yii\web\AssetBundle;

class ReactAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
    ];
    public $js = [

//        'js/vendor/react/react-0.14.3.js',
//        'js/vendor/react/react-dom-0.14.3.min.js',
//        'js/vendor/react/browser.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}