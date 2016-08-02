<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TheOneLayoutAsset extends AssetBundle
{
//    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $sourcePath = '@vendor/the-one/the-one-html/dist_old';
    public $js = [
        'js/owl.carousel.min.js',
        'js/app.js',
        'js/dropdown.js',
        'js/modal.js',
        'js/tab.js',
        'js/transition.js',
    ];
    public $css = [
        'css/styles.css'
    ];
}
