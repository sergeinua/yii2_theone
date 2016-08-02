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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/kn-alert.js',
        'js/kn-avatar.js',
        'js/kn-gallery.js',
        'js/j-scripts.js',
       'js/kn-telephones.js',
       'js/kn-socials.js',
       'js/geocode.js',
    ];
}
