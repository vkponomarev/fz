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
    'controllerNamespace' => 'frontend\controllers',
    'components' => [

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer'
        ],
        'request' => [
           // 'csrfParam' => '_csrf-frontend',
            'baseUrl' => '', //убрать frontend/web
           // 'class' => 'codemix\localeurls\UrlManager',
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
            'enableStrictParsing' => false,
            'class' => 'codemix\localeurls\UrlManager',
            'languages' => ['en','ru','es','pt','ja','de','ko','fr','jv','vi','it','tr','uk','th','pl','az','ro','uz','hu','el','cs','zh','hi','bn'],
            'enableDefaultLanguageUrlCode' => true,
            'rules' => [
                '/' => 'main-page/index',
                '/albums/' => 'albums/index',
                '/albums/<url>/' => 'albums/album-page',

                '/songs/' => 'songs/index',
                '/songs/<url>/' => 'songs/song-page',

                '/artists/index/' => 'index/artists-index',
                '/artists/index/<url>' => 'index/artists-index-page',

                '/artists/' => 'artists/index',
                '/artists/<url>/' => 'artists/artist-page',



                '/script/first-letter' => 'scripts/first-letter',
                '/script/genres' => 'scripts/genres',
                '/script/years' => 'scripts/years',
                '/script/albums' => 'scripts/albums',
                '/script/artists' => 'scripts/artists',
                '/script/artists-show' => 'scripts/artists-show',
                '/script/artists-work' => 'scripts/artists-work',


                //CMS
                //'/cms/' => 'cms/index',
                '/cms/cookie/' => 'cms/cookie-info',
                '/cms/policy/' => 'cms/policy',

            ],

            'suffix' => '/',
            'normalizer' => [
                'class' => 'yii\web\UrlNormalizer',
                'normalizeTrailingSlash' => true,
                'collapseSlashes' => true,
            ],

        ],


        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en',
                    
                ],
            ],
        ],


    ],
    'sourceLanguage' => 'en',
    'language' => 'en',
    'params' => $params,
];
