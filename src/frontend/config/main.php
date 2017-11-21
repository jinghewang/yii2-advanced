<?php

use frontend\services\SolrServiceBuilder;

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
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers'   => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            /*'formatters' => [
                \yii\web\Response::FORMAT_JSON => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
                ],
            ],*/
        ],

        'user' => [
            'identityClass' => 'common\models\User',
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
                    'class' => 'yii\log\FileTarget',
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
                [
                    'pattern' => 'person2',
                    'route' => 'person/index',
                    'suffix' => '',
                ],
                [
                    'class' => 'frontend\rules\CarUrlRule',
                ],
                [
                    'class'      => 'yii\rest\UrlRule',
                    'controller' => 'province',
                    //'only' => ['delete', 'create', 'update'],
                    //'except' => ['delete', 'create', 'update'],
                    'extraPatterns' => [
                        'GET test2' => 'test',
                    ],
                ],
            ],
        ],
        'utils' => [
            'class' => 'frontend\Components\UtilsComponent',
            'name'  => 'hbd',
        ],
        'search' => SolrServiceBuilder::build('127.0.0.1'),
    ],
    'modules' => [
        'admin' => [
            'class' => 'frontend\modules\admin\Model',
        ],
    ],
    'params' => $params,
    //'catchAll' => ['site/offline'],
];
