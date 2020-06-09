<div class="header-top-line-search">

    <?php


    $template = '<div class="search-value-div"><p class="search-value">{{value}}</p>';

    echo \kartik\typeahead\Typeahead::widget([
        'name' => 'typeahead',
        'options' => ['placeholder' => Yii::t('app','Search ...')
        ],
        'pluginOptions' => ['hint' => true, 'highlight' => true, 'minLength' => 3],
        'pluginEvents' => [
            //"typeahead:select" => "function(ev, suggestion) {
            //window.location = '/artists/' + suggestion.url; }"

            //"typeahead:select" => "function(ev, suggestion) {
            //console.log(suggestion.url) }"

            "typeahead:select" => "function(ev, suggestion) {
         
                if (typeof suggestion.url === \"undefined\" || suggestion.url === null || suggestion.url ===  \"\") {
        
                    //здесь можно открыть страницу поиска
                    
                } else {
                
                    window.location = '/artists/' + suggestion.url + '/';
                
                }
               
             }"

        ],
        'dataset' => [
            [
                //'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
                'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
                'display' => 'value',
                //'prefetch' => $baseUrl . '/samples/countries.json',
                'prefetch' => \yii\helpers\Url::to(['search/search']),
                'limit' => 10,
                'templates' => [
                    'notFound' => '<div class="text-danger" style="padding:0 8px">' . Yii::t('app','No matches found.') . '</div>',
                    'suggestion' => new \yii\web\JsExpression("Handlebars.compile('{$template}')")
                ],
                'remote' => [
                    'url' => \yii\helpers\Url::to(['search/search']) . '?q=%QUERY',
                    'wildcard' => '%QUERY'

                ]

            ]
        ]
    ]);

    //echo \yii\helpers\Url::to(['search/search']) . '?q=%QUERY';


    ?>

</div>