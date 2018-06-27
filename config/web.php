<?php

$params = require(__DIR__ . '/params.php');
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'defaultRoute' => 'main/index',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'a470bVEqwWeJCxNjYipSJMAvsqN7AImp',
			'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\login\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => '/login/',
        ],
		'urlManager' => [
			'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
			'showScriptName' => false,
			'rules' => [
                '' => 'main/index',
                'gallery/<id_cat:[0-9]+>' => 'main/gallery',
				'<action>' => 'main/<action>',
            ]
		
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
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

    ],
    /*'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'defaultRoute' => 'main',
            'layout' => '/admin',
            'controllerNamespace' => 'app\modules\admin\controllers',
        ],
    ],*/
	'modules' => [
        'admin' => [
            'class' => 'app\admin\Module',
            'defaultRoute' => 'index/index',
            'layout' => '/admin',
            'controllerNamespace' => 'app\admin\controllers',
        ],
        'login' => [
            'class' => 'app\login\Module',
            'defaultRoute' => 'index/index',
            'layout' => '/login',
            'controllerNamespace' => 'app\login\controllers',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
