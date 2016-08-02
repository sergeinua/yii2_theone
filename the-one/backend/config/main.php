<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
//    'bootstrap' => [/*'debug'*/],
//    'modules' => [
//        'gii'=>[
//            'class'=>'yii\gii\Module',
//            'allowedIPs' => ['*']
//        ],
//        'debug' => [
//            'class' => 'yii\debug\Module',
//            'allowedIPs' => ['*']
//        ]
//    ],
    'components' => [
        'urlManager'=>[
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules'=>[
                'article/get-slug/<title:>'=>'article/get-slug',
                'article/update/<slug:>'=>'article/update',
                'article/delete/<slug:>'=>'article/delete',
                'article/index/<slug:>'=>'article/index',
                'article/create/<slug:>'=>'article/create',

            ]

        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'session' => [
            'cookieParams' => ['domain' => '.the-one.rcl','httpOnly' => true,],
        ],
        'request' => [
            'enableCsrfValidation'=>true,
            'cookieValidationKey' => 'SPQAL7FflviTrUZ6D_HgMw_EZl7IqZib'
        ],
    ],
    'params' => $params,
];
