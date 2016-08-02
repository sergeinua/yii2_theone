<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FlotChartsAsset extends AssetBundle
{
    public $baseUrl = '@web';
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $js = [
        'chartjs/Chart.min.js'
    ];
    public $css = [
//        'idangerous-swiper/dist/css/swiper.min.css',
    ];

}
