<?php

$params = require(__DIR__.'/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
            'gridview' => [
                'class' => '\kartik\grid\Module',
            ],
            'dashboard' => [
                'class' => 'cornernote\dashboard\Module',
                // the layout that should be applied for views within this module
                'layout' => 'main',
                // Name of the component to use for database access
                'db' => 'db',
                // Layout classes to be loaded into the module
                'layouts' => [
                    'default' => 'cornernote\dashboard\layouts\DefaultLayout',
                ],
                // Panel classes to be loaded into the module
                'panels' => [
                    'text' => 'cornernote\dashboard\panels\TextPanel',
                ],
            ],
            'sliderrevolution' => [
                'class' => 'wadeshuler\sliderrevolution\SliderModule',
                'pluginLocation' => '@app/views/site/rs-plugin',    // <-- path to your rs-plugin directory
            ],
        ],
    'components' => [
        
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fXUf7HzjbaQt9dtyFFAg9Q-LE3zqD_vz',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            //'enableStrictParsing' => true,
            //'suffix' => '.html',
            'rules' => array(
                    '<controller:\w+>/<id:\d+>' => '<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
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
        'db' => require(__DIR__.'/db.php'),
    ],
    'params' => $params,
    'params' => [
        'baseUrl' => 'http://localhost/kotfare',
        //'adminEmail' => 'email@company.com',
        //'supportEmail' => 'email@company.com',
        //'user.passwordResetTokenExpire' => 3600
     ],
    'aliases' => [
        '@files' => 'http://localhost/kotfare/web/uploads/',
        ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
