<?php

namespace backend\assets;

use yii\web\AssetBundle;

class BowerAsset extends AssetBundle
{
    public $basePath = '@web';
    public $sourcePath = '@vendor/bower';
    public $css = [
        'select2/dist/css/select2.min.css',
    ];
    public $js = [
        'select2/dist/js/select2.min.js',
    ];
}