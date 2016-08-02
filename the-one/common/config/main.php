<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru-RU',
    'modules' => [
        'gii'=>[
            'class'=>'yii\gii\Module',
            'allowedIPs' => ['*']
        ],
//        'debug' => [
//            'class' => 'yii\debug\Module',
//            'allowedIPs' => ['*']
//        ]
    ],
    'components' => [
        'shortcodes' => [
            'class' => 'common\components\ShortCodes',
            'callbacks'=>[
                'Gallery'   => ['common\widgets\ShortcodeGallery',  'widget'],
                'Carousel'  => ['common\widgets\ShortcodeCarousel', 'widget'],
            ]
        ],
        'authManager' => [
            'class' => 'common\components\PhpManager',
            'itemFile' => '@console/rbac/items.php',
            'assignmentFile' => '@console/rbac/assignments.php',
            'ruleFile' => '@console/rbac/rules.php',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'image'=>[
            'class' => 'yii\image\ImageDriver',
            'driver' => 'GD',
        ],
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'enableSession' => true,
        ],

    ],
];
