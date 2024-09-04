<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\Customer',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/catalog' => '/catalog/categories',
                '/documents' => '/site/documents',
                '/about' => '/site/about',
                '/distribution' => 'site/distribution',
                '/contact' => 'site/contact',
                '/auth' => 'site/auth',
                '/profile/orders/<id:\d+>' => 'profile/orders',
                '/profile/return/<id:\d+>' => 'profile/return',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller\w+>/<action>/<slug>' => '<controller>/<action>',
                'static/<page:\w+>' => 'site/static',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'bundles' => [
                \yii\bootstrap4\BootstrapAsset::class => false
            ],
            'linkAssets' => true,
        ],
    ],
    'params' => $params,
];
