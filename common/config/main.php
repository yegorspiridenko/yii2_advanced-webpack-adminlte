<?php
$params = array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

use pavlinter\display\DisplayImage;

Yii::$container->set('pavlinter\display\DisplayImage', [
    'bgColor' => 'ffffff',
    'config' => [
        'all' => [
            'imagesWebDir' => '@backend/web',
            'imagesDir' => '@backend/web',
            'defaultWebDir' => '@backend/web/uploads',
            'defaultDir' => '@backend/web/uploads',
            'defaultImage' => 'default.jpg',
            'mode' => DisplayImage::MODE_STATIC,
        ],
    ]
]);

return [
    'timeZone' => 'Europe/Moscow',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'username' => $params['yandexEmailLogin'],
                'password' => $params['yandexEmailPassword'],
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
        'mailService' => [
            'class' => 'common\services\MailService',
        ],
        'smsService' => [
            'class' => 'common\services\SmsService',
        ],
    ],
];
