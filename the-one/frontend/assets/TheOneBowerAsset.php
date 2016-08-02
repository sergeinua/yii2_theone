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
class TheOneBowerAsset extends AssetBundle
{
    public $baseUrl = '@web';
    public $sourcePath = '@vendor/bower';
    public $js = [
        'jquery-ui/jquery-ui.min.js',
        'knockout/dist/knockout.js',
        'knockout-sortable/build/knockout-sortable.min.js',
        'magnific-popup/dist/jquery.magnific-popup.min.js',
        'select2/dist/js/select2.min.js',
        'idangerous-swiper/dist/js/swiper.min.js',

    ];
    public $css = [
//        'idangerous-swiper/dist/css/swiper.min.css',
    ];

}
