<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['debug'],
    'controllerNamespace' => 'frontend\controllers',
    'modules'=>[
        'debug' => [
            'class' => 'yii\debug\Module',
//            'allowedIPs' => ['192.168.33.1']
        ],
        'gii'=>[
            'class'=>'yii\gii\Module',
            'allowedIPs' => ['192.168.33.1']
        ],
    ],
    'components' => [
        'view'=>[
            'class' => 'frontend\components\OneView',
        ],
        'urlManager'=>[
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules'=>[
                'profile'=>'profile/index',
//                '<controller>/<action>'=>'<controller>/<action>',
                'profile/my-gallery'=>'profile/my-gallery',
                'profile/index'=>'profile/index',
                'profile/favorite-articles'=>'profile/favorite-articles',
                'profile/favorite-specialists'=>'profile/favorite-specialists',
                'profile/edit-info'=>'profile/edit-info',
                'the-one-news/afisha' => 'poster/index',
                'about'=>'site/about',
                'article/<slug:>'=>'article/article',
                'poster/<slug:>'=>'poster/poster',
                'site/login'=>'site/login',
                'site/logout'=>'site/logout',
                'site/signup'=>'site/signup',
                'site/index'=>'site/index',
                'site/reset-password'=>'site/reset-password',
                'site/request-password-reset'=>'site/request-password-reset',
                'site/contact'=>'site/contact',
                'site/subscribe' => 'site/subscribe',
                'site/search' => 'site/search',
                'site/tag' => 'site/tag',
                'img/<img:>'=>'img/index',
                'img/<size:>/<img:>'=>'img/index',
                'team'=>'team/index',
                'team/<slug:>'=>'team/member',
                'professionals'=>'professionals/index',
                'professionals/<groupSlug:>'=>'professionals/index',
                'professional/<slug:>'=>'professionals/single',

                'magazine'=>'magazine/index',
                'magazine/<id:>' =>'magazine/single',

                'api/auth/submit/<userId:>/<authKey:>'=>'api/auth/submit',
                'api/auth/validate-login'=>'api/auth/validate-login',
                'api/auth/validate-submit'=>'api/auth/validate-submit',
                '<categorySlug:>/<param:>'=>'article/category',
                '<categorySlug:>'=>'article/category',

//                'articles'=>'article/articles',
//                'articles/<param:>'=>'article/articles',
//                'advices-and-ideas/<param:>'=>'article/advices-and-ideas',
//                'advices-and-ideas'=>'article/advices-and-ideas',
//                'the-one-news'=>'article/the-one-news',
//                'the-one-news/<param:>'=>'article/the-one-news',
//                'workshops'=>'article/workshops',
//                'workshops/<param:>'=>'article/workshops',
//                'honeymoon'=>'article/honeymoon',
//                'honeymoon/<param:>'=>'article/honeymoon',
//                'creative-weddings'=>'article/creative-weddings',
//                'creative-weddings/<param:>'=>'article/creative-weddings'



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
        'request' => [
            'enableCsrfValidation'=>true,
            'cookieValidationKey' => 'SPQAL7FflviTrUZ6D_HgMw_EZl7IqZib'
        ],
        'assetManager' => [
//            'forceCopy' => true,
        ]
    ],
    'params' => $params,
];
