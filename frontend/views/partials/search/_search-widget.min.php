<div><?php
    $template = '<div class="search-value-div"><p class="search-value">{{value}}</p>';
    echo \kartik\typeahead\Typeahead::widget([
        'name' => 'typeahead',
        'options' => ['placeholder' => Yii::t('app','Search ...')
        ],
        'pluginOptions' => ['hint' => true, 'highlight' => true, 'minLength' => 3],
        'pluginEvents' => [
            "typeahead:select" => "function(ev, suggestion) {
                if (typeof suggestion.url === \"undefined\" || suggestion.url === null || suggestion.url ===  \"\") {
                    //here u can open search page
                } else {
                    window.location = '/" . Yii::$app->language . "/' + suggestion.url + '/';
                }
             }"
        ],
        'dataset' => [
            [
                'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
                'display' => 'value',
                'limit' => 10,
                'templates' => [
                    'notFound' => '<div class="text-danger" style="padding:0 8px">' . Yii::t('app','No matches found.') . '</div>',
                    'suggestion' => new \yii\web\JsExpression("Handlebars.compile('{$template}')")
                ],
                'remote' => [
                    'url' => \yii\helpers\Url::to(['search/search']) . '?q=%QUERY',
                    'wildcard' => '%QUERY'
                ]
            ],
        ]
    ]);
    ?></div>