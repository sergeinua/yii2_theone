<?php

$config = [
    'components' => [
//        'session' => [
//            'cookieParams' => ['domain' => 'theone.mag.com','httpOnly' => true,],
//        ],
        ]
];

if (YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
