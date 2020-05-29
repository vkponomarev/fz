<?php

namespace common\components\gii\createViewPartials\alternate;


use common\components\mainPagesData\MainPagesDataLanguage;
use common\components\mainPagesData\MainPagesDataMenu;
use Yii;

class AlternateTemplate
{


    function template($path, $partialsConfig)
    {
        $template = '';

        $languageSelection = (new MainPagesDataLanguage())->LanguageSelection();

        $template = '
        <?php $url = array_merge(Yii::$app->request->get(),
                [Yii::$app->controller->route, \'language\' => Yii::$app->params[\'language\'][\'url\']]);
        ?>
        ';
        foreach ($languageSelection as $language) {

               /* $template = $template . '
            <link rel = "alternate" hreflang = "' . $language['url'].'" href = "<?= array_merge(Yii::$app->request->get(),
                        [Yii::$app->controller->route, \'language\' => Yii::$app->params[\'language\'][\'url\']])?>" />
            ';*/



            $template = $template . '
    <link rel= "alternate" hreflang= "' . $language['url'] . '" href = "<?=\yii\helpers\Url::home(true)?><?php
            if (isset($url[\'url\']))
            {
                echo \'' . $language['url'] . '/\' . $url[\'url\'] . \'/\';
            } else {
                echo \'' . $language['url'] . '/\';
            }
                ?>" />';

        }

        $fp = fopen($path . '/' . $partialsConfig['getParam'] . '.php', "w");
        // записываем в файл текст
        fwrite($fp, $template);
        // закрываем
        fclose($fp);






        return $template;
    }


}
