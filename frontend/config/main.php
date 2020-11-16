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
    'layout' => 'main.min.php',
    'components' => [
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer'
        ],
        'request' => [
            'baseUrl' => '', //убрать frontend/web
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'flowlez',
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

                //'/youtube/index' => 'youtube/index',
                '/songs/' => 'songs/index',
                '/songs/<url>/' => 'songs/song-page',

                '/artists/index/' => 'index/artists-index',
                '/artists/index/<url>' => 'index/artists-index-page',

                '/artists/' => 'artists/index',
                '/artists/<url>/' => 'artists/artist-page',

                '/genres/' => 'genres/index',
                '/genres/<url>/' => 'genres/genre-page',

                '/years/' => 'years/index',
                '/years/<url>/' => 'years/year-page',

                '/languages/' => 'languages/index',
                '/languages/<url>/' => 'languages/language-page',

                //'/sitemap/' => 'sitemap/index',
                //'/sitemap/<url>/' => 'sitemap/url',

                //'/sitemapru/' => 'sitemap/index-ru',
                //'/sitemapru/<url>/' => 'sitemap/url-ru',
                //'/search/' => 'search/index',
                //'/search/search' => 'search/search',
                //'/script/first-letter' => 'scripts/first-letter',
                //'/script/genres' => 'scripts/genres',
                //'/script/years' => 'scripts/years',
                //'/script/albums' => 'scripts/albums',
                //'/script/artists' => 'scripts/artists',
                //'/script/artists-show' => 'scripts/artists-show',
                //'/script/artists-work' => 'scripts/artists-work',
                //'/script/songs-translation' => 'scripts/songs-translation',
                //'/script/songs-youtube' => 'scripts/songs-youtube',
                //'/script/url-youtube' => 'scripts/url-youtube',
                //'/script/featuring' => 'scripts/featuring',
                //'/script/source' => 'scripts/source',
                //CMS
                //'/cms/' => 'cms/index',
                '/cms/cookie/' => 'cms/cookie-info',
                '/cms/policy/' => 'cms/policy',
                '/cms/user-agreement/' => 'cms/user-agreement',
                '/cms/copyright/' => 'cms/copyright',

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

        /*'view' => [
            'class' => '\rmrevin\yii\minify\View',
            'enableMinify' => !YII_DEBUG,
            'concatCss' => true, // concatenate css
            'minifyCss' => true, // minificate css
            'concatJs' => true, // concatenate js
            'minifyJs' => true, // minificate js
            'minifyOutput' => true, // minificate result html page
            'webPath' => '@web', // path alias to web base
            'basePath' => '@webroot', // path alias to web base
            'minifyPath' => '@webroot/minify', // path alias to save minify result
            'jsPosition' => [ \yii\web\View::POS_END ], // positions of js files to be minified
            'forceCharset' => 'UTF-8', // charset forcibly assign, otherwise will use all of the files found charset
            'expandImports' => true, // whether to change @import on content
            'compressOptions' => ['extra' => true], // options for compress
            //'excludeFiles' => [
            //    'jquery.js', // exclude this file from minification
            //    'app-[^.].js', // you may use regexp
            //],
            //'excludeBundles' => [
            //    \app\helloworld\AssetBundle::class, // exclude this bundle from minification
            //],
        ],*/


    ],
    'sourceLanguage' => 'en',
    'language' => 'en',
    'params' => $params,
];
